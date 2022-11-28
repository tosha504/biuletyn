<?php 
$post_images = get_field('post_images', 'options');
$title_page = get_field('title_page', 'options');
?>

<article id="<?php echo get_the_ID();?>">
    <div class="image">   
        <?php echo wp_get_attachment_image( $post_images , 'full'); ?>
    </div>
    <div class="container">
        <h1 class="main-title"><?php echo $title_page; ?></h1>
        <div class="wrap">
            <?php 
            echo '<div class="float-img">';
            the_post_thumbnail();
            echo '</div>';

            the_content();?>
        </div>
    </div> 
    
</article><!-- #main -->
