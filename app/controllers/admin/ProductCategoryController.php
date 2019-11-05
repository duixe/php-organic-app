<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use App\Classes\Request;
use App\Classes\CSRFToken;
use App\Classes\ValidateRequest;
use App\Classes\Redirect;
use App\Classes\Session;
use App\Controllers\BaseController;

class ProductCategoryController extends BaseController{
  public $table_name = 'categories';
  public $categories;
  public $subcategories;
  public $subcategories_links;
  public $links;

  public function __construct() {

    $total = Category::all()->count();
    $sub_total= SubCategory::all()->count();
    $object = new Category;

    list($this->categories, $this->links) = paginate(3, $total, $this->table_name, $object);
    list($this->subcategories, $this->subcategories_links) = paginate(3, $sub_total, 'sub_categories', new SubCategory);

  }


  public function show() {

    #compact is a php function that create an array that contains variable
    return view('admin/products/categories', [
      'categories' => $this->categories, 'links' => $this->links,
      'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links
    ]);
  }

  public function createStore() {
    if (Request::has('post')) {
      $request = Request::get('post');


      if (CSRFToken::verifyCSRFToken($request->token)) {
        $rules = [
          'name' => ['required' => true, 'minLength' => 4, 'string' => true, 'unique' => categories]
        ];

        $validate = new ValidateRequest;
        $validate->abide($_POST, $rules);

        if ($validate->hasError()) {
          $errors = $validate->getErrorMessages();
          return view('admin/products/categories', [
            'categories' => $this->categories, 'links' => $this->links, 'errors' => $errors,
            'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links
          ]);
        }
        //process form data
        Category::create([
          'name' => $request->name,
          'slug' => generateSlug($request->name)
        ]);

        $total = Category::all()->count();
        $sub_total= SubCategory::all()->count();
        list($this->categories, $this->links) = paginate(3, $total, $this->table_name, new Category);
        list($this->subcategories, $this->subcategories_links) = paginate(3, $sub_total, 'sub_categories', new SubCategory);
        return view('admin/products/categories', [
          'categories' => $this->categories, 'links' => $this->links, 'success' => 'category created',
          'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links
        ]);

      }

      throw new \Exception("Token mismatch");

    }
  }

  public function edit($id) {
      if (Request::has('post')) {
        $request = Request::get('post');


        if (CSRFToken::verifyCSRFToken($request->token, false)) {
          $rules = [
            'name' => ['required' => true, 'minLength' => 4, 'string' => true, 'unique' => categories]
          ];

          $validate = new ValidateRequest;
          $validate->abide($_POST, $rules);

          //when there is an error from the data sent from the AJAX script, this is what happens-it hits the header function with err 422;
          if ($validate->hasError()) {
            $errors = $validate->getErrorMessages();
            header('HTTP/1.1 422 Unprocessible Entity', true, 422);
            echo json_encode($errors);
            exit;
          }

          Category::where('id', $id)->update(['name' => $request->name]);
          echo json_encode(['success' => 'Record updated successfully']);
          exit;

        }

        throw new \Exception("Token mismatch");

      }

      return null;

   }


   public function delete($id) {
       if (Request::has('post')) {
         $request = Request::get('post');


         if (CSRFToken::verifyCSRFToken($request->token)) {


           Category::destroy($id);

           //delete all subcategory depending on a particular deleted category
           $subcategories = SubCategory::where('category_id', $id)->get();
           if (count($subcategories)) {
             foreach ($subcategories as $subcategory) {
               $subcategory->delete();
             }
           }
           Session::add('success', 'Category deleted');

           Redirect::redirectTo('/admin/products/categories');



         }

         throw new \Exception("Token mismatch");

       }

       return null;

    }














}
