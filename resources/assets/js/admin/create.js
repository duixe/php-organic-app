(function() {
  'use strict';

  ORGANICSTORE.admin.create = function() {
    //create sub category

    $(".add-subcategory").on('click', function(e) {

       // let token = $(".update-category").data('token');
       let token = $(this).data('token');

      // //this refer to the particular btn that is clicked
       let category_id = $(this).attr("id");
       let name = $("#subcategory-name-" + category_id).val();


       $.ajax({
         type: 'POST',
         url: '/admin/products/category/create',
         data: {token: token, name: name, category_id: category_id},
         // dataType: "JSON",
         success: function(data){
           let res = jQuery.parseJSON(data);
           $(".custom_notification").css("display", 'block').removeClass('callout__danger')
           .addClass('callout__primary').delay(4000).slideUp(300).html(res.success);
         },
         error: (req, err) => {
           let errors = jQuery.parseJSON(req.responseText);

           let ul = document.createElement("ul");

           $.each(errors, (key, value) => {
             let li = document.createElement("li");
             let textValue = document.createTextNode(value);
             li.appendChild(textValue);
             ul.appendChild(li);
           })
           $(".custom_notification").css("display", 'block').removeClass('callout__primary')
           .addClass('callout__danger').delay(4000).slideUp(300).html(ul);
         }
       });
      e.preventDefault()
    });
  }
})()
