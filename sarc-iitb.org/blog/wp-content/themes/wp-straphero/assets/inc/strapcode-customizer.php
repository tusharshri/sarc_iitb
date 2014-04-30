<?php

function wpstraphero_customize_register($wp_customize) {
   
   // General Options
   $wp_customize->add_section( 'wpstraphero_general_options' , array(
    'title'      => __('General Options','wpstraphero'),
    'priority'   => 30,
   ) );   
   // Setting group for selecting slider
   $wp_customize->add_section( 'wpstraphero_slider_options' , array(
    'title'      => __('Slider Options','wpstraphero'),
    'priority'   => 35,
   ) );
   
   $wp_customize->add_section( 'wpstraphero_footer_options' , array(
    'title'      => __('Footer Options','wpstraphero'),
    'priority'   => 37,
   ) );

/**
 * Lets begin adding our own settings and controls for this theme
 * Plus organize it in sequence in each setting group with a priority level
 */
	// General Options Selectors
	$wp_customize->add_setting(
    'wpstraphero_blogfeed_excerpts'
    );

    $wp_customize->add_control(
    'wpstraphero_blogfeed_excerpts',
    array(
        'type' => 'checkbox',
        'label' => __('Switch to exceprts on blog feed?','wpstraphero'),
        'section' => 'wpstraphero_general_options',
		'priority' => '1',
        )
    );
	
	$wp_customize->add_setting(
    'wpstraphero_excerpt_length'
    );

    $wp_customize->add_control(
    'wpstraphero_excerpt_length',
    array(
        'type' => 'text',
		'default' => '',
        'label' => __('Define the excerpt length (default is 80 chars)','wpstraphero'),
        'section' => 'wpstraphero_general_options',
		'priority' => '2',
        )
    );
	
	$wp_customize->add_setting(
    'wpstraphero_attachment_commentform_visibility'
    );

    $wp_customize->add_control(
    'wpstraphero_attachment_commentform_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Hide Comment Form on the Attachment page','wpstraphero'),
        'section' => 'wpstraphero_general_options',
		'priority' => '3',
        )
    );
	
	// =====================
    //  = Category Dropdown =
    //  =====================
    $categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('wpstraphero_slide_cat', array(
		'default'        => $default
	));
	$wp_customize->add_control( 'wpstraphero_slide_cat', array(
		'settings' => 'wpstraphero_slide_cat',
		'label'   => __('Select Slider Category:','wpstraphero'),
		'section'  => 'wpstraphero_slider_options',
		'priority' => '1',
		'type'    => 'select',
		'choices' => $cats,
	));
	
	$wp_customize->add_setting( 'wpstraphero_slider_transition', array(
		'default' => 'slide',
	) );

	
	$wp_customize->add_control( 'wpstraphero_slider_transition', array(
    'label'   => __( 'Slider Transition', 'wpstraphero' ),
    'section' => 'wpstraphero_slider_options',
	'priority' => '2',
    'type'    => 'radio',
        'choices' => array(
            'slide' => __( 'Slide', 'wpstraphero' ),
            'slide carousel-fade' => __( 'Fade', 'wpstraphero' ),
        ),
    ));
	
	$wp_customize->add_setting(
    'wpstraphero_slide_number'
    );

    $wp_customize->add_control(
    'wpstraphero_slide_number',
    array(
        'type' => 'text',
		'default' => 5,
        'label' => __('Number Of Slides To Show - i.e 10 (default is 5)','wpstraphero'),
        'section' => 'wpstraphero_slider_options',
        )
    );
	
	$wp_customize->add_setting(
    'wpstraphero_slider_excerpt'
    );

    $wp_customize->add_control(
    'wpstraphero_slider_excerpt',
    array(
        'type' => 'text',
		'default' => 40,
        'label' => __('Enter excerpt length for the slider (default is 40)','wpstraphero'),
        'section' => 'wpstraphero_slider_options',
        )
    );
	
	$wp_customize->add_setting(
    'wpstraphero_slider_visibility'
    );

    $wp_customize->add_control(
    'wpstraphero_slider_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Show Home Slider','wpstraphero'),
        'section' => 'wpstraphero_slider_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
    'wpstraphero_copyright_textbox',
    array(
        'default' => 'Copyright &copy; 2013',
    ));
	
	$wp_customize->add_control(
    'wpstraphero_copyright_textbox',
    array(
        'label' => __('Copyright Text','wpstraphero'),
        'section' => 'wpstraphero_footer_options',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'wpstraphero_credits_visibility'
    );

    $wp_customize->add_control(
    'wpstraphero_credits_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Hide Footer Credits - We understand if you must!','wpstraphero'),
        'section' => 'wpstraphero_footer_options',
        )
    );
	
}
add_action( 'customize_register', 'wpstraphero_customize_register' );