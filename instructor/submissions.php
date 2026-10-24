
<?php
session_start();

$conn = new mysqli("localhost", "root", "", "essayiq");

if ($conn->connect_error) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$instructor_id = (int) $_SESSION['user_id'];
$error = "";
$submissions = [];

$check = $conn->query("SHOW TABLES LIKE 'submissions'");

if (!$check || $check->num_rows === 0) {
    $error = "Submissions table not found. Run the SQL first.";
} else {
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
        $stmt->bind_param("i", $instructor_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $submissions[] = $row;
        }

        $stmt->close();
    } else {
        $error = "Could not load submissions. Check your database columns.";
    }
}

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Submissions | EssayIQ</title>

    <link rel="stylesheet" href="../assets/css/instructor1.css"></head>

    <style>
        .submissions-page {
            padding: 32px;
            color: #f1f5f9;
        }

        .submissions-page h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .submissions-subtitle {
            color: #94a3b8;
            margin-bottom: 28px;
        }

        .submissions-summary {
            display: flex;
            gap: 18px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .summary-card {
            flex: 1;
            min-width: 180px;
            padding: 22px;
            background: #111b35;
            border: 1px solid #263657;
            border-radius: 14px;
        }

        .summary-card p {
            margin: 0 0 10px;
            color: #94a3b8;
        }

        .summary-card h2 {
            margin: 0;
            color: #22d3ee;
            font-size: 28px;
        }

        .submissions-panel {
            padding: 24px;
            background: #111b35;
            border: 1px solid #263657;
            border-radius: 16px;
        }

        .submissions-panel h2 {
            margin: 0 0 20px;
            font-size: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .submissions-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        .submissions-table th,
        .submissions-table td {
            padding: 16px 12px;
            text-align: left;
            border-bottom: 1px solid #263657;
            vertical-align: top;
        }

        .submissions-table th {
            color: #94a3b8;
            font-size: 12px;
            text-transform: uppercase;
        }

        .submissions-table td {
            color: #e2e8f0;
        }

        .student-email {
            display: block;
            color: #94a3b8;
            font-size: 12px;
            margin-top: 5px;
        }

        .status-label {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #24334f;
            color: #67e8f9;
            font-size: 12px;
        }

        .view-button {
            padding: 8px 12px;
            border: 0;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            cursor: pointer;
            font-size: 13px;
        }

        .view-button:hover {
            background: #0d9488;
        }

        .essay-details td {
            background: #0b1429;
        }

        .essay-content {
            white-space: pre-wrap;
            overflow-wrap: anywhere;
            line-height: 1.8;
            color: #cbd5e1;
        }

        .message {
            padding: 18px;
            border-radius: 10px;
            background: #172440;
            color: #cbd5e1;
        }

        @media (max-width: 700px) {
            .submissions-page {
                padding: 18px;
            }

            .submissions-panel {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

<main class="submissions-page">

    <h1>Student Submissions</h1>
    <p class="submissions-subtitle">
        View essays submitted by students for your assignments.
    </p>

    <section class="submissions-summary">
        <div class="summary-card">
            <p>Total Submissions</p>
            <h2><?= count($submissions) ?></h2>
        </div>

        <div class="summary-card">
            <p>Pending Reviews</p>
            <h2>
                <?php
                $pending = 0;

                foreach ($submissions as $item) {
                    if (strtolower($item['status']) === 'pending') {
                        $pending++;
                    }
                }

                echo $pending;
                ?>
            </h2>
        </div>
    </section>

    <section class="submissions-panel">
        <h2>All Submissions</h2>

        <?php if ($error !== ""): ?>

            <div class="message"><?= e($error) ?></div>

        <?php elseif (empty($submissions)): ?>

            <div class="message">
                No submissions found for your assignments yet.
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
                                    <?= e($item['status']) ?>
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
                                    onclick="toggleEssay(<?= (int) $item['id'] ?>)">
                                    View Essay
                                </button>
                            </td>
                        </tr>

                        <tr
                            id="essay-<?= (int) $item['id'] ?>"
                            class="essay-details"
                            hidden>
                            <td colspan="6">
                                <h3>Essay Content</h3>
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
    row.hidden = !row.hidden;
}
</script>

</body>
</html>

<?php
$conn->close();
?>
