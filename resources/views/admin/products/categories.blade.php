@extends('admin.layout.base')

@section('title', 'product categories')

@section('data-page-id', 'adminCategories')

{{-- @endsection --}}

@section('content')
<div class="category">
  <div class="row">
    <div class="col-lg">
      <h1>Product Categories</h1>
      @include('includes.message')
    </div>

  </div>
  <div class="row mt-3">
    <div class="col-sm-12 col-md-6 text-center">
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" method="post" action="">
        <div class="input-group">
          <input type="text" class="form-control border-0" placeholder="Search by name" aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="col-sm-12 col-md-5  text-center">
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" action="/admin/products/categories" method="post">
        <div class="input-group">
          <input type="text" class="form-control border-0" placeholder="category name" name="name" aria-label="Search" aria-describedby="basic-addon2">
          <input type="hidden" name="token" value="{{ App\Classes\CSRFToken::_token() }}">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">create</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      @if(count($categories))
        <table class="table table-bordered" data-form="deleteForm">
            <tbody>
              @foreach($categories as $category)
                <tr>
                  <td>{{ $category['name'] }}</td>
                  <td>{{ $category['slug'] }}</td>
                  <td>{{ $category['added']}}</td>
                  <td width="100" class="text-center">
                    <span>
                      <a data-target="#add-subcategory-{{ $category['id'] }}" data-toggle="modal" class="text-primary pointer" data-toggle="tooltip" data-placement="bottom" title="Add sub category">
                        <i class="fa fa-plus mr-1"></i>
                      </a>
                    </span>
                    <span>
                      <a data-target="#item-{{ $category['id'] }}" data-toggle="modal" class="text-secondary pointer" data-toggle="tooltip" data-placement="bottom" title="Edit category">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>
                    <span style="">
                      <form class="form-delete" action="/admin/products/categories/{{ $category['id'] }}/delete" method="POST">
                        <input type="hidden" name="token" value="{{ App\Classes\CSRFToken::_token() }}">
                        <button type="submit" data-toggle="tooltip" data-placement="bottom" title="delete category"><i class="fa fa-times delete ml-1"></i></button>
                      </form>
                    </span>


                    <!--Edit category Modal -->
                    <div class="modal fade" id="item-{{ $category['id'] }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Edit Category</h3>
                            <a href="/admin/products/categories" type="button" class="close" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </a >
                          </div>
                          <div class="modal-body">
                            <div class="custom_notification callout callout__primary"></div>
                            <form>
                              <div class="input-group">
                                <input type="text" id="item-name-{{$category['id']}}" class="form-control" placeholder="category name" name="name" value="{{ $category['name'] }}">
                                <div class="input-group mt-3">
                                  <input type="submit" class="btn btn-info update-category" id="{{$category['id']}}"
                                  data-token="{{App\Classes\CSRFToken::_token()}}" value="update">
                                </div>
                              </div>
                            </form>
                          </div>
                          {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Save changes</button>
                          </div> --}}
                        </div>
                      </div>
                    </div>
                  <!-- End of edit category modal -->


                  <!--Add sub category Modal -->
                  <div class="modal fade" id="add-subcategory-{{ $category['id'] }}" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalLabel">Add sub Category</h3>
                          <a href="/admin/products/categories" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </a >
                        </div>
                        <div class="modal-body">
                          <div class="custom_notification callout callout__primary"></div>
                          <form>
                            <div class="input-group">
                              <input type="text" id="subcategory-name-{{$category['id']}}" class="form-control" placeholder="Enter new sub category">
                              <div class="input-group mt-3">
                                <input type="submit" class="btn btn-info add-subcategory" id="{{$category['id']}}"
                                data-token="{{App\Classes\CSRFToken::_token()}}" value="Create">
                              </div>
                            </div>
                          </form>
                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-danger">Save changes</button>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                <!-- End of add sub category modal -->
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>

      @if(isset($links))
          {!! $links !!}
      @endif
      @else
        <h4>You have not created any category</h4>
      @endif
    </div>
  </div>
</div>

{{-- SubCategory --}}
<div class="subcategory mt-5">
  <div class="row">
    <div class="col-lg">
      <h1>Sub categories</h1>
    </div>

  </div>

  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      @if(count($subcategories))
        <table class="table table-bordered" data-form="deleteForm">
            <tbody>
              @foreach($subcategories as $subcategory)
                <tr>
                  <td>{{ $subcategory['name'] }}</td>
                  <td>{{ $subcategory['slug'] }}</td>
                  <td>{{ $subcategory['added']}}</td>
                  <td width="100" class="text-center">
                    <span>
                      <a data-target="#item-subcategory-{{ $subcategory['id'] }}" data-toggle="modal" class="text-secondary pointer" data-toggle="tooltip" data-placement="bottom" title="Edit Subcategory">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>
                    <span  data-toggle="tooltip" data-placement="bottom" title="delete Subcategory">
                      <form class="form-delete" action="/admin/products/subcategory/{{ $subcategory['id'] }}/delete" method="POST">
                        <input type="hidden" name="token" value="{{ App\Classes\CSRFToken::_token() }}">
                        <button type="submit"><i class="fa fa-times delete ml-1"></i></button>
                      </form>
                    </span>


                    <!--Edit Subcategory Modal -->
                    <div class="modal fade" id="item-subcategory-{{ $subcategory['id'] }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Edit Subcategory</h3>
                            <a href="/admin/products/categories" type="button" class="close" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </a >
                          </div>
                          <div class="modal-body">
                            <div class="custom_notification callout callout__primary"></div>
                            <form>
                              <div class="input-group">
                                <input type="text" id="item-subcategory-name-{{$subcategory['id']}}" class="form-control" placeholder="subcategory name" value="{{ $category['name'] }}">
                                <div class="input-group mt-3">
                                  <input type="submit" class="btn btn-info update-subcategory" id="{{$subcategory['id']}}"
                                  data-token="{{App\Classes\CSRFToken::_token()}}" value="update">
                                </div>
                              </div>
                            </form>
                          </div>
                          {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Save changes</button>
                          </div> --}}
                        </div>
                      </div>
                    </div>
                  <!-- End of edit category modal -->


                  <!--Add sub category Modal -->

                <!-- End of add sub category modal -->
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>

      @if(isset($links))
          {!! $subcategories_links !!}
      @endif
      @else
        <h4>You have not created any sub category</h4>
      @endif
    </div>
  </div>
</div>

@include('includes.delete-modal')
@endsection
