

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Academic Risk Monitor - EssayIQ    </title>

            <link
            rel="stylesheet"
            href="/EssayIQ/assets/css/admin.css?v=4"
        >
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
<div class="ieg-dashboard-layout">


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
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
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
    <main class="ieg-dashboard-content" id="main">
        <div class="ieg-dashboard-heading">
            <div>
                <h1 class="ieg-page-title">Intelligent Academic Risk Monitor</h1>
                <p class="ieg-page-description">Explainable, rule-based triage for submissions that may need human review.</p>
            </div>
        </div>
        <section class="ieg-stats-grid" aria-label="Risk summary">
            <div class="ieg-card"><p>High Priority</p><div class="ieg-stat-number">1</div></div>
            <div class="ieg-card"><p>Medium Priority</p><div class="ieg-stat-number">1</div></div>
            <div class="ieg-card"><p>Low Priority</p><div class="ieg-stat-number">2</div></div>
            <div class="ieg-card"><p>Not Assessed</p><div class="ieg-stat-number">2</div></div>
        </section>
        <section class="ieg-card ieg-dashboard-section">
            <h2 class="ieg-card-title">Risk Assessment Queue</h2>
            <p class="ieg-risk-intro">Risk is a review priority, not a verdict. A similarity percentage alone does not prove plagiarism.</p>
            <div class="ieg-risk-controls">
                <input class="ieg-input" type="search" id="riskSearch" placeholder="Search student, essay or course..." aria-label="Search submissions">
                <select class="ieg-select" id="riskFilter" aria-label="Filter risk level">
                    <option value="All">All Risk Levels</option><option value="High">High</option><option value="Medium">Medium</option><option value="Low">Low</option><option value="Not Assessed">Not Assessed</option>
                </select>
            </div>
            <div class="ieg-table-wrapper">
                <table class="ieg-table" id="riskTable">
                    <thead><tr><th>ID</th><th>Student</th><th>Essay / Course</th><th>Grade</th><th>Similarity</th><th>Status</th><th>Risk</th><th>Explanation</th></tr></thead>
                    <tbody>
                                        <tr data-risk="Low" data-search="ahmed ali impact of ai on education computer science 101">
                        <td>#101</td>
                        <td>Ahmed Ali</td>
                        <td><strong>Impact of AI on Education</strong><div class="ieg-risk-secondary">Computer Science</div></td>
                        <td>88%</td>
                        <td>12%</td>
                        <td>Graded</td>
                        <td><span class="ieg-risk-pill ieg-risk-low">Low</span></td>
                        <td><button type="button" class="ieg-btn ieg-btn-outline ieg-risk-details-btn" data-details="{&quot;student&quot;:&quot;Ahmed Ali&quot;,&quot;title&quot;:&quot;Impact of AI on Education&quot;,&quot;level&quot;:&quot;Low&quot;,&quot;reasons&quot;:[&quot;No configured risk triggers detected&quot;],&quot;recommendation&quot;:&quot;No priority review indicated by these demo rules.&quot;}">Why?</button></td>
                    </tr>
                                        <tr data-risk="Not Assessed" data-search="sara mohamed climate change essay english writing 102">
                        <td>#102</td>
                        <td>Sara Mohamed</td>
                        <td><strong>Climate Change Essay</strong><div class="ieg-risk-secondary">English Writing</div></td>
                        <td>—</td>
                        <td>—</td>
                        <td>Pending</td>
                        <td><span class="ieg-risk-pill ieg-risk-pending">Not Assessed</span></td>
                        <td><button type="button" class="ieg-btn ieg-btn-outline ieg-risk-details-btn" data-details="{&quot;student&quot;:&quot;Sara Mohamed&quot;,&quot;title&quot;:&quot;Climate Change Essay&quot;,&quot;level&quot;:&quot;Not Assessed&quot;,&quot;reasons&quot;:[&quot;Awaiting grading and similarity results&quot;],&quot;recommendation&quot;:&quot;Wait for assessment results before making a risk decision.&quot;}">Why?</button></td>
                    </tr>
                                        <tr data-risk="High" data-search="mona adel ethics in technology software engineering 103">
                        <td>#103</td>
                        <td>Mona Adel</td>
                        <td><strong>Ethics in Technology</strong><div class="ieg-risk-secondary">Software Engineering</div></td>
                        <td>62%</td>
                        <td>78%</td>
                        <td>Flagged</td>
                        <td><span class="ieg-risk-pill ieg-risk-high">High</span></td>
                        <td><button type="button" class="ieg-btn ieg-btn-outline ieg-risk-details-btn" data-details="{&quot;student&quot;:&quot;Mona Adel&quot;,&quot;title&quot;:&quot;Ethics in Technology&quot;,&quot;level&quot;:&quot;High&quot;,&quot;reasons&quot;:[&quot;Grade below 65%&quot;,&quot;Similarity of 70% or higher — source review recommended&quot;,&quot;Submission previously flagged for review&quot;],&quot;recommendation&quot;:&quot;Prioritize human review of the essay, rubric, and cited sources.&quot;}">Why?</button></td>
                    </tr>
                                        <tr data-risk="Low" data-search="omar khaled future of machine learning artificial intelligence 104">
                        <td>#104</td>
                        <td>Omar Khaled</td>
                        <td><strong>Future of Machine Learning</strong><div class="ieg-risk-secondary">Artificial Intelligence</div></td>
                        <td>94%</td>
                        <td>8%</td>
                        <td>Graded</td>
                        <td><span class="ieg-risk-pill ieg-risk-low">Low</span></td>
                        <td><button type="button" class="ieg-btn ieg-btn-outline ieg-risk-details-btn" data-details="{&quot;student&quot;:&quot;Omar Khaled&quot;,&quot;title&quot;:&quot;Future of Machine Learning&quot;,&quot;level&quot;:&quot;Low&quot;,&quot;reasons&quot;:[&quot;No configured risk triggers detected&quot;],&quot;recommendation&quot;:&quot;No priority review indicated by these demo rules.&quot;}">Why?</button></td>
                    </tr>
                                        <tr data-risk="Not Assessed" data-search="nour hassan cybersecurity challenges computer networks 105">
                        <td>#105</td>
                        <td>Nour Hassan</td>
                        <td><strong>Cybersecurity Challenges</strong><div class="ieg-risk-secondary">Computer Networks</div></td>
                        <td>—</td>
                        <td>—</td>
                        <td>Pending</td>
                        <td><span class="ieg-risk-pill ieg-risk-pending">Not Assessed</span></td>
                        <td><button type="button" class="ieg-btn ieg-btn-outline ieg-risk-details-btn" data-details="{&quot;student&quot;:&quot;Nour Hassan&quot;,&quot;title&quot;:&quot;Cybersecurity Challenges&quot;,&quot;level&quot;:&quot;Not Assessed&quot;,&quot;reasons&quot;:[&quot;Awaiting grading and similarity results&quot;],&quot;recommendation&quot;:&quot;Wait for assessment results before making a risk decision.&quot;}">Why?</button></td>
                    </tr>
                                        <tr data-risk="Medium" data-search="youssef adel social media and society english writing 106">
                        <td>#106</td>
                        <td>Youssef Adel</td>
                        <td><strong>Social Media and Society</strong><div class="ieg-risk-secondary">English Writing</div></td>
                        <td>73%</td>
                        <td>46%</td>
                        <td>Flagged</td>
                        <td><span class="ieg-risk-pill ieg-risk-medium">Medium</span></td>
                        <td><button type="button" class="ieg-btn ieg-btn-outline ieg-risk-details-btn" data-details="{&quot;student&quot;:&quot;Youssef Adel&quot;,&quot;title&quot;:&quot;Social Media and Society&quot;,&quot;level&quot;:&quot;Medium&quot;,&quot;reasons&quot;:[&quot;Grade below 75%&quot;,&quot;Similarity of 40% or higher — check citations and sources&quot;,&quot;Submission previously flagged for review&quot;],&quot;recommendation&quot;:&quot;Review the highlighted criteria and source attribution.&quot;}">Why?</button></td>
                    </tr>
                                        </tbody>
                </table>
                <p class="ieg-muted-note" id="riskEmpty" hidden>No submissions match the selected filters.</p>
            </div>
        </section>
        <section class="ieg-card ieg-dashboard-section">
            <h2 class="ieg-card-title">How Risk Levels Are Calculated</h2>
            <div class="ieg-risk-rules">
                <div><strong>Grade</strong><p>Below 65%: +2 points; 65–74%: +1 point.</p></div>
                <div><strong>Similarity</strong><p>70% or higher: +2 points; 40–69%: +1 point.</p></div>
                <div><strong>Flagged status</strong><p>Previously flagged: +1 point.</p></div>
                <div><strong>Priority</strong><p>High: 4+ points; Medium: 2–3; Low: 0–1. Pending results are not assessed.</p></div>
            </div>
            <p class="ieg-muted-note">These are illustrative thresholds, not validated academic misconduct indicators. A reviewer must inspect context and sources before deciding on any action.</p>
        </section>
    </main>
</div>
<div class="ieg-modal" id="riskModal" hidden>
    <div class="ieg-modal-content" role="dialog" aria-modal="true" aria-labelledby="riskModalTitle">
        <div class="ieg-modal-header"><h2 id="riskModalTitle">Risk Explanation</h2><button class="ieg-modal-close" type="button" id="riskClose" aria-label="Close explanation">&times;</button></div>
        <div class="ieg-modal-info">
            <p><strong>Student:</strong> <span id="riskStudent"></span></p>
            <p><strong>Essay:</strong> <span id="riskEssay"></span></p>
            <p><strong>Risk Level:</strong> <span id="riskLevel"></span></p>
            <strong>Triggered Rules</strong><ul id="riskReasons"></ul>
            <p><strong>Suggested Next Step:</strong> <span id="riskRecommendation"></span></p>
        </div>
        <button type="button" class="ieg-btn ieg-btn-primary" id="riskDone">Done</button>
    </div>
</div>
<script src="../assets/js/admin/risk-monitor.js"></script>
</body>
</html>
