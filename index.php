<?php
// Simple front controller with whitelist
$allowed = [
    'home' => 'pages/home.php',
    'il-gruppo' => 'pages/il-gruppo.php',
    'il-gruppo-profilo' => 'pages/il-gruppo-profilo.php',
    'il-gruppo-valori' => 'pages/il-gruppo-valori.php',
    'il-gruppo-aree-di-attivita' => 'pages/il-gruppo-aree-di-attivita.php',
    'filiera' => 'pages/filiera.php',
    'qualita' => 'pages/qualita.php',
    'sostenibilita' => 'pages/sostenibilita.php',
    'sostenibilita-assetto-societario' => 'pages/sostenibilita-assetto-societario.php',
    'sostenibilita-i-nostri-mercati' => 'pages/sostenibilita-i-nostri-mercati.php',
    'sostenibilita-percorso-di-sostenibilita' => 'pages/sostenibilita-percorso-di-sostenibilita.php',
    'sostenibilita-filiera-di-qualita' => 'pages/sostenibilita-filiera-di-qualita.php',
    'sostenibilita-le-nostre-persone' => 'pages/sostenibilita-le-nostre-persone.php',
    'sostenibilita-tutela-ambiente' => 'pages/sostenibilita-tutela-ambiente.php',
    'sostenibilita-valore-economico' => 'pages/sostenibilita-valore-economico.php',
    'sostenibilita-allegati' => 'pages/sostenibilita-allegati.php',
    'contatti' => 'pages/contatti.php',
    'changelog' => 'pages/changelog.php',
    'developer' => 'pages/developer.php',
    'note' => 'pages/note.php',
];
$pageKey = $_GET['page'] ?? 'home';
$pageFile = $allowed[$pageKey] ?? $allowed['home'];
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php
    // Build a human-friendly page title. For submenu pages under 'il-gruppo'
    // strip the 'il-gruppo-' prefix so the title shows only the subsection name.
    $titleKey = $pageKey;
    if (strpos($titleKey, 'il-gruppo-') === 0) {
        $titleKey = substr($titleKey, strlen('il-gruppo-'));
    } elseif ($titleKey === 'il-gruppo') {
        $titleKey = 'Gruppo';
    }
    $titleLabel = ucfirst(str_replace('-', ' ', $titleKey));
    ?>
    <title>Azienda - <?php echo $titleLabel; ?></title>
    <link rel="preload" href="assets/fonts/GilamDemo-Black.otf" as="font" type="font/otf" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="<?php echo $pageKey === 'home' ? 'home' : ''; ?>">
<?php include __DIR__ . '/includes/header-wrapper.php'; ?>
<main class="site-main">
    <div class="container">
        <?php include __DIR__ . '/' . $pageFile; ?>
    </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
<script src="assets/js/main-menu.js"></script>
<script src="assets/js/lang.js"></script>
<script src="assets/js/video-toggle.js"></script>
<script src="assets/js/scroll-top.js"></script>
<script src="assets/js/sustainability-colors.js"></script>
<script src="assets/js/stats.js"></script>
</body>
</html>