


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Advanced Analytics - EssayIQ    </title>

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
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
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

        <!-- PAGE HEADER -->
        <div class="ieg-dashboard-heading">
            <div>
                <h1 class="ieg-page-title">Advanced Analytics</h1>
                <p class="ieg-page-description">
                    Monitor essay performance, grading trends,
                    and academic review indicators.
                </p>
            </div>

        </div>

        <!-- KPI CARDS -->
        <section class="ieg-stats-grid">

            <div class="ieg-card">
                <p>Total Users</p>
                <div class="ieg-stat-number">
                    5                </div>
                <span class="ieg-analytics-caption">
                    Registered demo accounts
                </span>
            </div>

            <div class="ieg-card">
                <p>Total Submissions</p>
                <div class="ieg-stat-number">
                    6                </div>
                <span class="ieg-analytics-caption">
                    Across all courses
                </span>
            </div>

            <div class="ieg-card">
                <p>Average AI Grade</p>
                <div class="ieg-stat-number">
                    79.3%                </div>
                <span class="ieg-analytics-caption">
                    Submissions with available grades
                </span>
            </div>

            <div class="ieg-card">
                <p>Flagged Submissions</p>
                <div class="ieg-stat-number">
                    33.3%
                </div>
                <span class="ieg-analytics-caption">
                    Require human review
                </span>
            </div>

        </section>

        <!-- CHARTS -->
        <section class="ieg-analytics-grid">

            <!-- SUBMISSION STATUS -->
            <div class="ieg-card">

                <h2 class="ieg-card-title">
                    Submission Status
                </h2>

                <p class="ieg-analytics-caption">
                    Number of essays by processing status
                </p>



                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span>
                                Graded                            </span>

                            <strong>2</strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="Graded percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="33.3">

                            <div
                                class="ieg-chart-fill ieg-bar-success"
                                style="width: 33.333333333333%;"
                            ></div>

                        </div>

                    </div>



                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span>
                                Pending                            </span>

                            <strong>2</strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="Pending percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="33.3">

                            <div
                                class="ieg-chart-fill ieg-bar-warning"
                                style="width: 33.333333333333%;"
                            ></div>

                        </div>

                    </div>



                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span>
                                Flagged                            </span>

                            <strong>2</strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="Flagged percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="33.3">

                            <div
                                class="ieg-chart-fill ieg-bar-danger"
                                style="width: 33.333333333333%;"
                            ></div>

                        </div>

                    </div>


            </div>

            <!-- GRADE DISTRIBUTION -->
            <div class="ieg-card">

                <h2 class="ieg-card-title">
                    Grade Distribution
                </h2>

                <p class="ieg-analytics-caption">
                    Number of essays in each grade range
                </p>



                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span>0-49%</span>
                            <strong>0</strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="Grade range 0-49 percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="0">

                            <div
                                class="ieg-chart-fill ieg-bar-primary"
                                style="width: 0%;"
                            ></div>

                        </div>

                    </div>



                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span>50-69%</span>
                            <strong>1</strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="Grade range 50-69 percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="25">

                            <div
                                class="ieg-chart-fill ieg-bar-primary"
                                style="width: 25%;"
                            ></div>

                        </div>

                    </div>



                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span>70-84%</span>
                            <strong>1</strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="Grade range 70-84 percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="25">

                            <div
                                class="ieg-chart-fill ieg-bar-primary"
                                style="width: 25%;"
                            ></div>

                        </div>

                    </div>



                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span>85-100%</span>
                            <strong>2</strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="Grade range 85-100 percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="50">

                            <div
                                class="ieg-chart-fill ieg-bar-primary"
                                style="width: 50%;"
                            ></div>

                        </div>

                    </div>


            </div>

        </section>

        <!-- COURSE PERFORMANCE -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">
                Course Performance
            </h2>

            <p class="ieg-analytics-caption">
                Average available essay grade per course
            </p>

            <div class="ieg-table-wrapper">

                <table class="ieg-table">

                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Graded Essays</th>
                            <th>Average Grade</th>
                            <th>Performance</th>
                        </tr>
                    </thead>

                    <tbody>



                            <tr>
                                <td>
                                    Computer Science                                </td>

                                <td>1</td>

                                <td>88%</td>

                                <td>
                                    <div class="ieg-chart-track ieg-chart-track-small">
                                        <div
                                            class="ieg-chart-fill ieg-bar-primary"
                                            style="width: 88%;"
                                        ></div>
                                    </div>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    Software Engineering                                </td>

                                <td>1</td>

                                <td>62%</td>

                                <td>
                                    <div class="ieg-chart-track ieg-chart-track-small">
                                        <div
                                            class="ieg-chart-fill ieg-bar-primary"
                                            style="width: 62%;"
                                        ></div>
                                    </div>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    Artificial Intelligence                                </td>

                                <td>1</td>

                                <td>94%</td>

                                <td>
                                    <div class="ieg-chart-track ieg-chart-track-small">
                                        <div
                                            class="ieg-chart-fill ieg-bar-primary"
                                            style="width: 94%;"
                                        ></div>
                                    </div>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    English Writing                                </td>

                                <td>1</td>

                                <td>73%</td>

                                <td>
                                    <div class="ieg-chart-track ieg-chart-track-small">
                                        <div
                                            class="ieg-chart-fill ieg-bar-primary"
                                            style="width: 73%;"
                                        ></div>
                                    </div>
                                </td>
                            </tr>


                    </tbody>

                </table>

            </div>

        </section>

        <!-- ACADEMIC INSIGHTS -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">
                Academic Insights
            </h2>

            <div class="ieg-insights-grid">

                <div class="ieg-insight-item">
                    <span class="ieg-insight-icon">📊</span>

                    <div>
                        <strong>Grading Overview</strong>
                        <p>
                            4 of
                            6                            submissions currently have grades.
                        </p>
                    </div>
                </div>

                <div class="ieg-insight-item">
                    <span class="ieg-insight-icon">⚠️</span>

                    <div>
                        <strong>Review Attention</strong>
                        <p>
                            2                            submissions are flagged for human review.
                            A similarity flag is not proof of plagiarism.
                        </p>
                    </div>
                </div>

                <div class="ieg-insight-item">
                    <span class="ieg-insight-icon">⏳</span>

                    <div>
                        <strong>Pending Workload</strong>
                        <p>
                            33.3% of submissions
                            are waiting for grading or analysis.
                        </p>
                    </div>
                </div>

            </div>


        </section>

    </main>
</div>

</body>
</html>
