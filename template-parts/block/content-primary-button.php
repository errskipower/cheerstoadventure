<?php
/**
 * Block Name: Primary Button
 *
 * This is the template that displays the primary button.
 */

$text = get_field('text');
$url = get_field('url');

// create id attribute for specific styling
$id = 'intro-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<a id="<?= $id; ?>" class="intro <?= $align_class; ?> block-content primary-btn" href="<?= $url; ?>" alt="<?= $text; ?>">
  <?= $text; ?>
</a>