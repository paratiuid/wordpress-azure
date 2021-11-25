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
$id = 'bp__brandLines-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__brandLines';
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
$brandLines = get_field('brandLines');
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	<div class="container">
	<?php if( have_rows('brandLines') ): ?>
		
		<?php while( have_rows('brandLines') ): the_row();
			$brandTitles = get_sub_field('title');
			$brandTitles = strReplaceLine($brandTitles);
			$brandSubtitle = get_sub_field('subtitle');
			$brandSubtitle = strReplaceLine($brandSubtitle);
			?>
			<div class="row">
				<div class="col-lg-12">
					<h2 class="bp__title--xl mb-3"><?php echo $brandTitles; ?></h2>
					<p class="bp__text--md mb-5"><?php echo $brandSubtitle; ?></p>
				</div>
				<div class="col-lg-12">
					<div class="d-flex flex-wrap justify-content-between">
						<?php if( have_rows('brands') ): ?>
							<?php while( have_rows('brands') ): the_row();
								$brandsItems = get_sub_field('brand');
							?>
								<img class="me-lg-5 mb-5" title="<?php echo $brandsItems["title"]; ?>" alt="<?php echo $brandsItems["alt"]; ?>" src="<?php echo $brandsItems["url"]; ?>">
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</section>