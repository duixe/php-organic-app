<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-lg">
    <h1>dashboard</h1>
    <form action="/admin" method="post" enctype="multipart/form-data">
      <input name="product" value="testing">
      <input type="file" name="image">
      <input type="submit" name="submit" value="submit">
    </form>
  </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>