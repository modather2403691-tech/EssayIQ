<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Essay | EssayIQ</title>
  <meta name="description" content="Prepare an essay submission and review the grading criteria.">
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
      <a href="dashboard.php">Dashboard</a><a href="assignments.php">Assignments</a><a class="active" href="submit-essay.php" aria-current="page">Submit Essay</a><a href="progress.php">Progress</a><a href="certifications.php">Certificates</a><a href="forum.php">Forum</a>
      <div class="nav-buttons"><span class="user-chip"><span class="avatar" aria-hidden="true">A</span>Ahmed</span><a href="../index.php" class="btn btn-ghost btn-sm">Log out</a></div>
    </nav>
  </header>
  <main id="main" class="student-main"><div class="container">
    <div class="page-head reveal"><div><h1>Submit an essay</h1><p>Prepare your essay and review the assignment requirements before submitting.</p></div></div>
    <div class="alert alert-error" role="note"><strong>Static HTML preview:</strong> This page cannot save or submit essays.</div>
    <div class="submit-layout">
      <form id="essayForm" class="glass panel reveal" action="#" method="post" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        <input type="hidden" name="input_mode" id="inputMode" value="paste">
        <div class="form-grid">
          <div><label class="lbl" for="assignment">Assignment</label><select class="field" id="assignment" name="assignment" required><option value="">Choose an assignment</option><option value="1" data-min="800" data-max="1200">Argumentative essay: remote learning (Academic Writing 101)</option><option value="2" data-min="600" data-max="900">Compare and contrast: two news reports (Media Literacy)</option></select><p class="hint" id="wordLimit">Choose an assignment to see its word range</p></div>
          <div><label class="lbl" for="title">Essay title</label><input class="field" type="text" id="title" name="title" maxlength="120" placeholder="Give your essay a title" required></div>
          <div>
            <span class="lbl">Your essay</span>
            <div class="mode-switch" role="tablist" aria-label="How do you want to add your essay?"><button type="button" role="tab" class="tab active" data-mode="paste" aria-selected="true">Paste text</button><button type="button" role="tab" class="tab" data-mode="upload" aria-selected="false">Upload file</button></div>
            <div id="pastePane"><textarea class="field" id="essayText" name="essay_text" placeholder="Paste or type your essay here" aria-label="Essay text"></textarea><div class="counter" id="wordCount" aria-live="polite"><span>0 words</span><span></span></div></div>
            <div id="uploadPane" hidden><label class="dropzone" id="dropzone"><input type="file" id="essayFile" name="essay_file" accept=".txt,.docx,.pdf"><strong>Drop your file here or click to browse</strong><span>.txt, .docx or .pdf, up to 5 MB</span><span class="file-name" id="fileName"></span></label></div>
          </div>
          <label class="check" for="agree"><input type="checkbox" id="agree" name="agree" value="1"><span>I confirm this essay is my own work. I understand it would be checked for plagiarism and my instructor would be told about any matches.</span></label>
          <div><button type="button" class="btn btn-primary btn-lg" id="submitBtn" disabled>Preview only</button></div>
        </div>
      </form>
      <aside class="stack sticky-side">
        <section class="glass panel reveal" aria-labelledby="rubricTitle"><h2 id="rubricTitle">How your essay is graded</h2><p class="sub">Your instructor can adjust these weights per course.</p><ul class="rubric"><li><div class="crit-row"><span>Grammar</span><b>25%</b></div><small>Spelling, punctuation and verb agreement.</small></li><li><div class="crit-row"><span>Structure</span><b>25%</b></div><small>Introduction, paragraph flow and conclusion.</small></li><li><div class="crit-row"><span>Vocabulary</span><b>20%</b></div><small>Word choice, variety and tone.</small></li><li><div class="crit-row"><span>Argument</span><b>30%</b></div><small>Clear thesis, evidence and relevance to the prompt.</small></li></ul></section>
        <section class="glass panel reveal" aria-labelledby="nextTitle"><h2 id="nextTitle">What happens next</h2><p class="sub">Essay processing is unavailable in this static HTML version.</p><ol class="next-steps"><li><b>Plagiarism check</b>Submitted text would be checked for matching passages.</li><li><b>AI grading</b>Each criterion would receive a score and explanation.</li><li><b>Feedback</b>Suggestions would help strengthen a future draft.</li></ol></section>
      </aside>
    </div>
  </div></main>
  <footer class="footer student-footer"><div class="container footer-inner"><a href="dashboard.php" class="logo"><span>Essay<b>IQ</b></span></a><nav class="footer-links" aria-label="Footer"><a href="dashboard.php">Dashboard</a><a href="assignments.php">Assignments</a><a href="submit-essay.php">Submit Essay</a><a href="progress.php">Progress</a><a href="certifications.php">Certificates</a><a href="forum.php">Forum</a></nav><small>&copy; 2026 EssayIQ. All rights reserved.</small></div></footer>
  <script src="../assets/js/student.js"></script>
</body>
</html>