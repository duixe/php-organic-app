@extends('admin.layout.base')

@section('title', 'Manage Inventory')

@section('data-page-id', 'adminProduct')

{{-- @endsection --}}

@section('content')
<div class="products">
  <div class="row">
    <div class="col-lg">
        <h1 class="round-head">Manage Inventory Items</h1>
      @include('includes.message')
    </div>

  </div>
  <div class="row mt-3">
    <div class="col-sm-12 col-md-11">
      <a href="/admin/products/create" class="btn btn-success float-right"> <i class="fa fa-plus"></i> Add new Product</a>
    </div>
  </div>

  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      @if(count($products))
        <div class="shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Categories of products avilable</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered" data-form="deleteForm">
                <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                      <tr>
                        <td>
                          <img src="/{{$product['image_path']}}" alt="{{$product['name']}}" height="40" width="40">
                        </td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ $product['category_name'] }}</td>
                        <td>{{ $product['sub_category_name'] }}</td>
                        <td width="100" class="text-center">
                          <span>
                            <a  href="/admin/products/{{$product['id']}}/edit" class="text-secondary pointer" data-toggle="tooltip" data-placement="bottom" title="Edit product">
                              <i class="fa fa-edit"></i>
                            </a>
                          </span>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>


      @if(isset($links))
          {!! $links !!}
      @endif
      @else
        <h4>You do not have any product</h4>
      @endif
    </div>
  </div>
</div>
@endsection
