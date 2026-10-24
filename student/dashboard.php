<?php
$pageTitle  = 'Dashboard';
$pageDesc   = 'Your latest grade, upcoming deadlines and writing progress at a glance.';
$activePage = 'dashboard';
require __DIR__ . '/../includes/_header.php';

$open     = array_values(array_filter($assignments, fn($a) => $a['status'] === 'open'));
$graded   = array_filter($assignments, fn($a) => $a['status'] === 'graded');
$scores   = array_column($history, 'score');
$average  = $scores ? round(array_sum($scores) / count($scores), 1) : 0;
$change   = count($scores) > 1 ? end($scores) - $scores[count($scores) - 2] : 0;
$circle   = $latest['score'];
?>

<div class="page-head reveal">
  <div>
<h1>Welcome back, <?php echo e($_SESSION['name'] ?? 'Student'); ?></h1>    <p>Here is where your writing stands today and what to work on next.</p>
  </div>
  <div class="actions">
    <a href="submit-essay.php" class="btn btn-primary">Submit an essay</a>
    <a href="assignments.php" class="btn btn-ghost">View assignments</a>
  </div>
</div>

<section class="stat-grid" aria-label="Summary">
  <article class="glass stat reveal">
    <small>Essays graded</small>
    <strong><?php echo count($graded); ?></strong>
    <span>of <?php echo count($assignments); ?> assignments</span>
  </article>
  <article class="glass stat reveal">
    <small>Average score</small>
    <strong><?php echo e($average); ?></strong>
    <span class="<?php echo $change >= 0 ? 'up' : 'warn'; ?>"><?php echo ($change >= 0 ? '+' : '') . e($change); ?> since your previous essay</span>
  </article>
  <article class="glass stat reveal">
    <small>Open assignments</small>
    <strong><?php echo count($open); ?></strong>
    <span><?php echo $open ? e(due_label($open[0]['due'])) . ' for the next one' : 'Nothing due right now'; ?></span>
  </article>
  <article class="glass stat reveal">
    <small>Certificate progress</small>
    <strong><?php echo e($certification['done']); ?> / <?php echo e($certification['total']); ?></strong>
    <span><?php echo e($certification['name']); ?></span>
  </article>
</section>

<div class="grid-2">
  <section class="glass panel reveal" aria-labelledby="latestTitle">
    <div class="panel-head">
      <div>
        <h2 id="latestTitle">Latest result</h2>
        <p class="sub"><?php echo e($latest['title']); ?>, graded <?php echo e(date('M j', $latest['date'])); ?></p>
      </div>
      <a class="link-more" href="progress.php">See full progress</a>
    </div>

    <div class="result">
      <div class="score-ring" style="--score: <?php echo (int) $circle; ?>" role="img" aria-label="Score <?php echo (int) $circle; ?> out of 100">
        <div><strong data-count="<?php echo (int) $circle; ?>"><?php echo (int) $circle; ?></strong><small>/ 100</small></div>
      </div>
      <div class="result-bars">
        <?php foreach ($latest['criteria'] as $name => $value): ?>
          <div class="crit" style="--v: <?php echo (int) $value; ?>">
            <div class="crit-row"><span><?php echo e($name); ?></span><b><?php echo (int) $value; ?>%</b></div>
            <div class="bar"><i></i></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <p class="tip"><b>Feedback:</b> <?php echo e($latest['tip']); ?></p>
  </section>

  <section class="glass panel reveal" aria-labelledby="dueTitle">
    <div class="panel-head">
      <div>
        <h2 id="dueTitle">Upcoming deadlines</h2>
        <p class="sub">Open assignments, soonest first</p>
      </div>
      <a class="link-more" href="assignments.php">All assignments</a>
    </div>

    <?php if ($open): ?>
      <div class="rows">
        <?php foreach ($open as $a): ?>
          <a class="row" href="submit-essay.php?assignment=<?php echo (int) $a['id']; ?>">
            <span class="date-chip"><b><?php echo e(date('j', $a['due'])); ?></b><span><?php echo e(date('M', $a['due'])); ?></span></span>
            <span class="row-main">
              <strong><?php echo e($a['title']); ?></strong>
              <small><?php echo e($a['course']); ?> &middot; <?php echo e(due_label($a['due'])); ?></small>
            </span>
            <span class="btn btn-ghost btn-sm">Write</span>
          </a>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="empty"><h3>You are all caught up</h3><p>New assignments from your instructor will appear here.</p></div>
    <?php endif; ?>
  </section>
</div>

<section class="glass panel reveal panel-spaced" aria-labelledby="focusTitle">
  <div class="panel-head">
    <div>
      <h2 id="focusTitle">What to improve next</h2>
      <p class="sub">Based on the feedback from your last three essays</p>
    </div>
  </div>
  <div class="feature-grid focus-grid">
    <?php foreach ($focusAreas as $f): ?>
      <div class="focus-item">
        <span class="icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><?php
            if ($f['icon'] === 'scale') echo '<path d="M12 3v18M5 7h14"/><path d="M5 7l-3 7a4 4 0 0 0 6 0L5 7zM19 7l-3 7a4 4 0 0 0 6 0l-3-7z"/>';
            elseif ($f['icon'] === 'link') echo '<path d="M10 14a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1"/><path d="M14 10a4 4 0 0 0-5.7 0l-3 3a4 4 0 0 0 5.7 5.7l1-1"/>';
            else echo '<path d="M5 21V4M5 4h13l-2 4 2 4H5"/>';
          ?></svg>
        </span>
        <div><b><?php echo e($f['title']); ?></b><small><?php echo e($f['text']); ?></small></div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php require __DIR__ . '/../includes/_footer.php'; ?>
