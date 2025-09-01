<?php
    $videos_per_row = xbox_get_field_value( 'wpst-options', 'videos-per-row' );
    if( $videos_per_row == '2' ){
        $videos_per_row = '50';
    }elseif( $videos_per_row == '3' ){
        $videos_per_row = '33.33';
    }elseif( $videos_per_row == '4' ){
        $videos_per_row = '25';
    }elseif( $videos_per_row == '5' ){
        $videos_per_row = '20';
    }elseif( $videos_per_row == '6' ){
        $videos_per_row = '16.66';
    }
?>

<style>
    <?php if ( xbox_get_field_value( 'wpst-options', 'use-logo-image' ) == 'off' ) : ?>
        @import url(https://fonts.googleapis.com/css?family=<?php echo str_replace( ' ', '+', xbox_get_field_value( 'wpst-options', 'logo-font-family' ) ); ?>);
    <?php endif; ?>
    body.custom-background {
        background-image: url(<?php echo xbox_get_field_value( 'wpst-options', 'background-image' ); ?>);
        background-color: <?php echo xbox_get_field_value( 'wpst-options', 'background-color' ); ?>!important;
        background-repeat: <?php echo xbox_get_field_value( 'wpst-options', 'background-repeat' ); ?>;
        background-attachment: <?php echo xbox_get_field_value( 'wpst-options', 'background-attachment' ); ?>;
    }
    .site-title a {        
        font-family: <?php echo xbox_get_field_value( 'wpst-options', 'logo-font-family' ); ?>;
        font-size: <?php echo xbox_get_field_value( 'wpst-options', 'logo-font-size' ); ?>px;
    }
    .site-branding .logo img {
        max-width: <?php echo xbox_get_field_value( 'wpst-options', 'logo-max-width' ); ?>px;
        max-height: <?php echo xbox_get_field_value( 'wpst-options', 'logo-max-height' ); ?>px;
        margin-top: <?php echo xbox_get_field_value( 'wpst-options', 'logo-margin-top' ); ?>px;
        margin-left: <?php echo xbox_get_field_value( 'wpst-options', 'logo-margin-left' ); ?>px;
    }
    a,
    .site-title a i,
    .thumb-block:hover span.title,
    .categories-list .thumb-block:hover .entry-header .cat-title:before,
    .required,
    .post-like a:hover i,   
    .top-bar i:hover,
    .menu-toggle i,
    .main-navigation.toggled li:hover > a,
    .main-navigation.toggled li.focus > a,
    .main-navigation.toggled li.current_page_item > a,
    .main-navigation.toggled li.current-menu-item > a,
    #filters .filters-select:after,
    .top-bar .membership a i,
    .thumb-block:hover .photos-count i,
    .aside-filters span:hover a,
    .aside-filters span:hover a i,
    .filters a.active,
    .filters a:hover,
    .archive-aside a:hover,
    #video-links a:hover,
    #video-links a:hover i,
    .video-share .video-share-url a#clickme:hover,
    a#show-sharing-buttons.active,
    a#show-sharing-buttons.active i,
    .morelink:hover,
    .morelink:hover i,
    .footer-menu-container a:hover,
    .categories-list .thumb-block:hover .entry-header span,
    .tags-letter-block .tag-items .tag-item a:hover,
    .menu-toggle-open,
    .search-open {
        color: <?php echo xbox_get_field_value( 'wpst-options', 'main-color' ); ?>;
    }
    button,
    .button,
    .btn,
    input[type="button"],
    input[type="reset"],
    input[type="submit"],
    .pagination ul li a.current,
    .pagination ul li a:hover,
    body #filters .label.secondary.active,
    .label.secondary:hover,
    .widget_categories ul li a:hover,
    a.tag-cloud-link:hover,
    .template-actors li a:hover,
    .rating-bar-meter,
    .vjs-play-progress,
    #filters .filters-options span:hover,
    .top-bar .social-share a:hover,
    .thumb-block:hover span.hd-video,
    .label:hover,
    .label:focus,
    .label:active,
    .mobile-pagination .pagination-nav span,
    .mobile-pagination .pagination-nav a {
        background-color: <?php echo xbox_get_field_value( 'wpst-options', 'main-color' ); ?>!important;
    }
    button:hover,
    .button:hover {
        background-color: lighten(<?php echo xbox_get_field_value( 'wpst-options', 'main-color' ); ?>,50%);
    }
    #video-tabs button.tab-link.active,
    .page-title,
    .page .entry-title,
    .comments-title,
    .comment-reply-title,
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="password"]:focus,
    input[type="search"]:focus,
    input[type="number"]:focus,
    input[type="tel"]:focus,
    input[type="range"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="week"]:focus,
    input[type="time"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="color"]:focus,
    textarea:focus,
    .filters a.active {
        border-color: <?php echo xbox_get_field_value( 'wpst-options', 'main-color' ); ?>!important;
    }   
    ul li.current-menu-item a {
        border-bottom-color: <?php echo xbox_get_field_value( 'wpst-options', 'main-color' ); ?>!important;
    } 
    .logo-watermark-img {
        max-width: <?php echo xbox_get_field_value( 'wpst-options', 'logo-watermark-max-width' ); ?>px;
    }
    .video-js .vjs-big-play-button {
        background-color: <?php echo xbox_get_field_value( 'wpst-options', 'main-color' ); ?>!important;
        border-color: <?php echo xbox_get_field_value( 'wpst-options', 'main-color' ); ?>!important;
    }
</style>