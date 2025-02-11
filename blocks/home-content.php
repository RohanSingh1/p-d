<?php 
$title = get_field('title');
$subtitle = get_field('subtitle');
$content = get_field('content');
?>
<section class="pd-home-content">
    <div class="container">
        <?php if( $title ): ?>
            <div class="pd-home-title">
                <h2 class="pd-home-content__title"><?php echo $title;?></h2>
            </div>
        <?php endif; 
        if( $subtitle ): ?>
            <div class="pd-home-subtitle">
                <h6 class="pd-home-content__subtitle"><?php echo $subtitle;?></h6>
            </div>
        <?php endif;
        if( $title ): ?>
            <div class="pd-home-content-desc">
                <?php echo $content;?>
            </div>
        <?php endif;?>
    </div>
</section>