<?php
/**
 * Recomm-vip
 *
 * @package  realestate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; 


$background = get_sub_field('background');
$name = get_sub_field('name');
$title = get_sub_field('title');
$descr = get_sub_field('descr');
$contact = get_sub_field('contact');
$button = get_sub_field('button');
// var_dump($button)?>
<!-- Recomm-vip start -->
<section id="vip" class="vip" <?php if( $background){ echo 'style="background: url(' . wp_get_attachment_image_url( $background, 'full') .')no-repeat center/cover"' ; }?>>
    <div class="container">
        <div class="vip__content">
            <?php if($name) { ?><h3 class="vip__content_title title"><?Php echo $name; ?></h3><?php } ?>
            <div class="vip__content_wrap">
                <?php if($title) { ?><h4 class="vip__content_wrap-title"><?php echo $title; ?></h4><?php } ?>
                <?php if($descr) { ?><p class="vip__content_wrap-descr"><?php echo $descr; ?></p><?php } ?>
                <?php if($contact) { ?><p class="vip__content_wrap-cont"><?php echo $contact; ?></p><?php } ?>
                <?php
                $link = $button;
                if ( $link ) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- Recomm-vip end -->


 

