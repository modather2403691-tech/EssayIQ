<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student forum | EssayIQ</title>
  <meta name="description" content="Explore writing questions, ideas and advice from the EssayIQ student community.">
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
      <a href="certifications.php">Certificates</a>
      <a href="forum.php" class="active" aria-current="page">Forum</a>
      <div class="nav-buttons">
        <span class="user-chip"><span class="avatar" aria-hidden="true">S</span>Student</span>
        <a href="../auth/logout.php" class="btn btn-ghost btn-sm">Log out</a>
      </div>
    </nav>
  </header>

  <main id="main" class="student-main">
    <div class="container">
      <div class="page-head reveal">
        <div><h1>Student forum</h1><p>Ask questions, share ideas and learn from other writers in the EssayIQ community.</p></div>
        <div class="actions"><a href="../forum/index.php" class="btn btn-primary">Explore the full forum</a></div>
      </div>

      <section class="forum-welcome glass reveal">
        <span class="forum-welcome-icon" aria-hidden="true">IQ</span>
        <div><h2>Good writing grows through conversation</h2><p>Find practical advice on planning, developing and polishing your essays.</p></div>
      </section>

      <div class="toolbar reveal">
        <div>
          <label class="lbl" for="studentForumFilter">Show</label>
          <select id="studentForumFilter" class="field forum-filter">
            <option value="all">All discussions</option><option value="question">Questions</option><option value="discussion">Discussions</option>
          </select>
        </div>
        <div>
          <label class="lbl" for="studentForumSearch">Search discussions</label>
          <input type="search" id="studentForumSearch" class="search" placeholder="Search by topic or keyword">
        </div>
      </div>

      <section class="discussion-list" id="studentDiscussionList" aria-label="Recent discussions">
        <article class="glass discussion-item reveal" data-type="question">
          <div class="discussion-author"><span class="avatar" aria-hidden="true">AM</span><span><strong>Ahmed Mohamed</strong><small>Student &middot; 10 minutes ago</small></span></div>
          <div class="discussion-body">
            <span class="pill pill-open">Question</span>
            <h2>How can I improve my essay coherence?</h2>
            <p>I have good ideas, but my paragraphs do not connect smoothly. What should I do?</p>
          </div>
          <div class="discussion-actions">
            <a href="../forum/post.php" class="link-more">3 replies <span aria-hidden="true">&rarr;</span></a>
            <button type="button" class="discussion-like" aria-pressed="false" aria-label="Like this discussion"><span aria-hidden="true">&#9825;</span> <b>5</b> likes</button>
          </div>
        </article>
        <article class="glass discussion-item reveal" data-type="discussion">
          <div class="discussion-author"><span class="avatar" aria-hidden="true">SJ</span><span><strong>Sarah James</strong><small>Student &middot; 25 minutes ago</small></span></div>
          <div class="discussion-body">
            <span class="pill pill-submitted">Discussion</span>
            <h2>What makes a strong essay introduction?</h2>
            <p>I want to make my introductions more interesting and clearly present my main argument.</p>
          </div>
          <div class="discussion-actions">
            <a href="../forum/post.php" class="link-more">7 replies <span aria-hidden="true">&rarr;</span></a>
            <button type="button" class="discussion-like" aria-pressed="false" aria-label="Like this discussion"><span aria-hidden="true">&#9825;</span> <b>12</b> likes</button>
          </div>
        </article>
        <article class="glass discussion-item reveal" data-type="question">
          <div class="discussion-author"><span class="avatar" aria-hidden="true">MK</span><span><strong>Michael Khan</strong><small>Student &middot; 1 hour ago</small></span></div>
          <div class="discussion-body">
            <span class="pill pill-open">Question</span>
            <h2>How many examples should I include?</h2>
            <p>Is there a recommended number of examples to support an argument in an academic essay?</p>
          </div>
          <div class="discussion-actions">
            <a href="../forum/post.php" class="link-more">2 replies <span aria-hidden="true">&rarr;</span></a>
            <button type="button" class="discussion-like" aria-pressed="false" aria-label="Like this discussion"><span aria-hidden="true">&#9825;</span> <b>4</b> likes</button>
          </div>
        </article>
      </section>
      <div class="empty" id="studentForumEmpty" hidden aria-live="polite"><h3>No discussions match</h3><p>Try another search or choose a different discussion type.</p></div>
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
