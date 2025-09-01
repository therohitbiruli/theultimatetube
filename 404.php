<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) : ?>with-aside<?php endif; ?>" role="main">
			<?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) { get_template_part( 'template-parts/content', 'aside' ); } ?>
			<div class="archive-content clearfix-after">			
				<header class="page-header">
					<h1 class="widget-title"><?php esc_html_e( 'Page not found.', 'wpst' ); ?></h1>
					<p><?php esc_html_e( 'Oops, the page you requested doesn\'t exist.', 'wpst' ); ?> <a href="<?php echo home_url(); ?>" title="<?php esc_html_e( 'Return to Home', 'wpst' ); ?>"><?php esc_html_e( 'Return to Home', 'wpst' ); ?></a></p>					
				</header><!-- .page-header -->
				<?php if( wp_is_mobile() ) { 
					$video_listing_ad = xbox_get_field_value( 'wpst-options', 'video-listing-ad-mobile' );
				}else{
					$video_listing_ad = xbox_get_field_value( 'wpst-options', 'video-listing-ad-desktop' );
				} ?>				
				<div class="video-list-content <?php if( $video_listing_ad != '' ) : ?>with-happy<?php endif; ?>">					
					<div class="videos-list">						
						<?php $args = array( 'numberposts' => xbox_get_field_value( 'wpst-options', 'videos-per-page' ), 'orderby' => 'rand' );
							$rand_posts = get_posts( $args );				
							foreach( $rand_posts as $post ) { 
								get_template_part( 'template-parts/loop', 'video' );
							} ?>
					</div>
					<?php if( $video_listing_ad != '' ) : ?>
						<div class="video-archive-ad">
							<?php echo $video_listing_ad; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();