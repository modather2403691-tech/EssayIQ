


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Advanced User Management - EssayIQ    </title>

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
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
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

        <!-- PAGE HEADING -->
        <div class="ieg-dashboard-heading">
            <div>
                <h1 class="ieg-page-title">
                    Advanced User Management
                </h1>

                <p class="ieg-page-description">
                    View accounts, manage roles and statuses, and review demo actions.
                </p>
            </div>
        </div>

        <!-- USER STATISTICS -->
        <section class="ieg-stats-grid">

            <div class="ieg-card">
                <p>Total Users</p>
                <div class="ieg-stat-number" id="totalUserCount">
                    5                </div>
            </div>

            <div class="ieg-card">
                <p>Students</p>
                <div class="ieg-stat-number" id="studentCount">
                    3                </div>
            </div>

            <div class="ieg-card">
                <p>Instructors</p>
                <div class="ieg-stat-number" id="instructorCount">
                    1                </div>
            </div>

            <div class="ieg-card">
                <p>Active Users</p>
                <div class="ieg-stat-number" id="activeCount">
                    4                </div>
            </div>

        </section>

        <!-- USER MANAGEMENT TABLE -->
        <section class="ieg-card ieg-dashboard-section">

            <div class="ieg-admin-user-heading"><h2 class="ieg-card-title">All Users</h2><button type="button" class="ieg-btn ieg-btn-primary" id="addUserButton">+ Add User</button></div>

            <!-- SEARCH AND FILTERS -->
            <div
                class="ieg-quick-actions"
                style="margin-bottom: 20px;"
            >

                <input
                    type="search"
                    id="userSearch"
                    class="ieg-input"
                    placeholder="Search by name or email..."
                    aria-label="Search users"
                    style="max-width: 320px;"
                >

                <select
                    id="roleFilter"
                    class="ieg-select"
                    aria-label="Filter users by role"
                    style="max-width: 180px;"
                >
                    <option value="All">All Roles</option>
                    <option value="Student">Students</option>
                    <option value="Instructor">Instructors</option>
                    <option value="Administrator">Administrators</option>
                </select>

                <select
                    id="statusFilter"
                    class="ieg-select"
                    aria-label="Filter users by status"
                    style="max-width: 180px;"
                >
                    <option value="All">All Statuses</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>

            </div>

            <!-- USERS TABLE -->
            <div class="ieg-table-wrapper">

                <table class="ieg-table" id="usersTable">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>


                            <tr
                                data-id="1"
                                data-name="Ahmed Ali"
                                data-email="ahmed@example.com"
                                data-role="Student"
                                data-status="Active"
                            >

                                <td>
                                    #1                                </td>

                                <td>
                                    Ahmed Ali                                </td>

                                <td>
                                    ahmed@example.com                                </td>

                                <td class="user-role">
                                    Student                                </td>

                                <td>

                                    <span class="ieg-badge user-status ieg-badge-success">
                                        Active                                    </span>
                                </td>

                                <td>
                                    <div class="ieg-user-actions">
                                        <button type="button" class="ieg-btn ieg-btn-outline view-user-btn">
                                            View Details
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline change-role-btn"
                                            >
                                            Change Role
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline toggle-status-btn"
                                            >
                                            Deactivate                                        </button>
                                    </div>
                                </td>

                            </tr>


                            <tr
                                data-id="2"
                                data-name="Sara Mohamed"
                                data-email="sara@example.com"
                                data-role="Student"
                                data-status="Active"
                            >

                                <td>
                                    #2                                </td>

                                <td>
                                    Sara Mohamed                                </td>

                                <td>
                                    sara@example.com                                </td>

                                <td class="user-role">
                                    Student                                </td>

                                <td>

                                    <span class="ieg-badge user-status ieg-badge-success">
                                        Active                                    </span>
                                </td>

                                <td>
                                    <div class="ieg-user-actions">
                                        <button type="button" class="ieg-btn ieg-btn-outline view-user-btn">
                                            View Details
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline change-role-btn"
                                            >
                                            Change Role
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline toggle-status-btn"
                                            >
                                            Deactivate                                        </button>
                                    </div>
                                </td>

                            </tr>


                            <tr
                                data-id="3"
                                data-name="Dr. Omar Hassan"
                                data-email="omar@example.com"
                                data-role="Instructor"
                                data-status="Active"
                            >

                                <td>
                                    #3                                </td>

                                <td>
                                    Dr. Omar Hassan                                </td>

                                <td>
                                    omar@example.com                                </td>

                                <td class="user-role">
                                    Instructor                                </td>

                                <td>

                                    <span class="ieg-badge user-status ieg-badge-success">
                                        Active                                    </span>
                                </td>

                                <td>
                                    <div class="ieg-user-actions">
                                        <button type="button" class="ieg-btn ieg-btn-outline view-user-btn">
                                            View Details
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline change-role-btn"
                                            >
                                            Change Role
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline toggle-status-btn"
                                            >
                                            Deactivate                                        </button>
                                    </div>
                                </td>

                            </tr>


                            <tr
                                data-id="4"
                                data-name="Mona Adel"
                                data-email="mona@example.com"
                                data-role="Student"
                                data-status="Inactive"
                            >

                                <td>
                                    #4                                </td>

                                <td>
                                    Mona Adel                                </td>

                                <td>
                                    mona@example.com                                </td>

                                <td class="user-role">
                                    Student                                </td>

                                <td>

                                    <span class="ieg-badge user-status ieg-badge-danger">
                                        Inactive                                    </span>
                                </td>

                                <td>
                                    <div class="ieg-user-actions">
                                        <button type="button" class="ieg-btn ieg-btn-outline view-user-btn">
                                            View Details
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline change-role-btn"
                                            >
                                            Change Role
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline toggle-status-btn"
                                            >
                                            Activate                                        </button>
                                    </div>
                                </td>

                            </tr>


                            <tr
                                data-id="5"
                                data-name="System Admin"
                                data-email="admin@example.com"
                                data-role="Administrator"
                                data-status="Active"
                            >

                                <td>
                                    #5                                </td>

                                <td>
                                    System Admin                                </td>

                                <td>
                                    admin@example.com                                </td>

                                <td class="user-role">
                                    Administrator                                </td>

                                <td>

                                    <span class="ieg-badge user-status ieg-badge-success">
                                        Active                                    </span>
                                </td>

                                <td>
                                    <div class="ieg-user-actions">
                                        <button type="button" class="ieg-btn ieg-btn-outline view-user-btn">
                                            View Details
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline change-role-btn"
                                            >
                                            Change Role
                                        </button>
                                        <button type="button" class="ieg-btn ieg-btn-outline toggle-status-btn"
                                            >
                                            Deactivate                                        </button>
                                    </div>
                                </td>

                            </tr>


                    </tbody>

                </table>

                <p
                    id="noUsersMessage"
                    class="ieg-muted-note"
                    style="display: none;"
                >
                    No users match your search.
                </p>

            </div>

        </section>

        <section class="ieg-card ieg-dashboard-section">
            <h2 class="ieg-card-title">Recent Demo Actions</h2>
            <div id="userActionLog" aria-live="polite">
                <p class="ieg-muted-note" id="emptyActionLog">No actions performed during this visit.</p>
            </div>
            <p class="ieg-muted-note">Temporary browser-only history. The Activity Logs page has separate demo records.</p>
        </section>

    </main>
</div>

<!-- USER DETAILS MODAL -->
<div id="userModal" class="ieg-modal" hidden>

    <div
        class="ieg-modal-content"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modalTitle"
        tabindex="-1"
    >

        <div class="ieg-modal-header">

            <h2 id="modalTitle">
                User Details
            </h2>

            <button
                type="button"
                id="closeUserModal"
                class="ieg-modal-close"
                aria-label="Close user details"
            >
                &times;
            </button>

        </div>

        <div class="ieg-modal-info">

            <p>
                <strong>ID:</strong>
                <span id="detailId"></span>
            </p>

            <p>
                <strong>Name:</strong>
                <span id="detailName"></span>
            </p>

            <p>
                <strong>Email:</strong>
                <span id="detailEmail"></span>
            </p>

            <p>
                <strong>Role:</strong>
                <span id="detailRole"></span>
            </p>

            <p>
                <strong>Status:</strong>
                <span id="detailStatus"></span>
            </p>

        </div>

        <button
            type="button"
            id="modalDone"
            class="ieg-btn ieg-btn-primary"
        >
            Done
        </button>

    </div>
</div>


<!-- CONFIRMATION MODAL FOR STATUS AND ROLE CHANGES -->
<div id="actionModal" class="ieg-modal" hidden>
    <div class="ieg-modal-content" role="dialog" aria-modal="true"
         aria-labelledby="actionModalTitle" tabindex="-1">
        <div class="ieg-modal-header">
            <h2 id="actionModalTitle">Confirm Action</h2>
            <button type="button" id="closeActionModal" class="ieg-modal-close"
                    aria-label="Close confirmation">&times;</button>
        </div>
        <p id="actionDescription" class="ieg-muted-note"></p>
        <div id="roleSelectWrap" class="ieg-role-select-wrap" hidden>
            <label for="newRole">New Role</label>
            <select id="newRole" class="ieg-select">
                <option value="Student">Student</option>
                <option value="Instructor">Instructor</option>
                <option value="Administrator">Administrator</option>
            </select>
        </div>
        <div class="ieg-user-modal-actions">
            <button type="button" id="cancelAction" class="ieg-btn ieg-btn-outline">Cancel</button>
            <button type="button" id="confirmAction" class="ieg-btn ieg-btn-primary">Confirm</button>
        </div>
    </div>
</div>


<!-- PHASE 1: ADD USER DEMO -->
<div id="addUserModal" class="ieg-modal" hidden>
  <div class="ieg-modal-content" role="dialog" aria-modal="true" aria-labelledby="addUserTitle" tabindex="-1">
    <div class="ieg-modal-header"><h2 id="addUserTitle">Add New User</h2><button type="button" id="closeAddUser" class="ieg-modal-close" aria-label="Close">&times;</button></div>
    <form id="addUserForm" class="ieg-admin-form">
      <label for="userName">Full Name</label><input class="ieg-input" id="userName" name="userName" maxlength="80" autocomplete="name" required>
      <label for="userEmail">Email Address</label><input class="ieg-input" type="email" id="userEmail" name="userEmail" maxlength="120" autocomplete="email" required>
      <label for="userRole">Role</label>
      <select class="ieg-select" id="userRole" name="userRole" required>
        <option value="Student">Student</option>
        <option value="Instructor">Instructor</option>
        <option value="Administrator">Administrator</option>
      </select>
      <label for="userStatus">Account Status</label>
      <select class="ieg-select" id="userStatus" name="userStatus" required>
        <option value="Active" selected>Active</option>
        <option value="Inactive">Inactive</option>
      </select>
      <p class="ieg-muted-note">Demo only: no password, login account, or real privileges are created.</p>
      <p id="addUserError" class="ieg-muted-note" role="alert" hidden></p>
      <div class="ieg-user-modal-actions"><button type="button" id="cancelAddUser" class="ieg-btn ieg-btn-outline">Cancel</button><button type="submit" class="ieg-btn ieg-btn-primary">Create User</button></div>
    </form>
  </div>
</div>

<script src="../assets/js/admin/users.js"></script>


</body>
</html>
