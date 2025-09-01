		<div class="clear"></div>

		<?php if( xbox_get_field_value( 'wpst-options', 'footer-ad-desktop' ) != '' ) : ?>
			<div class="happy-footer">
				<?php echo wpst_render_shortcodes( xbox_get_field_value( 'wpst-options', 'footer-ad-desktop' ) ); ?>
			</div>
		<?php endif; ?>
		<?php if( xbox_get_field_value( 'wpst-options', 'footer-ad-mobile' ) != '' ) : ?>
			<div class="happy-footer-mobile">
				<?php echo wpst_render_shortcodes( xbox_get_field_value( 'wpst-options', 'footer-ad-mobile' ) ); ?>
			</div>
		<?php endif; ?>
		
		<?php if ( function_exists('dynamic_sidebar') && is_active_sidebar('footer') ) : ?>
			<div class="footer-widget-zone">	
				<div class="row">				
					<div class="<?php echo xbox_get_field_value( 'wpst-options', 'footer-columns' ); ?>">
						<?php dynamic_sidebar('footer'); ?>
					</div>					
				</div>
			</div>
		<?php endif; ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'wpst-footer-menu' ) ) : ?>
				<div class="footer-menu-container">				
					<?php wp_nav_menu( array( 'theme_location' => 'wpst-footer-menu' ) ); ?>
				</div>			
			<?php endif; ?>

			<?php if( xbox_get_field_value( 'wpst-options', 'copyright-bar' ) == 'on' ) : ?>
				<div class="site-info">
					<?php echo xbox_get_field_value( 'wpst-options', 'copyright-text' ); ?>
				</div>
			<?php endif; ?>

			<?php if( xbox_get_field_value( 'wpst-options', 'show-social-profiles' ) == 'on' ) : ?>
                <div class="social-share">                   
                    <?php if(xbox_get_field_value( 'wpst-options', 'facebook-profile' ) != '') : ?>
                        <a href="<?php echo xbox_get_field_value( 'wpst-options', 'facebook-profile' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <?php endif; ?>
                    <?php if(xbox_get_field_value( 'wpst-options', 'twitter-profile' ) != '') : ?>
                        <a href="<?php echo xbox_get_field_value( 'wpst-options', 'twitter-profile' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if(xbox_get_field_value( 'wpst-options', 'google-plus-profile' ) != '') : ?>
                        <a href="<?php echo xbox_get_field_value( 'wpst-options', 'google-plus-profile' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <?php endif; ?>
                    <?php if(xbox_get_field_value( 'wpst-options', 'youtube-profile' ) != '') : ?>
                        <a href="<?php echo xbox_get_field_value( 'wpst-options', 'youtube-profile' ); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
                    <?php endif; ?>
                    <?php if(xbox_get_field_value( 'wpst-options', 'tumblr-profile' ) != '') : ?>
                        <a href="<?php echo xbox_get_field_value( 'wpst-options', 'tumblr-profile' ); ?>" target="_blank"><i class="fa fa-tumblr"></i></a>
                    <?php endif; ?>
                    <?php if(xbox_get_field_value( 'wpst-options', 'instagram-profile' ) != '') : ?>
                        <a href="<?php echo xbox_get_field_value( 'wpst-options', 'instagram-profile' ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
		</footer><!-- #colophon -->
	</div><!-- #content -->	
</div><!-- #page -->

<a class="button" href="#" id="back-to-top" title="Back to top"><i class="fa fa-chevron-up"></i></a>

<?php wp_footer(); ?>

<!-- Other scripts -->
<?php if(xbox_get_field_value( 'wpst-options', 'other-scripts' ) != '') { echo xbox_get_field_value( 'wpst-options', 'other-scripts' ); } ?>

</body>
</html>