<?php
$pageTitle = 'AI Grading Dashboard - EssayIQ';
$baseUrl = '/EssayIQ/EssayIQ';

// Phase 1 demo data. These records will be replaced by database results in Phase 2.
$essays = [
    [
        'id' => 101,
        'student' => 'Ahmed Ali',
        'title' => 'The Impact of Artificial Intelligence on Education',
        'date' => '2026-10-12',
        'grade' => 88,
        'status' => 'Graded',
        'summary' => 'Strong argument supported by relevant examples. The transitions between paragraphs can be smoother.',
        'criteria' => ['Grammar' => 90, 'Vocabulary' => 85, 'Coherence' => 86, 'Relevance' => 91],
    ],
    [
        'id' => 102,
        'student' => 'Sara Mohamed',
        'title' => 'Climate Change and Sustainable Cities',
        'date' => '2026-10-13',
        'grade' => null,
        'status' => 'Pending',
        'summary' => 'This submission is waiting for a demonstration evaluation.',
        'criteria' => [],
    ],
    [
        'id' => 103,
        'student' => 'Mona Adel',
        'title' => 'Social Media and Student Productivity',
        'date' => '2026-10-14',
        'grade' => 62,
        'status' => 'Graded',
        'summary' => 'The main idea is understandable, but paragraph organization and supporting evidence need improvement.',
        'criteria' => ['Grammar' => 64, 'Vocabulary' => 57, 'Coherence' => 57, 'Relevance' => 70],
    ],
    [
        'id' => 104,
        'student' => 'Omar Hassan',
        'title' => 'The Future of Remote Work',
        'date' => '2026-10-15',
        'grade' => 91,
        'status' => 'Graded',
        'summary' => 'Excellent organization, clear reasoning, and effective use of examples.',
        'criteria' => ['Grammar' => 94, 'Vocabulary' => 88, 'Coherence' => 90, 'Relevance' => 92],
    ],
    [
        'id' => 105,
        'student' => 'Youssef Adel',
        'title' => 'Ethics of Machine Learning',
        'date' => '2026-10-16',
        'grade' => 73,
        'status' => 'Graded',
        'summary' => 'Good understanding of the subject. More specific examples would strengthen the analysis.',
        'criteria' => ['Grammar' => 76, 'Vocabulary' => 68, 'Coherence' => 70, 'Relevance' => 78],
    ],
    [
        'id' => 106,
        'student' => 'Nour Khaled',
        'title' => 'Renewable Energy in Modern Society',
        'date' => '2026-10-17',
        'grade' => null,
        'status' => 'Pending',
        'summary' => 'This submission is waiting for a demonstration evaluation.',
        'criteria' => [],
    ],
];

$graded = array_values(array_filter($essays, static fn (array $essay): bool => $essay['grade'] !== null));
$pending = count($essays) - count($graded);
$average = count($graded) > 0
    ? round(array_sum(array_column($graded, 'grade')) / count($graded))
    : 0;
$featuredEssay = $graded[0];

require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/admin-navbar.php';
?>

<div class="ai-module">
    <div class="ai-layout">
        <?php require __DIR__ . '/../includes/sidebar.php'; ?>

        <main class="ai-main" id="main">
            <header class="ai-heading">
                <div>
                    <span class="ai-eyebrow">ESSAYIQ / AI MODULE</span>
                    <h1>AI Grading Dashboard</h1>
                    <p>Review simulated essay evaluations and explore transparent grading feedback.</p>
                </div>
                
            </header>

            <section class="ai-stats" aria-label="Grading summary">
                <article class="ai-stat">
                    <span class="ai-stat-icon ai-icon-blue" aria-hidden="true">▤</span>
                    <div><small>Total essays</small><strong><?= count($essays) ?></strong></div>
                    <p>All available submissions</p>
                </article>
                <article class="ai-stat">
                    <span class="ai-stat-icon ai-icon-green" aria-hidden="true">✓</span>
                    <div><small>Graded essays</small><strong><?= count($graded) ?></strong></div>
                    <p><?= round((count($graded) / count($essays)) * 100) ?>% of submissions</p>
                </article>
                <article class="ai-stat">
                    <span class="ai-stat-icon ai-icon-yellow" aria-hidden="true">◷</span>
                    <div><small>Pending essays</small><strong><?= $pending ?></strong></div>
                    <p>Awaiting evaluation</p>
                </article>
                <article class="ai-stat">
                    <span class="ai-stat-icon ai-icon-purple" aria-hidden="true">↗</span>
                    <div><small>Average score</small><strong><?= $average ?>%</strong></div>
                    <p>Graded essays only</p>
                </article>
            </section>

            <section class="ai-dashboard-grid">
                <section class="ai-panel ai-overview-panel" aria-labelledby="ai-overview-title">
                    <div class="ai-panel-heading">
                        <div>
                            <span class="ai-section-label">SELECTED ESSAY</span>
                            <h2 id="ai-overview-title">Grading overview</h2>
                        </div>
                        <span id="ai-overview-status" class="ai-status ai-status-graded">Graded</span>
                    </div>
                    <div class="ai-overview-score">
                        <div class="ai-score-ring" id="ai-overview-ring" style="--score:88">
                            <strong id="ai-overview-score">88</strong><span>/100</span>
                        </div>
                        <div>
                            <h3 id="ai-overview-student"><?= htmlspecialchars($featuredEssay['student'], ENT_QUOTES, 'UTF-8') ?></h3>
                            <p id="ai-overview-title-text"><?= htmlspecialchars($featuredEssay['title'], ENT_QUOTES, 'UTF-8') ?></p>
                            <small id="ai-overview-date">Submitted <?= htmlspecialchars($featuredEssay['date'], ENT_QUOTES, 'UTF-8') ?></small>
                        </div>
                    </div>
                    <p class="ai-overview-summary" id="ai-overview-summary"><?= htmlspecialchars($featuredEssay['summary'], ENT_QUOTES, 'UTF-8') ?></p>
                    <div class="ai-mini-breakdown" id="ai-overview-criteria">
                        <?php foreach ($featuredEssay['criteria'] as $criterion => $score): ?>
                            <div><span><?= htmlspecialchars($criterion, ENT_QUOTES, 'UTF-8') ?></span><strong><?= (int) $score ?>%</strong><i><b style="width: <?= (int) $score ?>%"></b></i></div>
                        <?php endforeach; ?>
                    </div>
                    <a class="ai-primary-link" id="ai-overview-link" href="<?= $baseUrl ?>/ai/feedback.php?id=<?= (int) $featuredEssay['id'] ?>">Open detailed feedback <span aria-hidden="true">→</span></a>
                </section>

                <section class="ai-panel ai-activity-panel" aria-labelledby="ai-activity-title">
                    <div class="ai-panel-heading">
                        <div><span class="ai-section-label">AT A GLANCE</span><h2 id="ai-activity-title">Evaluation health</h2></div>
                    </div>
                    <div class="ai-health-score"><strong><?= round((count($graded) / count($essays)) * 100) ?>%</strong><span>completion rate</span></div>
                    <div class="ai-health-bar"><span style="width: <?= round((count($graded) / count($essays)) * 100) ?>%"></span></div>
                    <div class="ai-health-list">
                        <div><span class="ai-dot ai-dot-green"></span><span>Completed evaluations</span><strong><?= count($graded) ?></strong></div>
                        <div><span class="ai-dot ai-dot-yellow"></span><span>Pending evaluations</span><strong><?= $pending ?></strong></div>
                        <div><span class="ai-dot ai-dot-blue"></span><span>Criteria tracked</span><strong>4</strong></div>
                    </div>
                    <p class="ai-health-note">Scores are illustrative and are not produced by a live AI model.</p>
                </section>
            </section>

            <section class="ai-panel" aria-labelledby="ai-essays-heading">
                <div class="ai-panel-heading">
                    <div><span class="ai-section-label">SUBMISSIONS</span><h2 id="ai-essays-heading">Essay grading results</h2><p>Search by student, title, or essay ID and filter by status.</p></div>
                    <span id="ai-result-count" class="ai-count"><?= count($essays) ?> essays</span>
                </div>
                <div class="ai-toolbar">
                    <label class="ai-search-label"><span class="ai-visually-hidden">Search essays</span><span class="ai-search-icon" aria-hidden="true">⌕</span><input type="search" id="ai-search" placeholder="Search essays..." autocomplete="off"></label>
                    <label class="ai-filter-label"><span class="ai-visually-hidden">Filter by status</span><select id="ai-status"><option value="all">All statuses</option><option value="graded">Graded</option><option value="pending">Pending</option></select></label>
                    <button type="button" class="ai-reset" id="ai-reset">Reset</button>
                </div>
                <div class="ai-table-scroll">
                    <table class="ai-table">
                        <thead><tr><th>Essay</th><th>Student</th><th>Submitted</th><th>Score</th><th>Status</th><th><span class="ai-visually-hidden">Actions</span></th></tr></thead>
                        <tbody id="ai-essay-rows">
                        <?php foreach ($essays as $essay): ?>
                            <tr data-id="<?= (int) $essay['id'] ?>" data-status="<?= strtolower($essay['status']) ?>" data-search="<?= htmlspecialchars(strtolower($essay['id'] . ' ' . $essay['student'] . ' ' . $essay['title']), ENT_QUOTES, 'UTF-8') ?>">
                                <td><span class="ai-id">#<?= (int) $essay['id'] ?></span><strong class="ai-title-cell"><?= htmlspecialchars($essay['title'], ENT_QUOTES, 'UTF-8') ?></strong></td>
                                <td><?= htmlspecialchars($essay['student'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($essay['date'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td class="ai-score-cell"><?= $essay['grade'] === null ? '—' : (int) $essay['grade'] . '%' ?></td>
                                <td><span class="ai-status ai-status-<?= strtolower($essay['status']) ?>"><?= htmlspecialchars($essay['status'], ENT_QUOTES, 'UTF-8') ?></span></td>
                                <td><?php if ($essay['grade'] !== null): ?><button type="button" class="ai-preview" data-preview-id="<?= (int) $essay['id'] ?>">Preview <span aria-hidden="true">→</span></button><?php else: ?><span class="ai-unavailable">Queued</span><?php endif; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <p id="ai-empty" class="ai-empty" hidden>No essays match your search or filter.</p>
            </section>

        </main>
    </div>
</div>

<script>
window.essayIqGradingData = <?= json_encode($essays, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
</script>
<script src="<?= htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8') ?>/assets/js/ai.js?v=2" defer></script>
</body>
</html>
