(() => {
  "use strict";

  ORGANICSTORE.shop.initScrollShop = () => {
      const header = document.querySelector("header");
      const sectionOne = document.querySelector(".section-shop");

      const sectionOneOptions = {
        rootMargin: "-800px 0px 0px 0px",
      };

      const sectionOneObserver = new IntersectionObserver(function(entries, sectionOneObserver) {
        entries.forEach(entry => {
          if(!entry.isIntersecting) {
            header.classList.add("header__scrolled");
          }else {
            header.classList.remove("header__scrolled");
          }
        })
      },
      sectionOneOptions);

      sectionOneObserver.observe(sectionOne);
    }
})();
