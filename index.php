<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) : ?>with-aside<?php endif; ?>" role="main">
			<?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) { get_template_part( 'template-parts/content', 'aside' ); } ?>
			<div class="archive-content clearfix-after">
				<?php if( xbox_get_field_value( 'wpst-options', 'homepage-title-desc-position' ) == 'top') {
					if ( xbox_get_field_value( 'wpst-options', 'homepage-title' ) != '' ) : ?>
						<h1 class="homepage-title"><?php echo xbox_get_field_value( 'wpst-options', 'homepage-title' ); ?></h1>
					<?php endif;
					if ( xbox_get_field_value( 'wpst-options', 'seo-footer-text' ) != '' ) : ?>
						<p class="homepage-description"><?php echo xbox_get_field_value( 'wpst-options', 'seo-footer-text' ); ?></p>
					<?php endif;
				}
				if ( have_posts() ) :
					if ( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'homepage' ) && ! isset( $_GET['filter'] ) ) {
						dynamic_sidebar( 'Homepage' );
					} elseif ( wp_is_mobile() && 'off' === xbox_get_field_value( 'wpst-options', 'disable-homepage-widgets-mobile' ) && function_exists( 'dynamic_sidebar') && is_active_sidebar( 'homepage' ) && ! isset( $_GET['filter'] ) ) {
						dynamic_sidebar( 'Homepage' );
					} ?>
					<h2 class="widget-title"><?php echo wpst_get_filter_title(); ?></h2>

					<?php get_template_part( 'template-parts/content', 'filters' ); ?>
					<?php if ( wp_is_mobile() ) {
						$video_listing_ad = wpst_render_shortcodes(xbox_get_field_value( 'wpst-options', 'video-listing-ad-mobile' ) );
					}else{
						$video_listing_ad = wpst_render_shortcodes(xbox_get_field_value( 'wpst-options', 'video-listing-ad-desktop' ) );
					}
					$video_ad_homepage = '';
					if ( ! isset( $_GET['filter'] ) ) {
						$video_ad_homepage = xbox_get_field_value( 'wpst-options', 'display-video-listing-ad-homepage' );
					} ?>
					<div class="video-list-content <?php if ( ! empty( $video_listing_ad ) && 'off' !== $video_ad_homepage ) : ?>with-happy<?php endif; ?>">
						<div class="videos-list">
							<?php
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/loop', 'video' );
							endwhile; ?>
						</div>
						<?php if ( ! empty( $video_listing_ad ) && 'off' !== $video_ad_homepage ) : ?>
							<div class="video-archive-ad">
								<?php echo wpst_render_shortcodes( $video_listing_ad ); ?>
							</div>
						<?php endif; ?>
					</div>
					<?php wpst_page_navi(); ?>
					<div class="clear"></div>
					<?php if ( 'bottom' === xbox_get_field_value( 'wpst-options', 'homepage-title-desc-position' ) ) : ?>
						<?php if ( ! empty( xbox_get_field_value( 'wpst-options', 'homepage-title' ) ) ) : ?>
							<h1 class="homepage-title"><?php echo xbox_get_field_value( 'wpst-options', 'homepage-title' ); ?></h1>
						<?php endif; ?>
						<?php if ( ! empty( xbox_get_field_value( 'wpst-options', 'seo-footer-text' ) ) ) : ?>
							<p class="homepage-description"><?php echo xbox_get_field_value( 'wpst-options', 'seo-footer-text' ); ?></p>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();
