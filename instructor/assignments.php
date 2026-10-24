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

$name = $_SESSION['user_name'] ?? 'Instructor';
$email = $_SESSION['user_email'] ?? 'Not available';
$assignments = [];
$error = "";

$check = $conn->query("SHOW TABLES LIKE 'assignments'");

if ($check && $check->num_rows > 0) {
    $columns = $conn->query("SHOW COLUMNS FROM assignments");
    $available = [];

    while ($column = $columns->fetch_assoc()) {
        $available[] = $column['Field'];
    }

    if (
        in_array('id', $available) &&
        in_array('instructor_id', $available)
    ) {
        $titleColumn = in_array('title', $available)
            ? 'title'
            : null;

        $courseColumn = in_array('course', $available)
            ? 'course'
            : null;

        $dueColumn = in_array('due_date', $available)
            ? 'due_date'
            : null;

        $sql = "SELECT * FROM assignments
                WHERE instructor_id = ?
                ORDER BY id DESC";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $assignments[] = $row;
        }

        $stmt->close();
    } else {
        $error = "Your assignments table needs id and instructor_id columns.";
    }
} else {
    $error = "The assignments table has not been created yet.";
}

function showValue($value) {
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Assignments | EssayIQ</title>
    <link rel="stylesheet" href="../assets/instructor1.css"></head>

<body>

<aside class="sidebar" id="sidebar">
    <a href="../index.php" class="logo">
        <svg class="logo-icon" viewBox="0 0 32 32" fill="none">
            <rect x="2" y="2" width="28" height="28" rx="9"
                  fill="url(#sideGradient)"/>
            <path d="M10 11h12M10 16h8M10 21h5"
                  stroke="#fff" stroke-width="2" stroke-linecap="round"/>
            <circle cx="23" cy="21" r="3" fill="#fff"/>
            <defs>
                <linearGradient id="sideGradient" x1="0" y1="0" x2="32" y2="32">
                    <stop stop-color="#22d3ee"/>
                    <stop offset="1" stop-color="#8b5cf6"/>
                </linearGradient>
            </defs>
        </svg>
        <span class="logo-name">Essay<b>IQ</b></span>
    </a>

    <nav class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="create-assignment.php">Create Assignment</a>
        <a href="assignments.php" class="active">My Assignments</a>
        <a href="submissions.php">Submissions</a>
        <a href="../auth/logout.php">Logout</a>
    </nav>

    <div class="tagline">Smart grading.<br>Better learning.</div>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main class="main-content">

    <header class="topbar">
        <button class="menu" id="menuButton" aria-label="Toggle menu">
            ☰
        </button>

        <div class="topbar-brand">
            <a href="../index.php" class="topbar-logo">
                <svg class="logo-icon" viewBox="0 0 32 32" fill="none">
                    <rect x="2" y="2" width="28" height="28" rx="9"
                          fill="url(#topGradient)"/>
                    <path d="M10 11h12M10 16h8M10 21h5"
                          stroke="#fff" stroke-width="2"
                          stroke-linecap="round"/>
                    <circle cx="23" cy="21" r="3" fill="#fff"/>
                    <defs>
                        <linearGradient id="topGradient" x1="0" y1="0" x2="32" y2="32">
                            <stop stop-color="#22d3ee"/>
                            <stop offset="1" stop-color="#8b5cf6"/>
                        </linearGradient>
                    </defs>
                </svg>
                <span class="logo-name">Essay<b>IQ</b></span>
            </a>

            <h1>My Assignments</h1>
        </div>

        <div class="account-menu">
            <button class="account-button" id="accountButton">
                <span class="account-avatar">
                    <?= strtoupper(substr($name, 0, 1)) ?>
                </span>
                <span class="account-name"><?= showValue($name) ?></span>
                <span class="account-arrow">▼</span>
            </button>

            <div class="account-dropdown" id="accountDropdown">
                <h3>Account Details</h3>
                <div class="account-detail">
                    <span>Name</span>
                    <strong><?= showValue($name) ?></strong>
                </div>
                <div class="account-detail">
                    <span>Email</span>
                    <strong><?= showValue($email) ?></strong>
                </div>
                <a href="../auth/logout.php" class="account-logout">Logout</a>
            </div>
        </div>
    </header>

    <section class="content">

        <div class="assignments-heading">
            <div>
                <h2>My Assignments</h2>
                <p>View and manage the assignments you have created.</p>
            </div>

            <a href="create-assignment.php" class="btn">
                + Create Assignment
            </a>
        </div>

        <div class="assignments-summary">
            <div class="panel">
                <span class="stat-icon">📝</span>
                <h3>Total Assignments</h3>
                <div class="number"><?= count($assignments) ?></div>
            </div>
        </div>

        <?php if ($error): ?>
            <div class="panel assignment-message">
                <?= showValue($error) ?>
            </div>

        <?php elseif (empty($assignments)): ?>
            <div class="panel assignment-empty">
                <div class="stat-icon">📚</div>
                <h2>No assignments yet</h2>
                <p>Your created assignments will appear here.</p>
                <a href="create-assignment.php" class="btn">
                    Create Your First Assignment
                </a>
            </div>

        <?php else: ?>
            <div class="panel assignment-list">
                <h2>All Assignments</h2>

                <?php foreach ($assignments as $assignment): ?>
                    <?php
                    $title = $assignment['title']
                        ?? $assignment['assignment_title']
                        ?? 'Untitled Assignment';

                    $course = $assignment['course'] ?? 'Not specified';
                    $dueDate = $assignment['due_date'] ?? '';
                    ?>

                    <article class="assignment-item">
                        <div class="assignment-info">
                            <h3><?= showValue($title) ?></h3>
                            <p>Course: <?= showValue($course) ?></p>

                            <?php if ($dueDate !== ''): ?>
                                <p>
                                    Due date:
                                    <?= showValue($dueDate) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <span class="assignment-status">Created</span>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </section>
</main>

<script>
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');
const menuButton = document.getElementById('menuButton');
const accountButton = document.getElementById('accountButton');
const accountDropdown = document.getElementById('accountDropdown');

menuButton.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    overlay.classList.toggle('show');
});

overlay.addEventListener('click', () => {
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
});

accountButton.addEventListener('click', () => {
    accountDropdown.classList.toggle('show');
});

document.addEventListener('click', (event) => {
    if (!event.target.closest('.account-menu')) {
        accountDropdown.classList.remove('show');
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
        accountDropdown.classList.remove('show');
    }
});
</script>

</body>
</html>