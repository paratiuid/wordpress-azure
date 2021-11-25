<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Portal_Banese
 * @since Portal Banese 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav class="bp__header">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="bp__header_brand">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</div>