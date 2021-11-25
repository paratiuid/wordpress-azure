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
$id = 'bp__cardBlock-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__cardBlock';
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
$cardMedia = get_field('cardMedia') ?: '';
$cardCalendar = get_field('cardCalendar') ?: '';
$cardTitle = get_field('cardTitle') ?: '';
$cardTitle = strReplaceLine($cardTitle);
$cardText = get_field('cardText') ?: '';
$cardText = strReplaceLine($cardText);
$cardLink = get_field('cardLink') ?: '';
$cardLinkTitle = get_field('cardLinkTitle') ?: '';
$cardButtonType = get_field('cardButtonType') ?: '';
$cardBackgroundType = get_field('cardBackgroundType') ?: '';
$cardBorderType = get_field('cardBorderType') ?: '';
$cardLinkType = '';

if(get_sub_field('cardButtonType') == 'Link' ) {
	$cardLinkType = '';
} else if(get_sub_field('cardButtonType') == 'Botao' ) {
	$cardLinkType = 'btn btn-secondary';
}

if(get_sub_field('cardBorderType') == 'Verde' ) {
	$cardBorderType = 'bp__card--border-green';
} else if(get_sub_field('cardBorderType') == 'Cinza' ) {
	$cardBorderType = 'bp__card--border-gray';
}
?>

<div class="bp__card <?php echo ($cardBackgroundType != "" ? 'bp__card--xl bp__card--green d-flex flex-column' : ''); ?> <?php echo ($cardBorderType != "" ? esc_attr($cardBorderType) : ''); ?>" id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	<span class="bp__card_icon">
		<img title="<?php echo $cardMedia["title"]; ?>" alt="<?php echo $cardMedia["alt"]; ?>" src="<?php echo $cardMedia["url"]; ?>">
	</span>
	<?php if ( $cardTitle ) : ?>
		<p class="bp__title--xs"><?php echo $cardTitle; ?></p>
	<?php endif; ?>
	<?php if ( $cardText ) : ?>
		<p class="bp__text--lg"><?php echo $cardText; ?></p>
	<?php endif; ?>
	<?php if ( $cardLinkTitle ) : ?>
		<a href="#" class="<?php echo esc_attr($cardLinkType); ?> d-flex flex-column mt-auto"><?php echo $cardLinkTitle; ?></a>
	<?php endif; ?>
</div>