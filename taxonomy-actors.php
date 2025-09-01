<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) : ?>with-aside<?php endif; ?>" role="main">
			<?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) { get_template_part( 'template-parts/content', 'aside' ); } ?>
			<div class="archive-content clearfix-after">
				<?php if ( have_posts() ) { ?>
					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="widget-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header>
					<?php if( wp_is_mobile() ) { 
						$video_listing_ad = wpst_render_shortcodes(xbox_get_field_value( 'wpst-options', 'video-listing-ad-mobile' ));
					}else{
						$video_listing_ad = wpst_render_shortcodes(xbox_get_field_value( 'wpst-options', 'video-listing-ad-desktop' ));
					} ?>
					<div class="video-list-content <?php if( $video_listing_ad != '' ) : ?>with-happy<?php endif; ?>">						
						<div class="videos-list">						
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/loop', 'video' );
							endwhile; ?>
						</div>
						<?php if( $video_listing_ad != '' ) : ?>
							<div class="video-archive-ad">
								<?php echo $video_listing_ad; ?>
							</div>
						<?php endif; ?>
					</div>
					<?php wpst_page_navi();
				} else {
					get_template_part( 'template-parts/content', 'none' );
				} ?>
			</div>
		</main><!-- #main -->		
	</div><!-- #primary -->
<?php get_footer();
