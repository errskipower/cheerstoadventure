<?php
 /*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once('library/bones.php');

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style(get_stylesheet_directory_uri() . '/library/css/editor-style.css');

  // let's get language support going, if you need it
  load_theme_textdomain('bonestheme', get_template_directory() . '/library/translation');

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once('library/custom-post-type.php');

  // launching operation cleanup
  add_action('init', 'bones_head_cleanup');
  // A better title
  add_filter('wp_title', 'rw_title', 10, 3);
  // remove WP version from RSS
  add_filter('the_generator', 'bones_rss_version');
  // remove pesky injected css for recent comments widget
  add_filter('wp_head', 'bones_remove_wp_widget_recent_comments_style', 1);
  // clean up comment styles in the head
  add_action('wp_head', 'bones_remove_recent_comments_style', 1);
  // clean up gallery output in wp
  add_filter('gallery_style', 'bones_gallery_style');

  // enqueue base scripts and styles
  add_action('wp_enqueue_scripts', 'bones_scripts_and_styles', 999);
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action('widgets_init', 'bones_register_sidebars');

  // cleaning up random code around images
  add_filter('the_content', 'bones_filter_ptags_on_images');
  // cleaning up excerpt
  add_filter('excerpt_more', 'bones_excerpt_more');
} /* end bones ahoy */

// let's get this party started
add_action('after_setup_theme', 'bones_ahoy');


/************* OEMBED SIZE OPTIONS *************/

if (!isset($content_width)) {
  $content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size('bones-thumb-600', 600, 150, true);
add_image_size('bones-thumb-300', 300, 100, true);

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter('image_size_names_choose', 'bones_custom_image_sizes');

function bones_custom_image_sizes($sizes)
{
  return array_merge($sizes, array(
    'bones-thumb-600' => __('600px by 150px'),
    'bones-thumb-300' => __('300px by 100px'),
  ));
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
A good tutorial for creating your own Sections, Controls and Settings:
http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

Good articles on modifying the default options:
http://natko.com/changing-default-wordpress-theme-customization-api-sections/
http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

To do:
- Create a js for the postmessage transport method
- Create some sanitize functions to sanitize inputs
- Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize)
{
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action('customize_register', 'bones_theme_customizer');

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars()
{
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __('Sidebar 1', 'bonestheme'),
    'description' => __('The first (primary) sidebar.', 'bonestheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  /*
to add more sidebars or widgetized areas, just copy
and edit the above sidebar code. In order to call
your new sidebar just use the following code:

Just change the name to whatever your new
sidebar's id is, for example:

register_sidebar(array(
'id' => 'sidebar2',
'name' => __( 'Sidebar 2', 'bonestheme' ),
'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
));

To call the sidebar in your template, you can just copy
the sidebar.php file and rename it to your sidebar's name.
So using the above example, it would be:
sidebar-sidebar2.php

*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article class="wrap cf">
        <header class="comment-author vcard">
            <?php printf(__('<cite class="fn">%1$s</cite> %2$s', 'bonestheme'), get_comment_author_link(), edit_comment_link(__('(Edit)', 'bonestheme'), '  ', '')) ?>
            <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>

        </header>
        <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
            <p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
        </div>
        <?php endif; ?>
        <section class="comment_content cf">
            <?php comment_text() ?>
        </section>
        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>

<?php

} // don't remove this bracket!


/*
  This is a modification of a function found in the
  twentythirteen theme where we can declare some
  external fonts. If you're using Google Fonts, you
  can replace these fonts, change it in your scss files
  and be up and running in seconds.
*/
function bones_fonts() {
  wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Satisfy|Montserrat:300|Esteban');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

/**
 * Advanced Custom Fields Blocks
 */
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

  // check function exists
  if (function_exists('acf_register_block')) {

    // register an intro block
    acf_register_block([
      'name'            => 'intro',
      'title'           => __('Intro'),
      'description'     => __('A custom intro block.'),
      'render_callback' => 'custom_block_render',
      'category'        => 'layout',
      'icon'            => 'groups',
      'keywords'        => ['intro', 'welcome', 'about', 'home'],
    ]);

    // register a featured videos block
    acf_register_block([
      'name'            => 'featured-videos',
      'title'           => __('Featured Videos'),
      'description'     => __('A custom featured videos block.'),
      'render_callback' => 'custom_block_render',
      'category'        => 'layout',
      'icon'            => 'format-video',
      'keywords'        => ['featured videos', 'videos', 'video', 'featured', 'youtube', 'home'],
    ]);

    // register a featured portfolio block
    acf_register_block([
      'name'            => 'featured-portfolio',
      'title'           => __('Featured Portfolio'),
      'description'     => __('A custom featured portfolio block.'),
      'render_callback' => 'custom_block_render',
      'category'        => 'layout',
      'icon'            => 'layout',
      'keywords'        => ['featured portfolio', 'portfolio', 'image', 'pictures', 'featured', 'home'],
    ]);

    // register a featured blog posts block
    acf_register_block([
      'name'            => 'featured-posts',
      'title'           => __('Featured Blog Posts'),
      'description'     => __('A custom featured blog posts block.'),
      'render_callback' => 'custom_block_render',
      'category'        => 'layout',
      'icon'            => 'format-aside',
      'keywords'        => ['featured posts', 'blog', 'posts', 'featured', 'home'],
    ]);

    // register a featured testimonials block
    acf_register_block([
      'name'            => 'testimonials',
      'title'           => __('Testimonials'),
      'description'     => __('A custom testimonials block.'),
      'render_callback' => 'custom_block_render',
      'category'        => 'layout',
      'icon'            => 'format-chat',
      'keywords'        => ['testimonials', 'testimonial', 'portfolio'],
    ]);

    // register a primary button
    acf_register_block([
      'name'            => 'primary-button',
      'title'           => __('Primary Button'),
      'description'     => __('A custom primary button.'),
      'render_callback' => 'custom_block_render',
      'category'        => 'layout',
      'icon'            => 'admin-links',
      'keywords'        => ['button', 'primary button', 'primary', 'link'],
    ]);

    // register a featured testimonials block
    acf_register_block([
      'name'            => 'Pricings',
      'title'           => __('Pricings'),
      'description'     => __('A custom pricings block.'),
      'render_callback' => 'custom_block_render',
      'category'        => 'layout',
      'icon'            => 'tag',
      'keywords'        => ['pricing', 'pricings', 'price', 'portfolio'],
    ]);

    // register a featured testimonials block
    acf_register_block([
      'name'            => 'featured-shortcode',
      'title'           => __('Featured Shortcode'),
      'description'     => __('A custom featured shortcode block.'),
      'render_callback' => 'custom_block_render',
      'category'        => 'layout',
      'icon'            => 'editor-code',
      'keywords'        => ['shortcode', 'code', 'shot', 'portfolio'],
    ]);
  }
}

function custom_block_render($block) {

  // convert name ("acf/intro") into path friendly slug ("intro")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "template-parts/block" folder
  if (file_exists(get_theme_file_path("/template-parts/block/content-{$slug}.php"))) {
    include(get_theme_file_path("/template-parts/block/content-{$slug}.php"));
  }
}

// custom nav menu items
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects($items, $args)
{
  foreach ($items as &$item) {
    $icon = get_field('icon', $item);

    if ($icon) {
      $item->title = ' <i class="fab fa-' . $icon . '"></i>';
    }
  }

  return $items;
}

// custom logo for theme settings
add_theme_support('custom-logo', [
  'height'      => 254,
  'width'       => 500,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => ['site-title', 'site-description'],
]);

add_theme_support( 'post-thumbnails' );


/* DON'T DELETE THIS CLOSING TAG */ 
?>