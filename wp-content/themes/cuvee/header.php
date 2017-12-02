<?php
/**
 * The header for theme
 *
 * This is the template that displays all of the <head>
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> <?php wp_title(" | ", true); ?></title>
    <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7299932/7759192/css/fonts.css" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="header-wrapper">
    <div class="container-fluid">
        <header class="header">
            <span class="header__address"><?php echo get_field('address', 'option')?></span>
            <?php if ( has_nav_menu( 'top' ) ) : ?>
            <div class="header__menu">
                <?php wp_nav_menu( array(
                    'theme_location' => 'top',
                    'menu_id'        => 'top-menu',
                    'after'          => '<i></i>'
                ) ); ?>
            </div>
            <div class="menu-btn">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <?php endif; ?>
        </header>
    </div>
</div>

