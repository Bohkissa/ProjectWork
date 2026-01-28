(function(){
  'use strict';

  function $(sel, ctx){ return (ctx || document).querySelector(sel); }
  function $all(sel, ctx){ return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }

  document.addEventListener('DOMContentLoaded', function(){
    var headerWrap = $('.site-header-wrap');
    var logoImg = $('.brand .logo');
    var mainNav = $('#mainNav');
    var navToggle = $('#navToggle');
    var submenuParent = document.querySelector('.has-submenu');
    var submenuToggle = submenuParent ? submenuParent.querySelector(':scope > a') : null;
    var submenu = submenuParent ? submenuParent.querySelector('.submenu') : null;

    var threshold = 40;
    var wasOpenOnScroll = false;
    var isHome = document.body.classList.contains('home');

    // Utility: set logo based on scrolled/clear state
    function setLogo(scrolled){
      if(!logoImg) return;
      try{
        if(!isHome){
          // non-home pages should show the light logo by default
          logoImg.src = 'assets/img/logo.png';
        } else {
          logoImg.src = scrolled ? 'assets/img/logo.png' : 'assets/img/logo-default.png';
        }
      }catch(e){}
    }

    // Header scroll behaviour: toggles scrolled if page scrolled or submenu active
    function onScroll(){
      var y = window.scrollY || window.pageYOffset;
      var submenuActive = submenuParent && submenuParent.classList.contains('submenu-active');
      var shouldBeScrolled = (y > threshold) || submenuActive;
      if(headerWrap){
        headerWrap.classList.toggle('scrolled', shouldBeScrolled);
      }
      setLogo(shouldBeScrolled);
    }

    // Nav toggle (mobile)
    if(navToggle && mainNav){
      navToggle.addEventListener('click', function(){
        mainNav.classList.toggle('open');
      });
    }

    // Submenu behaviour
    if(submenuParent && submenuToggle && submenu){
      // init aria
      submenuToggle.setAttribute('aria-haspopup','true');
      submenuToggle.setAttribute('aria-expanded','false');
      submenu.setAttribute('aria-hidden','true');

      function openSubmenu(){
        submenuParent.classList.add('submenu-open');
        submenuParent.classList.add('submenu-active');
        submenu.setAttribute('aria-hidden','false');
        submenuToggle.setAttribute('aria-expanded','true');
        wasOpenOnScroll = false;
        if(headerWrap) headerWrap.classList.add('scrolled');
        setLogo(true);
      }

      function closeSubmenu(explicit){
        submenuParent.classList.remove('submenu-open');
        submenu.setAttribute('aria-hidden','true');
        submenuToggle.setAttribute('aria-expanded','false');
        if(explicit){
          // explicit close removes active state
          submenuParent.classList.remove('submenu-active');
          try{ submenuToggle.blur(); }catch(e){}
        }
        wasOpenOnScroll = !explicit && wasOpenOnScroll;
        // update header/logo according to scroll position or active state
        if(headerWrap){
          var scrolled = (window.scrollY || window.pageYOffset) > threshold || submenuParent.classList.contains('submenu-active');
          headerWrap.classList.toggle('scrolled', scrolled);
        }
        setLogo((window.scrollY || window.pageYOffset) > threshold || submenuParent.classList.contains('submenu-active'));
      }

      // toggle on click
      submenuToggle.addEventListener('click', function(e){
        e.preventDefault();
        if(!submenuParent.classList.contains('submenu-open')){
          openSubmenu();
        } else {
          // explicit toggle close
          closeSubmenu(true);
        }
      });

      // click outside -> explicit close
      document.addEventListener('click', function(e){
        if(!submenuParent.contains(e.target)){
          closeSubmenu(true);
        }
      });

      // escape key closes explicitly
      document.addEventListener('keydown', function(e){
        if(e.key === 'Escape'){
          closeSubmenu(true);
        }
      });

      // scroll: if open, close and remember; when back to top reopen
      window.addEventListener('scroll', function(){
        if(submenuParent.classList.contains('submenu-open')){
          // close due to scroll (not explicit)
          submenuParent.classList.remove('submenu-open');
          submenu.setAttribute('aria-hidden','true');
          submenuToggle.setAttribute('aria-expanded','false');
          try{ submenuToggle.blur(); }catch(e){}
          wasOpenOnScroll = true;
        }
        // update header scrolled/logo
        onScroll();

        // if we returned to top and submenu was closed by scroll, reopen
        if((window.scrollY || window.pageYOffset) <= threshold && wasOpenOnScroll){
          openSubmenu();
          wasOpenOnScroll = false;
        }
      }, {passive:true});
    }

    // run initial sync
    onScroll();

    // expose for debugging (optional)
    window.__mainMenu = {
      openSubmenu: function(){ if(submenuParent) openSubmenu(); },
      closeSubmenu: function(){ if(submenuParent) closeSubmenu(true); }
    };
  });
})();
