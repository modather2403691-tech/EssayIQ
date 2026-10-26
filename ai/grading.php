

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        AI Grading Dashboard - EssayIQ    </title>

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
<div class="ai-module">
  <div class="ai-layout">


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
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
                    Grading                </a>



                <a
                    href="/EssayIQ/ai/feedback.php"
                    class="ieg-sidebar-link"
                                    >
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
      <header class="ai-heading">
        <div>
          <span class="ai-eyebrow">ESSAYIQ / AI MODULE</span>
          <h1>AI Grading Dashboard</h1>
          <p>Review a simulated essay evaluation and explore how the prototype explains its score.</p>
        </div>
        <span class="ai-demo-tag">Phase 1 Prototype</span>
      </header>

      <section class="ai-stats" aria-label="Grading summary">
        <article class="ai-stat"><span class="ai-stat-icon ai-icon-blue" aria-hidden="true">▤</span><div><small>Evaluated essays</small><strong>3</strong></div><p>Demo submissions reviewed</p></article>
        <article class="ai-stat"><span class="ai-stat-icon ai-icon-green" aria-hidden="true">✓</span><div><small>Average score</small><strong>78/100</strong></div><p>Across evaluated essays</p></article>
        <article class="ai-stat"><span class="ai-stat-icon ai-icon-purple" aria-hidden="true">◎</span><div><small>AI confidence</small><strong>91%</strong></div><p>Illustrative confidence level</p></article>
        <article class="ai-stat"><span class="ai-stat-icon ai-icon-yellow" aria-hidden="true">◷</span><div><small>Evaluation status</small><strong>Ready</strong></div><p>Static demonstration data</p></article>
      </section>

      <section class="ai-panel" aria-labelledby="evaluation-title">
        <div class="ai-panel-heading">
          <div><span class="ai-section-label">AI ESSAY EVALUATION</span><h2 id="evaluation-title">Selected essay</h2></div>
          <span class="ai-status ai-status-graded">Evaluated</span>
        </div>
        <div class="ai-essay-meta">
          <div><small>Essay title</small><strong id="overview-title">The Impact of Artificial Intelligence on Education</strong></div>
          <div><small>Student</small><strong id="overview-student">Ahmed Ali</strong></div>
          <div><small>Course</small><strong id="overview-course">Educational Technology</strong></div>
          <div><small>Assignment</small><strong id="overview-assignment">Argumentative Essay</strong></div>
          <div><small>Submission date</small><strong id="overview-date">October 12, 2026</strong></div>
        </div>
        <div class="ai-evaluation-summary">
          <div class="ai-score-card"><span>Overall score</span><strong id="overview-score">82<small>/100</small></strong><b id="overview-letter">B+</b></div>
          <div class="ai-summary-copy"><h3>Evaluation summary</h3><p id="overview-summary">A clear argument supported by relevant examples. Transitions can be smoother.</p><div class="ai-confidence"><span>AI confidence</span><strong id="overview-confidence">91%</strong><i><b style="width: 91%"></b></i></div></div>
        </div>
        <div class="ai-rubric ai-rubric-five" id="overview-criteria">
                      <article class="ai-rubric-item"><div class="ai-rubric-label"><strong>Grammar</strong><span>18/20</span></div><div class="ai-progress"><span style="width: 90%"></span></div><p>Minor grammatical issues do not affect readability.</p></article>
                      <article class="ai-rubric-item"><div class="ai-rubric-label"><strong>Sentence Structure</strong><span>16/20</span></div><div class="ai-progress"><span style="width: 80%"></span></div><p>The sentence patterns are clear with room for more variety.</p></article>
                      <article class="ai-rubric-item"><div class="ai-rubric-label"><strong>Style</strong><span>15/20</span></div><div class="ai-progress"><span style="width: 75%"></span></div><p>The academic tone is appropriate and mostly consistent.</p></article>
                      <article class="ai-rubric-item"><div class="ai-rubric-label"><strong>Content</strong><span>17/20</span></div><div class="ai-progress"><span style="width: 85%"></span></div><p>The thesis is focused and supported with relevant examples.</p></article>
                      <article class="ai-rubric-item"><div class="ai-rubric-label"><strong>Coherence</strong><span>16/20</span></div><div class="ai-progress"><span style="width: 80%"></span></div><p>Ideas progress logically, though paragraph links can improve.</p></article>
                  </div>
        <nav class="ai-inline-actions" aria-label="Evaluation details">
          <a class="ai-primary-link" href="/EssayIQ/ai/feedback.php?id=101">Open detailed feedback <span aria-hidden="true">→</span></a>
          <a class="ai-action" href="/EssayIQ/ai/explainable-grading.php?id=101">View score explanation</a>
        </nav>
      </section>

      <section class="ai-panel" aria-labelledby="submissions-title">
        <div class="ai-panel-heading"><div><span class="ai-section-label">DEMO SUBMISSIONS</span><h2 id="submissions-title">Choose an evaluation</h2><p>Use the search and filter to preview another static record.</p></div><span id="ai-result-count" class="ai-count">3 essays</span></div>
        <div class="ai-toolbar"><label class="ai-search-label"><span class="ai-visually-hidden">Search essays</span><span class="ai-search-icon" aria-hidden="true">⌕</span><input type="search" id="ai-search" placeholder="Search essays..." autocomplete="off"></label><label class="ai-filter-label"><span class="ai-visually-hidden">Filter by status</span><select id="ai-status"><option value="all">All statuses</option><option value="evaluated">Evaluated</option></select></label><button type="button" class="ai-reset" id="ai-reset">Reset</button></div>
        <div class="ai-table-scroll"><table class="ai-table"><thead><tr><th>Essay</th><th>Student</th><th>Course</th><th>Score</th><th>Status</th><th><span class="ai-visually-hidden">Actions</span></th></tr></thead><tbody id="ai-essay-rows">
                                  <tr data-id="101" data-status="evaluated" data-search="101 ahmed ali the impact of artificial intelligence on education educational technology" data-title="The Impact of Artificial Intelligence on Education" data-student="Ahmed Ali" data-course="Educational Technology" data-assignment="Argumentative Essay" data-date="October 12, 2026" data-grade="82" data-letter="B+" data-confidence="91" data-summary="A clear argument supported by relevant examples. Transitions can be smoother." data-criteria="{&quot;Grammar&quot;:[18,&quot;Minor grammatical issues do not affect readability.&quot;],&quot;Sentence Structure&quot;:[16,&quot;The sentence patterns are clear with room for more variety.&quot;],&quot;Style&quot;:[15,&quot;The academic tone is appropriate and mostly consistent.&quot;],&quot;Content&quot;:[17,&quot;The thesis is focused and supported with relevant examples.&quot;],&quot;Coherence&quot;:[16,&quot;Ideas progress logically, though paragraph links can improve.&quot;]}">
              <td><span class="ai-id">#101</span><strong class="ai-title-cell">The Impact of Artificial Intelligence on Education</strong></td><td>Ahmed Ali</td><td>Educational Technology</td><td class="ai-score-cell">82/100</td><td><span class="ai-status ai-status-graded">Evaluated</span></td><td><button type="button" class="ai-preview" data-preview-id="101">Preview <span aria-hidden="true">→</span></button></td>
            </tr>
                                  <tr data-id="103" data-status="evaluated" data-search="103 mona adel social media and student productivity digital society" data-title="Social Media and Student Productivity" data-student="Mona Adel" data-course="Digital Society" data-assignment="Critical Analysis" data-date="October 14, 2026" data-grade="62" data-letter="C-" data-confidence="88" data-summary="The main idea is understandable, but organization and evidence need improvement." data-criteria="{&quot;Grammar&quot;:[13,&quot;Several sentence-level errors affect clarity.&quot;],&quot;Sentence Structure&quot;:[12,&quot;Short and repetitive sentences limit the flow of ideas.&quot;],&quot;Style&quot;:[13,&quot;Word choice is understandable but can be more precise.&quot;],&quot;Content&quot;:[13,&quot;The position is relevant but needs stronger evidence.&quot;],&quot;Coherence&quot;:[11,&quot;Topic sentences and transitions need more development.&quot;]}">
              <td><span class="ai-id">#103</span><strong class="ai-title-cell">Social Media and Student Productivity</strong></td><td>Mona Adel</td><td>Digital Society</td><td class="ai-score-cell">62/100</td><td><span class="ai-status ai-status-graded">Evaluated</span></td><td><button type="button" class="ai-preview" data-preview-id="103">Preview <span aria-hidden="true">→</span></button></td>
            </tr>
                                  <tr data-id="104" data-status="evaluated" data-search="104 omar hassan the future of remote work professional communication" data-title="The Future of Remote Work" data-student="Omar Hassan" data-course="Professional Communication" data-assignment="Research Essay" data-date="October 15, 2026" data-grade="91" data-letter="A-" data-confidence="95" data-summary="Excellent organization, clear reasoning, and effective use of examples." data-criteria="{&quot;Grammar&quot;:[19,&quot;Sentences are accurate and well controlled.&quot;],&quot;Sentence Structure&quot;:[18,&quot;Complex structures are used naturally and effectively.&quot;],&quot;Style&quot;:[18,&quot;The professional tone is precise and consistent.&quot;],&quot;Content&quot;:[18,&quot;The analysis is detailed and supported by relevant evidence.&quot;],&quot;Coherence&quot;:[18,&quot;The argument develops smoothly from introduction to conclusion.&quot;]}">
              <td><span class="ai-id">#104</span><strong class="ai-title-cell">The Future of Remote Work</strong></td><td>Omar Hassan</td><td>Professional Communication</td><td class="ai-score-cell">91/100</td><td><span class="ai-status ai-status-graded">Evaluated</span></td><td><button type="button" class="ai-preview" data-preview-id="104">Preview <span aria-hidden="true">→</span></button></td>
            </tr>
                  </tbody></table></div>
        <p id="ai-empty" class="ai-empty" hidden>No essays match your search.</p>
      </section>
    </main>
  </div>
</div>
<script src="/EssayIQ/assets/js/ai/grading.js?v=1" defer></script>
</body>
</html>
