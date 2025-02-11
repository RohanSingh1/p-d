<?php 
$contact_lists = get_field( 'contact_lists' );
if( !empty( $contact_lists ) ):
?>
    <section class="pd-contactdetails">
        <div class="container">
            <div class="pd-contactdetails-grid">
                <?php
                foreach( $contact_lists as $contact_item ):
                    $venue_type     = isset( $contact_item['venue_type'] ) ? $contact_item['venue_type'] : 'venue' ;
                    $venue_id          = isset( $contact_item['venue'] ) ? $contact_item['venue'] : '' ;
                    $opening_hours  = isset( $contact_item['opening_hours'] ) ? $contact_item['opening_hours'] : '' ;
                    $location       = isset( $contact_item['location'] ) ? $contact_item['location'] : '' ;
                    $book_button    = isset( $contact_item['book_button'] ) ? $contact_item['book_button'] : '' ;
                    $phone          = get_field( 'venue_cta_phone', $venue_id ); //venue_cta is a group field and phone is sub field. So, we also directly use venue_cta_phone directly.
                    $email          = get_field( 'venue_cta_email', $venue_id ); //venue_cta is a group field and email is sub field. So, we also directly use venue_cta_email directly.
                    $instagram_link = get_field( 'venue_cta_instagram_link', $venue_id ); //venue_cta is a group field and instagram_link is sub field. So, we also directly use venue_cta_instagram_link directly.
                    if( $venue_type == 'venue' && $venue_id ): ?>
                        <div class="pd-contactdetails-item">
                            <?php if( $venue_id ): ?>
                                <h6 class="pd-contactdetails-item__title">
                                    <?php echo get_the_title($venue_id);?>
                                </h6>
                            <?php endif;
                            if( $opening_hours ): ?>
                                <div class="pd-contactdetails-item__desc"><?php echo $opening_hours;?></div>
                            <?php endif;
                            if( $location || $phone ): ?>
                                <div class="pd-contactdetails-item-info">
                                    <?php if( $phone ): ?>
                                        <a class="pd-contactdetails-item-info__phone" href="tel:<?php echo $phone;?>">
                                            <?php echo $phone;?>
                                        </a>
                                    <?php
                                    endif;
                                    if( $location ):?>
                                        <div class="pd-contactdetails-item-info__location"><?php echo $location;?></div>
                                    <?php endif;?>
                                </div>
                            <?php endif;
                            if( $book_button ): ?>
                                <div class="pd-contactdetails-bookbtn">
                                    <?php pd_acf_link($book_button, 'pd_button pd_button_bg--border pd-venue-book'); // function to get html for field type link ?>
                                </div>
                            <?php 
                            endif;
                            if( !empty( $email ) ): ?>
                                <a href="mailto:<?php echo $email;?>" target="_blank" class="pd-contactdetails__email"><?php echo $email;?></a>
                            <?php endif;
                            if( !empty( $instagram_link ) ): ?>
                                <?php pd_acf_link($instagram_link, 'pd-contactdetails__insta');// function to get html for field type link ?>
                            <?php endif;?>
                        </div>
                    <?php 
                    else:
                        $venue_name     = isset( $contact_item['venue_name'] ) ? $contact_item['venue_name'] : '' ;
                        $email          = isset( $contact_item['email'] ) ? $contact_item['email'] : '' ;
                        $instagram_link = isset( $contact_item['instagram_link'] ) ? $contact_item['instagram_link'] : array() ;  ?>            
                        <div class="pd-contactdetails-item">
                            <?php if( $venue_name ): ?>
                                <h6 class="pd-contactdetails-item__title">
                                    <?php echo $venue_name;?>
                                </h6>
                            <?php endif;
                            if( $opening_hours ): ?>
                                <div class="pd-contactdetails-item__desc"><?php echo $opening_hours;?></div>
                            <?php endif;
                            if( $book_button ): ?>
                                <div class="pd-contactdetails-bookbtn">
                                    <?php pd_acf_link($book_button, 'pd_button pd_button_bg--border pd-venue-book'); // function to get html for field type link ?>
                                </div>
                            <?php 
                            endif;?>
                            <div class="pd-contactdetails-links">
                                <?php
                                if( !empty( $email ) ): ?>
                                    <a href="mailto:<?php echo $email;?>" target="_blank" class="pd-contactdetails__email"><?php echo $email;?></a>
                                <?php endif;
                                if( !empty( $instagram_link ) ): ?>
                                    <?php pd_acf_link( $instagram_link, 'pd-contactdetails__insta');// function to get html for field type link ?>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php
                    endif;
                endforeach;?>
            </div>
        </div>
    </section>
<?php
endif;?>