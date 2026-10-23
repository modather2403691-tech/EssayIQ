<?php
$pageTitle  = 'Progress';
$pageDesc   = 'Track your essay scores, strengths and improvement areas over time.';
$activePage = 'progress';
require __DIR__ . '/../includes/_header.php';

$scores   = array_column($history, 'score');
$best     = $scores ? max($scores) : 0;
$gain     = count($scores) > 1 ? end($scores) - $scores[0] : 0;
$points   = array_map(fn($h) => ['label' => $h['label'], 'title' => $h['title'], 'score' => $h['score']], $history);
$certPct  = (int) round($certification['done'] / $certification['total'] * 100);

$icons = [
    'scale' => '<path d="M12 3v18M5 7h14"/><path d="M5 7l-3 7a4 4 0 0 0 6 0L5 7zM19 7l-3 7a4 4 0 0 0 6 0l-3-7z"/>',
    'link'  => '<path d="M10 14a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1"/><path d="M14 10a4 4 0 0 0-5.7 0l-3 3a4 4 0 0 0 5.7 5.7l1-1"/>',
    'flag'  => '<path d="M5 21V4M5 4h13l-2 4 2 4H5"/>',
];
?>

<div class="page-head reveal">
  <div>
    <h1>Your progress</h1>
    <p>See how your scores change from essay to essay and where to focus next.</p>
  </div>
  <div class="actions">
    <a href="submit-essay.php" class="btn btn-primary">Submit an essay</a>
  </div>
</div>

<section class="stat-grid" aria-label="Summary">
  <article class="glass stat reveal"><small>Essays graded</small><strong><?php echo count($history); ?></strong><span>this term</span></article>
  <article class="glass stat reveal"><small>Best score</small><strong><?php echo (int) $best; ?></strong><span>out of 100</span></article>
  <article class="glass stat reveal"><small>Improvement</small><strong class="<?php echo $gain >= 0 ? 'up' : 'warn'; ?>"><?php echo ($gain >= 0 ? '+' : '') . (int) $gain; ?></strong><span>points since your first essay</span></article>
  <article class="glass stat reveal"><small>Certificate</small><strong><?php echo $certPct; ?>%</strong><span><?php echo e($certification['name']); ?></span></article>
</section>

<div class="grid-2">
  <section class="glass panel reveal" aria-labelledby="trendTitle">
    <div class="panel-head">
      <div><h2 id="trendTitle">Score over time</h2><p class="sub">Hover or focus a point to see the essay</p></div>
    </div>
    <div class="chart" id="trendChart" data-points="<?php echo e(json_encode($points)); ?>"></div>
  </section>

  <section class="glass panel reveal" aria-labelledby="avgTitle">
    <h2 id="avgTitle">Average by criterion</h2>
    <p class="sub">Across all graded essays</p>
    <div class="result-bars">
      <?php foreach ($categoryAverages as $name => $value): ?>
        <div class="crit" style="--v: <?php echo (int) $value; ?>">
          <div class="crit-row"><span><?php echo e($name); ?></span><b><?php echo (int) $value; ?>%</b></div>
          <div class="bar"><i></i></div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="cert-bar" style="--v: <?php echo $certPct; ?>">
      <div class="crit-row"><span><?php echo e($certification['name']); ?></span><b><?php echo (int) $certification['done']; ?> of <?php echo (int) $certification['total']; ?> modules</b></div>
      <div class="bar"><i></i></div>
      <small class="muted-note">Finish <?php echo (int) ($certification['total'] - $certification['done']); ?> more modules to earn your certificate.</small>
    </div>
  </section>
</div>

<div class="grid-2 even panel-spaced">
  <section class="glass panel reveal" aria-labelledby="focusTitle">
    <h2 id="focusTitle">Where to improve</h2>
    <p class="sub">Patterns the AI found across your essays</p>
    <div class="focus-list">
      <?php foreach ($focusAreas as $f): ?>
        <div class="focus-item">
          <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><?php echo $icons[$f['icon']]; ?></svg></span>
          <div><b><?php echo e($f['title']); ?></b><small><?php echo e($f['text']); ?></small></div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="glass panel reveal" aria-labelledby="histTitle">
    <h2 id="histTitle">Submission history</h2>
    <p class="sub">Newest first</p>
    <div class="table-wrap">
      <table class="data">
        <thead><tr><th scope="col">Essay</th><th scope="col">Words</th><th scope="col">Similarity</th><th scope="col">Score</th></tr></thead>
        <tbody>
          <?php foreach (array_reverse($history) as $h): ?>
            <tr>
              <td><strong><?php echo e($h['title']); ?></strong><small><?php echo e($h['course']); ?> &middot; <?php echo e($h['label']); ?></small></td>
              <td><?php echo (int) $h['words']; ?></td>
              <td><?php echo (int) $h['plag']; ?>%</td>
              <td class="num"><?php echo (int) $h['score']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</div>

<?php require __DIR__ . '/../includes/_footer.php'; ?>
