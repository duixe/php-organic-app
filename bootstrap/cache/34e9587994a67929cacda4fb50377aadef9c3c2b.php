<?php $__env->startSection('title', 'product categories'); ?>

<?php $__env->startSection('data-page-id', 'adminCategories'); ?>



<?php $__env->startSection('content'); ?>
<div class="category">
  <div class="row">
    <div class="col-lg">
      <h1>Product Categories</h1>
      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
          <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">create</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      <?php if(count($categories)): ?>
        <table class="table table-bordered" data-form="deleteForm">
            <tbody>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($category['name']); ?></td>
                  <td><?php echo e($category['slug']); ?></td>
                  <td><?php echo e($category['added']); ?></td>
                  <td width="100" class="text-center">
                    <span>
                      <a data-target="#add-subcategory-<?php echo e($category['id']); ?>" data-toggle="modal" class="text-primary pointer" data-toggle="tooltip" data-placement="bottom" title="Add sub category">
                        <i class="fa fa-plus mr-1"></i>
                      </a>
                    </span>
                    <span>
                      <a data-target="#item-<?php echo e($category['id']); ?>" data-toggle="modal" class="text-secondary pointer" data-toggle="tooltip" data-placement="bottom" title="Edit category">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>
                    <span style="">
                      <form class="form-delete" action="/admin/products/categories/<?php echo e($category['id']); ?>/delete" method="POST">
                        <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
                        <button type="submit" data-toggle="tooltip" data-placement="bottom" title="delete category"><i class="fa fa-times delete ml-1"></i></button>
                      </form>
                    </span>


                    <!--Edit category Modal -->
                    <div class="modal fade" id="item-<?php echo e($category['id']); ?>" tabindex="-1" role="dialog"
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
                                <input type="text" id="item-name-<?php echo e($category['id']); ?>" class="form-control" placeholder="category name" name="name" value="<?php echo e($category['name']); ?>">
                                <div class="input-group mt-3">
                                  <input type="submit" class="btn btn-info update-category" id="<?php echo e($category['id']); ?>"
                                  data-token="<?php echo e(App\Classes\CSRFToken::_token()); ?>" value="update">
                                </div>
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  <!-- End of edit category modal -->


                  <!--Add sub category Modal -->
                  <div class="modal fade" id="add-subcategory-<?php echo e($category['id']); ?>" tabindex="-1" role="dialog"
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
                              <input type="text" id="subcategory-name-<?php echo e($category['id']); ?>" class="form-control" placeholder="Enter new sub category">
                              <div class="input-group mt-3">
                                <input type="submit" class="btn btn-info add-subcategory" id="<?php echo e($category['id']); ?>"
                                data-token="<?php echo e(App\Classes\CSRFToken::_token()); ?>" value="Create">
                              </div>
                            </div>
                          </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                <!-- End of add sub category modal -->
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

      <?php if(isset($links)): ?>
          <?php echo $links; ?>

      <?php endif; ?>
      <?php else: ?>
        <h4>You have not created any category</h4>
      <?php endif; ?>
    </div>
  </div>
</div>


<div class="subcategory mt-5">
  <div class="row">
    <div class="col-lg">
      <h1>Sub categories</h1>
    </div>

  </div>

  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      <?php if(count($subcategories)): ?>
        <table class="table table-bordered" data-form="deleteForm">
            <tbody>
              <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($subcategory['name']); ?></td>
                  <td><?php echo e($subcategory['slug']); ?></td>
                  <td><?php echo e($subcategory['added']); ?></td>
                  <td width="100" class="text-center">
                    <span>
                      <a data-target="#item-subcategory-<?php echo e($subcategory['id']); ?>" data-toggle="modal" class="text-secondary pointer" data-toggle="tooltip" data-placement="bottom" title="Edit Subcategory">
                        <i class="fa fa-edit"></i>
                      </a>
                    </span>
                    <span  data-toggle="tooltip" data-placement="bottom" title="delete Subcategory">
                      <form class="form-delete" action="/admin/products/subcategory/<?php echo e($subcategory['id']); ?>/delete" method="POST">
                        <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
                        <button type="submit"><i class="fa fa-times delete ml-1"></i></button>
                      </form>
                    </span>


                    <!--Edit Subcategory Modal -->
                    <div class="modal fade" id="item-subcategory-<?php echo e($subcategory['id']); ?>" tabindex="-1" role="dialog"
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
                                <input type="text" id="item-subcategory-name-<?php echo e($subcategory['id']); ?>" class="form-control" placeholder="subcategory name" value="<?php echo e($subcategory['name']); ?>">
                              </div>
                                <div class="input-gorup mt-3">
                                  <div class="input-group-prepend">
                                      <label "input-group-text"  for="item-category-<?php echo e($subcategory['category_id']); ?>">Chanege Category </label>
                                  </div>
                                    <select class="custom-select" id="item-category-<?php echo e($subcategory['category_id']); ?>">
                                      <?php $__currentLoopData = App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($category->id == $subcategory['category_id']): ?>
                                          <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endif; ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="input-group mt-3">
                                  <input type="submit" class="btn btn-info update-subcategory" id="<?php echo e($subcategory['id']); ?>" data-category-id="<?php echo e($subcategory['category_id']); ?>"
                                  data-token="<?php echo e(App\Classes\CSRFToken::_token()); ?>" value="update">
                                </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  <!-- End of edit category modal -->


                  <!--Add sub category Modal -->

                <!-- End of add sub category modal -->
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

      <?php if(isset($links)): ?>
          <?php echo $subcategories_links; ?>

      <?php endif; ?>
      <?php else: ?>
        <h4>You have not created any sub category</h4>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/admin/products/categories.blade.php ENDPATH**/ ?>