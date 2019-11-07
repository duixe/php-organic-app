<?php $__env->startSection('title', 'Create Product'); ?>

<?php $__env->startSection('data-page-id', 'adminProduct'); ?>



<?php $__env->startSection('content'); ?>
<div class="add-product">
  <div class="row">
    <div class="col-lg">
        <h1 class="round-head">Add Inventory Item</h1>
      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>

<form class="" action="/admin/products/create" method="post" enctype="multipart/form-data">
  <div class="col-sm-12 col-md-11">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="productName">Product name:</label>
          <input type="text" id="productName" class="form-control" name="name" placeholder="Product name" value="<?php echo e(App\Classes\Request::old('post', 'name')); ?>" >
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="productPrice">Product price:</label>
          <input type="text" id="productPrice" class="form-control" name="price" placeholder="Product price" value="<?php echo e(App\Classes\Request::old('post', 'price')); ?>" >
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="product-category">Product category:</label>
          <select class="form-control" name="category" id="product-category">
            <option value="<?php echo e(App\Classes\Request::old('post', 'category')?: ""); ?>">
              <?php echo e(App\Classes\Request::old('post', 'category')?: "select category"); ?>

            </option>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="product-subcategory">Product subcategory:</label>
          <select class="form-control" name="subcategory" id="product-subcategory">
            <option value="<?php echo e(App\Classes\Request::old('post', 'subcategory')?: ""); ?>">
              <?php echo e(App\Classes\Request::old('post', 'subcategory')?: "select Subcategory"); ?>

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
            <option value="<?php echo e(App\Classes\Request::old('post', 'quantity')?: ""); ?>">
              <?php echo e(App\Classes\Request::old('post', 'quantity')?: "select quantity"); ?>

            </option>
            <?php for($i=1; $i <= 50; $i++): ?>
              <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
            <?php endfor; ?>
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
          <textarea class="form-control" name="description" placeholder="Description"><?php echo e(App\Classes\Request::old('posts', 'description')); ?></textarea>
          <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
          <br>
            <button type="button" class="btn btn-danger mt-6">Reset</button>
            <input type="submit" class="btn btn-success float-right mt-6" value="Save Product">
        </div>
      </div>
    </div>
  </div>
</form>

<?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/admin/products/create.blade.php ENDPATH**/ ?>