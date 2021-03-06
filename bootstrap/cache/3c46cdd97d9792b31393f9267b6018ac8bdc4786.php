  <div class="row">
    <div class="col-md">
      <?php if(isset($errors) || \App\Classes\Session::has('error')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php if(\App\Classes\Session::has('error')): ?>
            <h5><?php echo e(\App\Classes\Session::flash('error')); ?></h5>
          <?php else: ?>

            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_array): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $error_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h5><strong>ALERT !!</strong> <?php echo e($error_item); ?> <br /></h5>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php endif; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <?php if(isset($success) || \App\Classes\Session::has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php if(@isset($success)): ?>
              <h5><?php echo e($success); ?></h5>
          <?php elseif(\App\Classes\Session::has('success')): ?>
            <?php echo e(\App\Classes\Session::flash('success')); ?>

          <?php endif; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php /**PATH /var/www/html/organicstore/resources/views/includes/message.blade.php ENDPATH**/ ?>