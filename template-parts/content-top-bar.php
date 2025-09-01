<?php if( xbox_get_field_value( 'wpst-options', 'enable-membership' ) == 'on' ) : ?>
    <div class="membership">                 
        <?php if( is_user_logged_in() ) : ?>
            <?php /*<span class="welcome"><i class="fa fa-user"></i> <?php esc_html_e('Welcome', 'wpst');?> <?php echo wp_get_current_user()->display_name; ?></span>
            <?php if( xbox_get_field_value( 'wpst-options', 'display-video-submit-link' ) == 'on' ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>submit-a-video"><i class="fa fa-play-circle"></i> <?php esc_html_e('Submit a Video', 'wpst'); ?></a>
            <?php endif; ?>  
            <?php if( xbox_get_field_value( 'wpst-options', 'display-my-channel-link' ) == 'on' ) : ?>        
                <a href="<?php echo get_author_posts_url(get_current_user_id()); ?>"><i class="fa fa-video-camera"></i> <?php esc_html_e('My Channel', 'wpst'); ?></a>
            <?php endif; ?>
            <?php if( xbox_get_field_value( 'wpst-options', 'display-my-profile-link' ) == 'on' ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>my-profile"><i class="fa fa-user"></i> <?php esc_html_e('My Profile', 'wpst'); ?></a>
            <?php endif; ?>
            <a href="<?php echo esc_url(wp_logout_url(is_home()? home_url() : get_permalink()) ); ?>"><i class="fa fa-power-off"></i> <?php esc_html_e('Logout', 'wpst'); ?></a> */ ?>
        <?php else : ?>
            <a href="#wpst-login"><?php esc_html_e('Login', 'wpst'); ?></a>
            <a class="button" href="#wpst-register"><?php esc_html_e('Sign Up', 'wpst'); ?></a>
        <?php endif; ?>
    </div>
<?php endif; ?>