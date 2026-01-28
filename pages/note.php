<section class="page">
  <h1>Note tecniche</h1>
  <p>Selezione di frammenti di codice degni di nota, con motivazioni tecniche e di UX.</p>

  <h2>1) Consolidamento comportamento menu — <code>assets/js/main-menu.js</code></h2>
  <p>Motivazione: unificare i vari script che gestivano header, submenu e swap del logo evita conflitti fra handler multipli, riduce la superficie di bug e migliora la manutenibilità. Note rilevanti: gestione del focus per evitare che <code>:focus-within</code> mantenga lo stato attivo, uso di listener di scroll <code>passive</code> e memoria dello stato quando il submenu viene chiuso dallo scroll (<code>wasOpenOnScroll</code>).</p>

  <pre><code>// parte di closeSubmenu: rimuove active e toglie il focus per evitare :focus-within
function closeSubmenu(explicit){
  submenuParent.classList.remove('submenu-open');
  submenu.setAttribute('aria-hidden','true');
  submenuToggle.setAttribute('aria-expanded','false');
  if(explicit){
    // chiusura esplicita: rimuove stato active
    submenuParent.classList.remove('submenu-active');
    try{ submenuToggle.blur(); }catch(e){}
  }
}
</code></pre>

  <p>Perché è interessante: la chiamata a <code>blur()</code> è una soluzione pratica per eliminare effetti visivi residui dovuti al focus (utile specialmente su desktop). Il flag <code>wasOpenOnScroll</code> permette di distinguere una chiusura esplicita da una chiusura automatica dovuta allo scroll.</p>

  <h2>2) Thema dinamico per capitoli — <code>assets/js/sustainability-colors.js</code></h2>
  <p>Motivazione: assegnare un colore primario per pagina tramite variabile CSS è una soluzione leggera e molto efficace per tematizzare pagine senza duplicare CSS.</p>

  <pre><code>(function(){
  var params = new URLSearchParams(window.location.search);
  var page = params.get('page');
  var map = {
    'sostenibilita-assetto-societario':'#a74016',
    /* ... altre mappature ... */
  };
  var color = map[page];
  if(color){
    document.documentElement.style.setProperty('--primary', color);
  }
})();
</code></pre>

  <p>Perché è interessante: semplice, a bassa complessità e compatibile con SSR/filtri URL esistenti; consente inoltre di riusare componenti visuali ricevendo lo stile dalla variabile <code>--primary</code>.</p>

  <h2>3) Pulsante scroll-top con attenzione all'accessibilità — <code>assets/js/scroll-top.js</code></h2>
  <p>Motivazione: migliora la navigazione su pagine lunghe; il codice mostra buone pratiche (controllo visibilità, listener passivi, gestione keyboard).</p>

  <pre><code>btn.addEventListener('click', function(e){
  e.preventDefault();
  window.scrollTo({top:0, behavior:'smooth'});
});

btn.addEventListener('keydown', function(e){
  if(e.key === 'Enter' || e.key === ' '){
    e.preventDefault();
    btn.click();
  }
});
</code></pre>

  <p>Perché è interessante: il supporto a tastiera (Enter / space) e l'uso di <code>behavior:'smooth'</code> migliorano UX senza librerie esterne.</p>

  <h2>4) Routing semplice e sicuro — <code>index.php</code></h2>
  <p>Motivazione: implementazione di un front controller con whitelist per evitare inclusioni arbitrarie e fornire un singolo punto di ingresso semplice da estendere.</p>

  <pre><code>$allowed = [
  'home' => 'pages/home.php',
  'contatti' => 'pages/contatti.php',
  // ... altri mapping ...
];
$pageKey = $_GET['page'] ?? 'home';
$pageFile = $allowed[$pageKey] ?? $allowed['home'];
include __DIR__ . '/' . $pageFile;
</code></pre>

  <p>Perché è interessante: minimizza rischio di Local File Inclusion (LFI) evitando include diretti basati su input non filtrato; semplice ma efficace per siti statici o lato server leggero.</p>

  <h2>5) Stile e gestione dello stato del submenu — <code>assets/css/style.css</code></h2>
  <p>Motivazione: alcune regole CSS sono sensibili (z-index, <code>!important</code>) perché il menu è posizionato su un layer fisso e deve coexistente con elementi video/hero. Esempio semplificato:</p>

  <pre><code>.has-submenu .submenu{position:fixed;left:0;right:0;top:calc(var(--topbar-h) + var(--header-h));background:var(--white);transform:translateY(-12px);opacity:0;pointer-events:none;transition:transform .32s, opacity .24s}
.has-submenu.submenu-open .submenu{transform:translateY(0);opacity:1;pointer-events:auto}
.site-header-wrap.scrolled .has-submenu.submenu-open > a{color:var(--accent) !important}
</code></pre>

  <p>Perché è interessante: l'uso di <code>position:fixed</code> e di alcune regole specifiche con <code>!important</code> serve a garantire che il submenu abbia priorità visiva e coerente comportamento anche quando l'header cambia stato (scrolled). Nota: <code>!important</code> è da usare con parsimonia — qui è stato applicato per sovrascrivere regole di stato globale e mantenere il contrasto/leggibilità.</p>

  <hr>
  <h2>6) Animazioni contatori centralizzate — <code>assets/js/stats.js</code></h2>
  <p>Estratto lo script di animazione dei contatori dalla pagina `il-gruppo-profilo.php` in `assets/js/stats.js`. Caratteristiche principali:
    <ul>
      <li>Trigger via <code>IntersectionObserver</code> (threshold 0.2) per avviare le animazioni quando la sezione entra in viewport.</li>
      <li>Animazione numerica basata su <code>requestAnimationFrame</code> con durata adattiva in base all'ordine di grandezza del target.</li>
      <li>Supporto a prefisso/suffisso (es. %, ≈, €, tCO₂) con rendering separato in <code>&lt;span class="stat-main"&gt;</code> e <code>&lt;span class="stat-suffix"&gt;</code> per poter applicare stili diversi.</li>
    </ul>
  </p>

  <h2>7) Profilo: layout full-bleed e numeri chiave</h2>
  <p>La pagina `il-gruppo-profilo.php` è stata riprogettata per includere:
    <ul>
      <li>Hero video full-bleed (`assets/video/veronesi_profilo.mp4`).</li>
      <li>Sezione profilo full-height centrata (`.profilo-fullscreen`) e sezione `I numeri chiave` a tutta larghezza (`.key-numbers`).</li>
      <li>Griglia `.stats-grid` per le statistiche con `Gilam` per il numero principale e font differente per i simboli.</li>
    </ul>
  </p>

  <h2>8) Footer e struttura dei link</h2>
  <p>Footer riorganizzato in tre colonne (loghi, link utili, sviluppatore). Dettagli implementativi:
    <ul>
      <li>Versione linkata al changelog; link utili aggiornati a `Profilo`, `Aree di attività`, `Valori`, `Contatti`, `Sostenibilità`.</li>
      <li>Ridotta la dimensione del font di `company-info` per compattezza e aumentato lo spazio tra logo principale e brand-logos.</li>
    </ul>
  </p>

  <h2>9) PDF per capitoli (Sostenibilità)</h2>
  <p>Ogni capitolo della sezione Sostenibilità ora include due pulsanti: <em>Visualizza PDF</em> (apre in nuova scheda) e <em>Scarica PDF</em> (attributo <code>download</code>). I file si trovano in <code>assets/pdf/</code> e sono stati mappati ai capitoli in ordine.</p>

  <h2>10) KPI / Metriche e infografiche</h2>
  <p>Inserite card metriche in `sostenibilita-tutela-ambiente.php` per facilitare la conversione in infografiche o grafici (contatori, barre, torte). CSS di supporto:
    <ul>
      <li>`.metrics-grid` (flex) per centrare righe incomplete.</li>
      <li>`.metric-symbol` per renderizzare simboli con un font alternativo (Rubik) separato dal numero principale.</li>
    </ul>
  </p>

</section>
