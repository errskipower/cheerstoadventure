<?php
/*
 Template Name: Destinations Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
$recent_posts_title = get_field('recent_posts_title');
$number_of_recent_posts_mobile = get_field('number_of_recent_posts_mobile');
$number_of_recent_posts_desktop = get_field('number_of_recent_posts_desktop');
$more_posts_button = get_field('more_posts_button');
?>

<?php get_header(); ?>

      <div id="content">

        <div id="inner-content">

            <main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header wrap cf">

                  <h1 class="page-title section-title" itemprop="headline"><?php the_title(); ?></h1>

                </header> <?php // end article header ?>

                <section class="entry-content section-content wrap cf" itemprop="articleBody">
                  <?php
                    // the content (pretty self explanatory huh)
                    the_content();

                    /*
                     * Link Pages is used in case you have posts that are set to break into
                     * multiple pages. You can remove this if you don't plan on doing that.
                     *
                     * Also, breaking content up into multiple pages is a horrible experience,
                     * so don't do it. While there are SOME edge cases where this is useful, it's
                     * mostly used for people to get more ad views. It's up to you but if you want
                     * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                     *
                     * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                     *
                    */
                    wp_link_pages( array(
                      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                      'after'       => '</div>',
                      'link_before' => '<span>',
                      'link_after'  => '</span>',
                    ) );
                  ?>
                </section> <?php // end article section ?>

                <footer class="article-footer cf">

                </footer>

                <?php comments_template(); ?>

              </article>

              <?php endwhile; endif; ?>

              <h2 class="section-title wrap cf"><?php echo $recent_posts_title; ?></h2>
              <div class="section-content wrap cf section-content-bottom">
                <ul class="recent-posts">
                <?php $the_query = new WP_Query('posts_per_page=' . (wp_is_mobile() ? $number_of_recent_posts_mobile : $number_of_recent_posts_desktop) . '&category_name=travel'); ?>

                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
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

                <?php wp_reset_postdata(); ?>
                </ul>
                <div class="btn-wrap">
                  <a href="/category/travel/" alt="blog posts" class="more-btn primary-btn"><?php echo $more_posts_button; ?></a>
                </div>
              </div>

            </main>

        </div>

      </div>

<?php get_footer(); ?>
