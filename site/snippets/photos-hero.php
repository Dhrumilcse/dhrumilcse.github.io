<div class="grid-container">
    <?php
    // Parse KirbyText
    $content = $page->text()->kt();
    
    // Wrap header groups in hero structure for styling
    $pattern = '/<h1>(.*?)<\/h1>((?:\s*<h3>.*?<\/h3>)+)((?:\s*<h4>.*?<\/h4>)*)/s';
    $replacement = '<div class="img-wrap"><div class="img-wrap-content"><h1>$1</h1>$2</div>$3</div>';
    $content = preg_replace($pattern, $replacement, $content);
    
    // Add responsive classes to h4 elements (first = mobile, second = desktop)
    $h4Pattern = '/(<div class="img-wrap-content">.*?<\/div>)\s*<h4>(.*?)<\/h4>\s*<h4>(.*?)<\/h4>/s';
    $h4Replacement = '$1<h4 class="mobile-only">$2</h4><h4 class="desktop-only">$3</h4>';
    $content = preg_replace($h4Pattern, $h4Replacement, $content);
    
    // Transform image captions: wrap img + figcaption and split caption into three parts
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
