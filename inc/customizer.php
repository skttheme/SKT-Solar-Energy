<?php
/**
 * SKT Solar Energy Theme Customizer
 *
 * @package SKT Solar Energy
 */
 
function skt_solar_energy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'skt_solar_energy_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 230,
		'wp-head-callback'       => 'skt_solar_energy_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'skt_solar_energy_custom_header_setup' );
if ( ! function_exists( 'skt_solar_energy_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see skt_solar_energy_custom_header_setup().
 */
function skt_solar_energy_header_style() {
	?>    
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // skt_solar_energy_header_style 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function skt_solar_energy_customize_register( $wp_customize ) {
	//Add a class for titles
    class skt_solar_energy_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#92c938',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','skt-solar-energy'),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('header_bg_color',array(
			'default'	=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'header_bg_color',array(
			'label' => esc_html__('Header Background Color','skt-solar-energy'),				
			'section' => 'colors',
			'settings' => 'header_bg_color'
	))
	);

	$wp_customize->add_setting('footer_text_color',array(
			'default'	=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_text_color',array(
			'label' => esc_html__('Copyright Text Color','skt-solar-energy'),				
			'section' => 'colors',
			'settings' => 'footer_text_color'
		))
	);	
	
	$wp_customize->add_section('header_top_bar',array(
			'title'	=> esc_html__('Header Information','skt-solar-energy'),				
			'description'	=> esc_html__('Add Information For Header Area','skt-solar-energy'),		
			'priority'		=> null
	));
	
	$wp_customize->add_setting('contact_no',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> esc_html__('Contact Number','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_no'
	));
	
	$wp_customize->add_setting('email_add',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('email_add',array(
			'label'	=> esc_html__('Email Address','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'email_add'
	));	
	
	$wp_customize->add_setting('contact_top_address',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_top_address',array(
			'label'	=> esc_html__('Address Line 1','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_top_address'
	));	
	
	$wp_customize->add_setting('contact_top_address_two',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_top_address_two',array(
			'label'	=> esc_html__('Address Line 2','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_top_address_two'
	));
	
	$wp_customize->add_setting('hdr_fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	$wp_customize->add_control('hdr_fb_link',array(
			'label'	=> esc_html__('Facebook','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_fb_link'
	));	
	$wp_customize->add_setting('hdr_twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('hdr_twitt_link',array(
			'label'	=> esc_html__('Twitter','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_twitt_link'
	));
	$wp_customize->add_setting('hdr_youtube_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('hdr_youtube_link',array(
			'label'	=> esc_html__('Youtube','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_youtube_link'
	));	
	$wp_customize->add_setting('hdr_instagram_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('hdr_instagram_link',array(
			'label'	=> esc_html__('Instagram','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_instagram_link'
	));		
	$wp_customize->add_setting('hdr_linkedin_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('hdr_linkedin_link',array(
			'label'	=> esc_html__('Linkedin','skt-solar-energy'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'hdr_linkedin_link'
	));		
	
	//Hide Header Info Box
	$wp_customize->add_setting('hide_header_topbar',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_topbar', array(
    	   'section'   => 'header_top_bar',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-solar-energy'),
    	   'type'      => 'checkbox'
     ));
	 //Hide Header Info Box		
	
	// Inner Page Banner Settings
	$wp_customize->add_section('inner_page_banner',array(
			'title'	=> esc_html__('Inner Page Banner Settings','skt-solar-energy'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_page_banner_thumb',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_page_banner_thumb', array(
        'section' => 'inner_page_banner',
		'label'	=> esc_html__('Upload Default Banner Image','skt-solar-energy'),
        'settings' => 'inner_page_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_page_banner_option',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_page_banner_option', array(
    	   'section'   => 'inner_page_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Page Banner On All Inner Pages. For Display Different Banner Image On Each Page Set Page Featured Image. Set Image Size (1400 X 310) For Better Resolution.','skt-solar-energy'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings
	 
	// Inner Post Banner Settings
	$wp_customize->add_section('inner_post_banner',array(
			'title'	=> esc_html__('Category / Archive And Single Post Banner Settings','skt-solar-energy'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_post_banner_thumb',array(
			'default'	=> null,

			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_post_banner_thumb', array(
        'section' => 'inner_post_banner',
		'label'	=> esc_html__('Upload Default Banner Image','skt-solar-energy'),
        'settings' => 'inner_post_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_post_banner_option',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_post_banner_option', array(
    	   'section'   => 'inner_post_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Post Banner On Category / Archive And Single Post. For Display Different Banner Image On Each Post Set Post Featured Image. Set Image Size (1400 X 310) For Better Resolution.','skt-solar-energy'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings	
	 
	// Footer Info Area
	$wp_customize->add_section('footer_info_area',array(
			'title'	=> __('Footer Info Box','skt-solar-energy'),
			'priority'	=> null,
	));
	
	$wp_customize->add_setting('address',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('address',array(
			'label'	=> __('Address','skt-solar-energy'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'address'
	));	  
    
	$wp_customize->add_setting('email_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('email_title',array(
			'label'	=> __('Email Title','skt-solar-energy'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'email_title'
	));	
    
	$wp_customize->add_setting('email_address',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('email_address',array(
			'label'	=> __('Email Address','skt-solar-energy'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'email_address'
	));
    
	$wp_customize->add_setting('phone_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone_title',array(
			'label'	=> __('Phone Title','skt-solar-energy'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'phone_title'
	));	
    
	$wp_customize->add_setting('phone_number',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone_number',array(
			'label'	=> __('Phone Number','skt-solar-energy'),
			'section'	=> 'footer_info_area',
			'setting'	=> 'phone_number'
	));          
	
	$wp_customize->add_setting('hide_footer_info',array(
			'sanitize_callback' => 'skt_solar_energy_sanitize_checkbox',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_footer_info', array(
    	   'section'   => 'footer_info_area',    	 
		   'label'	=> __('Uncheck To Show This Section','skt-solar-energy'),
    	   'type'      => 'checkbox'
     ));	
	 // Footer Info Area	 
	 
	$wp_customize->add_section('footer_text_copyright',array(
			'title'	=> esc_html__('Footer Copyright Text','skt-solar-energy'),				
			'priority'		=> null
	));
	
	$wp_customize->add_setting('footer_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('footer_text',array(
			'label'	=> esc_html__('Add Copyright Text Here','skt-solar-energy'),
			'section'	=> 'footer_text_copyright',
			'setting'	=> 'footer_text'
	));		 
}
add_action( 'customize_register', 'skt_solar_energy_customize_register' );
//Integer
function skt_solar_energy_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function skt_solar_energy_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function skt_solar_energy_custom_css() {
    wp_enqueue_style(
        'skt-solar-energy-custom-style',
        get_template_directory_uri() . '/css/skt-solar-energy-custom-style.css' 
    );
        $color = esc_html(get_theme_mod( 'color_scheme' ));
		$headerbgcolor = esc_html(get_theme_mod( 'header_bg_color' )); 
		$footertextcolor = esc_html(get_theme_mod( 'footer_text_color' )); 
		
        $custom_css = "
					#sidebar ul li a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.postmeta a:hover,
					.tagcloud a,
					.blocksbox:hover h3,
					.rdmore a,
					.copyright-txt a:hover, #footermenu li.current-menu-item a, #footermenu li.current_page_item a,
					.header-phone-number,
					#sidebar li a:hover,
					.logo h2 span,
					.footer-row .cols-3 ul li a:hover, .footer-row .cols-3 ul li.current_page_item a
					{ 
						 color: {$color} !important;
					}

					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.wpcf7 input[type='submit'],
					input.search-submit,
					.recent-post .morebtn:hover, 
					.read-more-btn,
					.woocommerce-product-search button[type='submit'],
					.head-info-area,
					.designs-thumb,
					.hometwo-block-button,
					.aboutmore,
					.service-thumb-box,
					.view-all-btn a:hover,
					.social-icons a:hover,
					.skt-header-quote-btn a,
					.custom-cart-count,
					#navigation,
					.fotinfo-content1,
					.fotinfo-content2,
					.fotinfo-content3,
					.main-navigation ul ul li a:hover, .main-navigation ul ul li a:focus, .main-navigation ul ul li.current_page_item a, .main-navigation ul ul li.current-menu-item a
					{ 
					   background-color: {$color} !important;
					}

					.titleborder span:after, .sticky{border-bottom-color: {$color} !important;}
					.header{background-color:{$headerbgcolor};}
					.copyright-txt{color: {$footertextcolor} !important;}	
					 			
				";
        wp_add_inline_style( 'skt-solar-energy-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'skt_solar_energy_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_solar_energy_customize_preview_js() {
	wp_enqueue_script( 'skt_solar_energy_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_solar_energy_customize_preview_js' );