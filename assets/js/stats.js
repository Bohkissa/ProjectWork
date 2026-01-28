// stats.js — anima i contatori nella sezione key-numbers
(function(){
  'use strict';

  function formatNumber(val, decimals){
    return (decimals ? val.toFixed(decimals) : Math.round(val)).toString();
  }

  function animateValue(el, target, prefix, suffix, duration){
    var start = 0;
    var startTime = null;
    var decimals = (String(target).indexOf('.') !== -1) ? (String(target).split('.')[1].length) : 0;

    function step(timestamp){
      if(!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);
      var current = start + (target - start) * progress;
      var formatted = formatNumber(current, decimals);
      // If prefix contains the approx symbol (≈) wrap it with stat-suffix so it uses the same font as %
      var renderedPrefix = '';
      if(prefix){
        if(prefix.indexOf('≈') !== -1){
          renderedPrefix = '<span class="stat-suffix">' + prefix + '</span>';
        } else {
          renderedPrefix = prefix;
        }
      }
      el.innerHTML = renderedPrefix + '<span class="stat-main">' + formatted + '</span>' + (suffix ? '<span class="stat-suffix">' + suffix + '</span>' : '');
      if(progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  function init(){
    var section = document.querySelector('.key-numbers');
    if(!section) return;
    var nums = section.querySelectorAll('.stat-number');
    var started = false;
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(entry){
        if(entry.isIntersecting && !started){
          started = true;
          nums.forEach(function(n){
            var target = parseFloat(n.getAttribute('data-target')) || 0;
            var prefix = n.getAttribute('data-prefix') || '';
            var suffix = n.getAttribute('data-suffix') || '';
            var dur = 1500 + Math.min(3000, Math.abs(target) * 10);
            animateValue(n, target, prefix, suffix, dur);
          });
          io.disconnect();
        }
      });
    }, {threshold: 0.2});
    io.observe(section);
  }

  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', init);
  } else init();
})();
