<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Classes\Request;
use App\Classes\CSRFToken;
use App\Classes\ValidateRequest;
use App\Classes\Redirect;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Controllers\BaseController;

class ProductController extends BaseController{
  public $table_name = 'products';
  public $categories;
  public $products;
  public $subcategories;
  public $subcategories_links;
  public $links;

  public function __construct() {

    $total = Product::all()->count();
    $this->categories = Category::all();


    list($this->products, $this->links) = paginate(3, $total, $this->table_name, new Product);
    // list($this->subcategories, $this->subcategories_links) = paginate(5, $sub_total, 'sub_categories', new SubCategory);

  }

  public function show() {
    $products = $this->products;
    $links = $this->links;
    return view('admin/products/inventory', compact('products', 'links'));
  }

   public function ShowCreateProductForm() {

    $categories = $this->categories;
    #compact is a php function that create an array that contains variable
    return view('admin/products/create', compact('categories'));

  }


  public function ShowEditProductForm($id) {
    $categories = $this->categories;
    $product = Product::where('id', $id)->with(['category', 'subCategory'])->first();
    return \view('admin/products/edit', compact('product', 'categories'));
  }


  public function createStore($id) {
      if (Request::has('post')) {
        $request = Request::get('post');
        $file_err = [];

        if (CSRFToken::verifyCSRFToken($request->token, false)) {
          $rules = [
            'name' => ['required' => true, 'minLength' => 4, 'maxLength' => 80, 'string' => true, 'unique' => $this->table_name],
            'price' => ['required' => true, 'minLength' => 2, 'number' => true],
            'quantity' => ['required' => true],
            'category' => ['required' => true],
            'subcategory' => ['required' => true],
            'description' => ['required' => true, 'mixed' => true, 'minLength' => 4, 'maxLength' => 1000]
          ];

          $validate = new ValidateRequest;
          $validate->abide($_POST, $rules);

          $file = Request::get('file');
          isset($file->productImage->name) ? $filename = $file->productImage->name : $filename = '';


          if(empty($filename)) {
            $file_err['productImage'] = ['The product Image is required'];
          }else if(!UploadFile::isImage($filename)) {
            $file_err['productImage'] = ['The Image you\'re trying to upload is invalid, <br> file type should be jpeg, jpg, png, svg or bmp'];
          }

          //when there is an error from the data sent from the AJAX script, this is what happens-it hits the header function with err 422;
          if ($validate->hasError()) {
            $prev_err = $validate->getErrorMessages();
            count($file_err) ? $errors = array_merge($prev_err, $file_err) : $errors = $prev_err;

            return view('admin/products/create', [
              'categories' => $this->categories, 'errors' => $errors
            ]);

          }

          $ds = DIRECTORY_SEPARATOR;
          $temp_file = $file->productImage->tmp_name;
          $image_path = UploadFile::move($temp_file, "img{$ds}uploads{$ds}products", $filename)->path();

          // process form
          Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'sub_category_id' => $request->subcategory,
            'image_path' => $image_path,
            'quantity' => $request->quantity,

          ]);

          Request::refresh();
          return view('admin/products/create', [
            'categories' => $this->categories, 'success' => 'Record Created successfully'
          ]);
        }

        throw new \Exception("Token mismatch");

      }

      return null;

   }


 public function edit() {
     if (Request::has('post')) {
       $request = Request::get('post');
       $file_err = [];

       if (CSRFToken::verifyCSRFToken($request->token)) {
         $rules = [
           'name' => ['required' => true, 'minLength' => 4, 'maxLength' => 80, 'string' => true],
           'price' => ['required' => true, 'minLength' => 2, 'number' => true],
           'quantity' => ['required' => true],
           'category' => ['required' => true],
           'subcategory' => ['required' => true],
           'description' => ['required' => true, 'mixed' => true, 'minLength' => 4, 'maxLength' => 1000]
         ];

         $validate = new ValidateRequest;
         $validate->abide($_POST, $rules);

         $file = Request::get('file');
         isset($file->productImage->name) ? $filename = $file->productImage->name : $filename = '';


        if(isset($file->productImage->name) && !UploadFile::isImage($filename)) {
           $file_err['productImage'] = ['The Image you\'re trying to upload is invalid,file type should be jpeg, jpg, png, svg or bmp'];
         }

         //when there is an error from the data sent from the AJAX script, this is what happens-it hits the header function with err 422;
         if ($validate->hasError()) {
           $prev_err = $validate->getErrorMessages();
           count($file_err) ? $errors = array_merge($prev_err, $file_err) : $errors = $prev_err;

           return view('admin/products/create', [
             'categories' => $this->categories, 'errors' => $errors
           ]);

         }
         //ELOQUENT RETURNS AN EXCEPTION IF ID IS NOT FOUND JUST LIKE THE IF STATEMENT BELOW IT
         $product = Product::findOrFail($request->product_id);
         // if(!$product) {
         //   throw new \Exception('Invalid Prouct ID');
         // }
         //if no exception thrown...then 👇
         $product->name = $request->name;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->category_id = $request->category;
         $product->sub_category_id = $request->subcategory;

         //if another file was uploaded 👇
         if ($filename) {
           $ds = DIRECTORY_SEPARATOR;
           $old_img_path = BASE_PATH."{$ds}public{$ds}$product->image_path";
           $temp_file = $file->productImage->tmp_name;
           $image_path = UploadFile::move($temp_file, "img{$ds}uploads{$ds}products{$ds}", $filename)->path();
           unlink($old_img_path);
           $product->image_path = $image_path;
         }

         $product->save();
         Session::add('success', 'Record Updated successfully');
         Redirect::redirectTo('/admin/products');
       }else {
          throw new \Exception("Token mismatch");
       }



     }
     return null;
   }


  public function delete($id) {
       if (Request::has('post')) {
         $request = Request::get('post');


         if (CSRFToken::verifyCSRFToken($request->token)) {


           Product::destroy($id);

           Session::add('success', 'Product deleted');

           Redirect::redirectTo('/admin/products');
         }

         throw new \Exception("Token mismatch");

       }

       return null;

    }


  public function getSubCategories($id) {
    $subcategories = SubCategory::where(category_id, $id)->get();
    echo json_encode($subcategories);
    exit;
  }











}
