<?php
$pageKey = 'il-gruppo-profilo';
?>

<section class="hero" style="margin-top: calc(-1 * (var(--topbar-h) + var(--header-h)));">
  <video class="hero-video hero--profile" autoplay muted loop playsinline poster="assets/img/hero-profilo.jpg">
    <source src="assets/video/veronesi_profilo.mp4" type="video/mp4">
    Il tuo browser non supporta il video.
  </video>
  <button class="video-toggle" aria-pressed="false" aria-label="Pausa/Avvia video" title="Pausa/Avvia video">
    <i class="fa fa-pause" aria-hidden="true"></i>
  </button>
  <!-- overlay rimosso: titolo e descrizione nascosti per layout pulito -->
</section>

<section class="profilo-fullscreen">
  <div>
    <h2>Profilo aziendale</h2>
    <p>Il Gruppo Veronesi è un gruppo italiano con filiera completa e integrata che parte dalla produzione dei mangimi sino alla trasformazione e distribuzione delle uova, delle carni e dei salumi della tradizione gastronomica italiana. AIA, Negroni e Veronesi sono i tre marchi di riferimento presenti sul mercato.</p>
    <p>Moderna agro-zootecnica, innovazione di processo, utilizzo di linee produttive all'avanguardia, ricerca della massima qualità e costanti controlli in ogni fase della filiera, sono alla base del nostro Gruppo, che è espressione di una delle realtà agroalimentari d’eccellenza del saper fare italiano, in Italia e nel mondo.</p>
  </div>
</section>

<section class="key-numbers">
  <h2>I numeri chiave del 2023</h2>
  <div class="stats-grid" role="list" aria-label="Numeri chiave 2023">
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="4">0</div>
      <div class="stat-label">Miliardi di euro di fatturato</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="97.5">0</div>
      <div class="stat-label">Milioni di euro di investimenti produttivi</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="70" data-prefix="Oltre ">0</div>
      <div class="stat-label">Paesi in cui esportiamo i nostri marchi</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="15" data-suffix="%">0</div>
      <div class="stat-label">Del fatturato consolidato generato dall'export</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="18">0</div>
      <div class="stat-label">Stabilimenti produttivi alimentari</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="7">0</div>
      <div class="stat-label">Mangimifici d’eccellenza</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="18000">0</div>
      <div class="stat-label">Consegne giornaliere di prodotti per il comparto alimentare</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="8700">0</div>
      <div class="stat-label">I dipendenti del gruppo</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="7000">0</div>
      <div class="stat-label">Le PMI che lavorano con noi</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="79000">0</div>
      <div class="stat-label">Ore di formazione</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="5">0</div>
      <div class="stat-label">Impianti di digestione anaerobica</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="-826">0</div>
      <div class="stat-label">Tonnellate di CO2 grazie al recupero della carta glassine</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="2000">0</div>
      <div class="stat-label">Analisi sulle acque in autocontrollo</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="200" data-prefix="≈">0</div>
      <div class="stat-label">Persone dedicate alla qualità</div>
    </div>
    <div class="stat-item" role="listitem">
      <div class="stat-number" data-target="100" data-suffix="%">0</div>
      <div class="stat-label">Reflui dell'avicolo recuperati</div>
    </div>
  </div>
</section>

<script>
// Count-up animation for stat-number elements. Starts when key-numbers section enters viewport.
(function(){
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
      // render main number and suffix in separate spans so we can style % differently
      el.innerHTML = (prefix||'') + '<span class="stat-main">' + formatted + '</span>' + (suffix ? '<span class="stat-suffix">' + suffix + '</span>' : '');
      if(progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

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
          // choose duration based on magnitude
          var dur = 1500 + Math.min(3000, Math.abs(target) * 10);
          animateValue(n, target, prefix, suffix, dur);
        });
        io.disconnect();
      }
    });
  }, {threshold: 0.2});
  io.observe(section);
})();
</script>

