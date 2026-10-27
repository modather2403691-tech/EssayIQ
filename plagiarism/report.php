<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Similarity Report - EssayIQ</title>
    <link rel="stylesheet" href="../assets/css/plagiarism.css?v=4">
</head>
<body class="ieg-app">
<header class="ieg-navbar ieg-admin-navbar">
    <div class="ieg-navbar-container">
        <a class="ieg-navbar-brand" href="../admin/dashboard.php">
            <svg class="ieg-admin-logo" viewBox="0 0 32 32" fill="none" aria-hidden="true">
                <rect x="2" y="2" width="28" height="28" rx="9" fill="url(#logoGradient)"/>
                <path d="M10 11h12M10 16h8M10 21h5" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                <circle cx="23" cy="21" r="3" fill="#fff"/>
                <defs><linearGradient id="logoGradient" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#22d3ee"/><stop offset="1" stop-color="#8b5cf6"/></linearGradient></defs>
            </svg>
            <span class="ieg-brand-text"><strong>Essay<span>IQ</span></strong><small>Admin Control Center</small></span>
        </a>
        <div class="ieg-admin-nav-actions">
            <span class="ieg-admin-role-label">Administrator</span>
            <a class="ieg-admin-profile ieg-admin-profile-link" href="../admin/profile.php" aria-label="Open Admin Profile">
                <span class="ieg-admin-avatar">A</span>
                <span class="ieg-admin-profile-info"><strong>System Admin</strong><small>Admin Account</small></span>
            </a>
            <a class="ieg-admin-logout" href="../index.php">Logout</a>
        </div>
    </div>
</header>

<div class="ieg-dashboard-layout">
    <aside class="ieg-sidebar" aria-label="Module navigation">
        <div class="ieg-sidebar-section">
            <h2 class="ieg-sidebar-heading">Admin</h2>
            <a class="ieg-sidebar-link" href="../admin/dashboard.php">Dashboard</a>
            <a class="ieg-sidebar-link" href="../admin/users.php">Users</a>
            <a class="ieg-sidebar-link" href="../admin/submissions.php">Submissions</a>
            <a class="ieg-sidebar-link" href="../admin/analytics.php">Analytics</a>
            <a class="ieg-sidebar-link" href="../admin/profile.php">Profile</a>
            <a class="ieg-sidebar-link" href="../admin/activity-logs.php">Activity Logs</a>
            <a class="ieg-sidebar-link" href="../admin/risk-monitor.php">Risk Monitor</a>
        </div>
        <div class="ieg-sidebar-section">
            <h2 class="ieg-sidebar-heading">AI Grading</h2>
            <a class="ieg-sidebar-link" href="../ai/grading.php">Grading</a>
            <a class="ieg-sidebar-link" href="../ai/feedback.php">Feedback</a>
            <a class="ieg-sidebar-link" href="../ai/explainable-grading.php">Explainable Grading</a>
            <a class="ieg-sidebar-link" href="../ai/essay-comparison.php">Essay Comparison</a>
        </div>
        <div class="ieg-sidebar-section">
            <h2 class="ieg-sidebar-heading">Plagiarism</h2>
            <a class="ieg-sidebar-link ieg-sidebar-active" href="report.php" aria-current="page">Similarity Report</a>
        </div>
    </aside>

    <main class="ieg-dashboard-content ieg-plagiarism-content" id="main">
        <div class="ieg-dashboard-heading">
            <div>
                <h1 class="ieg-page-title">Similarity Report</h1>
                <p class="ieg-page-description">Review text matches flagged in submitted essays.</p>
            </div>
        </div>

        <div class="ieg-muted-note ieg-plagiarism-notice" role="note">
            These example scores and passages are illustrative. EssayIQ does not yet save or run live plagiarism scans. A text match is a review signal, not a finding of plagiarism.
        </div>

        <section class="ieg-stats-grid ieg-plagiarism-stats" aria-label="Similarity overview">
            <article class="ieg-card"><p>Example Reports</p><div class="ieg-stat-number">4</div><small>Sample records only</small></article>
            <article class="ieg-card"><p>High Similarity</p><div class="ieg-stat-number">1</div><small>15% or more matched text</small></article>
            <article class="ieg-card"><p>Average Similarity</p><div class="ieg-stat-number">11%</div><small>Across example reports</small></article>
            <article class="ieg-card"><p>Awaiting Scan</p><div class="ieg-stat-number">0</div><small>Live scanning is not connected</small></article>
        </section>

        <section class="ieg-card ieg-dashboard-section" aria-labelledby="reportListTitle">
            <div class="ieg-plagiarism-panel-heading">
                <div><h2 class="ieg-card-title" id="reportListTitle">Submitted Essays</h2><p class="ieg-page-description">4 example reports</p></div>
            </div>
            <div class="ieg-table-wrapper">
                <table class="ieg-table">
                    <thead><tr><th>Essay ID</th><th>Student</th><th>Essay</th><th>Assignment</th><th>Submitted</th><th>Similarity</th><th>Level</th><th>Report</th></tr></thead>
                    <tbody>
                        <tr><td>#1024</td><td>Ahmed Ali</td><td>Climate Change Essay</td><td>Environmental Studies</td><td>Oct 27, 2026</td><td><strong>28%</strong></td><td><span class="ieg-badge ieg-badge-danger">High</span></td><td><a class="ieg-plagiarism-link" href="#report-1024">View report</a></td></tr>
                        <tr><td>#1025</td><td>Sara Mohamed</td><td>Artificial Intelligence</td><td>Technology and Society</td><td>Oct 26, 2026</td><td><strong>12%</strong></td><td><span class="ieg-badge ieg-badge-warning">Review</span></td><td><a class="ieg-plagiarism-link" href="#report-1025">View report</a></td></tr>
                        <tr><td>#1026</td><td>Omar Hassan</td><td>Online Education</td><td>Education Today</td><td>Oct 25, 2026</td><td><strong>4%</strong></td><td><span class="ieg-badge ieg-badge-success">Low</span></td><td><a class="ieg-plagiarism-link" href="#report-1026">View report</a></td></tr>
                        <tr><td>#1027</td><td>Maya Ibrahim</td><td>The Value of Public Libraries</td><td>Argumentative Writing</td><td>Oct 24, 2026</td><td><strong>0%</strong></td><td><span class="ieg-badge ieg-badge-success">Low</span></td><td><a class="ieg-plagiarism-link" href="#report-1027">View report</a></td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="ieg-card ieg-dashboard-section ieg-plagiarism-detail" id="report-1024" aria-labelledby="detail-1024">
            <div class="ieg-plagiarism-panel-heading"><div><p class="ieg-plagiarism-eyebrow">REPORT #1024</p><h2 class="ieg-card-title" id="detail-1024">Climate Change Essay</h2><p class="ieg-page-description">Ahmed Ali &middot; Environmental Studies</p></div><div class="ieg-plagiarism-score"><strong>28%</strong><span>Similarity</span></div></div>
            <div class="ieg-plagiarism-matches">
                <article class="ieg-plagiarism-match"><div><strong>Sample source collection A</strong><span>17% matched</span></div><blockquote>The effects of climate change are becoming increasingly visible across the world.</blockquote></article>
                <article class="ieg-plagiarism-match"><div><strong>EssayIQ archive example</strong><span>11% matched</span></div><blockquote>Reducing emissions requires coordinated action from governments and communities.</blockquote></article>
            </div>
        </section>
        <section class="ieg-card ieg-dashboard-section ieg-plagiarism-detail" id="report-1025" aria-labelledby="detail-1025">
            <div class="ieg-plagiarism-panel-heading"><div><p class="ieg-plagiarism-eyebrow">REPORT #1025</p><h2 class="ieg-card-title" id="detail-1025">Artificial Intelligence</h2><p class="ieg-page-description">Sara Mohamed &middot; Technology and Society</p></div><div class="ieg-plagiarism-score"><strong>12%</strong><span>Similarity</span></div></div>
            <div class="ieg-plagiarism-matches"><article class="ieg-plagiarism-match"><div><strong>Sample source collection B</strong><span>12% matched</span></div><blockquote>Artificial intelligence can support routine work when people remain responsible for important decisions.</blockquote></article></div>
        </section>
        <section class="ieg-card ieg-dashboard-section ieg-plagiarism-detail" id="report-1026" aria-labelledby="detail-1026">
            <div class="ieg-plagiarism-panel-heading"><div><p class="ieg-plagiarism-eyebrow">REPORT #1026</p><h2 class="ieg-card-title" id="detail-1026">Online Education</h2><p class="ieg-page-description">Omar Hassan &middot; Education Today</p></div><div class="ieg-plagiarism-score"><strong>4%</strong><span>Similarity</span></div></div>
            <div class="ieg-plagiarism-matches"><article class="ieg-plagiarism-match"><div><strong>Sample source collection C</strong><span>4% matched</span></div><blockquote>Online courses give students more flexibility in when and where they study.</blockquote></article></div>
        </section>
        <section class="ieg-card ieg-dashboard-section ieg-plagiarism-detail" id="report-1027" aria-labelledby="detail-1027">
            <div class="ieg-plagiarism-panel-heading"><div><p class="ieg-plagiarism-eyebrow">REPORT #1027</p><h2 class="ieg-card-title" id="detail-1027">The Value of Public Libraries</h2><p class="ieg-page-description">Maya Ibrahim &middot; Argumentative Writing</p></div><div class="ieg-plagiarism-score"><strong>0%</strong><span>Similarity</span></div></div>
            <p class="ieg-plagiarism-empty">No matching passages in this example report.</p>
        </section>
    </main>
</div>
</body>
</html>