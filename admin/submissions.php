
<?php
$pageTitle = 'Submission Management - EssayIQ';

// Phase 1: Demo submissions
$submissions = [
    [
        'id' => 101,
        'student' => 'Ahmed Ali',
        'title' => 'Impact of AI on Education',
        'course' => 'Computer Science',
        'date' => '2026-10-10',
        'grade' => 88,
        'similarity' => 12,
        'status' => 'Graded',
        'note' => 'Essay graded successfully. Minor grammar improvements suggested.'
    ],
    [
        'id' => 102,
        'student' => 'Sara Mohamed',
        'title' => 'Climate Change Essay',
        'course' => 'English Writing',
        'date' => '2026-10-11',
        'grade' => null,
        'similarity' => null,
        'status' => 'Pending',
        'note' => 'Waiting for grading and similarity analysis.'
    ],
    [
        'id' => 103,
        'student' => 'Mona Adel',
        'title' => 'Ethics in Technology',
        'course' => 'Software Engineering',
        'date' => '2026-10-12',
        'grade' => 62,
        'similarity' => 78,
        'status' => 'Flagged',
        'note' => 'High text similarity detected. Human review is recommended.'
    ],
    [
        'id' => 104,
        'student' => 'Omar Khaled',
        'title' => 'Future of Machine Learning',
        'course' => 'Artificial Intelligence',
        'date' => '2026-10-13',
        'grade' => 94,
        'similarity' => 8,
        'status' => 'Graded',
        'note' => 'Strong essay structure and clear supporting arguments.'
    ],
    [
        'id' => 105,
        'student' => 'Nour Hassan',
        'title' => 'Cybersecurity Challenges',
        'course' => 'Computer Networks',
        'date' => '2026-10-14',
        'grade' => null,
        'similarity' => null,
        'status' => 'Pending',
        'note' => 'Submission received and awaiting analysis.'
    ],
    [
        'id' => 106,
        'student' => 'Youssef Adel',
        'title' => 'Social Media and Society',
        'course' => 'English Writing',
        'date' => '2026-10-15',
        'grade' => 73,
        'similarity' => 46,
        'status' => 'Flagged',
        'note' => 'Several passages need source attribution review.'
    ]
];

// Calculate statistics
$totalSubmissions = count($submissions);

$totalGraded = count(array_filter(
    $submissions,
    fn($item) => $item['status'] === 'Graded'
));

$totalPending = count(array_filter(
    $submissions,
    fn($item) => $item['status'] === 'Pending'
));

$totalFlagged = count(array_filter(
    $submissions,
    fn($item) => $item['status'] === 'Flagged'
));

// Shared layout
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
                    Submission Management
                </h1>

                <p class="ieg-page-description">
                    Monitor essay submissions, grading results,
                    and similarity reports.
                </p>
            </div>
        </div>

        <!-- STATISTICS -->
        <section class="ieg-stats-grid">

            <div class="ieg-card">
                <p>Total Submissions</p>
                <div class="ieg-stat-number">
                    <?= $totalSubmissions ?>
                </div>
            </div>

            <div class="ieg-card">
                <p>Graded</p>
                <div class="ieg-stat-number">
                    <?= $totalGraded ?>
                </div>
            </div>

            <div class="ieg-card">
                <p>Pending</p>
                <div class="ieg-stat-number">
                    <?= $totalPending ?>
                </div>
            </div>

            <div class="ieg-card">
                <p>Flagged</p>
                <div class="ieg-stat-number">
                    <?= $totalFlagged ?>
                </div>
            </div>

        </section>

        <!-- SUBMISSIONS TABLE -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">
                All Submissions
            </h2>

            <!-- SEARCH AND FILTER -->
            <div class="ieg-quick-actions" style="margin-bottom: 20px;">

                <input
                    type="search"
                    id="submissionSearch"
                    class="ieg-input"
                    placeholder="Search by student or essay title..."
                    aria-label="Search submissions"
                    style="max-width: 330px;"
                >

                <select
                    id="submissionStatusFilter"
                    class="ieg-select"
                    aria-label="Filter by status"
                    style="max-width: 190px;"
                >
                    <option value="All">All Statuses</option>
                    <option value="Graded">Graded</option>
                    <option value="Pending">Pending</option>
                    <option value="Flagged">Flagged</option>
                </select>

            </div>

            <!-- TABLE -->
            <div class="ieg-table-wrapper">

                <table class="ieg-table" id="submissionsTable">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student</th>
                            <th>Essay Title</th>
                            <th>Course</th>
                            <th>Date</th>
                            <th>AI Grade</th>
                            <th>Similarity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($submissions as $submission): ?>

                            <?php
                            $status = $submission['status'];

                            $badgeClass = match ($status) {
                                'Graded' => 'ieg-badge-success',
                                'Pending' => 'ieg-badge-warning',
                                'Flagged' => 'ieg-badge-danger',
                                default => ''
                            };

                            $gradeText = $submission['grade'] === null
                                ? '—'
                                : $submission['grade'] . '%';

                            $similarityText = $submission['similarity'] === null
                                ? '—'
                                : $submission['similarity'] . '%';
                            ?>

                            <tr
                                data-status="<?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?>"
                                data-student="<?= htmlspecialchars($submission['student'], ENT_QUOTES, 'UTF-8') ?>"
                                data-title="<?= htmlspecialchars($submission['title'], ENT_QUOTES, 'UTF-8') ?>"
                            >

                                <td>
                                    #<?= (int)$submission['id'] ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($submission['student'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($submission['title'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($submission['course'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($submission['date'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($gradeText, ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($similarityText, ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <span class="ieg-badge <?= $badgeClass ?>">
                                        <?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?>
                                    </span>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="ieg-btn ieg-btn-outline view-submission-btn"

                                        data-id="<?= (int)$submission['id'] ?>"
                                        data-student="<?= htmlspecialchars($submission['student'], ENT_QUOTES, 'UTF-8') ?>"
                                        data-title="<?= htmlspecialchars($submission['title'], ENT_QUOTES, 'UTF-8') ?>"
                                        data-course="<?= htmlspecialchars($submission['course'], ENT_QUOTES, 'UTF-8') ?>"
                                        data-date="<?= htmlspecialchars($submission['date'], ENT_QUOTES, 'UTF-8') ?>"
                                        data-grade="<?= htmlspecialchars($gradeText, ENT_QUOTES, 'UTF-8') ?>"
                                        data-similarity="<?= htmlspecialchars($similarityText, ENT_QUOTES, 'UTF-8') ?>"
                                        data-status="<?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?>"
                                        data-note="<?= htmlspecialchars($submission['note'], ENT_QUOTES, 'UTF-8') ?>"
                                    >
                                        View Details
                                    </button>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>

                <p
                    id="noSubmissionsMessage"
                    class="ieg-muted-note"
                    style="display: none;"
                >
                    No submissions match your search.
                </p>

            </div>

        </section>

    </main>
</div>

<!-- SUBMISSION DETAILS MODAL -->
<div id="submissionModal" class="ieg-modal" hidden>

    <div
        class="ieg-modal-content"
        role="dialog"
        aria-modal="true"
        aria-labelledby="submissionModalTitle"
    >

        <div class="ieg-modal-header">

            <h2 id="submissionModalTitle">
                Submission Details
            </h2>

            <button
                type="button"
                id="closeSubmissionModal"
                class="ieg-modal-close"
                aria-label="Close submission details"
            >
                &times;
            </button>

        </div>

        <div class="ieg-modal-info">

            <p><strong>ID:</strong> <span id="detailSubmissionId"></span></p>

            <p><strong>Student:</strong> <span id="detailStudent"></span></p>

            <p><strong>Essay:</strong> <span id="detailTitle"></span></p>

            <p><strong>Course:</strong> <span id="detailCourse"></span></p>

            <p><strong>Date:</strong> <span id="detailDate"></span></p>

            <p><strong>AI Grade:</strong> <span id="detailGrade"></span></p>

            <p><strong>Similarity:</strong> <span id="detailSimilarity"></span></p>

            <p><strong>Status:</strong> <span id="detailStatus"></span></p>

            <p><strong>Review Note:</strong> <span id="detailNote"></span></p>

        </div>

        <button
            type="button"
            id="submissionModalDone"
            class="ieg-btn ieg-btn-primary"
        >
            Done
        </button>

    </div>
</div>

<script src="../assets/js/admin/submissions.js"></script>

</body>
</html>
