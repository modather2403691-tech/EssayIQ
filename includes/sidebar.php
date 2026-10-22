
<?php
// Base URL for the EssayIQ project
$baseUrl = $baseUrl ?? '/EssayIQ/EssayIQ';

// Get the current page path
$currentPath = parse_url(
    $_SERVER['SCRIPT_NAME'] ?? '',
    PHP_URL_PATH
) ?: '';

// Sidebar sections and their pages
$sidebarSections = [

    'Admin' => [
        'dashboard.php'   => 'Dashboard',
        'users.php'       => 'Users',
        'submissions.php' => 'Submissions',
        'analytics.php'   => 'Analytics',
        'profile.php'     => 'Profile',
        'activity-logs.php' => 'Activity Logs',
        'risk-monitor.php' => 'Risk Monitor'
    ],

    'AI Grading' => [
        'grading.php'              => 'Grading',
        'feedback.php'             => 'Feedback',
        'explainable-grading.php'  => 'Explainable Grading',
        'essay-comparison.php'     => 'Essay Comparison'
    ],

    'Plagiarism' => [
        'report.php' => 'Similarity Report'
    ]

];

// Folder corresponding to each section
$sectionFolders = [
    'Admin'       => 'admin',
    'AI Grading'  => 'ai',
    'Plagiarism'  => 'plagiarism'
];
?>

<aside class="ieg-sidebar" aria-label="Module navigation">

    <?php foreach ($sidebarSections as $section => $pages): ?>

        <div class="ieg-sidebar-section">

            <h2 class="ieg-sidebar-heading">
                <?= htmlspecialchars($section, ENT_QUOTES, 'UTF-8') ?>
            </h2>

            <?php foreach ($pages as $filename => $label): ?>

                <?php
                // Determine folder and full URL
                $folder = $sectionFolders[$section];

                $url = "$baseUrl/$folder/$filename";

                // Check whether this is the current page
                $isActive = $currentPath === $url;
                ?>

                <a
                    href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8') ?>"
                    class="ieg-sidebar-link<?= $isActive ? ' ieg-sidebar-active' : '' ?>"
                    <?= $isActive ? 'aria-current="page"' : '' ?>
                >
                    <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                </a>

            <?php endforeach; ?>

        </div>

    <?php endforeach; ?>

</aside>
