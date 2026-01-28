<?php
$pageKey = 'changelog';
?>
<section class="site-section changelog">
  <div class="container">
    <h1>Changelog</h1>
    <p class="lead">Elenco delle release e modifiche: ogni voce descrive la modifica e la motivazione tecnica.</p>

    <div class="layout-with-sidebar">
      <main class="page">

        <article class="release" id="v0.1.0">
          <h2>2025-12-15 — v0.1.0-beta</h2>
          <p><strong>Modifiche:</strong> Major UI refactor per la pagina Profilo, estrazione animazioni statistiche, nuovi KPI per sostenibilità, aggiornamento footer e gestione PDF per capitoli.</p>
          <ul>
            <li>Added: `assets/js/stats.js` — script centralizzato per animazione contatori (IntersectionObserver + requestAnimationFrame). Motivazione: estrarre logica contatori da pagine e rendere riusabile l'animazione.</li>
            <li>Changed: `pages/il-gruppo-profilo.php` riprogettata con hero video full-bleed, sezione profilo full-height e sezione `I numeri chiave` full-width con griglia di statistiche.</li>
            <li>Added: metriche KPI strutturate nel capitolo Sostenibilità (cap.6) con markup `.metrics-grid` e `.metric-card` pronte per infografiche e grafici animati.</li>
            <li>Changed: `includes/footer.php` ristrutturato in 3 colonne — loghi a sinistra, link utili al centro, dati sviluppatore a destra; versione linkata al changelog.</li>
            <li>Added: supporto PDF per capitoli Sostenibilità — pulsanti Visualizza / Scarica che mappano i file in `assets/pdf/`.</li>
            <li>Style: `.profilo-fullscreen` e `.key-numbers` rese full-width; `.metric-symbol` introdotta per simboli in contatori con font alternativo.</li>
            <li>UX: rimosso titolo duplicato in `il-gruppo-valori.php` e inserito contenuto centrato per i valori aziendali.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.15">
          <h2>2025-12-14 — v0.0.15</h2>
          <p><strong>Modifiche:</strong> Refactor header/nav, consolidamento JS, riprogettazione sezione Sostenibilità e correzioni UX/performances.</p>
          <ul>
            <li>Refactor: consolidato il comportamento della navigazione in <code>assets/js/main-menu.js</code>, unificando i precedenti script di header/nav. Motivazione: eliminare conflitti tra handler multipli, semplificare il flusso degli eventi e migliorare la manutenibilità.</li>
            <li>Changed: `Il gruppo` rinominato in <em>Gruppo</em> e submenu riprogettato come barra orizzontale full-width posizionata sotto il menu principale. Apertura su click (touch-friendly), stato <em>active</em> persistente e chiusura automatica allo scroll con riapertura quando si torna in cima. Motivazione: comportamento più prevedibile su dispositivi touch e miglioria dell'usabilità per utenti con mouse/tastiera.</li>
            <li>Changed: swap dinamico del logo (chiaro/scuro) basato su stato di scroll e stato submenu; correzioni di z-index per far sì che l'header copra l'animazione di slide del submenu. Motivazione: garantire leggibilità e coerenza visiva durante le transizioni.</li>
            <li>Refactor: svuotati e marcati come <em>deprecato</em> i file obsoleti <code>assets/js/nav.js</code>, <code>assets/js/menu-submenu.js</code> e <code>assets/js/header-scroll.js</code> (sono stati lasciati nel repo con la stringa "deprecato" per rimozione manuale). Motivazione: mantenere storico sicuro ma rimuovere l'esecuzione di codice duplicato/contraddittorio.</li>
            <li>Style: separazione e consolidamento CSS (variabili in <code>assets/css/vars.css</code>, override desktop/tablet/mobile), normalizzazione tipografica (Gilam per titoli, Rubik per paragrafi) e aggiornamento di <code>--header-h</code> a 44px. Motivazione: coerenza visiva, facilità di theming e migliore controllo responsive.</li>
            <li>Added: nuova index della sezione Sostenibilità con griglia a 3 colonne di card colorate e 8 pagine capitolo dedicate. Sidebar con numerazione lead-zero, colori per capitolo e mapping colori via JS (<code>assets/js/sustainability-colors.js</code>). Motivazione: migliorare l'architettura dell'informazione e fornire evidenze cromatiche coerenti per ogni capitolo.</li>
            <li>Changed: contact page semplificata (rimosso form a favore di blocco azienda + mappa). Motivazione: ridurre l'attrito e mostrare contatti immediati quando appropriato.</li>
            <li>Added: blocchi feature alternati su homepage con variabile <code>--img-overlap</code> per controllare l'overlap delle immagini; comportamento responsive migliorato per ordine/impilamento su tablet/mobile. Motivazione: migliorare storytelling visivo e controllare l'impatto sulle dimensioni del layout.</li>
            <li>Added: pulsante sticky <code>scroll-top</code> per tornare rapidamente in cima su pagine lunghe. Motivazione: migliorare navigazione interna e usabilità su pagine con contenuti estesi.</li>
            <li>Accessibility / UX: aggiunti attributi ARIA per toggle, gestione Escape per chiusura, gestione del focus (blur) al click di chiusura per evitare effetti residui di <code>:focus-within</code>. Motivazione: migliorare fruibilità da tastiera e comportamento prevedibile dei controlli focalizzabili.</li>
            <li>Performance / Manutenibilità: ridotte le ridondanze CSS/JS, usato toggling di classi (minimizza reflow), listener di scroll in modalità <code>passive</code>, e centralizzato il comportamento del menu per ridurre il rischio di memory leak o handler duplicati. Motivazione: migliorare risposta dell'interfaccia e semplificare futuri cambiamenti.</li>
            <li>Misc: aggiornamenti font locali, hero margin fix, conversione overlap immagine a comportamento verticale dove necessario, e miglioramenti della sidebar changelog.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.13">
          <h2>2025-12-13 — v0.0.13</h2>
          <p><strong>Modifiche:</strong> Refactor CSS e comportamento mobile.</p>
          <ul>
            <li>Refactor: consolidamento regole duplicate in `assets/css/style.css` e ottimizzazione media queries. Motivazione: ridurre ridondanza e migliorare manutenibilità.</li>
            <li>Changed: comportamento mobile per topbar e nav (padding aumentato, icona menu bianca, drawer con spazio interno). Motivazione: migliorare usabilità su schermi piccoli.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.12">
          <h2>2025-12-05 — v0.0.12</h2>
          <p><strong>Modifiche:</strong> Pulizia e consolidamento finale prima delle iterazioni utente.</p>
          <ul>
            <li>Refactor: consolidamento variabili e rimozione duplicati in assets/css/style.css. Motivazione: ridurre la superficie di manutenzione e preparare il progetto per futuri temi o varianti colore.</li>
            <li>Added: pages/changelog.php (questa pagina) con registro dettagliato per tracciabilità. Motivazione: rendere esplicite le decisioni tecniche e fornire contesto per eventuali rollback o audit.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.11">
          <h2>2025-11-25 — v0.0.11</h2>
          <p><strong>Modifiche:</strong> Pagina developer, icone social e correzioni classi Font Awesome.</p>
          <ul>
            <li>Added: pages/developer.php con scheda contatto per Paolo Balzano e icone Font Awesome per campi. Motivazione: fornire una pagina professionale per contatti tecnici e trasparenza sul mantenimento.</li>
            <li>Fixed: classe icona GitHub corretta in fab fa-github. Motivazione: garantire l'uso delle classi brand corrette per evitare problemi di rendering e licensing dalle librerie di icone.</li>
            <li>Changed: social icons styled verdi con invert hover. Motivazione: distinguere CTA social mantenendo coerenza cromatica con il brand e buona leggibilità su hover.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.10">
          <h2>2025-11-18 — v0.0.10</h2>
          <p><strong>Modifiche:</strong> Topbar: lingua e menu utilità; animazione underline.</p>
          <ul>
            <li>Changed: rimosso telefono/indirizzo, aggiunto selettore lingua compatto. Motivazione: semplificare UI e preparare localizzazione leggera via querystring.</li>
            <li>Added: animazione underline 1px per link topbar. Motivazione: maggiore eleganza visiva con basso impatto sulla leggibilità.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.09">
          <h2>2025-11-10 — v0.0.09</h2>
          <p><strong>Modifiche:</strong> Comportamento header on-scroll e swap logo.</p>
          <ul>
            <li>Added: assets/js/header-scroll.js per aggiungere .scrolled e cambiare src del logo. Motivazione: mantenere header leggibile su sfondi video e dare un feedback visivo coerente durante lo scroll.</li>
            <li>Changed: variabili CSS per altezze header/topbar uniformate. Motivazione: assicurare coerenza di layout tra pagine e facilitare calcoli JS basati su altezza header.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.08">
          <h2>2025-11-02 — v0.0.08</h2>
          <p><strong>Modifiche:</strong> Video toggle UI e micro-interazioni.</p>
          <ul>
            <li>Added: pulsante play/pause 50×50 con sfondo bianco e icona verde. Motivazione: offire un controllo utente chiaro senza appesantire l'immagine, mantenendo contrasto e leggibilità.</li>
            <li>Accessibility: aggiornamento aria-pressed e stato visivo. Motivazione: migliorare esperienza per screen reader e controlli da tastiera.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.07">
          <h2>2025-10-27 — v0.0.07</h2>
          <p><strong>Modifiche:</strong> Breakdown JS in moduli single-responsibility.</p>
          <ul>
            <li>Added: assets/js/nav.js, lang.js, video-toggle.js. Motivazione: separare le responsabilità per testabilità e manutenzione e ridurre l'accoppiamento tra comportamenti.</li>
            <li>Changed: main.js reso legacy/placeholder. Motivazione: mantenere compatibilità ma incoraggiare import mirati.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.06">
          <h2>2025-10-24 — v0.0.06</h2>
          <p><strong>Modifiche:</strong> Refactor CSS — variabili e scope.</p>
          <ul>
            <li>Changed: centralizzazione colori in :root (variabili CSS). Motivazione: rendere più rapido il theming e ridurre duplicazioni di colore.</li>
            <li>Fixed: negative margin dell'hero scoping a .home .hero e padding per altre pagine. Motivazione: evitare che altre pagine perdessero spazio per il header quando l'hero non è presente.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.05">
          <h2>2025-10-21 — v0.0.05</h2>
          <p><strong>Modifiche:</strong> Wrapper header con pseudo-element per gradiente unificato.</p>
          <ul>
            <li>Added: includes/header-wrapper.php con pseudo-element unico che copre topbar+header. Motivazione: evitare incoerenze visive dovute a più elementi trasparenti e semplificare sovrapposizione su hero.</li>
            <li>Changed: riorganizzazione z-index per evitare clipping del dropdown lingua. Motivazione: dropdown deve essere sempre accessibile e non mascherato da elementi di presentazione.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.04">
          <h2>2025-10-18 — v0.0.04</h2>
          <p><strong>Modifiche:</strong> Font locali e tipografia ereditata.</p>
          <ul>
            <li>Added: assets/fonts/GilamDemo-Black.otf e AbrilFatface-Regular.ttf con @font-face. Motivazione: controllo completo del rendering tipografico senza dipendere da CDN esterni, coerenza estetica tra hero e UI.</li>
            <li>Changed: hero heading a h2 con Abril Fatface e dimensionamento specifico (4.2rem). Motivazione: migliorare semantica e rendere il titolo scalabile e più leggibile.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.03">
          <h2>2025-10-15 — v0.0.03</h2>
          <p><strong>Modifiche:</strong> Home: hero video full-bleed + overlay testuale.</p>
          <ul>
            <li>Added: video hero assets/video/veronesi-hero.mp4 con overlay testuale in pages/home.php. Motivazione: aumentare impatto visivo in pagina principale e raccontare il brand con motion.</li>
            <li>Accessibility: aria labels e controllo play/pause. Motivazione: garantire controllo utente su contenuto multimediale e migliorare esperienza su mobile.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.02">
          <h2>2025-10-12 — v0.0.02</h2>
          <p><strong>Modifiche:</strong> Implementazione topbar, header e footer riutilizzabili.</p>
          <ul>
            <li>Added: includes/topbar.php, includes/header.php, includes/footer.php. Motivazione: garantire consistenza di brand e facilitare aggiornamenti centrali.</li>
            <li>Changed: routing minimo in index.php per includere pagine dal folder pages/. Motivazione: semplice front-controller per pagine statiche/templating PHP.</li>
          </ul>
        </article>

        <article class="release" id="v0.0.01">
          <h2>2025-10-10 — v0.0.01</h2>
          <p><strong>Modifiche:</strong> Creazione iniziale del progetto e scaffolding.</p>
          <ul>
            <li>Added: struttura di base (index.php, includes/, pages/, assets/). Motivazione: separare template, risorse e pagine per manutenzione e riuso.</li>
            <li>Added: file CSS/JS placeholder. Motivazione: fornire punti di estensione per stili e comportamento progressivo.</li>
          </ul>
        </article>

        <p class="note">Nota: il registro è attivo e verrà esteso su tua indicazione.</p>
      </main>

      <aside class="sidebar changelog-sidebar" aria-label="Changelog navigation">
        <nav>
          <h3>Vai a</h3>
          <ul>
            <li>
              <details>
                <summary>Dicembre 2025 <i class="fa fa-chevron-down" aria-hidden="true"></i></summary>
                <ul>
                  <li><a href="#v0.1.0">v0.1.0-beta — 2025-12-15</a></li>
                  <li><a href="#v0.0.15">v0.0.15 — 2025-12-14</a></li>
                  <li><a href="#v0.0.14">v0.0.14 — 2025-12-13</a></li>
                  <li><a href="#v0.0.13">v0.0.13 — 2025-12-13</a></li>
                  <li><a href="#v0.0.12">v0.0.12 — 2025-12-05</a></li>
                </ul>
              </details>
            </li>
            <li>
              <details>
                <summary>Novembre 2025 <i class="fa fa-chevron-down" aria-hidden="true"></i></summary>
                <ul>
                  <li><a href="#v0.0.11">v0.0.11 — 2025-11-25</a></li>
                  <li><a href="#v0.0.10">v0.0.10 — 2025-11-18</a></li>
                  <li><a href="#v0.0.09">v0.0.09 — 2025-11-10</a></li>
                  <li><a href="#v0.0.08">v0.0.08 — 2025-11-02</a></li>
                </ul>
              </details>
            </li>
            <li>
              <details>
                <summary>Ottobre 2025 <i class="fa fa-chevron-down" aria-hidden="true"></i></summary>
                <ul>
                  <li><a href="#v0.0.07">v0.0.07 — 2025-10-27</a></li>
                  <li><a href="#v0.0.06">v0.0.06 — 2025-10-24</a></li>
                  <li><a href="#v0.0.05">v0.0.05 — 2025-10-21</a></li>
                  <li><a href="#v0.0.04">v0.0.04 — 2025-10-18</a></li>
                  <li><a href="#v0.0.03">v0.0.03 — 2025-10-15</a></li>
                  <li><a href="#v0.0.02">v0.0.02 — 2025-10-12</a></li>
                  <li><a href="#v0.0.01">v0.0.01 — 2025-10-10</a></li>
                </ul>
              </details>
            </li>
          </ul>
        </nav>
      </aside>

    </div>

  </div>
</section>

