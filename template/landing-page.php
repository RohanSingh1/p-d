<?php
/**
 * Template Name: Landing Page
 */
?>

<?php get_header()?>
    <div class="pd-landing-page">
        <header class="masthead <?php echo is_404() ? 'header__bg' : '';?>">
            <div class="container">
                <!-- Logo Centered -->
                <div class="masthead__inner-center masthead__inner-col">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home"
                        aria-current="page">
                        <?php echo pd_svg('logo');?>
                    </a>
                </div>
            </div>
        </header>
        <div class="main__content page-with-container">
            <div class="page-content container">
                <?php 
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    }
                }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>