<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress | EssayIQ</title>
  <meta name="description" content="Track your essay scores, strengths and improvement areas over time.">
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
      <a href="dashboard.php">Dashboard</a><a href="assignments.php">Assignments</a><a href="submit-essay.php">Submit Essay</a><a class="active" href="progress.php" aria-current="page">Progress</a><a href="certifications.php">Certificates</a><a href="forum.php">Forum</a>
      <div class="nav-buttons"><span class="user-chip"><span class="avatar" aria-hidden="true">A</span>Ahmed</span><a href="../index.php" class="btn btn-ghost btn-sm">Log out</a></div>
    </nav>
  </header>
  <main id="main" class="student-main"><div class="container">
    <div class="page-head reveal"><div><h1>Your progress</h1><p>See how your scores change from essay to essay and where to focus next.</p></div><div class="actions"><a href="submit-essay.php" class="btn btn-primary">Submit an essay</a></div></div>
    <section class="stat-grid" aria-label="Summary">
      <article class="glass stat reveal"><small>Essays graded</small><strong>3</strong><span>this term</span></article>
      <article class="glass stat reveal"><small>Best score</small><strong>88</strong><span>out of 100</span></article>
      <article class="glass stat reveal"><small>Improvement</small><strong class="up">+14</strong><span>points since your first essay</span></article>
      <article class="glass stat reveal"><small>Certificate</small><strong>60%</strong><span>Academic Writing Proficiency</span></article>
    </section>
    <div class="grid-2">
      <section class="glass panel reveal" aria-labelledby="trendTitle"><div class="panel-head"><div><h2 id="trendTitle">Score over time</h2><p class="sub">Hover or focus a point to see the essay</p></div></div><div class="chart" id="trendChart" data-points='[{"label":"Sep 02","title":"Descriptive essay: a place you know","score":74},{"label":"Sep 16","title":"Opinion piece: social media and attention","score":81},{"label":"Oct 08","title":"Literature review: climate policy","score":88}]'></div></section>
      <section class="glass panel reveal" aria-labelledby="avgTitle">
        <h2 id="avgTitle">Average by criterion</h2><p class="sub">Across all graded essays</p>
        <div class="result-bars">
          <div class="crit" style="--v: 91"><div class="crit-row"><span>Grammar</span><b>91%</b></div><div class="bar"><i></i></div></div>
          <div class="crit" style="--v: 82"><div class="crit-row"><span>Structure</span><b>82%</b></div><div class="bar"><i></i></div></div>
          <div class="crit" style="--v: 85"><div class="crit-row"><span>Vocabulary</span><b>85%</b></div><div class="bar"><i></i></div></div>
          <div class="crit" style="--v: 78"><div class="crit-row"><span>Argument</span><b>78%</b></div><div class="bar"><i></i></div></div>
        </div>
        <div class="cert-bar" style="--v: 60"><div class="crit-row"><span>Academic Writing Proficiency</span><b>3 of 5 modules</b></div><div class="bar"><i></i></div><small class="muted-note">Finish 2 more modules to earn your certificate.</small></div>
      </section>
    </div>
    <div class="grid-2 even panel-spaced">
      <section class="glass panel reveal" aria-labelledby="focusTitle"><h2 id="focusTitle">Where to improve</h2><p class="sub">Patterns found across your essays</p>
        <div class="focus-list">
          <div class="focus-item"><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v18M5 7h14"/><path d="M5 7l-3 7a4 4 0 0 0 6 0L5 7zM19 7l-3 7a4 4 0 0 0 6 0l-3-7z"/></svg></span><div><b>Argument strength</b><small>Back each claim with one specific example. This was the lowest criterion in your last three essays.</small></div></div>
          <div class="focus-item"><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M10 14a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1"/><path d="M14 10a4 4 0 0 0-5.7 0l-3 3a4 4 0 0 0 5.7 5.7l1-1"/></svg></span><div><b>Paragraph transitions</b><small>Link each new paragraph to the idea before it so your essay flows clearly.</small></div></div>
          <div class="focus-item"><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 21V4M5 4h13l-2 4 2 4H5"/></svg></span><div><b>Conclusion</b><small>End with what the reader should take away instead of repeating your introduction.</small></div></div>
        </div>
      </section>
      <section class="glass panel reveal" aria-labelledby="histTitle"><h2 id="histTitle">Submission history</h2><p class="sub">Newest first</p>
        <div class="table-wrap"><table class="data"><thead><tr><th scope="col">Essay</th><th scope="col">Words</th><th scope="col">Similarity</th><th scope="col">Score</th></tr></thead><tbody>
          <tr><td><strong>Literature review: climate policy</strong><small>Research Methods &middot; Oct 08</small></td><td>1,340</td><td>4%</td><td class="num">88</td></tr>
          <tr><td><strong>Opinion piece: social media and attention</strong><small>Media Literacy &middot; Sep 16</small></td><td>748</td><td>5%</td><td class="num">81</td></tr>
          <tr><td><strong>Descriptive essay: a place you know</strong><small>Academic Writing 101 &middot; Sep 02</small></td><td>612</td><td>3%</td><td class="num">74</td></tr>
        </tbody></table></div>
      </section>
    </div>
  </div></main>
  <footer class="footer student-footer"><div class="container footer-inner"><a href="dashboard.php" class="logo"><span>Essay<b>IQ</b></span></a><nav class="footer-links" aria-label="Footer"><a href="dashboard.php">Dashboard</a><a href="assignments.php">Assignments</a><a href="submit-essay.php">Submit Essay</a><a href="progress.php">Progress</a><a href="certifications.php">Certificates</a><a href="forum.php">Forum</a></nav><small>&copy; 2026 EssayIQ. All rights reserved.</small></div></footer>
  <script src="../assets/js/student.js"></script>
</body>
</html>