<?php
/**
 * Job Listing Block
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
*/

$venue_lists    = get_field('venue_lists');
?>

<div class="pd-landing-venue">
    <?php
    if( !empty( $venue_lists ) && is_array( $venue_lists) ){
        foreach ( $venue_lists as $venue_item ){
            $venue_id = $venue_item['venue'];
            $venue_description = isset( $venue_item['venue_description'] ) ? $venue_item['venue_description'] : '';
            $venue_opening_hours = isset( $venue_item['venue_opening_hours'] ) ? $venue_item['venue_opening_hours'] : '';
            $venue_location = isset( $venue_item['venue_location'] ) ? $venue_item['venue_location'] : '';
            $opening_status = isset( $venue_item['opening_status'] ) ? $venue_item['opening_status'] : '';
            // $sr_venue_id = isset( $venue_item['venue_id'] ) ? $venue_item['venue_id'] : ''; //seven room venue id
            $sr_venue_id = get_field( 'venue_id', $venue_id ); //seven room venue id
            $attachment_id = get_post_thumbnail_id( $venue_id );
            $featured_image = wp_get_attachment_image_url( $attachment_id, 'full' );
            $brand_image = get_field( 'brand_image', $venue_id );
            $brand_color = get_field( 'brand_color', $venue_id );
            $venue_link = get_the_permalink($venue_id);
            $venue_name = get_the_title($venue_id); ?>
            <div class="pd-landing-venue__item" style="background-color: <?php echo $brand_color;?>;">
                <div class="pd-landing-venue__item__image">
                    <img src="<?php echo $brand_image;?>" alt="<?php echo $venue_name;?>"/>
                    <div class="pd-landing-venue__item__image__overlay" style="background-color: <?php echo $brand_color;?>"></div>
                </div>
                <div class="pd-landing-venue__item__description">
                    <?php echo $venue_description;?>
                </div>
                <div class="pd-landing-venue__item__hours">
                    <?php echo $venue_opening_hours;?>
                </div>
                <div class="pd-landing-venue__item__location">
                    <?php echo $venue_location;?>
                </div>
                <div class="pd-landing-venue__item__open">
                    <?php echo $opening_status;?>
                </div>
                <div class="pd-landing-venue__item__links">
                    <a id="sr-res-root-<?php echo $sr_venue_id;?>" class="pd-landing-venue__item__link pd_button pd_button_bg--transparent pd-venue-book" href="javascript:void(0);">Book a table</a>
                </div> 
                <div id="opentable-<?php echo $sr_venue_id;?>" style="display:none;">
                    <script>
                        SevenroomsWidget.init({
                            venueId: "<?php echo $sr_venue_id;?>", // eg. restauranthubert
                            triggerId: "sr-res-root-<?php echo $sr_venue_id;?>", // id of the dom element that will trigger this widget
                            type: "reservations", // either 'reservations' or 'waitlist' or 'events'
                            styleButton: false, // true if you are using the SevenRooms button
                            clientToken: "" //(Optional) Pass the api generated clientTokenId here
                        })
                    </script>
                </div>
            </div>   
            <?php
        }
    }?>
</div>