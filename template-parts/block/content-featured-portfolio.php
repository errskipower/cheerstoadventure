<?php
/**
 * Block Name: Featured Portfolio
 *
 * This is the template that displays the featured portfolio block.
 */

$title = get_field('title');
$portfolio = get_field('portfolio_images');
$button_url = get_field('button_url');
$button_text = get_field('button_text');

// create id attribute for specific styling
$id = 'featured-portfolio-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<?php if ($portfolio): ?>
  <div id="<?= $id; ?>" class="featured-portfolio <?= $align_class; ?> block-content">
    <?php if ($title): ?>
      <h2 class="section-title wrap cf"><?= $title; ?></h2>
    <?php endif; ?>
    <div class="featured-portfolio-section section-content wrap cf">
      <div class="image-sizer"></div>
      <?php foreach($portfolio as $image): ?>
        <div class="featured-image">
          <img src="<?= $image['sizes']['large']; ?>" alt="<?= $image['title']; ?>" />
        </div>
      <?php endforeach; ?>
    </div>
    <?php if ($button_url): ?>
      <div class="btn-wrap wrap">
        <a href="<?= $button_url; ?>" alt="<?= $button_text; ?>" class="about-btn more-btn primary-btn"><?= $button_text; ?></a>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>