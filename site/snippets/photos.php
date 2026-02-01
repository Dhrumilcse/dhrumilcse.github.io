<div class="grid-container">
    <?php
    // Parse KirbyText and transform image captions
    $content = $page->text()->kt();
    
    // Wrap img + figcaption in container and split caption into three parts
    $content = preg_replace_callback(
        '/<figure class="img-wrap">\s*(<img[^>]+>)\s*<figcaption>(.*?)<\/figcaption>\s*<\/figure>/s',
        function($matches) {
            $img = $matches[1];
            $caption = $matches[2];
            
            // Split caption by pipe: "012 | Far east | Jul 2024"
            $parts = array_map('trim', explode('|', $caption));
            
            if (count($parts) === 3) {
                $captionHtml = '<figcaption>'
                             . '<span class="caption-number">' . $parts[0] . '</span>'
                             . '<span class="caption-title">' . $parts[1] . '</span>'
                             . '<span class="caption-date">' . $parts[2] . '</span>'
                             . '</figcaption>';
            } else {
                // Fallback if not three parts
                $captionHtml = '<figcaption>' . $caption . '</figcaption>';
            }
            
            return '<figure class="img-wrap"><div class="img-caption-container">' 
                 . $img . $captionHtml 
                 . '</div></figure>';
        },
        $content
    );
    ?>
    
    <?= $content; ?>
</div>