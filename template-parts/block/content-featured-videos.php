<?php
/**
 * Block Name: Featured Videos
 *
 * This is the template that displays the featured videos block.
 */

$title = get_field('title');
$videos = get_field('videos');
$button_url = get_field('button_url');
$button_text = get_field('button_text');

// create id attribute for specific styling
$id = 'featured-videos-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<?php if ($videos): ?>
  <div id="<?= $id; ?>" class="featured-videos <?= $align_class; ?> block-content">
    <?php if ($title): ?>
      <h2 class="section-title wrap cf"><?= $title; ?></h2>
    <?php endif; ?>
    <div class="featured-videos-section section-content wrap cf">
      <?php foreach($videos as $video): ?>
        <span class="featured-video">
          <div class="featured-video-embed"><?= $video['video']; ?></div>
          <div class="featured-video-title"><?= $video['video_title']; ?></div>
        </span>
      <?php endforeach; ?>
    </div>
    <?php if ($button_url): ?>
      <div class="btn-wrap wrap">
        <a href="<?= $button_url; ?>" alt="<?= $button_text; ?>" class="about-btn more-btn primary-btn"><?= $button_text; ?></a>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>