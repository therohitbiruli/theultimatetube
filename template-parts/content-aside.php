<div class="archive-aside">
    <?php if( !is_single() && !is_page() && xbox_get_field_value( 'wpst-options', 'show-aside-filters' ) == 'on'  ) :
        $home_url = home_url( '/' ); ?>    
        <?php $paged = get_query_var( 'paged', 1 ); ?>
        <div class="aside-block aside-filters">        	
            <span><a class="<?php echo wpst_selected_filter_aside('latest'); ?>" href="<?php echo $home_url; ?>?filter=latest"><i class="fa fa-fire"></i> <?php esc_html_e('Newest', 'wpst'); ?></a></span>
            <span><a class="<?php echo wpst_selected_filter_aside('popular'); ?>" href="<?php echo $home_url; ?>?filter=popular"><i class="fa fa-thumbs-up"></i> <?php esc_html_e('Best', 'wpst'); ?></a></span>
            <span><a class="<?php echo wpst_selected_filter_aside('most-viewed'); ?>" href="<?php echo $home_url; ?>?filter=most-viewed"><i class="fa fa-eye"></i> <?php esc_html_e('Most viewed', 'wpst'); ?></a></span>			
            <span><a class="<?php echo wpst_selected_filter_aside('longest'); ?>" href="<?php echo $home_url; ?>?filter=longest"><i class="fa fa-clock-o"></i> <?php esc_html_e('Longest', 'wpst'); ?></a></span>
            <span><a class="<?php echo wpst_selected_filter_aside('random'); ?>" href="<?php echo $home_url; ?>?filter=random"><i class="fa fa-refresh"></i> <?php esc_html_e('Random', 'wpst'); ?></a></span>     
        </div>
    <?php endif; ?>
    <?php if( xbox_get_field_value( 'wpst-options', 'show-aside-categories' ) == 'on' ) : ?>
        <div class="aside-block aside-cats">
            <h3><?php echo xbox_get_field_value( 'wpst-options', 'aside-categories-title' ); ?></h3>
            <?php $cat_number = xbox_get_field_value( 'wpst-options', 'aside-categories-number' );
            $args = array(
                'orderby' => 'name',
                'number' => $cat_number
            );            
            $categories = get_categories( $args );
            $categories_total = wp_count_terms('category');
            foreach($categories as $category) {
                $class = ( is_category( $category->name ) ) ? 'active' : '';
                echo '<a href="' . get_category_link($category->term_id) . '" class="' . $class . '">' . $category->name . '</a>';               
            }
            if( $categories_total > $cat_number ) : ?>
                <a class="show-all-link" href="<?php echo xbox_get_field_value( 'wpst-options', 'aside-categories-link' ); ?>" title="<?php echo xbox_get_field_value( 'wpst-options', 'aside-categories-link-text' ); ?>"><?php echo xbox_get_field_value( 'wpst-options', 'aside-categories-link-text' ); ?> <i class="fa fa-angle-right"></i></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if( xbox_get_field_value( 'wpst-options', 'show-aside-tags' ) == 'on' ) : ?>
        <div class="aside-block aside-tags">
            <h3><?php echo xbox_get_field_value( 'wpst-options', 'aside-tags-title' ); ?></h3>
            <?php $tag_number = xbox_get_field_value( 'wpst-options', 'aside-tags-number' );
            $args = array(
                'orderby' => 'name',
                'number' => $tag_number
            );            
            $tags = get_tags( $args );   
            $tags_total = wp_count_terms('post_tag');
            if( $tags_total > 0 ) {
                foreach($tags as $tag) {
                    $class = ( is_tag( $tag->name ) ) ? 'active' : '';
                    echo '<a href="' . get_category_link($tag->term_id) . '" class="' . $class . '">' . $tag->name . '</a>';
                }
            }else{
                echo esc_html__('No tags', 'wpst');
            }
            if( $tags_total > $tag_number ) : ?>
                <a class="show-all-link" href="<?php echo xbox_get_field_value( 'wpst-options', 'aside-tags-link' ); ?>" title="<?php echo xbox_get_field_value( 'wpst-options', 'aside-tags-link-text' ); ?>"><?php echo xbox_get_field_value( 'wpst-options', 'aside-tags-link-text' ); ?> <i class="fa fa-angle-right"></i></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if( xbox_get_field_value( 'wpst-options', 'show-aside-actors' ) == 'on' ) : ?>
        <div class="aside-block aside-actors">
            <h3><?php echo xbox_get_field_value( 'wpst-options', 'aside-actors-title' ); ?></h3> 
            <?php $actor_number = xbox_get_field_value( 'wpst-options', 'aside-actors-number' );
            $args = array(
                'taxonomy' => 'actors',
                'orderby' => 'name',
                'number' => $actor_number
            );            
            $actors = get_terms( $args );
            $actors_total = wp_count_terms('actors');
            if( $actors_total > 0 ) {
                foreach($actors as $actor) {
                    $class = ( get_queried_object_id() == $actor->term_id ) ? 'active' : '';
                    echo '<a href="' . get_category_link($actor->term_id) . '" class="' . $class . '">' . ucwords($actor->name) . '</a>';
                }
            }else{
                echo esc_html__('No actors', 'wpst');
            }
            if( $actors_total > $actor_number ) : ?>
                <a class="show-all-link" href="<?php echo xbox_get_field_value( 'wpst-options', 'aside-actors-link' ); ?>" title="<?php echo xbox_get_field_value( 'wpst-options', 'aside-actors-link-text' ); ?>"><?php echo xbox_get_field_value( 'wpst-options', 'aside-actors-link-text' ); ?> <i class="fa fa-angle-right"></i></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>