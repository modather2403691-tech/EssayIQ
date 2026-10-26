<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essay results | EssayIQ</title>
  <meta name="description" content="Review your essay score, rubric feedback and next steps.">
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
      <a href="progress.php" class="active" aria-current="page">Progress</a>
      <a href="certifications.php">Certificates</a>
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
        <div><h1>Essay results</h1><p>Review your score and feedback, then use the rubric to plan your next steps.</p></div>
        <div class="actions"><a href="assignments.php" class="btn btn-ghost">All assignments</a><a href="progress.php" class="btn btn-primary">View progress</a></div>
      </div>

      <section class="result-overview glass reveal" aria-labelledby="resultTitle">
        <div>
          <span class="course">Research Methods</span>
          <h2 id="resultTitle">Literature review: climate policy</h2>
          <p class="sub">Graded Oct 08</p>
        </div>
        <div class="result-score" aria-label="Score 88 out of 100"><strong>88</strong><span>/ 100</span></div>
        <div class="result-grade"><span class="muted-note">Grade</span><strong>B</strong></div>
      </section>

      <div class="grid-2 panel-spaced">
        <section class="glass panel reveal" aria-labelledby="rubricTitle">
          <div class="panel-head"><div><h2 id="rubricTitle">Rubric breakdown</h2><p class="sub">Scores by writing criterion</p></div></div>
          <div class="result-bars">
            <div class="crit" style="--v: 94"><div class="crit-row"><span>Grammar</span><b>94%</b></div><div class="bar" role="progressbar" aria-label="Grammar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="94"><i></i></div></div>
            <div class="crit" style="--v: 86"><div class="crit-row"><span>Structure</span><b>86%</b></div><div class="bar" role="progressbar" aria-label="Structure" aria-valuemin="0" aria-valuemax="100" aria-valuenow="86"><i></i></div></div>
            <div class="crit" style="--v: 90"><div class="crit-row"><span>Vocabulary</span><b>90%</b></div><div class="bar" role="progressbar" aria-label="Vocabulary" aria-valuemin="0" aria-valuemax="100" aria-valuenow="90"><i></i></div></div>
            <div class="crit" style="--v: 82"><div class="crit-row"><span>Argument</span><b>82%</b></div><div class="bar" role="progressbar" aria-label="Argument" aria-valuemin="0" aria-valuemax="100" aria-valuenow="82"><i></i></div></div>
          </div>
        </section>

        <section class="glass panel reveal" aria-labelledby="feedbackTitle">
          <h2 id="feedbackTitle">Instructor feedback</h2>
          <p class="sub">A note to guide your next draft</p>
          <p class="tip">Your thesis is clear. Add one more supporting example in the third paragraph to strengthen your argument.</p>
          <h3 class="next-step-title">Keep improving</h3>
          <p class="muted-note">Compare your next essay against these criteria to see where your writing has grown.</p>
          <a href="submit-essay.php" class="btn btn-ghost btn-sm result-next-link">Submit another essay</a>
        </section>
      </div>

      <section class="glass panel reveal panel-spaced" aria-labelledby="otherResultsTitle">
        <div class="panel-head"><div><h2 id="otherResultsTitle">Other graded essays</h2><p class="sub">Browse your previous results</p></div></div>
        <div class="rows">
          <a class="row" href="results.php"><span class="row-main"><strong>Descriptive essay: a place you know</strong><small>Academic Writing 101 &middot; Sep 02</small></span><span class="score">74<small> / 100</small></span><span class="btn btn-ghost btn-sm">View</span></a>
          <a class="row" href="results.php"><span class="row-main"><strong>Opinion piece: social media and attention</strong><small>Media Literacy &middot; Sep 16</small></span><span class="score">81<small> / 100</small></span><span class="btn btn-ghost btn-sm">View</span></a>
        </div>
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
