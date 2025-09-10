<?php
$pageTitle = 'Agricultural Marketplace';
require 'templates/header.php';
?>

<div class="category-grid">
  <div class="category-card">
    <img src="icons/properties.png" alt="<?= t('properties') ?>" width="80">
    <a href="listings.php?category=property"><?= t('properties') ?></a>
  </div>
  <div class="category-card">
    <img src="icons/animals.png" alt="<?= t('animals') ?>" width="80">
    <a href="listings.php?category=animal"><?= t('animals') ?></a>
  </div>
  <div class="category-card">
    <img src="icons/machines.png" alt="<?= t('machines') ?>" width="80">
    <a href="listings.php?category=machine"><?= t('machines') ?></a>
  </div>
  <div class="category-card">
    <img src="icons/spare_parts.png" alt="<?= t('spare_parts') ?>" width="80">
    <a href="listings.php?category=spare_part"><?= t('spare_parts') ?></a>
  </div>
  <div class="category-card">
    <img src="icons/products.png" alt="<?= t('products') ?>" width="80">
    <a href="listings.php?category=product"><?= t('products') ?></a>
  </div>
  <div class="category-card">
    <img src="icons/raw_materials.png" alt="<?= t('raw_materials') ?>" width="80">
    <a href="listings.php?category=source_material"><?= t('raw_materials') ?></a>
  </div>
  <div class="category-card">
    <img src="icons/services.png" alt="<?= t('services') ?>" width="80">
    <a href="listings.php?category=service"><?= t('services') ?></a>
  </div>
  <div class="category-card">
    <img src="icons/jobs.png" alt="<?= t('jobs') ?>" width="80">
    <a href="listings.php?category=job"><?= t('jobs') ?></a>
  </div>  
</div>

<!-- Listings container -->
<div class="listings-container">
  <h2>Latest Listings</h2>
  <?php include("listings10.php"); ?>
</div>

<?php
require 'templates/footer.php';
?>
