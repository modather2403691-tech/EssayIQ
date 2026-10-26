

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Activity Logs - EssayIQ    </title>

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
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
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
        <div class="ieg-dashboard-heading"><div>
            <h1 class="ieg-page-title">Admin Activity Logs</h1>
            <p class="ieg-page-description">Sample records and browser-only demo actions.</p>
        </div></div>
        <section class="ieg-stats-grid">
            <div class="ieg-card"><p>Total Activities</p><div class="ieg-stat-number" id="logTotal">0</div></div>
            <div class="ieg-card"><p>Information Events</p><div class="ieg-stat-number" id="logInfo">0</div></div>
            <div class="ieg-card"><p>Warning Events</p><div class="ieg-stat-number" id="logWarning">0</div></div>
            <div class="ieg-card"><p>Critical Events</p><div class="ieg-stat-number" id="logCritical">0</div></div>
        </section>
        <section class="ieg-card ieg-dashboard-section">
            <h2 class="ieg-card-title">Activity History</h2>
            <div class="ieg-quick-actions" style="margin-bottom:20px;gap:12px;flex-wrap:wrap;">
                <input id="logSearch" type="search" class="ieg-input" placeholder="Search logs..." aria-label="Search activity logs" style="max-width:340px;">
                <select id="severityFilter" class="ieg-select" aria-label="Filter severity" style="max-width:190px;">
                    <option value="All">All Severities</option><option value="Info">Info</option><option value="Warning">Warning</option><option value="Critical">Critical</option>
                </select>
                <button type="button" class="ieg-btn ieg-btn-outline" id="resetLogFilters">Reset Filters</button>
                <button type="button" class="ieg-btn ieg-btn-outline" id="clearDemoLogs">Clear Demo Actions</button>
            </div>
            <div class="ieg-table-wrapper">
                <table class="ieg-table" id="activityLogsTable">
                    <thead><tr><th>Log ID</th><th>Administrator</th><th>Action</th><th>Target</th><th>Date &amp; Time</th><th>Severity</th><th>Details</th></tr></thead>
                    <tbody></tbody>
                </table>
                <p class="ieg-muted-note" id="noLogsMessage" hidden>No activity logs match your filters.</p>
            </div>
        </section>
    </main>
</div>
<script type="application/json" id="sampleLogs">[{"id":"SAMPLE-1","admin":"System Admin","action":"Submission Review","target":"Essay #103","date":"2026-10-16 09:25","severity":"Warning","details":"Sample: opened a flagged submission for review."},{"id":"SAMPLE-2","admin":"System Admin","action":"User Viewed","target":"Ahmed Ali","date":"2026-10-15 14:40","severity":"Info","details":"Sample: viewed a student account."},{"id":"SAMPLE-3","admin":"System Admin","action":"Analytics Viewed","target":"Advanced Analytics","date":"2026-10-14 11:10","severity":"Info","details":"Sample: opened analytics."},{"id":"SAMPLE-4","admin":"System Admin","action":"Account Deactivated","target":"Mona Adel","date":"2026-10-13 13:05","severity":"Critical","details":"Sample event; no actual account was changed."},{"id":"SAMPLE-5","admin":"System Admin","action":"Profile Updated","target":"Administrator Profile","date":"2026-10-12 10:30","severity":"Info","details":"Sample profile change."}]</script>
<script src="../assets/js/admin/activity-logs.js"></script>
</body>
</html>
