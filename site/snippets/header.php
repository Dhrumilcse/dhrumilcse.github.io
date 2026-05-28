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
    $defaultImage = 'og-square.png';
    $ogImage = $page->isHomePage() ? $defaultImage : (file_exists('assets/image/' . $customImage) ? $customImage : $defaultImage);
    $pageUrl = url($page->url());
    $imageUrl = url('assets/image/' . $ogImage);
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
    <meta property="og:image" content="<?= $imageUrl ?>" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="800" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="<?= $pageUrl ?>" />
    <meta name="twitter:title" content="<?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title(); ?>" />
    <meta name="twitter:description" content="<?= $page->description() ?>" />
    <meta name="twitter:image" content="<?= $imageUrl ?>" />

</head>
<body class="page-<?= $page->intendedTemplate() ?>">
