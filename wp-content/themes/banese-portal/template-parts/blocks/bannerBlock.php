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
$id = 'bp__bannerBlock-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__bannerBlock';
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
$bannerLead = get_field('bannerLead') ?: 'Digite o lead do banner';
$bannerTitle = get_field('bannerTitle') ?: '';
$bannerTitle = strReplaceLine($bannerTitle);
$bannerLinkTitle = get_field('bannerLinkTitle') ?: '';
$bannerLink = get_field('bannerLink') ?: '';
$bannerImage = get_field('bannerImage') ?: '';
$bannerHeight = get_field('bannerHeight') ?: '';
$bannerSize = '';

if(get_field('bannerHeight') == 'Super' ) {
    $bannerSize = 'xl';
} else if(get_field('bannerHeight') == 'Grande' ) {
	$bannerSize = 'md';
} else if(get_field('bannerHeight') == 'Médio' ) {
	$bannerSize = 'sm';
} else {
	$bannerSize = 'xs';
}
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
    <div class="container">
		<div class="bp__banner bp__banner--<?php echo esc_attr($bannerSize); ?>">
			<div class="bp__banner_content d-flex align-items-start flex-column">
				<?php if ( $bannerLead ) : ?>
					<p class="bp__text--xl bp__banner_text"><?php echo $bannerLead; ?></p>
				<?php endif; ?>

				<?php if ( $bannerLead ) : ?>
					<h2 class="bp__display--xs bp__banner_title"><?php echo $bannerTitle; ?></h2>
				<?php endif; ?>

				<?php if ( $bannerLink ) : ?>
					<a href="<?php echo $bannerLink["url"]; ?>" class="btn btn-primary btn-lg mt-auto"><?php echo $bannerLinkTitle; ?></a>
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
</section>