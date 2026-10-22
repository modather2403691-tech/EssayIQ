<?php
$pageTitle = 'Admin Dashboard - EssayIQ';
require __DIR__ . '/../includes/demo-data.php';

// Phase 1 demo: keep this summary aligned with admin/risk-monitor.php.
// These are review priorities, not findings of academic misconduct.
$riskSubmissions = [
    ['id' => 101, 'student' => 'Ahmed Ali', 'title' => 'Impact of AI on Education', 'grade' => 88, 'similarity' => 12, 'status' => 'Graded'],
    ['id' => 102, 'student' => 'Sara Mohamed', 'title' => 'Climate Change Essay', 'grade' => null, 'similarity' => null, 'status' => 'Pending'],
    ['id' => 103, 'student' => 'Mona Adel', 'title' => 'Ethics in Technology', 'grade' => 62, 'similarity' => 78, 'status' => 'Flagged'],
    ['id' => 104, 'student' => 'Omar Khaled', 'title' => 'Future of Machine Learning', 'grade' => 94, 'similarity' => 8, 'status' => 'Graded'],
    ['id' => 105, 'student' => 'Nour Hassan', 'title' => 'Cybersecurity Challenges', 'grade' => null, 'similarity' => null, 'status' => 'Pending'],
    ['id' => 106, 'student' => 'Youssef Adel', 'title' => 'Social Media and Society', 'grade' => 73, 'similarity' => 46, 'status' => 'Flagged'],
];

$riskCounts = ['High' => 0, 'Medium' => 0, 'Low' => 0, 'Not Assessed' => 0];
$priorityReviews = [];
foreach ($riskSubmissions as $submission) {
    $reasons = [];
    if ($submission['status'] === 'Pending' || $submission['grade'] === null || $submission['similarity'] === null) {
        $level = 'Not Assessed';
    } else {
        $points = 0;
        if ($submission['grade'] < 65) {
            $points += 2;
            $reasons[] = 'Grade below 65%';
        } elseif ($submission['grade'] < 75) {
            $points += 1;
            $reasons[] = 'Grade below 75%';
        }
        if ($submission['similarity'] >= 70) {
            $points += 2;
            $reasons[] = 'Similarity 70% or higher';
        } elseif ($submission['similarity'] >= 40) {
            $points += 1;
            $reasons[] = 'Similarity 40% or higher';
        }
        if ($submission['status'] === 'Flagged') {
            $points += 1;
            $reasons[] = 'Previously flagged';
        }
        $level = $points >= 4 ? 'High' : ($points >= 2 ? 'Medium' : 'Low');
    }
    $riskCounts[$level]++;
    if ($level === 'High' || $level === 'Medium') {
        $submission['riskLevel'] = $level;
        $submission['riskReasons'] = $reasons;
        $priorityReviews[] = $submission;
    }
}
usort($priorityReviews, static fn($a, $b) => ($a['riskLevel'] === 'High' ? 0 : 1) <=> ($b['riskLevel'] === 'High' ? 0 : 1));

require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/admin-navbar.php';
?>
<div class="ieg-dashboard-layout">
  <?php require __DIR__ . '/../includes/sidebar.php'; ?>
  <main class="ieg-dashboard-content" id="main">
    <div class="ieg-dashboard-heading">
      <div><h1 class="ieg-page-title">Admin Dashboard</h1><p class="ieg-page-description">Monitor users, essays and system activities.</p></div>
    </div>

    <section class="ieg-stats-grid" aria-label="System statistics">
      <?php foreach (['students'=>'Total Students','instructors'=>'Total Instructors','essays'=>'Total Essays','pending'=>'Pending Reviews'] as $key => $label): ?>
        <div class="ieg-card"><p><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></p><div class="ieg-stat-number"><?= (int)$dashboardStats[$key] ?></div></div>
      <?php endforeach; ?>
    </section>

    <!-- Intelligent Academic Risk Monitor: Phase 1 demo overview -->
    <section class="ieg-card ieg-dashboard-section" aria-labelledby="riskOverviewHeading">
      <div class="ieg-dashboard-heading" style="margin-bottom:18px;">
        <div>
          <h2 class="ieg-card-title" id="riskOverviewHeading">Academic Risk Overview</h2>
          <p class="ieg-page-description">Explainable review priorities based on demo grades, similarity and submission status.</p>
        </div>
        <a class="ieg-btn ieg-btn-primary" href="risk-monitor.php">View Risk Monitor</a>
      </div>

      <div class="ieg-stats-grid" aria-label="Risk level statistics">
        <?php foreach (['High' => 'High Priority', 'Medium' => 'Medium Priority', 'Low' => 'Low Priority', 'Not Assessed' => 'Not Assessed'] as $level => $label): ?>
          <div class="ieg-card">
            <p><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></p>
            <div class="ieg-stat-number"><?= (int)$riskCounts[$level] ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <h3 class="ieg-card-title" style="margin-top:24px;">Priority Review Queue</h3>
      <div class="ieg-table-wrapper">
        <table class="ieg-table">
          <thead><tr><th scope="col">Essay ID</th><th scope="col">Student</th><th scope="col">Essay</th><th scope="col">Grade</th><th scope="col">Similarity</th><th scope="col">Risk Level</th><th scope="col">Why Flagged?</th></tr></thead>
          <tbody>
          <?php foreach ($priorityReviews as $review): ?>
            <tr>
              <td>#<?= (int)$review['id'] ?></td>
              <td><?= htmlspecialchars($review['student'], ENT_QUOTES, 'UTF-8') ?></td>
              <td><?= htmlspecialchars($review['title'], ENT_QUOTES, 'UTF-8') ?></td>
              <td><?= (int)$review['grade'] ?>%</td>
              <td><?= (int)$review['similarity'] ?>%</td>
              <td><span class="ieg-badge <?= $review['riskLevel'] === 'High' ? 'ieg-badge-danger' : 'ieg-badge-warning' ?>"><?= htmlspecialchars($review['riskLevel'], ENT_QUOTES, 'UTF-8') ?></span></td>
              <td><?= htmlspecialchars(implode('; ', $review['riskReasons']), ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      
    </section>

    <section class="ieg-card ieg-dashboard-section">
      <h2 class="ieg-card-title">Recent Submissions</h2>
      <div class="ieg-table-wrapper"><table class="ieg-table">
        <thead><tr><th scope="col">ID</th><th scope="col">Student</th><th scope="col">Assignment</th><th scope="col">Status</th><th scope="col">Grade</th></tr></thead>
        <tbody>
        <?php foreach ($recentSubmissions as $essay):
          $statusClass = $essay['status'] === 'Graded' ? 'ieg-badge-success' : 'ieg-badge-warning'; ?>
          <tr>
            <td>#<?= (int)$essay['id'] ?></td>
            <td><?= htmlspecialchars($essay['student'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($essay['assignment'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><span class="ieg-badge <?= $statusClass ?>"><?= htmlspecialchars($essay['status'], ENT_QUOTES, 'UTF-8') ?></span></td>
            <td><?= $essay['grade'] !== null ? (int)$essay['grade'] . '%' : '—' ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table></div>
    </section>

    <section class="ieg-card ieg-dashboard-section">
      <h2 class="ieg-card-title">Recent Activities</h2>
      <?php foreach ($recentActivities as $activity): ?>
        <div class="ieg-activity-item"><div><strong><?= htmlspecialchars($activity['action'], ENT_QUOTES, 'UTF-8') ?></strong><p><?= htmlspecialchars($activity['user'], ENT_QUOTES, 'UTF-8') ?></p></div><span><?= htmlspecialchars($activity['time'], ENT_QUOTES, 'UTF-8') ?></span></div>
      <?php endforeach; ?>
    </section>

    <section class="ieg-card ieg-dashboard-section">
      <h2 class="ieg-card-title">Quick Actions</h2>
      <div class="ieg-quick-actions">
        <a class="ieg-btn ieg-btn-primary" href="users.php">Manage Users</a>
        <a class="ieg-btn ieg-btn-outline" href="submissions.php">View Submissions</a>
        <a class="ieg-btn ieg-btn-outline" href="analytics.php">View Analytics</a>
        <a class="ieg-btn ieg-btn-outline" href="risk-monitor.php">Risk Monitor</a>
      </div>
    </section>
  </main>
</div>
</body>
</html>
