<?php

namespace WooLentor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Assest Management
*/
class Assets_Management{
    
    private static $instance = null;
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function __construct(){
        $this->init();
    }

    public function init() {

        // Register Scripts
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );

        // Frontend Scripts
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ] );

    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {

        $style_list = [
            'htflexboxgrid' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/css/htflexboxgrid.css',
                'version' => WOOLENTOR_VERSION
            ],
            'simple-line-icons-wl' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/css/simple-line-icons.css',
                'version' => WOOLENTOR_VERSION
            ],
            'font-awesome-four' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/css/font-awesome.min.css',
                'version' => WOOLENTOR_VERSION
            ],
            'woolentor-widgets' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/css/woolentor-widgets.css',
                'version' => WOOLENTOR_VERSION
            ],
            'slick' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/css/slick.css',
                'version' => WOOLENTOR_VERSION
            ],
            'woolentor-widgets-rtl' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/css/woolentor-widgets-rtl.css',
                'version' => WOOLENTOR_VERSION
            ],
            'woolentor-ajax-search' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/addons/ajax-search/css/ajax-search.css',
                'version' => WOOLENTOR_VERSION
            ],
        ];
        return $style_list;

    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {

        $script_list = [
            'slick' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/js/slick.min.js',
                'version' => WOOLENTOR_VERSION,
                'deps'    => [ 'jquery' ]
            ],
            'countdown-min' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/js/jquery.countdown.min.js',
                'version' => WOOLENTOR_VERSION,
                'deps'    => [ 'jquery' ]
            ],
            'woolentor-widgets-scripts' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/js/woolentor-widgets-active.js',
                'version' => WOOLENTOR_VERSION,
                'deps'    => [ 'jquery','slick' ]
            ],
            'jquery-nicescroll' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/addons/ajax-search/js/jquery.nicescroll.min.js',
                'version' => WOOLENTOR_VERSION,
                'deps'    => [ 'jquery' ]
            ],
            'woolentor-ajax-search' => [
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/addons/ajax-search/js/ajax-search.js',
                'version' => WOOLENTOR_VERSION,
                'deps'    => [ 'woolentor-widgets-scripts' ]
            ],
            'jquery-single-product-ajax-cart' =>[
                'src'     => WOOLENTOR_ADDONS_PL_URL . 'assets/js/single_product_ajax_add_to_cart.js',
                'version' => WOOLENTOR_VERSION,
                'deps'    => [ 'jquery' ]
            ],
            
        ];

        return $script_list;

    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        // Register Scripts
        foreach ( $scripts as $handle => $script ) {
            $deps = ( isset( $script['deps'] ) ? $script['deps'] : false );
            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        // Register Styles
        foreach ( $styles as $handle => $style ) {
            $deps = ( isset( $style['deps'] ) ? $style['deps'] : false );
            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }

        //Localize Scripts
        $localizeargs = array(
            'woolentorajaxurl' => admin_url( 'admin-ajax.php' ),
            'ajax_nonce'       => wp_create_nonce( 'woolentor_psa_nonce' ),
        );
        wp_localize_script( 'woolentor-widgets-scripts', 'woolentor_addons', $localizeargs );
        
    }

    /**
     * [enqueue_frontend_scripts Load frontend scripts]
     * @return [void]
     */
    public function enqueue_frontend_scripts() {

        $current_theme = wp_get_theme( 'oceanwp' );
        // CSS File
        if ( $current_theme->exists() ){
            wp_enqueue_style( 'font-awesome-four' );
        }else{
            wp_enqueue_style( 'font-awesome' );
        }
        wp_enqueue_style( 'simple-line-icons-wl' );
        wp_enqueue_style( 'htflexboxgrid' );
        wp_enqueue_style( 'slick' );
        wp_enqueue_style( 'woolentor-widgets' );
        
        // If RTL
        if ( is_rtl() ) {
            wp_enqueue_style(  'woolentor-widgets-rtl' );
        }

    }


}

Assets_Management::instance();