
<?php
$pageTitle = 'Admin Profile - EssayIQ';

// Phase 1 demonstration data
$admin = [
    'id' => 'ADM-001',
    'name' => 'System Admin',
    'email' => 'admin@example.com',
    'role' => 'Administrator',
    'status' => 'Active',
    'department' => 'Academic Administration',
    'joined' => '2026-09-01',
    'lastLogin' => '2026-10-16 09:30 AM'
];

$recentActivity = [
    [
        'action' => 'Reviewed flagged submission',
        'details' => 'Ethics in Technology',
        'time' => '2026-10-16 09:25 AM'
    ],
    [
        'action' => 'Viewed user account',
        'details' => 'Ahmed Ali',
        'time' => '2026-10-15 02:40 PM'
    ],
    [
        'action' => 'Opened analytics dashboard',
        'details' => 'Submission statistics',
        'time' => '2026-10-14 11:10 AM'
    ]
];

require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/admin-navbar.php';
?>

<div class="ieg-dashboard-layout">

    <?php require __DIR__ . '/../includes/sidebar.php'; ?>

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
                        <?= htmlspecialchars($admin['name'], ENT_QUOTES, 'UTF-8') ?>
                    </h2>

                    <p class="ieg-profile-subtitle">
                        <?= htmlspecialchars($admin['role'], ENT_QUOTES, 'UTF-8') ?>
                        · EssayIQ
                    </p>

                    <span class="ieg-badge ieg-badge-success">
                        <?= htmlspecialchars($admin['status'], ENT_QUOTES, 'UTF-8') ?>
                    </span>
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
                        <?= htmlspecialchars($admin['id'], ENT_QUOTES, 'UTF-8') ?>
                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Full Name</span>
                    <strong id="profileName">
                        <?= htmlspecialchars($admin['name'], ENT_QUOTES, 'UTF-8') ?>
                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Email Address</span>
                    <strong id="profileEmail">
                        <?= htmlspecialchars($admin['email'], ENT_QUOTES, 'UTF-8') ?>
                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Role</span>
                    <strong>
                        <?= htmlspecialchars($admin['role'], ENT_QUOTES, 'UTF-8') ?>
                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Department</span>
                    <strong id="profileDepartment">
                        <?= htmlspecialchars($admin['department'], ENT_QUOTES, 'UTF-8') ?>
                    </strong>
                </div>

                <div>
                    <span class="ieg-profile-label">Member Since</span>
                    <strong>
                        <?= htmlspecialchars($admin['joined'], ENT_QUOTES, 'UTF-8') ?>
                    </strong>
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
                        <?= htmlspecialchars($admin['lastLogin'], ENT_QUOTES, 'UTF-8') ?>
                        (Demo)
                    </p>
                </div>
            </div>

        </section>

        <!-- RECENT ACCOUNT ACTIVITY -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">
                Recent Account Activity
            </h2>

            <?php foreach ($recentActivity as $activity): ?>

                <div class="ieg-activity-item">

                    <div>
                        <strong>
                            <?= htmlspecialchars($activity['action'], ENT_QUOTES, 'UTF-8') ?>
                        </strong>

                        <p>
                            <?= htmlspecialchars($activity['details'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>

                    <span>
                        <?= htmlspecialchars($activity['time'], ENT_QUOTES, 'UTF-8') ?>
                    </span>

                </div>

            <?php endforeach; ?>

    
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
