
<?php
// Reusable document header for EssayIQ internal prototype pages.

$pageTitle = $pageTitle ?? 'EssayIQ';
$baseUrl = '/EssayIQ/EssayIQ';

// Identify the folder of the requested PHP page
$currentModule = basename(dirname($_SERVER['SCRIPT_FILENAME']));

// Select the stylesheet based on the module
switch ($currentModule) {

    case 'admin':
        $cssFile = 'admin.css';
        break;

    case 'ai':
    $cssFile = 'ai.css';
    break;

case 'plagiarism':
    $cssFile = 'plagiarism.css';
    break;

    default:
        // Fallback for other internal prototype pages
        $cssFile = 'admin.css';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>
    </title>

    <?php if ($currentModule === 'ai'): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8') ?>/assets/css/admin.css?v=4">
        <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8') ?>/assets/css/ai.css?v=3">
    <?php else: ?>
        <link
            rel="stylesheet"
            href="<?= htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8') ?>/assets/css/<?= htmlspecialchars($cssFile, ENT_QUOTES, 'UTF-8') ?>?v=4"
        >
    <?php endif; ?>
</head>

<body class="ieg-app">
