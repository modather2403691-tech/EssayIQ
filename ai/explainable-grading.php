

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Explainable AI Grading - EssayIQ    </title>

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
                    class="ieg-sidebar-link"
                                    >
                    Feedback                </a>



                <a
                    href="/EssayIQ/ai/explainable-grading.php"
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
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
  <a class="ai-back" href="/EssayIQ/ai/feedback.php?id=101">← Back to feedback</a>
  <header class="ai-heading"><div><span class="ai-eyebrow">ESSAYIQ / EXPLAINABLE AI</span><h1>Why the essay received 82/100</h1><p>Ahmed Ali · The Impact of Artificial Intelligence on Education</p></div><span class="ai-demo-tag">Prototype Simulation</span></header>
  <section class="ai-dashboard-grid"><article class="ai-panel"><span class="ai-section-label">OVERALL SCORE BREAKDOWN</span><div class="ai-overview-score"><div class="ai-score-ring" style="--score:82"><strong>82</strong><span>/100</span></div><div><h3>Overall score</h3><p>Five equally weighted criteria produce this illustrative result.</p></div></div><p class="ai-muted">This explanation is demo data for Phase 1 and is not generated by a live AI model.</p></article><article class="ai-panel"><span class="ai-section-label">CRITERION WEIGHTS</span><h2>How the score is calculated</h2><div class="ai-score-breakdown"><div><span class="ai-weight">Grammar</span><strong>20%</strong></div><div><span class="ai-weight">Sentence Structure</span><strong>20%</strong></div><div><span class="ai-weight">Style</span><strong>20%</strong></div><div><span class="ai-weight">Content</span><strong>20%</strong></div><div><span class="ai-weight">Coherence</span><strong>20%</strong></div></div></article></section>
  <section class="ai-panel"><div class="ai-panel-heading"><div><span class="ai-section-label">RUBRIC EXPLANATIONS</span><h2>Criterion-by-criterion reasoning</h2></div></div><div class="ai-explanation-grid"><article class="ai-explanation-card"><div class="ai-criterion-heading"><strong>Grammar</strong><span>18/20</span></div><div class="ai-progress"><span style="width: 90%"></span></div><p>The essay contains a small number of grammatical issues, but they do not significantly affect readability.</p></article><article class="ai-explanation-card"><div class="ai-criterion-heading"><strong>Sentence Structure</strong><span>16/20</span></div><div class="ai-progress"><span style="width: 80%"></span></div><p>Sentences are clear overall; more varied openings and lengths would improve the rhythm.</p></article><article class="ai-explanation-card"><div class="ai-criterion-heading"><strong>Style</strong><span>15/20</span></div><div class="ai-progress"><span style="width: 75%"></span></div><p>The tone is suitable for academic writing, with a few opportunities for more precise wording.</p></article><article class="ai-explanation-card"><div class="ai-criterion-heading"><strong>Content</strong><span>17/20</span></div><div class="ai-progress"><span style="width: 85%"></span></div><p>The essay presents a clear argument and supports the main idea with relevant examples.</p></article><article class="ai-explanation-card"><div class="ai-criterion-heading"><strong>Coherence</strong><span>16/20</span></div><div class="ai-progress"><span style="width: 80%"></span></div><p>The central idea is easy to follow, while transitions between paragraphs can be strengthened.</p></article></div></section>
  <nav class="ai-panel ai-nav-links"><a class="ai-action" href="/EssayIQ/ai/essay-comparison.php?id=101">Explore suggested improvements →</a><a class="ai-action" href="/EssayIQ/ai/grading.php">Return to grading dashboard →</a></nav>
</main></div></div></body></html>
