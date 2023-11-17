<?php snippet('header') ?>

<div class="grid-container">
    <?php
    // Get the content from the page
    $content = $page->text()->kt();

    // Use Kirbytags to extract image filenames
    $contentWithUrls = $content->kirbytext([
        'figure' => function ($image) {
            // Use the custom template for the figure tag
            return snippet('figure', ['image'=>$image, 'url' => $image->file()->url(), 'alt' => $image->alt(), 'caption' => $image->caption()], true);
        }
    ]);

    echo $contentWithUrls;
    ?>
</div>

<?php snippet('footer') ?>