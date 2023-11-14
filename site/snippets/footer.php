</body>

<?php
$darkImageURL = url('assets/image/og-dark.png');
$lightImageURL = url('assets/image/og-light.png');
?>

<script>
  const darkImageURL = "<?= $darkImageURL ?>";
  const lightImageURL = "<?= $lightImageURL ?>";
</script>

<?= js('assets/script/datetime.js') ?>
<?= js('assets/script/og-image.js') ?>

</html>