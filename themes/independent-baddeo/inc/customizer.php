<?php

/**
 * Independent Publisher Theme Customizer
 *
 * Contains methods for customizing the theme customization screen.
 *
 * @link    http://codex.wordpress.org/Theme_Customization_API
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 */
class IndependentPublisher_Customize {

	public static function register( $wp_customize ) {

		$wp_customize->add_section(
					 'independent_publisher_layout_options', array(
							 'title'    => __( 'Layout Options', 'independent-publisher' ),
							 'priority' => 124,
						 )
		);

		$wp_customize->add_section(
					 'independent_publisher_excerpt_options', array(
							 'title'    => __( 'Excerpt Options', 'independent-publisher' ),
							 'priority' => 125,
						 )
		);

		$wp_customize->add_section(
					 'independent_publisher_general_options', array(
							 'title'    => __( 'General Options', 'independent-publisher' ),
							 'priority' => 130,
						 )
		);

		// Excerpt Options
		$wp_customize->add_setting(
					 'independent_publisher_excerpt_options[excerpts]', array(
							 'default'    => '0',
							 'type'       => 'option',
							 'capability' => 'edit_theme_options',
							 'sanitize_callback' => 'independent_publisher_sanitize_select_excerpt_options',
						 )
		);
		$wp_customize->add_control(
					 'excerpts', array(
							 'label'    => __( 'Post Excerpts', 'independent-publisher' ),
							 'settings' => 'independent_publisher_excerpt_options[excerpts]',
							 'section'  => 'independent_publisher_excerpt_options',
							 'type'     => 'select',
							 'choices'  => array(
								 '0' => __( 'Disabled', 'independent-publisher' ),
								 '1' => __( 'Enabled', 'independent-publisher' )
							 ),
						 )
		);

		// Generate One-Sentence Excerpts
		$wp_customize->add_setting(
					 'independent_publisher_excerpt_options[generate_one_sentence_excerpts]', array(
							 'default'    => false,
							 'type'       => 'option',
							 'capability' => 'edit_theme_options',
							 'sanitize_callback' => 'independent_publisher_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'generate_one_sentence_excerpts', array(
							 'settings' => 'independent_publisher_excerpt_options[generate_one_sentence_excerpts]',
							 'label'    => __( 'Generate One-Sentence Excerpts', 'independent-publisher' ),
							 'section'  => 'independent_publisher_excerpt_options',
							 'type'     => 'checkbox',
						 )
		);

		// Show Full Content for First Post
		$wp_customize->add_setting(
					 'independent_publisher_excerpt_options[show_full_content_first_post]', array(
							 'default'    => false,
							 'type'       => 'option',
							 'capability' => 'edit_theme_options',
							 'sanitize_callback' => 'independent_publisher_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'show_full_content_first_post', array(
							 'settings' => 'independent_publisher_excerpt_options[show_full_content_first_post]',
							 'label'    => __( 'Always Show Full Content for First Post', 'independent-publisher' ),
							 'section'  => 'independent_publisher_excerpt_options',
							 'type'     => 'checkbox',
						 )
		);

		// Show Post Word Count
		$wp_customize->add_setting(
					 'independent_publisher_general_options[show_post_word_count]', array(
							 'default'    => false,
							 'type'       => 'option',
							 'capability' => 'edit_theme_options',
							 'sanitize_callback' => 'independent_publisher_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'show_post_word_count', array(
							 'settings' => 'independent_publisher_general_options[show_post_word_count]',
							 'label'    => __( 'Show Post Word Count in Entry Meta', 'independent-publisher' ),
							 'section'  => 'independent_publisher_general_options',
							 'type'     => 'checkbox',
						 )
		);

		// Show Date in Entry Meta
		$wp_customize->add_setting(
					 'independent_publisher_general_options[show_date_entry_meta]', array(
							 'default'    => false,
							 'type'       => 'option',
							 'capability' => 'edit_theme_options',
							 'sanitize_callback' => 'independent_publisher_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'show_date_entry_meta', array(
							 'settings' => 'independent_publisher_general_options[show_date_entry_meta]',
							 'label'    => __( 'Show Post Date in Entry Meta', 'independent-publisher' ),
							 'section'  => 'independent_publisher_general_options',
							 'type'     => 'checkbox',
						 )
		);

		// Show Widgets on Single Posts
		$wp_customize->add_setting(
					 'independent_publisher_general_options[show_widgets_on_single]', array(
							 'default'    => false,
							 'type'       => 'option',
							 'capability' => 'edit_theme_options',
							 'sanitize_callback' => 'independent_publisher_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'show_widgets_on_single', array(
							 'settings' => 'independent_publisher_general_options[show_widgets_on_single]',
							 'label'    => __( 'Show Widgets on Single Posts', 'independent-publisher' ),
							 'section'  => 'independent_publisher_general_options',
							 'type'     => 'checkbox',
						 )
		);

		// Show Nav Menu on Single Posts
		$wp_customize->add_setting(
					 'independent_publisher_general_options[show_nav_menu_on_single]', array(
							 'default'    => false,
							 'type'       => 'option',
							 'capability' => 'edit_theme_options',
							 'sanitize_callback' => 'independent_publisher_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'show_nav_menu_on_single', array(
							 'settings' => 'independent_publisher_general_options[show_nav_menu_