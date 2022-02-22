<!doctype html>

<meta name="p:domain_verify" content="4ad9ff8226d8c685cdf0d59fde471326"/>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

  <head>
    <meta charset="utf-8">

    <?php // force Internet Explorer to use the latest rendering engine available ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	  <meta name="p:domain_verify" content="ccdb18555c38fb04a7cd19108744d135"/>


    <title><?php wp_title(''); ?></title>

    <?php // mobile meta (hooray!) ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <?php // icons & favicons ?>
    <!--[if IE]>
      <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri(); ?>/favicon-16x16.png">
    <?php // fontawesome icons ?>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-LRlmVvLKVApDVGuspQFnRQJjkv0P7/YFrw84YYQtmYG4nK8c+M+NlmYDCv0rKWpG" crossorigin="anonymous">
    
    <meta name="theme-color" content="#121212">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php // wordpress head functions ?>
    <?php wp_head(); ?>
    <?php // end of wordpress head ?>

    <?php // drop Google Analytics Here ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-70465749-2', 'auto');
      ga('send', 'pageview');

    </script>
    <?php // end analytics ?>

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>

    <?php if (is_home()): ?>
      <?php $js_dir = get_template_directory_uri() . '/library/js'; ?>
      <?php $slick_dir = $js_dir . '/libs/slick'; ?>
      <link rel="stylesheet" type="text/css" href="<?= $slick_dir ?>/slick.css">
      <link rel="stylesheet" type="text/css" href="<?= $slick_dir ?>/slick-theme.css">
      <script src="<?= $slick_dir ?>/slick.js" type="text/javascript" charset="utf-8"></script>
      <script src="<?= $js_dir ?>/blog.js" type="text/javascript" charset="utf-8"></script>
    <?php endif; ?>

    <?php
      if (is_home() && get_option('page_for_posts') ) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
        $featured_image_url = $img[0];
      } else { 
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(),'full');
      }
      $blog_name = get_bloginfo('name');
      // custom logo
      $custom_logo_id = get_theme_mod('custom_logo');
      $logo_image     = wp_get_attachment_image_src($custom_logo_id ,'full');
    ?>


  </head>

  <body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

    <nav class="side-nav-container side-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
      <?php wp_nav_menu([
        'container'       => false,                              // remove nav container
        'container_class' => 'menu cf',                          // class of container (should you choose to use it)
        'menu'            => __('The Main Menu', 'bonestheme'),  // nav name
        'menu_class'      => 'nav top-nav ' . (wp_is_mobile() ? '' : 'wrap') . ' cf', // adding custom nav class
        'theme_location'  => 'main-nav',                         // where it's located in the theme
        'before'          => '',                                 // before the menu
        'after'           => '',                                 // after the menu
        'link_before'     => '',                                 // before each link
        'link_after'      => '',                                 // after each link
        'depth'           => 0,                                  // limit the depth of the nav
        'fallback_cb'     => ''                                  // fallback function (if there is one)
      ]); ?>
    </nav>

    <div id="container">

      <header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader" style="<?php if (is_home()): ?>background-image: url('<?=$featured_image_url;?>')<?php endif; ?>">

        <div class="inner-header">

          <span id="logo" itemscope itemtype="http://schema.org/Organization">
            <a href="<?php echo home_url(); ?>" rel="nofollow">
              <img class="logo-image" src="<?= $logo_image[0]; ?>" alt="<?= $blog_name ?>" />
            </a>
          </span>


          <div class="mobile-nav">
            <span class="mobile-nav-title">
              <span class="fa-stack fa-1x">
                <i class="fas fa-square fa-stack-2x menu-icon-bkg"></i>
                <i class="far fa-bars fa-stack-1x menu-icon-bars"></i>
              </span>
            </span>
          </div>

          <nav class="desktop-nav-container desktop-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php wp_nav_menu([
              'container'       => false,                              // remove nav container
              'container_class' => 'menu cf',                          // class of container (should you choose to use it)
              'menu'            => __('The Main Menu', 'bonestheme'),  // nav name
              'menu_class'      => 'nav cf',                           // adding custom nav class
              'theme_location'  => 'main-nav',                         // where it's located in the theme
              'before'          => '',                                 // before the menu
              'after'           => '',                                 // after the menu
              'link_before'     => '',                                 // before each link
              'link_after'      => '',                                 // after each link
              'depth'           => 0,                                  // limit the depth of the nav
              'fallback_cb'     => ''                                  // fallback function (if there is one)
            ]); ?>
          </nav>
            
          
        </div>
        
        <?php if (is_single()): ?>
          <div class="single-title-wrapper">
            <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
          </div>
        <?php endif; ?>

        <?php if (is_page()): ?>
          <?php $post_title = get_the_title(get_the_ID()); ?>
          <?php if ($post_title && $post_title !== 'Home'): ?>
            <div class="single-title-wrapper">
              <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
            </div>
          <?php endif; ?>
        <?php endif; ?>

        <?php if (is_home()): ?>
          <div class="single-title-wrapper">
            <h1 class="page-title" itemprop="headline" rel="bookmark">Blog</h1>
          </div>
        <?php endif; ?>
      </header>
