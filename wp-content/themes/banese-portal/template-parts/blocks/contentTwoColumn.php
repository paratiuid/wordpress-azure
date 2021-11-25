<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'bp__contentTwoColumn-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__contentTwoColumn';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if(! function_exists( 'strReplaceLine' )) {
	function strReplaceLine($string) {
		return str_replace("\n","<br class='d-none d-lg-block'/>",$string);
	}
}

// Load values and assign defaults.
$contentTwoColumn = get_field('contentTwoColumn');
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	<div class="container">
		<?php if( have_rows('contentTwoColumn') ): ?>
				<div class="row">
					<?php
						// Check value exists.
						if( have_rows('contentTwoColumn') ):

							// Loop through rows.
							while ( have_rows('contentTwoColumn') ) : the_row();
								
								// Case: Conteúdo do lado esquerdo.
								if( get_row_layout() == 'contentTwoColumnLeft' ):
									$columnLeft = get_sub_field('contentTwoColumnLeftContent');
									echo "<div class='col-lg-12'>".$columnLeft."</div>";

								
								// Case: Conteúdo do lado direito.
								elseif( get_row_layout() == 'contentTwoColumnRight' ): 
									$columnRight = get_sub_field('contentTwoColumnRightContent');
									echo "<div class='col-lg-12'>".$columnRight."</div>";
								endif;

							// End loop.
							endwhile;

						// No value.
						else :
							// Do something...
						endif;
					?>				
				</div>
		<?php endif; ?>
	</div>
</section>