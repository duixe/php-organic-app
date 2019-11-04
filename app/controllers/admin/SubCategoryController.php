<?php

namespace App\Controllers\Admin;

use App\Models\SubCategory;
use App\Models\Category;
use App\Classes\Request;
use App\Classes\CSRFToken;
use App\Classes\ValidateRequest;
use App\Classes\Redirect;
use App\Classes\Session;
use App\Controllers\BaseController;

class SubCategoryController extends BaseController{

  public function createStore() {
    if (Request::has('post')) {
      $request = Request::get('post');
      $other_err = [];


      if (CSRFToken::verifyCSRFToken($request->token, false)) {
        $rules = [
          'name' => ['required' => true, 'minLength' => 4, 'string' => true],
          'category_id' => ['required' => true]
        ];

        $validate = new ValidateRequest;
        $validate->abide($_POST, $rules);

        $duplicate_subcategory = SubCategory::where('name', $request->name)->where('category_id', $request->category_id)->exists();

        if ($duplicate_subcategory) {
          $other_err['name'] = array('Subcategory already exist');
        }

        $category = Category::where('id', $request->category_id)->exists();

        if (!$category) {
          $other_err['name'] = array('Invalid product category');
        }

        if ($validate->hasError() || $duplicate_subcategory || !$category) {
          $errors = $validate->getErrorMessages();
          count($other_err) ? $response = array_merge($errors, $other_err) : $response = $errors;
          header('HTTP/1.1 422 Unprocessible Entity', true, 422);
          echo json_encode($response);
          exit;
        }
        //if no errors process form data
        SubCategory::create([
          'name' => $request->name,
          'category_id' => $request->category_id,
          'slug' => generateSlug($request->name)
        ]);

        echo json_encode(['success' => 'Subcategory created successfully']);
        exit;
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
           Session::add('success', 'Category deleted');

           Redirect::redirectTo('/admin/products/categories');



         }

         throw new \Exception("Token mismatch");

       }

       return null;

    }














}
