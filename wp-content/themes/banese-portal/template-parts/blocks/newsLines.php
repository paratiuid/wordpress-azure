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
$id = 'bp__newsLines-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__newsLines';
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
$newsLines = get_field('newsLines');
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	<div class="container">
	<?php if( have_rows('newsLines') ): ?>
		
		<?php while( have_rows('newsLines') ): the_row();
			$newsTitles = get_sub_field('title');
			$newsTitles = strReplaceLine($newsTitles);
			$newsSubtitle = get_sub_field('subtitle');
			$newsSubtitle = strReplaceLine($newsSubtitle);
			$newsIlustration = get_sub_field('newsIlustration');
			?>
			<div class="row mb-5">
				<div class="col-lg-12">
					<h2 class="bp__title--xl mb-3"><?php echo $newsTitles; ?></h2>
					<p class="bp__text--md"><?php echo $newsSubtitle; ?></p>
				</div>
			</div>

			<div class="row">
				<div class="swiper bp__carousel">
					<div class="swiper-wrapper">
						<?php
							$newsQuantity = get_sub_field('newsQuantity') ?: '';
							$gridQuantity = strval(24 / (int)$newsQuantity);
						?>
						<?php if( have_rows('newsTItles') ): ?><?php endif; ?>
						<?php if( have_rows('cards') ): ?>

							<?php while( have_rows('cards') ): the_row();	
							?>
								<div class="col-lg-<?php echo esc_attr($gridQuantity); ?>">
									<?php include '_card.php'; ?>
								</div>
							<?php endwhile; ?>
							
						<?php endif; ?>
					</div>
				</div>						
			</div>

			<img class="bp__news_bg" src="<?php echo $newsIlustration; ?>">
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</section>