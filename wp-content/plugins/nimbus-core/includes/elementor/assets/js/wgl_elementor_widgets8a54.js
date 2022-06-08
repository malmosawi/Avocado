(function($) {
    "use strict";

    jQuery(window).on('elementor/frontend/init', function() {
        if (window.elementorFrontend.isEditMode()) {
            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-blog.default',
                function($scope) {
                    nimbus_parallax_video();
                    nimbus_blog_masonry_init();
                    nimbus_carousel_slick();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-blog-hero.default',
                function($scope) {
                    nimbus_parallax_video();
                	nimbus_blog_masonry_init();
                	nimbus_carousel_slick();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-carousel.default',
                function($scope) {
                    nimbus_carousel_slick();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-portfolio.default',
                function($scope) {
                    nimbus_isotope();
                    nimbus_carousel_slick();
                    nimbus_scroll_animation();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-events.default',
                function($scope) {
                    nimbus_isotope();
                	nimbus_carousel_slick();
                    nimbus_scroll_animation();
                    nimbus_events_masonry_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-progress-bar.default',
                function($scope) {
                    nimbus_progress_bars_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-testimonials.default',
                function($scope) {
                	nimbus_carousel_slick();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-toggle-accordion.default',
                function($scope) {
                    nimbus_accordion_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-team.default',
                function($scope) {
                    nimbus_isotope();
                    nimbus_carousel_slick();
                    nimbus_scroll_animation();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-tabs.default',
                function($scope) {
                    nimbus_tabs_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-clients.default',
                function($scope) {
                	nimbus_carousel_slick();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-image-layers.default',
                function($scope) {
                	nimbus_img_layers();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-video-popup.default',
                function($scope) {
                    nimbus_videobox_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-countdown.default',
                function($scope) {
                	nimbus_countdown_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-time-line-vertical.default',
                function($scope) {
                	nimbus_init_timeline_appear();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-striped-services.default',
                function($scope) {
                	nimbus_striped_services_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-image-comparison.default',
                function($scope) {
                	nimbus_image_comparison();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-counter.default',
                function($scope) {
                	nimbus_counter_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-menu.default',
                function($scope) {
                    nimbus_menu_lavalamp();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-header-search.default',
                function($scope) {
                    nimbus_search_init();
                }
            );

            window.elementorFrontend.hooks.addAction(
                'frontend/element_ready/wgl-header-side_panel.default',
                function($scope) {
                    nimbus_side_panel_init();
                }
            );
        }
    });

})( jQuery );

