<?php
if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wpst' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

<?php elseif ( is_search() ) : ?>

	<header class="page-header">
		<h1 class="widget-title"><?php printf( __( '%s: Video Search Results', 'wpst' ), '<span>' . get_search_query() . '</span>' ); ?></h1> <span class="search-video-number"><?php echo $wp_query->found_posts; ?> <?php esc_html_e('video found', 'wpst'); ?></span>
	</header><!-- .page-header -->

	<div class="alert alert-danger"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wpst' ); ?></div>			

	<?php $video_listing_ad = xbox_get_field_value( 'wpst-options', 'video-listing-ad-desktop' ); ?>
	<div class="video-list-content <?php if( $video_listing_ad != '' ) : ?>with-happy<?php endif; ?>">
		<?php if( $video_listing_ad != '' ) : ?>
			<div class="video-archive-ad">
				<?php echo $video_listing_ad; ?>
			</div>
		<?php endif; ?>
		<div class="videos-list">						
			<?php $args = array( 'numberposts' => xbox_get_field_value( 'wpst-options', 'videos-per-page' ), 'orderby' => 'rand' );
				$rand_posts = get_posts( $args );				
				foreach( $rand_posts as $post ) { 
					get_template_part( 'template-parts/loop', 'video' );
				} ?>
		</div>
	</div>

<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wpst' ); ?></p>

<?php endif; ?>