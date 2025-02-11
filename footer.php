	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-footer-info">
					<h3 class="site-footer-info__title"><?php esc_html_e('Follow Us', 'paisanoanddaughters'); ?></h3>
					<div class="site-footer-info-social">	
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'follow-us',
								'menu_id'        => 'follow-us-menu',
								'container_class' => 'menu-main-menu-container menu-nav',						)
						);
						?>
					</div>
					<div class="footer-menu site-footer-info-menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'menu_id'        => 'footer-menu',
								'container_class' => 'menu-main-menu-container menu-nav',
							)
						);
						?>
					</div>
			</div><!-- .site-footer-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>

</html>