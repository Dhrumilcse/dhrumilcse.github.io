<div class="wrap">

    <?php
    // Get the text from the text file and split it into paragraphs
    $text = $page->text()->kirbytext();
    $paragraphs = explode("<br>", $text);
    ?>

    <?php foreach ($paragraphs as $paragraph): ?>
    
        <?php
        $trimmedParagraph = trim($paragraph);
        $lines = explode("\n", $trimmedParagraph);
        $section = $lines[0];
        $content = implode("\n", array_slice($lines, 1));
        ?>

        <p class="section">
            <?= $section ?>
        </p>    

        <p>
        <?= $content ?>
        </p>
    <?php endforeach; ?>