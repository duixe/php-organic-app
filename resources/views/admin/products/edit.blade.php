@extends('admin.layout.base')
{{-- use App\Classes\CSRFToken; --}}

@section('title', 'Edit Product')

@section('data-page-id', 'adminProduct')

{{-- @endsection --}}

@section('content')
<div class="add-product">
  <div class="row">
    <div class="col-lg">
        <h2 class="round-head">Edit {{$product->name}}</h2>
      @include('includes.message')
    </div>
  </div>
</div>

<form class="" action="/admin/products/edit" method="post" enctype="multipart/form-data">
  <div class="col-sm-12 col-md-11">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="productName">Product name:</label>
          <input type="text" id="productName" class="form-control" name="name" value="{{$product->name}}" >
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="productPrice">Product price:</label>
          <input type="text" id="productPrice" class="form-control" name="price" value="{{$product->price}}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="product-category">Product category:</label>
          <select class="form-control" name="category" id="product-category">
            <option value="{{$product->category->id}}">
              {{$product->category->name}}
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
            <option value="{{ $product->subCategory->id }}">
              {{ $product->subCategory->name }}
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
            <option value="{{$product->quantity}}">
              {{$product->quantity}}
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
          <textarea class="form-control" name="description" placeholder="Description">{{ $product->description }}</textarea>
          <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <br>

            <input type="submit" class="btn btn-secondary float-right mt-6" value="Update Product">
        </div>
      </div>
    </div>
  </div>
</form>

{{-- delete button --}}
<div class="row">
  <div class="col-sm-12 col-md-11">
    <table data-form="deleteForm">
      <tr>
        <td>
          <form class="form-delete" action="/admin/products/{{ $product->id }}/delete" method="POST">
            <input type="hidden" name="token" value="{{ App\Classes\CSRFToken::_token() }}">
            <button type="submit" class="btn-custom__danger">Delete Product</button>
          </form>
        </td>
      </tr>
    </table>
  </div>
</div>
@include('includes.delete-modal')
@endsection
