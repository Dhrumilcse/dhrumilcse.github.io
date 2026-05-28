<?php $fontClass = $page->font()->isNotEmpty() ? ' font-' . $page->font() : ''; ?>
<div class="wrap">
    <div class="wrap-thought<?= $fontClass ?>">
        <div class="post-header">
            <h1 class="th-heading">
                <?= $page->title()->kirbytext() ?>
            </h1>
                <p class="th-sub-title">
                <?= $page->date()->toDate('F j, Y') ?>
            </p>
        </div>
        <h3 class="th-content">
        <?= $page->text()->kirbytext() ?>
    </h3>
    </div> 