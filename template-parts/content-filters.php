<?php if( !is_single() && !is_page() ) : ?>    
    <?php $paged = get_query_var( 'paged', 1 ); ?>
    <div class="filters">
        <a class="filter-title" href="#!"><?php echo wpst_get_filter_title(); ?></a>
        <div class="filters-list">
            <?php if( $paged === 0 ) : ?>	
                <a class="<?php echo wpst_selected_filter('latest'); ?>" href="<?php echo add_query_arg('filter', 'latest'); ?>"><?php esc_html_e('Newest', 'wpst'); ?></a>
                <a class="<?php echo wpst_selected_filter('popular'); ?>" href="<?php echo add_query_arg('filter', 'popular'); ?>"><?php esc_html_e('Best', 'wpst'); ?></a>	
                <a class="<?php echo wpst_selected_filter('most-viewed'); ?>" href="<?php echo add_query_arg('filter', 'most-viewed'); ?>"><?php esc_html_e('Most viewed', 'wpst'); ?></a>				
                <a class="<?php echo wpst_selected_filter('longest'); ?>" href="<?php echo add_query_arg('filter', 'longest'); ?>"><?php esc_html_e('Longest', 'wpst'); ?></a>
                <a class="<?php echo wpst_selected_filter('random'); ?>" href="<?php echo add_query_arg('filter', 'random'); ?>"><?php esc_html_e('Random', 'wpst'); ?></a>	
            <?php else : ?>
                <a class="<?php echo wpst_selected_filter('latest'); ?>" href="<?php echo wpst_get_nopaging_url(); ?>?filter=latest"><?php esc_html_e('Newest', 'wpst'); ?></a>
                <a class="<?php echo wpst_selected_filter('popular'); ?>" href="<?php echo wpst_get_nopaging_url(); ?>?filter=popular"><?php esc_html_e('Best', 'wpst'); ?></a>
                <a class="<?php echo wpst_selected_filter('most-viewed'); ?>" href="<?php echo wpst_get_nopaging_url(); ?>?filter=most-viewed"><?php esc_html_e('Most viewed', 'wpst'); ?></a>				
                <a class="<?php echo wpst_selected_filter('longest'); ?>" href="<?php echo wpst_get_nopaging_url(); ?>?filter=longest"><?php esc_html_e('Longest', 'wpst'); ?></a>
                <a class="<?php echo wpst_selected_filter('random'); ?>" href="<?php echo wpst_get_nopaging_url(); ?>?filter=random"><?php esc_html_e('Random', 'wpst'); ?></a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>