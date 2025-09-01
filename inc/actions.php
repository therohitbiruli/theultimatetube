<?php

function wpst_pre_get_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( wp_is_mobile() ) {
		$query->set( 'posts_per_page', xbox_get_field_value( 'wpst-options', 'videos-per-page-mobile' ) );
	} else {
		if ( is_home() && ! isset( $_GET['filter'] ) ) {
			$query->set( 'posts_per_page', xbox_get_field_value( 'wpst-options', 'videos-number-homepage' ) );
		} else {
			$query->set( 'posts_per_page', xbox_get_field_value( 'wpst-options', 'videos-per-page' ) );
		}
	}

	$filter = '';
	if ( is_home() ) {
		$filter = xbox_get_field_value( 'wpst-options', 'show-videos-homepage' );
	}

	if ( isset( $_GET['filter'] ) ) {
		$filter = $_GET['filter'];
	}

	switch ( $filter ) {
		case 'latest':
			$query->set( 'orderby', 'date' );
			$query->set( 'order', 'DESC' );
			break;
		case 'most-viewed':
			$query->set( 'meta_key', 'post_views_count' );
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'DESC' );
			break;
		case 'longest':
			$query->set( 'meta_key', 'duration' );
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'DESC' );
			break;
		case 'popular':
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'DESC' );
			$query->set(
				'meta_query',
				array(
					'relation' => 'OR',
					array(
						'key'     => 'rate',
						'compare' => 'NOT EXISTS',
					),
					array(
						'key'     => 'rate',
						'compare' => 'EXISTS',
					),
				)
			);
			break;
		case 'random':
			$query->set( 'orderby', 'rand' );
			$query->set( 'order', 'DESC' );
			break;
		default;
	}

	return;

}
add_action( 'pre_get_posts', 'wpst_pre_get_posts', 1 );


function get_first_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();

	$output    = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches );
	$first_img = $matches[1][0];

	return '<div class="photo-bg" style="background: url(' . $first_img . ') no-repeat; background-size: cover;">';
}


// Filter wp_nav_menu() to add additional links and other output
function wpst_new_nav_menu_items( $items, $args ) {
	if ( $args->theme_location == 'wpst-main-menu' ) {
		$homelink = '<li class="menu-item" id="atmosphere"><i class="fa fa-sun-o"></i> <i class="fa fa-caret-down"></i>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="#"><i class="fa fa-sun-o"></i> Day Mode</a></li>
                            <li class="menu-item"><a href="#"><i class="fa fa-moon-o"></i> Night Mode</a></li>
                        </ul>
                    </li>';
		// add the home link to the end of the menu
		$items = $homelink . $items;
	}
	return $items;
}
// add_filter( 'wp_nav_menu_items', 'wpst_new_nav_menu_items', 10, 2 );
