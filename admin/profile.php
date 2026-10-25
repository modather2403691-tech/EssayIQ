


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Admin Profile - EssayIQ    </title>

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
                    class="ieg-sidebar-link ieg-sidebar-active"
                    aria-current="page"                >
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
            <div>
                <h1 class="ieg-page-title">Admin Profile</h1>
                <p class="ieg-page-description">
                    Manage your administrator account and security preferences.
                </p>
            </div>
        </div>

        <!-- PROFILE OVERVIEW -->
        <section class="ieg-card ieg-dashboard-section">

            <div class="ieg-profile-header">
                <div class="ieg-profile-avatar ieg-avatar-photo ieg-photo-clip" id="profileAvatar"><span id="profileAvatarInitials">SA</span><img id="profileAvatarImage" alt="Administrator profile picture" hidden></div>
                <div class="ieg-profile-photo-actions">
                    <button type="button" id="changePhotoBtn" class="ieg-btn ieg-btn-outline">Change Photo</button>
                    <button type="button" id="removePhotoBtn" class="ieg-btn ieg-btn-outline" hidden>Remove Photo</button>
                </div>
                <input type="file" id="profilePhotoInput" accept="image/png,image/jpeg,image/webp" hidden>

                <div>
                    <h2 id="profileDisplayName">
                        System Admin                    </h2>

                    <p class="ieg-profile-subtitle">
                        Administrator                        · EssayIQ
                    </p>

                    <span class="ieg-badge ieg-badge-success">
                        Active                    </span>
                </div>
            </div>

        </section>

        <!-- PROFILE INFORMATION -->
        <section class="ieg-card ieg-dashboard-section">

            <div class="ieg-profile-section-heading">
                <h2 class="ieg-card-title">Profile Information</h2>

                <button
                    type="button"
                    id="editProfileBtn"
                    class="ieg-btn ieg-btn-outline"
                >
                    Edit Profile
                </button>
            </div>

            <div class="ieg-profile-grid">

                <div>
                    <span class="ieg-profile-label">Admin ID</span>
                    <strong>
                        ADM-001                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Full Name</span>
                    <strong id="profileName">
                        System Admin                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Email Address</span>
                    <strong id="profileEmail">
                        admin@example.com                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Role</span>
                    <strong>
                        Administrator                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Department</span>
                    <strong id="profileDepartment">
                        Academic Administration                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Member Since</span>
                    <strong>
                        2026-09-01                    </strong>
                </div>

            </div>

        </section>

        <!-- SECURITY SETTINGS -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">Security Settings</h2>

            <div class="ieg-profile-security-row">
                <div>
                    <strong>Password</strong>
                    <p class="ieg-muted-note">
                        Manage your account password.
                    </p>
                </div>

                <button
                    type="button"
                    id="changePasswordBtn"
                    class="ieg-btn ieg-btn-outline"
                >
                    Change Password
                </button>
            </div>

            <div class="ieg-profile-security-row">
                <div>
                    <strong>Two-Factor Authentication</strong>
                    <p class="ieg-muted-note">
                        Add an extra layer of account security.
                    </p>
                </div>

                <span class="ieg-badge ieg-badge-warning">
                    Not Configured
                </span>
            </div>

            <div class="ieg-profile-security-row">
                <div>
                    <strong>Last Login</strong>
                    <p class="ieg-muted-note">
                        2026-10-16 09:30 AM                        (Demo)
                    </p>
                </div>
            </div>

        </section>

        <!-- RECENT ACCOUNT ACTIVITY -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">
                Recent Account Activity
            </h2>


                <div class="ieg-activity-item">

                    <div>
                        <strong>
                            Reviewed flagged submission                        </strong>

                        <p>
                            Ethics in Technology                        </p>
                    </div>

                    <span>
                        2026-10-16 09:25 AM                    </span>

                </div>


                <div class="ieg-activity-item">

                    <div>
                        <strong>
                            Viewed user account                        </strong>

                        <p>
                            Ahmed Ali                        </p>
                    </div>

                    <span>
                        2026-10-15 02:40 PM                    </span>

                </div>


                <div class="ieg-activity-item">

                    <div>
                        <strong>
                            Opened analytics dashboard                        </strong>

                        <p>
                            Submission statistics                        </p>
                    </div>

                    <span>
                        2026-10-14 11:10 AM                    </span>

                </div>



        </section>

    </main>
</div>

<!-- EDIT PROFILE MODAL -->
<div class="ieg-modal" id="editProfileModal" hidden>

    <div
        class="ieg-modal-content"
        role="dialog"
        aria-modal="true"
        aria-labelledby="editProfileTitle"
    >

        <div class="ieg-modal-header">
            <h2 id="editProfileTitle">Edit Profile</h2>

            <button
                type="button"
                class="ieg-modal-close"
                id="closeEditProfile"
                aria-label="Close edit profile"
            >
                &times;
            </button>
        </div>

        <form id="editProfileForm">

            <div class="ieg-profile-form-group">
                <label for="editName">Full Name</label>
                <input
                    type="text"
                    id="editName"
                    class="ieg-input"
                    required
                >
            </div>

            <div class="ieg-profile-form-group">
                <label for="editEmail">Email Address</label>
                <input
                    type="email"
                    id="editEmail"
                    class="ieg-input"
                    required
                >
            </div>

            <div class="ieg-profile-form-group">
                <label for="editDepartment">Department</label>
                <input
                    type="text"
                    id="editDepartment"
                    class="ieg-input"
                    required
                >
            </div>

            <button
                type="submit"
                class="ieg-btn ieg-btn-primary"
            >
                Save Changes
            </button>

        </form>

    </div>
</div>

<script src="../assets/js/admin/profile.js"></script>

</body>
</html>
