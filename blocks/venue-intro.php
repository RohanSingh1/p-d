<?php 
global $post;
$intro_title = get_field( 'intro_title' );
$intro_description = get_field( 'intro_description' );
$intro_button = get_field( 'intro_button' );
$brand_color = get_field( 'brand_color', $post->ID );
?>
<section class="pd-intro" style="background-color: <?php echo $brand_color;?>;">
    <div class="container">
        <div class="pd-intro-content">
            <?php if( $intro_title ): ?>
                <h2 class="pd-intro-content__title"><?php echo $intro_title;?></h2>
            <?php endif; 
            if( $intro_description ): ?>
                <div class="pd-intro-content__description">
                    <?php echo $intro_description;?>
                </div>
            <?php endif;
            if( $intro_button ): ?>
                <div class="pd-intro-content__button">
                    <?php //pd_acf_link( $intro_button, 'pd_button pd_button_bg--transparent');?>
                    <button  id="sr-res-root" class="pd_button pd_button_bg--transparent">Book a Table</button>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>