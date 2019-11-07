(function() {
  'use strict';

  ORGANICSTORE.admin.changeEvent = function() {
    $('#product-category').on('change', function() {
      let category_id = $('#product-category' + ' option:selected').val();
      $('#product-subcategory').html('Select subcategory');
      $.ajax({
        type: 'GET',
        url: '/admin/category/' + category_id + '/selected',
        data: {category_id: category_id},
        success: function(res) {
          let subcategories = jQuery.parseJSON(res);

          if (subcategories.length) {
            $.each(subcategories, function(key, value) {
              $('#product-subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
            })
          }else {
            $('#product-subcategory').append('<option value="">No record found</option>');
          }
        }
      });
    });
  }
})();
