@extends('admin.layout.base')
{{-- use App\Classes\CSRFToken; --}}

@section('title', 'Create Product')

@section('data-page-id', 'adminProduct')

{{-- @endsection --}}

@section('content')
<div class="add-product">
  <div class="row">
    <div class="col-lg">
        <h1 class="round-head">Add Inventory Item</h1>
      @include('includes.message')
    </div>
  </div>
</div>

<form class="" action="/admin/products/create" method="post" enctype="multipart/form-data">
  <div class="col-sm-12 col-md-11">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="productName">Product name:</label>
          <input type="text" id="productName" class="form-control" name="name" placeholder="Product name" value="{{App\Classes\Request::old('post', 'name')}}" >
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="productPrice">Product price:</label>
          <input type="text" id="productPrice" class="form-control" name="price" placeholder="Product price" value="{{App\Classes\Request::old('post', 'price')}}" >
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="product-category">Product category:</label>
          <select class="form-control" name="category" id="product-category">
            <option value="{{App\Classes\Request::old('post', 'category')?: ""}}">
              {{App\Classes\Request::old('post', 'category')?: "select category"}}
            </option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
         </select>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="product-subcategory">Product subcategory:</label>
          <select class="form-control" name="subcategory" id="product-subcategory">
            <option value="{{App\Classes\Request::old('post', 'subcategory')?: ""}}">
              {{App\Classes\Request::old('post', 'subcategory')?: "select Subcategory"}}
            </option>
         </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="product-quantity">Product Quantity:</label>
          <select class="form-control" name="quantity" id="product-quantity">
            <option value="{{App\Classes\Request::old('post', 'quantity')?: ""}}">
              {{App\Classes\Request::old('post', 'quantity')?: "select quantity"}}
            </option>
            @for ($i=1; $i <= 50; $i++)
              <option value="{{$i}}">{{$i}}</option>
            @endfor
         </select>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="exampleFormControlFile1">Product Image: </label>
          <input type="file" class="form-control-file" name="productImage" id="exampleFormControlFile1">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="form-group">
          <label for="textarea">Description: </label>
          <textarea class="form-control" name="description" placeholder="Description">{{App\Classes\Request::old('posts', 'description')}}</textarea>
          <input type="hidden" name="token" value="{{App\Classes\CSRFToken::_token()}}">
          <br>
            <button type="button" class="btn btn-danger mt-6">Reset</button>
            <input type="submit" class="btn btn-success float-right mt-6" value="Save Product">
        </div>
      </div>
    </div>
  </div>
</form>

@include('includes.delete-modal')
@endsection
