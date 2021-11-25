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
$id = 'bp__faqLines-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__faqLines';
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
$faqLines = get_field('faqLines');
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
	<div class="container">
	<?php if( have_rows('faqLines') ): ?>
		
		<div class="row">
			<div class="col-lg-24">
			<?php while( have_rows('faqLines') ): the_row();
				?>

				<?php if( have_rows('faq') ): ?>
					<?php while( have_rows('faq') ): the_row();	
					?>
						<?php echo "<ul class='bp__faq'>" ?>
						<?php include '_faq.php'; ?>
						<?php echo "</ul>" ?>
					<?php endwhile; ?>
				<?php endif; ?>
			<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
	</div>
</section>