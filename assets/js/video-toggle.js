document.addEventListener('DOMContentLoaded', function(){
  var video = document.querySelector('.hero-video');
  var vbtn = document.querySelector('.video-toggle');
  if(!video || !vbtn) return;
  vbtn.addEventListener('click', function(e){
    e.stopPropagation();
    if(video.paused){
      video.play();
      vbtn.setAttribute('aria-pressed','false');
      vbtn.title = 'Pausa video';
      var ic = vbtn.querySelector('i');
      if(ic){ ic.classList.remove('fa-play'); ic.classList.add('fa-pause'); }
    } else {
      video.pause();
      vbtn.setAttribute('aria-pressed','true');
      vbtn.title = 'Avvia video';
      var ic = vbtn.querySelector('i');
      if(ic){ ic.classList.remove('fa-pause'); ic.classList.add('fa-play'); }
    }
  });
});
