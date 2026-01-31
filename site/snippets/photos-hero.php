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
    
    // After kirbytext, wrap consecutive h1, all following h3 tags, and optional h4 tags together in one full screen div
    // Pattern matches h1, followed by any h3 tags, and optionally h4 tags at the end
    $contentWithUrls = preg_replace('/<h1>(.*?)<\/h1>((?:\s*<h3>.*?<\/h3>)+)((?:\s*<h4>.*?<\/h4>)*)/s', '<div class="img-wrap"><div class="img-wrap-content"><h1>$1</h1>$2</div>$3</div>', $contentWithUrls);
    ?>
    
    <?= $contentWithUrls; ?>
</div>