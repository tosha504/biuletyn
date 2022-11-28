<?php
/**
 * Video
 *
 * @package  realestate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; 

$video = get_sub_field('video'); 
// var_dump($video);?>

<!-- Video start -->
<section class="video" >
    <video  autoplay="autoplay" loop="loop" muted="muted" preload="none">
        <source src="<?php echo $video["url"]; ?>" type="video/mp4">
    </video>
</section>
<!-- Video end -->