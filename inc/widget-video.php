<?php
class wpst_WP_Widget_Videos_Block extends WP_Widget {
/**
* To create the example widget all four methods will be
* nested inside this single instance of the WP_Widget class.
**/
public function __construct() {
  $widget_options = array(
    'classname' => 'widget_videos_block',
    'description' => __('Display blocks of videos sorted by views, date, popularity, category, etc.', 'wpst'),
  );
  parent::__construct( 'widget_videos_block', 'UltimaTube - Video Blocks', $widget_options );
}
public function widget( $args, $instance ) {
// Widget output
  extract( $args );
  $title = $instance['title'];
  $advertising = apply_filters( 'widget_textarea', empty( $instance['advertising'] ) ? '' : $instance['advertising'], $instance );
  $args_query = array();
  global $t;
  $tv = isset( $instance['video_type'] ) ? $instance['video_type'] : null;
  $nv = isset( $instance['video_number'] ) ? $instance['video_number'] : null;
  $cv = isset( $instance['video_category'] ) ? $instance['video_category'] : null;
  $w = isset( $instance['widget_id'] ) ? $instance['widget_id'] : null;
  $w = 'ttw' . str_replace( 'video_blocks-' , '' , $w );
  echo $before_widget;
  if ( $title )
    echo $before_title . $title . $after_title;
  switch( $tv ){
    case 'related':
    global $post;
    $current_postID = $post->ID;
    $categories     = get_the_terms( $current_postID, 'category' );
    if( $categories ){
      $args_query = array(
        'post_type'         => 'post',
        'posts_per_page'    => $nv,
        'orderby'           => 'name',
        'post__not_in'      => array( $current_postID ),
        'tax_query'         => array(
          'relation'        => 'AND',
          // cat
          array(
            'taxonomy' => 'category',
            'field'    => 'id',
            'terms'    => $categories[0]->term_id,
            'operator' => 'IN',
            )
          )
        );
    }
    break;
    case 'latest':
    $args_query = array(
      'post_type'      => 'post',
      'orderby'        => 'date',
      'order'          => 'DESC',
      'posts_per_page' => $nv,
      'cat'            => $cv
      );
    break;
    case 'most-viewed':
    $args_query = array(
      'post_type'      => 'post',
      'meta_key'       => 'post_views_count',
      'orderby'        => 'meta_value_num',
      'order'          => 'DESC',
      'posts_per_page' => $nv,
      'cat'            => $cv
      );
    break;
    case 'longest':
    $args_query = array(
      'post_type'      => 'post',
      'meta_key'       => 'duration',
      'orderby'        => 'meta_value_num',
      'order'          => 'DESC',
      'posts_per_page' => $nv,
      'cat'            => $cv
      );
    break;
    case 'popular':
    $args_query = array(
      'post_type'      => 'post',
      'orderby'        => 'meta_value_num',
      'order'          => 'DESC',
      'meta_query'     => array(
                                'relation'  => 'OR',
                                array(
                                    'key'     => 'rate',
                                    'compare' => 'EXISTS'
                                    )
                          ),
      'posts_per_page' => $nv,
      'cat'            => $cv
      );
    break;
    case 'random':
    $args_query = array(
      'post_type'      => 'post',
      'orderby'        => 'rand',
      'order'          => 'DESC',
      'posts_per_page' => $nv,
      'cat'            => $cv
      );
    break;
  }
  $home_query = new WP_Query($args_query);
  if( $home_query->have_posts() ): ?>
  <?php if( $tv == 'related' ){
    global $post;
    $post_cat = wp_get_post_categories( $post->ID );
  }
  ?>

  <a class="more-videos label" href="<?php echo get_bloginfo('url');?>/?filter=<?php echo $tv;?><?php if($cv != 0) : ?>&amp;cat=<?php echo $cv;?><?php endif; ?>"><i class="fa fa-plus"></i> <span><?php _e('More videos', 'wpst'); ?></span></a>
  
  <div class="video-widget-container <?php if($advertising != '') : ?>with-happy<?php endif; ?>">    
    <div class="videos-list">      
      <?php while ( $home_query->have_posts() ) : $home_query->the_post(); ?>
        <?php get_template_part( 'template-parts/loop', 'video' ); ?>
      <?php endwhile; ?>
    </div>    
    <?php if($advertising != '') : ?>
      <div class="video-archive-ad">
        <?php echo $advertising; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="clear"></div>
<?php endif;
echo $after_widget;
wp_reset_query();
}
public function form( $instance ) {
  $instance                   = wp_parse_args( (array) $instance , array( 'title' => '' ) );
  $title                      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
  $current_video_type         = isset( $instance['video_type'] ) ? esc_attr( $instance['video_type'] ) : '';
  $video_number               = isset( $instance['video_number'] ) ? esc_attr( $instance['video_number'] ) : '';
  $video_category             = isset( $instance['video_category'] ) ? esc_attr( $instance['video_category'] ) : '';
  $advertising                = isset( $instance['advertising'] ) ? esc_attr( $instance['advertising'] ) : '';  
  // $advertising_settings       = array(                                
  //                               'textarea_rows' => 6,
  //                               'textarea_name' => $this->get_field_name( 'advertising' )
  //                             );
  ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'wpst' ); ?> :</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
      <?php if( $video_number == "" ) $video_number = 4; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'video_number' ); ?>"><?php _e( 'Total videos', 'wpst' ); ?> :</label>
      <input style="width:40px;" class="widefat" id="<?php echo $this->get_field_id( 'video_number' ); ?>" name="<?php echo $this->get_field_name( 'video_number' ); ?>" type="text" value="<?php echo $video_number; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'video_type' ); ?>"><?php _e( 'Display', 'wpst' ) ?> :</label>
      <select class="widefat video-sort" id="<?php echo $this->get_field_id( 'video_type' ); ?>" name="<?php echo $this->get_field_name( 'video_type' ); ?>">
        <?php
        $types_videos = array(
          'latest'              => __('Latest videos', 'wpst'),
          'most-viewed'         => __('Most viewed videos', 'wpst'),
          'longest'             => __('Longest videos', 'wpst'),
          'popular'             => __('Popular videos', 'wpst'),
          'random'              => __('Random videos', 'wpst'),
          'related'             => __('Related videos', 'wpst')
          );
        foreach( $types_videos as $key => $value ) : ?>
          <option class="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php selected( $key , $current_video_type ); ?>><?php echo ucfirst( $value ); ?></option>
        <?php
        endforeach;
        ?>
      </select>
    </p>
    <p class="cat_display"><label for="<?php echo $this->get_field_id( 'video_category' ); ?>"><?php _e( 'Category', 'wpst' ); ?> :</label>
      <?php
      $args = array(
        'show_option_all'    => __('All', 'wpst'),
        'show_option_none'   => '',
        'show_last_update'   => 0,
        'show_count'         => 1,
        'hide_empty'         => 0,
        'child_of'           => 0,
        'exclude'            => '',
        'echo'               => 1,
        'selected'           => $video_category,
        'hierarchical'       => 1,
        'name'               => $this->get_field_name( 'video_category' ),
        'id'                 => $this->get_field_id( 'video_category' ),
        'class'              => 'widefat',
        'depth'              => -1,
        'tab_index'          => 0,
        'taxonomy'           => 'category',
        'order'              => 'ASC',
        'orderby'            => 'title'
        );
      wp_dropdown_categories( $args );
      ?>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'advertising' ); ?>"><?php _e( 'Advertising', 'wpst' ) ?> :</label>
      <?php // wp_editor( esc_attr($advertising), $this->get_field_id( 'advertising' ), $advertising_settings ); ?>
      <textarea class="widefat" id="<?php echo $this->get_field_id('advertising'); ?>" name="<?php echo $this->get_field_name('advertising'); ?>" rows="6"><?php echo $advertising; ?></textarea>
    </p>

    <?php
      }
      public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']          = isset($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
        $instance['video_type']     = isset($new_instance['video_type']) ? stripslashes( $new_instance['video_type'] ) : '';
        $instance['video_number']   = isset($new_instance['video_number']) ? stripslashes( preg_replace("[^0-9]","", $new_instance['video_number'] ) ) : '';
        $instance['video_category'] = isset($new_instance['video_category']) ? stripslashes( $new_instance['video_category'] ) : '';
        // $instance['advertising']    = isset($new_instance['advertising']) ? strip_tags( $new_instance['advertising'] ) : '';
        if ( current_user_can('unfiltered_html') ) {
          $instance['advertising'] =  $new_instance['advertising'];
        } else {
          $instance['advertising'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['advertising']) ) );
        }
        return $instance;
      }
    }
    function wpst_register_widgets() {
      register_widget( 'wpst_WP_Widget_Videos_Block' );
    }
    add_action( 'widgets_init', 'wpst_register_widgets' );