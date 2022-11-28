<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package realestate
*/
 

$current_id =  get_the_ID();
$price = get_field( "from_price", $current_id );
$town = get_field( "town", $current_id );
$from_area = get_field( "from_area", $current_id );
$to_area = get_field( "to_area", $current_id );
$from_rooms = get_field( "from_rooms", $current_id ); 
$to_rooms = get_field( "to_rooms", $current_id ); 
$descr = get_field( "descr", $current_id ); 
$mini_descr = get_field( "mini_descr", $current_id ); 
$blok_descr = get_field( "blok_descr", $current_id ); 
$images = get_field( "images", $current_id ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card"   style="background: url(' <?php  echo the_post_thumbnail_url(); ?>'); background-repeat: no-repeat;  background-position: center; background-size: cover; " ; >
	</div>

	<div class="card__items container">
		<?php 
		$terms_objloc = get_the_terms( $current_id , 'objloc' );
		$terms_objtype = get_the_terms( $current_id , 'objtype' ); ?>
		<div class="card__items_item">
			<?php the_title( '<h1 class="card__items_title">', '</h1>' ); ?> 
			<?php if($terms_objloc) { ?><p class="card__items_item-country"><?php echo  $terms_objloc[0]->name; ?></p><?php } ?>
			<?php if($price) { ?><p class="card__items_item-price">EUR <?php echo  $price; ?></p><?php } ?>
		</div>
		
		<div class="card__items_item">
		 	<?php if($town) { ?><p class="card__items_item-cities"><?php echo  $town; ?></p><?php } ?>
			<?php if($terms_objloc) { ?><p class="card__items_item-location"><?php echo  $terms_objloc[0]->name; ?></p><?php } ?>
			<?php if(!empty($from_rooms) && !empty($to_rooms)) { ?><p><?php echo '<span>' . $terms_objtype[0]->name ; _e(' rooms from :', 'realestate') .'</span> ' . $from_rooms . '-'. $to_rooms; ?></p><?php } else if(!empty($from_rooms)) { ?>
				<p><?php echo '<span>' . $terms_objtype[0]->name ; _e(' rooms :', 'realestate') . '</span> ' . $from_rooms ; ?></p>
			<?php } ?>
			<?php if(!empty($from_area) && !empty($to_area)) { ?><p><?php echo '<span>' . _e('Area from :', 'realestate') . '</span> ' . $from_area ; _e(' to ', 'realestate') ; $to_area; ?> m<sup>2</p><?php } else if(!empty($from_area)) {
				?><p><?php echo '<span>' . _e('Area :', 'realestate') . '</span> ' . $from_area; ?> m<sup>2</p><?php } ?>
		</div>

		<div class="card__items_item">
			<a class="btn" href="#gallery" ><?php _e('Gallery', 'realestate') ?></a>
			<a class="btn" href="#contact" ><?php _e('Send a question', 'realestate') ?></a>
			<a class="btn__white" href="#colophon" ><?php _e('Call us', 'realestate') ?></a>
		</div>
	</div>
	
	<!-- <div class="card__descrptions container">
		<?php if($descr) { ?><p class="card__descrptions_descr"><?php echo $descr; ?></p><?php } ?>
		<?php if($mini_descr) { ?><p class="card__descrptions_description"><?php echo $mini_descr; ?></p><?php } ?>
	</div> -->
	<?php echo creatCardDescr($descr, $mini_descr); ?>

	<!-- <div class="card__blok-descr">
		<div class="container">
			<?php 
				if($blok_descr) {
				foreach ($blok_descr as $key => $block) { ?>
				<div class="card__blok-descr_content <?php if($block['bottom_line']) echo 'border-bottom'?>">
					<h6 class="card__blok-descr_content-title"><?php echo $block['title']; ?></h6>
					<?php echo $block['info'] ?>
				</div>
			<?php } } ?>
		</div>	
	</div> -->

	<?php echo creatCardDescrBlocks($blok_descr) ?>
	
	<?php if($images) { ?>
	<div class="card__wrap">
		<div class="card__wrap_info">
			<h5 class="card__wrap_info-pretitle"><?php _e('Gallery', 'realestate') ?></h5>
			<?php the_title( '<h5 class="card__wrap_info-title">', '</h5>' ); ?>
			<div id="countSliderGallery"></div>
			<div id="dotsSliderGallery"></div>
		</div>

		<div id="gallery" class="card__wrap_gallery owl-carousel">
			<?php 
			foreach ($images as $key => $image) { ?>
			<a href="<?php echo wp_get_attachment_image_url( $image['ID'], 'full'); ?>" data-fancybox="gallery">
				<?php echo wp_get_attachment_image( $image['ID'], 'full');?>
			</a>
			<?php } ?>
		</div>
	</div>

	<?php } ?>	
</article><!-- #post-<?php the_ID(); ?> -->
