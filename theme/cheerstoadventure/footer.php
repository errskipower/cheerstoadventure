			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<nav class="bottom-nav-container" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu([
						'container'       => false,                              // remove nav container
						'container_class' => 'menu cf',                          // class of container (should you choose to use it)
						'menu'            => __('Footer Links', 'bonestheme'),  // nav name
						'menu_class'      => 'nav footer-nav ' . (wp_is_mobile() ? '' : 'wrap') . ' cf', // adding custom nav class
						'theme_location'  => 'footer-links',                     // where it's located in the theme
						'before'          => '',                                 // before the menu
						'after'           => '',                                 // after the menu
						'link_before'     => '',                                 // before each link
						'link_after'      => '',                                 // after each link
						'depth'           => 0,                                  // limit the depth of the nav
						'fallback_cb'     => ''                                  // fallback function (if there is one)
					]); ?>
				</nav>

				<?php // instragram widget ?>
				<?php echo wdi_feed(array('id'=>'2')); ?>

				<div id="inner-footer" class="wrap cf">
          
          <nav class="social-nav-container" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu([
							'container'       => false,                              // remove nav container
							'container_class' => 'menu cf',                          // class of container (should you choose to use it)
							'menu'            => __('Social Links', 'bonestheme'),  // nav name
							'menu_class'      => 'nav social-nav ' . (wp_is_mobile() ? '' : 'wrap') . ' cf', // adding custom nav class
							'theme_location'  => 'social-links',                     // where it's located in the theme
							'before'          => '',                                 // before the menu
							'after'           => '',                                 // after the menu
							'link_before'     => '',                                 // before each link
							'link_after'      => '',                                 // after each link
							'depth'           => 0,                                  // limit the depth of the nav
							'fallback_cb'     => ''                                  // fallback function (if there is one)
						]); ?>
					</nav>

					<p class="source-org copyright">
            &copy; <?php echo date('Y'); ?> Cheers to Adventure Film x Photo LLC.<br>
            Website Design and Development by <a href="http://emroth.com" alt="Emily Roth Web Development">Emily Roth</a>.
          </p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
