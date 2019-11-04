
(function() {
  'use strict';

  // $(document).bootstrap();
  // $(document).admin();

  $(document).ready(() => {
    // SWITCH TO A PREFRED PAGE AT A POINT IN EXECUTION
    switch ($("body").data("page-id")) {
      case 'home':

        break;

      case 'adminCategories':
          ORGANICSTORE.admin.update();
          ORGANICSTORE.admin.delete();
          ORGANICSTORE.admin.create();

        break;
      default:

    }
  })
})();
