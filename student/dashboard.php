<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | EssayIQ</title>
  <meta name="description" content="Your latest grade, upcoming deadlines and writing progress at a glance.">
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
    <a href="dashboard.php" class="logo" aria-label="EssayIQ dashboard"><span>Essay<b>IQ</b></span></a>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false"><span></span><span></span><span></span></button>
    <nav class="nav-links" id="navLinks" aria-label="Student navigation">
      <a class="active" href="dashboard.php" aria-current="page">Dashboard</a><a href="assignments.php">Assignments</a><a href="submit-essay.php">Submit Essay</a><a href="progress.php">Progress</a><a href="certifications.php">Certificates</a><a href="forum.php">Forum</a>
      <div class="nav-buttons"><span class="user-chip"><span class="avatar" aria-hidden="true">A</span>Ahmed</span><a href="../index.php" class="btn btn-ghost btn-sm">Log out</a></div>
    </nav>
  </header>
  <main id="main" class="student-main"><div class="container">
    <div class="page-head reveal"><div><h1>Welcome back, Ahmed</h1><p>Here is where your writing stands today and what to work on next.</p></div><div class="actions"><a href="submit-essay.php" class="btn btn-primary">Submit an essay</a><a href="assignments.php" class="btn btn-ghost">View assignments</a></div></div>
    <section class="stat-grid" aria-label="Summary">
      <article class="glass stat reveal"><small>Essays graded</small><strong>3</strong><span>of 6 assignments</span></article>
      <article class="glass stat reveal"><small>Average score</small><strong>81</strong><span class="up">+7 since your previous essay</span></article>
      <article class="glass stat reveal"><small>Open assignments</small><strong>2</strong><span>Due in 3 days for the next one</span></article>
      <article class="glass stat reveal"><small>Certificate progress</small><strong>3 / 5</strong><span>Academic Writing Proficiency</span></article>
    </section>
    <div class="grid-2">
      <section class="glass panel reveal" aria-labelledby="latestTitle">
        <div class="panel-head"><div><h2 id="latestTitle">Latest result</h2><p class="sub">Literature review: climate policy, graded Oct 16</p></div><a class="link-more" href="progress.php">See full progress</a></div>
        <div class="result">
          <div class="score-ring" style="--score: 88" role="img" aria-label="Score 88 out of 100"><div><strong data-count="88">88</strong><small>/ 100</small></div></div>
          <div class="result-bars">
            <div class="crit" style="--v: 94"><div class="crit-row"><span>Grammar</span><b>94%</b></div><div class="bar"><i></i></div></div>
            <div class="crit" style="--v: 86"><div class="crit-row"><span>Structure</span><b>86%</b></div><div class="bar"><i></i></div></div>
            <div class="crit" style="--v: 90"><div class="crit-row"><span>Vocabulary</span><b>90%</b></div><div class="bar"><i></i></div></div>
            <div class="crit" style="--v: 82"><div class="crit-row"><span>Argument</span><b>82%</b></div><div class="bar"><i></i></div></div>
          </div>
        </div>
        <p class="tip"><b>Feedback:</b> Your thesis is clear. Add one more supporting example in the third paragraph to strengthen your argument.</p>
      </section>
      <section class="glass panel reveal" aria-labelledby="dueTitle">
        <div class="panel-head"><div><h2 id="dueTitle">Upcoming deadlines</h2><p class="sub">Open assignments, soonest first</p></div><a class="link-more" href="assignments.php">All assignments</a></div>
        <div class="rows">
          <a class="row" href="submit-essay.php?assignment=1"><span class="date-chip"><b>30</b><span>Oct</span></span><span class="row-main"><strong>Argumentative essay: remote learning</strong><small>Academic Writing 101 &middot; Due in 3 days</small></span><span class="btn btn-ghost btn-sm">Write</span></a>
          <a class="row" href="submit-essay.php?assignment=2"><span class="date-chip"><b>05</b><span>Nov</span></span><span class="row-main"><strong>Compare and contrast: two news reports</strong><small>Media Literacy &middot; Due in 9 days</small></span><span class="btn btn-ghost btn-sm">Write</span></a>
        </div>
      </section>
    </div>
    <section class="glass panel reveal panel-spaced" aria-labelledby="focusTitle">
      <div class="panel-head"><div><h2 id="focusTitle">What to improve next</h2><p class="sub">Based on feedback from your last three essays</p></div></div>
      <div class="feature-grid focus-grid">
        <div class="focus-item"><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v18M5 7h14"/><path d="M5 7l-3 7a4 4 0 0 0 6 0L5 7zM19 7l-3 7a4 4 0 0 0 6 0l-3-7z"/></svg></span><div><b>Argument strength</b><small>Back each claim with one specific example. This was the lowest criterion in your last three essays.</small></div></div>
        <div class="focus-item"><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M10 14a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1"/><path d="M14 10a4 4 0 0 0-5.7 0l-3 3a4 4 0 0 0 5.7 5.7l1-1"/></svg></span><div><b>Paragraph transitions</b><small>Start new paragraphs with a link to the previous idea so the essay reads as one line of thought.</small></div></div>
        <div class="focus-item"><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 21V4M5 4h13l-2 4 2 4H5"/></svg></span><div><b>Conclusion</b><small>Finish with what the reader should take away, not a repeat of the introduction.</small></div></div>
      </div>
    </section>
  </div></main>
  <footer class="footer student-footer"><div class="container footer-inner"><a href="dashboard.php" class="logo"><span>Essay<b>IQ</b></span></a><nav class="footer-links" aria-label="Footer"><a href="dashboard.php">Dashboard</a><a href="assignments.php">Assignments</a><a href="submit-essay.php">Submit Essay</a><a href="progress.php">Progress</a><a href="certifications.php">Certificates</a><a href="forum.php">Forum</a></nav><small>&copy; 2026 EssayIQ. All rights reserved.</small></div></footer>
  <script src="../assets/js/student.js"></script>
</body>
</html>