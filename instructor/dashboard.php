
<?php
session_start();

if (
    !isset($_SESSION['user_id']) ||
    !isset($_SESSION['user_role']) ||
    $_SESSION['user_role'] !== 'instructor'
) {
    header("Location: ../auth/login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "essayiq");

if ($conn->connect_error) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");
$instructorId = (int) $_SESSION['user_id'];
$name = $_SESSION['user_name'] ?? 'Instructor';
$email = $_SESSION['user_email'] ?? 'Not available';
$assignmentCount = 0;
$submissionCount = 0;

$stmt = $conn->prepare(
    "SELECT COUNT(*) AS total FROM assignments WHERE instructor_id = ?"
);

if ($stmt) {
    $stmt->bind_param("i", $instructorId);
    $stmt->execute();
    $assignmentCount = (int) $stmt->get_result()->fetch_assoc()['total'];
    $stmt->close();
}

$tableCheck = $conn->query("SHOW TABLES LIKE 'submissions'");

if ($tableCheck && $tableCheck->num_rows > 0) {
    $columnCheck = $conn->query(
        "SHOW COLUMNS FROM submissions LIKE 'assignment_id'"
    );

    if ($columnCheck && $columnCheck->num_rows > 0) {
        $stmt = $conn->prepare(
            "SELECT COUNT(*) AS total
             FROM submissions s
             INNER JOIN assignments a ON s.assignment_id = a.id
             WHERE a.instructor_id = ?"
        );

        if ($stmt) {
            $stmt->bind_param("i", $instructorId);
            $stmt->execute();
            $submissionCount = (int) $stmt->get_result()->fetch_assoc()['total'];
            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EssayIQ | Dashboard</title>
    <link rel="stylesheet" href="../assets/css/instructor.css">
</head>
<body>
<?php include __DIR__ . '/navbar.php'; ?>
<aside class="sidebar" id="sidebar">
    <div class="logo">
        <span class="logo-icon">E</span>
        <span class="logo-name">EssayIQ</span>
    </div>

    <nav class="nav-links">
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="create-assignment.php">Create Assignment</a>
        <a href="assignments.php">My Assignments</a>
        <a href="submissions.php">Submissions</a>
        <a href="../auth/login.php">Logout</a>
    </nav>

    <div class="tagline">Smart grading.<br>Better learning.</div>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main class="main-content">

    <header class="topbar">
        <button class="menu" id="menuButton" type="button"
                aria-label="Toggle sidebar" aria-expanded="false">☰</button>

        
<a href="../index.php" class="topbar-logo" aria-label="EssayIQ home">
    <svg class="logo-icon" viewBox="0 0 32 32" fill="none" aria-hidden="true">
        <rect x="2" y="2" width="28" height="28" rx="9" fill="url(#lg)"/>
        <path d="M10 11h12M10 16h8M10 21h5"
              stroke="#fff" stroke-width="2" stroke-linecap="round"/>
        <circle cx="23" cy="21" r="3" fill="#fff"/>
        <defs>
            <linearGradient id="lg" x1="0" y1="0" x2="32" y2="32">
                <stop stop-color="#22d3ee"/>
                <stop offset="1" stop-color="#8b5cf6"/>
            </linearGradient>
        </defs>
    </svg>
    <span class="logo-name">Essay<b>IQ</b></span>
</a>


        <div class="account-menu">
            <button type="button" class="account-button" id="accountButton"
                    aria-expanded="false">
                <span class="account-avatar">
                    <?= htmlspecialchars(strtoupper(substr($name, 0, 1))) ?>
                </span>
                <span class="account-name"><?= htmlspecialchars($name) ?></span>
                <span class="account-arrow">⌄</span>
            </button>

            <div class="account-dropdown" id="accountDropdown">
                <h3>My Account</h3>

                <div class="account-detail">
                    <span>Name</span>
                    <strong><?= htmlspecialchars($name) ?></strong>
                </div>

                <div class="account-detail">
                    <span>Email</span>
                    <strong><?= htmlspecialchars($email) ?></strong>
                </div>

                <div class="account-detail">
                    <span>Role</span>
                    <strong>Instructor</strong>
                </div>

                <a href="../auth/login.php" class="account-logout">Logout</a>
            </div>
        </div>
    </header>

    <section class="content">

        <div class="welcome" id="welcomeMessage">
            <h2>Welcome back, <?= htmlspecialchars($name) ?>!</h2>
        </div>

        <div class="stats-grid">
            <a href="assignments.php" class="stat-card assignment-link">
                <span class="stat-icon">📝</span>
                <h3>Total Assignments</h3>
                <div class="number"><?= $assignmentCount ?></div>
            </a>

            <a href="submissions.php" class="stat-card assignment-link">
                <span class="stat-icon">📄</span>
                <h3>Total Submissions</h3>
                <div class="number"><?= $submissionCount ?></div>
            </a>

            <div class="stat-card">
                <span class="stat-icon">📚</span>
                <h3>Courses</h3>
                <div class="number">0</div>
            </div>

            <div class="stat-card">
                <span class="stat-icon">✓</span>
                <h3>Pending Reviews</h3>
                <div class="number">0</div>
            </div>
        </div>

        <div class="dashboard-layout">
            <section class="panel">
                <h2>Quick Actions</h2>
                <a href="create-assignment.php" class="action">
                    + Create a New Assignment
                </a>
                <a href="assignments.php" class="action">
                    View My Assignments →
                </a>
                <a href="submissions.php" class="action">
                    View Submissions →
                </a>
            </section>

            <section class="panel">
                <h2>Getting Started</h2>
                <p>Your assignments are saved in the database and linked to your instructor account.</p>
                <p class="getting-started-count">
                    <?= $assignmentCount ?> assignment(s) created so far.
                </p>
            </section>
        </div>

    </section>
</main>

<script>
const menuButton = document.getElementById("menuButton");
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("sidebarOverlay");
const accountButton = document.getElementById("accountButton");
const accountDropdown = document.getElementById("accountDropdown");
const welcomeMessage = document.getElementById("welcomeMessage");

function closeSidebar() {
    sidebar.classList.remove("open");
    overlay.classList.remove("show");
    menuButton.setAttribute("aria-expanded", "false");
}

menuButton.addEventListener("click", function () {
    const isOpen = sidebar.classList.toggle("open");
    overlay.classList.toggle("show", isOpen);
    menuButton.setAttribute("aria-expanded", isOpen);
    hideWelcome();
});

overlay.addEventListener("click", closeSidebar);

accountButton.addEventListener("click", function (event) {
    event.stopPropagation();
    const isOpen = accountDropdown.classList.toggle("show");
    accountButton.setAttribute("aria-expanded", isOpen);
    hideWelcome();
});

function hideWelcome() {
    welcomeMessage.classList.add("hide-welcome");
}

document.addEventListener("click", function (event) {
    if (!event.target.closest(".account-menu")) {
        accountDropdown.classList.remove("show");
        accountButton.setAttribute("aria-expanded", "false");
    }

    if (event.target.closest("a, .stat-card, .action")) {
        hideWelcome();
    }
});

document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        closeSidebar();
        accountDropdown.classList.remove("show");
        accountButton.setAttribute("aria-expanded", "false");
    }
});
</script>

</body>
</html>
