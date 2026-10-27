
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
        (int)$maxScore < 1 ||
        (int)$maxScore > 1000
    ) {
        $error = "The maximum score must be between 1 and 1000.";
    } else {
        $savedDueDate = null;

        if ($dueDate !== '') {
            $date = DateTime::createFromFormat('!Y-m-d\TH:i', $dueDate);

            if (
                !$date ||
                $date->format('Y-m-d\TH:i') !== $dueDate
            ) {
                $error = "Please enter a valid due date.";
            } elseif ($date->getTimestamp() < time()) {
                $error = "The due date cannot be in the past.";
            } else {
                $savedDueDate = $date->format('Y-m-d H:i:s');
            }
        }

        if ($error === '') {
            $instructorId = (int)$_SESSION['user_id'];
            $score = (int)$maxScore;

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
                }

                $error = "Could not save the assignment. Please try again.";
                $stmt->close();
            }
        }
    }
}

$conn->close();

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Assignment | EssayIQ</title>

    <link rel="stylesheet" href="../assets/css/instructor.css">

    <style>
        .create-page {
            width: min(900px, 92%);
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .create-header {
            margin-bottom: 30px;
        }

        .create-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .gradient-text {
            background: linear-gradient(
                90deg, var(--cyan), var(--blue), var(--violet)
            );
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .create-header p {
            color: var(--muted);
            line-height: 1.7;
        }

        .form-container {
            padding: 30px;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, .25);
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--text);
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            background: rgba(5, 8, 22, .75);
            color: var(--text);
            font: inherit;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-group textarea {
            resize: vertical;
            line-height: 1.6;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(34, 211, 238, .1);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--muted);
        }

        .form-group input[type="datetime-local"] {
            color-scheme: dark;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .create-button {
            padding: 12px 22px;
            border: 0;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--blue), var(--violet));
            color: white;
            font: inherit;
            font-weight: 600;
            cursor: pointer;
            transition: .25s;
        }

        .create-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, .3);
        }

        .cancel-button {
            padding: 11px 20px;
            border: 1px solid var(--glass-border);
            border-radius: 999px;
            color: var(--text);
            background: var(--glass);
        }

        .form-error {
            margin-bottom: 22px;
            padding: 14px 16px;
            border: 1px solid rgba(248, 113, 113, .3);
            border-radius: 12px;
            background: rgba(248, 113, 113, .08);
            color: #fca5a5;
        }

        @media (max-width: 600px) {
            .create-header h1 {
                font-size: 2rem;
            }

            .form-container {
                padding: 20px;
            }

            .form-actions {
                align-items: stretch;
                flex-direction: column;
            }

            .create-button,
            .cancel-button {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<?php include __DIR__ . '/navbar.php'; ?>

<main class="create-page">

    <header class="create-header">
        <h1>New <span class="gradient-text">Assignment</span></h1>
        <p>Create an assignment and provide your students with clear instructions.</p>
    </header>

    <section class="form-container">

        <?php if ($error !== ''): ?>
            <div class="form-error"><?= e($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="create-assignment.php">

            <div class="form-group">
                <label for="title">Assignment Title *</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    maxlength="200"
                    value="<?= e($title) ?>"
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
                ><?= e($description) ?></textarea>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea
                    id="instructions"
                    name="instructions"
                    rows="4"
                    placeholder="Add instructions for students"
                ><?= e($instructions) ?></textarea>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input
                    type="datetime-local"
                    id="due_date"
                    name="due_date"
                    value="<?= e($dueDate) ?>"
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
                    value="<?= e($maxScore) ?>"
                    required
                >
            </div>

            <div class="form-actions">
                <button type="submit" class="create-button">
                    + Create Assignment
                </button>

                <a href="dashboard.php" class="cancel-button">
                    Cancel
                </a>
            </div>

        </form>
    </section>

</main>

</body>
</html>
