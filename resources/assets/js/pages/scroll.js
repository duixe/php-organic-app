(() => {
  "use strict";

  ORGANICSTORE.homescroll.initScroll = () => {
      const header = document.querySelector("header");
      const sectionOne = document.querySelector(".section-landing");

      const sectionOneOptions = {
        rootMargin: "-760px 0px 0px 0px",
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

  ORGANICSTORE.homescroll.customNav = () => {
    $(".customtab__nav li").on('click', function() {
      $(".customtab__nav li").removeClass("active");
      $(this).addClass("active");
    })
  }

  ORGANICSTORE.homescroll.smoothScroll = () => {
    $('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

  }
})();
