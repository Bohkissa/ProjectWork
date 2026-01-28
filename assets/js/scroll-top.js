(function(){
  const btn = document.querySelector('.scroll-top');
  if(!btn) return;

  function checkScroll(){
    const canScroll = document.body.scrollHeight > window.innerHeight + 50;
    if(!canScroll){
      btn.classList.remove('visible');
      return;
    }
    if(window.scrollY > 200){
      btn.classList.add('visible');
    } else {
      btn.classList.remove('visible');
    }
  }

  window.addEventListener('scroll', checkScroll, {passive:true});
  window.addEventListener('resize', checkScroll);
  document.addEventListener('DOMContentLoaded', checkScroll);

  btn.addEventListener('click', function(e){
    e.preventDefault();
    window.scrollTo({top:0, behavior:'smooth'});
  });

  btn.addEventListener('keydown', function(e){
    if(e.key === 'Enter' || e.key === ' '){
      e.preventDefault();
      btn.click();
    }
  });
})();
