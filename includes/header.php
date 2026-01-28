<header class="site-header">
  <div class="container header-inner">
    <div class="brand">
      <?php
      $current = $pageKey ?? 'home';
      $logoSrc = ($current === 'home') ? 'assets/img/logo-default.png' : 'assets/img/logo.png';
      ?>
      <a href="index.php?page=home">
        <img src="<?php echo $logoSrc; ?>" alt="Azienda" class="logo" onerror="this.onerror=null;this.src='assets/images/logo.svg'">
      </a>
    </div>
    <button id="navToggle" class="nav-toggle" aria-label="Apri menu">☰</button>
    <nav id="mainNav" class="main-nav">
      <ul>
        <li class="has-submenu">
          <a href="index.php?page=il-gruppo">Gruppo</a>
          <div class="submenu" aria-hidden="true">
              <ul>
                <li><a href="index.php?page=il-gruppo-profilo">Profilo</a></li>
                <li><a href="index.php?page=il-gruppo-valori">Valori</a></li>
                <li><a href="index.php?page=il-gruppo-aree-di-attivita">Aree di attività</a></li>
              </ul>
          </div>
        </li>
        <li><a href="index.php?page=sostenibilita">Sostenibilità</a></li>
        <li><a href="index.php?page=contatti">Contatti</a></li>
      </ul>
    </nav>
  </div>
</header>