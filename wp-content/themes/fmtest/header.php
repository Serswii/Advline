<?php
/**
 * Header file for the Test.
 *
 *
 * @package WordPress
 * @subpackage Test
 * @since Test 1.0
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<input id="check-menu" type="checkbox">
<div id="wrapper">
    <div class="w1">
<header id="header">
    <div class="container">
        <div class="header-hold"><a class="logo" href="/"><?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) {
                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                } ?></a>
            <nav id="nav">
                <div class="menu-wrap">
                    <div class="menu-holder">
                        <?php
                        wp_nav_menu([
                                'theme_location' => 'header_menu',
                                'menu' => '',
                                'container'=> false,
                                'walker' => new Fmtest_Menu(),

                        ]) ?>
                        <ul class="switch-lang">
                            <li class="active"><a href="#">RU</a></li>
                            <li><a href="#">ENG</a></li>
                        </ul>
                    </div>
                </div>
                <label class="toogle-menu" for="check-menu"><span></span><span></span></label><a class="login-btn" href="login.html"><b>Вход для друзей</b>
                    <figure><svg width="15" height="20" viewBox="0 0 15 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="hover-stroke" d="M2.77987 9.05249C1.96731 9.05249 1.30859 9.7112 1.30859 10.5238V12.2443C1.30859 15.6918 4.1033 18.4865 7.55075 18.4865C10.9982 18.4865 13.7929 15.6918 13.7929 12.2443V10.5238C13.7929 9.7112 13.1342 9.05249 12.3216 9.05249H2.77987Z" stroke="#20203C" stroke-width="1.5"/>
                            <path class="hover-stroke" d="M11.2583 9.41351V5.03803C11.2583 2.99042 9.5984 1.33051 7.55079 1.33051V1.33051C5.50318 1.33051 3.84326 2.99042 3.84326 5.03803V9.41351" stroke="#20203C" stroke-width="1.5"/>
                            <circle cx="7.55084" cy="12.4848" r="1.37408" fill="#20203C"/>
                            <path class="hover-stroke" d="M7.51758 12.5656V14.9366" stroke="#20203C" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </figure></a>
            </nav>
        </div>
    </div>
</header>