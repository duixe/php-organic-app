(() => {
  'use strict';

  ORGANICSTORE.auth.initNavAuth = () => {
    const burger = document.querySelector('.nav__burger');
    const nav = document.querySelector('.nav__list');
    const navlinks = document.querySelectorAll('.nav__list li');


    burger.addEventListener('click', () => {
      //toggle hambugger
      nav.classList.toggle('nav__active');

      //display links
      navlinks.forEach((link, index) => {
        if (link.style.animation) {
          link.style.animation = '';
        }else {
          link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7  + 0.5}s`;
        }
      })

      burger.classList.toggle('toggle');

    });


  }

  ORGANICSTORE.auth.hideFooter = () => {

      $(".form__input2").focus(() => {
        $(".footer").hide();
      });

      $(".form__input2").focusout(() => {
        $(".footer").show();
      });
  }

  ORGANICSTORE.auth.initPassReveal = () => {
    const eyeReveal = document.querySelector(".eye");
    const passInput = document.getElementById('password');
    const hiddenOne = document.getElementById('hideone');
    const hiddenTwo = document.getElementById('hidetwo');

    eyeReveal.addEventListener('click', () => {
      if (passInput.type == "password") {
        passInput.type = "text";
        hiddenOne.style.display = "block";
        hiddenTwo.style.display = "none";
      }else {
        passInput.type = "password";
        hiddenOne.style.display = "none";
        hiddenTwo.style.display = "block";
      }
    })
  }


  ORGANICSTORE.auth.toolTip = () => {
     $("#addressArea").tooltip({
       content: 'Please make sure the address is <strong>Correct</strong>, as this address will be used to deliver your products. <strong>i.e.</strong><i>street number (possibly name or both) + street name + [suburb] + postal town + [county] + postal code</i>',
       show: {effect: "bounce", duration: 3000},
       hide: {effect: "explode", duration: 2000}

     });
  }



})();
