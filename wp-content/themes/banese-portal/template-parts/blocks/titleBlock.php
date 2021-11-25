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
$id = 'bp__titleBlock-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bp__titleBlock';
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
$title = get_field('title') ?: 'Digite o título do bloco';
$title = strReplaceLine($title);
$subTitle = get_field('subtitle') ?: '';
$subTitle = strReplaceLine($subTitle);
?>

<section id="<?php echo esc_attr($id); ?>" class="bp__block <?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="bp__title--xl <?php echo ($subTitle != null ? 'mb-3' : ''); ?>"><?php echo $title; ?></h2>
                
                <?php if ( $subTitle ) : ?>
                    <p class="bp__text--md"><?php echo $subTitle ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>