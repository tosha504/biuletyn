<?php
/**
 * 
 * Template Name: Blog 
 *
 * @package realestate
 */
$blog = new WP_Query([
    'post_type' 		=> 'post', 
    'order'         	=> 'DECS',
    'orderby'       	=> 'date',
	'posts_per_page' 	=> -1,
]);

get_header(); ?>
    <main id="primary" class="site-main">
        <?php 
        echo '<div class="image">' .
            get_the_post_thumbnail() .
        '</div>'; 
        the_title('<h1 class="title container">', '</h1>');
        ?>	
        <section class="blog">
            <div class="container">
                <?php if ( $blog->have_posts() ) : while ($blog->have_posts() ) : $blog->the_post();
                $text = get_the_excerpt();
                $title = get_the_title(); ?>
                    <article class="blog__items">
                        <div class="blog__items_left">
                            <a href="<?php echo get_permalink(); ?>">
                                <img  loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            </a>
                            <a class="btn" href="<?php echo  get_the_permalink(); ?>"><?php _e('więcej', 'realestate'); ?></a>
                        </div>	

                        <div class="blog__items_right">
                            <h3 class="blog__items_right-title"><a href="<?php echo get_permalink(); ?>"><?php echo $title; ?></a></h3>
                            <p class="blog__items_right-except"><?php echo  mb_strimwidth($text , 0 , 279). '...';  ?></p>
                        </div>
                    </article>
                <?php endwhile; endif;  wp_reset_query(); ?>
            </div>	
        </section>
    </main><!-- #main -->
<?php get_footer();