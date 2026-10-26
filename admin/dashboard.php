

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Admin Dashboard - EssayIQ    </title>

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
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
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
      <div><h1 class="ieg-page-title">Admin Dashboard</h1><p class="ieg-page-description">Monitor users, essays and system activities.</p></div>
    </div>

    <section class="ieg-stats-grid" aria-label="System statistics">
              <div class="ieg-card"><p>Total Students</p><div class="ieg-stat-number">150</div></div>
              <div class="ieg-card"><p>Total Instructors</p><div class="ieg-stat-number">12</div></div>
              <div class="ieg-card"><p>Total Essays</p><div class="ieg-stat-number">320</div></div>
              <div class="ieg-card"><p>Pending Reviews</p><div class="ieg-stat-number">18</div></div>
          </section>

    <!-- Intelligent Academic Risk Monitor: Phase 1 demo overview -->
    <section class="ieg-card ieg-dashboard-section" aria-labelledby="riskOverviewHeading">
      <div class="ieg-dashboard-heading" style="margin-bottom:18px;">
        <div>
          <h2 class="ieg-card-title" id="riskOverviewHeading">Academic Risk Overview</h2>
          <p class="ieg-page-description">Explainable review priorities based on demo grades, similarity and submission status.</p>
        </div>
        <a class="ieg-btn ieg-btn-primary" href="risk-monitor.php">View Risk Monitor</a>
      </div>

      <div class="ieg-stats-grid" aria-label="Risk level statistics">
                  <div class="ieg-card">
            <p>High Priority</p>
            <div class="ieg-stat-number">1</div>
          </div>
                  <div class="ieg-card">
            <p>Medium Priority</p>
            <div class="ieg-stat-number">1</div>
          </div>
                  <div class="ieg-card">
            <p>Low Priority</p>
            <div class="ieg-stat-number">2</div>
          </div>
                  <div class="ieg-card">
            <p>Not Assessed</p>
            <div class="ieg-stat-number">2</div>
          </div>
              </div>

      <h3 class="ieg-card-title" style="margin-top:24px;">Priority Review Queue</h3>
      <div class="ieg-table-wrapper">
        <table class="ieg-table">
          <thead><tr><th scope="col">Essay ID</th><th scope="col">Student</th><th scope="col">Essay</th><th scope="col">Grade</th><th scope="col">Similarity</th><th scope="col">Risk Level</th><th scope="col">Why Flagged?</th></tr></thead>
          <tbody>
                      <tr>
              <td>#103</td>
              <td>Mona Adel</td>
              <td>Ethics in Technology</td>
              <td>62%</td>
              <td>78%</td>
              <td><span class="ieg-badge ieg-badge-danger">High</span></td>
              <td>Grade below 65%; Similarity 70% or higher; Previously flagged</td>
            </tr>
                      <tr>
              <td>#106</td>
              <td>Youssef Adel</td>
              <td>Social Media and Society</td>
              <td>73%</td>
              <td>46%</td>
              <td><span class="ieg-badge ieg-badge-warning">Medium</span></td>
              <td>Grade below 75%; Similarity 40% or higher; Previously flagged</td>
            </tr>
                    </tbody>
        </table>
      </div>

    </section>

    <section class="ieg-card ieg-dashboard-section">
      <h2 class="ieg-card-title">Recent Submissions</h2>
      <div class="ieg-table-wrapper"><table class="ieg-table">
        <thead><tr><th scope="col">ID</th><th scope="col">Student</th><th scope="col">Assignment</th><th scope="col">Status</th><th scope="col">Grade</th></tr></thead>
        <tbody>
                  <tr>
            <td>#1024</td>
            <td>Ahmed Ali</td>
            <td>Climate Change Essay</td>
            <td><span class="ieg-badge ieg-badge-success">Graded</span></td>
            <td>88%</td>
          </tr>
                  <tr>
            <td>#1025</td>
            <td>Sara Mohamed</td>
            <td>Artificial Intelligence</td>
            <td><span class="ieg-badge ieg-badge-warning">Pending</span></td>
            <td>—</td>
          </tr>
                  <tr>
            <td>#1026</td>
            <td>Omar Hassan</td>
            <td>Online Education</td>
            <td><span class="ieg-badge ieg-badge-success">Graded</span></td>
            <td>92%</td>
          </tr>
                </tbody>
      </table></div>
    </section>

    <section class="ieg-card ieg-dashboard-section">
      <h2 class="ieg-card-title">Recent Activities</h2>
              <div class="ieg-activity-item"><div><strong>New student registered</strong><p>Ahmed Ali</p></div><span>10 minutes ago</span></div>
              <div class="ieg-activity-item"><div><strong>Essay graded successfully</strong><p>Omar Hassan</p></div><span>25 minutes ago</span></div>
              <div class="ieg-activity-item"><div><strong>Instructor account created</strong><p>Admin</p></div><span>1 hour ago</span></div>
          </section>

    <section class="ieg-card ieg-dashboard-section">
      <h2 class="ieg-card-title">Quick Actions</h2>
      <div class="ieg-quick-actions">
        <a class="ieg-btn ieg-btn-primary" href="users.php">Manage Users</a>
        <a class="ieg-btn ieg-btn-outline" href="submissions.php">View Submissions</a>
        <a class="ieg-btn ieg-btn-outline" href="analytics.php">View Analytics</a>
        <a class="ieg-btn ieg-btn-outline" href="risk-monitor.php">Risk Monitor</a>
      </div>
    </section>
  </main>
</div>
</body>
</html>
