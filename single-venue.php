<?php
/**
 * Default Venue page
 */

get_header(); 
global $post;

the_content();    
$venue_cta = get_field( 'venue_cta', get_the_ID() );
$venue_booking_id = get_field( 'venue_id', get_the_ID() );
if( !empty( $venue_cta ) ): 
?>
    <section class="venue-cta">
        <div class="container">
            <?php 
            // pd_print_r( $venue_cta );
            $instagram_link = isset( $venue_cta['instagram_link'] ) ? $venue_cta['instagram_link'] : '';
            $cta_title = isset( $venue_cta['cta_title'] ) ? $venue_cta['cta_title'] : '';
            $get_in_touch_text = isset( $venue_cta['get_in_touch_text'] ) ? $venue_cta['get_in_touch_text'] : '';
            $phone = isset( $venue_cta['phone'] ) ? $venue_cta['phone'] : '';
            $email = isset( $venue_cta['email'] ) ? $venue_cta['email'] : '';
            $newsletter = isset( $venue_cta['newsletter'] ) ? $venue_cta['newsletter'] : '';
            $newsletter_iframe = isset( $venue_cta['newsletter_iframe'] ) ? $venue_cta['newsletter_iframe'] : '';
            if( isset( $instagram_link['url']) ):?>
                <div class="venue-cta-insta">
                    <a class="venue-cta-insta__link" href="<?php echo (isset( $instagram_link['url'] ) && !empty( $instagram_link['url'] ) ) ? esc_url($instagram_link['url']) : '#';?>"<?php echo (isset( $instagram_link['target'] ) && !empty( $instagram_link['target'] ) ) ? 'target="'.esc_attr($instagram_link['target']).'"' : '';?>>
                        <?php echo pd_svg('instagram');
                        echo isset( $instagram_link['title'] ) ? $instagram_link['title'] : '';?>
                    </a>
                </div>
            <?php endif;
            /*
            if( $cta_title ): ?>
                <h3 class="venue-cta__title"><?php echo $cta_title;?></h3>
            <?php
            endif;*/?>
            <div class="venue-cta__table">
                <div class="venue-cta__table__left">
                    <h6 class="venue-cta__table__left__title venue-cta__table__title">
                        <?php echo $get_in_touch_text;?>
                    </h6>
                    <div class="venue-cta__table__left__phone">
                        <a href="tel:<?php echo $phone;?>" target="_blank"><?php echo $phone;?></a>
                    </div>
                    <div class="venue-cta__table__left__email">
                        <a href="mailto:<?php echo $email;?>" target="_blank"><?php echo $email;?></a>
                    </div>
                </div>
                <div class="venue-cta__table__right">
                    <h6 class="venue-cta__table__right__title venue-cta__table__title">
                        Subscribe to receive the<br/>
                        good stuff in your inbox
                    </h6>
                    <div class="venue-cta__table__newsletter">                        
                        <div id="sr-subscription-root" data-button-id="4" data-color="#09223A">Stay in touch</div>
                        <?php 
                        // if( !empty( $newsletter_iframe ) ) { 
                        //     echo $newsletter_iframe;
                        // }
                        // else {
                        //     echo do_shortcode( $newsletter );
                        // }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="subscription">
        <script>
            SevenroomsWidget.init({
                venueId: "<?php echo $venue_booking_id;?>", // eg. restauranthubert
                triggerId: "sr-subscription-root", // id of the dom element that will trigger this widget
                type: "subscription", // either 'reservations' or 'waitlist' or 'events'
                styleButton: false, // true if you are using the SevenRooms button
                clientToken: "" //(Optional) Pass the api generated clientTokenId here
            })
        </script>
    </div>
    <div id="opentable">
            <script>
              SevenroomsWidget.init({
                  venueId: "<?php echo $venue_booking_id;?>", // eg. restauranthubert
                  triggerId: "sr-res-root", // id of the dom element that will trigger this widget
                  type: "reservations", // either 'reservations' or 'waitlist' or 'events'
                  styleButton: false, // true if you are using the SevenRooms button
                  clientToken: "" //(Optional) Pass the api generated clientTokenId here
              })
            </script>
        </div>
<?php
endif;
get_footer(); ?>