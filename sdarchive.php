<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package realestate
 */

get_header();

// $queried_object = get_queried_object();
// if ($queried_object->taxonomy === 'objloc') {
// 	$params_str = array();
// 	parse_str($_SERVER['QUERY_STRING'], $params_str);
// 	$params_str['objloc'] = $queried_object->slug;
// 	$params_str = http_build_query($params_str);
// 	var_dump($params_str);
// 	$main_obj = file_get_contents(get_site_url() . '/wp-json/estate/v1/items/?' . $params_str);
// 	$main_obj = json_decode($main_obj);

// 	// var_dump($main_obj->items);
// 	var_dump( $main_obj->items);
	
// } ?>
	<div class="front-image">
		<?php echo wp_get_attachment_image($main_obj->filters->objloc->choices->{$queried_object->slug}->image->ID, 'gallery-full'); ?>
	</div>
	<main id="primary" class="site-main">
blablabaldfgadgdf

		<?php if ( have_posts() ) : ?>

			
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			
				<div class="cards__items">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
				

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
