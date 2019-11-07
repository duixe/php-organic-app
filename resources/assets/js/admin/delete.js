(function() {
  "use strict";

  ORGANICSTORE.admin.delete = function(){
    $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
      e.preventDefault();
      let form = $(this);
      // let textToken = $('token').data("token");

      // jQuery.noConflict();
      $('#confirm').modal('show').on('click', '#delete-btn', function() {
        form.submit();
        // console.log(textToken);
      });
    })
   }
})();
