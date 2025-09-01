<?php
/**
 * Template Name: Tags
 **/
get_header();
$posts_per_row  = 3;
$posts_per_page = 15; ?>

<style type="text/css">
.letter-group { width: 100%; }
.letter-cell { width: 5%; height: 2em; text-align: center; padding-top: 8px; margin-bottom: 8px; background: #e0e0e0; float: left; }
.row-cells { width: 70%; float: right; margin-right: 180px; }
.title-cell { width: 30%;  float: left; overflow: hidden; margin-bottom: 8px; }
.clear { clear: both; }
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="archive-content clearfix-after template-tags">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<header>
					<?php the_title( '<h1 class="widget-title">', '</h1>' ); ?>
				</header>
				<?php
				the_content();
				$args = array(
					'taxonomy'               => 'post_tag',
					'update_term_meta_cache' => false,
				);
				$terms = get_terms( $args );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					$term_list = [];
					foreach ( $terms as $term ) {
						$term_name = wpst_removeAccents($term->name);
						$first_letter = strtoupper( mb_substr( $term_name, 0, 1, 'utf8' ) );
						if ( is_numeric( $first_letter ) ) {
							$first_letter = '#';
						}
						$term_list[ $first_letter ][] = $term;
					}
					foreach ( $term_list as $key => $value ) {
						echo '<div class="tags-letter-block"><div class="tag-letter">' . $key . '</div>';
						echo '<div class="tag-items">';
						foreach ( $value as $term ) {
							echo '<div class="tag-item"><a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a></div>';
						}
						echo '</div></div><div class="clear"></div>';
					}
				}
				?>
			</div>
			<?php endwhile; endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
