<?php
/**
 * Custom functions
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function builder_template(){
	if ( have_rows( 'builder' ) ) { while ( have_rows( 'builder' ) ) 
		{ the_row();		
			if( get_row_layout() == 'banner'){
				get_template_part('builder-templates/banner');
			} else if( get_row_layout() == 'choose'){
				get_template_part('builder-templates/choose-country');
			} else if( get_row_layout() == 'recomm_usually'){
				get_template_part('builder-templates/recomm-usually');
			} else if( get_row_layout() == 'recomm_vip'){
				get_template_part('builder-templates/recomm-vip');
			} else if( get_row_layout() == 'features'){
				get_template_part('builder-templates/features');
			} 
		}	
	}
}

function banner_template(){
	if ( have_rows( 'style_banner' ) ) { while ( have_rows( 'style_banner') ) 
		{ the_row();		
			if( get_row_layout() == 'slider'){
				get_template_part('builder-templates/banner-templates/slider');
			} else if( get_row_layout() == 'video_bg'){
				get_template_part('builder-templates/banner-templates/video');
			} 
		}	
	}
}

function creat_btn($btn) {
	// var_dump($btn);
	$link = $btn;
	if ( $link ) {
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
		?>
		<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
	<?php } 
}

function creatMainObj($params='') {
	$current_lang = apply_filters( 'wpml_current_language', NULL );
	$main_obj_func = file_get_contents(get_site_url() . '/wp-json/estate/v1/items/?' . $params . '&lang=' . $current_lang);
		return $main_obj_func = json_decode($main_obj_func);
}
 
function creatCardDescr($short_descr, $long_descr) { ?>
	<div class="card__descrptions container">
		<?php if($short_descr) { ?><p class="card__descrptions_descr"><?php echo $short_descr; ?></p><?php } ?>
		<?php if($long_descr) { ?><p class="card__descrptions_description"><?php echo $long_descr; ?></p><?php } ?>
	</div>
<?php }

function creatCardDescrBlocks($bloks_descr) { ?>
	<div class="card__blok-descr">
		<div class="container">
			<?php foreach ($bloks_descr as $key => $block) { ?>
				<div class="card__blok-descr_content <?php if($block['bottom_line']) echo 'border-bottom'?>">
					<h6 class="card__blok-descr_content-title"><?php echo $block['title']; ?></h6>
					<?php echo $block['info'] ?>
				</div>
			<?php }  ?>
		</div>	
	</div>
<?php }
