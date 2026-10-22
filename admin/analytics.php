
<?php
$pageTitle = 'Advanced Analytics - EssayIQ';

// Phase 1 demo data
// Matches the six sample records in submissions.php
$submissions = [
    ['course' => 'Computer Science', 'grade' => 88, 'status' => 'Graded'],
    ['course' => 'English Writing', 'grade' => null, 'status' => 'Pending'],
    ['course' => 'Software Engineering', 'grade' => 62, 'status' => 'Flagged'],
    ['course' => 'Artificial Intelligence', 'grade' => 94, 'status' => 'Graded'],
    ['course' => 'Computer Networks', 'grade' => null, 'status' => 'Pending'],
    ['course' => 'English Writing', 'grade' => 73, 'status' => 'Flagged']
];

$totalUsers = 5; // Demo count from users.php
$totalSubmissions = count($submissions);

$statusCounts = [
    'Graded' => 0,
    'Pending' => 0,
    'Flagged' => 0
];

$gradeGroups = [
    '0-49' => 0,
    '50-69' => 0,
    '70-84' => 0,
    '85-100' => 0
];

$grades = [];
$courseData = [];

foreach ($submissions as $submission) {

    $statusCounts[$submission['status']]++;

    if ($submission['grade'] === null) {
        continue;
    }

    $grade = $submission['grade'];
    $grades[] = $grade;

    if ($grade < 50) {
        $gradeGroups['0-49']++;
    } elseif ($grade < 70) {
        $gradeGroups['50-69']++;
    } elseif ($grade < 85) {
        $gradeGroups['70-84']++;
    } else {
        $gradeGroups['85-100']++;
    }

    $course = $submission['course'];

    if (!isset($courseData[$course])) {
        $courseData[$course] = [
            'total' => 0,
            'count' => 0
        ];
    }

    $courseData[$course]['total'] += $grade;
    $courseData[$course]['count']++;
}

$averageGrade = count($grades) > 0
    ? round(array_sum($grades) / count($grades), 1)
    : null;

$flaggedPercentage = $totalSubmissions > 0
    ? round($statusCounts['Flagged'] / $totalSubmissions * 100, 1)
    : 0;

$pendingPercentage = $totalSubmissions > 0
    ? round($statusCounts['Pending'] / $totalSubmissions * 100, 1)
    : 0;

require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/admin-navbar.php';
?>

<div class="ieg-dashboard-layout">

    <?php require __DIR__ . '/../includes/sidebar.php'; ?>

    <main class="ieg-dashboard-content" id="main">

        <!-- PAGE HEADER -->
        <div class="ieg-dashboard-heading">
            <div>
                <h1 class="ieg-page-title">Advanced Analytics</h1>
                <p class="ieg-page-description">
                    Monitor essay performance, grading trends,
                    and academic review indicators.
                </p>
            </div>

        </div>

        <!-- KPI CARDS -->
        <section class="ieg-stats-grid">

            <div class="ieg-card">
                <p>Total Users</p>
                <div class="ieg-stat-number">
                    <?= $totalUsers ?>
                </div>
                <span class="ieg-analytics-caption">
                    Registered demo accounts
                </span>
            </div>

            <div class="ieg-card">
                <p>Total Submissions</p>
                <div class="ieg-stat-number">
                    <?= $totalSubmissions ?>
                </div>
                <span class="ieg-analytics-caption">
                    Across all courses
                </span>
            </div>

            <div class="ieg-card">
                <p>Average AI Grade</p>
                <div class="ieg-stat-number">
                    <?= $averageGrade === null ? '—' : $averageGrade . '%' ?>
                </div>
                <span class="ieg-analytics-caption">
                    Submissions with available grades
                </span>
            </div>

            <div class="ieg-card">
                <p>Flagged Submissions</p>
                <div class="ieg-stat-number">
                    <?= $flaggedPercentage ?>%
                </div>
                <span class="ieg-analytics-caption">
                    Require human review
                </span>
            </div>

        </section>

        <!-- CHARTS -->
        <section class="ieg-analytics-grid">

            <!-- SUBMISSION STATUS -->
            <div class="ieg-card">

                <h2 class="ieg-card-title">
                    Submission Status
                </h2>

                <p class="ieg-analytics-caption">
                    Number of essays by processing status
                </p>

                <?php foreach ($statusCounts as $status => $count): ?>

                    <?php
                    $percentage = $totalSubmissions > 0
                        ? $count / $totalSubmissions * 100
                        : 0;

                    $colorClass = match ($status) {
                        'Graded' => 'ieg-bar-success',
                        'Pending' => 'ieg-bar-warning',
                        'Flagged' => 'ieg-bar-danger',
                        default => ''
                    };
                    ?>

                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span>
                                <?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?>
                            </span>

                            <strong><?= $count ?></strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="<?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?> percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="<?= round($percentage, 1) ?>">

                            <div
                                class="ieg-chart-fill <?= $colorClass ?>"
                                style="width: <?= $percentage ?>%;"
                            ></div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

            <!-- GRADE DISTRIBUTION -->
            <div class="ieg-card">

                <h2 class="ieg-card-title">
                    Grade Distribution
                </h2>

                <p class="ieg-analytics-caption">
                    Number of essays in each grade range
                </p>

                <?php foreach ($gradeGroups as $range => $count): ?>

                    <?php
                    $percentage = count($grades) > 0
                        ? $count / count($grades) * 100
                        : 0;
                    ?>

                    <div class="ieg-chart-item">

                        <div class="ieg-chart-label">
                            <span><?= htmlspecialchars($range, ENT_QUOTES, 'UTF-8') ?>%</span>
                            <strong><?= $count ?></strong>
                        </div>

                        <div class="ieg-chart-track"
                             role="meter"
                             aria-label="Grade range <?= htmlspecialchars($range, ENT_QUOTES, 'UTF-8') ?> percentage"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             aria-valuenow="<?= round($percentage, 1) ?>">

                            <div
                                class="ieg-chart-fill ieg-bar-primary"
                                style="width: <?= $percentage ?>%;"
                            ></div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

        <!-- COURSE PERFORMANCE -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">
                Course Performance
            </h2>

            <p class="ieg-analytics-caption">
                Average available essay grade per course
            </p>

            <div class="ieg-table-wrapper">

                <table class="ieg-table">

                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Graded Essays</th>
                            <th>Average Grade</th>
                            <th>Performance</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($courseData as $course => $data): ?>

                            <?php
                            $courseAverage = round(
                                $data['total'] / $data['count'],
                                1
                            );
                            ?>

                            <tr>
                                <td>
                                    <?= htmlspecialchars($course, ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td><?= $data['count'] ?></td>

                                <td><?= $courseAverage ?>%</td>

                                <td>
                                    <div class="ieg-chart-track ieg-chart-track-small">
                                        <div
                                            class="ieg-chart-fill ieg-bar-primary"
                                            style="width: <?= $courseAverage ?>%;"
                                        ></div>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </section>

        <!-- ACADEMIC INSIGHTS -->
        <section class="ieg-card ieg-dashboard-section">

            <h2 class="ieg-card-title">
                Academic Insights
            </h2>

            <div class="ieg-insights-grid">

                <div class="ieg-insight-item">
                    <span class="ieg-insight-icon">📊</span>

                    <div>
                        <strong>Grading Overview</strong>
                        <p>
                            <?= count($grades) ?> of
                            <?= $totalSubmissions ?>
                            submissions currently have grades.
                        </p>
                    </div>
                </div>

                <div class="ieg-insight-item">
                    <span class="ieg-insight-icon">⚠️</span>

                    <div>
                        <strong>Review Attention</strong>
                        <p>
                            <?= $statusCounts['Flagged'] ?>
                            submissions are flagged for human review.
                            A similarity flag is not proof of plagiarism.
                        </p>
                    </div>
                </div>

                <div class="ieg-insight-item">
                    <span class="ieg-insight-icon">⏳</span>

                    <div>
                        <strong>Pending Workload</strong>
                        <p>
                            <?= $pendingPercentage ?>% of submissions
                            are waiting for grading or analysis.
                        </p>
                    </div>
                </div>

            </div>


        </section>

    </main>
</div>

</body>
</html>
