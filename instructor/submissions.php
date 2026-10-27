
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
$submissions = [];
$error = "";

$sql = "SELECT
            s.id,
            s.essay_text,
            s.submitted_at,
            s.status,
            s.grade,
            u.name AS student_name,
            u.email AS student_email,
            a.title AS assignment_title
        FROM submissions s
        INNER JOIN users u ON s.student_id = u.id
        INNER JOIN assignments a ON s.assignment_id = a.id
        WHERE a.instructor_id = ?
        ORDER BY s.submitted_at DESC";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $instructorId);
    $stmt->execute();

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $submissions[] = $row;
    }

    $stmt->close();
} else {
    $error = "Could not load submissions. Check your database tables.";
}

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$pending = 0;

foreach ($submissions as $item) {
    if (strtolower($item['status'] ?? '') === 'pending') {
        $pending++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Submissions | EssayIQ</title>

    <link rel="stylesheet" href="../assets/css/instructor.css">

    <style>
        .submissions-page {
            width: min(1200px, 92%);
            margin: 0 auto;
            padding: 40px 0 60px;
        }

        .submissions-page h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .submissions-page h1 span {
            background: linear-gradient(
                90deg, var(--cyan), var(--blue), var(--violet)
            );
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .submissions-subtitle {
            color: var(--muted);
            margin-bottom: 30px;
        }

        .submissions-summary {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 28px;
        }

        .summary-card,
        .submissions-panel {
            padding: 25px;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius);
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, .25);
        }

        .summary-card p {
            color: var(--muted);
            margin-bottom: 12px;
        }

        .summary-card h2 {
            color: var(--cyan);
            font-size: 2rem;
        }

        .submissions-panel h2 {
            font-size: 1.3rem;
            margin-bottom: 22px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .submissions-table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
        }

        .submissions-table th,
        .submissions-table td {
            padding: 16px 12px;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid var(--glass-border);
        }

        .submissions-table th {
            color: var(--muted);
            font-size: .75rem;
            text-transform: uppercase;
        }

        .submissions-table td {
            color: var(--text);
            font-size: .9rem;
        }

        .student-email {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: .8rem;
        }

        .status-label {
            display: inline-block;
            padding: 6px 11px;
            border: 1px solid rgba(34, 211, 238, .2);
            border-radius: 999px;
            background: rgba(34, 211, 238, .08);
            color: var(--cyan);
            font-size: .75rem;
        }

        .view-button {
            padding: 9px 14px;
            border: 0;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--blue), var(--violet));
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: .25s;
        }

        .view-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, .3);
        }

        .essay-details[hidden] {
            display: none;
        }

        .essay-details td {
            background: rgba(5, 8, 22, .55);
        }

        .essay-content {
            margin-top: 12px;
            color: var(--muted);
            white-space: pre-wrap;
            overflow-wrap: anywhere;
            line-height: 1.8;
        }

        .message {
            padding: 20px;
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            background: var(--glass);
            color: var(--muted);
        }

        @media (max-width: 650px) {
            .submissions-page h1 {
                font-size: 2rem;
            }

            .submissions-summary {
                grid-template-columns: 1fr;
            }

            .summary-card,
            .submissions-panel {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<?php include __DIR__ . '/navbar.php'; ?>

<main class="submissions-page">

    <h1>Student <span>Submissions</span></h1>

    <p class="submissions-subtitle">
        Review essays submitted for your assignments.
    </p>

    <section class="submissions-summary">
        <div class="summary-card">
            <p>Total Submissions</p>
            <h2><?= count($submissions) ?></h2>
        </div>

        <div class="summary-card">
            <p>Pending Reviews</p>
            <h2><?= $pending ?></h2>
        </div>
    </section>

    <section class="submissions-panel">
        <h2>All Submissions</h2>

        <?php if ($error !== ""): ?>

            <div class="message"><?= e($error) ?></div>

        <?php elseif (empty($submissions)): ?>

            <div class="message">
                No submissions found yet. Submitted essays will appear here
                once they have been saved to the database.
            </div>

        <?php else: ?>

            <div class="table-wrapper">
                <table class="submissions-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Assignment</th>
                            <th>Submitted At</th>
                            <th>Status</th>
                            <th>Grade</th>
                            <th>Essay</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($submissions as $item): ?>
                        <tr>
                            <td>
                                <strong><?= e($item['student_name']) ?></strong>
                                <span class="student-email">
                                    <?= e($item['student_email']) ?>
                                </span>
                            </td>

                            <td><?= e($item['assignment_title']) ?></td>

                            <td><?= e($item['submitted_at']) ?></td>

                            <td>
                                <span class="status-label">
                                    <?= e($item['status'] ?: 'Pending') ?>
                                </span>
                            </td>

                            <td>
                                <?= $item['grade'] !== null
                                    ? e($item['grade'])
                                    : 'Not graded' ?>
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="view-button"
                                    onclick="toggleEssay(<?= (int)$item['id'] ?>)">
                                    View Essay
                                </button>
                            </td>
                        </tr>

                        <tr id="essay-<?= (int)$item['id'] ?>"
                            class="essay-details" hidden>
                            <td colspan="6">
                                <strong>Essay Content</strong>
                                <div class="essay-content"><?= e($item['essay_text']) ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php endif; ?>
    </section>

</main>

<script>
function toggleEssay(id) {
    const row = document.getElementById("essay-" + id);

    if (row) {
        row.hidden = !row.hidden;
    }
}
</script>

</body>
</html>

<?php $conn->close(); ?>
