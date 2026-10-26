<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificates | EssayIQ</title>
  <meta name="description" content="Track your learning modules and progress toward your writing certificate.">
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
        <rect x="2" y="2" width="28" height="28" rx="9" fill="url(#logoGradient)"/>
        <path d="M10 11h12M10 16h8M10 21h5" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
        <circle cx="23" cy="21" r="3" fill="#fff"/>
        <defs><linearGradient id="logoGradient" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#22d3ee"/><stop offset="1" stop-color="#8b5cf6"/></linearGradient></defs>
      </svg>
      <span>Essay<b>IQ</b></span>
    </a>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false"><span></span><span></span><span></span></button>
    <nav class="nav-links" id="navLinks" aria-label="Student navigation">
      <a href="dashboard.php">Dashboard</a>
      <a href="assignments.php">Assignments</a>
      <a href="submit-essay.php">Submit Essay</a>
      <a href="progress.php">Progress</a>
      <a href="certifications.php" class="active" aria-current="page">Certificates</a>
      <a href="forum.php">Forum</a>
      <div class="nav-buttons">
        <span class="user-chip"><span class="avatar" aria-hidden="true">S</span>Student</span>
        <a href="../auth/logout.php" class="btn btn-ghost btn-sm">Log out</a>
      </div>
    </nav>
  </header>

  <main id="main" class="student-main">
    <div class="container">
      <div class="page-head reveal">
        <div>
          <h1>Your certificates</h1>
          <p>Build practical writing skills one module at a time, then earn recognition for completing the pathway.</p>
        </div>
        <div class="actions"><a href="progress.php" class="btn btn-ghost">View progress</a></div>
      </div>

      <section class="certificate-hero glass reveal" aria-labelledby="certificateTitle">
        <div class="certificate-mark" aria-hidden="true">IQ</div>
        <div class="certificate-summary">
          <span class="course">Writing pathway</span>
          <h2 id="certificateTitle">Academic Writing Proficiency</h2>
          <p>Complete all learning modules to qualify for your certificate.</p>
          <div class="certificate-progress" style="--v: 60">
            <div class="crit-row"><span>3 of 5 modules completed</span><b>60%</b></div>
            <div class="bar" role="progressbar" aria-label="Certificate completion" aria-valuemin="0" aria-valuemax="100" aria-valuenow="60"><i></i></div>
          </div>
        </div>
        <div class="certificate-status">
          <span class="pill pill-submitted">In progress</span>
          <strong>2</strong>
          <small>modules remaining</small>
        </div>
      </section>

      <section class="glass panel reveal panel-spaced" aria-labelledby="modulesTitle">
        <div class="panel-head">
          <div><h2 id="modulesTitle">Learning modules</h2><p class="sub">Your certificate pathway, in order</p></div>
          <span class="muted-note">5 modules</span>
        </div>
        <ol class="module-list">
          <li class="module-item completed">
            <span class="module-number" aria-hidden="true">&#10003;</span>
            <div class="module-copy"><h3>Building a clear thesis</h3><p>Develop a focused claim that guides the whole essay.</p></div>
            <span class="module-state">Completed</span>
          </li>
          <li class="module-item completed">
            <span class="module-number" aria-hidden="true">&#10003;</span>
            <div class="module-copy"><h3>Organizing your argument</h3><p>Arrange ideas and evidence in a logical sequence.</p></div>
            <span class="module-state">Completed</span>
          </li>
          <li class="module-item completed">
            <span class="module-number" aria-hidden="true">&#10003;</span>
            <div class="module-copy"><h3>Using evidence effectively</h3><p>Support claims with relevant sources and examples.</p></div>
            <span class="module-state">Completed</span>
          </li>
          <li class="module-item current">
            <span class="module-number" aria-hidden="true">4</span>
            <div class="module-copy"><h3>Writing with clarity</h3><p>Improve sentence flow, word choice and transitions.</p></div>
            <span class="module-state">In progress</span>
          </li>
          <li class="module-item locked">
            <span class="module-number" aria-hidden="true">5</span>
            <div class="module-copy"><h3>Revising the final draft</h3><p>Edit, proofread and prepare a polished submission.</p></div>
            <span class="module-state">Up next</span>
          </li>
        </ol>
      </section>

      <section class="glass panel reveal panel-spaced certificate-next" aria-labelledby="nextTitle">
        <div><h2 id="nextTitle">Keep your momentum</h2><p class="sub">Review your essay feedback and continue strengthening your writing skills.</p></div>
        <a href="results.php" class="btn btn-primary">Review essay feedback</a>
      </section>
    </div>
  </main>

  <footer class="footer student-footer">
    <div class="container footer-inner">
      <a href="dashboard.php" class="logo"><span>Essay<b>IQ</b></span></a>
      <nav class="footer-links" aria-label="Footer">
        <a href="dashboard.php">Dashboard</a><a href="assignments.php">Assignments</a><a href="submit-essay.php">Submit Essay</a>
        <a href="progress.php">Progress</a><a href="certifications.php">Certificates</a><a href="forum.php">Forum</a>
      </nav>
      <small>&copy; 2026 EssayIQ. All rights reserved.</small>
    </div>
  </footer>
  <script src="../assets/js/student.js"></script>
</body>
</html>
