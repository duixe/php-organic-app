(() => {
  'use strict';

  ORGANICSTORE.admin.update = () => {

    //update product category
    $(".update-category").on('click', (e) => {

       let token = $(".update-category").data('token');

      // //this refer to the particular btn that is clicked
       let id = $(this).attr("id");
       let id2 = e.target.id;
      //
       let name = $("#item-name-" + id2).val();


       $.ajax({
         type: 'POST',
         url: '/admin/products/categories/'+ id2 +'/edit',
         data: {token: token, name: name},
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

    //update  subcategory
    $(".update-subcategory").on('click', function(e) {

       let token = $(this).data('token');

      // //this refer to the particular btn that is clicked
       let id = $(this).attr("id");
       // let id2 = e.target.id;
       let category_id = $(this).data('category-id');
       let name = $("#item-subcategory-name-" + id).val();
       let selected_category_id = $('#item-category-' + category_id + ' option:selected').val();

       if(category_id !== selected_category_id) {
         category_id = selected_category_id;
       }


       $.ajax({
         type: 'POST',
         url: '/admin/products/subcategories/'+ id +'/edit',
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
