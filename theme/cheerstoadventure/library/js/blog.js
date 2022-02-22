/*
 * Scripts file for blog page
 * Author: Emily Roth
 */

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function($) {
  // slick for blog posts
  $(".blog-category").slick({
    dots: false,
    infinite: false,
    speed: 400,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 481,
        settings: {
          slidesToShow: 2
        }
      }
    ]
  });
});
