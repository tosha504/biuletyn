<?php
/**
 * Recomm-usually
 *
 * @package  realestate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$title = get_sub_field('title');
$slides = get_sub_field('recommended');
// var_dump($slides);
if( $slides ){ ?>
<!-- Recomm-usually start -->
<section class="usually">
    <?php if ($title) { ?><h4 class="usually__title title"><?php echo $title; ?></h4><?php } ?>
    <div class="usually__slider">
        <?php 
            foreach( $slides as $key => $post ){ 
            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post);
            $price = get_field( "from_price", $post->ID );
            $town = get_field( "town", $post->ID );
            $terms_objloc = get_the_terms( $post->ID , 'objloc' );
            // foreach ($terms_objloc as $subKey => $terms_objloc) {
            //     // var_dump($terms_objloc->name);
            // }
            // var_dump($term->name); ?>
                <div class="usually__slider_slide" <?php echo 'style="background: url(' . get_the_post_thumbnail_url( $post->ID, 'full') .'); background-repeat: no-repeat;  background-position: center; background-size: cover; "' ; ?>>
                <div class="overlay"></div>
                    <div class="container">
                        <div class="usually__slider_slide-content">
                            <h3><?php the_title(); ?>|<span><?php if ($town) echo $town . ','; ?><?php echo $terms_objloc[0]->name; ?></span></h3>
                            <p>EUR <?php echo $price;?></p>
                            <a class="btn" href="<?php the_permalink(); ?>">Zobacz</a>  
                        </div>
                        
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
            <?php } 
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata();  
        } ?>
    </div>
</section><!-- Recomm-usually end -->