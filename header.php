<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

    <head>
        <meta HTTP-EQUIV="Content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;IE=Edge,chrome=1" />
        <title><?php wp_title(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); 
        get_template_part('template-parts/page', 'loader' );
        ?>
        <div id="page" class="site">

            <header id="masthead" class="masthead <?php echo is_404() ? 'header__bg' : '';?>">
                <div class="container">
                    <div class="masthead__inner">
                        <!-- Hamburger Menu -->
                        <div class="masthead__inner-left masthead__inner-col">
                            <div class="ham-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <!-- Logo Centered -->
                        <div class="masthead__inner-center masthead__inner-col">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home"
                                aria-current="page">
                                <?php echo pd_svg('logo');?>
                            </a>
                        </div>
                        <!-- CTA Button -->
                        <div class="masthead__inner-right masthead__inner-col">
                            <a href="javascript:void(0);" class="pd_button pd_button_bg--transparent open-megamenu-venue">
                                <?php esc_html_e('Book', 'paisanoanddaughters'); ?>
                            </a>
                            <span class="close-megamenu"><?php echo pd_svg('close');?></span>
                        </div>
                    </div>
                </div>
                <div class="masthead__popup">
                    <!-- Navigation -->
                    <nav id="site-navigation" class="main-navigation" aria-label="Main Menu">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header',
                                'menu_id'        => 'primary-menu',
                                'container_class' => 'menu-main-menu-container',
                            )
                        );
                        ?>
                    </nav>
                </div>
            </header>

            <section class="pd-megamenu">
                <div class="container">
                    <div class="pd-megamenu__body">
                        <?php
                        $venue_lists = get_field( 'venue_lists', 'option' );
                        foreach ( $venue_lists as $venue_id ){
                            $attachment_id = get_post_thumbnail_id( $venue_id );
                            $featured_image = wp_get_attachment_image_url( $attachment_id, 'full' );
                            // print_r($featured_image);
                            $brand_image = get_field( 'brand_image', $venue_id );
                            $brand_color = get_field( 'brand_color', $venue_id );
                            $venue_link = get_the_permalink($venue_id);
                            $venue_name = get_the_title($venue_id); ?>
                            <div class="pd-megamenu__venue">
                                <div class="pd-megamenu__venue__image" style="background-image: url('<?php echo $featured_image;?>');">
                                    <a href="<?php echo $venue_link; ?>" class="pd-overlay-link"></a>
                                    <img src="<?php echo $brand_image;?>" alt="<?php echo $venue_name;?>"/>
                                    <div class="pd-megamenu__venue__image__overlay" style="background-color: <?php echo $brand_color;?>"></div>
                                </div>
                                <div class="pd-megamenu__venue__links">
                                    <a class="pd-megamenu__venue__link" href="<?php echo get_the_permalink($venue_id); ?>">View Venue</a><br/>
                                    <a class="pd-megamenu__venue__link" href="<?php echo get_the_permalink($venue_id); ?>/?popup=book">Book a table</a>
                                </div>
                            </div>
                            <?php
                        }
                        $custom_venue = get_field( 'custom_venue', 'option' );
                        $featured_image = isset( $custom_venue['background_image'] ) ? $custom_venue['background_image'] : '';
                        $brand_image = isset( $custom_venue['venue_logo'] ) ? $custom_venue['venue_logo'] : '';
                        $background_color = isset( $custom_venue['background_color'] ) ? $custom_venue['background_color'] : '';
                        $view_link = isset( $custom_venue['view_venue_link'] ) ? $custom_venue['view_venue_link'] : array();
                        $book_venue_link = isset( $custom_venue['book_venue_link'] ) ? $custom_venue['book_venue_link'] : array();
                        $venue_name = 'Austral Street Suites';
                        if( $custom_venue ):?>    
                            <div class="pd-megamenu__venue custom-venue">
                                <div class="pd-megamenu__venue__image" style="background-image: url('<?php echo $featured_image;?>');">
                                    <a href="<?php echo $venue_link; ?>" class="pd-overlay-link"></a>
                                    <img src="<?php echo $brand_image;?>" alt="<?php echo $venue_name;?>"/>
                                    <div class="pd-megamenu__venue__image__overlay" style="background-color: <?php echo $background_color;?>"></div>
                                </div>
                                <div class="pd-megamenu__venue__links">
                                    <?php echo pd_acf_link($view_link, 'pd-megamenu__venue__link');?><br/>
                                    <?php echo pd_acf_link($book_venue_link, 'pd-megamenu__venue__link');?>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </section>
            <div class="pd-megamenu__overlay"></div>