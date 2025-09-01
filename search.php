<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) : ?>with-aside<?php endif; ?>" role="main">
			<?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) { get_template_part( 'template-parts/content', 'aside' ); } ?>
			<div class="archive-content clearfix-after">
				<?php if ( have_posts() ) { ?>
					<header class="page-header">
                        <h1 class="widget-title"><?php printf( __( '%s: Video Search Results', 'wpst' ), '<span>' . get_search_query() . '</span>' ); ?></h1> <span class="search-video-number"><?php echo $wp_query->found_posts; ?> <?php esc_html_e('videos found', 'wpst'); ?></span>
						<?php get_template_part( 'template-parts/content', 'filters' ); ?>
					</header><!-- .page-header -->				
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