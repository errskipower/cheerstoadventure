<?php
/**
 * Block Name: Pricings
 *
 * This is the template that displays the pricings block.
 */

$pricings = get_field('pricings');

// create id attribute for specific styling
$id = 'pricings-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$all_titles = $pricings ? array_column($pricings, 'title') : [];

?>

<?php if ($pricings): ?>
  <div id="<?= $id; ?>" class="pricings <?= $align_class; ?> block-content">
    <div class="pricings-list wrap cf">
      <?php foreach($all_titles as $title): ?>
        <?php $title_id = str_replace(' ', '-', strtolower($title)); ?>
        <button onclick="scrollPricingIntoView('pricing-<?=$title_id;?>')" class="blue-inset-btn"><?= $title; ?></button>
      <?php endforeach; ?>
    </div>
    <div class="pricings-section section-content wrap cf">
      <?php foreach($pricings as $pricing): ?>
      <?php
        $title = $pricing['title'];
        $text = $pricing['text'];
        $title_id = str_replace(' ', '-', strtolower($title));
      ?>
        <div class="pricing wrap cf" id="pricing-<?= $title_id; ?>">
          <h3 class="pricing-title section-title"><?= $title; ?></h3>
          <p class="pricing-text"><?= $text; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <script>
  function scrollPricingIntoView(elementID) {
    var elmnt = document.getElementById(elementID);
    if (elmnt) {
      elmnt.scrollIntoView({behavior: 'smooth'});
    }
  }
  </script>
<?php endif; ?>