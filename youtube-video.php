<?php
/*
Template Name: Youtube Videos
*/

get_header(); ?>
 
<div id="content">

  <div id="inner-content">

    <main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <div class="section-content wrap cf">

        <ul class="recent-posts">
          <?php
            //this is normally where the WP Loop would be. Instead we add a loop to get pods stuff 
            $mypod = pods('youtubevideo');
            $mypod->find('date DESC'); 
            $counter = 0;     
          ?>
           
          <?php while ( $mypod->fetch() ) : ?>
          
            <?php
              // set our variables
              $name = $mypod->field('name');
              $permalink = $mypod->field('permalink');
              $url = $mypod->field('url');
              $url_array = explode('/', $url);
              $url_array = explode('=', end($url_array));
              $url = end($url_array);
              $description = $mypod->field('content');
              $time = strtotime($mypod->field('date'));
            ?>

            <li class="recent-post-item">
              <div class="recent-img">
                <img title="image title" alt="thumb image" class="wp-post-image" src="http://img.youtube.com/vi/<?php echo $url; ?>/hqdefault.jpg" style="width:100%; height:100%;">
              </div>
              <div class="recent-date"><?php echo date('F j, Y', $time); ?></div>
              <a href="<?php echo $permalink; ?>" class="recent-title"><?php echo $name; ?></a>
            </li>

            <?php $counter++; ?>

          <?php endwhile; ?>
        </ul>
      </div>
      
      <?php if ($counter == 0): ?>
        <h2>Sorry, but there are currently no videos to display.  Check back soon!</h2>
      <?php endif; ?>

    </main><!-- main -->

  </div>

</div>
 
<?php get_footer(); ?>