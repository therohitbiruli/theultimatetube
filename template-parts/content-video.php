<?php
//Autoplay
if( xbox_get_field_value( 'wpst-options', 'autoplay-video-player' ) == 'on' ) {
    $autoplay = 'autoplay';
}else{
    $autoplay = '';
}
//Thumbnail
$thumb = get_post_meta($post->ID, 'thumb', true);
if ( has_post_thumbnail() ) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id, 'wpst_thumb_large', true);
    $poster = $thumb_url[0];
}else{
    $poster = $thumb;
}
//Video URL
/*$video_url = get_post_meta($post->ID, 'video_url', true);
$format = explode( '.',  $video_url);
$format = $format[ count( $format ) - 1];*/ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
	
	<div class="entry-content">
		<?php get_template_part( 'template-parts/content', 'video-player' ); ?>
		<?php if( wp_is_mobile() && xbox_get_field_value( 'wpst-options', 'above-related-videos-ad-mobile' ) != '' ) : ?>
			<div class="happy-related-videos-mobile">
				<?php echo wpst_render_shortcodes(xbox_get_field_value( 'wpst-options', 'above-related-videos-ad-mobile' )); ?>
			</div>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/content', 'sidebar-ads' ); ?>
	</div>
	
	<?php if( xbox_get_field_value( 'wpst-options', 'display-related-videos' ) == 'on' ) :
		get_template_part( 'template-parts/content', 'related' );
	endif; ?>

	<?php // If comments are open or we have at least one comment, load up the comment template.
	if( xbox_get_field_value( 'wpst-options', 'enable-comments' ) == 'on' ) {
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	} ?>

</article><!-- #post-## -->