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


})();
