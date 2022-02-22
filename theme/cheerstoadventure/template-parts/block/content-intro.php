<?php
/**
 * Block Name: Intro
 *
 * This is the template that displays the intro block.
 */

$title = get_field('title');
$content = get_field('content');
$button_url = get_field('button_url');
$button_text = get_field('button_text');

$has_section_content = strpos($content, "section-content") !== false;
$no_title_class = $title ? '' : 'no-title';

// create id attribute for specific styling
$id = 'intro-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<div id="<?= $id; ?>" class="intro <?= $align_class; ?> block-content">
  <h2 class="section-title wrap cf <?= $no_title_class; ?>"><?= $title; ?></h2>
  <?php if (!$has_section_content): ?>
    <div class="section-content wrap cf">
  <?php endif; ?>
  <?= $content; ?>
  <?php if (!$has_section_content): ?>
    </div>
  <?php endif; ?>
  <?php if ($button_url): ?>
    <div class="btn-wrap wrap">
      <a href="<?= $button_url; ?>" alt="<?= $button_text; ?>" class="about-btn more-btn primary-btn"><?= $button_text; ?></a>
    </div>
  <?php endif; ?>
</div>