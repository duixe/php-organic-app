<!--delete category Modal -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Delete Category</h3>

        {{-- <a href="/admin/products/categories" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a > --}}
      </div>
      <div class="modal-body">
        <div class="custom_notification callout callout__primary"></div>
        <p>do you really want to delete this category</p>
        {{-- <form>
          <div class="input-group">
            <input type="text" id="item-name-{{$category['id']}}" class="form-control" placeholder="category name" name="name" value="{{ $category['name'] }}">
            <div class="input-group mt-3">
              <input type="submit" class="btn btn-info update-category" id="{{$category['id']}}"
              data-token="{{App\Classes\CSRFToken::_token()}}" value="update">
            </div>
          </div>
        </form> --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="delete-btn">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- End of delete category modal -->
{{-- // <a href="#" class="text-danger pointer" data-toggle="tooltip" data-placement="bottom" title="Delete Category">
//   <i class="fa fa-times ml-1"></i>
// </a> --}}
