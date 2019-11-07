<?php $__env->startSection('title', 'Edit Product'); ?>

<?php $__env->startSection('data-page-id', 'adminProduct'); ?>



<?php $__env->startSection('content'); ?>
<div class="add-product">
  <div class="row">
    <div class="col-lg">
        <h2 class="round-head">Edit <?php echo e($product->name); ?></h2>
      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>

<form class="" action="/admin/products/edit" method="post" enctype="multipart/form-data">
  <div class="col-sm-12 col-md-11">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="productName">Product name:</label>
          <input type="text" id="productName" class="form-control" name="name" value="<?php echo e($product->name); ?>" >
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="productPrice">Product price:</label>
          <input type="text" id="productPrice" class="form-control" name="price" value="<?php echo e($product->price); ?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="product-category">Product category:</label>
          <select class="form-control" name="category" id="product-category">
            <option value="<?php echo e($product->category->id); ?>">
              <?php echo e($product->category->name); ?>

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
            <option value="<?php echo e($product->subCategory->id); ?>">
              <?php echo e($product->subCategory->name); ?>

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
            <option value="<?php echo e($product->quantity); ?>">
              <?php echo e($product->quantity); ?>

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
          <textarea class="form-control" name="description" placeholder="Description"><?php echo e($product->description); ?></textarea>
          <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
          <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
          <br>

            <input type="submit" class="btn btn-secondary float-right mt-6" value="Update Product">
        </div>
      </div>
    </div>
  </div>
</form>


<div class="row">
  <div class="col-sm-12 col-md-11">
    <table data-form="deleteForm">
      <tr>
        <td>
          <form class="form-delete" action="/admin/products/<?php echo e($product->id); ?>/delete" method="POST">
            <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
            <button type="submit" class="btn-custom__danger">Delete Product</button>
          </form>
        </td>
      </tr>
    </table>
  </div>
</div>
<?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/admin/products/edit.blade.php ENDPATH**/ ?>