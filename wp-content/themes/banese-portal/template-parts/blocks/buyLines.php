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
$id = 'bp__buyLines-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__buyLines';
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
$buyLines = get_field('buyLines');
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	<div class="container">
	<?php if( have_rows('buyLines') ): ?>
		
		<?php while( have_rows('buyLines') ): the_row();
			$buyTitles = get_sub_field('title');
			$buyTitles = strReplaceLine($buyTitles);
			$buySubtitle = get_sub_field('subtitle');
			$buySubtitle = strReplaceLine($buySubtitle);
			$buyLinkTitle = get_sub_field('buyLinkTitle') ?: '';
			$buyLink = get_sub_field('buyLink') ?: '';
			?>
			<div class="row">
				<div class="col-lg-12">
					<h2 class="bp__title--xl mb-3"><?php echo $buyTitles; ?></h2>
					<p class="bp__text--md"><?php echo $buySubtitle; ?></p>
				</div>
			</div>

			<div class="row">
				<?php
					// Check value exists.
					if( have_rows('buyContainer') ):

						// Loop through rows.
						while ( have_rows('buyContainer') ) : the_row();
							
							// Case: Conteúdo do lado esquerdo.
							if( get_row_layout() == 'buyContainerLeft' ):
								$columnLeft = get_sub_field('buyContainerLeftContent');
								echo "<div class='col-lg-12'>".$columnLeft."</div>";

							
							// Case: Conteúdo do lado direito.
							elseif( get_row_layout() == 'buyContainerRight' ): 
								$columnRight = get_sub_field('buyContainerRightContent');
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

			<div class="row mt-5">
				<div class="col-lg-12">
					<a href="<?php echo $buyLink["url"]; ?>" class="btn btn-primary btn-lg d-block"><?php echo $buyLinkTitle; ?></a>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</section>