<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main custom-content" role="main">

		<?php if ( have_posts() ) { ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="widget-title">', '</h1>' );
					if(xbox_get_field_value( 'wpst-options', 'cat-desc-position' ) == 'top') { the_archive_description( '<div class="archive-description">', '</div>' ); }
				?>
			</header><!-- .page-header -->

            <div class="blog-list">
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/loop', 'blog' );
                endwhile; ?>
            </div>

			<?php wpst_page_navi();

		} else {

			get_template_part( 'template-parts/content', 'none' );

		}
		
		if(xbox_get_field_value( 'wpst-options', 'cat-desc-position' ) == 'bottom') { the_archive_description( '<div class="archive-description">', '</div>' ); } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();