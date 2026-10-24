
<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'instructor') {
    header("Location: ../auth/login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "essayiq");

if ($conn->connect_error) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");

// Create the assignments table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    instructor_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    instructions TEXT,
    due_date DATETIME NULL,
    max_score INT NOT NULL DEFAULT 100,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Could not prepare the assignments table.");
}

$error = "";

$title = "";
$description = "";
$instructions = "";
$dueDate = "";
$maxScore = "100";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $instructions = trim($_POST['instructions'] ?? '');
    $dueDate = trim($_POST['due_date'] ?? '');
    $maxScore = trim($_POST['max_score'] ?? '100');

    if ($title === '' || $description === '') {
        $error = "Please enter the assignment title and description.";

    } elseif (
        filter_var($maxScore, FILTER_VALIDATE_INT) === false ||
        (int) $maxScore < 1 ||
        (int) $maxScore > 1000
    ) {
        $error = "The maximum score must be between 1 and 1000.";

    } else {
        $savedDueDate = null;

        if ($dueDate !== '') {
            $date = DateTime::createFromFormat('Y-m-d\TH:i', $dueDate);

            if (!$date || $date->format('Y-m-d\TH:i') !== $dueDate) {
                $error = "Please enter a valid due date.";
            } elseif ($date->getTimestamp() < time()) {
                $error = "The due date cannot be in the past.";
            } else {
                $savedDueDate = $date->format('Y-m-d H:i:s');
            }
        }

        if ($error === '') {
            $instructorId = (int) $_SESSION['user_id'];
            $score = (int) $maxScore;

            $stmt = $conn->prepare(
                "INSERT INTO assignments
                (instructor_id, title, description, instructions, due_date, max_score)
                VALUES (?, ?, ?, ?, ?, ?)"
            );

            if (!$stmt) {
                $error = "Could not prepare the assignment.";
            } else {
                $stmt->bind_param(
                    "issssi",
                    $instructorId,
                    $title,
                    $description,
                    $instructions,
                    $savedDueDate,
                    $score
                );

                if ($stmt->execute()) {
                    $stmt->close();
                    $conn->close();

                    header("Location: dashboard.php?created=1");
                    exit;
                } else {
                    $error = "Could not save the assignment. Please try again.";
                    $stmt->close();
                }
            }
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
    <title>Create Assignment | EssayIQ</title>
    <link rel="stylesheet" href="../assets/instructor1.css"></head>

<body>

<aside class="sidebar">
    <div class="logo">EssayIQ</div>

    <nav class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="create-assignment.php" class="active">Create Assignment</a>
        <a href="assignments.php">My Assignments</a>
        <a href="submissions.php">Submissions</a>
        <a href="../auth/login.php">Logout</a>
    </nav>
</aside>

<main class="main-content">

    <header class="topbar">
        <button class="menu" id="menuButton" type="button">☰</button>
        <div>
            <h2>Create Assignment</h2>
            <p>Add a new assignment for your students.</p>
        </div>
    </header>

    <section class="content">

        <div class="page-header">
            <div>
                <h1>New Assignment</h1>
                <p>Fill in the details below.</p>
            </div>
        </div>

        <section class="panel form-container">

            <?php if ($error !== ''): ?>
                <div class="message error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="create-assignment.php">

                <div class="form-group">
                    <label for="title">Assignment Title *</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        maxlength="200"
                        value="<?= htmlspecialchars($title) ?>"
                        placeholder="Enter assignment title"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        placeholder="Describe the assignment"
                        required
                    ><?= htmlspecialchars($description) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="instructions">Instructions</label>
                    <textarea
                        id="instructions"
                        name="instructions"
                        rows="4"
                        placeholder="Add instructions for students"
                    ><?= htmlspecialchars($instructions) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input
                        type="datetime-local"
                        id="due_date"
                        name="due_date"
                        value="<?= htmlspecialchars($dueDate) ?>"
                    >
                </div>

                <div class="form-group">
                    <label for="max_score">Maximum Score</label>
                    <input
                        type="number"
                        id="max_score"
                        name="max_score"
                        min="1"
                        max="1000"
                        value="<?= htmlspecialchars($maxScore) ?>"
                        required
                    >
                </div>

                <button type="submit" class="btn">
                    Create Assignment
                </button>

                <a href="dashboard.php" class="action">
                    Cancel
                </a>

            </form>
        </section>

    </section>
</main>

<script>
const menuButton = document.getElementById("menuButton");
const sidebar = document.querySelector(".sidebar");

if (menuButton && sidebar) {
    menuButton.addEventListener("click", function () {
        sidebar.classList.toggle("open");
    });
}
</script>

</body>
</html>
