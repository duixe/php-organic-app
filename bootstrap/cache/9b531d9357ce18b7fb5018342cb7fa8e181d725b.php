<?php if(@isset($details['product'])): ?>
  <tr>
    <td><img src="/<?php echo e($details['product']['image_path']); ?>" alt="<?php echo e($details['product']['name']); ?>" height="40" width="40"></td>
    <td><?php echo e($details['product']['name']); ?></td>
    <td><?php echo e($details['quantity']); ?></td>
    <td><?php echo e($details['unit_price']); ?></td>
    <td><?php echo e($details['total']); ?></td>
    <td><?php echo e($details['status']); ?></td>
  </tr>
<?php endif; ?>
<?php /**PATH /var/www/html/organicstore/resources/views/admin/transactions/items.blade.php ENDPATH**/ ?>