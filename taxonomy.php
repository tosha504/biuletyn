<?php
/**
 * The template for displaying taxonomy pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package realestate
 */

get_header();


$params_str = array();
parse_str($_SERVER['QUERY_STRING'], $params_str);
$queried_object = get_queried_object();
$params_str[$queried_object->taxonomy] = $queried_object->slug;
$params_str = http_build_query($params_str);
$main_obj = creatMainObj($params_str);


// var_dump( $main_obj->items); ?>
	<div class="front-image">
		<?php 
		if($queried_object->taxonomy === 'objloc') {
			echo wp_get_attachment_image($main_obj->filters->objloc->choices->{$queried_object->slug}->image->ID, 'gallery-full');
		} else {
			echo wp_get_attachment_image($main_obj->filters->objfeat->choices->{$queried_object->slug}->image->ID, 'gallery-full');
		}
		 ?>
	</div>	
	<?php single_term_title(); ?>
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<main id="primary" class="site-main">
		<?php
		if($main_obj->items != null ) { ?>
		<div class="cards__items">
			<?php foreach ($main_obj->items as $key => $item) {
				// var_dump($item); ?>
					<a href="<?php echo esc_url( get_permalink($item->ID) );  ?>">
						<div class="cards__item"   style="background: url(' <?php  echo the_post_thumbnail_url($item->ID); ?>'); background-repeat: no-repeat;  background-position: center; background-size: cover; " ; >
							<div class="overlay"></div>
							<h6 class="cards__item_title-hover"><?php echo $item->post_title; ?></h6>
							<div class="cards__item_content">
								<h6><?php echo $item->post_title; ?></h6>
								<p class="cards__item_content-page"><?php the_archive_title();?></p>
								<?php if($item->from_price) { ?><p class="cards__item_content-price"><?php echo $item->from_price; ?> EUR</p><?php } ?>
								<?php if($item->from_rooms) { ?><p><span><?php _e('Number of rooms :', 'realestate'); ?></span><?php echo $item->from_rooms;?></p><?php } ?> 
								<?php if($item->from_area) { ?><p><span><?php _e('Surface :', 'realestate') ?></span><?php _e('from :', 'realestate') ?><?php echo $item->from_area; ?> m<sup>2</p><?php } ?> 
							</div>
						</div>
					</a>
			<?php } ?>
		</div>
		<?php } else { ?>
			<div class="container not-found">
				<h2><?php _e('No search results found!', 'realestate') ?></h2>
				<div>
					<a class="btn" href="<?php echo esc_url( home_url( '/' ) ) ?>">
						<?php _e('Main page', 'realestate') ?>
					</a>
				</div>
			</div>
			
		<?php } ?>
			
		
	</main><!-- #main -->

<?php
get_footer();
