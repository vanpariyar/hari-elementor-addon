<?php

function register_hello_world_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/hello-world-widget-1.php' );
    require_once( __DIR__ . '/widgets/hello-world-widget-2.php' );
    require_once( __DIR__ . '/widgets/testimonial-slider.php' );

    $widgets_manager->register( new \Elementor_Hello_World_Widget_1() );
    $widgets_manager->register( new \Elementor_Hello_World_Widget_2() );
    $widgets_manager->register( new \Hari_Elementor_Addons_Testimonial_Slider() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );