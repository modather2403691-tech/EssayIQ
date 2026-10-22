<?php
$pageTitle = 'Academic Risk Monitor - EssayIQ';

// Phase 1: sample data matching the existing submissions prototype.
$submissions = [
    ['id'=>101,'student'=>'Ahmed Ali','title'=>'Impact of AI on Education','course'=>'Computer Science','grade'=>88,'similarity'=>12,'status'=>'Graded'],
    ['id'=>102,'student'=>'Sara Mohamed','title'=>'Climate Change Essay','course'=>'English Writing','grade'=>null,'similarity'=>null,'status'=>'Pending'],
    ['id'=>103,'student'=>'Mona Adel','title'=>'Ethics in Technology','course'=>'Software Engineering','grade'=>62,'similarity'=>78,'status'=>'Flagged'],
    ['id'=>104,'student'=>'Omar Khaled','title'=>'Future of Machine Learning','course'=>'Artificial Intelligence','grade'=>94,'similarity'=>8,'status'=>'Graded'],
    ['id'=>105,'student'=>'Nour Hassan','title'=>'Cybersecurity Challenges','course'=>'Computer Networks','grade'=>null,'similarity'=>null,'status'=>'Pending'],
    ['id'=>106,'student'=>'Youssef Adel','title'=>'Social Media and Society','course'=>'English Writing','grade'=>73,'similarity'=>46,'status'=>'Flagged'],
];

function assessAcademicRisk(array $submission): array {
    if ($submission['status'] === 'Pending' || $submission['grade'] === null || $submission['similarity'] === null) {
        return ['level'=>'Not Assessed','points'=>null,'reasons'=>['Awaiting grading and similarity results'],'recommendation'=>'Wait for assessment results before making a risk decision.'];
    }
    $points = 0;
    $reasons = [];
    if ($submission['grade'] < 65) {
        $points += 2;
        $reasons[] = 'Grade below 65%';
    } elseif ($submission['grade'] < 75) {
        $points += 1;
        $reasons[] = 'Grade below 75%';
    }
    if ($submission['similarity'] >= 70) {
        $points += 2;
        $reasons[] = 'Similarity of 70% or higher — source review recommended';
    } elseif ($submission['similarity'] >= 40) {
        $points += 1;
        $reasons[] = 'Similarity of 40% or higher — check citations and sources';
    }
    if ($submission['status'] === 'Flagged') {
        $points += 1;
        $reasons[] = 'Submission previously flagged for review';
    }
    $level = $points >= 4 ? 'High' : ($points >= 2 ? 'Medium' : 'Low');
    if (!$reasons) $reasons[] = 'No configured risk triggers detected';
    $recommendation = match ($level) {
        'High' => 'Prioritize human review of the essay, rubric, and cited sources.',
        'Medium' => 'Review the highlighted criteria and source attribution.',
        default => 'No priority review indicated by these demo rules.'
    };
    return compact('level', 'points', 'reasons', 'recommendation');
}

$counts = ['High'=>0,'Medium'=>0,'Low'=>0,'Not Assessed'=>0];
foreach ($submissions as &$submission) {
    $submission['risk'] = assessAcademicRisk($submission);
    $counts[$submission['risk']['level']]++;
}
unset($submission);

require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/admin-navbar.php';
?>
<div class="ieg-dashboard-layout">
    <?php require __DIR__ . '/../includes/sidebar.php'; ?>
    <main class="ieg-dashboard-content" id="main">
        <div class="ieg-dashboard-heading">
            <div>
                <h1 class="ieg-page-title">Intelligent Academic Risk Monitor</h1>
                <p class="ieg-page-description">Explainable, rule-based triage for submissions that may need human review.</p>
            </div>
        </div>
        <section class="ieg-stats-grid" aria-label="Risk summary">
            <div class="ieg-card"><p>High Priority</p><div class="ieg-stat-number"><?= $counts['High'] ?></div></div>
            <div class="ieg-card"><p>Medium Priority</p><div class="ieg-stat-number"><?= $counts['Medium'] ?></div></div>
            <div class="ieg-card"><p>Low Priority</p><div class="ieg-stat-number"><?= $counts['Low'] ?></div></div>
            <div class="ieg-card"><p>Not Assessed</p><div class="ieg-stat-number"><?= $counts['Not Assessed'] ?></div></div>
        </section>
        <section class="ieg-card ieg-dashboard-section">
            <h2 class="ieg-card-title">Risk Assessment Queue</h2>
            <p class="ieg-risk-intro">Risk is a review priority, not a verdict. A similarity percentage alone does not prove plagiarism.</p>
            <div class="ieg-risk-controls">
                <input class="ieg-input" type="search" id="riskSearch" placeholder="Search student, essay or course..." aria-label="Search submissions">
                <select class="ieg-select" id="riskFilter" aria-label="Filter risk level">
                    <option value="All">All Risk Levels</option><option value="High">High</option><option value="Medium">Medium</option><option value="Low">Low</option><option value="Not Assessed">Not Assessed</option>
                </select>
            </div>
            <div class="ieg-table-wrapper">
                <table class="ieg-table" id="riskTable">
                    <thead><tr><th>ID</th><th>Student</th><th>Essay / Course</th><th>Grade</th><th>Similarity</th><th>Status</th><th>Risk</th><th>Explanation</th></tr></thead>
                    <tbody>
                    <?php foreach ($submissions as $s):
                        $risk = $s['risk'];
                        $riskClass = match ($risk['level']) {
                            'High'=>'ieg-risk-high','Medium'=>'ieg-risk-medium','Low'=>'ieg-risk-low',default=>'ieg-risk-pending'
                        };
                        $search = strtolower($s['student'].' '.$s['title'].' '.$s['course'].' '.$s['id']);
                    ?>
                    <tr data-risk="<?= htmlspecialchars($risk['level'], ENT_QUOTES, 'UTF-8') ?>" data-search="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>">
                        <td>#<?= (int)$s['id'] ?></td>
                        <td><?= htmlspecialchars($s['student'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><strong><?= htmlspecialchars($s['title'], ENT_QUOTES, 'UTF-8') ?></strong><div class="ieg-risk-secondary"><?= htmlspecialchars($s['course'], ENT_QUOTES, 'UTF-8') ?></div></td>
                        <td><?= $s['grade'] === null ? '—' : (int)$s['grade'].'%' ?></td>
                        <td><?= $s['similarity'] === null ? '—' : (int)$s['similarity'].'%' ?></td>
                        <td><?= htmlspecialchars($s['status'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><span class="ieg-risk-pill <?= $riskClass ?>"><?= htmlspecialchars($risk['level'], ENT_QUOTES, 'UTF-8') ?></span></td>
                        <td><button type="button" class="ieg-btn ieg-btn-outline ieg-risk-details-btn" data-details="<?= htmlspecialchars(json_encode(['student'=>$s['student'],'title'=>$s['title'],'level'=>$risk['level'],'reasons'=>$risk['reasons'],'recommendation'=>$risk['recommendation']], JSON_UNESCAPED_UNICODE | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_HEX_TAG), ENT_QUOTES, 'UTF-8') ?>">Why?</button></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="ieg-muted-note" id="riskEmpty" hidden>No submissions match the selected filters.</p>
            </div>
        </section>
        <section class="ieg-card ieg-dashboard-section">
            <h2 class="ieg-card-title">How Risk Levels Are Calculated</h2>
            <div class="ieg-risk-rules">
                <div><strong>Grade</strong><p>Below 65%: +2 points; 65–74%: +1 point.</p></div>
                <div><strong>Similarity</strong><p>70% or higher: +2 points; 40–69%: +1 point.</p></div>
                <div><strong>Flagged status</strong><p>Previously flagged: +1 point.</p></div>
                <div><strong>Priority</strong><p>High: 4+ points; Medium: 2–3; Low: 0–1. Pending results are not assessed.</p></div>
            </div>
            <p class="ieg-muted-note">These are illustrative thresholds, not validated academic misconduct indicators. A reviewer must inspect context and sources before deciding on any action.</p>
        </section>
    </main>
</div>
<div class="ieg-modal" id="riskModal" hidden>
    <div class="ieg-modal-content" role="dialog" aria-modal="true" aria-labelledby="riskModalTitle">
        <div class="ieg-modal-header"><h2 id="riskModalTitle">Risk Explanation</h2><button class="ieg-modal-close" type="button" id="riskClose" aria-label="Close explanation">&times;</button></div>
        <div class="ieg-modal-info">
            <p><strong>Student:</strong> <span id="riskStudent"></span></p>
            <p><strong>Essay:</strong> <span id="riskEssay"></span></p>
            <p><strong>Risk Level:</strong> <span id="riskLevel"></span></p>
            <strong>Triggered Rules</strong><ul id="riskReasons"></ul>
            <p><strong>Suggested Next Step:</strong> <span id="riskRecommendation"></span></p>
        </div>
        <button type="button" class="ieg-btn ieg-btn-primary" id="riskDone">Done</button>
    </div>
</div>
<script src="../assets/js/admin/risk-monitor.js"></script>
</body>
</html>
