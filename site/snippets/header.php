<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= css('assets/css/main.css') ?>

    <!-- Meta -->
    <!-- Primary Meta Tags -->
    <title><?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title() . ' &mdash; Dhrumil'; ?></title>
    <meta name="title" content="<?= $page->isHomePage() ? 'Dhrumil Patel' : $page->title() . ' &mdash; Dhrumil'; ?>" />
    <meta name="description" content="<?= $page->description() ?>" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://dhrumil.ca/" />
    <meta property="og:title" content="Dhrumil Patel" />
    <meta property="og:description" content="Data, Dogs, and Minimalism." />
    <meta property="og:image" content="<?= url('assets/image/og-light.png') ?>" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://dhrumil.ca/" />
    <meta property="twitter:title" content="Dhrumil Patel" />
    <meta property="twitter:description" content="Data, Dogs, and Minimalism." />
    <meta property="twitter:image" content="<?= url('assets/image/og-light.png') ?>" />

    <title>Home</title>
</head>
<body>