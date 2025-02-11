<?php
/**
 * Job Listing Block
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
*/
$section_title    = get_field('section_title');
$career_list    = get_field('career_list');
?>
<section class="pd-career-content">
    <div class="container">
        <?php if( !empty($section_title) ): ?>
            <h2 class="pd-career-content__title"><?php echo $section_title;?></h2>
        <?php endif;?>
        <div class="pd-career-content__list">
            <?php
            foreach( $career_list as $post ):
                $post_id            = $post->ID;
                $hiring_info        = get_field('careers__hiring_post',$post_id);
                $career_date_post   = get_the_date('d.m.Y', $post_id);
                $career_venue       = $hiring_info['careers__venue']->post_title;
                $career_venuename      = $hiring_info['careers__venue']->post_name;
                $job_description    = $hiring_info['careers__job_description'];
                $job_description_detail    = $hiring_info['careers__job_description_detail'];
                $available          = $hiring_info['careers__still_available'];
                $phone_number          = $hiring_info['phone_number'];
                ?>
                <div class="pd-career-content-item toggle-parent">
                    <?php if( !empty($career_venue)): ?>
                    <span class="pd-career-content-item__venue"><?php echo $career_venue?></span>
                    <?php endif;?>
                    <h5 class="pd-career-content-item__title"><?php echo get_the_title( $post ); ?></h5>
                    <div class="pd-career-content-item-description">
                        <?php if( $career_date_post ): ?>
                            <div class="pd-career-content-item-description-head">
                                <span class="pd-career-content-item-description__date">Posted on: <?php echo $career_date_post?></span>
                            </div>
                        <?php endif;?>
                        <div class="pd-career-content-item-description__body pd-career-content-item-description__body__excerpt">
                            <?php echo $job_description;?>
                        </div>
                        <div class="pd-career-content-item-description__body pd-career-content-item-description__body__detail toggle-content" style="display:none;">
                            <?php echo $job_description_detail; ?>
                        </div>
                        <?php if( !empty($job_description_detail)){?>
                        <span class="text-toggle">
                            Read More
                            <span>+</span>
                        </span>
                        <?php }?>
                    </div>
                    <?php if($available){?>
                    <div class="pd-career-bontent-item-button">
                        <a class="pd-career-content-item-apply pd_button pd_button_bg--border"
                            href="<?php echo home_url('/contact?section=contact&enquiry=Careers').'&venuename='. $career_venue;?>">Apply now</a>
                        <?php 
                        if( $phone_number ): ?>
                            <div class="pd-career-content-item-button__call">
                                Or call <a href="tel:<?php echo $phone_number;?>"><?php echo $phone_number;?></a>
                            </div>
                        <?php endif;?>
                    </div>
                    <?php }?>
                </div>
                <?php
            endforeach; ?>
        </div>
    </div> <!-- .container -->
</section>