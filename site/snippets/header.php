<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?= url('assets/image/favicon.ico') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=0.95">
    <?= css('assets/css/main-v1.0.7.css?v=' . asset('assets/css/main-v1.0.7.css')->modified()) ?>

    <!-- Meta -->
    <?php
    $customImage = $page->title() . '.png';
    $defaultImage = 'og-light.png';
    $twitterImage = 'og-square.png';
    $ogImage = $page->isHomePage() ? $defaultImage : (file_exists('assets/image/' . $customImage) ? $customImage : $defaultImage);
    $pageUrl = url($page->url());
    ?>

    <!-- Cache Control -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">


    <!-- Primary Meta Tags -->
    <title><?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title(); ?></title>
    <meta name="title" content="<?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title(); ?>" />
    <meta name="description" content="<?= $page->description() ?>" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $pageUrl ?>" />
    <meta property="og:title" content="<?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title(); ?>" />
    <meta property="og:description" content="<?= $page->description() ?>" />
    <meta property="og:image" content="<?= url('assets/image/' . $ogImage) ?>" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="<?= $pageUrl ?>" />
    <meta name="twitter:title" content="<?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title(); ?>" />
    <meta name="twitter:description" content="<?= $page->description() ?>" />
    <meta name="twitter:image" content="<?= url('assets/image/' . $twitterImage) ?>" />

</head>
<body class="page-<?= $page->intendedTemplate() ?>">
