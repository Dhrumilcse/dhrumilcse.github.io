<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?= url('assets/image/favicon.ico') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= css('assets/css/main.css') ?>

    <!-- Meta -->
    <?php
    $customImage = $page->title() . '.png';
    $defaultImage = 'og-light.png';
    $ogImage = $page->isHomePage() ? $defaultImage : (file_exists('assets/image/' . $customImage) ? $customImage : $defaultImage);
    ?>

    <!-- Primary Meta Tags -->
    <title><?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title() . ' &mdash; Dhrumil'; ?></title>
    <meta name="title" content="<?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title(); ?>" />
    <meta name="description" content="<?= $page->description() ?>" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://dhrumil.ca/" />
    <meta property="og:title" content="<?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title(); ?>" />
    <meta property="og:description" content="<?= $page->description() ?>" />
    <meta property="og:image" content="<?= url('assets/image/' . $ogImage) ?>" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://dhrumil.ca/" />
    <meta property="twitter:title" content="<?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title(); ?>" />
    <meta property="twitter:description" content="<?= $page->description() ?>" />
    <meta property="twitter:image" content="<?= url('assets/image/' . $ogImage) ?>" />

    <title>Home</title>
</head>
<body>