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
$id = 'bp__cardLines-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__cardLines';
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
$cardLines = get_field('cardLines');
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	<div class="container">
	<?php if( have_rows('cardLines') ): ?>
		
		<div class="row">
			<?php while( have_rows('cardLines') ): the_row();
				?>
				<?php
					$cardQuantity = get_sub_field('cardQuantity') ?: '';
					$gridQuantity = strval(24 / (int)$cardQuantity);
				?>
				<?php if( have_rows('cards') ): ?>
					<?php while( have_rows('cards') ): the_row();	
					?>

					<div class="col-lg-<?php echo esc_attr($gridQuantity); ?>">
						<?php include '_card.php'; ?>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	</div>
</section>