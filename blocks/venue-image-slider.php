<?php 
$image_lists = get_field( 'image_lists' );
?>
<section class="pd-image-slider">
    <div class="pd-image-slider__element owl-carousel">
        <?php 
        foreach( $image_lists as $image_id ): 
            $img_url = wp_get_attachment_image_url( $image_id, 'full' );
            ?>
            <div class="pd-image-slider__element" style="background-image: url('<?php echo $img_url;?>');"></div>
        <?php endforeach;?>
    </div>
</section>