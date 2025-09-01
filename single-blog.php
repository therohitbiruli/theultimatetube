<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main custom-content" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">		
					<?php the_title( '<h1 class="widget-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wpst' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
		
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpst' ),
						'after'  => '</div>',
					) );
				?>
			
				<?php // If comments are open or we have at least one comment, load up the comment template.
				if( xbox_get_field_value( 'wpst-options', 'enable-comments' ) == 'on' ) {
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				} ?>
			</article><!-- #post-## -->
			
		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();