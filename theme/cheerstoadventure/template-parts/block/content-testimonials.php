<?php
/**
 * Block Name: Testimonials
 *
 * This is the template that displays the testimonials block.
 */

$title = get_field('title');
$testimonials = get_field('testimonials');

// create id attribute for specific styling
$id = 'testimonials-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<?php if ($testimonials): ?>
  <div id="<?= $id; ?>" class="testimonials <?= $align_class; ?> block-content">
    <?php if ($title): ?>
      <h2 class="section-title wrap cf"><?= $title; ?></h2>
    <?php endif; ?>
    <div class="testimonials-section section-content wrap cf">
      <?php foreach($testimonials as $testimonial): ?>
      <?php
        $author = $testimonial['author'];
        $date = $testimonial['date'];
        $text = $testimonial['text'];
      ?>
        <div class="testimonial">
          <i class="fas fa-quote-left fa-2x fa-pull-left testimonial-icon"></i>
          <span class="testimonial-body">
            <p class="testimonial-text"><?= $text; ?></p>
            <p class="testimonial-author"><i class="fal fa-tilde fa-xs"></i> <?= $author; ?>, <?= $date; ?></p>
          </span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>