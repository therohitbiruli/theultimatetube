<?php
// Thumbnail
$thumb = get_post_meta( $post->ID, 'thumb', true );
if ( has_post_thumbnail() ) {
	$thumb_id  = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src( $thumb_id, 'wpst_thumb_large', true );
	$poster    = $thumb_url[0];
} else {
	$poster = $thumb;
}

// Video URL
$video_url   = get_post_meta( $post->ID, 'video_url', true );
$format_path = wp_parse_url( $video_url, PHP_URL_PATH );
$format      = explode( '.', $format_path );
$format      = end( $format );

$video_url_240   = get_post_meta( $post->ID, 'video_url_240', true );
$format_path_240 = wp_parse_url( $video_url_240, PHP_URL_PATH );
$format_240      = explode( '.', $format_path_240 );
$format_240      = end( $format_240 );

$video_url_360   = get_post_meta( $post->ID, 'video_url_360', true );
$format_path_360 = wp_parse_url( $video_url_360, PHP_URL_PATH );
$format_360      = explode( '.', $format_path_360 );
$format_360      = end( $format_360 );

$video_url_480   = get_post_meta( $post->ID, 'video_url_480', true );
$format_path_480 = wp_parse_url( $video_url_480, PHP_URL_PATH );
$format_480      = explode( '.', $format_path_480 );
$format_480      = end( $format_480 );

$video_url_720   = get_post_meta( $post->ID, 'video_url_720', true );
$format_path_720 = wp_parse_url( $video_url_720, PHP_URL_PATH );
$format_720      = explode( '.', $format_path_720 );
$format_720      = end( $format_720 );

$video_url_1080   = get_post_meta( $post->ID, 'video_url_1080', true );
$format_path_1080 = wp_parse_url( $video_url_1080, PHP_URL_PATH );
$format_1080      = explode( '.', $format_path_1080 );
$format_1080      = end( $format_1080 );

$video_url_4k   = get_post_meta( $post->ID, 'video_url_4k', true );
$format_path_4k = wp_parse_url( $video_url_4k, PHP_URL_PATH );
$format_4k      = explode( '.', $format_path_4k );
$format_4k      = end( $format_4k );

// get domain name from url to prevent false positive (eg. bexvideos.com).
$video_domain = str_ireplace( 'www.', '', wp_parse_url( $video_url, PHP_URL_HOST ) );

$source_website = '';
if ( 'pornhub.com' === $video_domain ) {
	$source_website = 'pornhub';
}
if ( 'redtube.com' === $video_domain ) {
	$source_website = 'redtube';
}
if ( 'spankwire.com' === $video_domain ) {
	$source_website = 'spankwire';
}
if ( 'tube8.com' === $video_domain ) {
	$source_website = 'tube8';
}
if ( 'xhamster.com' === $video_domain ) {
	$source_website = 'xhamster';
}
if ( 'xvideos.com' === $video_domain ) {
	$source_website = 'xvideos';
}
if ( 'youporn.com' === $video_domain ) {
	$source_website = 'youporn';
}
if ( 'drive.google.com' === $video_domain ) {
	$source_website = 'google_drive';
}
if ( 'youtube.com' === $video_domain ) {
	$source_website = 'youtube';
}

switch ( $source_website ) {
	case 'pornhub':
		$source_id    = explode( '/', $video_url );
		$source_id    = str_replace( 'view_video.php?viewkey=', '', $source_id[3] );
		$video_player = '<iframe src="https://www.pornhub.com/embed/' . $source_id . '" frameborder="0" width="560" height="340" scrolling="no" allowfullscreen></iframe>';
		break;

	case 'redtube':
		$source_id    = explode( '/', $video_url );
		$source_id    = $source_id[3];
		$video_player = '<iframe src="https://embed.redtube.com/?id=' . $source_id . '&bgcolor=000000" frameborder="0" width="560" height="315" scrolling="no" allowfullscreen></iframe>';
		break;

	case 'spankwire':
		$source_id    = explode( '/', $video_url );
		$source_id    = str_replace( 'video', '', $source_id[4] );
		$video_player = '<iframe src="https://www.spankwire.com/EmbedPlayer.aspx?ArticleId=' . $source_id . '" frameborder="0" height="537" width="660" scrolling="no" name="spankwire_embed_video"></iframe>';
		break;

	case 'tube8':
		$exploded_url    = explode( '/', $video_url );
		$source_category = $exploded_url[3];
		$source_slug     = $exploded_url[4];
		$source_id       = $exploded_url[5];
		$video_player    = '<iframe src="https://www.tube8.com/embed/' . $source_category . '/' . $source_slug . '/' . $source_id . '" frameborder="0" width="640" height="360" scrolling="no" name="t8_embed_video"></iframe>';
		break;

	case 'xhamster':
		$source_id    = explode( '/', $video_url );
		$source_id    = explode( '-', $source_id[4] );
		$source_id    = end( $source_id );
		$video_player = '<iframe src="https://xhamster.com/xembed.php?video=' . $source_id . '" frameborder="0" width="640" height="360" scrolling="no"></iframe>';
		break;

	case 'xvideos':
		$source_id    = explode( '/', $video_url );
		$source_id    = str_replace( 'video', '', $source_id[3] );
		$video_player = '<iframe src="https://www.xvideos.com/embedframe/' . $source_id . '" frameborder="0" width="640" height="360" scrolling="no"></iframe>';
		break;

	case 'youporn':
		$source_id    = explode( '/', $video_url );
		$source_id    = $source_id[4];
		$source_slug  = $source_id[5];
		$video_player = '<iframe src="https://www.youporn.com/embed/' . $source_id . '/' . $source_slug . '" frameborder="0" width="640" height="360" scrolling="no"></iframe>';
		break;
	case 'google_drive':
		$video_url_gd = str_replace( 'view', 'preview', $video_url );
		$video_player = '<iframe src="' . $video_url_gd . '" frameborder="0" width="640" height="360" scrolling="no" allowfullscreen></iframe>';
		break;

	case 'youtube':
		$source_id    = explode( '/', $video_url );
		$source_id    = str_replace( 'watch?v=', '', $source_id[3] );
		$video_player = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $source_id . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		break;

	default:
		if ( ! empty( $video_url_240 ) || ! empty( $video_url_360 ) || ! empty( $video_url_480 ) || ! empty( $video_url_720 ) || ! empty( $video_url_1080 ) ) {
			$video_player = '<video id="wpst-video" class="video-js vjs-big-play-centered" controls preload="auto" width="640" height="264" poster="' . $poster . '">';
			if ( ! empty( $video_url_4k ) ) {
				$video_player .= '<source src="' . $video_url_4k . '" label="4k" title="4k" type="video/' . $format_4k . '" />';
			}
			if ( ! empty( $video_url_1080 ) ) {
				$video_player .= '<source src="' . $video_url_1080 . '" label="1080p" title="1080p" type="video/' . $format_1080 . '" />';
			}
			if ( ! empty( $video_url_720 ) ) {
				$video_player .= '<source src="' . $video_url_720 . '" label="720p" title="720p" type="video/' . $format_720 . '" />';
			}
			if ( ! empty( $video_url_480 ) ) {
				$video_player .= '<source src="' . $video_url_480 . '" label="480p" title="480p" type="video/' . $format_480 . '" />';
			}
			if ( ! empty( $video_url_360 ) ) {
				$video_player .= '<source src="' . $video_url_360 . '" label="360p" title="360p" type="video/' . $format_360 . '" />';
			}
			if ( ! empty( $video_url_240 ) ) {
				$video_player .= '<source src="' . $video_url_240 . '" label="240p" title="240p" type="video/' . $format_240 . '" />';
			}
			$video_player .= '</video>';

		} else {
			$video_player = '<video id="wpst-video" class="video-js vjs-big-play-centered" controls preload="auto" width="640" height="264" poster="' . $poster . '"><source src="' . $video_url . '" type="video/' . $format . '"></video>';
		}

		break;
}

// Embed code
$embed_code = get_post_meta( $post->ID, 'embed', true );
// Embed URL
if ( $embed_code != '' ) {
	$embed_url = '';
	preg_match( '/src=["\']([^"]+)["\']/', $embed_code, $match );
	$embed_url = $match[1];
}

// Video shortcode
$video_shortcode = get_post_meta( $post->ID, 'shortcode', true );

// Duration
$duration = get_post_meta( $post->ID, 'duration', true );

// Title
$title = get_the_title();

// Description
$desc = wp_strip_all_tags( get_the_content() );

// Author
$author = get_the_author();

$video_in_content = false; ?>

<div class="video-player-area
<?php
if ( xbox_get_field_value( 'wpst-options', 'sidebar-ad-desktop-1' ) != '' || xbox_get_field_value( 'wpst-options', 'sidebar-ad-desktop-2' ) != '' || xbox_get_field_value( 'wpst-options', 'sidebar-ad-desktop-3' ) != '' ) :
	?>
	with-sidebar-ads<?php endif; ?>">
	<div class="video-player">
		<meta itemprop="author" content="<?php echo $author; ?>" />
		<meta itemprop="name" content="<?php echo $title; ?>" />
		<?php if ( $desc != '' ) : ?>
			<meta itemprop="description" content="<?php echo $desc; ?>" />
		<?php else : ?>
			<meta itemprop="description" content="<?php echo $title; ?>" />
		<?php endif; ?>
		<meta itemprop="duration" content="<?php echo wpst_iso8601_duration( $duration ); ?>" />
		<meta itemprop="thumbnailUrl" content="<?php echo $thumb; ?>" />
		<?php if ( $video_url != '' ) : ?>
			<meta itemprop="contentURL" content="<?php echo $video_url; ?>" />
		<?php elseif ( $embed_code != '' ) : ?>
			<meta itemprop="embedURL" content="<?php echo $embed_url; ?>" />
		<?php endif; ?>
		<meta itemprop="uploadDate" content="<?php echo get_the_date( 'c' ); ?>" />

		<?php if ( $video_url != '' || $video_url_240 != '' || $video_url_360 != '' || $video_url_480 != '' || $video_url_720 != '' || $video_url_1080 != '' ) : ?>
			<div class="responsive-player">
				<?php echo $video_player; ?>
			</div>
		<?php elseif ( $embed_code != '' ) : ?>
			<div class="responsive-player">
				<?php echo htmlspecialchars_decode( $embed_code ); ?>
			</div>
		<?php elseif ( $video_shortcode != '' ) : ?>
			<div class="responsive-player">
				<?php echo do_shortcode( $video_shortcode ); ?>
			</div>
		<?php elseif ( $video_url == '' && $embed_code == '' && $video_shortcode == '' ) : ?>
			<?php
			$video_code = array();
			$is_youtube = false;
			if ( preg_match( '/\[video.+\]/', get_the_content(), $video_code ) ) {
				$video_in_content = '/\[video.+\]/';
			} elseif ( preg_match( '/<iframe.+<\/iframe>/', get_the_content(), $video_code ) ) {
				$video_in_content = '/<iframe.+<\/iframe>/';
			} elseif ( preg_match( '/<video.+<\/video>/', get_the_content(), $video_code ) ) {
				$video_in_content = '/<video.+<\/video>/';
			} elseif ( preg_match( '/<object.+<\/object>/', get_the_content(), $video_code ) ) {
				$video_in_content = '/<object.+<\/object>/';
			}elseif( preg_match("/https:\/\/www.youtube.com\/watch\?v=.+?\b/", get_the_content(), $video_code) ){
				$is_youtube = true;
				$source_id = explode('/', $video_code[0] );
				$source_id = str_replace('watch?v=', '', end($source_id));
				$video_in_content = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $source_id . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			}
			if ( $video_code ) { ?>
				<div class="responsive-player">
					<?php
					if( $is_youtube ){
						echo $video_in_content;
					}elseif( $video_in_content == "/\[video.+\]/" ){
						echo do_shortcode( $video_code[0] );
					}else{
						echo $video_code[0];
					}
					?>
				</div>
				<?php
			} ?>
		<?php endif; ?>

		<!-- Inside video player advertising -->
		<?php if ( $embed_code != '' || $video_url != '' || $video_url_240 != '' || $video_url_360 != '' || $video_url_480 != '' || $video_url_720 != '' || $video_url_1080 != '' || $video_url_4k != '' || $video_shortcode != '' || $video_in_content != false ) : ?>
			<?php
			$has_ctpl_inside_player_ad_zone_desktop = xbox_get_field_value( 'ctpl-options', 'inside-player-ad-zone-1-desktop' ) || xbox_get_field_value( 'ctpl-options', 'inside-player-ad-zone-2-desktop' );
			$has_wpst_inside_player_ad_zone_desktop = xbox_get_field_value( 'wpst-options', 'inside-player-ad-zone-1-desktop' ) || xbox_get_field_value( 'wpst-options', 'inside-player-ad-zone-2-desktop' );
			$is_ctpl_activated                      = is_plugin_active( 'clean-tube-player/clean-tube-player.php' );
			if ( ! wp_is_mobile() && $has_wpst_inside_player_ad_zone_desktop && ( ! $is_ctpl_activated || $is_ctpl_activated && ! $has_ctpl_inside_player_ad_zone_desktop ) ) :
				?>
				<div class="happy-inside-player">
					<div class="zone-1"><?php echo wpst_render_shortcodes( xbox_get_field_value( 'wpst-options', 'inside-player-ad-zone-1-desktop' ) ); ?></div>
					<div class="zone-2"><?php echo wpst_render_shortcodes( xbox_get_field_value( 'wpst-options', 'inside-player-ad-zone-2-desktop' ) ); ?></div>
					<button class="close close-text"><?php esc_html_e( 'Close Advertising', 'wpst' ); ?></button>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<?php if ( get_post_meta( $post->ID, 'unique_ad_under_player', true ) != '' ) : ?>
		<div class="happy-under-player">
			<?php echo get_post_meta( $post->ID, 'unique_ad_under_player', true ); ?>
		</div>
	<?php else : ?>
		<?php if ( xbox_get_field_value( 'wpst-options', 'under-player-ad-desktop' ) != '' || (wp_is_mobile() && xbox_get_field_value( 'wpst-options', 'under-player-ad-mobile' ) != '') ) : ?>
			<div class="happy-under-player">
				<?php if ( xbox_get_field_value( 'wpst-options', 'under-player-ad-desktop' ) != '' ) : ?>
					<div class="under-player-desktop">
						<?php echo wpst_render_shortcodes( xbox_get_field_value( 'wpst-options', 'under-player-ad-desktop' ) ); ?>
					</div>
				<?php endif; ?>
				<?php if ( wp_is_mobile() && xbox_get_field_value( 'wpst-options', 'under-player-ad-mobile' ) != '' ) : ?>
					<div class="under-player-mobile">
						<?php echo wpst_render_shortcodes( xbox_get_field_value( 'wpst-options', 'under-player-ad-mobile' ) ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<div class="video-infos">
		<div class="title-views">
			<?php the_title( '<h1 itemprop="name">', '</h1>' ); ?>
			<?php if ( xbox_get_field_value( 'wpst-options', 'enable-views-system' ) == 'on' ) : ?>
				<span class="views"><i class="fa fa-eye"></i> <?php echo intval( wpst_get_post_views( get_the_ID() ) ); ?></span>
			<?php endif; ?>
		</div>
		<?php
		if ( xbox_get_field_value( 'wpst-options', 'tracking-button-link' ) != '' ) {
			$tracking_url = xbox_get_field_value( 'wpst-options', 'tracking-button-link' );
		} else {
			$tracking_url = get_post_meta( $post->ID, 'tracking_url', true );
		}
		if ( $tracking_url != '' && xbox_get_field_value( 'wpst-options', 'display-tracking-button' ) == 'on' ) :
			?>
			<div class="tracking-btn">
				<a class="button" id="tracking-url" href="<?php echo $tracking_url; ?>" title="<?php the_title(); ?>" target="_blank"><i class="fa fa-<?php echo xbox_get_field_value( 'wpst-options', 'tracking-button-icon' ); ?>"></i>
																	 <?php
																		if ( xbox_get_field_value( 'wpst-options', 'tracking-button-text' ) == '' ) :
																			?>
																			<?php esc_html_e( 'Download complete video now!', 'wpst' ); ?>
																			<?php
else :
	?>
					<?php echo xbox_get_field_value( 'wpst-options', 'tracking-button-text' ); ?><?php endif; ?></a>
			</div>
		<?php endif; ?>
	</div>

	<div class="video-actions">
		<?php if ( xbox_get_field_value( 'wpst-options', 'enable-rating-system' ) == 'on' ) : ?>
			<div id="video-rate"><?php echo wpst_getPostLikeLink( get_the_ID() ); ?></div>
		<?php endif; ?>
		<?php if ( xbox_get_field_value( 'wpst-options', 'enable-video-share' ) == 'on' ) : ?>
			<div id="video-links">
				<a id="show-sharing-buttons" href="#!"><i class="fa fa-share-alt"></i> <?php esc_html_e( 'Share', 'wpst' ); ?></a>
				<?php /* <a href="#!"><i class="fa fa-flag"></i> <?php esc_html_e('Report', 'wpst'); ?></a> */ ?>
			</div>
		<?php endif; ?>
	</div>
	<?php if ( xbox_get_field_value( 'wpst-options', 'enable-video-share' ) == 'on' ) : ?>
		<div class="video-share">
			<span class="title"><?php esc_html_e( 'Share', 'wpst' ); ?></span>
			<div class="share-buttons">
				<?php get_template_part( 'template-parts/content', 'share-buttons' ); ?>
			</div>
			<div class="video-share-url">
				<textarea id="copyme" readonly="readonly"><?php the_permalink(); ?></textarea>
				<a id="clickme"><?php esc_html_e( 'Copy the link', 'wpst' ); ?></a>
				<textarea id="temptext"></textarea>
			</div>
			<div class="clear"></div>
		</div>
	<?php endif; ?>

	<?php if ( xbox_get_field_value( 'wpst-options', 'show-categories-video-about' ) == 'on' || xbox_get_field_value( 'wpst-options', 'show-tags-video-about' ) == 'on' ) : ?>
		<div class="video-tags">
			<?php wpst_cats_tags(); ?>
		</div>
	<?php endif; ?>

	<!-- Description -->
	<?php
	$content              = get_the_content();
		$video_in_content = false;
		$video_code       = array();
	if ( preg_match( '/\[video.+\]/', get_the_content(), $video_code ) ) {
		$video_in_content = '/\[video.+\]/';
	} elseif ( preg_match( '/<iframe.+<\/iframe>/', get_the_content(), $video_code ) ) {
		$video_in_content = '/<iframe.+<\/iframe>/';
	} elseif ( preg_match( '/<video.+<\/video>/', get_the_content(), $video_code ) ) {
		$video_in_content = '/<video.+<\/video>/';
	} elseif ( preg_match( '/<object.+<\/object>/', get_the_content(), $video_code ) ) {
		$video_in_content = '/<object.+<\/object>/';
	} elseif( preg_match("/https:\/\/www.youtube.com\/watch\?v=.+?\b/", get_the_content(), $video_code) ){
		$video_in_content = "/https:\/\/www.youtube.com\/watch\?v=.+?\b/";
	}
	if ( ! empty( $content ) && xbox_get_field_value( 'wpst-options', 'show-description-video-about' ) == 'on' ) :
		?>
		<div class="video-description">
			<div class="desc
			<?php
			if ( xbox_get_field_value( 'wpst-options', 'truncate-description' ) == 'on' ) : ?>
				more<?php endif; ?>">
			<?php
			$embed_code      = get_post_meta( $post->ID, 'embed', true );
			$video_url       = get_post_meta( $post->ID, 'video_url', true );
			$video_shortcode = get_post_meta( $post->ID, 'shortcode', true );
			if ( $video_in_content != false && ( $embed_code == '' && $video_shortcode == '' && $video_url == '' ) ) :
					$content = preg_replace( $video_in_content, '', get_the_content() );
				endif;
			echo apply_filters( 'the_content', $content ); ?>
			</div>
		</div>
	<?php endif; ?>

</div><!-- .video-player-area -->
