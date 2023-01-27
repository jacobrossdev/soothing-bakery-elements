<?php
/**
 * Plugin Name:       PurelySoothing WPBakery Extensions
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       WPBakery components built for Purely Soothing
 * Version:           1.0
 * Requires at least: 6.1
 * Requires PHP:      7.2
 * Author:            Jacob Ross Development & Simple Online Systems
 * Author URI:        https://jacobrossdev.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       soothing-wpb
 * Domain Path:       /languages
 */

if( !class_exists( 'Soothing_Core_Routines') ){

	class Soothing_Core_Routines {

		public function __construct(){

			$this->add_hooks();
		}

		public function add_hooks(){

			add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
		}

		public function enqueue_scripts(){

			wp_enqueue_style('soothing-bakery', plugin_dir_url(__FILE__) . 'assets/css/soothing-bakery.css', [], false, 'all');
		}
	}

	new Soothing_Core_Routines();
}

if ( ! class_exists( 'Soothing_Bakery_Elements' ) ) {

    class Soothing_Bakery_Elements extends WPBakeryShortCode {

        // Initialize
        function __construct() {
            add_action( 'init', array( $this, 'create_hero_banner_shortcode' ), 999 );            
            add_action( 'init', array( $this, 'create_top_products_shortcode' ), 999 );            
            add_action( 'init', array( $this, 'create_testimonials_shortcode' ), 999 );            
            add_action( 'init', array( $this, 'create_categories_shortcode' ), 999 );            
            add_action( 'init', array( $this, 'create_optin_form_shortcode' ), 999 );
            add_action( 'init', array( $this, 'create_division_shortcode' ), 999 );

            add_shortcode( 'soothing_hero_banner', array( $this, 'render_hero_banner_shortcode' ) );
            add_shortcode( 'soothing_testimonials', array( $this, 'render_testimonials_shortcode' ) );
            add_shortcode( 'soothing_categories', array( $this, 'render_categories_shortcode' ) );
            add_shortcode( 'soothing_top_products', array( $this, 'render_top_products_shortcode' ) );
            add_shortcode( 'soothing_optin_form', array( $this, 'render_optin_form_shortcode' ) );
            add_shortcode( 'soothing_divisions', array( $this, 'render_division_shortcode' ) );
        }        

        // Map

        public function create_hero_banner_shortcode(){
	        vc_map(
				array(
					'name' => __( 'Hero Banner', 'soothing-wpb' ),
					'base' => 'soothing_hero_banner',
					'class' => 'soothing-hero-banner',
					'icon' => 'vc_general vc_element-icon vc_icon-vc-gitem-post-date',
					'category' => __( 'PurelySoothing', 'soothing-wpb'),
					'description' => __( 'Display the Hero Banner.' ),
					'params' => array(

			            array(
			               'type' => 'attach_image',
			               'heading' => __( 'Hero Banner Background', 'soothing-wpb' ),
			               'param_name' => 'hero_banner_bg',
			               'admin_label' => false,
			               'group' => 'soothing-hero-banner'
			            ),
			            array(
			               'type' => 'textarea_raw_html',
			               'heading' => __( 'Hero Banner Header', 'soothing-wpb' ),
			               'param_name' => 'hero_banner_header',
			               'admin_label' => false,
			               'group' => 'soothing-hero-banner'
			            ),
			            array(
			               'type' => 'attach_image',
			               'heading' => __( 'Hero Banner Graphic', 'soothing-wpb' ),
			               'param_name' => 'hero_banner_graphic',
			               'admin_label' => false,
			               'group' => 'soothing-hero-banner'
			            ),
			            array(
			               'type' => 'vc_link',
			               'heading' => __( 'Hero Banner Graphic', 'soothing-wpb' ),
			               'param_name' => 'hero_banner_link',
			               'admin_label' => false,
			               'group' => 'soothing-hero-banner'
			            )
					)
				)
			);
        }

        public function create_top_products_shortcode() {
	        vc_map(
				array(
					'name' => __( 'Top Products', 'soothing-wpb' ),
					'base' => 'soothing_top_products',
					'class' => 'soothing-top-products',
					'icon' => 'vc_general vc_element-icon vc_icon-vc-gitem-post-date',
					'category' => __( 'PurelySoothing', 'soothing-wpb'),
					'description' => __( 'Display the top products we offer.' ),
					'params' => array(
						// params group
						array(
							'header' => 'Product',
							'type' => 'param_group',
							'value' => '',
							'param_name' => 'soothing_top_products_group',
							// Note params is mapped inside param-group:
							'params' => array(
					            array(
					               'type' => 'attach_image',
					               'heading' => __( 'Product Image', 'soothing-wpb' ),
					               'param_name' => 'top_product_image',
					               'admin_label' => false,
					               'group' => 'soothing-top-products',
					            ),
					            array(
					               'type' => 'textarea',
					               'heading' => __( 'Product Description', 'soothing-wpb' ),
					               'param_name' => 'top_product_desc',
					               'admin_label' => false,
					               'group' => 'soothing-top-products',
					            ),
					            array(
					               'type' => 'vc_link',
					               'heading' => __( 'Product Link', 'soothing-wpb' ),
					               'param_name' => 'top_product_link',
					               'admin_label' => false,
					               'group' => 'soothing-top-products',
					            )
							)
						)
					)
				)
			);
        }

        public function create_division_shortcode() {
	        vc_map(
				array(
					'name' => __( 'Divisions', 'soothing-wpb' ),
					'base' => 'soothing_divisions',
					'class' => 'soothing-divisions',
					'icon' => 'vc_general vc_element-icon vc_icon-vc-gitem-post-date',
					'category' => __( 'PurelySoothing', 'soothing-wpb'),
					'description' => __( 'Display the top products we offer.' ),
					'params' => array(
						// params group
						array(
							'header' => 'Division',
							'type' => 'param_group',
							'value' => '',
							'param_name' => 'soothing_division_group',
							// Note params is mapped inside param-group:
							'params' => array(
					            array(
					               'type' => 'attach_image',
					               'heading' => __( 'Division Image', 'soothing-wpb' ),
					               'param_name' => 'division_image',
					               'admin_label' => false,
					               'group' => 'soothing-divisions',
					            ),
					            array(
					               'type' => 'textarea',
					               'heading' => __( 'Division Description', 'soothing-wpb' ),
					               'param_name' => 'division_desc',
					               'admin_label' => false,
					               'group' => 'soothing-divisions',
					            ),
					            array(
					               'type' => 'vc_link',
					               'heading' => __( 'Division Link', 'soothing-wpb' ),
					               'param_name' => 'division_link',
					               'admin_label' => false,
					               'group' => 'soothing-divisions',
					            )
							)
						)
					)
				)
			);
        }

        public function create_categories_shortcode() {
	        vc_map(
				array(
					'name' => __( 'Shop By Category', 'soothing-wpb' ),
					'base' => 'soothing_categories',
					'class' => 'soothing-categories',
					'icon' => 'vc_general vc_element-icon vc_icon-vc-gitem-post-date',
					'category' => __( 'PurelySoothing', 'soothing-wpb'),
					'description' => __( 'Display the categories for the shop.' ),
					'params' => array(
						// params group
						array(
							'header' => 'Categories',
							'type' => 'param_group',
							'value' => '',
							'param_name' => 'soothing_categories_group',
							// Note params is mapped inside param-group:
							'params' => array(
					            array(
					               'type' => 'attach_image',
					               'heading' => __( 'Category Image', 'soothing-wpb' ),
					               'param_name' => 'category_image',
					               'admin_label' => false,
					               'group' => 'soothing-categories',
					            ),
					            array(
					               'type' => 'textfield',
					               'heading' => __( 'Category Name', 'soothing-wpb' ),
					               'param_name' => 'category_name',
					               'admin_label' => false,
					               'group' => 'soothing-categories',
					            ),
					            array(
					               'type' => 'vc_link',
					               'heading' => __( 'Category Link', 'soothing-wpb' ),
					               'param_name' => 'category_link',
					               'admin_label' => false,
					               'group' => 'soothing-categories',
					            )
							)
						)
					)
				)
			);
        }

        public function create_testimonials_shortcode() {
	        vc_map(
				array(
					'name' => __( 'Testimonials', 'soothing-wpb' ),
					'base' => 'soothing_testimonials',
					'class' => 'soothing-testimonials',
					'icon' => 'vc_general vc_element-icon vc_icon-vc-gitem-post-date',
					'category' => __( 'PurelySoothing', 'soothing-wpb'),
					'description' => __( 'Display the testimonials we received.' ),
					'params' => array(
						// params group
						array(
							'header' => 'Product',
							'type' => 'param_group',
							'value' => '',
							'param_name' => 'soothing_testimonials_group',
							// Note params is mapped inside param-group:
							'params' => array(
					            array(
					               'type' => 'attach_image',
					               'heading' => __( 'Person\'s Image', 'soothing-wpb' ),
					               'param_name' => 'testimonial_image',
					               'admin_label' => false,
					               'group' => 'soothing-testimonial',
					            ),
					            array(
					               'type' => 'textfield',
					               'heading' => __( 'Person\'s Name', 'soothing-wpb' ),
					               'param_name' => 'testimonial_name',
					               'admin_label' => false,
					               'group' => 'soothing-testimonial',
					            ),
					            array(
					               'type' => 'textfield',
					               'heading' => __( 'Person\'s Location', 'soothing-wpb' ),
					               'param_name' => 'testimonial_location',
					               'admin_label' => false,
					               'group' => 'soothing-testimonial',
					            ),
					            array(
					               'type' => 'textarea',
					               'heading' => __( 'Testimonial Text', 'soothing-wpb' ),
					               'param_name' => 'testimonial_text',
					               'admin_label' => false,
					               'group' => 'soothing-testimonial',
					            )
							)
						)
					)
				)
			);
        }

        public function create_optin_form_shortcode() {
	        vc_map(
				array(
					'name' => __( 'E-Book Optin Form', 'soothing-wpb' ),
					'base' => 'soothing_optin_form',
					'class' => 'soothing-optin-form',
					'icon' => 'vc_general vc_element-icon vc_icon-vc-gitem-post-date',
					'category' => __( 'PurelySoothing', 'soothing-wpb'),
					'description' => __( 'Display the E-Book Optin Form.' ),
					'params' => array(
			            array(
			               'type' => 'attach_image',
			               'heading' => __( 'Opt-in Image', 'soothing-wpb' ),
			               'param_name' => 'optin_image',
			               'admin_label' => false,
			               'group' => 'soothing-optin',
			            ),
			            array(
			               'type' => 'textfield',
			               'heading' => __( 'Opt-in Header', 'soothing-wpb' ),
			               'param_name' => 'optin_header',
			               'admin_label' => false,
			               'group' => 'soothing-optin',
			            ),
			            array(
			               'type' => 'textarea',
			               'heading' => __( 'Opt-in Marketing Text', 'soothing-wpb' ),
			               'param_name' => 'optin_textarea',
			               'admin_label' => false,
			               'group' => 'soothing-optin',
			            )
					)
				)
			);
        }

        // Render
        public function render_hero_banner_shortcode( $atts, $content, $tag ){
	        	$atts = vc_map_get_attributes($tag, $atts);
	        	$b64Header = base64_decode($atts['hero_banner_header']);
	        	$header = urldecode($b64Header);

				ob_start();
				include __DIR__.'/partials/partial-hero-banner.php';
				echo ob_get_clean();
        }

        public function render_top_products_shortcode( $atts, $content, $tag ) {
           $products = vc_param_group_parse_atts( $atts['soothing_top_products_group'] );

           ob_start();
           include __DIR__.'/partials/partial-top-products.php';
           echo ob_get_clean();
        }

        public function render_division_shortcode( $atts, $content, $tag ) {
           $divisions = vc_param_group_parse_atts( $atts['soothing_division_group'] );

           ob_start();
           include __DIR__.'/partials/partial-divisions.php';
           echo ob_get_clean();
        }

        public function render_categories_shortcode( $atts, $content, $tag ) {
           $categories = vc_param_group_parse_atts( $atts['soothing_categories_group'] );

           ob_start();
           include __DIR__.'/partials/partial-categories.php';
           echo ob_get_clean();
        }

        public function render_testimonials_shortcode( $atts, $content, $tag ) {
           $testimonials = vc_param_group_parse_atts( $atts['soothing_testimonials_group'] );
           
           ob_start();
           include __DIR__ . '/partials/partial-testimonials.php';
           echo ob_get_clean();
        }

        public function render_optin_form_shortcode( $atts, $content, $tag ) {
           ob_start();
           include __DIR__ . '/partials/partial-optin-form.php';
           echo ob_get_clean();
        }


    }

    new Soothing_Bakery_Elements();

}