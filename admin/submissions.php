


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Submission Management - EssayIQ    </title>

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
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
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

        <!-- PAGE HEADING -->
        <div class="ieg-dashboard-heading">
            <div>
                <h1 class="ieg-page-title">
                    Submission Management
                </h1>

                <p class="ieg-page-description">
                    Monitor essay submissions, grading results,
                    and similarity reports.
                </p>
            </div>
        </div>

        <!-- STATISTICS -->
        <section class="ieg-stats-grid">

            <div class="ieg-card">
                <p>Total Submissions</p>
                <div class="ieg-stat-number">
                    6                </div>
            </div>

            <div class="ieg-card">
                <p>Graded</p>
                <div class="ieg-stat-number">
                    2                </div>
            </div>

            <div class="ieg-card">
                <p>Pending</p>
                <div class="ieg-stat-number">
                    2                </div>
            </div>

            <div class="ieg-card">
                <p>Flagged</p>
                <div class="ieg-stat-number">
                    2                </div>
            </div>

        </section>

        <!-- SUBMISSIONS TABLE -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">
                All Submissions
            </h2>

            <!-- SEARCH AND FILTER -->
            <div class="ieg-quick-actions" style="margin-bottom: 20px;">

                <input
                    type="search"
                    id="submissionSearch"
                    class="ieg-input"
                    placeholder="Search by student or essay title..."
                    aria-label="Search submissions"
                    style="max-width: 330px;"
                >

                <select
                    id="submissionStatusFilter"
                    class="ieg-select"
                    aria-label="Filter by status"
                    style="max-width: 190px;"
                >
                    <option value="All">All Statuses</option>
                    <option value="Graded">Graded</option>
                    <option value="Pending">Pending</option>
                    <option value="Flagged">Flagged</option>
                </select>

            </div>

            <!-- TABLE -->
            <div class="ieg-table-wrapper">

                <table class="ieg-table" id="submissionsTable">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student</th>
                            <th>Essay Title</th>
                            <th>Course</th>
                            <th>Date</th>
                            <th>AI Grade</th>
                            <th>Similarity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>



                            <tr
                                data-status="Graded"
                                data-student="Ahmed Ali"
                                data-title="Impact of AI on Education"
                            >

                                <td>
                                    #101                                </td>

                                <td>
                                    Ahmed Ali                                </td>

                                <td>
                                    Impact of AI on Education                                </td>

                                <td>
                                    Computer Science                                </td>

                                <td>
                                    2026-10-10                                </td>

                                <td>
                                    88%                                </td>

                                <td>
                                    12%                                </td>

                                <td>
                                    <span class="ieg-badge ieg-badge-success">
                                        Graded                                    </span>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="ieg-btn ieg-btn-outline view-submission-btn"

                                        data-id="101"
                                        data-student="Ahmed Ali"
                                        data-title="Impact of AI on Education"
                                        data-course="Computer Science"
                                        data-date="2026-10-10"
                                        data-grade="88%"
                                        data-similarity="12%"
                                        data-status="Graded"
                                        data-note="Essay graded successfully. Minor grammar improvements suggested."
                                    >
                                        View Details
                                    </button>
                                </td>

                            </tr>



                            <tr
                                data-status="Pending"
                                data-student="Sara Mohamed"
                                data-title="Climate Change Essay"
                            >

                                <td>
                                    #102                                </td>

                                <td>
                                    Sara Mohamed                                </td>

                                <td>
                                    Climate Change Essay                                </td>

                                <td>
                                    English Writing                                </td>

                                <td>
                                    2026-10-11                                </td>

                                <td>
                                    —                                </td>

                                <td>
                                    —                                </td>

                                <td>
                                    <span class="ieg-badge ieg-badge-warning">
                                        Pending                                    </span>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="ieg-btn ieg-btn-outline view-submission-btn"

                                        data-id="102"
                                        data-student="Sara Mohamed"
                                        data-title="Climate Change Essay"
                                        data-course="English Writing"
                                        data-date="2026-10-11"
                                        data-grade="—"
                                        data-similarity="—"
                                        data-status="Pending"
                                        data-note="Waiting for grading and similarity analysis."
                                    >
                                        View Details
                                    </button>
                                </td>

                            </tr>



                            <tr
                                data-status="Flagged"
                                data-student="Mona Adel"
                                data-title="Ethics in Technology"
                            >

                                <td>
                                    #103                                </td>

                                <td>
                                    Mona Adel                                </td>

                                <td>
                                    Ethics in Technology                                </td>

                                <td>
                                    Software Engineering                                </td>

                                <td>
                                    2026-10-12                                </td>

                                <td>
                                    62%                                </td>

                                <td>
                                    78%                                </td>

                                <td>
                                    <span class="ieg-badge ieg-badge-danger">
                                        Flagged                                    </span>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="ieg-btn ieg-btn-outline view-submission-btn"

                                        data-id="103"
                                        data-student="Mona Adel"
                                        data-title="Ethics in Technology"
                                        data-course="Software Engineering"
                                        data-date="2026-10-12"
                                        data-grade="62%"
                                        data-similarity="78%"
                                        data-status="Flagged"
                                        data-note="High text similarity detected. Human review is recommended."
                                    >
                                        View Details
                                    </button>
                                </td>

                            </tr>



                            <tr
                                data-status="Graded"
                                data-student="Omar Khaled"
                                data-title="Future of Machine Learning"
                            >

                                <td>
                                    #104                                </td>

                                <td>
                                    Omar Khaled                                </td>

                                <td>
                                    Future of Machine Learning                                </td>

                                <td>
                                    Artificial Intelligence                                </td>

                                <td>
                                    2026-10-13                                </td>

                                <td>
                                    94%                                </td>

                                <td>
                                    8%                                </td>

                                <td>
                                    <span class="ieg-badge ieg-badge-success">
                                        Graded                                    </span>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="ieg-btn ieg-btn-outline view-submission-btn"

                                        data-id="104"
                                        data-student="Omar Khaled"
                                        data-title="Future of Machine Learning"
                                        data-course="Artificial Intelligence"
                                        data-date="2026-10-13"
                                        data-grade="94%"
                                        data-similarity="8%"
                                        data-status="Graded"
                                        data-note="Strong essay structure and clear supporting arguments."
                                    >
                                        View Details
                                    </button>
                                </td>

                            </tr>



                            <tr
                                data-status="Pending"
                                data-student="Nour Hassan"
                                data-title="Cybersecurity Challenges"
                            >

                                <td>
                                    #105                                </td>

                                <td>
                                    Nour Hassan                                </td>

                                <td>
                                    Cybersecurity Challenges                                </td>

                                <td>
                                    Computer Networks                                </td>

                                <td>
                                    2026-10-14                                </td>

                                <td>
                                    —                                </td>

                                <td>
                                    —                                </td>

                                <td>
                                    <span class="ieg-badge ieg-badge-warning">
                                        Pending                                    </span>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="ieg-btn ieg-btn-outline view-submission-btn"

                                        data-id="105"
                                        data-student="Nour Hassan"
                                        data-title="Cybersecurity Challenges"
                                        data-course="Computer Networks"
                                        data-date="2026-10-14"
                                        data-grade="—"
                                        data-similarity="—"
                                        data-status="Pending"
                                        data-note="Submission received and awaiting analysis."
                                    >
                                        View Details
                                    </button>
                                </td>

                            </tr>



                            <tr
                                data-status="Flagged"
                                data-student="Youssef Adel"
                                data-title="Social Media and Society"
                            >

                                <td>
                                    #106                                </td>

                                <td>
                                    Youssef Adel                                </td>

                                <td>
                                    Social Media and Society                                </td>

                                <td>
                                    English Writing                                </td>

                                <td>
                                    2026-10-15                                </td>

                                <td>
                                    73%                                </td>

                                <td>
                                    46%                                </td>

                                <td>
                                    <span class="ieg-badge ieg-badge-danger">
                                        Flagged                                    </span>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="ieg-btn ieg-btn-outline view-submission-btn"

                                        data-id="106"
                                        data-student="Youssef Adel"
                                        data-title="Social Media and Society"
                                        data-course="English Writing"
                                        data-date="2026-10-15"
                                        data-grade="73%"
                                        data-similarity="46%"
                                        data-status="Flagged"
                                        data-note="Several passages need source attribution review."
                                    >
                                        View Details
                                    </button>
                                </td>

                            </tr>


                    </tbody>
                </table>

                <p
                    id="noSubmissionsMessage"
                    class="ieg-muted-note"
                    style="display: none;"
                >
                    No submissions match your search.
                </p>

            </div>

        </section>

    </main>
</div>

<!-- SUBMISSION DETAILS MODAL -->
<div id="submissionModal" class="ieg-modal" hidden>

    <div
        class="ieg-modal-content"
        role="dialog"
        aria-modal="true"
        aria-labelledby="submissionModalTitle"
    >

        <div class="ieg-modal-header">

            <h2 id="submissionModalTitle">
                Submission Details
            </h2>

            <button
                type="button"
                id="closeSubmissionModal"
                class="ieg-modal-close"
                aria-label="Close submission details"
            >
                &times;
            </button>

        </div>

        <div class="ieg-modal-info">

            <p><strong>ID:</strong> <span id="detailSubmissionId"></span></p>

            <p><strong>Student:</strong> <span id="detailStudent"></span></p>

            <p><strong>Essay:</strong> <span id="detailTitle"></span></p>

            <p><strong>Course:</strong> <span id="detailCourse"></span></p>

            <p><strong>Date:</strong> <span id="detailDate"></span></p>

            <p><strong>AI Grade:</strong> <span id="detailGrade"></span></p>

            <p><strong>Similarity:</strong> <span id="detailSimilarity"></span></p>

            <p><strong>Status:</strong> <span id="detailStatus"></span></p>

            <p><strong>Review Note:</strong> <span id="detailNote"></span></p>

        </div>

        <button
            type="button"
            id="submissionModalDone"
            class="ieg-btn ieg-btn-primary"
        >
            Done
        </button>

    </div>
</div>

<script src="../assets/js/admin/submissions.js"></script>

</body>
</html>
