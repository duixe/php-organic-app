<?php $__env->startSection('title', 'Manage Inventory'); ?>

<?php $__env->startSection('data-page-id', 'adminProduct'); ?>



<?php $__env->startSection('content'); ?>
<div class="products">
  <div class="row">
    <div class="col-lg">
        <h1 class="round-head">Manage Inventory Items</h1>
      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

  </div>
  <div class="row mt-3">
    <div class="col-sm-12 col-md-11">
      <a href="/admin/products/create" class="btn btn-success float-right"> <i class="fa fa-plus"></i> Add new Product</a>
    </div>
  </div>

  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      <?php if(count($products)): ?>
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
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          <img src="/<?php echo e($product['image_path']); ?>" alt="<?php echo e($product['name']); ?>" height="40" width="40">
                        </td>
                        <td><?php echo e($product['name']); ?></td>
                        <td><?php echo e($product['price']); ?></td>
                        <td><?php echo e($product['quantity']); ?></td>
                        <td><?php echo e($product['category_name']); ?></td>
                        <td><?php echo e($product['sub_category_name']); ?></td>
                        <td width="100" class="text-center">
                          <span>
                            <a  href="/admin/products/<?php echo e($product['id']); ?>/edit" class="text-secondary pointer" data-toggle="tooltip" data-placement="bottom" title="Edit product">
                              <i class="fa fa-edit"></i>
                            </a>
                          </span>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>


      <?php if(isset($links)): ?>
          <?php echo $links; ?>

      <?php endif; ?>
      <?php else: ?>
        <h4>You do not have any product</h4>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/admin/products/inventory.blade.php ENDPATH**/ ?>