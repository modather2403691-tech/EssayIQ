<?php
/**
 * Shared student header: <head>, background glows and navbar.
 * Set $pageTitle, $pageDesc and $activePage before including.
 */
require_once __DIR__ . '/_data.php';

$pageTitle  = $pageTitle  ?? 'Student';
$pageDesc   = $pageDesc   ?? 'Your EssayIQ student area.';
$activePage = $activePage ?? '';

$navItems = [
    'dashboard'    => ['dashboard.php',    'Dashboard'],
    'assignments'  => ['assignments.php',  'Assignments'],
    'submit-essay' => ['submit-essay.php', 'Submit Essay'],
    'progress'     => ['progress.php',     'Progress'],
    'certifications' => ['certifications.php', 'Certificates'],
    'forum'        => ['forum.php',        'Forum'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo e($pageTitle); ?> | EssayIQ</title>
  <meta name="description" content="<?php echo e($pageDesc); ?>">
  <meta name="theme-color" content="#050816">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/index.css">
  <link rel="stylesheet" href="../assets/css/student.css">
</head>
<body class="student-page">
  <a class="skip-link" href="#main">Skip to content</a>

  <div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>
  <div class="page-glow" aria-hidden="true"><span class="g1"></span><span class="g2"></span></div>

  <header class="navbar" id="navbar">
    <a href="dashboard.php" class="logo" aria-label="EssayIQ dashboard">
      <svg class="logo-icon" viewBox="0 0 32 32" fill="none" aria-hidden="true">
        <rect x="2" y="2" width="28" height="28" rx="9" fill="url(#lg)"/>
        <path d="M10 11h12M10 16h8M10 21h5" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
        <circle cx="23" cy="21" r="3" fill="#fff"/>
        <defs>
          <linearGradient id="lg" x1="0" y1="0" x2="32" y2="32">
            <stop stop-color="#22d3ee"/><stop offset="1" stop-color="#8b5cf6"/>
          </linearGradient>
        </defs>
      </svg>
      <span>Essay<b>IQ</b></span>
    </a>

    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <nav class="nav-links" id="navLinks" aria-label="Student navigation">
      <?php foreach ($navItems as $key => [$href, $label]): ?>
        <a href="<?php echo e($href); ?>"<?php echo $key === $activePage ? ' class="active" aria-current="page"' : ''; ?>><?php echo e($label); ?></a>
      <?php endforeach; ?>
      <div class="nav-buttons">
        <span class="user-chip"><span class="avatar" aria-hidden="true"><?php echo e($initials); ?></span><?php echo e($student['name']); ?></span>
        <a href="../index.php" class="btn btn-ghost btn-sm">Log out</a>
      </div>
    </nav>
  </header>

  <main id="main" class="student-main">
    <div class="container">
