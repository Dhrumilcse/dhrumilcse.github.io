<div class="wrap">
    <div class="home-icon-circle"></div>

    <?php
    // Get the raw text content
    $text = $page->text()->value();
    
    // Split by <br> to get sections
    $sections = preg_split('/<br>/i', $text);
    
    // Process all sections
    foreach ($sections as $section) {
        // Check if section starts with newline (no text immediately after <br>)
        $startsWithNewline = preg_match('/^\s*\n/', $section);
        
        $section = trim($section);
        if (empty($section)) continue;
        
        if ($startsWithNewline) {
            // No section title, just display content
            echo '<p>' . kirbytext($section) . '</p>';
        } else {
            // Has section title on same line as <br>
            $lines = explode("\n", $section, 2);
            $firstLine = trim($lines[0]);
            $content = isset($lines[1]) ? trim($lines[1]) : '';
            
            echo '<p class="section">' . htmlspecialchars($firstLine) . '</p>';
            if (!empty($content)) {
                echo '<p>' . kirbytext($content) . '</p>';
            }
        }
        echo "\n";
    }
    ?>

    <p class="section">
        <span id="datetime"></span> in Toronto, Canada
    </p>
</div>