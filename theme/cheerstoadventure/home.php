<?php
/**
 * Blog home page - posts are displayed by category, where the category is 
 * picked on the edit Blog Page using ACF
 */
?>

<?php get_header(); ?>
<?php
function get_post_item($post_id) {
	$post_str = '
		<div class="recent-post-item">';

	if (has_post_thumbnail()) {
		$post_thumbnail_id = get_post_thumbnail_id($post_id);
		$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);

		if ($post_thumbnail_url) {
			$post_str .= '
			<div class="recent-img">
				<img title="image title" alt="thumb image" class="wp-post-image" src="' . $post_thumbnail_url . '" style="width:100%; height:100%; object-fit:cover;">
			</div>';
		}
	}

	$post_str .= '
		<div class="recent-date">' . get_the_date('F j, Y', $post_id) . '</div>
		<a href="' . get_the_permalink($post_id) . '" class="recent-title">' . 
			get_the_title($post_id) . '
		</a>
	</div>';

	return $post_str;
}

?>

<meta name="p:domain_verify" content="ccdb18555c38fb04a7cd19108744d135"/>

			<div id="content">

				<div id="inner-content">


						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<div class="section-content wrap cf">

								<?php 
									// posts by category
									$categories = get_field('categories', get_option('page_for_posts'));
									foreach ($categories as $category):
										$category_id = $category->term_id;
										$category_name = $category->name;
										query_posts("cat=$category_id&posts_per_page=25");
								?>
									<div class="blog-category-wrapper wrap">
										<h3 class="blog-category-name section-title wrap"><?= $category_name; ?></h3>
										<div class="blog-category wrap">
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
												<?= get_post_item(get_the_ID()); ?>
											<?php endwhile; endif;?>
										</div>
									</div>
								<?php endforeach; ?>
					

							</div>


						</main>

				</div>

			</div>

<meta name="p:domain_verify" content="ccdb18555c38fb04a7cd19108744d135"/>
<?php get_footer(); ?>
