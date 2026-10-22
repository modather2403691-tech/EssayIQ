<?php
$pageTitle = 'Activity Logs - EssayIQ';
$activityLogs = [
    ['id' => 'SAMPLE-1', 'admin' => 'System Admin', 'action' => 'Submission Review', 'target' => 'Essay #103', 'date' => '2026-10-16 09:25', 'severity' => 'Warning', 'details' => 'Sample: opened a flagged submission for review.'],
    ['id' => 'SAMPLE-2', 'admin' => 'System Admin', 'action' => 'User Viewed', 'target' => 'Ahmed Ali', 'date' => '2026-10-15 14:40', 'severity' => 'Info', 'details' => 'Sample: viewed a student account.'],
    ['id' => 'SAMPLE-3', 'admin' => 'System Admin', 'action' => 'Analytics Viewed', 'target' => 'Advanced Analytics', 'date' => '2026-10-14 11:10', 'severity' => 'Info', 'details' => 'Sample: opened analytics.'],
    ['id' => 'SAMPLE-4', 'admin' => 'System Admin', 'action' => 'Account Deactivated', 'target' => 'Mona Adel', 'date' => '2026-10-13 13:05', 'severity' => 'Critical', 'details' => 'Sample event; no actual account was changed.'],
    ['id' => 'SAMPLE-5', 'admin' => 'System Admin', 'action' => 'Profile Updated', 'target' => 'Administrator Profile', 'date' => '2026-10-12 10:30', 'severity' => 'Info', 'details' => 'Sample profile change.']
];
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/admin-navbar.php';
?>
<div class="ieg-dashboard-layout">
    <?php require __DIR__ . '/../includes/sidebar.php'; ?>
    <main class="ieg-dashboard-content" id="main">
        <div class="ieg-dashboard-heading"><div>
            <h1 class="ieg-page-title">Admin Activity Logs</h1>
            <p class="ieg-page-description">Sample records and browser-only demo actions.</p>
        </div></div>
        <section class="ieg-stats-grid">
            <div class="ieg-card"><p>Total Activities</p><div class="ieg-stat-number" id="logTotal">0</div></div>
            <div class="ieg-card"><p>Information Events</p><div class="ieg-stat-number" id="logInfo">0</div></div>
            <div class="ieg-card"><p>Warning Events</p><div class="ieg-stat-number" id="logWarning">0</div></div>
            <div class="ieg-card"><p>Critical Events</p><div class="ieg-stat-number" id="logCritical">0</div></div>
        </section>
        <section class="ieg-card ieg-dashboard-section">
            <h2 class="ieg-card-title">Activity History</h2>
            <div class="ieg-quick-actions" style="margin-bottom:20px;gap:12px;flex-wrap:wrap;">
                <input id="logSearch" type="search" class="ieg-input" placeholder="Search logs..." aria-label="Search activity logs" style="max-width:340px;">
                <select id="severityFilter" class="ieg-select" aria-label="Filter severity" style="max-width:190px;">
                    <option value="All">All Severities</option><option value="Info">Info</option><option value="Warning">Warning</option><option value="Critical">Critical</option>
                </select>
                <button type="button" class="ieg-btn ieg-btn-outline" id="resetLogFilters">Reset Filters</button>
                <button type="button" class="ieg-btn ieg-btn-outline" id="clearDemoLogs">Clear Demo Actions</button>
            </div>
            <div class="ieg-table-wrapper">
                <table class="ieg-table" id="activityLogsTable">
                    <thead><tr><th>Log ID</th><th>Administrator</th><th>Action</th><th>Target</th><th>Date &amp; Time</th><th>Severity</th><th>Details</th></tr></thead>
                    <tbody></tbody>
                </table>
                <p class="ieg-muted-note" id="noLogsMessage" hidden>No activity logs match your filters.</p>
            </div>
        </section>
    </main>
</div>
<script type="application/json" id="sampleLogs"><?= json_encode($activityLogs, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
<script src="../assets/js/admin/activity-logs.js"></script>
</body>
</html>
