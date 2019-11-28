<?php $__env->startSection('title', 'product orders'); ?>

<?php $__env->startSection('data-page-id', 'adminOrders'); ?>



<?php $__env->startSection('content'); ?>
<div class="category">
  <div class="row">
    <div class="col-lg">
        <h1 class="round-head">Orders</h1>
    </div>

  </div>


  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      <?php if(isset($orders) && count($orders)): ?>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_num => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="shadow mb-4">
          <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-success">Order Number : <?php echo e($order_num); ?></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <tr>
                    <td><strong>Customer Name: </strong>&nbsp; <?php echo e($details['customer']['fullname']); ?></td>
                    <td><strong>Address: </strong>&nbsp; <?php echo e($details['customer']['address']); ?></td>
                    <td><strong>Order Date: </strong>&nbsp; <?php echo e($details['when']); ?></td>
                    <td><strong>Grand Total: </strong>&nbsp; $<?php echo e($details['total']); ?></td>
                  </tr>
                </table>
                  <hr>
                  <h5 class="m-0 font-weight-bold text-success">Items</h5>
                  <table class="table table-bordered">
                    <tr>
                      <th>Product IMG</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total</th>
                      <th>Status</th>
                    </tr>
                    <?php echo $__env->renderEach('admin.transactions.items', $details, 'details'); ?>
                  </table>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      <?php if(isset($links)): ?>
          <?php echo $links; ?>

      <?php endif; ?>
      <?php else: ?>
        <h4>You have not made any sales</h4>
      <?php endif; ?>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/admin/transactions/orders.blade.php ENDPATH**/ ?>