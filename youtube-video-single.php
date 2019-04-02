<?php
/*
Template Name: Youtube Video Detail
*/

get_header(); ?>

<div id="content">

  <div id="inner-content" class="wrap cf">

    <main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <?php
        //this is normally where the WP Loop would be. Instead we add a loop to get pods stuff 
      
        //get the current slug 
        $slug = pods_v( 'last', 'url' );
        //get pods object
        $mypod = pods( 'youtubevideo', $slug );

        // set our variables
        $name = $mypod->field('name');
        $permalink = $mypod->field('permalink');
        $author_id = $mypod->field('post_author');
        $author = get_the_author_meta( 'display_name', $author_id );
        $url = $mypod->field('url');
        $url_array = explode('/', $url);
        $url_array = explode('=', end($url_array));
        $url = end($url_array);
        $description = $mypod->field('content');
        $time = strtotime($mypod->field('date'));
      ?>

      <article id="<?php echo $permalink; ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

        <header class="article-header entry-header">

          <h1 class="entry-title single-title" itemprop="headline" rel="bookmark">
            <a href="<?php echo $permalink; ?>"><?php echo $name; ?></a>
          </h1>

          <p class="byline entry-meta vcard">
            Posted <time class="updated entry-time" datetime="<?php echo date('Y-m-d', $time); ?>" itemprop="datePublished"><?php echo date('F j, Y', $time); ?></time> <span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope="" itemptype="http://schema.org/Person"><?php echo $author; ?></span>
          </p>
        </header>

        <section class="entry-content cf" itemprop="articleBody">

          <div class="youtube-video">
            <iframe width="420" height="315"
              src="http://www.youtube.com/embed/<?php echo $url; ?>">
            </iframe>
          </div>
          <p><?php echo $description; ?></p>

        </section>

        <footer class="article-footer">

          <span class="signature">cheers,</span>
          <span class="signature-author"><?php echo $author; ?></span>

        </footer> <?php // end article footer ?>

      </article>

    </main><!-- main -->

  </div>

</div>

<?php get_footer(); ?>