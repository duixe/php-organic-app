<section class="productModal" :id="/products/' + product.id" data-id="{{product.id}}">
  <div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="float-right pl-5">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8 col-lg-6 col-sm-offset-2 col-lg-offset-0 pt-40">
              <div class="modal__item">
                  <img src="/{{product.image_path}}" alt="">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<?php /**PATH /var/www/html/organicstore/resources/views/includes/product-modal.blade.php ENDPATH**/ ?>