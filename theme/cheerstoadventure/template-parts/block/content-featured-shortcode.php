<?php
/**
 * Block Name: Featured Shortcode
 *
 * This is the template that displays the featured shortcode.
 */

$title = get_field('title');
$shortcode = get_field('shortcode');
$button_url = get_field('button_url');
$button_text = get_field('button_text');

// create id attribute for specific styling
$id = 'featured-shortcode-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<?php if ($shortcode) : ?>
<div id="<?= $id; ?>" class="featured-shortcode <?= $align_class; ?> block-content">
    <?php if ($title) : ?>
    <h2 class="section-title wrap cf"><?= $title; ?></h2>
    <?php endif; ?>
    <div class="featured-shortcode-section section-content wrap cf">
        <span class="featured-shortcode">
            <?= $shortcode ?>
        </span>
    </div>
    <?php if ($button_url) : ?>
    <div class="btn-wrap wrap">
        <a href="<?= $button_url; ?>" alt="<?= $button_text; ?>" class="about-btn more-btn primary-btn"><?= $button_text; ?></a>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?> 