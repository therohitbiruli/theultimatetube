<div class="search-menu-mobile">
    <div class="header-search-mobile">
        <i class="fa fa-search"></i>    
    </div>	
    <div id="menu-toggle">
        <i class="fa fa-bars"></i>
    </div>
</div>

<div class="header-search">
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">        
        <?php if( get_search_query() ): ?>
            <input class="input-group-field" type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
        <?php else: ?>
            <input class="input-group-field" value="<?php esc_html_e('Search...', 'wpst'); ?>" name="s" id="s" onfocus="if (this.value == '<?php esc_html_e('Search...', 'wpst'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php esc_html_e('Search...', 'wpst'); ?>';}" type="text" />
        <?php endif; ?>
        
        <input class="fa-input" type="submit" id="searchsubmit" value="&#xf002;" />        
    </form>
</div>