<div class="wrap">
    <div class="home-icon-circle"></div>

    <?php
    // Get the raw text content
    $text = $page->text()->value();
    
    // Split by <br> to get sections
    $sections = preg_split('/<br>/i', $text);
    
    // Process all sections
    foreach ($sections as $section) {
        $section = trim($section);
        if (empty($section)) continue;
        
        // Split into first line and remaining content
        $lines = explode("\n", $section, 2);
        $firstLine = trim($lines[0]);
        $content = isset($lines[1]) ? trim($lines[1]) : '';
        
        // If there's content after the first line, treat first line as section header
        if (!empty($content)) {
            echo '<p class="section">' . htmlspecialchars($firstLine) . '</p>';
            echo '<p>' . kirbytext($content) . '</p>';
        } else {
            // No content after first line, just display the first line as content
            echo '<p>' . kirbytext($firstLine) . '</p>';
        }
        echo "\n";
    }
    ?>

    <p class="section">
        <span id="datetime"></span> in Toronto, Canada
    </p>
</div>