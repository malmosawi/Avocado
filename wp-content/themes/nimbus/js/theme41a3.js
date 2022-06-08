"use strict";

is_visible_init();
nimbus_slick_navigation_init();

jQuery(document).ready(function($) {
    nimbus_sticky_init();
    nimbus_search_init();
    nimbus_side_panel_init();
    nimbus_mobile_header();
    nimbus_woocommerce_helper();
    nimbus_woocommerce_login_in();
    nimbus_init_timeline_appear();
    nimbus_accordion_init();
    nimbus_services_accordion_init();
    nimbus_striped_services_init();
    nimbus_progress_bars_init();
    nimbus_carousel_slick();
    nimbus_image_comparison();
    nimbus_counter_init();
    nimbus_countdown_init();
    nimbus_img_layers();
    nimbus_page_title_parallax();
    nimbus_extended_parallax();
    nimbus_portfolio_parallax();
    nimbus_message_anim_init();
    nimbus_scroll_up();
    nimbus_link_scroll();
    nimbus_skrollr_init();
    nimbus_sticky_sidebar();
    nimbus_videobox_init();
    nimbus_parallax_video();
    nimbus_tabs_init();
    nimbus_select_wrap();
    nimbus_button_wrap();
    jQuery( '.wgl_module_title .carousel_arrows' ).nimbus_slick_navigation();
    jQuery( '.wgl-filter_wrapper .carousel_arrows' ).nimbus_slick_navigation();
    jQuery( '.wgl-products > .carousel_arrows' ).nimbus_slick_navigation();
    jQuery( '.nimbus_module_custom_image_cats > .carousel_arrows' ).nimbus_slick_navigation();
    nimbus_scroll_animation();
    nimbus_woocommerce_mini_cart();
    nimbus_text_background();
    nimbus_dynamic_styles();
});

jQuery(window).load(function() {
    nimbus_isotope();
    nimbus_blog_masonry_init();
    setTimeout(function(){
        jQuery('#preloader-wrapper').fadeOut();
    },1100);

    nimbus_particles_custom();
    nimbus_menu_lavalamp();
    jQuery(".wgl-currency-stripe_scrolling").each(function(){
        jQuery(this).simplemarquee({
            speed: 40,
            space: 0,
            handleHover: true,
            handleResize: true
        });
    })
});
