<!-- site/snippets/figure.php -->
<figure class="<?= isset($class) ? $class->class() : '' ?>">
    <img src="<?= $url ?>" alt="<?= $alt ?>">
    <?php if (!empty($caption)): ?>
        <figcaption><?= $caption ?></figcaption>
    <?php endif; ?>
</figure>