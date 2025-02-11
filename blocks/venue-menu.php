<?php 
$section_title = get_field( 'section_title' );
$section_description = get_field( 'section_description' );
$menu_links = get_field( 'menu_links' );
?>
<section class="pd-menu">
    <div class="container">
        <div class="pd-menu-content">
            <?php if( $section_title ): ?>
                <h2 class="pd-menu-content__title"><?php echo $section_title;?></h2>
            <?php endif; 
            if( $section_description ): ?>
                <div class="pd-menu-content__description">
                    <?php echo $section_description;?>
                </div>
            <?php endif;?>
        </div>
        <?php 
        if( $menu_links ): ?>
            <div class="pd-menu-links-wrap">
                <?php 
                foreach( $menu_links as $menu_link ){
                    echo '<span>';
                    pd_acf_link( $menu_link['menu_link'], 'pd-menu-links pd-link-animate');                    
                    echo '</span>';
                } ?>
            </div>
        <?php endif;?>
    </div>
</section>