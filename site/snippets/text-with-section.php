<div class="wrap">

    <?php
    // Get the text from the text file and split it into paragraphs
    $text = $page->text()->kirbytext();
    $paragraphs = explode("<br>", $text);
    ?>

    <?php foreach ($paragraphs as $paragraph): ?>
    
        <?php
        // Check if paragraph starts with newline (no text immediately after <br>)
        $startsWithNewline = preg_match('/^\s*\n/', $paragraph);
        
        $trimmedParagraph = trim($paragraph);
        if (empty($trimmedParagraph)) continue;
        
        if ($startsWithNewline) {
            // No section title, just display content
            ?>
            <p><?= $trimmedParagraph ?></p>
            <?php
        } else {
            // Has section title on same line as <br>
            $lines = explode("\n", $trimmedParagraph);
            $section = $lines[0];
            $content = implode("\n", array_slice($lines, 1));
            ?>
            <p class="section">
                <?= $section ?>
            </p>    
            <?php if (!empty($content)): ?>
            <p>
            <?= $content ?>
            </p>
            <?php endif; ?>
            <?php
        }
        ?>
    <?php endforeach; ?>