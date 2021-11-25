<?php
	$cardQuantity = get_sub_field('cardQuantity') ?: '';			 
	$cardMedia = get_sub_field('cardMedia') ?: '';
	$cardCalendar = get_sub_field('cardCalendar') ?: '';
	$cardTitle = get_sub_field('cardTitle') ?: '';
	$cardTitle = strReplaceLine($cardTitle);
	$cardText = get_sub_field('cardText') ?: '';
	$cardText = strReplaceLine($cardText);
	$cardLink = get_sub_field('cardLink') ?: '';
	$cardLinkTitle = get_sub_field('cardLinkTitle') ?: '';
	$cardButtonType = get_sub_field('cardButtonType') ?: '';
	$cardBackgroundType = get_sub_field('cardBackgroundType') ?: '';
	$cardBorderType = get_field('cardBorderType') ?: '';
	$cardLinkType = '';
	$cardNews = get_sub_field('cardNews') ?: '';
	$cardFontTitle = 'xs';
	$cardFontText = 'lg';
	
	if(get_sub_field('cardButtonType') == 'Texto' ) {
		$cardLinkType = 'bp__card_link';
	} else if(get_sub_field('cardButtonType') == 'Botao' ) {
		$cardLinkType = 'btn btn-secondary';
	}

	if(get_sub_field('cardBackgroundType') == 'Verde claro' ) {
		$cardBackgroundType = 'bp__card--green';
	} else if(get_sub_field('cardBackgroundType') == 'Verde escuro' ) {
		$cardBackgroundType = 'bp__card--green-dark';
	} else {
		$cardBackgroundType = '';
	}

	if(get_sub_field('cardBorderType') == 'Verde' ) {
		$cardBorderType = 'bp__card--border-green';
	} else if(get_sub_field('cardBorderType') == 'Cinza' ) {
		$cardBorderType = 'bp__card--border-gray';
	} else {
		$cardBorderType = '';
	}

	if(get_sub_field('cardNews') == true ) {
		$cardFontTitle = 'sm';
	}
?>

<div class="bp__card <?php echo ($cardBackgroundType != "" ? esc_attr($cardBackgroundType) : ''); ?><?php echo ($cardNews == true ? 'bp__card_news' : ''); ?> <?php echo ($cardBorderType != "" ? esc_attr($cardBorderType) : ''); ?>" id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	
	<?php if ( $cardMedia ) : ?>	
		<span class="<?php echo ($cardNews == true ? 'bp__card_img' : 'bp__card_icon mb-2'); ?>">
			<img title="<?php echo $cardMedia["title"]; ?>" alt="<?php echo $cardMedia["alt"]; ?>" src="<?php echo $cardMedia["url"]; ?>">
		</span>
	<?php endif; ?>

	<div class="bp__card_content <?php echo ($cardBackgroundType != "Branco" ? 'd-flex flex-column' : ''); ?>">
		<?php if ( $cardCalendar ) : ?>
			<p class="bp__text--xs mb-3"><?php echo $cardCalendar ?></p>
		<?php endif; ?>

		<?php if ( $cardTitle ) : ?>
			<p class="bp__title--<?php echo esc_attr($cardFontTitle); ?> mb-2"><?php echo $cardTitle ?></p>
		<?php endif; ?>

		<?php if ( $cardText ) : ?>
			<p class="bp__text--<?php echo esc_attr($cardFontText); ?> mb-3"><?php echo $cardText ?></p>
		<?php endif; ?>

		<?php if ( $cardLinkTitle ) : ?>
			<a href="#" class="<?php echo esc_attr($cardLinkType); ?> d-flex flex-column mt-auto"><?php echo the_sub_field('cardLinkTitle'); ?></a>
		<?php endif; ?>
	</div>

</div>