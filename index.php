<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="gridcontainer">
				<?php 
				//here we will do custom word loops; we will make posts appear on the main page in a grid format
					$counter = 1; //start counter
					$grids = 2; //Grids per row - source: wpbeginner.com
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array('posts_per_page' => 6, 'paged' => $paged, 'category'=>190 );
					query_posts($args);
					if(have_posts()) :  while(have_posts()) :  the_post();
				?>
				<?php // Left Side
				if($counter == 1) :
				?>
					<div class="griditemleft">
					<div class="postimage">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('category-thumbnail'); ?></a>
					</div>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</div>
				<?php // Right Side
					elseif($counter == $grids) :
				?>
					<div class="griditemright">
						<div class="postimage">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('category-thumbnail'); ?></a>
						</div>
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						</div>
					<div class="clear"></div>
				<?php
				$counter = 0;
				endif;
				?>
				<?php
				$counter++;
				endwhile; ?>
				<?php the_posts_pagination( $args ); ?>
				<?php endif;
				?>
		<?php
		if ( have_posts(
		) ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
