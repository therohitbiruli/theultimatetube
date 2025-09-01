<!DOCTYPE html>

<?php require get_template_directory() . '/inc/init.php';?>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="icon" href="<?php echo xbox_get_field_value( 'wpst-options', 'favicon' ); ?>">

<!-- Meta social networks -->
<?php if(is_single()){
	require get_template_directory() . '/inc/meta-social.php';
} ?>

<!-- Temp Style -->
<?php require get_template_directory() . '/temp-style.php'; ?>

<!-- Google Analytics -->
<?php if(xbox_get_field_value( 'wpst-options', 'google-analytics' ) != '') { echo xbox_get_field_value( 'wpst-options', 'google-analytics' ); } ?>

<!-- Meta Verification -->
<?php if(xbox_get_field_value( 'wpst-options', 'meta-verification' ) != '') { echo xbox_get_field_value( 'wpst-options', 'meta-verification' ); } ?>

<?php wp_head(); ?>
</head>

<body <?php if(xbox_get_field_value( 'wpst-options', 'custom-background' ) == 'on') { body_class('custom-background'); }else{ body_class(''); } ?>>

<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpst' ); ?></a>

	<div class="header row">
		<div class="site-branding">
			<div class="logo">
				<?php if ( xbox_get_field_value( 'wpst-options', 'use-logo-image' ) == 'off' ) : ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php if(xbox_get_field_value( 'wpst-options', 'icon-logo' ) != '') : ?><i class="fa fa-<?php echo xbox_get_field_value( 'wpst-options', 'icon-logo' ); ?>"></i><?php endif; ?> <?php if(xbox_get_field_value( 'wpst-options', 'text-logo' ) != '') : ?><?php echo xbox_get_field_value( 'wpst-options', 'text-logo' ); ?><?php else : ?><?php bloginfo( 'name' ); ?><?php endif; ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php if(xbox_get_field_value( 'wpst-options', 'icon-logo' ) != '') : ?><i class="fa fa-<?php echo xbox_get_field_value( 'wpst-options', 'icon-logo' ); ?>"></i><?php endif; ?> <?php if(xbox_get_field_value( 'wpst-options', 'text-logo' ) != '') : ?><?php echo xbox_get_field_value( 'wpst-options', 'text-logo' ); ?><?php else : ?><?php bloginfo( 'name' ); ?><?php endif; ?></a></p>
					<?php endif; ?>					
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php echo get_bloginfo( 'name' ); ?>"><img src="<?php echo xbox_get_field_value( 'wpst-options', 'image-logo-file' ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"></a>
				<?php endif; ?>

				<?php if ( xbox_get_field_value( 'wpst-options', 'show-text-slogan' ) == 'on' ) : ?>
					<p class="site-description"><?php if(xbox_get_field_value( 'wpst-options', 'text-slogan' ) != '') : ?><?php echo xbox_get_field_value( 'wpst-options', 'text-slogan' ); ?><?php else : ?><?php bloginfo( 'description', 'display' ); ?><?php endif; ?></p>
				<?php endif; ?>
			</div>
		</div><!-- .site-branding -->
		
		<?php get_template_part( 'template-parts/content', 'header-search' ); ?>

		<nav id="site-navigation" class="main-navigation <?php if( xbox_get_field_value( 'wpst-options', 'display-admin-bar' ) == 'on' || current_user_can('administrator')  ) : ?>admin-topbar-displayed<?php endif; ?>" role="navigation">
			<?php if( xbox_get_field_value( 'wpst-options', 'enable-membership' ) == 'on' ) : ?>
				<div class="membership">                                                          
					<?php if( is_user_logged_in() ) : ?>
						<div class="welcome menu-item-has-children"><?php echo get_avatar( get_current_user_id(), '',  '', 'avatar', array( 'force_display' => true ) ); ?> <?php echo wp_get_current_user()->display_name; ?> <i class="fa fa-caret-down"></i>
							<ul class="nav-menu sub-menu">
								<?php if( xbox_get_field_value( 'wpst-options', 'display-video-submit-link' ) == 'on' ) : ?>
									<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>submit-a-video"><i class="fa fa-upload"></i> <span class="topbar-item-text"><?php esc_html_e('Submit a Video', 'wpst'); ?></span></a></li>
								<?php endif; ?>  
								<?php if( xbox_get_field_value( 'wpst-options', 'display-my-channel-link' ) == 'on' ) : ?>        
									<li><a href="<?php echo get_author_posts_url(get_current_user_id()); ?>"><i class="fa fa-video-camera"></i> <span class="topbar-item-text"><?php esc_html_e('My Channel', 'wpst'); ?></span></a></li>
								<?php endif; ?>
								<?php if( xbox_get_field_value( 'wpst-options', 'display-my-profile-link' ) == 'on' ) : ?>
									<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>my-profile"><i class="fa fa-user"></i> <span class="topbar-item-text"><?php esc_html_e('My Profile', 'wpst'); ?></span></a></li>
								<?php endif; ?>
								<li><a href="<?php echo esc_url(wp_logout_url(is_home()? home_url() : get_permalink()) ); ?>"><i class="fa fa-power-off"></i> <span class="topbar-item-text"><?php esc_html_e('Logout', 'wpst'); ?></span></a></li>
							</ul>
						</div>
					<?php else : ?>                        
						<span class="login"><a href="#wpst-login"><?php esc_html_e('Login', 'wpst'); ?></a></span>                        
						<span class="login"><a class="button" href="#wpst-register"><?php esc_html_e('Register', 'wpst'); ?></a></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div id="head-mobile"></div>
			<div class="button-nav"></div>			
			<?php wp_nav_menu( array( 'theme_location' => 'wpst-main-menu', 'container' => false ) ); ?>
		</nav>
	</div>
	<div class="clear"></div> 

	<?php if( xbox_get_field_value( 'wpst-options', 'header-ad-mobile' ) != '' ) : ?>
		<div class="happy-header-mobile">
			<?php echo wpst_render_shortcodes( xbox_get_field_value( 'wpst-options', 'header-ad-mobile' ) ); ?>
		</div>		
	<?php endif; ?>

	<div id="content" class="site-content row">
