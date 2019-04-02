<?php
/**
 * Blog single page
 */
?>
<?php get_header(); ?>

<meta name="p:domain_verify" content="ccdb18555c38fb04a7cd19108744d135"/>

			<div id="content">

				<div id="inner-content">


						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<div class="section-content wrap cf">
								<div class="blog-recent-posts recent-posts">
									<div class="recent-post-sizer"></div>
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									  <div class="recent-post-item">
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
									  </div>
									<?php endwhile; ?>
								</div>
					

							</div>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

				</div>

			</div>

<meta name="p:domain_verify" content="ccdb18555c38fb04a7cd19108744d135"/>
<?php get_footer(); ?>
