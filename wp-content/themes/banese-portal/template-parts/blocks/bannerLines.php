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
$id = 'bp__bannerLines-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__bannerLines';
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
$bannerLines = get_field('bannerLines');
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	<div class="container">
	<?php if( have_rows('bannerLines') ): ?>
		<div class="row">
			<?php while( have_rows('bannerLines') ): the_row();
				?>
				<?php
					$bannerQuantity = get_sub_field('bannerQuantity') ?: '';
					$bannerGridQuantity = strval(24 / (int)$bannerQuantity);
					$bannerGridQuantity = "col-lg-$bannerGridQuantity";
				?>

				<?php if( have_rows('banners') ): ?>
					<?php while( have_rows('banners') ): the_row();	
					?>

					<?php
						$bannerUrl = get_sub_field('bannerLink');
						$bannerImage = get_sub_field('bannerImage');
						$bannerHeight = get_sub_field('bannerHeight');
						$bannerHighlight = get_sub_field('bannerHighlight');
						$bannerTitle = get_sub_field('bannerTitle');
						$bannerTitle = strReplaceLine($bannerTitle);
						$bannerText = get_sub_field('bannerText');
						$bannerText = strReplaceLine($bannerText);
						$bannerOverlay = get_sub_field('bannerOverlay');
						$bannerSize = 'xs';
						$bannerFontTitle = 'sm';
						$bannerFontText = 'md';

						if(get_sub_field('bannerHeight') == 'Super' ) {
							$bannerSize = 'xl';
						} else if(get_sub_field('bannerHeight') == 'Grande' ) {
							$bannerSize = 'md';
						} else if(get_sub_field('bannerHeight') == 'Médio' ) {
							$bannerSize = 'sm';
						}
					?>

					<div class="<?php echo ($bannerHighlight == true ? 'col-lg-16' : $bannerGridQuantity); ?>">
						<div class="bp__banner bp__banner--<?php echo esc_attr($bannerSize); ?> <?php echo ($bannerHighlight == true ? 'bp__banner--highlight' : ''); ?> <?php echo ($bannerOverlay == true ? 'bp__banner--transparent' : ''); ?>">
							<div class="bp__banner_content d-flex align-items-start flex-column">
								<?php if ( $bannerTitle ) : ?>	
								<h2 class="bp__title--<?php echo esc_attr($bannerFontTitle); ?> bp__banner_title"><?php echo $bannerTitle ?></h2>
								<?php endif; ?>
								
								<?php if ( $bannerText ) : ?>
								<p class="bp__text--<?php echo esc_attr($bannerFontText); ?> bp__banner_text"><?php echo $bannerText; ?></p>
								<?php endif; ?>
								
								<?php if ( $bannerUrl ) : ?>
								<a href="<?php echo $bannerUrl["url"]; ?>" class="btn btn-primary <?php echo ($bannerHighlight == true ? 'mt-auto' : 'mb-auto'); ?>"><?php echo the_sub_field('bannerLinkTitle'); ?></a>
								<?php endif; ?>
							</div>

							<?php if ( $bannerImage ) : ?>
							<picture>
								<source media="(max-width: 767px)" srcset="<?php echo $bannerImage["sizes"]["large"]; ?>">
								<source media="(min-width: 768px)" srcset="<?php echo $$bannerImage["url"]; ?>">
								<img class="bp__banner_img" title="<?php echo $bannerImage["title"]; ?>" alt="<?php echo $bannerImage["alt"]; ?>" src="<?php echo $bannerImage["url"]; ?>">
							</picture>
							<?php endif; ?>
						</div>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	</div>
</section>