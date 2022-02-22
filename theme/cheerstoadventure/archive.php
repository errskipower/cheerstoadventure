<?php get_header(); ?>

			<div id="content">

				<div id="inner-content">

						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php
							the_archive_title( '<h1 class="page-title section-title wrap cf">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
							<div class="section-content wrap cf section-content-bottom">
								<ul class="recent-posts">
									<li class="recent-post-sizer"></li>
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										<li class="recent-post-item">
										  <?php if (has_post_thumbnail()): ?>
										    <?php 
										      $post_thumbnail_id = get_post_thumbnail_id();
										      $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
										    ?>
										    <div class="recent-img">
										      <img title="image title" alt="thumb image" class="wp-post-image" src="<?php echo $post_thumbnail_url; ?>" style="width:100%; height:auto;">
										    </div>
										  <?php endif; ?>
										  <div class="recent-date"><?php the_date(); ?></div>
										  <a href="<?php the_permalink() ?>" class="recent-title"><?php the_title(); ?></a>
										</li>
									<?php endwhile; ?>
								</ul>
							</div>

									<?php bones_page_navi(); ?>

							<?php else : ?>

								<div class="section-content wrap cf section-content-bottom">

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
									</article>
								</div>

							<?php endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
