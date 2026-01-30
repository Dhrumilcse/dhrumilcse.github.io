<div class="grid-container">
    <?php
    // Get the content from the page
    $content = $page->text();

    // Use Kirbytags to extract image filenames
    $contentWithUrls = $content->kirbytext([
        'figure' => function ($image) {
            // Use the custom template for the figure tag
            return snippet('figure', ['image'=>$image, 'url' => $image->file()->url(), 'alt' => $image->alt(), 'caption' => $image->caption()], true);
        }
    ]);
    
    // After kirbytext, wrap consecutive h1 and all following h3 tags together in one full screen div
    $contentWithUrls = preg_replace('/<h1>(.*?)<\/h1>((?:\s*<h3>.*?<\/h3>)+)/s', '<div class="img-wrap"><h1>$1</h1>$2</div>', $contentWithUrls);
    ?>
    
    <?= $contentWithUrls; ?>
</div>