
              <?php
                /*
                 * This is the default post format.
                 *
                 * So basically this is a regular post. if you don't want to use post formats,
                 * you can just copy ths stuff in here and replace the post format thing in
                 * single.php.
                 *
                 * The other formats are SUPER basic so you can style them as you like.
                 *
                 * Again, If you want to remove post formats, just delete the post-formats
                 * folder and replace the function below with the contents of the "format.php" file.
                */
              ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

                <header class="article-header entry-header">

                  <p class="byline entry-meta vcard">
                    <time class="updated entry-time" datetime="<?= get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?= get_the_time(get_option('date_format')); ?></time>
                    <span class="by"><?= __( 'by', 'bonestheme' ); ?></span> 
                    <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person"><?=get_the_author_link( get_the_author_meta( 'ID' ) ); ?></span>
                  </p>

                </header> <?php // end article header ?>

                <section class="entry-content cf" itemprop="articleBody">
                  <?php
                    // the content (pretty self explanatory huh)
                    the_content();
                  ?>
                </section> <?php // end article section ?>

                <footer class="article-footer">

                  <span class="signature">cheers,</span>
                  <span class="signature-author"><?php echo get_the_author_meta( 'display_name' ) ?></span>

                  <div class="category-tags">
                    <?php printf( __( 'Category', 'bonestheme' ).': %1$s', get_the_category_list(', ') ); ?>

                    <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
                  </div>

                </footer> <?php // end article footer ?>

                <?php comments_template(); ?>

              </article> <?php // end article ?>
