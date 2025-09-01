<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'WPSCORE-tabs', 'wpst_add_admin_navigation' );

function wpst_add_admin_navigation( $nav ){
	eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'add_tab' ) );
	if( isset($wpst_nav) && is_array($wpst_nav) ){
		$nav[1] = $wpst_nav;
	}	
	return $nav;
}

add_filter( 'wpst-options', 'wpst_options_page' );

function wpst_options_page( $options_table ) {
	$output  = '<div id="wp-script">
					<div class="content-tabs">';

	$output .= WPSCORE()->display_logo( false );
	$output .= WPSCORE()->display_tabs( false );

	$output .= '<div class="tab-content tab-options">';

	$output .= $options_table;

	$output .= '</div>';
	$output .= '</div>';

	$output .= '<div class="modal fade" id="create_video_submit_page_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">' . esc_html__('Create Video Submit page', 'wpst') . '</h4>
						</div>
						<div class="modal-body">' . esc_html__('This action will create a "Submit a Video" page in your admin.', 'wpst') . '</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">' . esc_html__('Close', 'wpst') . '</button>
						<button type="button" class="btn btn-primary">' . esc_html__('Confirm', 'wpst') . '</button>
						</div>
					</div>
					</div>
				</div>';

	$output .= '<div class="modal fade" id="create_my_profile_page_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">' . esc_html__('Create Profile page', 'wpst') . '</h4>
						</div>
						<div class="modal-body">' . esc_html__('This action will create a "My profile" page in your admin.', 'wpst') . '</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">' . esc_html__('Close', 'wpst') . '</button>
						<button type="button" class="btn btn-primary">' . esc_html__('Confirm', 'wpst') . '</button>
						</div>
					</div>
					</div>
				</div>';

	$output .= '<div class="modal fade" id="create_blog_page_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">' . esc_html__('Create Blog page', 'wpst') . '</h4>
						</div>
						<div class="modal-body">' . esc_html__('This action will create a "Blog" page in your admin.', 'wpst') . '</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">' . esc_html__('Close', 'wpst') . '</button>
						<button type="button" class="btn btn-primary">' . esc_html__('Confirm', 'wpst') . '</button>
						</div>
					</div>
					</div>
				</div>';

	$output .= '<div class="modal fade" id="create_categories_page_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">' . esc_html__('Create Categories page', 'wpst') . '</h4>
						</div>
						<div class="modal-body">' . esc_html__('This action will create an illustrated categories page in your admin.', 'wpst') . '</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">' . esc_html__('Close', 'wpst') . '</button>
						<button type="button" class="btn btn-primary">' . esc_html__('Confirm', 'wpst') . '</button>
						</div>
					</div>
					</div>
				</div>';

	$output .= '<div class="modal fade" id="create_tags_page_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">' . esc_html__('Create Tags page', 'wpst') . '</h4>
						</div>
						<div class="modal-body">' . esc_html__('This action will create a tags list page in your admin.', 'wpst') . '</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">' . esc_html__('Close', 'wpst') . '</button>
						<button type="button" class="btn btn-primary">' . esc_html__('Confirm', 'wpst') . '</button>
						</div>
					</div>
					</div>
				</div>';

	$output .= '<div class="modal fade" id="create_actors_page_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">' . esc_html__('Create Actors page', 'wpst') . '</h4>
						</div>
						<div class="modal-body">' . esc_html__('This action will create an actors list page in your admin.', 'wpst') . '</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">' . esc_html__('Close', 'wpst') . '</button>
						<button type="button" class="btn btn-primary">' . esc_html__('Confirm', 'wpst') . '</button>
						</div>
					</div>
					</div>
				</div>';

	$output .= '<div class="modal fade" id="create_menu_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">' . esc_html__('Create Menu', 'wpst') . '</h4>
						</div>
						<div class="modal-body">' . esc_html__('This action will create a menu in your admin.', 'wpst') . '</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">' . esc_html__('Close', 'wpst') . '</button>
						<button type="button" class="btn btn-primary">' . esc_html__('Confirm', 'wpst') . '</button>
						</div>
					</div>
					</div>
				</div>';

	$output .= '<div class="modal fade" id="create_widgets_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">' . esc_html__('Create Widgets', 'wpst') . '</h4>
						</div>
						<div class="modal-body">' . esc_html__('This action will integrate video block widgets in your admin.', 'wpst') . '</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">' . esc_html__('Close', 'wpst') . '</button>
						<button type="button" class="btn btn-primary">' . esc_html__('Confirm', 'wpst') . '</button>
						</div>
					</div>
					</div>
				</div>';

	$output .= '</div>';
	$output .= '</div>';

	$output .= WPSCORE()->display_footer( false );
	$output .= '</div>';

	return $output;
}

add_action( 'xbox_init', 'wpst_options');
function wpst_options(){
	$options = array(
		'id' => 'wpst-options',
		'title' => esc_html__('Theme Options', 'wpst'),
		'menu_title' => esc_html__('Theme Options', 'wpst'),
		'skin' => 'pink',
		'layout' => 'boxed',
		'header' => array(
			'name' => '<img src="https://www.wp-script.com/wp-content/uploads/wps-img/products/themes/icons/' . strtolower( wp_get_theme()->get( 'Name' ) ) . '-icon.svg" width="20"> ' . wp_get_theme()->get( 'Name' )
		),
		'capability' => 'edit_published_posts'
	);

	$xbox = xbox_new_admin_page( $options );

	$xbox->add_main_tab( array(
		'name' => esc_html__('Main tab', 'wpst'),
		'id' => 'main-tab',
		'items' => array(
			'general' => '<i class="xbox-icon xbox-icon-gear"></i>' . esc_html__('General', 'wpst'),
			'visual-options' => '<i class="xbox-icon xbox-icon-desktop"></i>' . esc_html__('Visual options', 'wpst'),
			'logo' => '<i class="xbox-icon xbox-icon-image"></i>' . esc_html__('Logo & Favicon', 'wpst'),
			'left-sidebar' => '<i class="xbox-icon xbox-icon-list-alt"></i>' . esc_html__('Left	Sidebar', 'wpst'),
			'content' => '<i class="xbox-icon xbox-icon-th-large"></i>' . esc_html__('Content', 'wpst'),
			// 'video-player' => '<i class="xbox-icon xbox-icon-youtube-play"></i>' . esc_html__('Video Player', 'wpst'),			
			'footer' => '<i class="xbox-icon xbox-icon-arrow-down"></i>' . esc_html__('Footer', 'wpst'),
			'membership' => '<i class="xbox-icon xbox-icon-user"></i>' . esc_html__('Membership', 'wpst'),
			'advertising' => '<i class="xbox-icon xbox-icon-money"></i>' . esc_html__('Advertising', 'wpst'),
			'code' => '<i class="xbox-icon xbox-icon-pencil"></i>' . esc_html__('Code', 'wpst'),
			'tools' => '<i class="xbox-icon xbox-icon-wrench"></i>' . esc_html__('Tools', 'wpst'),
			'mobile' => '<i class="xbox-icon xbox-icon-mobile"></i>' . esc_html__('Mobile', 'wpst')
			//'import' => '<i class="xbox-icon xbox-icon-database"></i>' . esc_html__('Import/Export', 'wpst')
		)
	));
		/*******************/
		/***** GENERAL *****/
		/*******************/
		$xbox->open_tab_item('general');			
			$xbox->add_field(array(					
				'id' => 'videos-per-page',
				'name' => esc_html__('Number of videos per page', 'wpst'),
				'type' => 'number',
				'default' => 20,
				'grid' => '2-of-8',
				'options' => array(
					'unit' => esc_html__('videos / page', 'wpst')
					),				
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/videos-per-page.jpg">'
			));			
			$xbox->add_field(array(
				'id' => 'show-videos-homepage',
				'name' => esc_html__('Show', 'wpst'),
				'type' => 'radio',
				'default' => 'latest',
				'items' => array(
					'latest' => esc_html__('Latest videos', 'wpst'),
					'most-viewed' => esc_html__('Most viewed videos', 'wpst'),
					'longest' => esc_html__('Longest videos', 'wpst'),
					'popular' => esc_html__('Popular videos', 'wpst'),
					'random' => esc_html__('Random videos', 'wpst')
				)
			));
			$xbox->add_field(array(
				'name' => esc_html__('Aspect ratios of thumbnails ', 'wpst'),
				'id' => 'thumbnails-ratio',
				'type' => 'radio',
				'desc' => esc_html__('Choose the aspect ratios for all thumbnails.', 'wpst'),
				'default' => '16/9',
				'items' => array(
					'16/9' => '16/9',
					'4/3' => '4/3',
				)
			));
			$xbox->add_field(array(
				'name' => esc_html__('Main thumbnail quality', 'wpst'),
				'id' => 'main-thumbnail-quality',
				'type' => 'radio',
				'desc' => esc_html__('Basic = High compression, Normal = Medium compression, Fine = Low compression', 'wpst'),
				'default' => 'wpst_thumb_medium',
				'items' => array(
					'wpst_thumb_small' => 'Basic',
					'wpst_thumb_medium' => 'Normal',
					'wpst_thumb_large' => 'Fine'
				)
			));
			$xbox->add_field(array(
				'name' => esc_html__('Enable thumbnails rotation', 'wpst'),
				'id' => 'enable-thumbnails-rotation',
				'type' => 'switcher',
				'desc' => esc_html__('Enable thumbnails rotation to see a preview of the video on mouseover.', 'wpst'),
				'default' => 'on'
			));	
			$xbox->add_field(array(
				'name' => esc_html__('Enable views system', 'wpst'),
				'id' => 'enable-views-system',
				'type' => 'switcher',
				'desc' => esc_html__('Display number of views on thumbnails, under the video player and add a "Most viewed videos" filter.', 'wpst'),
				'default' => 'on'
			));
			$xbox->add_field(array(
				'name' => esc_html__('Enable duration system', 'wpst'),
				'id' => 'enable-duration-system',
				'type' => 'switcher',
				'desc' => esc_html__('Display duration on thumbnails, and add a "Longest videos" filter.', 'wpst'),
				'default' => 'on'
			));
			$xbox->add_field(array(
				'name' => esc_html__('Enable rating system', 'wpst'),
				'id' => 'enable-rating-system',
				'type' => 'switcher',
				'desc' => esc_html__('Display a rating bar with percentage under thumbnails, a rating system under the video player, and add a "Popular videos" filter.', 'wpst'),
				'default' => 'on'
			));
			$xbox->add_field(array(
				'name' => esc_html__('Enable comments', 'wpst'),
				'id' => 'enable-comments',
				'type' => 'switcher',
				'desc' => esc_html__('Display a comments section in your single video pages.', 'wpst'),
				'default' => 'on'
			));
		$xbox->close_tab_item('general');

		/**************************/
		/***** VISUAL OPTIONS *****/
		/**************************/
		$xbox->open_tab_item('visual-options');			
			$xbox->add_field(array(
				'id' => 'main-color',
				'name' => esc_html__('Main color', 'wpst'),
				'type' => 'colorpicker',
				'default' => '#FF3565',
				'grid' => '2-of-8'
			));	
			$xbox->add_field(array(
				'name' => esc_html__('Custom background', 'wpst'),
				'id' => 'custom-background',
				'type' => 'switcher',
				'default' => 'off'
			));
			/* If on */
			$xbox->open_mixed_field(array('id'=> 'displayed-when:switch:custom-background:on:background-settings', 'name' => esc_html__('Background settings', 'wpst')));
				$xbox->add_field(array(
					'name' => esc_html__('Image', 'wpst'),
					'id' => 'background-image',
					'type' => 'file',
					'grid' => '2-of-8',
					'options' => array(
						'preview_size' => array( 'width' => '37px', 'height' => 'auto' ),
					)
				));
				$xbox->add_field(array(
					'name' => esc_html__('Color', 'wpst'),
					'id' => 'background-color',
					'type' => 'colorpicker',
					'default' => '#181818',
					'grid' => '2-of-8'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Repeat', 'wpst'),
					'id' => 'background-repeat',
					'type' => 'select',
					'default' => 'repeat',
					'items' => array(
						'repeat' => 'Yes',
						'no-repeat' => 'No',
					),
					'grid' => '2-of-8'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Attachment', 'wpst'),
					'id' => 'background-attachment',
					'type' => 'select',
					'default' => 'fixed',
					'items' => array(
						'fixed' => 'Fixed',
						'scroll' => 'Scroll'
					),
					'grid' => '2-of-8'
				));
			$xbox->close_mixed_field();
		$xbox->close_tab_item('visual-options');

		/**************************/
		/***** LOGO & FAVICON *****/
		/**************************/
		$xbox->open_tab_item('logo');

			$xbox->add_field( array(
				'id' => 'use-logo-image',
				'name' => esc_html__('Use logo image', 'wpst'),
				'type' => 'switcher',
				'default' => 'off'
			));		
			
			/***** If icon-text-logo *****/
			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:use-logo-image:off:icon-logo', 'name' => esc_html__('Icon logo settings', 'wpst')));
				$xbox->add_field( array(
					'name' => esc_html__('Icon logo', 'wpst'),
					'id' => 'icon-logo',
					'type' => 'select',
					'items' => XboxItems::icons(),
					'options' => array(
						'search' => true,
					),
					'default' => 'play-circle',
					'grid' => '2-of-8'
				));				
			$xbox->close_mixed_field();						

			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:use-logo-image:off:text-logo', 'name' => esc_html__('Text logo settings', 'wpst')));
				$xbox->add_field(array(
					'id' => 'text-logo',
					'name' => esc_html__('Text logo', 'wpst'),
					'type' => 'text',
					'grid' => '2-of-8'
				));		
				$xbox->add_field( array(
					'id' => 'logo-font-family',
					'name' => esc_html__('Font family', 'wpst'),
					'type' => 'select',
					'default' => 'Open Sans',
					'items' => array(
						'Google Fonts' => XboxItems::google_fonts(),
						'Web Safe Fonts' => XboxItems::web_safe_fonts()
					),
					'options' => array(
						'sort' => 'asc',
						'search' => true,
					),
					'grid' => '2-of-8'
				));
				$xbox->add_field(array(
					'id' => 'logo-font-size',
					'name' => esc_html__('Font size', 'wpst'),
					'type' => 'number',
					'default' => 36,
					'grid' => '2-of-8',
					'options' => array(
						'unit' => 'px'
					)
				));
			$xbox->close_mixed_field();

			/***** Else image-logo *****/
			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:use-logo-image:on:image-logo-file' ,'name' => esc_html__('Image logo file', 'wpst')));
				$xbox->add_field(array(
					'id' => 'image-logo-file',
					'name' => esc_html__('Image logo', 'wpst'),
					'type' => 'file',
					'grid' => '3-of-6',
					'options' => array(
						'preview_size' => array( 'width' => '100px', 'height' => 'auto' ),
					)
				));
			$xbox->close_mixed_field();
	
			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:use-logo-image:on:logo-max-width' ,'name' => esc_html__('Image logo settings', 'wpst')));
				$xbox->add_field(array(
					'name' => esc_html__('Max width', 'wpst'),
					'id' => 'logo-max-width',
					'type' => 'number',
					'default' => 300,
					'grid' => '2-of-8',
					'attributes' => array(
						'min' => 0,
						'max' => 350,
						'step' => 1,
						'precision' => 0,
					)
				));
				$xbox->add_field(array(
					'name' => esc_html__('Max height', 'wpst'),
					'id' => 'logo-max-height',
					'type' => 'number',
					'default' => 120,
					'grid' => '2-of-8',
					'attributes' => array(
						'min' => 0,
						'max' => 120,
						'step' => 1,
						'precision' => 0,
					)
				));
				$xbox->add_field(array(
					'name' => esc_html__('Margin top', 'wpst'),
					'id' => 'logo-margin-top',
					'type' => 'number',
					'default' => 0,
					'grid' => '2-of-8'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Margin left', 'wpst'),
					'id' => 'logo-margin-left',
					'type' => 'number',
					'default' => 0,
					'grid' => '2-of-8 last'
				));
			$xbox->close_mixed_field();

			$xbox->add_field(array(
				'name' => esc_html__('Show text slogan', 'wpst'),
				'id' => 'show-text-slogan',
				'type' => 'switcher',
				'default' => 'off'
			));	

			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:show-text-slogan:on:text-slogan', 'name' => esc_html__('Text slogan', 'wpst')));			
				$xbox->add_field(array(
					'id' => 'text-slogan',
					'name' => esc_html__('Text slogan', 'wpst'),
					'type' => 'text',
					'grid' => '3-of-6'
				));
			$xbox->close_mixed_field();

			$xbox->add_field( array(
				'id' => 'favicon',
				'name' => esc_html__('Favicon', 'wpst'),
				'type' => 'file',
				'grid' => '3-of-6',
				'options' => array(
					'preview_size' => array( 'width' => '37px', 'height' => 'auto' ),
				)
			));		
		$xbox->close_tab_item('logo');

		/************************/
		/***** LEFT SIDEBAR *****/
		/************************/
		$xbox->open_tab_item('left-sidebar');			
			$xbox->add_field( array(
				'id' => 'display-left-sidebar',
				'name' => esc_html__('Display left sidebar', 'wpst'),
				'type' => 'switcher',
				'default' => 'on'
			));	
			
			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:display-left-sidebar:on:left-sidebar-settings', 'name' => esc_html__('Left sidebar settings', 'wpst')));
				$xbox->add_field(array(
					'name' => esc_html__('Show filters', 'wpst'),
					'id' => 'show-aside-filters',
					'type' => 'switcher',
					'default' => 'on',
					'grid' => '8-of-8 last'
				));

				$xbox->add_field(array(
					'name' => esc_html__('Show categories', 'wpst'),
					'id' => 'show-aside-categories',
					'type' => 'switcher',
					'default' => 'on',
					'grid' => '8-of-8 last'
				));
				// $xbox->open_mixed_field(array('id' => 'displayed-when:switch:show-aside-categories:on:aside-categories', 'name' => esc_html__('Categories settings', 'wpst')));
					$xbox->add_field(array(
						'id' => 'aside-categories-title',
						'name' => esc_html__('Categories title', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8',
						'default' => esc_html__('Categories', 'wpst')
					));
					$xbox->add_field(array(
						'name' => esc_html__('Categories number', 'wpst'),
						'id' => 'aside-categories-number',
						'type' => 'number',
						'default' => 10,
						'grid' => '2-of-8',
						'desc' => esc_html__('Number of categories displayed in the sidebar.', 'wpst'),
						'attributes' => array(
							'min' => 1,
							'step' => 1
						),
						'options' => array(
							'show_unit' => false,
						)
					));
					$xbox->add_field(array(
						'id' => 'aside-categories-link',
						'name' => esc_html__('"All categories" link', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8',
						'default' => get_home_url() . '/categories',
						'desc' => sprintf(__('For example: %s', 'wpst'), get_home_url() . '/categories')
					));
					$xbox->add_field(array(
						'id' => 'aside-categories-link-text',
						'name' => esc_html__('"All categories" link text', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8 last',
						'default' => esc_html__('All categories', 'wpst'),
						'desc' => esc_html__('The anchor of the "All categories" link', 'wpst')
					));
				// $xbox->close_mixed_field();
			
				$xbox->add_field(array(
					'name' => esc_html__('Show tags', 'wpst'),
					'id' => 'show-aside-tags',
					'type' => 'switcher',
					'default' => 'on',
					'grid' => '8-of-8 last'
				));
				// $xbox->open_mixed_field(array('id' => 'displayed-when:switch:show-aside-tags:on:aside-tags', 'name' => esc_html__('Tags settings', 'wpst')));
					$xbox->add_field(array(
						'id' => 'aside-tags-title',
						'name' => esc_html__('Tags title', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8',
						'default' => esc_html__('Tags', 'wpst')
					));
					$xbox->add_field(array(
						'name' => esc_html__('Tags number', 'wpst'),
						'id' => 'aside-tags-number',
						'type' => 'number',
						'default' => 10,
						'grid' => '2-of-8',
						'desc' => esc_html__('Number of tags displayed in the sidebar.', 'wpst'),
						'attributes' => array(
							'min' => 1,
							'step' => 1
						),
						'options' => array(
							'show_unit' => false,
						)
					));
					$xbox->add_field(array(
						'id' => 'aside-tags-link',
						'name' => esc_html__('"All tags" link', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8',
						'default' => get_home_url() . '/tags',
						'desc' => sprintf(__('For example: %s', 'wpst'), get_home_url() . '/tags')
					));
					$xbox->add_field(array(
						'id' => 'aside-tags-link-text',
						'name' => esc_html__('"All tags" link text', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8 last',
						'default' => esc_html__('All tags', 'wpst'),
						'desc' => esc_html__('The anchor of the "All tags" link', 'wpst')
					));
				// $xbox->close_mixed_field();


				$xbox->add_field(array(
					'name' => esc_html__('Show actors', 'wpst'),
					'id' => 'show-aside-actors',
					'type' => 'switcher',
					'default' => 'on',
					'grid' => '8-of-8 last'
				));
				// $xbox->open_mixed_field(array('id' => 'displayed-when:switch:show-aside-actors:on:aside-actors', 'name' => esc_html__('Actors settings', 'wpst')));
					$xbox->add_field(array(
						'id' => 'aside-actors-title',
						'name' => esc_html__('Actors title', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8',
						'default' => esc_html__('Actors', 'wpst')
					));
					$xbox->add_field(array(
						'name' => esc_html__('Actors number', 'wpst'),
						'id' => 'aside-actors-number',
						'type' => 'number',
						'default' => 10,
						'grid' => '2-of-8',
						'desc' => esc_html__('Number of actors displayed in the sidebar.', 'wpst'),
						'attributes' => array(
							'min' => 1,
							'step' => 1
						),
						'options' => array(
							'show_unit' => false,
						)
					));
					$xbox->add_field(array(
						'id' => 'aside-actors-link',
						'name' => esc_html__('"All actors" link', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8',
						'default' => get_home_url() . '/actors',
						'desc' => sprintf(__('For example: %s', 'wpst'), get_home_url() . '/actors')
					));
					$xbox->add_field(array(
						'id' => 'aside-actors-link-text',
						'name' => esc_html__('"All actors" link text', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8 last',
						'default' => esc_html__('All actors', 'wpst'),
						'desc' => esc_html__('The anchor of the "All actors" link', 'wpst')
					));
				// $xbox->close_mixed_field();
			$xbox->close_mixed_field();
		$xbox->close_tab_item('left-sidebar');

		/*******************/
		/***** CONTENT *****/
		/*******************/
		$xbox->open_tab_item('content');
			$xbox->add_tab( array(
				'name' => esc_html__('Content tabs', 'wpst'),
				'id' => 'content-tabs',
				'items' => array(
					'content-homepage' => '<i class="xbox-icon xbox-icon-home"></i>' . esc_html__('Homepage', 'wpst'),
					'content-video-page' => '<i class="xbox-icon xbox-icon-play"></i>' . esc_html__('Video single post', 'wpst'),
					'content-categories-page' => '<i class="xbox-icon xbox-icon-folder"></i>' . esc_html__('Categories', 'wpst'),
					'content-tags-page' => '<i class="xbox-icon xbox-icon-tag"></i>' . esc_html__('Tags', 'wpst'),
					'content-actors-page' => '<i class="xbox-icon xbox-icon-users"></i>' . esc_html__('Actors', 'wpst')
					
				)
			));
			$xbox->open_tab_item('content-homepage');
				$xbox->add_field(array(					
					'id' => 'videos-number-homepage',
					'name' => esc_html__('Number of videos', 'wpst'),
					'type' => 'number',
					'default' => 30,
					'grid' => '2-of-8',
					'options' => array(
						'unit' => esc_html__('videos', 'wpst')
					)
				));
				$xbox->add_field(array(
					'name' => esc_html__('Display video listing advertising', 'wpst'),
					'id' => 'display-video-listing-ad-homepage',
					'type' => 'switcher',
					'default' => 'on',
					'grid' => '2-of-8',
					'desc' => esc_html__('Display or not the advertising block on the homepage.', 'wpst')
				));
				$xbox->add_field(array(
					'name' => esc_html__('Title', 'wpst'),
					'id' => 'homepage-title',
					'type' => 'text',
					'grid' => '3-of-6',
					'desc' => 'Enter a title (h1) to improve your SEO.',				
				));					
				$xbox->add_field(array(
					'name' => esc_html__('Description', 'wpst'),
					'id' => 'seo-footer-text',
					'type' => 'textarea',
					'grid' => '3-of-6',
					'desc' => 'Enter a description of your site to improve your SEO.',				
				));		
				$xbox->add_field(array(
					'name' => esc_html__('Title and description position', 'wpst'),
					'id' => 'homepage-title-desc-position',
					'type' => 'radio',
					'desc' => esc_html__('Choose if you want to display the title and description at the top or the bottom of your homepage.', 'wpst'),
					'default' => 'bottom',
					'items' => array(
						'top' => 'Top',
						'bottom' => 'Bottom'
					)
				));
				$xbox->add_field(array(
					'id'   => 'video-block-homepage',
					'name' => esc_html__('Video blocks', 'wpst'),
					'type' => 'title',
					'desc' => sprintf(__('<a href="%s">Click here</a> to use video blocks above the video listing.', 'wpst'), get_admin_url() . 'widgets.php')
				));				
			$xbox->close_tab_item('content-homepage');

			$xbox->open_tab_item('content-video-page');
				$xbox->add_field(array(
					'name' => esc_html__('Display tracking button', 'wpst'),
					'id' => 'display-tracking-button',
					'type' => 'switcher',
					'default' => 'on',
					'grid' => '2-of-8',
					'desc' => esc_html__('Display a button with your tracking link under the video player.', 'wpst')
				));

				$xbox->open_mixed_field(array('id' => 'displayed-when:switch:display-tracking-button:on:tracking-button-settings', 'name' => esc_html__('Tracking button settings', 'wpst')));
					
					$xbox->add_field( array(
						'name' => esc_html__('Icon button', 'wpst'),
						'id' => 'tracking-button-icon',
						'type' => 'select',
						'items' => XboxItems::icons(),
						'options' => array(
							'search' => true,
						),
						'default' => 'download',
						'grid' => '2-of-8',
					));

					$xbox->add_field(array(
						'id' => 'tracking-button-link',
						'name' => esc_html__('Tracking button link', 'wpst'),
						'type' => 'text',
						'grid' => '2-of-8',
						'desc' => esc_html__('Use the same link for every tracking buttons.', 'wpst')	
					));	
					
					$xbox->add_field(array(
						'id' => 'tracking-button-text',
						'name' => esc_html__('Tracking button text', 'wpst'),
						'type' => 'text',
						'default' => 'Download complete video now!',
						'grid' => '2-of-8',
						'desc' => esc_html__('Change the text of the tracking button.', 'wpst')	
					));					
				$xbox->close_mixed_field();

				$xbox->open_mixed_field(array('name' => esc_html__('Video about', 'wpst')));
					$xbox->add_field(array(
						'name' => esc_html__('Show description', 'wpst'),
						'id' => 'show-description-video-about',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8'
					));
					$xbox->add_field(array(
						'name' => esc_html__('Show categories', 'wpst'),
						'id' => 'show-categories-video-about',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8'
					));
					$xbox->add_field(array(
						'name' => esc_html__('Show actors', 'wpst'),
						'id' => 'show-actors-video-about',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8 last'
					));					
					$xbox->add_field(array(
						'name' => esc_html__('Show tags', 'wpst'),
						'id' => 'show-tags-video-about',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8 last'
					));
				$xbox->close_mixed_field();

				$xbox->open_mixed_field(array('id' => 'displayed-when:switch:show-description-video-about:on:show-more-settings', 'name' => esc_html__('Show more settings', 'wpst')));
					$xbox->add_field(array(
						'name' => esc_html__('Truncate description', 'wpst'),
						'id' => 'truncate-description',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8',
						'desc' => esc_html__('Display a show more link under the description.', 'wpst')
					));
				$xbox->close_mixed_field();

				$xbox->add_field(array(
					'name' => esc_html__('Video share', 'wpst'),
					'id' => 'enable-video-share',
					'type' => 'switcher',
					'default' => 'on',
					'desc' => esc_html__('Display a "Share" tab with social networks sharing buttons.', 'wpst')
				));

				/* If video share is On */				
				$xbox->open_mixed_field(array('id' => 'displayed-when:switch:enable-video-share:on:video-share-settings', 'name' => esc_html__('Video share settings', 'wpst')));
					$xbox->add_field(array(
						'name' => esc_html__('Facebook', 'wpst'),
						'id' => 'facebook-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8',
					));
					$xbox->add_field(array(
						'name' => esc_html__('Twitter', 'wpst'),
						'id' => 'twitter-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8',
					));
					$xbox->add_field(array(
						'name' => esc_html__('Google Plus', 'wpst'),
						'id' => 'google-plus-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8',
					));
					$xbox->add_field(array(
						'name' => esc_html__('Linkedin', 'wpst'),
						'id' => 'linkedin-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8 last',
					));
					$xbox->add_field(array(
						'name' => esc_html__('Tumblr', 'wpst'),
						'id' => 'tumblr-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8',
					));
					$xbox->add_field(array(
						'name' => esc_html__('Reddit', 'wpst'),
						'id' => 'reddit-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8',
					));
					$xbox->add_field(array(
						'name' => esc_html__('Odnoklassniki', 'wpst'),
						'id' => 'odnoklassniki-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8',
					));
					$xbox->add_field(array(
						'name' => esc_html__('VK', 'wpst'),
						'id' => 'vk-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8',
					));
					$xbox->add_field(array(
						'name' => esc_html__('Email', 'wpst'),
						'id' => 'email-video-share',
						'type' => 'switcher',
						'default' => 'on',
						'grid' => '2-of-8 last',
					));
				$xbox->close_mixed_field();
				$xbox->add_field(array(
					'name' => esc_html__('Display related videos', 'wpst'),
					'id' => 'display-related-videos',
					'type' => 'switcher',
					'default' => 'on',
					'desc' => 'Display related videos under the video infos.'
				));
				$xbox->open_mixed_field(array('id' => 'displayed-when:switch:display-related-videos:on:related-videos-settings', 'name' => esc_html__('Related videos settings', 'wpst')));
					$xbox->add_field(array(					
						'id' => 'related-videos-number',
						'name' => esc_html__('Number of related videos', 'wpst'),
						'type' => 'number',
						'default' => 10,
						'grid' => '2-of-8',
						'options' => array(
							'unit' => 'related videos'
						)
					));
				$xbox->close_mixed_field();
			$xbox->close_tab_item('content-video-page');			
			$xbox->open_tab_item('content-categories-page');
				$xbox->add_field(array(					
					'id' => 'categories-per-page',
					'name' => esc_html__('Number of categories per page', 'wpst'),
					'type' => 'number',
					'default' => 20,
					'grid' => '2-of-8',
					'options' => array(
						'unit' => 'Categories per page'
					),
					'attributes' => array(
						'min' => 1,
						'step' => 1,
						'precision' => 0
					),
				));
				$xbox->add_field(array(
					'name' => esc_html__('Category description position', 'wpst'),
					'id' => 'cat-desc-position',
					'type' => 'radio',
					'desc' => esc_html__('Choose if you want to display the category description at the top or the bottom of category page.', 'wpst'),
					'default' => 'top',
					'items' => array(
						'top' => 'Top',
						'bottom' => 'Bottom'
					)
				));
			$xbox->close_tab_item('content-categories-page');
			$xbox->open_tab_item('content-tags-page');				
				$xbox->add_field(array(
					'name' => esc_html__('Tag description position', 'wpst'),
					'id' => 'tag-desc-position',
					'type' => 'radio',
					'desc' => esc_html__('Choose if you want to display the tag description at the top or the bottom of tag page.', 'wpst'),
					'default' => 'top',
					'items' => array(
						'top' => 'Top',
						'bottom' => 'Bottom'
					)
				));
			$xbox->close_tab_item('content-tags-page');
			$xbox->open_tab_item('content-actors-page');
				$xbox->add_field(array(					
					'id' => 'actors-per-page',
					'name' => esc_html__('Number of actors per page', 'wpst'),
					'type' => 'number',
					'default' => 20,
					'grid' => '2-of-8',
					'options' => array(
						'unit' => 'Actors per page'
					),
					'attributes' => array(
						'min' => 1,
						'step' => 1,
						'precision' => 0
					),
				));
			$xbox->close_tab_item('content-actors-page');
		$xbox->close_tab('content-tabs');
		$xbox->close_tab_item('content');			

		/******************/
		/***** FOOTER *****/
		/******************/
		$xbox->open_tab_item('footer');
			$xbox->add_field(array(
				'id' => 'footer-columns',
				'name' => esc_html__('Footer columns', 'wpst'),
				'type' => 'image_selector',
				'default' => 'four-columns-footer',
				'desc' => sprintf(__('<a href="%s">Click here</a> to manage your footer with widgets.', 'wpst'), get_admin_url() . 'widgets.php'),
				'items' => array(
					'one-column-footer' => get_template_directory_uri() . '/admin/assets/img/theme-options/footer-1-column.jpg',
					'two-columns-footer' => get_template_directory_uri() . '/admin/assets/img/theme-options/footer-2-columns.jpg',
					'three-columns-footer' => get_template_directory_uri() . '/admin/assets/img/theme-options/footer-3-columns.jpg',
					'four-columns-footer' => get_template_directory_uri() . '/admin/assets/img/theme-options/footer-4-columns.jpg',
				),
				'items_desc' => array(
					'one-column-footer' => '1 ' . esc_html__('column', 'wpst'),
					'two-columns-footer' => '2 ' . esc_html__('columns', 'wpst'),
					'three-columns-footer' => '3 ' . esc_html__('columns', 'wpst'),
					'four-columns-footer' => '4 ' . esc_html__('columns', 'wpst')
				),
				'options' => array(
					'width' => '160px',
					'in_line' => true
				)
			));			
			$xbox->add_field(array(
				'name' => esc_html__('Show social profiles', 'wpst'),
				'id' => 'show-social-profiles',
				'type' => 'switcher',
				'default' => 'off'
			));	

			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:show-social-profiles:on:social-profiles', 'name' => esc_html__('Your social profiles', 'wpst')));
				$xbox->add_field(array(
					'id' => 'facebook-profile',
					'name' => esc_html__('Facebook', 'wpst'),
					'type' => 'text',
					'grid' => '2-of-8',
					'desc' => 'https://www.facebook.com/...'
				));
				$xbox->add_field(array(
					'id' => 'twitter-profile',
					'name' => esc_html__('Twitter', 'wpst'),
					'type' => 'text',
					'grid' => '2-of-8',
					'desc' => 'https://www.twitter.com/...'
				));
				$xbox->add_field(array(
					'id' => 'google-plus-profile',
					'name' => esc_html__('Google Plus', 'wpst'),
					'type' => 'text',
					'grid' => '2-of-8',
					'desc' => 'https://plus.google.com/...'
				));
				$xbox->add_field(array(
					'id' => 'youtube-profile',
					'name' => esc_html__('Youtube', 'wpst'),
					'type' => 'text',
					'grid' => '2-of-8 last',
					'desc' => 'https://www.youtube.com/...'
				));
				$xbox->add_field(array(
					'id' => 'tumblr-profile',
					'name' => esc_html__('Tumblr', 'wpst'),
					'type' => 'text',
					'grid' => '2-of-8',
					'desc' => 'https://www.tumblr.com/...'
				));
				$xbox->add_field(array(
					'id' => 'instagram-profile',
					'name' => esc_html__('Instagram', 'wpst'),
					'type' => 'text',
					'grid' => '2-of-8',
					'desc' => 'https://www.instagram.com/...'
				));
			$xbox->close_mixed_field();

			$xbox->add_field(array(
				'name' => esc_html__('Copyright bar', 'wpst'),
				'id' => 'copyright-bar',
				'type' => 'switcher',
				'default' => 'on',
				'desc' => esc_html__('Turn on to display the copyright bar.', 'wpst')	
			));
			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:copyright-bar:on:copyright-settings', 'name' => esc_html__('Copyright settings', 'wpst')));
				$xbox->add_field(array(
					'name' => esc_html__('Copyright text', 'wpst'),
					'id' => 'copyright-text',
					'type' => 'textarea',
					'grid' => '3-of-6',
					'default' => esc_html__('All rights reserved. Powered by', 'wpst') . ' WP-Script.com',
					'desc' => esc_html__('Enter the text that displays in the copyright bar. HTML markup can be used.', 'wpst')			
				));
			$xbox->close_mixed_field();
		$xbox->close_tab_item('footer');

		/**********************/
		/***** MEMBERSHIP *****/
		/**********************/
		$xbox->open_tab_item('membership');
			$xbox->add_field(array(
				'name' => esc_html__('Enable membership', 'wpst'),
				'id' => 'enable-membership',
				'type' => 'switcher',
				'desc' => esc_html__('Enable membership system with login/register feature, user profile, video submit, etc.', 'wpst'),
				'default' => 'on'
			));
			$xbox->add_field(array(
				'name' => esc_html__('Enable video submission', 'wpst'),
				'id' => 'enable-video-submission',
				'type' => 'switcher',
				'grid' => '2-of-6',
				'default' => 'on'	
			));
			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:enable-video-submission:on:video-submit-settings', 'name' => esc_html__('Video submit settings', 'wpst')));
				$xbox->add_field(array(
					'name' => esc_html__('Title required', 'wpst'),
					'id' => 'video-submit-title-required',
					'type' => 'switcher',
					'grid' => '2-of-6',
					'default' => 'on'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Description required', 'wpst'),
					'id' => 'video-submit-description-required',
					'type' => 'switcher',
					'grid' => '2-of-6',
					'default' => 'off'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Video URL required', 'wpst'),
					'id' => 'video-submit-video-link-required',
					'type' => 'switcher',
					'grid' => '2-of-6 last',
					'default' => 'off'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Embed required', 'wpst'),
					'id' => 'video-submit-embed-required',
					'type' => 'switcher',
					'grid' => '2-of-6',
					'default' => 'off'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Thumbnail URL required', 'wpst'),
					'id' => 'video-submit-thumbnail-link-required',
					'type' => 'switcher',
					'grid' => '2-of-6',
					'default' => 'off'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Tags required', 'wpst'),
					'id' => 'video-submit-tags-required',
					'type' => 'switcher',
					'grid' => '2-of-6 last',
					'default' => 'off'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Actors required', 'wpst'),
					'id' => 'video-submit-actors-required',
					'type' => 'switcher',
					'grid' => '2-of-6',
					'default' => 'off'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Duration required', 'wpst'),
					'id' => 'video-submit-duration-required',
					'type' => 'switcher',
					'grid' => '2-of-6 last',
					'default' => 'on'
				));
			$xbox->close_mixed_field();

			$xbox->open_mixed_field(array('id' => 'membership-top-bar-links', 'name' => esc_html__('Membership links', 'wpst')));
				$xbox->add_field(array(
					'name' => esc_html__('Display "Submit a Video" link', 'wpst'),
					'id' => 'display-video-submit-link',
					'type' => 'switcher',
					'grid' => '2-of-6',
					'default' => 'on'	
				));				
				$xbox->add_field(array(
					'name' => esc_html__('Display "My Profile" link', 'wpst'),
					'id' => 'display-my-profile-link',
					'type' => 'switcher',
					'grid' => '2-of-6',
					'default' => 'on'
				));
				$xbox->add_field(array(
					'name' => esc_html__('Display "My Channel" link', 'wpst'),
					'id' => 'display-my-channel-link',
					'type' => 'switcher',
					'grid' => '2-of-6 last',
					'default' => 'on'	
				));
			$xbox->close_mixed_field();

			$xbox->add_field(array(
				'name' => esc_html__('Enable reCaptcha', 'wpst'),
				'id' => 'enable-recaptcha',
				'type' => 'switcher',
				'desc' => sprintf(__('Enable a Google reCaptcha security code on registration and submit video page. You can get your reCAPTCHA keys here: <a href="%s" target="_blank">Google reCaptcha Keys</a>', 'wpst'), 'https://www.google.com/recaptcha/admin'),
				'default' => 'off'
			));	
			$xbox->open_mixed_field(array('id' => 'displayed-when:switch:enable-recaptcha:on:recaptcha-settings', 'name' => esc_html__('reCaptcha settings', 'wpst')));
				$xbox->add_field( array(
					'name' => esc_html__('Site key', 'wpst'),
					'id' => 'recaptcha-site-key',
					'type' => 'text'
				));	
				$xbox->add_field( array(
					'name' => esc_html__('Secret key', 'wpst'),
					'id' => 'recaptcha-secret-key',
					'type' => 'text'
				));				
			$xbox->close_mixed_field();	
			$xbox->add_field(array(
				'name' => esc_html__('Display admin bar for logged in users', 'wpst'),
				'id' => 'display-admin-bar',
				'type' => 'switcher',
				'desc' => esc_html__('Display the WP admin bar when a user is logged on your site and let him go to the admin.', 'wpst'),
				'default' => 'off'
			));
		$xbox->close_tab_item('membership');

		/***********************/
		/***** ADVERTISING *****/
		/***********************/
		$xbox->open_tab_item('advertising');
			/* Desktop Advertising */		
			$xbox->add_field( array(
				'id' => 'video-listing-ad-desktop',
				'name' => esc_html__('Video listing', 'wpst'),
				'type' => 'textarea',
				'grid' => '2-of-6',
				'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square.jpg"></a>',
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/video-listing.jpg">',
				'attributes' => array(
					'rows' => 6
				)
			));
			$xbox->add_field( array(
				'id' => 'sidebar-ad-desktop-1',
				'name' => esc_html__('Sidebar ad zone 1', 'wpst'),
				'type' => 'textarea',
				'grid' => '2-of-6',
				'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square.jpg"></a>',
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/sidebar-happy-zone-1.jpg">',
				'attributes' => array(
					'rows' => 6
				)
			));
			$xbox->add_field( array(
				'id' => 'sidebar-ad-desktop-2',
				'name' => esc_html__('Sidebar ad zone 2', 'wpst'),
				'type' => 'textarea',
				'grid' => '2-of-6',
				'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square.jpg"></a>',
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/sidebar-happy-zone-2.jpg">',
				'attributes' => array(
					'rows' => 6
				)
			));
			$xbox->add_field( array(
				'id' => 'sidebar-ad-desktop-3',
				'name' => esc_html__('Sidebar ad zone 3', 'wpst'),
				'type' => 'textarea',
				'grid' => '2-of-6',
				'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square.jpg"></a>',
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/sidebar-happy-zone-3.jpg">',
				'attributes' => array(
					'rows' => 6
				)
			));	
			$xbox->add_field( array(
				'id' => 'inside-player-ad-zone-1-desktop',
				'name' => esc_html__('Before play ad zone 1', 'wpst'),
				'type' => 'textarea',
				'grid' => '2-of-6',
				'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square.jpg"></a>',
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/inside-player-happy-zone-1-desktop.jpg">',
				'attributes' => array(
					'rows' => 6
				)
			));
			$xbox->add_field( array(
				'id' => 'inside-player-ad-zone-2-desktop',
				'name' => esc_html__('Before play ad zone 2', 'wpst'),
				'type' => 'textarea',
				'grid' => '2-of-6',
				'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square.jpg"></a>',
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/inside-player-happy-zone-2-desktop.jpg">',
				'attributes' => array(
					'rows' => 6
				)
			));		
			$xbox->add_field( array(
				'id' => 'under-player-ad-desktop',
				'name' => esc_html__('Under video player ad zone', 'wpst'),
				'type' => 'textarea',
				'grid' => '2-of-6',
				'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/leaderboard.jpg"></a>',
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/under-player-happy-desktop.jpg">',					
				'attributes' => array(
					'rows' => 6
				)
			));
			$xbox->add_field( array(
				'id' => 'footer-ad-desktop',
				'name' => esc_html__('Footer ad zone', 'wpst'),
				'type' => 'textarea',
				'grid' => '2-of-6',
				'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/billboard.jpg"></a>',
				'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/footer-happy-desktop.jpg">',
				'attributes' => array(
					'rows' => 6
				)
			));
		$xbox->close_tab_item('advertising');
		
		/****************/
		/***** CODE *****/
		/****************/
		$xbox->open_tab_item('code');
			$xbox->add_tab( array(
				'name' => esc_html__('Code tabs', 'wpst'),
				'id' => 'code-tabs',
				'items' => array(
					'javascript-code' => 'Javascript',
					'meta-code' => 'Meta Verification'
				)
			));
			/* Javascript */
			$xbox->open_tab_item('javascript-code');
				$xbox->add_field( array(
					'id' => 'google-analytics',
					'name' => esc_html__('Google Analytics', 'wpst'),
					'type' => 'textarea',
					'desc' => esc_html__('Paste here your Google Analytics following code.', 'wpst')
				));
				$xbox->add_field( array(
					'id' => 'other-scripts',
					'name' => esc_html__('Other scripts', 'wpst'),
					'type' => 'textarea',
					'desc' => esc_html__('Paste here your other script codes (eg popup script).', 'wpst')
				));
			$xbox->close_tab_item('javascript-code');

			/* Meta verification */
			$xbox->open_tab_item('meta-code');
				$xbox->add_field( array(
					'id' => 'meta-verification',
					'name' => esc_html__('Meta verification', 'wpst'),
					'type' => 'textarea',
					'desc' => esc_html__('Paste here your meta codes (for example to verify your domain from a third party like Google Suite, etc.)', 'wpst')				
				));		
			$xbox->close_tab_item('meta-code');			
		$xbox->close_tab('code-tabs');
		$xbox->close_tab_item('code');

		/*****************/
		/***** TOOLS *****/
		/*****************/
		$xbox->open_tab_item('tools');
			/*$xbox->open_mixed_field(array('name' => esc_html__('Dummy content', 'wpst')));					
				$xbox->add_field(array(
					'id' => 'import-mainstream-dummy-videos',
					'type' => 'html',
					'content' => '<input type="button" class="wpst_import_dummy_content xbox-btn xbox-btn-pink" value="' . esc_html__('Import Mainstream videos', 'wpst') . '"><div id="import_dummy_content_message"></div>',
					'desc' => sprintf(__('It will create 40 new video <a href="%s">posts</a> in your admin.', 'wpst'), get_admin_url() . 'edit.php'),
					'grid' => '2-of-6'		
				));	
				$xbox->add_field(array(
					'id' => 'import-adult-dummy-videos',
					'type' => 'html',
					'content' => '<input type="button" class="wpst_import_dummy_content xbox-btn xbox-btn-pink" value="' . esc_html__('Import Adult videos', 'wpst') . '"><div id="import_dummy_content_message"></div>',
					'desc' => sprintf(__('It will create 40 new video <a href="%s">posts</a> in your admin.', 'wpst'), get_admin_url() . 'edit.php'),
					'grid' => '2-of-6'				
				));			
			$xbox->close_mixed_field();*/

			$xbox->open_mixed_field(array('name' => esc_html__('Pages', 'wpst')));
				$xbox->add_field(array(
					'id' => 'create-categories-page',
					'type' => 'html',
					'content' => '<input type="button" class="wpst_create_categories_page xbox-btn xbox-btn-pink" value="' . esc_html__('Create Categories page', 'wpst') . '"><div id="create_categories_page_message"></div>',
					'desc' => sprintf(__('Display illustrated categories like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), 'http://demo-rtt-adult.wp-script.com/categories/', wp_get_theme()->get('Name')),
					'grid' => '3-of-6'				
				));
				$xbox->add_field(array(
					'id' => 'create-tags-page',
					'type' => 'html',
					'content' => '<input type="button" class="wpst_create_tags_page xbox-btn xbox-btn-pink" value="' . esc_html__('Create Tags page', 'wpst') . '"><div id="create_tags_page_message"></div>',
					'desc' => sprintf(__('Display a tags list like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), 'http://demo-rtt-adult.wp-script.com/tags/', wp_get_theme()->get('Name')),
					'grid' => '3-of-6 last'				
				));
				$xbox->add_field(array(
					'id' => 'create-actors-page',
					'type' => 'html',
					'content' => '<input type="button" class="wpst_create_actors_page xbox-btn xbox-btn-pink" value="' . esc_html__('Create Actors page', 'wpst') . '"><div id="create_actors_page_message"></div>',
					'desc' => sprintf(__('Display an actors list like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), 'http://demo-rtt-adult.wp-script.com/actors/', wp_get_theme()->get('Name')),
					'grid' => '3-of-6'			
				));
				$xbox->add_field(array(
					'id' => 'create-video-submit-page',
					'type' => 'html',
					'content' => '<input type="button" class="wpst_create_video_submit_page xbox-btn xbox-btn-pink" value="' . esc_html__('Create Video Submit page', 'wpst') . '"><div id="create_video_submit_page_message"></div>',
					'desc' => sprintf(__('Allow users to submit videos like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), 'http://demo-rtt-adult.wp-script.com/submit-a-video/', wp_get_theme()->get('Name')),
					'grid' => '3-of-6 last'			
				));
				$xbox->add_field(array(
					'id' => 'create-my-profile-page',
					'type' => 'html',
					'content' => '<input type="button" class="wpst_create_my_profile_page xbox-btn xbox-btn-pink" value="' . esc_html__('Create My Profile page', 'wpst') . '"><div id="create_my_profile_page_message"></div>',
					'desc' => sprintf(__('Allow users to modify their profile like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), 'http://demo-rtt-adult.wp-script.com/my-profile/', wp_get_theme()->get('Name')),
					'grid' => '3-of-6'				
				));
				$xbox->add_field(array(
					'id' => 'create-blog-page',
					'type' => 'html',
					'content' => '<input type="button" class="wpst_create_blog_page xbox-btn xbox-btn-pink" value="' . esc_html__('Create Blog page', 'wpst') . '"><div id="create_blog_page_message"></div>',
					'desc' => sprintf(__('Create separate blog page like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), 'http://demo-rtt-adult.wp-script.com/blog/', wp_get_theme()->get('Name')),
					'grid' => '3-of-6 last'
				));
			$xbox->close_mixed_field();

			$xbox->add_field(array(
				'id' => 'create-menu',
				'name' => esc_html__('Menu', 'wpst'),
				'type' => 'html',
				'content' => '<input type="button" class="wpst_create_menu xbox-btn xbox-btn-pink" value="' . esc_html__('Create Menu', 'wpst') . '"><div id="create_menu_message"></div>',
				'desc' => sprintf(__('Create a <a href="%s" target="_blank">menu</a> like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), get_admin_url() . 'nav-menus.php', 'http://demo-rtt-adult.wp-script.com/', wp_get_theme()->get('Name')),
				'grid' => '2-of-6'
			));

			$xbox->add_field(array(
				'id' => 'create-widgets',
				'name' => esc_html__('Widgets', 'wpst'),
				'type' => 'html',
				'content' => '<input type="button" class="wpst_create_widgets xbox-btn xbox-btn-pink" value="Create Widgets"><div id="create_widgets_message"></div>',
				'desc' => sprintf(__('Create <a href="%s" target="_blank">widgets</a> like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), get_admin_url() . 'widgets.php', 'http://demo-rtt-adult.wp-script.com/', wp_get_theme()->get('Name')),
				'grid' => '2-of-6'			
			));
		$xbox->close_tab_item('tools');


		/******************/
		/***** MOBILE *****/
		/******************/
		$xbox->open_tab_item('mobile');
			$xbox->add_tab( array(
				'name' => esc_html__('Mobile tabs', 'wpst'),
				'id' => 'mobile-tabs',
				'items' => array(
					'general-mobile' => '<i class="xbox-icon xbox-icon-gear"></i>' . esc_html__('General', 'wpst'),
					'advertising-mobile' => '<i class="xbox-icon xbox-icon-money"></i>' . esc_html__('Advertising', 'wpst')
				)
			));
			$xbox->open_tab_item('general-mobile');
				$xbox->add_field(array(					
					'id' => 'videos-per-page-mobile',
					'name' => esc_html__('Number of videos per page', 'wpst'),
					'type' => 'number',
					'default' => 31,
					'grid' => '2-of-8',
					'options' => array(
						'unit' => esc_html__('videos / page', 'wpst')
					),
					'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/videos-per-page-mobile.jpg">'
				));
				$xbox->add_field(array(					
					'id' => 'videos-per-row-mobile',
					'name' => esc_html__('Number of videos per row', 'wpst'),
					'type' => 'number',
					'default' => 2,
					'grid' => '2-of-8',
					'options' => array(
							'unit' => esc_html__('videos / row', 'wpst')
						),
					'attributes' => array(
							'min' => 1,
							'max' => 2,
							'step' => 1,
							'precision' => 0
						),
					'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/videos-per-row-mobile.jpg">'
				));				
				$xbox->add_field(array(
					'name' => esc_html__('Disable homepage widgets', 'wpst'),
					'id' => 'disable-homepage-widgets-mobile',
					'type' => 'switcher',
					'default' => 'off',
					'grid' => '2-of-8',
					'desc' => esc_html__('Do not display the homepage widgets on mobile devices.', 'wpst')
				));
			$xbox->close_tab_item('general-mobile');

			/* Mobile Advertising */
			$xbox->open_tab_item('advertising-mobile');
				$xbox->add_field( array(
					'id' => 'header-ad-mobile',
					'name' => esc_html__('Header ad zone', 'wpst'),
					'type' => 'textarea',
					'grid' => '2-of-6',
					'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/header-mobile.jpg"></a>',
					'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/header-happy-mobile.jpg">',
					'attributes' => array(
						'rows' => 6
					)
				));
				// $xbox->add_field( array(
				// 	'id' => 'video-listing-ad-mobile',
				// 	'name' => esc_html__('Video listing', 'wpst'),
				// 	'type' => 'textarea',
				// 	'grid' => '2-of-6',
				// 	'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square-mobile.jpg"></a>',
				// 	'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/video-listing-mobile.jpg">',
				// 	'attributes' => array(
				// 		'rows' => 6
				// 	)
				// ));
				$xbox->add_field( array(
					'id' => 'under-player-ad-mobile',
					'name' => esc_html__('Under video player ad zone', 'wpst'),
					'type' => 'textarea',
					'grid' => '2-of-6',
					'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/header-mobile.jpg"></a>',
					'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/under-player-happy-mobile.jpg">',
					'attributes' => array(
						'rows' => 6
					)
				));
				$xbox->add_field( array(
					'id' => 'above-related-videos-ad-mobile',
					'name' => esc_html__('Above related videos ad zone', 'wpst'),
					'type' => 'textarea',
					'grid' => '2-of-6',
					'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square-mobile.jpg"></a>',
					'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/sidebar-happy-mobile.jpg">',
					'attributes' => array(
						'rows' => 6
					)
				));
				$xbox->add_field( array(
					'id' => 'footer-ad-mobile',
					'name' => esc_html__('Footer ad zone', 'wpst'),
					'type' => 'textarea',
					'grid' => '2-of-6',
					'default' => '<a href="#!"><img src="' . get_template_directory_uri() . '/assets/img/banners/square.jpg"></a>',
					'desc' => '<img src="' . get_template_directory_uri() . '/admin/assets/img/theme-options/footer-happy-mobile.jpg">',
					'attributes' => array(
						'rows' => 6
					)
				));
			$xbox->close_tab_item('advertising-mobile');
		$xbox->close_tab('mobile');


		/*************************/
		/***** IMPORT/EXPORT *****/
		/*************************/
		/*$xbox->open_tab_item('import');
			$xbox->add_import_field(array(
				'name' => esc_html__('Import theme options', 'wpst'),
				'id' => 'import-theme-options',
				'default' => 'https://www.wp-script.com/demo-options/retro-tube-theme/theme-options-1.json',
				'desc' => sprintf(__('Import theme options (color, background, etc.) like on <a href="%s" target="_blank">%s</a> demo.', 'wpst'), '#', 'RetroTube'),
				'options' => array(
					'import_from_file' => false,
					'import_from_url' => false,
					'width' => '200px'
				)
			));			
			$xbox->add_export_field(array(
				'name' => esc_html__('Export theme options', 'wpst'),
				'desc' => esc_html__('Download and make a backup of your options.', 'wpst')
			));
		$xbox->close_tab_item('import');*/
	$xbox->close_tab('main-tab');
}
