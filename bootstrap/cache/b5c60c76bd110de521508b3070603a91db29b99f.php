<?php $__env->startSection('title', 'product payments'); ?>

<?php $__env->startSection('data-page-id', 'adminPayments'); ?>



<?php $__env->startSection('content'); ?>
<div class="category">
  <div class="row">
    <div class="col-lg">
        <h1 class="round-head">Payments</h1>
      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

  </div>


  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      <?php if(count($payments)): ?>
        <div class="shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">summary of Payments</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                      <th scope="col">Customer</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Order Number</th>
                      <th scope="col">Item Count</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date Created</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($payment['customer']['fullname']); ?></td>
                        <td><?php echo e($payment['amount']); ?></td>
                        <td><?php echo e($payment['order_num']); ?></td>
                        <td><?php echo e($payment['item_count']); ?></td>
                        <td><?php echo e($payment['status']); ?></td>
                        <td><?php echo e($payment['added']); ?></td>
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
        <h4>You have not sold any product</h4>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/admin/transactions/payment.blade.php ENDPATH**/ ?>