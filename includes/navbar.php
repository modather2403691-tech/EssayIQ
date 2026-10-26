<?php $baseUrl = $baseUrl ?? '/EssayIQ'; ?>
<nav class="ieg-navbar" aria-label="Main navigation">
  <div class="ieg-navbar-container">
    <a class="ieg-navbar-brand" href="<?= $baseUrl ?>/index.php">
      <span class="ieg-brand-icon" aria-hidden="true">🎓</span>
      <span class="ieg-brand-text"><strong>Essay<span>IQ</span></strong><small>Smarter Essay Grading. Powered by AI.</small></span>
    </a>
    <input class="ieg-menu-toggle" type="checkbox" id="ieg-menu-toggle" aria-label="Show navigation links">
    <label class="ieg-menu-button" for="ieg-menu-toggle" aria-hidden="true">☰</label>
    <div class="ieg-navbar-links">
      <a href="<?= $baseUrl ?>/index.php">Home</a>
      <a href="<?= $baseUrl ?>/index.php#about">About</a>
      <a href="<?= $baseUrl ?>/index.php#features">Features</a>
      <a href="<?= $baseUrl ?>/auth/login.php">Login</a>
      <a href="<?= $baseUrl ?>/auth/register.php">Register</a>
      <a class="ieg-navbar-cta" href="<?= $baseUrl ?>/auth/register.php">Get Started →</a>
    </div>
  </div>
</nav>
