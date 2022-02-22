<?php
/**
 * Block Name: Featured Blog Posts
 *
 * This is the template that displays the featured blog posts block.
 */

$title = get_field('title');
$blog_posts = get_field('blog_posts');
$button_url = get_field('button_url');
$button_text = get_field('button_text');

// create id attribute for specific styling
$id = 'featured-posts-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<?php if ($blog_posts): ?>
  <div id="<?= $id; ?>" class="featured-posts <?= $align_class; ?> block-content">
    <?php if ($title): ?>
      <h2 class="section-title wrap cf"><?= $title; ?></h2>
    <?php endif; ?>
    <div class="featured-posts-section section-content wrap cf">
      <ul class="featured-posts-list">
        <?php foreach($blog_posts as $post_obj): ?>
          <li class="featured-post">
            <a href="<?= get_permalink($post_obj->ID); ?>">
              <div class="featured-post-img-wrap">
                <?= get_the_post_thumbnail($post_obj->ID, 'medium'); ?>
              </div>
              <h3 class="featured-post-title"><?= get_the_title($post_obj->ID); ?></h3>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php if ($button_url): ?>
      <div class="btn-wrap wrap">
        <a href="<?= $button_url; ?>" alt="<?= $button_text; ?>" class="about-btn more-btn primary-btn"><?= $button_text; ?></a>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>