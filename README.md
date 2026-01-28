ProjectWork — Sito informativo (Progetto didattico / universitario)

Breve descrizione
- Sito web statico/semplice dinamico realizzato come progetto didattico universitario.
- Scopo: esercitazione su architettura front-controller, accessibilità, gestione asset e componentizzazione front-end.

Scopo didattico
- Realizzato per esercitazioni/valutazione accademica; non destinato a uso commerciale senza autorizzazione.
- Include esempi pratici di routing sicuro, accessibilità e ottimizzazione front-end.

Struttura del progetto
- `index.php` — front controller e punto di ingresso.
- `pages/` — pagine principali (es. `home.php`, `contatti.php`, `sostenibilita.php`, ...).
- `includes/` — componenti riusabili (`header.php`, `footer.php`, `sidebar.php`, ...).
- `assets/` — CSS, JS, font, immagini e PDF (`assets/css/`, `assets/js/`, `assets/pdf/`, `assets/video/`).
- `data/` — eventuali file dati.
- `README.md` — questo file.

Requisiti
- PHP (versione consigliata 7.4+), server web locale come XAMPP/WAMP/MAMP.
- Browser moderni per le funzionalità JS (IntersectionObserver, scroll smooth).

Installazione locale
1. Copiare la cartella del progetto in `c:\xampp\htdocs\` (o nel document root del vostro server).
2. Avviare Apache (e PHP) tramite XAMPP o equivalente.
3. Aprire nel browser: `http://localhost/<nome-cartella>/` oppure configurare un virtual host.

Avvio
- Punto di ingresso: `index.php`. Il routing usa una whitelist per le pagine incluse (evita LFI di base).
- Per modifiche a CSS/JS, editare i file sotto `assets/` e ricaricare la pagina.

Note tecniche rilevanti
- Routing: `index.php` utilizza una mappa/whitelist per includere solo file consentiti.
- Accessibilità: componenti (es. `scroll-top`, menu) gestiscono eventi keyboard e attributi ARIA.
- Performance: uso di `IntersectionObserver` per triggerare animazioni e carichi condizionali.

Pubblicazione su GitHub (esempio)
1. Creare una repository remota su GitHub chiamata `projectwork`.
2. Collegare ed eseguire push (sostituire `USERNAME` e l'URL con i vostri):

```bash
git init
git add .
git commit -m "Initial commit — progetto didattico"
git remote add origin https://github.com/USERNAME/projectwork.git
git branch -M main
git push -u origin main
```

Licenza e uso
- Progetto didattico / universitario. Uso e riuso per fini educativi consentito; per riuso commerciale o distribuzione estesa chiedere autorizzazione all'autore o all'istituzione.

Autore
- Studente / Autore del progetto (aggiornare con nome e contatto prima della pubblicazione).

# Sito Azienda (modulare)

Istruzioni rapide:

1. Copiare la cartella in `c:\xampp\htdocs\` (già previsto qui).
2. Avviare XAMPP e attivare Apache.
3. Aprire nel browser: `http://localhost/projectwork%20v2/index.php` oppure aggiungere un virtual host.

Architettura:
- `index.php` front controller che include le pagine da `pages/`.
- `includes/` componenti riusabili: `topbar.php`, `header.php`, `footer.php`, `sidebar.php`.
- `assets/` CSS e JS.
- `data/contacts.json` contiene i messaggi inviati dal form contatti.

Estensioni possibili: integrazione mail, immagini, layout avanzati, CMS.