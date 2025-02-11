<?php 
add_action('acf/init', 'pd_block_types');

function pd_block_types(){
    // Check function exists.
    if(function_exists('acf_register_block_type')){
        acf_register_block_type(
			array(
				'name'            	=> 'pd-home-banner',
				'title'           	=> 'P&D: Homepage banner',
				'description'     	=> 'Homepage Banner',
				'render_template' 	=> 'blocks/home-banner.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
		 acf_register_block_type(
			array(
				'name'            	=> 'pd-default-banner',
				'title'           	=> 'P&D: Default banner',
				'description'     	=> 'Default Banner',
				'render_template' 	=> 'blocks/default-banner.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
        acf_register_block_type(
			array(
				'name'            	=> 'pd-venue-banner',
				'title'           	=> 'P&D: Venue banner',
				'description'     	=> 'Venue Banner',
				'render_template' 	=> 'blocks/venue-banner.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
        acf_register_block_type(
			array(
				'name'            	=> 'pd-venue-intro',
				'title'           	=> 'P&D: Venue intro',
				'description'     	=> 'Venue intro',
				'render_template' 	=> 'blocks/venue-intro.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
        acf_register_block_type(
			array(
				'name'            	=> 'pd-venue-menu',
				'title'           	=> 'P&D: Venue menu',
				'description'     	=> 'Venue menu',
				'render_template' 	=> 'blocks/venue-menu.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
        acf_register_block_type(
			array(
				'name'            	=> 'pd-venue-image-slider',
				'title'           	=> 'P&D: Venue image slider',
				'description'     	=> 'Venue image slider',
				'render_template' 	=> 'blocks/venue-image-slider.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
        acf_register_block_type(
			array(
				'name'            	=> 'pd-home-content',
				'title'           	=> 'P&D: Homepage Content',
				'description'     	=> 'Homepage contents',
				'render_template' 	=> 'blocks/home-content.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
        acf_register_block_type(
			array(
				'name'            	=> 'pd-contact-details',
				'title'           	=> 'P&D: Contact details',
				'description'     	=> 'Contact details',
				'render_template' 	=> 'blocks/contact-details.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
        acf_register_block_type(
			array(
				'name'            	=> 'pd-contact-form',
				'title'           	=> 'P&D: Contact form',
				'description'     	=> 'Contact form',
				'render_template' 	=> 'blocks/contact-form.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
		acf_register_block_type(
			array(
				'name'            	=> 'pd-careers-job-listing',
				'title'           	=> 'P&D: Careers Job Listing',
				'description'     	=> 'Careers Job Listing',
				'render_template' 	=> 'blocks/careers-job-listing.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
		acf_register_block_type(
			array(
				'name'            	=> 'pd-private-hire-listing',
				'title'           	=> 'P&D: Private Listing',
				'description'     	=> 'Private Listing',
				'render_template' 	=> 'blocks/private-hire-listing.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
		acf_register_block_type(
			array(
				'name'            	=> 'pd-content-narrow',
				'title'           	=> 'P&D: Narrow Content',
				'description'     	=> 'Narrow Content',
				'render_template' 	=> 'blocks/content-narrow.php',
				'mode'				=>	'edit',
				'icon'            	=> 'themeicon',
                'category' 			=> "pd-blocks",
            )
		);
		acf_register_block_type(
		   array(
			   'name'            	=> 'pd-landing-venues',
			   'title'           	=> 'P&D: Landing page venue lists',
			   'description'     	=> 'Block for listing venues in landing page.',
			   'render_template' 	=> 'blocks/landing-venues.php',
			   'mode'				=>	'edit',
			   'icon'            	=> 'themeicon',
			   'category' 			=> "pd-blocks",
		   )
	   );
    }
}

add_action('block_categories_all', 'pd_block_categories', 10, 2);

function pd_block_categories($categories) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => "pd-blocks",
				'title'=> "P&D Blocks"
			)
		)
	);
}