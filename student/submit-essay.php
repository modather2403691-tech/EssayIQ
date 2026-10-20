<?php
$pageTitle  = 'Submit Essay';
$pageDesc   = 'Paste or upload your essay and get a grade with detailed feedback.';
$activePage = 'submit-essay';
require __DIR__ . '/../includes/_header.php';

// ----- CSRF token -----
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
}

$openAssignments = array_values(array_filter($assignments, fn($a) => $a['status'] === 'open'));
$selected = (int) ($_POST['assignment'] ?? $_GET['assignment'] ?? 0);
$errors   = [];
$success  = false;
$old      = ['title' => trim($_POST['title'] ?? ''), 'text' => $_POST['essay_text'] ?? '', 'mode' => $_POST['input_mode'] ?? 'paste'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
        $errors[] = 'Your session expired. Reload the page and try again.';
    }

    $chosen = null;
    foreach ($openAssignments as $a) {
        if ($a['id'] === $selected) { $chosen = $a; break; }
    }
    if (!$chosen) {
        $errors[] = 'Choose an open assignment.';
    }
    if ($old['title'] === '' || mb_strlen($old['title']) > 120) {
        $errors[] = 'Enter an essay title of up to 120 characters.';
    }
    if (empty($_POST['agree'])) {
        $errors[] = 'Confirm that the essay is your own work.';
    }

    $content = '';
    if ($old['mode'] === 'upload') {
        $file = $_FILES['essay_file'] ?? null;
        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'Choose a file to upload.';
        } else {
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, ['txt', 'docx', 'pdf'], true)) {
                $errors[] = 'Upload a .txt, .docx or .pdf file.';
            } elseif ($file['size'] > 5 * 1024 * 1024) {
                $errors[] = 'The file is larger than 5 MB.';
            } elseif ($ext === 'txt') {
                $content = (string) file_get_contents($file['tmp_name']);
            } else {
                // TODO: extract text from .docx / .pdf (e.g. PhpWord, smalot/pdfparser) before grading.
                $content = '';
            }
        }
    } else {
        $content = $old['text'];
    }

    if ($chosen && $content !== '') {
        $words = preg_match_all('/\S+/u', $content);
        if ($words < $chosen['min'] || $words > $chosen['max']) {
            $errors[] = 'Your essay has ' . $words . ' words. This assignment needs ' . $chosen['min'] . ' to ' . $chosen['max'] . '.';
        }
    } elseif ($old['mode'] === 'paste') {
        $errors[] = 'Paste your essay text.';
    }

    if (!$errors) {
        // TODO: save the submission (student id, assignment id, title, text or file path, timestamp)
        // then queue it for ../ai/grading.php and the plagiarism check.
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
        $success = true;
        $old = ['title' => '', 'text' => '', 'mode' => 'paste'];
        $selected = 0;
    }
}
?>

<div class="page-head reveal">
  <div>
    <h1>Submit an essay</h1>
    <p>Paste your text or upload a file. EssayIQ will grade it against the assignment rubric and send you feedback.</p>
  </div>
</div>

<?php if ($success): ?>
  <div class="alert alert-ok" role="status">
    <strong>Essay submitted.</strong> We are grading it now. You will find the feedback under
    <a href="assignments.php">Assignments</a> once it is ready.
  </div>
<?php endif; ?>

<?php if ($errors): ?>
  <div class="alert alert-error" role="alert">
    <strong>Fix the following before submitting:</strong>
    <ul><?php foreach ($errors as $err): ?><li><?php echo e($err); ?></li><?php endforeach; ?></ul>
  </div>
<?php endif; ?>

<div class="submit-layout">
  <form id="essayForm" class="glass panel reveal" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="csrf" value="<?php echo e($_SESSION['csrf']); ?>">
    <input type="hidden" name="input_mode" id="inputMode" value="<?php echo e($old['mode'] === 'upload' ? 'upload' : 'paste'); ?>">

    <div class="form-grid">
      <div>
        <label class="lbl" for="assignment">Assignment</label>
        <select class="field" id="assignment" name="assignment" required>
          <option value="">Choose an assignment</option>
          <?php foreach ($openAssignments as $a): ?>
            <option value="<?php echo (int) $a['id']; ?>" data-min="<?php echo (int) $a['min']; ?>" data-max="<?php echo (int) $a['max']; ?>"<?php echo $selected === $a['id'] ? ' selected' : ''; ?>>
              <?php echo e($a['title']); ?> (<?php echo e($a['course']); ?>)
            </option>
          <?php endforeach; ?>
        </select>
        <p class="hint" id="wordLimit">Choose an assignment to see its word range</p>
      </div>

      <div>
        <label class="lbl" for="title">Essay title</label>
        <input class="field" type="text" id="title" name="title" maxlength="120" value="<?php echo e($old['title']); ?>" placeholder="Give your essay a title" required>
      </div>

      <div>
        <span class="lbl">Your essay</span>
        <div class="mode-switch" role="tablist" aria-label="How do you want to add your essay?">
          <button type="button" role="tab" class="tab<?php echo $old['mode'] !== 'upload' ? ' active' : ''; ?>" data-mode="paste" aria-selected="<?php echo $old['mode'] !== 'upload' ? 'true' : 'false'; ?>">Paste text</button>
          <button type="button" role="tab" class="tab<?php echo $old['mode'] === 'upload' ? ' active' : ''; ?>" data-mode="upload" aria-selected="<?php echo $old['mode'] === 'upload' ? 'true' : 'false'; ?>">Upload file</button>
        </div>

        <div id="pastePane"<?php echo $old['mode'] === 'upload' ? ' hidden' : ''; ?>>
          <textarea class="field" id="essayText" name="essay_text" placeholder="Paste or type your essay here" aria-label="Essay text"><?php echo e($old['text']); ?></textarea>
          <div class="counter" id="wordCount" aria-live="polite"><span>0 words</span><span></span></div>
        </div>

        <div id="uploadPane"<?php echo $old['mode'] !== 'upload' ? ' hidden' : ''; ?>>
          <label class="dropzone" id="dropzone">
            <input type="file" id="essayFile" name="essay_file" accept=".txt,.docx,.pdf">
            <strong>Drop your file here or click to browse</strong>
            <span>.txt, .docx or .pdf, up to 5 MB</span>
            <span class="file-name" id="fileName"></span>
          </label>
        </div>
      </div>

      <label class="check" for="agree">
        <input type="checkbox" id="agree" name="agree" value="1">
        <span>I confirm this essay is my own work. I understand it will be checked for plagiarism and my instructor will be told about any matches.</span>
      </label>

      <div>
        <button type="submit" class="btn btn-primary btn-lg" id="submitBtn" disabled>Submit essay</button>
      </div>
    </div>
  </form>

  <aside class="stack sticky-side">
    <section class="glass panel reveal" aria-labelledby="rubricTitle">
      <h2 id="rubricTitle">How your essay is graded</h2>
      <p class="sub">Your instructor can adjust these weights per course.</p>
      <ul class="rubric">
        <li><div class="crit-row"><span>Grammar</span><b>25%</b></div><small>Spelling, punctuation and verb agreement.</small></li>
        <li><div class="crit-row"><span>Structure</span><b>25%</b></div><small>Introduction, paragraph flow and conclusion.</small></li>
        <li><div class="crit-row"><span>Vocabulary</span><b>20%</b></div><small>Word choice, variety and tone.</small></li>
        <li><div class="crit-row"><span>Argument</span><b>30%</b></div><small>Clear thesis, evidence and relevance to the prompt.</small></li>
      </ul>
    </section>

    <section class="glass panel reveal" aria-labelledby="nextTitle">
      <h2 id="nextTitle">What happens next</h2>
      <p class="sub">Most essays are graded within a few minutes.</p>
      <ol class="next-steps">
        <li><b>Plagiarism check</b>We compare your text with other submissions and known sources.</li>
        <li><b>AI grading</b>Each criterion gets a score and a short explanation.</li>
        <li><b>Feedback</b>You get suggested fixes you can use in your next draft.</li>
      </ol>
    </section>
  </aside>
</div>

<?php require __DIR__ . '/../includes/_footer.php'; ?>
