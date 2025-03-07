<?php
/**
 * Includes all helper functions
 * pd_print_r
 * pd_acf_link
 * pd_load_image
 * pd_product_featured_image
 * pd_limit_characters
 * pd_svg
 * pd_breadcrumb
 * 
 */

/**
 * function to debug
 */
if( !function_exists( 'pd_print_r') ){
    function pd_print_r( $value ='', $pre = true ){
        if( $pre ){
            echo '<pre>';
        }
        print_r($value);
        if( $pre ){
            echo '</pre>';
        }
    }
}

/**
 * Html Link for ACF Link field
 * 
 */
if( !function_exists( 'pd_acf_link' ) ){
    function pd_acf_link( $link = '', $class = '', $wrapper = '', $wrapper_class='' ){
        if( isset( $link['url'] ) && !empty( $link['url'] ) ):
			if( $wrapper) {
				echo '<' . $wrapper .' class="'.$wrapper_class.'">';
			}?>
            <a <?php echo !empty( $class ) ? 'class="'.esc_attr($class).'"' : '';?> href="<?php echo (isset( $link['url'] ) && !empty( $link['url'] ) ) ? esc_url($link['url']) : '#';?>"<?php echo (isset( $link['target'] ) && !empty( $link['target'] ) ) ? 'target="'.esc_attr($link['target']).'"' : '';?>><?php echo isset( $link['title'] ) ? $link['title'] : '';?></a>
            <?php			
			if( $wrapper) {
				echo '</' . $wrapper . '>';
			}
        endif;
    }
}

if( !function_exists( 'pd_load_image' ) ){
    function pd_load_image($attachment_id, $img_size = 'full', $link = false ){
		$img_url = wp_get_attachment_image_url( $attachment_id, $img_size );
		$img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
		$img_alt = empty( $img_alt ) ? get_the_title($attachment_id) : $img_alt;
        if( $img_url ):?>
            <figure>
                <?php if( $link ){
                    echo '<a href="'.get_the_permalink().'">';
                } ?>
                    <img src="<?php echo $img_url;?>" alt="<?php echo $img_alt;?>"/>
                <?php 
                if( $link ){
                    echo '</a>';
                }?>
            </figure>
        <?php
        endif;
    }
}

function pd_svg( $icon = '' ){
    $icon_html = '';
	switch( $icon ):
		case 'logo':
			$icon_html = '<svg width="338" height="64" viewBox="0 0 338 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.7447 63.8835L0.695312 46.5944L5.65575 43.4263C9.09547 41.2297 12.9335 41.8452 15.1301 45.2849C17.3085 48.6884 16.518 52.9187 13.1145 55.0972L11.5274 56.111L15.118 61.7292L11.7447 63.8835ZM11.0446 51.573C12.4688 50.6617 12.7223 48.7307 11.8352 47.3427C11.0326 46.0875 9.23427 45.7496 7.87648 46.6125L6.15662 47.7108L9.32478 52.6713L11.0446 51.573Z" fill="white"/>
                <path d="M33.33 50.9939L30.18 47.9706L24.5558 51.006L25.3583 55.2966L21.9066 57.1613C20.6514 50.131 19.4203 42.9015 18.1289 35.8893L21.0617 34.3022L36.7818 49.1292L33.33 50.9939ZM22.7997 40.9886L23.8256 46.8542L27.1024 45.0861L22.7936 40.9946L22.7997 40.9886Z" fill="white"/>
                <path d="M39.0387 48.1153L30.373 29.5227L33.9998 27.833L42.6655 46.4256L39.0387 48.1153Z" fill="white"/>
                <path d="M46.0397 38.0253C47.3431 39.1477 49.3165 39.5339 50.807 38.9304C51.9355 38.4718 52.6294 37.2649 52.201 36.2088C51.8631 35.37 50.8191 34.7786 48.538 34.4769C45.2974 34.0967 42.0448 33.801 40.7051 30.4941C39.468 27.4406 41.1275 24.3147 44.3621 23.0052C46.9449 21.9612 49.413 22.3172 51.4286 23.7414L49.9441 27.3863C48.5018 26.2337 47.0837 25.9621 45.8104 26.475C44.5371 26.988 44.1931 28.0199 44.5612 28.9251C44.8871 29.7277 45.9009 30.2467 48.188 30.4639C51.4165 30.8079 54.826 31.2907 56.1476 34.5614C57.427 37.7235 55.6407 41.1572 52.0743 42.5934C49.5639 43.6073 46.4198 43.3598 44.3319 41.7486L46.0336 38.0132L46.0397 38.0253Z" fill="white"/>
                <path d="M71.7413 35.1352L69.1645 31.611L63.0937 33.6265L63.142 37.9956L59.4187 39.2327C59.4006 32.0877 59.4428 24.7557 59.3945 17.6228L62.5567 16.5728L75.4647 33.9041L71.7413 35.1412V35.1352ZM63.1058 23.4522V29.4083L66.636 28.2316L63.1058 23.4522Z" fill="white"/>
                <path d="M87.6359 30.5787L78.6504 20.6095L81.6797 32.1416L77.8116 33.1615L72.5977 13.3198L76.502 12.2939L84.7755 21.394L82.0056 10.8456L85.9522 9.80762L91.1661 29.6494L87.6359 30.5787Z" fill="white"/>
                <path d="M92.3793 18.546C91.2991 13.121 93.369 7.83465 98.2148 6.86911C102.988 5.92168 106.995 10.0011 108.075 15.4262C109.222 21.1952 107.086 26.5419 102.312 27.4893C97.4665 28.4549 93.5259 24.3151 92.3793 18.546ZM103.845 16.271C103.139 12.7347 101.178 10.4838 99.0234 10.9123C96.7544 11.3649 95.9096 14.171 96.6156 17.7072C97.3579 21.4366 99.2226 23.7901 101.492 23.3375C103.646 22.9091 104.587 20.0004 103.845 16.271Z" fill="white"/>
                <path d="M135.857 22.2328L134.101 18.2379L127.741 18.9017L126.848 23.1741L122.949 23.5785C124.47 16.5964 126.087 9.44545 127.572 2.46946L130.891 2.12549L139.768 21.8284L135.869 22.2328H135.857ZM129.937 8.96872L128.652 14.78L132.357 14.3938L129.937 8.96872Z" fill="white"/>
                <path d="M152.399 21.0741L145.641 9.48165L146.25 21.3879L142.255 21.5931L141.205 1.10564L145.242 0.90046L151.482 11.4972L150.927 0.604765L155 0.393555L156.05 20.881L152.405 21.0681L152.399 21.0741Z" fill="white"/>
                <path d="M160.256 20.6338L160.455 0.116211L165.832 0.170522C171.993 0.230868 175.016 3.67662 174.95 10.5017C174.884 17.3691 171.752 20.7485 165.512 20.6881L160.256 20.6338ZM165.313 16.7174C169.199 16.7536 170.708 15.0036 170.75 10.4957C170.798 5.82494 169.32 4.08697 165.44 4.05077L164.498 4.0387L164.371 16.7113L165.313 16.7234V16.7174Z" fill="white"/>
                <path d="M188.854 21.2133L190.592 0.768066L195.944 1.22066C202.082 1.73964 204.839 5.40263 204.26 12.2036C203.681 19.0469 200.301 22.1848 194.086 21.6538L188.848 21.2072L188.854 21.2133ZM194.194 17.6951C198.062 18.027 199.698 16.3916 200.078 11.8959C200.476 7.24319 199.137 5.3966 195.262 5.07073L194.327 4.99228L193.253 17.6167L194.188 17.6951H194.194Z" fill="white"/>
                <path d="M217.331 24.2367L216.576 19.9341L210.24 19.0651L208.351 22.9996L204.465 22.4686C207.603 16.0478 210.88 9.49422 213.981 3.06738L217.282 3.51998L221.211 24.7678L217.325 24.2307L217.331 24.2367ZM214.742 9.94079L212.105 15.2814L215.798 15.7883L214.742 9.94079Z" fill="white"/>
                <path d="M236.351 6.69975L240.316 7.46614L237.673 21.219C236.949 24.9906 233.563 27.4165 229.599 26.6562C225.634 25.8958 223.407 22.5104 224.155 18.6181L226.799 4.86523L230.727 5.61956L228.174 18.8715C227.861 20.4888 228.784 22.1423 230.401 22.4561C232.019 22.7699 233.485 21.575 233.799 19.9517L236.345 6.69975H236.351Z" fill="white"/>
                <path d="M252.687 22.9514L249.76 22.2031L251.251 18.4134L257.521 20.0125L255.433 28.1834C254.534 29.3299 251.703 31.5205 247.944 30.561C243.158 29.336 241.312 23.7238 242.639 18.522C243.997 13.1995 248.445 8.95111 253.194 10.1641C255.855 10.846 257.672 12.602 258.335 15.4021L254.709 17.3935C254.401 15.734 253.526 14.7443 252.077 14.3762C249.76 13.7848 247.781 15.9935 246.906 19.4091C245.976 23.06 246.682 25.9928 249.114 26.6144C250.14 26.8739 251.1 26.5963 251.884 26.0652L252.681 22.9514H252.687Z" fill="white"/>
                <path d="M266.822 35.7805L269.501 27.495L264.577 25.9019L261.898 34.1874L258.09 32.9563L264.408 13.4404L268.216 14.6715L265.826 22.0639L270.75 23.657L273.14 16.2646L276.984 17.5077L270.666 37.0236L266.822 35.7805Z" fill="white"/>
                <path d="M278.19 39.7818L284.309 24.3152L280.187 22.6858L281.617 19.0771L293.469 23.7721L292.039 27.3807L288.062 25.8057L281.943 41.2724L278.184 39.7879L278.19 39.7818Z" fill="white"/>
                <path d="M289.252 44.2049L298.02 25.6606L308.267 30.5064L306.607 34.0186L299.975 30.8806L298.316 34.3927L303.457 36.8246L301.731 40.4756L296.59 38.0436L294.562 42.3342L301.194 45.4722L299.499 49.0568L289.252 44.211V44.2049Z" fill="white"/>
                <path d="M310.161 54.7777L311.127 47.6629L309.624 46.812L306.335 52.6112L302.854 50.6379L312.967 32.7876L318.085 35.6902C322.146 37.9894 322.689 41.7248 320.873 44.9352C319.654 47.0835 317.312 48.5982 314.832 48.6767L313.74 56.8053L310.155 54.7777H310.161ZM313.414 44.2714C314.88 45.1042 316.709 44.4223 317.518 42.9921C318.254 41.6947 317.711 39.9446 316.311 39.1541L314.536 38.1463L311.634 43.2637L313.408 44.2714H313.414Z" fill="white"/>
                <path d="M322.406 54.8137C322.189 56.5215 322.956 58.3802 324.283 59.2914C325.285 59.9793 326.679 59.8888 327.325 58.9535C327.838 58.2112 327.753 57.0103 326.751 54.9405C325.279 52.0257 323.728 49.1533 325.75 46.2084C327.614 43.4928 331.133 43.1489 334.011 45.1282C336.304 46.7032 337.372 48.9602 337.3 51.4283L333.438 52.2007C333.607 50.3662 333.045 49.0266 331.917 48.2541C330.789 47.4817 329.739 47.7533 329.183 48.5619C328.695 49.274 328.821 50.4085 329.901 52.4361C331.398 55.3206 332.877 58.4284 330.879 61.3371C328.948 64.1492 325.098 64.5536 321.93 62.3811C319.697 60.8483 318.17 58.0845 318.357 55.4534L322.413 54.8137H322.406Z" fill="white"/>
                </svg>
                ';
            break;
        case 'arrow': 
			$icon_html = '<svg width="25" height="15" viewBox="0 0 25 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.3497 8.31251C24.7402 7.92199 24.7402 7.28883 24.3497 6.8983L17.9857 0.53434C17.5952 0.143816 16.962 0.143816 16.5715 0.53434C16.181 0.924864 16.181 1.55803 16.5715 1.94855L22.2284 7.60541L16.5715 13.2623C16.181 13.6528 16.181 14.286 16.5715 14.6765C16.962 15.067 17.5952 15.067 17.9857 14.6765L24.3497 8.31251ZM0 8.60541H23.6426V6.60541H0V8.60541Z" fill="#00928B"/>
            </svg>';
            break;
        case 'arrow-right': 
                $icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="5" height="8" viewBox="0 0 5 8" fill="none">
                <path d="M1 0.736572L4.26892 4.00547L1 7.27439" stroke="#1D1B14" stroke-width="0.7"/>
                </svg>';
            break;
        case 'arrow-right-top': 
			$icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M4.49532 1.39625L20.9998 1.39624M20.9998 1.39624L20.9998 17.9007M20.9998 1.39624L1.60352 20.7925" stroke="black" stroke-width="2"/>
                </svg>';
            break;
        case 'arrow-down':
            $icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
                <path d="M1 1L7 7L13 1" stroke="black"/>
            </svg>
            ';
            break;     
        case 'play';
            $icon_html = '<svg width="82" height="93" viewBox="0 0 82 93" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M78.75 42.1987C82.0833 44.1232 82.0833 48.9344 78.75 50.8589L8.06084 91.6713C4.7275 93.5958 0.56084 91.1902 0.56084 87.3412L0.560844 5.7164C0.560844 1.8674 4.72751 -0.538225 8.06084 1.38628L78.75 42.1987Z" fill="white"/>
            </svg>';
            break;
        case 'instagram':
            $icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <g clip-path="url(#clip0_496_1537)">
                <path d="M36.668 11.667H40.0013M15.0013 1.66699H35.0013C38.5375 1.66699 41.9289 3.07175 44.4294 5.57224C46.9299 8.07272 48.3346 11.4641 48.3346 15.0003V35.0003C48.3346 38.5365 46.9299 41.9279 44.4294 44.4284C41.9289 46.9289 38.5375 48.3337 35.0013 48.3337H15.0013C11.4651 48.3337 8.0737 46.9289 5.57321 44.4284C3.07273 41.9279 1.66797 38.5365 1.66797 35.0003V15.0003C1.66797 11.4641 3.07273 8.07272 5.57321 5.57224C8.0737 3.07175 11.4651 1.66699 15.0013 1.66699ZM25.0013 35.0003C22.3491 35.0003 19.8056 33.9468 17.9302 32.0714C16.0549 30.196 15.0013 27.6525 15.0013 25.0003C15.0013 22.3482 16.0549 19.8046 17.9302 17.9293C19.8056 16.0539 22.3491 15.0003 25.0013 15.0003C27.6535 15.0003 30.197 16.0539 32.0724 17.9293C33.9477 19.8046 35.0013 22.3482 35.0013 25.0003C35.0013 27.6525 33.9477 30.196 32.0724 32.0714C30.197 33.9468 27.6535 35.0003 25.0013 35.0003Z" stroke="#1D1B14" stroke-width="3.33333"/>
                </g>
                <defs>
                <clipPath id="clip0_496_1537">
                <rect width="50" height="50" fill="white"/>
                </clipPath>
                </defs>
                </svg>';
            break;
        case 'heart':
            $icon_html = '<svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.9062 0.155273C11.2656 0.155273 9.83906 0.895117 9 2.13496C8.16094 0.895117 6.73438 0.155273 5.09375 0.155273C3.85099 0.156721 2.65955 0.651046 1.78079 1.52981C0.902022 2.40857 0.407697 3.60002 0.40625 4.84277C0.40625 7.12402 1.82812 9.49824 4.63281 11.8982C5.91801 12.9934 7.30626 13.9614 8.77813 14.7889C8.84634 14.8255 8.92257 14.8447 9 14.8447C9.07743 14.8447 9.15366 14.8255 9.22187 14.7889C10.6937 13.9614 12.082 12.9934 13.3672 11.8982C16.1719 9.49824 17.5938 7.12402 17.5938 4.84277C17.5923 3.60002 17.098 2.40857 16.2192 1.52981C15.3405 0.651046 14.149 0.156721 12.9062 0.155273ZM9 13.8357C7.71797 13.0959 1.34375 9.1959 1.34375 4.84277C1.34478 3.84853 1.7402 2.8953 2.44324 2.19227C3.14628 1.48923 4.09951 1.09381 5.09375 1.09277C6.67812 1.09277 8.00859 1.93887 8.56641 3.30137C8.60172 3.38734 8.6618 3.46088 8.739 3.51263C8.81621 3.56438 8.90706 3.59201 9 3.59201C9.09294 3.59201 9.18379 3.56438 9.261 3.51263C9.3382 3.46088 9.39828 3.38734 9.43359 3.30137C9.99141 1.93887 11.3219 1.09277 12.9062 1.09277C13.9005 1.09381 14.8537 1.48923 15.5568 2.19227C16.2598 2.8953 16.6552 3.84853 16.6562 4.84277C16.6562 9.1959 10.282 13.0959 9 13.8357Z" fill="#2C2B28"/>
            </svg>';
            break;
        case 'cart':
            $icon_html = '<svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.25 6.375V5.125C4.25 4.13044 4.64509 3.17661 5.34835 2.47335C6.05161 1.77009 7.00544 1.375 8 1.375C8.99456 1.375 9.94839 1.77009 10.6517 2.47335C11.3549 3.17661 11.75 4.13044 11.75 5.125V6.375M1.125 6.375C0.95924 6.375 0.800269 6.44085 0.683058 6.55806C0.565848 6.67527 0.5 6.83424 0.5 7V15.4375C0.5 16.6187 1.50625 17.625 2.6875 17.625H13.3125C14.4937 17.625 15.5 16.6676 15.5 15.4863V7C15.5 6.83424 15.4342 6.67527 15.3169 6.55806C15.1997 6.44085 15.0408 6.375 14.875 6.375H1.125Z" stroke="#2C2B28" stroke-width="0.89" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            ';
            break;
        case 'plus':
            $icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                <path d="M4.42078 10.7839V6.47543H0.184082V4.94352H4.42078V0.63501H6.09631V4.94352H10.333V6.47543H6.09631V10.7839H4.42078Z" fill="#2C2B28"/>
            </svg>
            ';
            break;
        case 'filter':
            $icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M6.75 11.8125C6.75 11.6633 6.80926 11.5202 6.91475 11.4148C7.02024 11.3093 7.16332 11.25 7.3125 11.25H10.6875C10.8367 11.25 10.9798 11.3093 11.0852 11.4148C11.1907 11.5202 11.25 11.6633 11.25 11.8125C11.25 11.9617 11.1907 12.1048 11.0852 12.2102C10.9798 12.3157 10.8367 12.375 10.6875 12.375H7.3125C7.16332 12.375 7.02024 12.3157 6.91475 12.2102C6.80926 12.1048 6.75 11.9617 6.75 11.8125ZM4.5 8.4375C4.5 8.28832 4.55926 8.14524 4.66475 8.03975C4.77024 7.93426 4.91332 7.875 5.0625 7.875H12.9375C13.0867 7.875 13.2298 7.93426 13.3352 8.03975C13.4407 8.14524 13.5 8.28832 13.5 8.4375C13.5 8.58668 13.4407 8.72976 13.3352 8.83525C13.2298 8.94074 13.0867 9 12.9375 9H5.0625C4.91332 9 4.77024 8.94074 4.66475 8.83525C4.55926 8.72976 4.5 8.58668 4.5 8.4375ZM2.25 5.0625C2.25 4.91332 2.30926 4.77024 2.41475 4.66475C2.52024 4.55926 2.66332 4.5 2.8125 4.5H15.1875C15.3367 4.5 15.4798 4.55926 15.5852 4.66475C15.6907 4.77024 15.75 4.91332 15.75 5.0625C15.75 5.21168 15.6907 5.35476 15.5852 5.46025C15.4798 5.56574 15.3367 5.625 15.1875 5.625H2.8125C2.66332 5.625 2.52024 5.56574 2.41475 5.46025C2.30926 5.35476 2.25 5.21168 2.25 5.0625Z" fill="#2C2B28"/>
            </svg>
            ';
            break;
        case 'close':
            $icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="52" height="50" viewBox="0 0 52 50" fill="none">
                <line x1="1.20891" y1="49.2189" x2="49.2922" y2="1.13566" stroke="#1D1B14" stroke-width="2"/>
                <line y1="-1" x2="68" y2="-1" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 49.999 49.926)" stroke="#1D1B14" stroke-width="2"/>
                </svg>'; 
            break; 
        case 'linkedin':
            $icon_html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" viewBox="0 0 45.959 45.959" xml:space="preserve">
            <g>
                <g>
                    <path d="M5.392,0.492C2.268,0.492,0,2.647,0,5.614c0,2.966,2.223,5.119,5.284,5.119c1.588,0,2.956-0.515,3.957-1.489    c0.96-0.935,1.489-2.224,1.488-3.653C10.659,2.589,8.464,0.492,5.392,0.492z M7.847,7.811C7.227,8.414,6.34,8.733,5.284,8.733    C3.351,8.733,2,7.451,2,5.614c0-1.867,1.363-3.122,3.392-3.122c1.983,0,3.293,1.235,3.338,3.123    C8.729,6.477,8.416,7.256,7.847,7.811z"/>
                    <path d="M0.959,45.467h8.988V12.422H0.959V45.467z M2.959,14.422h4.988v29.044H2.959V14.422z"/>
                    <path d="M33.648,12.422c-4.168,0-6.72,1.439-8.198,2.792l-0.281-2.792H15v33.044h9.959V28.099c0-0.748,0.303-2.301,0.493-2.711    c1.203-2.591,2.826-2.591,5.284-2.591c2.831,0,5.223,2.655,5.223,5.797v16.874h10v-18.67    C45.959,16.92,39.577,12.422,33.648,12.422z M43.959,43.467h-6V28.593c0-4.227-3.308-7.797-7.223-7.797    c-2.512,0-5.358,0-7.099,3.75c-0.359,0.775-0.679,2.632-0.679,3.553v15.368H17V14.422h6.36l0.408,4.044h1.639l0.293-0.473    c0.667-1.074,2.776-3.572,7.948-3.572c4.966,0,10.311,3.872,10.311,12.374V43.467z"/>
                </g>
            </g>
            </svg>';
            break;   
        case 'facebook': 
            $icon_html= '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
                <path d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M37,19h-2c-2.14,0-3,0.5-3,2 v3h5l-1,5h-4v15h-5V29h-4v-5h4v-3c0-4,2-7,6-7c2.9,0,4,1,4,1V19z" fill="white"></path>
            </svg>';
            break;   
	endswitch;
    return $icon_html;
}

if( !function_exists( 'pd_product_featured_image' ) ){
    function pd_product_featured_image( $product_id, $img_size = 'full' ){ 
        $thumbnail_id = get_post_thumbnail_id($product_id);
        $image_url = wp_get_attachment_image_url($thumbnail_id, $img_size);
        $attachment_id = get_field( 'featured_image_hover', $product_id );
		$image_url_hover = wp_get_attachment_image_url( $attachment_id, $img_size );
        ?>
        <figure class="feature-image-wrap <?php echo ( !empty($image_url_hover) ) ? 'has-hover-image' : '';?>" >
            <a href="<?php echo get_the_permalink($product_id);?>">
                <img class="feature-image" src="<?php echo $image_url;?>" alt="<?php echo get_the_title( $product_id );?>"/>
                <?php if( !empty($image_url_hover)): ?>
                    <img class="feature-image hovered-image" src="<?php echo $image_url_hover;?>" alt="<?php echo get_the_title( $product_id );?>"/>
                <?php endif;?>
            </a>
        </figure>
        <?php
    }
}
if( !function_exists( 'pd_limit_characters' ) ){
    function pd_limit_characters($string, $limit = 80, $ellipis = '...' ) {
        if (strlen($string) > $limit) {
            $string = substr($string, 0, $limit);
        }
        return $string . $ellipis;
    }
}
/**
 * Breadcrumb function
 */
function pd_breadcrumb() {

    $sep = ' / ';
    $homeLink = home_url();
    if (!is_front_page()) :?>
        <div class="pagebreadcrumb-lists">
            <div class="container">
                <a href="<?php echo $homeLink;?>">Home</a>
                <?php 
                if ( is_tax('state') || is_tax('company-type') ){
                    echo $sep;
                    $term_object = get_queried_object();
                    $taxonomy = get_taxonomy($term_object->taxonomy);
                    // echo '<a href="' . esc_url($homeLink) . '/' . esc_attr($term_object->taxonomy) . '/">';
                    echo $taxonomy->label;
                    // echo '</a>';
                    echo ' ' . $sep . ' ' . '<span class="current">' . esc_attr($term_object->name) . '</span>';
                }
                if (is_single()) {
                    echo $sep;
                    if (get_post_type() != 'post') {
                        $post_type = get_post_type_object(get_post_type());
                        $slug = $post_type->rewrite;
                        // echo '<a href="' . esc_url($homeLink) . '/' . esc_attr($slug['slug']) . '/">' ;
                        // echo esc_attr($post_type->labels->singular_name);
                        // echo '</a>';
                        if( is_product() ): ?>
                            <a href="<?php echo esc_url($homeLink) . '/' . esc_attr($slug['slug']);?>/">                            
                                <?php echo esc_attr($post_type->labels->singular_name);?>
                            </a>
                        <?php endif;
                        echo ' ' . $sep . ' ' . '<span class="current">' . esc_html(get_the_title()) . '</span>';
                    } else {
                        $cat = get_the_category();
                        $cat = $cat[0];
                        $cats = get_category_parents($cat, TRUE, ' ' . $sep . ' ');
                            $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                        echo $cats;                    
                        echo '<span class="current">' . esc_html(get_the_title()) . '</span>';
                    }
                }

                if (is_page()) {
                    echo $sep;
                    echo the_title();
                }?>
            </div>
        </div>
        <?php
    endif;
}
