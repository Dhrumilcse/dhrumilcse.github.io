<?php snippet('header') ?>

<div class="wrap">
    <?php
    $currentMonth = '';
    $currentYear = '';

    $sortedPosts = $page->children()->sortBy(function ($thought) {
        // Convert 'DD-MM-YYYY' to a sortable date format 'Y-m-d'
        return date('Y-m-d', strtotime($thought->date('d-m-Y')));
    }, 'desc');

    foreach ($sortedPosts as $thought):
        $thoughtMonth = $thought->date()->toDate('F');
        $thoughtYear = $thought->date()->toDate('Y');

        if ($thoughtYear !== $currentYear || $thoughtMonth !== $currentMonth):
            // Display a new year and month header when the year or month changes
    ?>
        <p class="section-right">
            <?php if ($thoughtYear !== $currentYear): ?>
                <span class="post-year"><?= $thoughtYear ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.75" stroke="currentColor" class="svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                    </svg>
                </span>

            <?php endif; ?>
            <span class="post-month"><?= $thoughtMonth ?></span>
        </p>
    <?php
            // Update the current year and month
            $currentYear = $thoughtYear;
            $currentMonth = $thoughtMonth;
        endif;
    ?>
        <a href="<?= $thought->url() ?>">
            <div class="thought">
                <p><?= $thought->title() ?></p>
                <hr class="post-spacer">
                <p><?= $thought->date()->toDate('jS') ?></p>
            </div>
        </a>
    <?php endforeach ?>


<?php snippet('footer-home') ?>