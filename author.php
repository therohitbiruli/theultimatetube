<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) : ?>with-aside<?php endif; ?>" role="main">
			<?php if( xbox_get_field_value( 'wpst-options', 'display-left-sidebar' ) == 'on' ) { get_template_part( 'template-parts/content', 'aside' ); } ?>
			<div class="archive-content clearfix-after">
				<?php if ( have_posts() ) { ?>
				<header class="page-header author-header">
					<div class="author-channel-img"><?php echo get_avatar( get_the_author_meta('ID'), '85' ); ?></div>
					<div class="author-channel-name">
						<h1 class="widget-title"><?php echo get_the_author_meta( 'display_name' ); ?></h1>
						<div class="author-video-count"><?php echo count_user_posts(get_the_author_meta('ID')); ?> <?php esc_html_e('videos', 'wpst'); ?></div>
					</div>
					<div class="clear"></div>
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
