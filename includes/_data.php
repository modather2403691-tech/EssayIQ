<?php
/**
 * Shared sample data for the student pages.
 * TODO: replace every array below with real queries once the database is ready
 * (users, assignments, submissions, grades). The pages only read these variables,
 * so nothing else needs to change.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// TODO: load from $_SESSION after login and redirect to ../auth/login.php if missing.
$studentName = $_SESSION['user_name'] ?? 'Ahmed';
if ($studentName === 'Aahmed') {
    $studentName = 'Ahmed';
}

$student = [
    'name'   => $studentName,
    'course' => 'Academic Writing 101',
];
$initials = '';
foreach (preg_split('/\s+/', trim($student['name'])) as $part) {
    $initials .= strtoupper(substr($part, 0, 1));
}
$initials = substr($initials, 0, 2);

$day = 86400;
$assignments = [
    [
        'id' => 1, 'title' => 'Argumentative essay: remote learning', 'course' => 'Academic Writing 101',
        'prompt' => 'Argue whether remote learning should replace in-person classes at university. Support your claim with at least three sources.',
        'due' => time() + 3 * $day, 'status' => 'open', 'min' => 800, 'max' => 1200, 'score' => null,
    ],
    [
        'id' => 2, 'title' => 'Compare and contrast: two news reports', 'course' => 'Media Literacy',
        'prompt' => 'Compare how two outlets covered the same event and explain how word choice changes the reader\'s impression.',
        'due' => time() + 9 * $day, 'status' => 'open', 'min' => 600, 'max' => 900, 'score' => null,
    ],
    [
        'id' => 3, 'title' => 'Personal narrative', 'course' => 'Academic Writing 101',
        'prompt' => 'Write about a moment that changed how you study. Use a clear opening, a turning point and a reflective ending.',
        'due' => time() - 2 * $day, 'status' => 'submitted', 'min' => 500, 'max' => 800, 'score' => null,
    ],
    [
        'id' => 4, 'title' => 'Literature review: climate policy', 'course' => 'Research Methods',
        'prompt' => 'Summarise and group five peer-reviewed articles on climate policy. Identify one gap in the research.',
        'due' => time() - 12 * $day, 'status' => 'graded', 'min' => 1000, 'max' => 1500, 'score' => 88,
    ],
    [
        'id' => 5, 'title' => 'Opinion piece: social media and attention', 'course' => 'Media Literacy',
        'prompt' => 'Take a position on whether social media shortens attention spans. Address one strong counterargument.',
        'due' => time() - 25 * $day, 'status' => 'graded', 'min' => 600, 'max' => 900, 'score' => 81,
    ],
    [
        'id' => 6, 'title' => 'Descriptive essay: a place you know', 'course' => 'Academic Writing 101',
        'prompt' => 'Describe a place using concrete detail so the reader can picture it without a photo.',
        'due' => time() - 39 * $day, 'status' => 'graded', 'min' => 500, 'max' => 700, 'score' => 74,
    ],
];

// Newest graded essay first, used by the dashboard.
$latest = [
    'title'   => 'Literature review: climate policy',
    'score'   => 88,
    'grade'   => 'B+',
    'date'    => time() - 11 * $day,
    'criteria' => [
        'Grammar'    => 94,
        'Structure'  => 86,
        'Vocabulary' => 90,
        'Argument'   => 82,
    ],
    'tip' => 'Your thesis is clear. Add one more supporting example in the third paragraph to strengthen your argument.',
];

// Oldest to newest, drives the trend chart.
$history = [
    ['label' => 'Sep 02', 'title' => 'Descriptive essay: a place you know',       'course' => 'Academic Writing 101', 'score' => 74, 'plag' => 3,  'words' => 612],
    ['label' => 'Sep 16', 'title' => 'Opinion piece: social media and attention', 'course' => 'Media Literacy',        'score' => 81, 'plag' => 5,  'words' => 748],
    ['label' => 'Oct 08', 'title' => 'Literature review: climate policy',        'course' => 'Research Methods',      'score' => 88, 'plag' => 4,  'words' => 1340],
];

$categoryAverages = ['Grammar' => 91, 'Structure' => 82, 'Vocabulary' => 85, 'Argument' => 78];

$focusAreas = [
    ['title' => 'Argument strength', 'text' => 'Back each claim with one specific example. This was the lowest criterion in your last three essays.', 'icon' => 'scale'],
    ['title' => 'Paragraph transitions', 'text' => 'Start new paragraphs with a link to the previous idea so the essay reads as one line of thought.', 'icon' => 'link'],
    ['title' => 'Conclusion', 'text' => 'Finish with what the reader should take away, not a repeat of the introduction.', 'icon' => 'flag'],
];

$certification = ['name' => 'Academic Writing Proficiency', 'done' => 3, 'total' => 5];

function due_label(int $ts): string
{
    $days = (int) floor(($ts - time()) / 86400);
    if ($ts <= time()) return 'Closed ' . date('M j', $ts);
    if ($days > 1)     return 'Due in ' . $days . ' days';
    if ($days === 1)   return 'Due tomorrow';
    return 'Due today';
}

function status_pill(string $status): string
{
    $map = ['open' => ['pill-open', 'Open'], 'submitted' => ['pill-submitted', 'Awaiting grade'], 'graded' => ['pill-graded', 'Graded']];
    [$cls, $label] = $map[$status] ?? ['pill-open', ucfirst($status)];
    return '<span class="pill ' . $cls . '">' . e($label) . '</span>';
}
