<div class="wrap">

    <?php
    // Get the text from the text file and split it into sections by <br>
    $text = $page->text()->value();
    $sections = explode("<br>", $text);
    ?>

    <?php foreach ($sections as $section): ?>
    
        <?php
        $trimmedSection = trim($section);
        if (empty($trimmedSection)) continue;
        
        $lines = explode("\n", $trimmedSection);
        $sectionTitle = trim(array_shift($lines));
        
        // Join remaining lines and split by double newlines (blank lines)
        $remainingContent = implode("\n", $lines);
        $items = preg_split('/\n\s*\n/', $remainingContent);
        ?>

        <p class="section">
            <?= $sectionTitle ?>
        </p>    

        <?php foreach ($items as $item): ?>
            <?php
            $item = trim($item);
            if (empty($item)) continue;
            
            // Split item into lines
            $itemLines = explode("\n", $item);
            $title = trim(array_shift($itemLines));
            $subtitle = array_map('trim', $itemLines);
            $subtitle = array_filter($subtitle); // Remove empty lines
            ?>
            
            <p>
                <?= $title ?>
            </p>
            
            <?php if (!empty($subtitle)): ?>
            <p class="subsection">
                <?= implode('<br>', $subtitle) ?>
            </p>
            <?php endif; ?>
        <?php endforeach; ?>

    <?php endforeach; ?>