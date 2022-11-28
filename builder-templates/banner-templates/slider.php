<?php
/**
 * Slider
 *
 * @package  realestate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; 

$slides = get_sub_field('slides'); ?>

<!-- Slider start -->
<section class="slider">
    <?php foreach ($slides as $key => $slide) { $content = $slide['content'];?>
    
        <div class="slide" <?php if( $slide['images_slider']){ echo 'style="background: url(' . wp_get_attachment_image_url( $slide['images_slider'], 'full') .'); background-repeat: no-repeat;  background-position: center; background-size: cover; "' ; }?>>
            <div class="overlay"></div>    
            <div class="slide__content">
                <?php if ($content['title']) { ?><h1 class="slide__title">
                    <?php echo $content['title']; ?>
                </h1><?php } ?>
                <?php if ($content['sub_title']) { ?><p class="slide__description"><?php echo $content['sub_title']; ?></p><?php } ?>
                <div class="slide__counter">
                    <button class="click-prev"></button>
                    <?php 
                    $count =  $key + 1; 
                    if($key < 10) { 
                        echo  '0' . $count;
                    } else {
                        echo $count;
                    } ?>
                    <button class="click-next"></button>
                </div>
            </div>
        </div>

    <?php }?>
</section><!-- Slider end -->