document.addEventListener('DOMContentLoaded', function(){
  function getQueryParam(name){
    var params = new URLSearchParams(window.location.search);
    return params.get(name);
  }
  var langToggle = document.getElementById('langToggle');
  var langMenu = document.getElementById('langMenu');
  if(!langToggle || !langMenu) return;
  var currentLang = getQueryParam('lang') || 'it';
  var codeSpan = langToggle.querySelector('.lang-code');
  if(codeSpan) codeSpan.textContent = currentLang.toUpperCase();
  var other = currentLang === 'it' ? 'en' : 'it';
  var menuItem = langMenu.querySelector('li');
  if(menuItem) menuItem.textContent = other.toUpperCase();
  langToggle.addEventListener('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    var open = langMenu.classList.toggle('open');
    langToggle.setAttribute('aria-expanded', open);
  });
  document.addEventListener('click', function(){
    langMenu.classList.remove('open');
    langToggle.setAttribute('aria-expanded', 'false');
  });
  if(menuItem){
    menuItem.addEventListener('click', function(e){
      e.stopPropagation();
      var params = new URLSearchParams(window.location.search);
      params.set('lang', other);
      window.location.search = params.toString() ? '?' + params.toString() : '';
    });
  }
});
