<article id="post-<?php the_ID(); ?>" <?php if(xbox_get_field_value( 'wpst-options', 'videos-per-row-mobile' ) == '1') { post_class('thumb-block full-width'); }else{ post_class('thumb-block'); } ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

		<!-- Trailer -->
		<?php $trailer_url = get_post_meta($post->ID, 'trailer_url', true);
		$trailer_format = explode( '.',  $trailer_url);
		$trailer_format = $trailer_format[ count( $trailer_format ) - 1];
		$thumb_url = get_post_meta($post->ID, 'thumb', true); ?>

		<?php if( $trailer_url != '' && !wp_is_mobile() ) : ?>
			<!-- Video trailer -->
			<?php 
				if ( get_the_post_thumbnail() != '' ) {
					$poster_url = get_the_post_thumbnail_url($post->ID, xbox_get_field_value( 'wpst-options', 'main-thumbnail-quality' ));
				}elseif( $thumb_url != '' ){
					$poster_url = $thumb_url;
				}
			?>
			<div class="post-thumbnail video-with-trailer">
				<video class="wpst-trailer" preload="none" muted loop poster="<?php echo $poster_url; ?>">
					<source src="<?php echo $trailer_url; ?>" type='video/<?php echo $trailer_format; ?>'/>
				</video> 
				<?php if(get_post_meta($post->ID, 'hd_video', true) == 'on') : ?><span class="hd-video"><?php esc_html_e('HD', 'wpst'); ?></span><?php endif; ?>
				<?php if(xbox_get_field_value( 'wpst-options', 'enable-duration-system' ) == 'on' && wpst_get_video_duration() != '') : ?><span class="duration"><?php echo wpst_get_video_duration(); ?></span><?php endif; ?>
			</div>
		<?php else : ?>
			<!-- Thumbnail -->
			<div class="post-thumbnail <?php if( xbox_get_field_value( 'wpst-options', 'enable-thumbnails-rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>" <?php if( xbox_get_field_value( 'wpst-options', 'enable-thumbnails-rotation' ) == 'on' ) : ?>data-thumbs='<?php echo wpst_get_multithumbs($post->ID);?>'<?php endif; ?>>
				<?php 
				if ( get_the_post_thumbnail() != '' ) {
					//the_post_thumbnail('wpst_thumb_small', array( 'alt' => get_the_title() ));
					if( wp_is_mobile() ){
						echo '<img src="' . get_the_post_thumbnail_url($post->ID, xbox_get_field_value( 'wpst-options', 'main-thumbnail-quality' )) . '" alt="' . get_the_title() . '">';
					}else{
						echo '<img data-src="' . get_the_post_thumbnail_url($post->ID, xbox_get_field_value( 'wpst-options', 'main-thumbnail-quality' )) . '" alt="' . get_the_title() . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
					}
				}elseif( $thumb_url != '' ){
					echo '<img data-src="' . $thumb_url . '" alt="' . get_the_title() . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
				}else{
					echo '<div class="no-thumb"><span><i class="fa fa-image"></i> ' . esc_html__('No image', 'wpst') . '</span></div>';
				} ?>
				<?php /* if(!wp_is_mobile()) : ?><div class="play-icon-hover"><i class="fa fa-play-circle"></i></div><?php endif; */ ?>
				<?php if(get_post_meta($post->ID, 'hd_video', true) == 'on') : ?><span class="hd-video"><?php esc_html_e('HD', 'wpst'); ?></span><?php endif; ?>
				<?php if(xbox_get_field_value( 'wpst-options', 'enable-duration-system' ) == 'on' && wpst_get_video_duration() != '') : ?><span class="duration"><?php echo wpst_get_video_duration(); ?></span><?php endif; ?>
			</div>

		<?php endif; ?>

		<header class="entry-header">
			<span class="title"><?php the_title(); ?></span>

			<?php if(xbox_get_field_value( 'wpst-options', 'enable-views-system' ) == 'on' || xbox_get_field_value( 'wpst-options', 'enable-rating-system' ) == 'on' ) : ?>
				<div class="under-thumb">
					<?php if(xbox_get_field_value( 'wpst-options', 'enable-views-system' ) == 'on') : ?>
						<span class="views"><i class="fa fa-eye"></i> <?php echo intval( wpst_get_post_views( get_the_ID() ) ); ?></span>
					<?php endif; ?>

					<?php if( xbox_get_field_value( 'wpst-options', 'enable-rating-system' ) == 'on' ) : ?>
						<?php if(wpst_getPostLikeRate(get_the_ID()) != false) : ?>
							<span class="rating"><i class="fa fa-thumbs-up"></i> <?php echo wpst_getPostLikeRate(get_the_ID());?></span>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->
	</a>
</article><!-- #post-## -->
