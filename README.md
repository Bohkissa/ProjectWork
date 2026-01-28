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