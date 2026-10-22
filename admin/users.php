
<?php
// Page title
$pageTitle = 'Advanced User Management - EssayIQ';

// Phase 1 demo data
$users = [
    [
        'id' => 1,
        'name' => 'Ahmed Ali',
        'email' => 'ahmed@example.com',
        'role' => 'Student',
        'status' => 'Active'
    ],
    [
        'id' => 2,
        'name' => 'Sara Mohamed',
        'email' => 'sara@example.com',
        'role' => 'Student',
        'status' => 'Active'
    ],
    [
        'id' => 3,
        'name' => 'Dr. Omar Hassan',
        'email' => 'omar@example.com',
        'role' => 'Instructor',
        'status' => 'Active'
    ],
    [
        'id' => 4,
        'name' => 'Mona Adel',
        'email' => 'mona@example.com',
        'role' => 'Student',
        'status' => 'Inactive'
    ],
    [
        'id' => 5,
        'name' => 'System Admin',
        'email' => 'admin@example.com',
        'role' => 'Administrator',
        'status' => 'Active'
    ]
];

// Calculate statistics
$totalUsers = count($users);

$totalStudents = count(array_filter(
    $users,
    fn($user) => $user['role'] === 'Student'
));

$totalInstructors = count(array_filter(
    $users,
    fn($user) => $user['role'] === 'Instructor'
));

$totalActive = count(array_filter(
    $users,
    fn($user) => $user['status'] === 'Active'
));

// Reuse project layout
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/admin-navbar.php';
?>

<div class="ieg-dashboard-layout">

    <?php require __DIR__ . '/../includes/sidebar.php'; ?>

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
                    <?= $totalUsers ?>
                </div>
            </div>

            <div class="ieg-card">
                <p>Students</p>
                <div class="ieg-stat-number" id="studentCount">
                    <?= $totalStudents ?>
                </div>
            </div>

            <div class="ieg-card">
                <p>Instructors</p>
                <div class="ieg-stat-number" id="instructorCount">
                    <?= $totalInstructors ?>
                </div>
            </div>

            <div class="ieg-card">
                <p>Active Users</p>
                <div class="ieg-stat-number" id="activeCount">
                    <?= $totalActive ?>
                </div>
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

                        <?php foreach ($users as $user): ?>

                            <tr
                                data-id="<?= (int)$user['id'] ?>"
                                data-name="<?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>"
                                data-email="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>"
                                data-role="<?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8') ?>"
                                data-status="<?= htmlspecialchars($user['status'], ENT_QUOTES, 'UTF-8') ?>"
                            >

                                <td>
                                    #<?= (int)$user['id'] ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td class="user-role">
                                    <?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?php
                                    $badgeClass =
                                        $user['status'] === 'Active'
                                        ? 'ieg-badge-success'
                                        : 'ieg-badge-danger';
                                    ?>

                                    <span class="ieg-badge user-status <?= $badgeClass ?>">
                                        <?= htmlspecialchars($user['status'], ENT_QUOTES, 'UTF-8') ?>
                                    </span>
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
                                            <?= $user['status'] === 'Active' ? 'Deactivate' : 'Activate' ?>
                                        </button>
                                    </div>
                                </td>

                            </tr>

                        <?php endforeach; ?>

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
