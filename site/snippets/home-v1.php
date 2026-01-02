<div class="wrap">
    <div class="home-icon-circle"></div>

    <?php
    // Get the text from the text file and split it into paragraphs
    $text = $page->text()->kirbytext();
    $paragraphs = preg_split("/\n/", $text, -1, PREG_SPLIT_NO_EMPTY);
    
    $firstParagraph = isset($paragraphs[0]) ? $paragraphs[0] : '';
    $secondParagraph = isset($paragraphs[1]) ? $paragraphs[1] : '';
    $thirdParagraph = isset($paragraphs[2]) ? $paragraphs[2] : '';
    ?>

    <p class="section"></p>
    <p><?= $firstParagraph ?></p>

    <p class="section">Thoughts</p>
    <p><?= $secondParagraph ?></p>

    <p class="section">Other</p>
    <p><?= $thirdParagraph ?></p>

    <p class="section">
        <span id="datetime">
    </p>
</div>