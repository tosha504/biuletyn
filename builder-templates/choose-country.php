<?php
/**
 * Choose-country
 *
 * @package  realestate
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$title = get_sub_field('country');
$title_form = get_sub_field('title_form');
$main_obj = creatMainObj($_SERVER['QUERY_STRING']);

// var_dump($main_obj);?objloc=egypt
// var_dump($_SERVER['QUERY_STRING']); ?>



<?php 
if($main_obj->type === 'objects'){
    // var_dump($main_obj->items);
}
else if ($main_obj->type === 'locations') {
    // !!!! проверить НА ПУСТОТУ !!!
    if (!empty($main_obj->filters->objloc->choices)) { ?>
    <!-- Choose-country start -->
    <!-- <pre><?php var_dump($main_obj->filters->objtype->choices);?></pre> -->
    <form method="get" id="filter" class="container">
                <div class="forma">
                    <div class="forma__title">
                        <h3><?= $title_form; ?></h3>
                    </div>
                   
                    <div class="forma__wrap">
                        <div class="forma__wrap_top">
                            <div class="forma__wrap_top-wraper">
                                <label for="country"><?php _e('Country', 'realestate') ?></label>
                                <select id="country" name="objloc" form="filter">
                                    <?php foreach ($main_obj->filters->objloc->choices as $country) {
                                        echo '<option value="' . $country->slug . '">' . $country->name . '</option>';
                                    }?>
                                </select>
                            </div>

                            <div class="forma__wrap_top-wraper">
                                <label for="type"><?php _e('Property type', 'realestate') ?></label>
                                <select id="type" name="objtype" form="filter">
                                <?php foreach ($main_obj->filters->objtype->choices as $type) {
                                        echo '<option value="' . $type->slug . '">' . $type->name . '</option>';
                                    }?>
                                </select>
                            </div>

                            <div class="forma__wrap_top-wraper">
                                <label for="from_price"><?php _e('Price from', 'realestate') ?></label>
                                <input type="number" name="from_price" id="from_price">
                            </div>

                            <div class="forma__wrap_top-wraper">
                                <label for="to_price"><?php _e('Price to', 'realestate') ?></label>
                                <input type="number" name="to_price" id="to_price">
                            </div>
                        </div>

                        <div class="forma__wrap_bottom">
                        <div class="forma__wrap_bottom-wraper">
                            <label for="from_rooms"><?php _e('Roooms from', 'realestate') ?></label>
                            <input type="number" name="from_rooms" id="from_rooms">
                        </div>
                        
                        <div class="forma__wrap_bottom-wraper">
                            <label for="to_rooms"><?php _e('Roooms to', 'realestate') ?></label>
                            <input type="number" name="to_rooms" id="to_rooms">
                        </div>

                        <div class="forma__wrap_bottom-wraper">
                            <label for="from_area"><?php _e('Area from', 'realestate') ?></label>
                            <input type="number" name="from_area" id="from_area">
                        </div>
                        <div class="forma__wrap_bottom-wraper">
                            <label for="to_area"><?php _e('Area to', 'realestate') ?></label>
                            <input type="number" name="to_area" id="to_area">
                        </div>
                        <div class="forma__wrap_bottom-wraper">
                            <button><?php _e('Search', 'realestate') ?></button>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        <section class="choose">
            <h5 class="choose__title title"><?php echo $title; ?></h5>
            <div class="choose__items">
            <?php foreach($main_obj->filters->objloc->choices as $country) { ?>                
                <a href="<?php echo get_term_link($country->term_id); ?>">
                    <div class="choose__item" <?php echo 'style="background: url(' . wp_get_attachment_image_url( $country->image->ID, 'full') .'); background-repeat: no-repeat;  background-position: center; background-size: cover; "' ; ?>>
                        <div class="overlay"></div>
                        <h3 class="choose__item_title"><?php echo $country->name;?></h3>
                    </div>
                </a>
            <?php } ?>
            </div>
        </section><!-- Choose-country end -->
    <?php }
    else {
        echo 'nifiga net';
    }
}

?>

