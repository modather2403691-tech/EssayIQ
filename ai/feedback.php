

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        AI Feedback - EssayIQ    </title>

            <link rel="stylesheet" href="/EssayIQ/assets/css/admin.css?v=4">
        <link rel="stylesheet" href="/EssayIQ/assets/css/ai.css?v=3">
    </head>

<body class="ieg-app">
<header class="ieg-navbar ieg-admin-navbar">
  <div class="ieg-navbar-container">
    <a class="ieg-navbar-brand" href="/EssayIQ/admin/dashboard.php">
      <svg class="ieg-admin-logo" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <rect x="2" y="2" width="28" height="28" rx="9" fill="url(#iegAdminLogoGradient)"/>
        <path d="M10 11h12M10 16h8M10 21h5" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
        <circle cx="23" cy="21" r="3" fill="#fff"/>
        <defs><linearGradient id="iegAdminLogoGradient" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#22d3ee"/><stop offset="1" stop-color="#8b5cf6"/></linearGradient></defs>
      </svg>
      <span class="ieg-brand-text"><strong>Essay<span>IQ</span></strong><small>Admin Control Center</small></span>
    </a>
    <div class="ieg-admin-nav-actions">
      <span class="ieg-admin-role-label">Administrator</span>
      <a class="ieg-admin-profile ieg-admin-profile-link" href="/EssayIQ/admin/profile.php" aria-label="Open Admin Profile">
        <span class="ieg-admin-avatar ieg-avatar-photo ieg-photo-clip" id="navAdminAvatar"><span id="navAdminInitials">A</span><img id="navAdminPhoto" alt="" hidden></span>
        <span class="ieg-admin-profile-info"><strong id="navAdminName">System Admin</strong><small>Admin Account</small></span>
      </a>
      <button type="button" class="ieg-admin-logout" id="adminLogoutBtn"><span aria-hidden="true">↪</span> Logout</button>
    </div>
  </div>
</header>
<script
  src="/EssayIQ/assets/js/admin/common.js"
  data-logout-url="/EssayIQ/index.php"
></script>
<div class="ai-module"><div class="ai-layout">

<aside class="ieg-sidebar" aria-label="Module navigation">


        <div class="ieg-sidebar-section">

            <h2 class="ieg-sidebar-heading">
                Admin            </h2>



                <a
                    href="/EssayIQ/admin/dashboard.php"
                    class="ieg-sidebar-link"
                                    >
                    Dashboard                </a>



                <a
                    href="/EssayIQ/admin/users.php"
                    class="ieg-sidebar-link"
                                    >
                    Users                </a>



                <a
                    href="/EssayIQ/admin/submissions.php"
                    class="ieg-sidebar-link"
                                    >
                    Submissions                </a>



                <a
                    href="/EssayIQ/admin/analytics.php"
                    class="ieg-sidebar-link"
                                    >
                    Analytics                </a>



                <a
                    href="/EssayIQ/admin/profile.php"
                    class="ieg-sidebar-link"
                                    >
                    Profile                </a>



                <a
                    href="/EssayIQ/admin/activity-logs.php"
                    class="ieg-sidebar-link"
                                    >
                    Activity Logs                </a>



                <a
                    href="/EssayIQ/admin/risk-monitor.php"
                    class="ieg-sidebar-link"
                                    >
                    Risk Monitor                </a>


        </div>


        <div class="ieg-sidebar-section">

            <h2 class="ieg-sidebar-heading">
                AI Grading            </h2>



                <a
                    href="/EssayIQ/ai/grading.php"
                    class="ieg-sidebar-link"
                                    >
                    Grading                </a>



                <a
                    href="/EssayIQ/ai/feedback.php"
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
                    Feedback                </a>



                <a
                    href="/EssayIQ/ai/explainable-grading.php"
                    class="ieg-sidebar-link"
                                    >
                    Explainable Grading                </a>



                <a
                    href="/EssayIQ/ai/essay-comparison.php"
                    class="ieg-sidebar-link"
                                    >
                    Essay Comparison                </a>


        </div>


        <div class="ieg-sidebar-section">

            <h2 class="ieg-sidebar-heading">
                Plagiarism            </h2>



                <a
                    href="/EssayIQ/plagiarism/report.php"
                    class="ieg-sidebar-link"
                                    >
                    Similarity Report                </a>


        </div>


</aside>
<main class="ai-main" id="main">
  <a class="ai-back" href="/EssayIQ/ai/grading.php">← Back to AI Grading</a>
  <header class="ai-heading"><div><span class="ai-eyebrow">ESSAYIQ / AI FEEDBACK</span><h1>Interactive Essay Feedback</h1><p>Ahmed Ali · The Impact of Artificial Intelligence on Education</p></div><span class="ai-demo-tag">Simulated Feedback</span></header>
  <section class="ai-stats ai-stats-feedback"><article class="ai-stat"><small>Overall grade</small><strong>82/100</strong><p>Illustrative Phase 1 score</p></article><article class="ai-stat"><small>Feedback items</small><strong>4</strong><p>Client-side highlights</p></article></section>
  <section class="ai-two-column">
    <article class="ai-panel"><div class="ai-panel-heading"><div><span class="ai-section-label">INTERACTIVE ESSAY</span><h2>Highlighted review</h2></div><span class="ai-status ai-status-graded">Reviewed</span></div><p class="ai-muted">Select a highlighted phrase to view the simulated feedback category and suggestion.</p>
      <div class="ai-essay-text" aria-label="Sample essay with feedback highlights">Artificial intelligence is changing education in many ways. <button class="ai-feedback-highlight ai-feedback-grammar" type="button" data-category="Grammar" data-feedback="The sentence needs a comma before the coordinating conjunction to separate the two independent clauses.">It helps students learn faster and teachers can save time</button>. <button class="ai-feedback-highlight ai-feedback-style" type="button" data-category="Style" data-feedback="Replace the repeated word with a more precise academic expression.">Technology is useful because technology supports teachers</button>. <button class="ai-feedback-highlight ai-feedback-structure" type="button" data-category="Sentence Structure" data-feedback="Combine the short sentences to create a smoother rhythm and improve sentence variety.">Students use tools. They need guidance.</button> Finally, <button class="ai-feedback-highlight ai-feedback-content" type="button" data-category="Content" data-feedback="Add a specific classroom example to support this claim and make the conclusion more convincing.">AI should be used responsibly</button>.</div>
      <div class="ai-feedback-explanation" id="ai-feedback-explanation" aria-live="polite">No highlight selected. Feedback will appear here.</div>
    </article>
    <article class="ai-panel"><span class="ai-section-label">FEEDBACK LEGEND</span><h2>Review categories</h2><div class="ai-feedback-legend"><span class="ai-legend-grammar">Grammar</span><span class="ai-legend-style">Style</span><span class="ai-legend-structure">Sentence Structure</span><span class="ai-legend-content">Content</span></div><p class="ai-muted">Each highlight is a static interaction representing what a future AI service could identify.</p></article>
  </section>
  <section class="ai-panel"><div class="ai-panel-heading"><div><span class="ai-section-label">SUMMARY</span><h2>What the writer is doing well</h2></div></div><div class="ai-feedback-columns"><div><h3>Strengths</h3><ul><li>Strong argument structure</li><li>Good academic vocabulary</li><li>Clear introduction</li></ul></div><div><h3>Areas for improvement</h3><ul><li>Use more sentence variety</li><li>Correct minor grammar mistakes</li><li>Strengthen the conclusion</li><li>Add paragraph transitions</li></ul></div></div></section>
  <nav class="ai-panel ai-nav-links" aria-label="Feedback navigation"><a class="ai-action" href="/EssayIQ/ai/explainable-grading.php?id=101">Explain this score →</a><a class="ai-action" href="/EssayIQ/ai/essay-comparison.php?id=101">Compare before and after →</a></nav>
</main></div></div><script src="/EssayIQ/assets/js/ai/common.js?v=1" defer></script></body></html>
