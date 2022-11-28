<?php
/**
 * Template Name: About
 *
 * @package realestate
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php 
		$descr = get_field( "descr"); 
		$mini_descr = get_field( "mini_descr"); 
		$blok_descr = get_field( "blok_descr"); 
			echo '<div class="about__image">' .
				get_the_post_thumbnail() .
			'</div>';
			the_title('<h1 class="container title">', '</h1>');
			echo creatCardDescr($descr, $mini_descr);
			echo creatCardDescrBlocks($blok_descr);
		?>
	</main><!-- #main -->
<?php
get_footer();

