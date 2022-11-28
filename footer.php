<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package realestate
 */

//pre-footer
$pre_footer = get_field('pre_footer', 'options'); 
$pre_footer_title = $pre_footer['title']; 
$short_code = $pre_footer['short_code']; 

//media
$media = get_field('media', 'options');
$background = $media['background'];
$title = $media['title'];
$text = $media['text'];
$descr = $media['descr'];
$button = $media['button'];
$images = $media['images'];

//footer
$bg_image = get_field('footer_bg', 'options');
$footer_left = get_field('footer_left', 'options');
$newsletter = get_field('newsletter', 'options');

// var_dump($images)?>
	<!-- Pre-footer start-->
	<section id="contact" class="pre-footer">
		<div class="form">
			<?php if($pre_footer_title) { ?><h3 class="form__title"><?php echo $pre_footer_title; ?></h3><?php } ?>
			<div class="form__container">
				<div class="container">
					<?php echo do_shortcode($short_code); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- Pre-footer end-->

	<!-- Media start-->
	<?php if ( is_front_page() ) { ?> 
		<section id="medias" class="media" <?php if( $background){ echo 'style="background: url(' .wp_get_attachment_image_url( $background, 'full') .')no-repeat center/cover"' ; }?>>
			<div class="container">
				<?php if($title) { ?><h4 class="media__title"><?php echo $title; ?></h4><?php } ?>
				<?php if($text) { ?><p class="media__text"><?php echo $text; ?></p><?php } ?>
				<?php if($descr) { ?><p class="media__descr"><?php echo $descr; ?></p><?php } ?>
				<?php if($button) creat_btn($button); ?>
				<?php if($images) { ?>
					<div class="media__icons">
						<?php foreach ($images as $key => $image) {
							// var_dump($image );?>
							<div class="media__icons_icon">
								<?php echo wp_get_attachment_image( $image['image'] , 'full'); ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
	<?php } ?>
	<!-- Media end-->

	<!-- Footer start-->
	<footer id="colophon" class="footer" <?php if( $bg_image){ echo 'style="background: url(' .wp_get_attachment_image_url( $bg_image, 'full') .')no-repeat center/cover"' ; }?>>
	<div class="overlay"></div>
		<div class="footer__container container">
			<div class="footer__left">
				<?php if($footer_left['name']) { ?><p class="footer__left_name"><?php echo $footer_left['name']; ?></p><?php } ?>
				<?php if($footer_left['phones']) { ?>
					<div class="footer__left_phones">
						<?php foreach ($footer_left['phones'] as $key => $phone) { 
						$phoneNum = $phone['number']; 
						$phoneLink = preg_replace('/[^0-9]/', '', $phone['number']); ?>
							<a href="tel:+<?php echo $phoneLink; ?>"><?php echo $phoneNum; ?></a>
						<? } ?>
					</div>
				<?php } ?>
				<?php if($footer_left['email']) { ?>
					<div class="footer__left_mail">
						<a href="mailto:<?php echo $footer_left['email']; ?>" ><?php echo $footer_left['email']; ?></a>
					</div>
				<?php } ?>
				<?php if($footer_left['phones']) { ?>
					<div class="footer__left_socials">
						<?php foreach ($footer_left["social_links"] as $key => $social) { ?>
							<a href="<?php echo $social['link']; ?>"><?php echo wp_get_attachment_image( $social['icon'], 'full'); ?></a>
						<? } ?>
					</div>
				<?php } ?>
			</div>

			<div class="footer__newsletter">
				<?php if($newsletter['title']) { ?><h4 class="footer__newsletter_title"><?php echo $newsletter['title']; ?></h4><?php } ?>
				<?php if($newsletter['descr']) { ?><p class="footer__newsletter_subtitle"><?php echo $newsletter['descr']; ?></p><?php } ?>
				<input type="email" placeholder="Adres e-mail">
				<?php echo creat_btn($newsletter['button']); ?>
			</div>

		</div>	
	</footer><!-- Footer end -->
</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>
