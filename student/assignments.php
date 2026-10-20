<?php
$pageTitle  = 'Assignments';
$pageDesc   = 'See every essay assignment, its deadline and its status.';
$activePage = 'assignments';
require __DIR__ . '/../includes/_header.php';

$counts = ['all' => count($assignments), 'open' => 0, 'submitted' => 0, 'graded' => 0];
foreach ($assignments as $a) {
    $counts[$a['status']]++;
}
$tabs = ['all' => 'All', 'open' => 'Open', 'submitted' => 'Awaiting grade', 'graded' => 'Graded'];
?>

<div class="page-head reveal">
  <div>
    <h1>Assignments</h1>
    <p>Choose an assignment to start writing, or open a graded one to read your feedback.</p>
  </div>
</div>

<div class="toolbar reveal">
  <div class="tabs" role="tablist" aria-label="Filter assignments">
    <?php foreach ($tabs as $key => $label): ?>
      <button type="button" role="tab" class="tab<?php echo $key === 'all' ? ' active' : ''; ?>"
              data-filter="<?php echo e($key); ?>" aria-selected="<?php echo $key === 'all' ? 'true' : 'false'; ?>">
        <?php echo e($label); ?><span class="count"><?php echo (int) $counts[$key]; ?></span>
      </button>
    <?php endforeach; ?>
  </div>
  <input type="search" id="assignSearch" class="search" placeholder="Search by title or course" aria-label="Search assignments">
</div>

<div class="assign-grid">
  <?php foreach ($assignments as $a): ?>
    <article class="glass assign reveal" data-status="<?php echo e($a['status']); ?>">
      <div class="assign-top">
        <span class="course"><?php echo e($a['course']); ?></span>
        <?php echo status_pill($a['status']); ?>
      </div>
      <h3><?php echo e($a['title']); ?></h3>
      <p><?php echo e($a['prompt']); ?></p>
      <div class="meta">
        <span><b><?php echo e(date('M j, Y', $a['due'])); ?></b> &middot; <?php echo e(due_label($a['due'])); ?></span>
        <span><b><?php echo (int) $a['min']; ?>&ndash;<?php echo (int) $a['max']; ?></b> words</span>
      </div>
      <div class="assign-foot">
        <?php if ($a['status'] === 'open'): ?>
          <span class="meta">Not submitted yet</span>
          <a class="btn btn-primary btn-sm" href="submit-essay.php?assignment=<?php echo (int) $a['id']; ?>">Start essay</a>
        <?php elseif ($a['status'] === 'submitted'): ?>
          <span class="meta">Submitted, grading in progress</span>
          <a class="btn btn-ghost btn-sm is-disabled" aria-disabled="true" href="#">Feedback pending</a>
        <?php else: ?>
          <span class="score"><?php echo (int) $a['score']; ?><small> / 100</small></span>
          <a class="btn btn-ghost btn-sm" href="results.php?assignment=<?php echo (int) $a['id']; ?>">View feedback</a>
        <?php endif; ?>
      </div>
    </article>
  <?php endforeach; ?>
</div>

<div class="empty" id="assignEmpty" hidden>
  <h3>No assignments match</h3>
  <p>Try a different filter or clear the search box.</p>
</div>

<?php require __DIR__ . '/../includes/_footer.php'; ?>
