<?php 
$section_title = get_field( 'section_title' );
$gravity_form_shortcode = get_field( 'gravity_form_shortcode' );
if( !empty( $gravity_form_shortcode ) ):
?>
    <section id="contact" class="pd-contactform">
        <div class="container">
            <?php 
            if( $section_title ): ?>
                <h2 class="pd-contactform__title">
                    <?php echo $section_title;?>
                </h2>
            <?php endif;
            if( $section_title ): ?>
                <div class="pd-contactform-form">
                    <?php echo do_shortcode($gravity_form_shortcode);?>
                </div>
            <?php endif;?>
        </div>
    </section>
<?php
endif;?>