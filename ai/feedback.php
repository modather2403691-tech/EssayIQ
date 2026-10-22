<?php
$pageTitle = 'Interactive Essay Feedback - EssayIQ';
$baseUrl = '/EssayIQ/EssayIQ';
$essays = [
    101 => ['student' => 'Ahmed Ali', 'title' => 'The Impact of Artificial Intelligence on Education', 'grade' => 88, 'date' => '2026-10-12', 'summary' => 'Strong argument and relevant examples. Improve transitions between paragraphs.', 'criteria' => ['Grammar' => 90, 'Vocabulary' => 85, 'Coherence' => 86, 'Relevance' => 91], 'strengths' => ['Clear thesis and relevant examples', 'Good grammar and academic vocabulary'], 'improvements' => ['Add smoother transitions between ideas', 'Support the conclusion with a stronger final insight']],
    103 => ['student' => 'Mona Adel', 'title' => 'Social Media and Student Productivity', 'grade' => 62, 'date' => '2026-10-14', 'summary' => 'The main idea is understandable, but paragraph organization and supporting evidence need improvement.', 'criteria' => ['Grammar' => 64, 'Vocabulary' => 57, 'Coherence' => 57, 'Relevance' => 70], 'strengths' => ['Relevant topic and recognizable position', 'Some useful examples'], 'improvements' => ['Use topic sentences in each paragraph', 'Add evidence for claims', 'Review grammar and sentence clarity']],
    104 => ['student' => 'Omar Hassan', 'title' => 'The Future of Remote Work', 'grade' => 91, 'date' => '2026-10-15', 'summary' => 'Excellent organization, clear reasoning, and effective use of examples.', 'criteria' => ['Grammar' => 94, 'Vocabulary' => 88, 'Coherence' => 90, 'Relevance' => 92], 'strengths' => ['Well-structured discussion', 'Clear and precise language'], 'improvements' => ['Consider one additional counterargument']],
    105 => ['student' => 'Youssef Adel', 'title' => 'Ethics of Machine Learning', 'grade' => 73, 'date' => '2026-10-16', 'summary' => 'Good understanding of the subject. More specific examples would strengthen the analysis.', 'criteria' => ['Grammar' => 76, 'Vocabulary' => 68, 'Coherence' => 70, 'Relevance' => 78], 'strengths' => ['Appropriate focus on ethical concerns', 'Logical overall direction'], 'improvements' => ['Add concrete case studies', 'Improve transitions between sections']],
];
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$essay = $essays[$id] ?? $essays[101];
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/admin-navbar.php';
?>
<div class="ai-module"><div class="ai-layout"><?php require __DIR__ . '/../includes/sidebar.php'; ?><main class="ai-main" id="main">
    <a class="ai-back" href="<?= $baseUrl ?>/ai/grading.php">← Back to AI Grading</a>
    <header class="ai-heading"><div><span class="ai-eyebrow">ESSAYIQ / AI FEEDBACK</span><h1>Interactive Essay Feedback</h1><p><?= htmlspecialchars($essay['title'], ENT_QUOTES, 'UTF-8') ?></p></div><span class="ai-demo-tag">Simulated Feedback</span></header>
    <section class="ai-stats ai-stats-feedback">
        <article class="ai-stat"><small>Student</small><strong class="ai-stat-name"><?= htmlspecialchars($essay['student'], ENT_QUOTES, 'UTF-8') ?></strong><p>Essay #<?= (int) $id ?></p></article>
        <article class="ai-stat"><small>Overall grade</small><strong><?= (int) $essay['grade'] ?>%</strong><p>Illustrative Phase 1 score</p></article>
    </section>
    <section class="ai-two-column">
        <article class="ai-panel"><div class="ai-panel-heading"><div><span class="ai-section-label">ORIGINAL SUBMISSION</span><h2>Writing review</h2></div><span class="ai-status ai-status-graded">Reviewed</span></div>
            <div class="ai-essay-text">
                Artificial intelligence is changing education in many ways. <span class="ai-feedback-highlight" data-feedback="This claim is clear, but a concrete example would make it more persuasive.">It helps students learn faster</span> and teachers can use tools to save time. However, students should use technology carefully because it may make them depend on technology. In conclusion, AI is useful and education should use it in a responsible way.
            </div>
            <div class="ai-feedback-explanation" id="ai-feedback-explanation">Select a highlighted sentence to see a simulated explanation.</div>
        </article>
        <article class="ai-panel"><span class="ai-section-label">FEEDBACK CATEGORIES</span><h2>Rubric snapshot</h2><?php foreach ($essay['criteria'] as $criterion => $score): ?><div class="ai-criterion-card"><div class="ai-criterion-heading"><span><?= htmlspecialchars($criterion, ENT_QUOTES, 'UTF-8') ?></span><strong><?= (int) $score ?>%</strong></div><div class="ai-progress"><span style="width: <?= (int) $score ?>%"></span></div></div><?php endforeach; ?></article>
    </section>
    <section class="ai-panel"><div class="ai-panel-heading"><div><span class="ai-section-label">EXPLANATION</span><h2>Overall feedback</h2></div><a class="ai-action" href="<?= $baseUrl ?>/ai/explainable-grading.php?id=<?= (int) $id ?>">View grading explanation →</a></div><p class="ai-muted"><?= htmlspecialchars($essay['summary'], ENT_QUOTES, 'UTF-8') ?></p><div class="ai-feedback-columns"><div><h3>Strengths</h3><ul><?php foreach ($essay['strengths'] as $item): ?><li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li><?php endforeach; ?></ul></div><div><h3>Areas for improvement</h3><ul><?php foreach ($essay['improvements'] as $item): ?><li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li><?php endforeach; ?></ul></div></div></section>
    <nav class="ai-panel" aria-label="Feedback navigation"><span class="ai-section-label">CONTINUE REVIEW</span><div class="ai-nav-links"><a class="ai-action" href="<?= $baseUrl ?>/ai/essay-comparison.php?id=<?= (int) $id ?>">Compare original and improved essay →</a><a class="ai-action" href="<?= $baseUrl ?>/ai/grading.php">Return to dashboard →</a></div></nav>
<script src="<?= $baseUrl ?>/assets/js/ai.js?v=2" defer></script></body></html>
