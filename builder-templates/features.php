<?php
/**
 * Features template
 *
 * @package  realestate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; 


$features_chosse = get_sub_field('features_chosse'); ?>
<!-- Features start -->
<section class="category">
    <?php 
    foreach ($features_chosse as $key => $obj_feat_once) { 
        $image = get_field('image', 'term_' . $obj_feat_once->term_id)['url']; ?>
        <a href="<?php echo get_term_link($obj_feat_once->term_id); ?>" class="category__item" 
        <?php if( $image ){ echo 'style="background: url(' . $image .'); background-repeat: no-repeat;  background-position: center; background-size: cover; "' ; }?>>
        <div class="overlay"></div>
            <div>
                <h5><span><?php echo $obj_feat_once->name?></span></h5>
            </div>
         </a>
    <?php } ?>
</section>
<!-- Features end -->