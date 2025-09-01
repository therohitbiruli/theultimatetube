<?php

if ( ! function_exists( 'wpst_get_video_duration' ) ) {
	/**
	 * Get video duration formatted H:i:s or i:s.
	 *
	 * @return string|bool The formatted date, false if duration <= 0.
	 */
	function wpst_get_video_duration() {
		global $post;
		$duration = intval( get_post_meta( $post->ID, 'duration', true ) );
		if ( $duration >= 3600 ) {
			return gmdate( 'H:i:s', $duration );
		}
		if ( $duration > 0 ) {
			return gmdate( 'i:s', $duration );
		}
		return false;
	}
}


if ( ! function_exists( 'wpst_get_post_views' ) ) {
	/**
	 * Get post views given a post id.
	 *
	 * @param mixed $post_id The post ID to get views from.
	 *
	 * @return int The number of views.
	 */
	function wpst_get_post_views( $post_id ) {
		return intval( get_post_meta( $post_id, 'post_views_count', true ) );
	}
}


if ( ! function_exists( 'wpst_iso8601_duration' ) ) {
	/**
	 * Get duration formatted in ISO 8601, given a duration in seconds.
	 *
	 * @param mixed $seconds The duration in seconds.
	 *
	 * @return string The duration formatted in ISO 8601.
	 */
	function wpst_iso8601_duration( $seconds ) {
		$seconds = (int) $seconds;
		$days    = floor( $seconds / 86400 );
		$seconds = $seconds % 86400;
		$hours   = floor( $seconds / 3600 );
		$seconds = $seconds % 3600;
		$minutes = floor( $seconds / 60 );
		$seconds = $seconds % 60;
		return sprintf( 'P%dDT%dH%dM%dS', $days, $hours, $minutes, $seconds );
	}
}

if ( ! function_exists( 'wpst_get_multithumbs' ) ) {
	/**
	 * Get list of thumbs separated with commas, given a post id.
	 * - Try to get images from thumb post meta.
	 * - Then try to get images from attached media.
	 * - Force https when SSL is detected.
	 *
	 * @param mixed $post_id The post ID to get thumbs from.
	 *
	 * @return string The list of thumbs separated with commas.
	 */
	function wpst_get_multithumbs( $post_id ) {
		$thumbs = get_post_meta( $post_id, 'thumbs', false );
		if ( empty( $thumbs ) ) {
			$thumbs = wpst_get_thumbs_from_attached_media( $post_id );
		}
		return wpst_force_https( implode( ',', $thumbs ) );
	}
}

if ( ! function_exists( 'wpst_force_https' ) ) {
	/**
	 * Force https on a given string if SSL is detected.
	 *
	 * @param string $string The string to force https on.
	 *
	 * @return string The same string with https if SSL is detected.
	 */
	function wpst_force_https( $string ) {
		if ( is_ssl() ) {
			return str_replace( 'http://', 'https://', $string );
		}
		return $string;
	}
}

if ( ! function_exists( 'wpst_get_thumbs_from_attached_media' ) ) {
	/**
	 * Get an array with attached images, given a post id.
	 *
	 * @param mixed $post_id The post ID to get attached images from.
	 *
	 * @return array All the attached images urls or an empty array if no attached image found.
	 */
	function wpst_get_thumbs_from_attached_media( $post_id ) {
		$thumbs      = array();
		$attachments = get_attached_media( 'image', $post_id );
		foreach ( (array) $attachments as $attachment ) {
			$thumbs_array = wp_get_attachment_image_src( $attachment->ID, 'wpst_thumb_medium' );
			$thumbs[]     = $thumbs_array[0];
		}
		return $thumbs;
	}
}

if ( ! function_exists( 'wpst_cats_tags' ) ) {
	/**
	 * Print list of current post categories, tags and actors.
	 *
	 * @return void.
	 */
	function wpst_cats_tags() {
		global $post;
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$postcats = get_the_category();
			$posttags = get_the_tags();
			$actors   = wp_get_post_terms( $post->ID, 'actors' );
			if ( $postcats || $posttags || $actors ) {
				echo '<div class="tags-list">';
				if ( ! empty( $postcats ) && 'on' === xbox_get_field_value( 'wpst-options', 'show-categories-video-about' ) ) {
					foreach ( (array) $postcats as $cat ) {
						echo '<a href="' . get_category_link( $cat->term_id ) . '" class="label" title="' . $cat->name . '"><i class="fa fa-folder"></i> ' . $cat->name . '</a>';
					}
				}
				if ( ! empty( $actors ) && 'on' === xbox_get_field_value( 'wpst-options', 'show-actors-video-about' ) ) {
					foreach ( (array) $actors as $actor ) {
						echo '<a href="' . get_term_link( $actor->term_id ) . '" class="label" title="' . $actor->name . '"><i class="fa fa-star"></i> ' . $actor->name . '</a>';
					}
				}
				if ( ! empty( $posttags ) && 'on' === xbox_get_field_value( 'wpst-options', 'show-tags-video-about' ) ) {
					foreach ( (array) $posttags as $tag ) {
						echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="label" title="' . $tag->name . '"><i class="fa fa-tag"></i> ' . $tag->name . '</a>';
					}
				}
				echo '</div>';
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wpst' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}
	}
}

