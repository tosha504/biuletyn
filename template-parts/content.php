<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package realestate
 */

$current_id =  get_the_ID();
$price = get_field( "from_price", $current_id );
$town = get_field( "town", $current_id );
$area = get_field( "from_area", $current_id );
$rooms = get_field( "from_rooms", $current_id );?>

<a href="<?php echo esc_url( get_permalink() );  ?>">
	<div class="cards__item"   style="background: url(' <?php  echo the_post_thumbnail_url(); ?>'); background-repeat: no-repeat;  background-position: center; background-size: cover; " ; >
		<div class="overlay"></div>
		<h6 class="cards__item_title-hover"><?php the_title(); ?></h6>
		<div class="cards__item_content">
			<h6><?php the_title(); ?></h6>
			<p class="cards__item_content-page"><?php the_archive_title();?></p>
			<?php if($price) { ?><p class="cards__item_content-price"><?php echo $price; ?> EUR</p><?php } ?>
			<?php if($rooms) { ?><p><span>Ilość pokoi: </span><?php echo $rooms;?></p><?php } ?> 
			<?php if($area) { ?><p><span>Powierzchnia: </span>od <?php echo $area;?> m<sup>2</p><?php } ?> 
		</div>
	</div>
</a>


	

	
