<?php
/**
 * Template Name: Page with container
 */
// $page_title = get_field('page_title');
// $page_title = !empty( $page_title ) ? $page_title : 'hide';
?>

<?php get_header()?>
    <section class="pd-pagebanner" style="background-image: url('<?php echo $banner_image;?>');">
        <div class="container">
            <div class="pd-pagebanner-content">
                <h1 class="pd-pagebanner-content__title"><?php the_title();?></h1>
            </div>
        </div>
    </section>
    <div class="main__content page-with-container">
        <section class="basic-header">
            <div class="container">
                <h1 class="h3"><?php the_title();?></h1>
            </div>
        </section>
        <div class="page-content container">
            <div>
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