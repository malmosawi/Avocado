<?php
ob_start();
ob_end_flush();
session_start();

include('maanage/system/connection.php');
// foreach($_COOKIE as  $key => $val){

//     if($key == 'avocadoShop'){
//       if($_COOKIE['avocadoShop'] > 0 ){
//           $basket = 'true' ;
//       }
//     } else {
//         $basket = 'false' ;
//     }
// }

if($_SESSION['avocadoShop'] != '' and  $_SESSION['avocadoShop'] != 0 and  $_SESSION['avocadoShop'] > 0){
    $basket = 'true' ;
}else{
    $basket = 'false' ;
}


$sql_pro="SELECT * from `products` WHERE `show` = 1 ";
$quer_pro=mysqli_query($con, $sql_pro);




?>

<!DOCTYPE html>
<html lang="en-US">


<head>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Avocado Iraq</title>
    <meta name='robots' content='max-image-preview:large' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='elementor-frontend-css' href='wp-content/cache/wpfc-minified/euqi2xi/4plcs.css'type='text/css' media='all' />
    
    <link href="fonts/font.css" rel="stylesheet">
    
    <style id='elementor-frontend-inline-css' type='text/css'>
        @font-face {
            font-family: 'Vistol Sans Light', sans-serif !important;
            font-weight: 400;
            font-style: normal
        }

        body,h1,h2,h3,h4,h5,h6,span,li,div,a,p,rs-layer,#slider-1-slide-1-layer-8,.elementor-heading-title .elementor-size-default{
            font-family: 'Vistol Sans Light', sans-serif !important;
        }
 
                           

        .elementor-column-gap-default>.elementor-column>.elementor-element-populated {
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
    <link href="fonts/style.css" rel="stylesheet">
    <link rel='stylesheet' id='elementor-post-1353-css'
        href='wp-content/uploads/elementor/css/post-13531e00.css?ver=1627298371' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-global-css' href='wp-content/cache/wpfc-minified/7m48h754/4plcs.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-1153-css'
        href='wp-content/uploads/elementor/css/post-11531e00.css?ver=1627298371' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-1611-css'
        href='wp-content/uploads/elementor/css/post-16111e00.css?ver=1627298371' type='text/css' media='all' />
    <link rel='stylesheet' id='nimbus-default-style-css' href='wp-content/themes/nimbus/style41a3.css?ver=5.8'
        type='text/css' media='all' />
    <link rel='stylesheet' id='nimbus-flaticon-css' href='wp-content/cache/wpfc-minified/9l8es287/4plcs.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-5-all-css' href='wp-content/cache/wpfc-minified/mlzbgdpi/4plcs.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='nimbus-main-css' href='wp-content/cache/wpfc-minified/2z9bkz5v/4plcs.css' type='text/css'
        media='all' />


    <!-- icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style id='nimbus-main-inline-css' type='text/css'>


        input:not([type=checkbox]):not([type=submit]),
        select,
        textarea,
        label,
        blockquote cite,
        #comments .comment_info .meta-wrapper *,
        .author-widget_text,
        .portfolio__custom-meta span,
        .blog-post.format-quote .blog-post_quote-author,
        body .comment-form-cookies-consent>label,
        .widget_meta .post_count,
        .widget_rss li .rssSummary,
        .widget_rss li .rss-date,
        .widget_text .textwidget,
        .nimbus_banner-widget .banner-widget_button .banner-widget__link,
        .nimbus-post-navigation .meta-wrapper span,
        .wgl-counter .wgl-counter_title,
        .recent-posts-widget .meta-wrapper span,
        .recent-posts-widget .post_title,
        .elementor-widget-wgl-pricing-table .pricing_header .pricing_desc,
        .elementor-widget-wgl-time-line-vertical .time_line-content .time_line-text,
        .load_more_item,
        .load_more_wrapper .load_more_item,
        .wgl-portfolio-single_wrapper .wgl-portfolio-item_cats,
        .wgl-working-hours .working-item .working-item_day,
        .wgl-working-hours .working-item .working-item_hours {
            font-family: Fira Sans;
        }

        .elementor-widget-wgl-time-line-vertical .time_line-content .time_line-text {
            font-weight: 400;
        }

        ::placeholder,
        select,
        body .footer .select__field:before,
        .widget_rss .rssSummary,
        .header_search.search_standard .header_search-field .search-field,
        .search-no-results .page_404_wrapper .search-form .search-field,
        .post_meta-categories span,
        .post_meta-categories span:after,
        .blog-post.format-quote .blog-post_quote-author-pos,
        .recent-posts-widget .meta-wrapper a:hover,
        .isotope-filter a,
        .blog-style-hero .blog-post.format-standard .meta-wrapper,
        .blog-style-hero .blog-post.format-link .meta-wrapper,
        .blog-style-hero .blog-post.format-audio .meta-wrapper,
        .blog-style-hero .blog-post.format-quote .meta-wrapper,
        .blog-style-hero .blog-post.format-standard .meta-wrapper a,
        .blog-style-hero .blog-post.format-link .meta-wrapper a,
        .blog-style-hero .blog-post.format-audio .meta-wrapper a,
        .blog-style-hero .blog-post.format-quote .meta-wrapper a,
        .blog-style-hero .blog-post.format-standard .blog-post_text,
        .blog-style-hero .blog-post.format-link .blog-post_text,
        .blog-style-hero .blog-post.format-audio .blog-post_text,
        .blog-style-hero .blog-post.format-quote .blog-post_text {
            color: #616161;
        }

        .single_meta .single_info-share_social-wpapper>span.share_title,
        .single_info-share_social-wpapper>span {
            font-family: Fira Sans;
            color: #616161;
        }

        .nimbus_module_title .external_link .button-read-more {
            line-height: 1.875;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        h1 span,
        h2 span,
        h3 span,
        h4 span,
        h5 span,
        h6 span,
        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a,
        .blog-post_cats,
        .blog-posts .blog-post_title,
        .column1 .item_title a,
        .nimbus_twitter .twitt_title,
        .tagcloud-wrapper .title_tags,
        .strip_template .strip-item a span,
        .single_team_page .team-single_speaches-info .speech-info_desc span,
        .shortcode_tab_item_title,
        .index_number,
        .primary-nav.footer-menu .menu-item a {
            font-family: Fira Sans;
            font-weight: 700;
        }

        .theme-header-font,
        #comments .comment-reply-link,
        legend,
        .widget,
        .widget .widget-title,
        .widget_categories a,
        .widget_product_categories a,
        .widget_meta a,
        .widget_archive a,
        .tagcloud,
        .wp-block-tag-cloud,
        .banner_404,
        .page_404_wrapper .nimbus_404__link,
        .page-header_breadcrumbs,
        body ol>li:before,
        .meta-wrapper,
        .blog-post_info-wrap>.meta-wrapper *,
        .blog-post_content .meta-wrapper,
        .blog-post_text-bg,
        .isotope-filter a .number_filter,
        .author-info_content .author-info_name,
        .button-read-more,
        .countdown-section .countdown-amount,
        .comments-title .number-comments,
        .post_meta-categories,
        .wgl-pricing_plan .pricing_price .price_decimal,
        .mashsb-count .counts,
        .mashsb-box .mashsb-buttons a .text,
        .prev-link,
        .next-link,
        .wgl-pagination,
        .heading_subtitle,
        .info_prev-link_wrapper a,
        .info_next-link_wrapper a,
        .portfolio__custom-meta h5,
        .wgl-portfolio-item_cats,
        .isotope-filter a,
        body .comment-respond .comment-reply-title,
        .page-header_title,
        [class|=dropcap],
        .elementor-drop-cap,
        ul.wp-block-archives.wp-block-archives-list li a,
        ul.wp-block-categories.wp-block-categories-list li a,
        ul.wp-block-categories.wp-block-categories-list li .post_count,
        ul.wp-block-latest-posts li a,
        .elementor-counter,
        .wgl-counter .wgl-counter_value-wrap,
        .wgl-pricing_plan .pricing_highlighter,
        .single_meta .meta-wrapper,
        #comments .commentlist .comment_author_says,
        .wgl-likes .sl-count {
            font-family: Fira Sans;
        }

        blockquote,
        .banner_404,
        .author-info_public,
        .wgl-portfolio-single_item .tagcloud .tagcloud_desc,
        .wgl-portfolio-single_item .single_info-share_social-wpapper .share_title {
            font-family: Fira Sans;
            color: #212121;
        }

        .wgl-background-text,
        .elementor-section.wgl-add-background-text:before {
            font-family: Fira Sans;
            font-weight: 700;
        }

        .theme-header-color,
        body .footer select option,
        button,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        h1 span,
        h2 span,
        h3 span,
        h4 span,
        h5 span,
        h6 span,
        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a,
        .blog-style-hero .blog-post_title a,
        h3#reply-title a,
        .calendar_wrap tbody,
        .comment_author_says,
        .comment_author_says a,
        .search-field,
        .share_post-container:hover>a,
        .wgl-pagination .page .current,
        .wgl-pagination .page .prev,
        .wgl-pagination .page .next,
        .wgl-pagination .page-numbers:hover,
        .wgl-pagination .page-numbers.current,
        .wgl-pagination .page-numbers.prev:hover .fa,
        .wgl-pagination .page-numbers.next:hover .fa,
        .page-link .post-page-numbers:hover,
        .page-link .post-page-numbers.current,
        .share_post-container .share_post,
        .tagcloud-wrapper .title_tags,
        .wgl-pricing_plan .pricing_plan_wrap .pricing_content>ul>li>b,
        .prev-link-info_wrapper,
        .next-link-info_wrapper,
        .item_title a,
        .wgl_module_title.item_title .carousel_arrows a span:after,
        .wgl-portfolio-item_wrapper .portfolio_link,
        .tagcloud a,
        .wp-block-tag-cloud a,
        .blog-style-hero .blog-post.format-standard .blog-post_title a,
        .blog-style-hero .blog-post.format-link .blog-post_title a,
        .blog-style-hero .blog-post.format-audio .blog-post_title a,
        .blog-style-hero .blog-post.format-quote .blog-post_title a,
        .meta-wrapper,
        
        .author-info_social-wrapper .author-info_social-link.fa,
        .page_404_wrapper .search-form:after,
        .wgl-portfolio-single_wrapper .portfolio__item-meta>span:after,
        .button-read-more,
        .portfolio__see-more i,
        .wgl-header-row-section_top a:hover,
        .post-type-archive-team .team-icon,
        .single-team .single_team_page .team__icons .team-icon:hover,
        .header_search.search_standard .header_search-field .search-form:after,
        .wgl-likes .liked .sl-count,
        .blog-post_link .link_post:hover:before,
        .blog-post_views-wrap .wgl-views,
        .blog-post_quote-author {
            color: #212121;
        }
        /* buttonz */
        .wgl-button{
            color:#ffffff;
            border-radius: 42px;
            border-color: #e25e33;
            background-color: #e25e33;
        }

        .author-widget_social a,
        .widget ul li,
        .widget ul li a,
        .calendar_wrap thead,
        ul.recent-posts-widget .post_title a,
        ul.wp-block-archives.wp-block-archives-list li a,
        ul.wp-block-categories.wp-block-categories-list li a,
        ul.wp-block-latest-posts li a,
        .widget .widget-title .widget-title_wrapper,
        .widget_search .search-form:after,
        .widget_search .woocommerce-product-search:after,
        .widget_product_search .search-form:after,
        .widget_product_search .woocommerce-product-search:after,
        .wp-block-calendar #today>a:hover,
        .wp-block-calendar tfoot a:hover {
            color: #212121;
        }

        .search__icon,
        .widget_search .search-form:hover:after,
        .widget_search .woocommerce-product-search:hover:after,
        .widget_product_search .search-form:hover:after,
        .widget_product_search .woocommerce-product-search:hover:after,
        .wgl-theme-header .wgl-button,
        .wgl-pagination .page-numbers:after,
        .page-link .post-page-numbers:after,
        .wgl-carousel .slick-arrow:hover,
        .nimbus_module_title .carousel_arrows a span,
        #comments .comment-reply-link,
        .post_meta-categories span a,
        span.highlighter.header,
        .page_404_wrapper .search-form:hover:after,
        .prev-link_wrapper:hover .image_prev.no_image:after,
        .next-link_wrapper:hover .image_next.no_image:after,
        .wgl-accordion-services .wgl-services_icon-wrap:before,
        .elementor-widget-container .elementor-swiper-button:hover {
            background: #212121;
        }

        .slick-dots li button,
        .inside_image.sub_layer_animation .wgl-portfolio-item_description,
        .wgl-carousel .slick-dots li button:before,
        .wpcf7 .faq .submit-wrapper:hover:after {
            background-color: #212121;
        }

        .nimbus_module_title .carousel_arrows a span:before,
        .wgl-pricing_plan .pricing_highlighter,
        .wgl-carousel.pagination_circle_border .slick-dots li.slick-active button,
        .wgl-carousel.pagination_square_border .slick-dots li.slick-active button {
            border-color: #212121;
        }

        #scroll_up {
            color: #ffffff;
            background-color: #e25e33;
        }

        #scroll_up:not(:empty):hover {
            color: #e25e33;
            background-color: #ffffff;
        }

        .primary-nav>div>ul,
        .primary-nav>ul,
        .sitepress_container>.wpml-ls li,
        .primary-nav ul li.mega-menu-links>ul>li {
            font-family: Fira Sans;
            font-weight: 700;
            line-height: 30px;
            font-size: 17px;
        }

        .primary-nav ul li ul,
        .wpml-ls,
        .sitepress_container>.wpml-ls ul ul li,
        .primary-nav ul li div.mega-menu-container {
            font-family: Fira Sans;
            font-weight: 600;
            line-height: 30px;
            font-size: 16px;
        }

        .wgl-theme-header .header_search-field,
        .primary-nav ul li ul,
        .primary-nav ul li div.mega-menu-container,
        .wgl-theme-header .woo_mini_cart,
        .wpml-ls-legacy-dropdown .wpml-ls-current-language .wpml-ls-sub-menu {
            background-color: rgba(255, 255, 255, 1);
            color: #313131;
        }
        .mobile_nav_wrapper,
        .wgl-menu_outer,
        .wgl-menu_outer .mobile-hamburger-close,
        .mobile_nav_wrapper .primary-nav ul li ul.sub-menu,
        .mobile_nav_wrapper .primary-nav ul li.mega-menu-links>ul.mega-menu>li>ul>li ul,
        .mobile_nav_wrapper .primary-nav ul li.mega-menu-links>ul.mega-menu>li>ul {
            background-color: white;
            color: black;
        }

        .mobile_nav_wrapper .wgl-menu_overlay {
            background-color: rgba(49, 49, 49, 0.8);
        }

        #side-panel .side-panel_sidebar .widget .widget-title .widget-title_wrapper {
            color: rgba(35, 35, 35, 1);
        }

        .theme-primary-color,
        a,
        a:hover .wgl-icon,
        .wgl-icon:hover,
        body ol>li:before,
        button,
        button:focus,
        button:active,
        .dropcap-bg.primary:not(.alt),
        h3#reply-title a:hover,
        ul.nimbus_check li:before,
        header.searсh-header .page-title span,
        .page-header_breadcrumbs .breadcrumbs .current,
        .page-header_breadcrumbs .breadcrumbs>a:hover,
        #comments>h3 span,
        #comments .commentlist .comment_info .meta-wrapper .comment-edit-link,
        .author-info_social-wrapper,
        .blog-post_title i,
        .blog-style-standard .blog-post:hover .blog-post_wrapper .blog-post_meta_info .meta-wrapper span,
        .blog-post_link .link_post:before,
        .blog-post_link .link_post:hover,
        .blog-post.format-standard.link .blog-post_title:before,
        .blog-post.format-quote .blog-post_quote-text:before,
        .post_featured_bg .meta-wrapper a:hover,
        .post_featured_bg .post_meta-wrap .meta-wrapper> :first-child i,
        .copyright a:hover,
        .comment_author_says a:hover,
        #comments .number-comments,
        .nimbus_submit_wrapper:hover>i,
        .nimbus_custom_button i,
        .nimbus_custom_text a,
        .nimbus_twitter a,
        .load_more_works:hover,
        .header_search .header_search-button>i:hover,
        .header_search-field .search-form:after,
        .mc_form_inside #mc_signup_submit:hover,
        .share_link span.fa:hover,
        .share_post span.fa:hover,
        .share_post-container,
        .wgl-likes .sl-icon.unliked,
        .wgl-likes .sl-button:hover,
        .wpml-ls a:hover,
        .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a,
        .wpml-ls-legacy-dropdown .wpml-ls-current-language a:hover,
        .isotope-filter a:after,
        .single_type-1 .single_meta .post_author a:hover,
        .single_type-2 .single_meta .post_author a:hover,
        .meta-wrapper :before,
        .meta-wrapper a:hover,
        ul.wp-block-archives.wp-block-archives-list li a:hover,
        ul.wp-block-categories.wp-block-categories-list li a:hover,
        ul.wp-block-categories.wp-block-categories-list li a:hover+.post_count,
        .wgl-carousel .slick-arrow,
        ul.wp-block-latest-posts li a:hover,
        .author-info_social-wrapper .author-info_social-link.fa:hover,
        .format-quote .blog-post_wrapper .blog-post_media_part:before,
        .elementor-widget-container .elementor-swiper-button,
        body .comment-respond .comment-form a,
        blockquote cite a,
        blockquote:after,
        .banner_404__digit,
        .blog-post_views-wrap .wgl-views:before,
        .isotope-filter a:hover,
        .isotope-filter a.active,
        ul.wp-block-archives.wp-block-archives-list li:before,
        form.post-password-form input[type='submit'] {
            color: #e25e33;
        }

        .single_team_page .team-info_wrapper .team-info_item a:hover,
        .single-member-page .member-icon:hover,
        .single-member-page .team-link:hover,
        .single_team_page .team-single_speaches-info .speech-info_day,
        .single_team_page .team__icons a:hover,
        .single_team_page .highlighted span,
        .team-icons .member-icon:hover,
        .portfolio__custom-annotation .single_info-share_social-wpapper .share_link:hover .fa,
        .portfolio-item__title .title:hover,
        .wgl-portfolio-item_wrapper .portfolio_link-icon:hover,
        .wgl-portfolio-item_cats,
        .wgl-portfolio-single_wrapper .portfolio__item-meta span a:hover,
        .wgl_module_team .team-icon a,
        .wgl_module_team .team-icon a:hover,
        .under_image .portfolio__item-title .title:hover a,
        .wgl-portfolio_container .wgl-carousel.arrows_center_mode .slick-prev:hover:after,
        .wgl-portfolio_container .wgl-carousel.arrows_center_mode .slick-next:hover:after,
        .inside_image .portfolio__item-title .title,
        .inside_image .portfolio__item-meta,
        .inside_image.sub_layer_animation .portfolio__item-meta,
        .wgl-portfolio-single_wrapper .wgl-portfolio-item_cats a:hover,
        .wgl-services-2 .wgl-services_media-wrap .elementor-icon {
            color: #e25e33;
        }

        .nimbus_widget>ul li:hover:before,
        .widget_product_categories ul li a:hover .post_count,
        .widget_rss ul li .rsswidget:hover,
        .widget_recent_entriesul li .post-date,
        .widget_meta ul li .post_count,
        .widget_archive ul li>a:before,
        .widget_nav_menu .current-menu-ancestor>a,
        .widget_nav_menu .current-menu-item>a,
        s.widget_product_categories a:hover+.post_count,
        .widget_meta a:hover+.post_count,
        .widget_archive a:hover+.post_count,
        ul.recent-posts-widget li>.recent-posts-content .post_title a:hover,
        .recent-posts-widget .meta-wrapper a,
        .widget ul li a:hover,
        .widget.nimbus_widget.nimbus_banner-widget .banner-widget_text .tags_title:after,
        .author-widget_social a:hover,
        .widget.widget_recent_comments ul li span.comment-author-link a:hover,
        .isotope-filter a .number_filter,
        .widget_categories ul li a:hover,
        .widget_product_categories ul li a:hover,
        .wp-block-calendar tfoot a {
            color: #e25e33;
        }

        .primary-nav ul li ul li.current-menu-ancestor>a,
        .primary-nav ul li ul li.current_page_ancestor>a,
        .mobile_nav_wrapper .primary-nav ul li ul .menu-item.current-menu-item>a,
        .mobile_nav_wrapper .primary-nav ul ul li.menu-item.current-menu-ancestor>a,
        .mobile_nav_wrapper .primary-nav>ul>li.current-menu-item>a,
        .mobile_nav_wrapper .primary-nav>ul>li.current_page_item>a,
        .mobile_nav_wrapper .primary-nav>ul>li.current-menu-parent>a,
        .mobile_nav_wrapper .primary-nav>ul>li.current-menu-ancestor>a,
        .mobile_nav_wrapper .primary-nav>ul>li.current_page_parent>a,
        .mobile_nav_wrapper .primary-nav>ul>li.current_page_ancestor>a {
            color: #e25e33;
        }

        .primary-nav ul li.mega-menu.mega-cat div.mega-menu-container ul.mega-menu.cats-horizontal>li.is-active>a,
        .primary-nav>ul>li>a>span:before,
        .primary-nav>ul>li>a>span:after,
        .primary-nav ul li ul li>a>span:before,
        .primary-nav ul li ul li>a>span:after,
        .mobile_nav_wrapper .primary-nav>ul>li>a>span:after {
            background: #e25e33 !important;
        }

        header .header-link:hover,
        .hover_links a:hover {
            color: #e25e33 !important;
        }

        .wgl-video_popup .videobox_link {
            fill: #e25e33;
        }

        blockquote:before,
        ul.nimbus_plus li:after,
        ul.nimbus_plus li:before,
        ul.nimbus_hyphen li:before,
        ul.nimbus_dot li:before,
        #multiscroll-nav span,
        #multiscroll-nav li .active span,
        .page-header_breadcrumbs .breadcrumbs>a:before,
        .page-header_breadcrumbs .breadcrumbs>a:after,
        .button-read-more:before,
        .button-read-more:after,
        .load_more_wrapper .load_more_item:hover,
        .blog-style-hero .btn-read-more .blog-post-read-more,
        .blog-style-hero .blog-post .wgl-video_popup,
        .blog-style-hero .blog-post .wgl-video_popup .videobox_link,
        .wpml-ls-legacy-dropdown .wpml-ls-sub-menu .wpml-ls-item a span:before,
        .wgl-portfolio-item_wrapper .wgl-portfolio-item_icon:hover,
        ul.wp-block-categories.wp-block-categories-list li a:hover:after,
        .wpcf7 .demo-1-form .wpcf7-submit,
        .widget .widget-title:before,
        .search-button:hover+.search__icon,
        .wgl-theme-header .lavalamp-object,
        .dropcap-bg.primary.alt,
        .tagcloud a:hover,
        .wp-block-tag-cloud a:hover,
        .post_meta-categories span a:hover,
        .prev-link_wrapper a:hover .image_prev [class|=text],
        .next-link_wrapper a:hover .image_next [class|=text],
        .prev-link_wrapper .image_prev.no_image [class|=text],
        .next-link_wrapper .image_next.no_image [class|=text],
        .prev-link_wrapper .image_prev:after,
        .next-link_wrapper .image_next:after,
        .wgl_module_team .team__icons:hover .team__icons-plus,
        .wgl_module_team .team__icons-plus:before,
        .wgl_module_team .team__icons-plus:after,
        .load_more_wrapper .load_more_item,
        .elementor-slick-slider .slick-slider .slick-next,
        .elementor-slick-slider .slick-slider .slick-prev,
        .widget_categories ul li a:hover:after,
        .nimbus_banner-widget .banner-widget_button,
        .footer .wpcf7 .footer-submit:hover:before,
        .team-single_wrapper.team-morph:before,
        .wgl_module_team.team-morph .team-item_wrap:hover:before,
        .wpcf7 .demo-1-form .wpcf7-submit:hover {
            background: #e25e33;
        }

        #comments>h3:after,
        button:hover,
        mark,
        span.highlighter.primary,
        .header_search .header_search-field .header_search-button-wrapper,
        .header_search.search_mobile_menu .header_search-field .search-form:after,
        .wgl-theme-header .wgl-button,
        .sitepress_container>.wpml-ls ul ul li a:hover:after,
        .format-video .blog-post_media .blog-post_media_part .videobox_link:hover,
        .blog-post.format-quote .blog-post_quote-text:after,
        .blog-style-hero .blog-post-hero_wrapper .divider_post_info,
        .calendar_wrap caption,
        .comment-reply-title:after,
        .nimbus_module_title:after,
        .nimbus_module_title .carousel_arrows a:hover span,
        .load_more_works,
        .mc_form_inside #mc_signup_submit,
        .wgl-ellipsis span,
        .wgl_module_title.item_title .carousel_arrows a:hover,
        .wgl-portfolio_item_link:hover,
        .elementor-slick-slider .slick-slider .slick-prev:hover,
        .elementor-slick-slider .slick-slider .slick-next:hover,
        .elementor-slick-slider .slick-slider .slick-prev:focus,
        .elementor-slick-slider .slick-slider .slick-next:focus,
        .wgl-page-socials .socials__desc .social__link,
        .wgl-page-socials .social__link.custom {
            background-color: #e25e33;
        }

        aside>.widget+.widget:before,
        .widget_meta ul li a:hover:after,
        .widget_archive ul li a:hover:after,
        .widget_product_categories ul li a:hover:before,
        .widget_archive ul li a:before,
        .widget.widget_categories ul li a:hover:before,
        .widget .calendar_wrap table td#today:before,
        .widget .calendar_wrap tbody td>a:before,
        .widget .counter_posts,
        .widget_pages ul li:before,
        .widget_nav_menu .menu .menu-item:before,
        .widget_postshero .recent-posts-widget .post_cat a,
        .widget_meta ul li>a:before,
        .widget_archive ul li>a:before,
        .wp-block-calendar table caption,
        .wp-block-calendar #today>a:before,
        .wpcf7 .faq .wpcf7-form-control-wrap:before,
        .widget-title .widget-title_wrapper:before {
            background-color: #e25e33;
        }

        .blog-post_meta-date,
        .wpcf7 .wpcf7-submit,
        .load_more_item:hover,
        .wgl-carousel.navigation_offset_element .slick-prev:hover,
        .wgl-carousel.navigation_offset_element .slick-next:hover,
        .prev-link:hover,
        .next-link:hover,
        .wpcf7 .call_to_action_1 .wgl_col-2 .wpcf7-submit:hover,
        .load_more_item,
        .coming-soon_form .wpcf7 .wpcf7-submit,
        .wgl-demo-item .wgl-button:hover,
        .inside_image.offset_animation:before,
        .page_404_wrapper .nimbus_404__button .wgl-button:hover,
        .wgl-button.has-morph,
        .page_404_wrapper .nimbus_404__button .wgl-button,
        form.post-password-form input[type='submit']:hover,
        #comments .comment-reply-link:hover,
        .wpcf7 .wpcf7-submit:hover,
        .coming-soon_form .wpcf7 .wpcf7-submit:hover,
        .wgl-demo-item .wgl-button {
            border-color: #e25e33;
            background: #e25e33;
        }

        .header_search,
        .blog-post_link .link_post,
        .blog-post.format-quote .blog-post_quote-text,
        .blog-style-hero .format-no_featured .blog-post-hero_wrapper,
        .blog-style-hero .format-quote .blog-post-hero_wrapper,
        .blog-style-hero .format-audio .blog-post-hero_wrapper,
        .blog-style-hero .format-link .blog-post-hero_wrapper,
        .nimbus_module_title .carousel_arrows a:hover span:before,
        .load_more_works,
        .author-info_social-link:after,
        .author-widget_social a span,
        .single_info-share_social-wpapper .share_link .share-icon_animation,
        .wpcf7 .call_to_action_1 .wgl_col-2 .wpcf7-submit,
        .wgl-portfolio_item_link,
        .wp-block-search__button {
            border-color: #e25e33;
        }

        .portfolio-category:hover,
        .inside_image.sub_layer_animation .portfolio-category:hover {
            color: #9fcb4a;
        }

        .button-read-more span {
            background-color: #9fcb4a;
        }

        .blog-posts .blog-post_title>a {
            background-image: linear-gradient(0deg, #e25e33, #e25e33);
        }

        .footer_top-area .widget.widget_archive ul li>a:hover,
        .footer_top-area .widget.widget_categories ul li>a:hover,
        .footer_top-area .widget.widget_pages ul li>a:hover,
        .footer_top-area .widget.widget_meta ul li>a:hover,
        .footer_top-area .widget.widget_recent_comments ul li>a:hover,
        .footer_top-area .widget.widget_recent_entries ul li>a:hover,
        .footer_top-area .widget.widget_nav_menu ul li>a:hover,
        .footer_top-area .widget.widget_wgl_posts .recent-posts-widget li>.recent-posts-content .post_title a:hover {
            color: #e25e33;
        }

        .footer ul li:before,
        .footer_top-area a:hover {
            color: #e25e33;
        }

        .footer_top-area .widget-title,
        .footer_top-area .widget_rss ul li .rsswidget,
        .footer_top-area .widget.widget_pages ul li a,
        .footer_top-area .widget.widget_nav_menu ul li a,
        .footer_top-area .widget.widget_wgl_posts .recent-posts-widget li>.recent-posts-content .post_title a,
        .footer_top-area .widget.widget_archive ul li>a,
        .footer_top-area .widget.widget_categories ul li>a,
        .footer_top-area .widget.widget_pages ul li>a,
        .footer_top-area .widget.widget_meta ul li>a,
        .footer_top-area .widget.widget_recent_comments ul li>a,
        .footer_top-area .widget.widget_recent_entries ul li>a,
        .footer_top-area .widget.widget_archive ul li:before,
        .footer_top-area .widget.widget_categories ul li:before,
        .footer_top-area strong,
        .footer_top-area h1,
        .footer_top-area h2,
        .footer_top-area h3,
        .footer_top-area h4,
        .footer_top-area h5,
        .footer_top-area h6 {
            color: #ffffff;
        }

        .footer_top-area {
            color: #ffffff;
        }

        .footer_top-area .widget.widget_archive ul li:after,
        .footer_top-area .widget.widget_pages ul li:after,
        .footer_top-area .widget.widget_meta ul li:after,
        .footer_top-area .widget.widget_recent_comments ul li:after,
        .footer_top-area .widget.widget_recent_entries ul li:after,
        .footer_top-area .widget.widget_nav_menu ul li:after,
        .footer_top-area .widget.widget_categories ul li:after {
            background-color: #ffffff;
        }

        .footer .copyright {
            color: #9f9f9f;
        }

        .footer .wpcf7 form>p:last-of-type:after {
            background-color: #e25e33;
        }

        .woocommerce #review_form #respond form#commentform label,
        .woocommerce table.cart td.actions .coupon .input-text,
        .woocommerce .product_meta>span *,
        .woocommerce div.product form.cart div.quantity label.label-qty,
        .woocommerce .summary .product_meta>span span,
        .woocommerce div.product .woocommerce-tabs .panel table.shop_attributes th,
        .widget_price_filter .price_label {
            font-family: Fira Sans;
        }

        .woocommerce #review_form #respond form#commentform label,
        .woocommerce-review-link,
        .woocommerce form .form-row .select2-container--default .select2-selection--single,
        .woocommerce form .form-row .select2-container--default .select2-selection--single .select2-selection__rendered,
        .woocommerce .summary .product_meta>span span,
        .woocommerce table.shop_table td.product-name .product-quantity,
        .woocommerce .summary .product_meta>span a,
        .woocommerce li.woocommerce-mini-cart-item .quantity,
        .woocommerce-error,
        .woocommerce-info,
        .woocommerce-message,
        .shop_table .coupon .input-text {
            color: #616161;
        }

        .product_list_widget .woocommerce-Price-amount,
        ul.wgl-products .price,
        .woocommerce ul.wgl-products li a.add_to_cart_button,
        .woocommerce ul.wgl-products li a.button,
        .woocommerce span.onsale,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .woocommerce nav.woocommerce-pagination ul li,
        .woocommerce .cart input.button,
        .woocommerce-mini-cart__total .woocommerce-Price-amount,
        .woocommerce table.shop_table .woocommerce-Price-amount.amount {
            font-family: Fira Sans;
        }

        .woocommerce-cart-form .coupon label {
            font-family: Fira Sans;
            font-weight: 700;
        }

        .woocommerce .cart-collaterals .cart_totals table th {
            font-family: Fira Sans;
            color: #212121;
        }

        #add_payment_method .cart-collaterals .cart_totals .woocommerce-shipping-destination,
        .woocommerce-cart .cart-collaterals .cart_totals .woocommerce-shipping-destination,
        .woocommerce-checkout .cart-collaterals .cart_totals .woocommerce-shipping-destination,
        .woocommerce label,
        .woocommerce strong,
        .woocommerce.widget_shopping_cart .total strong,
        .woocommerce-page .cart-collaterals .cart_totals table th,
        .woocommerce .summary .product_meta>span,
        .woocommerce ul.cart_list li a,
        .woocommerce table.shop_table td.product-name,
        .woocommerce table.shop_table td.product-name a:hover,
        .woocommerce ul.product_list_widget li a,
        .woocommerce-tabs .comment-reply-title,
        .woocommerce form .form-row label,
        .woocommerce table.shop_table tfoot tr th,
        .woocommerce ul#shipping_method li label,
        #add_payment_method .wc-proceed-to-checkout .button__wrapper .checkout-button,
        .woocommerce-checkout .wc-proceed-to-checkout .button__wrapper .checkout-button,
        .woocommerce table.shop_table div.quantity .qty,
        .woocommerce table.shop_table div.quantity .qty::placeholder,
        .woocommerce div.product .woocommerce-tabs .panel #respond #commentform label,
        .woocommerce div.product .woocommerce-tabs .panel table.shop_attributes th,
        .woocommerce div.product .woocommerce-tabs ul.tabs li,
        .woocommerce div.product .woocommerce-tabs ul.tabs li a,
        .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
        .woocommerce div.product form.cart div.quantity .quantity-wrapper .qty::placeholder,
        .woocommerce div.product form.cart div.quantity .qty,
        .woocommerce div.product form.cart div.quantity .qty::placeholder,
        .woocommerce div.product form.cart .reset_variations:before,
        .woocommerce div.product form.cart .group_table tr td label,
        .woocommerce-grouped-product-list-item__label a,
        .woocommerce #order_review.woocommerce-checkout-review-order table.shop_table tbody tr.cart_item .woocommerce-Price-amount.amount,
        .woocommerce table.shop_table_responsive tr td:before,
        .woocommerce-page table.shop_table_responsive tr td:before,
        .woocommerce form .form-row .required,
        .woocommerce-review-link:hover,
        .woocommerce nav.woocommerce-pagination ul li a:hover,
        .product_meta>span a:hover,
        .woocommerce form .form-row .required,
        .woocommerce .summary .product_meta>span a:hover,
        .woocommerce .widget_shopping_cart .total,
        .woocommerce-review-link:hover,
        .woocommerce-product-gallery__trigger,
        .woocommerce table.shop_table thead th,
        .woocommerce nav.woocommerce-pagination ul li span.current,
        .woo_mini_cart .cart_list .woocommerce-mini-cart-item a:hover+.quantity .amount,
        .widget_price_filter .price_slider_amount .button,
        .widget_price_filter .button:hover:before,
        .widget_price_filter .price_label {
            color: #212121;
        }

        .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
        .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
        .woocommerce nav.woocommerce-pagination ul li>.current:after,
        .woo_mini_cart .wgl-button.has-morph:nth-child(2),
        .woocommerce .cart-collaterals .cart_totals table tr.woocommerce-shipping-totals button.button,
        .shop_table .actions>.wgl-button.has-morph {
            background: #212121;
        }

        .wgl-theme-header .mini-cart .woocommerce-mini-cart.cart_list.product_list_widget li img,
        .woocommerce .products ul.wgl-products li a.add_to_cart_button,
        .woocommerce .products ul.wgl-products li a.button,
        .wgl-theme-header .woo_mini_cart .woocommerce-mini-cart__buttons a.checkout,
        .woocommerce #respond input#submit.alt,
        .woocommerce ul.cart_list li img,
        .woocommerce ul.product_list_widget li img,
        .woocommerce button.button,
        .woocommerce a.button.alt,
        .woocommerce input.button.alt,
        .woocommerce button.button.alt:hover,
        .wc-proceed-to-checkout a.checkout-button {
            border-color: #212121;
        }

        .woocommerce form .form-row .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #212121 transparent transparent transparent;
        }

        .woocommerce-message a.button,
        .woocommerce #respond input#submit:disabled,
        .woocommerce #respond input#submit:disabled[disabled],
        .woocommerce #respond input#submit.disabled,
        .woocommerce a.button:disabled,
        .woocommerce a.button:disabled[disabled],
        .woocommerce a.button.disabled,
        .woocommerce button.button.alt,
        .woocommerce button.button:disabled,
        .woocommerce button.button.disabled,
        .woocommerce input.button:disabled,
        .woocommerce input.button:disabled[disabled],
        .woocommerce input.button.disabled {
            border-color: #212121;
            background: #212121;
        }

        .woocommerce ul.cart_list li a,
        .woocommerce ul.product_list_widget li a,
        .woocommerce .cart-collaterals .cart_totals table tbody tr td,
        .woocommerce-page .cart-collaterals .cart_totals table tbody tr td,
        .woocommerce-page .cart-collaterals .cart_totals table th,
        .woocommerce button.button,
        .woocommerce table.shop_table thead th,
        .woocommerce table.shop_table.cart .button,
        .woocommerce table.shop_table td.product-name,
        .woocommerce .woocommerce-cart-form table.shop_table td,
        .wgl-theme-header .mini-cart .woocommerce-mini-cart.cart_list.product_list_widget li a,
        .wgl-theme-header .woo_mini_cart .woocommerce-mini-cart__buttons a,
        .wgl-theme-header .woocommerce-mini-cart span.quantity,
        .woocommerce .quantity-wrapper input[type="number"],
        .checkout.woocommerce-checkout #ship-to-different-address,
        .checkout.woocommerce-checkout #ship-to-different-address span,
        .woocommerce .product_meta>span,
        .woocommerce.widget_shopping_cart .total strong,
        ul.wgl-products .woocommerce-loop-product__title,
        .woocommerce-tabs ul.tabs li {
            font-family: Fira Sans;
        }

        #add_payment_method table.cart td.actions .coupon .input-text,
        .product_list_widget .product-title,
        .wgl-theme-header .woo_mini_cart .woocommerce-mini-cart__total.wgl-theme-header .wgl-woo_mini_cart .header_cart-heading_description,
        .woocommerce div.product form.cart .group_table tr td label,
        .woocommerce div.product span.price {
            font-family: Fira Sans;
            font-weight: 700;
        }

        .wgl-theme-header .wgl-woo_mini_cart .header_cart-heading_description:after,
        ul.wgl-products .price,
        ul.wgl-products .woocommerce-loop-product__title a:hover,
        .product_list_widget li a:hover .product-title,
        .product_list_widget .woocommerce-Price-amount,
        .widget_price_filter .button:before,
        .woocommerce-grouped-product-list-item__price,
        .woocommerce.single div.product .woocommerce-tabs ul.tabs li:not(.active) a:hover,
        .woocommerce .woocommerce-cart-form__cart-item .product-thumbnail img,
        .woocommerce div.product .woocommerce-product-gallery .flex-viewport,
        .woocommerce div.product .woocommerce-product-gallery .woocommerce-product-gallery__wrapper,
        .woocommerce .woocommerce-cart-form table.shop_table td.product-name a:hover,
        .woocommerce-cart-form .coupon label:after,
        .woocommerce .cart-collaterals .cart_totals>h2:after,
        .woocommerce-page .cart-collaterals .cart_totals>h2:after,
        .woocommerce .summary .product_meta>span a:hover,
        .woocommerce ul.cart_list li a:hover,
        .woocommerce table.shop_table tfoot tr.order-total td .woocommerce-Price-amount.amount,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .woocommerce-mini-cart__total .woocommerce-Price-amount,
        .woocommerce table.shop_table .woocommerce-Price-amount.amount,
        .widget_price_filter .price_slider_amount .button:hover {
            color: #e25e33;
        }

        .wgl-theme-header .woo_mini-count span,
        ul.wgl-products li a.button,
        .woocommerce span.onsale,
        .woocommerce input.button:hover,
        .woocommerce button.button[name="update_cart"]:hover,
        .woocommerce a.button,
        .woocommerce a.button:hover,
        .woocommerce a.button.disabled:hover,
        .woocommerce a.button:disabled:hover,
        .woocommerce a.button:disabled[disabled]:hover,
        .woocommerce button.button:disabled:hover,
        .woocommerce button.button:disabled[disabled]:hover,
        .woocommerce button.button.disabled:hover,
        .woocommerce input.button:disabled:hover,
        .woocommerce input.button:disabled[disabled]:hover,
        .woocommerce input.button.disabled:hover,
        .woocommerce-message a.button:hover,
        .woocommerce .quantity-wrapper span:hover:after,
        .woocommerce.single .woocommerce-product-gallery a.woocommerce-product-gallery__trigger:hover,
        .woocommerce #payment #place_order:hover,
        .woocommerce #respond input#submit,
        .woocommerce #respond input#submit:hover,
        .woocommerce #respond input#submit.disabled:hover,
        .woocommerce #respond input#submit:disabled:hover,
        .woocommerce #respond input#submit:disabled[disabled]:hover,
        .woocommerce #review_form #respond input#submit:hover,
        .woocommerce .cart-collaterals .cart_totals table tr.woocommerce-shipping-totals button.button:hover,
        .woocommerce-mini-cart__buttons a.checkout:hover,
        .woocommerce-mini-cart__buttons .button.checkout,
        .woocommerce-mini-cart__buttons .button:not(.checkout):hover,
        .woocommerce-tabs ul.tabs li:before,
        .woocommerce-tabs ul.tabs li:after,
        .woocommerce-mini-cart__buttons a:not(.checkout),
        .woocommerce table.shop_table.cart .button,
        .woocommerce table.shop_table.cart .button:hover,
        .woocommerce table.shop_table.cart input.button:hover,
        .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
        .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
        .woocommerce .quantity-wrapper .plus:hover:before {
            background-color: #e25e33;
        }

        .wgl-products .wc-forward:after,
        .woocommerce button.button:hover,
        .woocommerce #payment #place_order,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
        .woocommerce.widget_price_filter .ui-slider .ui-slider-handle {
            background: #e25e33;
        }

        .woocommerce-message a.button:hover,
        .wgl-theme-header .mini-cart a.woo_icon:before {
            border-color: #e25e33;
        }

        .wgl-products .button:before,
        .wgl-products .added_to_cart:before,
        .wgl-products .button.added:after {
            background: #9fcb4a;
        }

        body {
            background: #ffffff;
        }

        ol.commentlist:after {
            background: #ffffff;
        }

        h1,
        h1 a,
        h1 span {
            font-family:Fira Sans;
            font-weight: 700;
            font-size: 48px;
            line-height: 72px;
        }

        h2,
        h2 a,
        h2 span {
            font-family: Fira Sans;
            font-weight: 700;
            font-size: 42px;
            line-height: 60px;
        }

        h3,
        h3 a,
        h3 span {
            font-family: Fira Sans;
            font-weight: 700;
            font-size: 36px;
            line-height: 50px;
        }

        h4,
        h4 a,
        h4 span {
            font-family: Fira Sans;
            font-weight: 700;
            font-size: 30px;
            line-height: 40px;
        }

        h5,
        h5 a,
        h5 span {
            font-family:Fira Sans;
            font-weight: 700;
            font-size: 24px;
            line-height: 38px;
        }

        h6,
        h6 a,
        h6 span {
            font-family: Fira Sans;
            font-weight: 700;
            font-size: 18px;
            line-height: 32px;
        }

        @media only screen and (max-width:1200px) {
            .wgl-theme-header {
                background-color: rgba(49, 49, 49, 1) !important;
                color: #ffffff !important;
            }

            .wgl-site-header,
            .wgl-theme-header .primary-nav {
                display: none;
            }

            .wgl-theme-header .hamburger-box{
                display: none !important; 
            }
        }


        @media only screen and (max-width: 600px) {
            .wgl-theme-header .hamburger-box{
                display: inline-flex !important; 
            }
            #slider-1-slide-1-layer-7{
                font-size: 18px !important;
            }
        }

        @media only screen and (max-width:1377px) {
            .wgl-theme-header .wgl-mobile-header {
                display: block;
            }

            .wgl-site-header, .mobile_header_custom{
                display: none;
            }



            /* .wgl-theme-header .hamburger-box {
                display: inline-flex;
            } */

            header.wgl-theme-header .mobile_nav_wrapper .primary-nav {
                display: block;
            }

            .wgl-theme-header .wgl-sticky-header {
                display: none;
            }

            .wgl-page-socials {
                display: none;
            }
        }

        @media only screen and (max-width:1200px) {
            body .wgl-theme-header.header_overlap {
                position: relative;
                z-index: 2;
            }
        }

        @media (max-width:768px) {

            
            .page-header {
                padding-top: 15px !important;
                padding-bottom: 15px !important;
                height: auto !important;
            }

            .page-header_breadcrumbs .divider:not(:last-child):before {
                width: 10px;
            }

            .page-header_content .page-header_title {
                color: #ffffff !important;
                font-size: 42px !important;
                line-height: 48px !important;
            }

            .page-header_content .page-header_breadcrumbs {
                color: #a3a3a3 !important;
                font-size: 16px !important;
                line-height: 24px !important;
            }
        }

        body.elementor-page main .wgl-container.wgl-content-sidebar,
        body.elementor-editor-active main .wgl-container.wgl-content-sidebar,
        body.elementor-editor-preview main .wgl-container.wgl-content-sidebar {
            max-width: 1170px;
            margin-left: auto;
            margin-right: auto;
        }

        body.single main .wgl-container {
            max-width: 1170px;
            margin-left: auto;
            margin-right: auto;
        }
        @media only screen and (max-width: 600px) {
            .specwid{
                width: 100% !important;
            }
            .customHeader{
                margin-right: 0% !important;
            }
            .ss{
                margin-top: -10px !important;
            }
            .custLeft{
                margin-left: 10px !important;
            }
            .prodFilter{
                margin-left: 27px !important;
                margin-top: 22px !important;
            }
        }


        .elementor-1153 .elementor-element.elementor-element-a965785.elementor-view-stacked .elementor-icon{
            background-color: #e25f33;
            border-radius: 20px;
        }
        .elementor-1153 .elementor-element.elementor-element-c8b3d36.elementor-view-stacked .elementor-icon {
            background-color: #2f2f2fba;
            border-radius: 20px;
        }
        
        .elementor-1153 .elementor-element.elementor-element-a965785 .wgl-infobox_content , .elementor-1153 .elementor-element.elementor-element-c8b3d36 .wgl-infobox_content{
            color: #2f2f2f;
        }
    </style>

    <script type='text/javascript' src='wp-includes/js/jquery/jquery.minaf6c.js' id='jquery-core-js'></script>
    <script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.mind617.js' id='jquery-migrate-js'></script>

    <script type='text/javascript'
        src='wp-content/plugins/WGL-toolbar/public/js/wgl-toolbar-public.min4b68.js?ver=1.0.4'
        id='wgl-toolbar-js'></script>
    <script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/rbtools.minef10.js?ver=6.5.3'
        async id='tp-tools-js'></script>
    <script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/rs6.minef10.js?ver=6.5.3' async
        id='revmin-js'></script>
    <link rel="https://api.w.org/" href="wp-json/index.php" />
    <link rel="alternate" type="application/json" href="wp-json/wp/v2/pages/1153.json" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.html?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="UBC" />
    <meta name="generator" content="United Business Corner - IT" />

    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <meta name="generator"
        content="Designed By United Business Corner-IT" />
    <link rel="icon" href="wp-content/uploads/2020/02/Icon.ico" sizes="32x32" />
    <link rel="icon" href="wp-content/uploads/2020/02/Icon.ico" sizes="192x192" />
    <link rel="apple-touch-icon" href="wp-content/uploads/2020/02/Icon.ico" />

    <style type="text/css" id="wp-custom-css">
        @media (max-width: 1545px) {
            header .elementor-widget-wgl-menu.elementor-widget.elementor-element .elementor-widget-container {
                padding-left: 0;
            }
        }
    </style>
    <style id="nimbus_set-dynamic-css" title="dynamic-css" class="redux-options-output">
        #side-panel .side-panel_sidebar {
            padding-top: 40px;
            padding-right: 50px;
            padding-bottom: 40px;
            padding-left: 50px;
        }
    </style>
    <script></script>
</head>

<body
    class="page-template-default page page-id-1506 theme-nimbus woocommerce-js elementor-default elementor-kit-1353 elementor-page elementor-page-1506 e--ua-blink e--ua-chrome e--ua-webkit">
    <header class='wgl-theme-header'>
        <div class='wgl-site-header mobile_header_custom'>
            <div class='container-wrapper'>
                <div data-elementor-type="wp-post" data-elementor-id="1611" class="elementor elementor-1611"
                    data-elementor-settings="[]">
                    <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-1ca01b7 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="1ca01b7" data-element_type="section"
                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e917ec1"
                                            data-id="e917ec1" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-element-a950b2b elementor-widget elementor-widget-wgl-header-logo"
                                                        data-id="a950b2b" data-element_type="widget"
                                                        data-widget_type="wgl-header-logo.default">
                                                        <div class="elementor-widget-container">
                                                            <div class='wgl-logotype-container logo-mobile_enable'>
                                                                <a href='index.php'>
                                                                    <img class="default_logo"
                                                                        src="wp-content/uploads/2020/02/light.png"
                                                                        alt="logo" style="height:89px;"> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-2aa17cc elementor-widget elementor-widget-wgl-header-delimiter"
                                                        data-id="2aa17cc" data-element_type="widget"
                                                        data-widget_type="wgl-header-delimiter.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="delimiter-wrapper">
                                                                <div class="delimiter"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-3e8e5f2 elementor-widget elementor-widget-wgl-menu"
                                                        data-id="3e8e5f2" data-element_type="widget"
                                                        data-widget_type="wgl-menu.default">
                                                        <div class="elementor-widget-container">
                                                            <nav class='primary-nav'>
                                                                <ul id="menu-main" class="menu">
                                                                    <!-- menu-item-has-children -->
                                                                    <li id="menu-item-1858"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1153 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor  menu-item-1858">
                                                                        <a href="index.php"><span><span
                                                                                    class="item_text">Home</span></span>
                                                                           
                                                                        </a>
                                                                     
                                                                    </li>
                                                                    <li id="menu-item-501"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-501">
                                                                        <a href="about-me/index.php"><span><span
                                                                                    class="item_text">About
                                                                                    us</span></span><i
                                                                                class="menu-item__plus"></i></a>
                                                                       
                                                                    </li>
                                                                    <li id="menu-item-214"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-214">
                                                                        <a href="shop/index.php"><span><span
                                                                                    class="item_text">Our
                                                                                    product</span></span><i
                                                                                class="menu-item__plus"></i></a>
                                                                     
                                                                    </li>
                                                                    
                                                                   
                                                                    <li id="menu-item-479"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-479">
                                                                        <a href="contacts/index.php"><span><span
                                                                                    class="item_text">Contacts</span></span><i
                                                                                class="menu-item__plus"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                            <div class="mobile-hamburger-toggle">
                                                                <div class="hamburger-box">
                                                                    <div class="hamburger-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7ab4471 elementor-shape-circle elementor-widget__width-auto elementor-widget elementor-widget-wgl-social-icons"
                                                        data-id="7ab4471" data-element_type="widget"
                                                        data-widget_type="wgl-social-icons.default">
                                                        <div class="elementor-widget-container">
                                                            <div
                                                                class="wgl-social-icons elementor-social-icons-wrapper">
                                                                <a
                                                                    class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f elementor-repeater-item-1aa12fb"
                                                                    href="index35ce.html?fb" target="_blank"
                                                                    title="Facebook"><span
                                                                        class="elementor-screen-only">Facebook-f</span><i
                                                                        class="fab fa-facebook-f"></i></a><a
                                                                    class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-883cf25"
                                                                    href="index4e8e.html?ig" target="_blank"
                                                                    title="Instagram"><span
                                                                        class="elementor-screen-only">Instagram</span><i
                                                                        class="fab fa-instagram"></i></a><a
                                                                    class="elementor-icon elementor-social-icon elementor-social-icon-linkedin-in elementor-repeater-item-fc91baf"
                                                                    href="indexf8e1.html?ln" target="_blank"
                                                                    title="linkedin"><span
                                                                        class="elementor-screen-only">Linkedin-in</span><i
                                                                        class="fab fa-linkedin-in"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='wgl-sticky-header wgl-sticky-element' data-style="scroll_up">
            <div class="container-wrapper">
                <div data-elementor-type="wp-post" data-elementor-id="1611" class="elementor elementor-1611"
                    data-elementor-settings="[]">
                    <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-1ca01b7 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="1ca01b7" data-element_type="section"
                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e917ec1"
                                            data-id="e917ec1" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div class="elementor-element elementor-element-a950b2b elementor-widget elementor-widget-wgl-header-logo"
                                                        data-id="a950b2b" data-element_type="widget"
                                                        data-widget_type="wgl-header-logo.default">
                                                        <div class="elementor-widget-container">
                                                            <div class='wgl-logotype-container logo-mobile_enable'>
                                                                <a href='index.php'>
                                                                    <img class="default_logo"
                                                                        src="wp-content/uploads/2020/02/light.png"
                                                                        alt="logo" style="height:89px;"> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-2aa17cc elementor-widget elementor-widget-wgl-header-delimiter"
                                                        data-id="2aa17cc" data-element_type="widget"
                                                        data-widget_type="wgl-header-delimiter.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="delimiter-wrapper">
                                                                <div class="delimiter"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-3e8e5f2 elementor-widget elementor-widget-wgl-menu"
                                                        data-id="3e8e5f2" data-element_type="widget"
                                                        data-widget_type="wgl-menu.default">
                                                        <div class="elementor-widget-container">
                                                            <nav class='primary-nav'>
                                                                <ul id="menu-main-1" class="menu">
                                                                    <li
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1153 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor  menu-item-1858">
                                                                        <a href="index.php"><span><span
                                                                                    class="item_text">Home</span></span>
                                                                      
                                                                        </a>
                                                                    
                                                                    </li>
                                                                    <li
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-501">
                                                                        <a href="about-me/index.php"><span><span
                                                                                    class="item_text">About
                                                                                    us</span></span><i
                                                                                class="menu-item__plus"></i></a>
                                                                    
                                                                    </li>
                                                                    <li
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-214">
                                                                        <a href="shop/index.php"><span><span
                                                                                    class="item_text">Our
                                                                                    product</span></span><i
                                                                                class="menu-item__plus"></i></a>
                                                                       
                                                                    </li>

                                                               
                                                                    <li
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-479">
                                                                        <a href="contacts/index.php"><span><span
                                                                                    class="item_text">Contacts</span></span><i
                                                                                class="menu-item__plus"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                            <div class="mobile-hamburger-toggle">
                                                                <div class="hamburger-box">
                                                                    <div class="hamburger-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7ab4471 elementor-shape-circle elementor-widget__width-auto elementor-widget elementor-widget-wgl-social-icons"
                                                        data-id="7ab4471" data-element_type="widget"
                                                        data-widget_type="wgl-social-icons.default">
                                                        <div class="elementor-widget-container">
                                                            <div
                                                                class="wgl-social-icons elementor-social-icons-wrapper">
                                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-b96141d"
                                                                    href="index255a.html?tw" target="_blank"
                                                                    title="Twitter"><span
                                                                        class="elementor-screen-only">Twitter</span><i
                                                                        class="fab fa-twitter"></i></a><a
                                                                    class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f elementor-repeater-item-1aa12fb"
                                                                    href="index35ce.html?fb" target="_blank"
                                                                    title="Facebook"><span
                                                                        class="elementor-screen-only">Facebook-f</span><i
                                                                        class="fab fa-facebook-f"></i></a><a
                                                                    class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-883cf25"
                                                                    href="index4e8e.html?ig" target="_blank"
                                                                    title="Instagram"><span
                                                                        class="elementor-screen-only">Instagram</span><i
                                                                        class="fab fa-instagram"></i></a><a
                                                                    class="elementor-icon elementor-social-icon elementor-social-icon-linkedin-in elementor-repeater-item-fc91baf"
                                                                    href="indexf8e1.html?ln" target="_blank"
                                                                    title="linkedin"><span
                                                                        class="elementor-screen-only">Linkedin-in</span><i
                                                                        class="fab fa-linkedin-in"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='wgl-mobile-header' style="background-color:white;color: black;">
            <div class='container-wrapper'>
                <div class="wgl-header-row wgl-header-row-section">
                    <div class="wgl-container">
                        <div class="wgl-header-row_wrapper" style="height:100px;">
                            <div class="position_left header_side">
                                <div class="header_area_container">
                                    <div class='wgl-logotype-container logo-mobile_enable'>
                                        <a href='index.php'>
                                            <img class="logo-mobile" src="wp-content/uploads/2020/02/light.png"
                                                alt="" style="height:72px;"> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="position_center header_side customHeader" style="margin-right: 28%;">
                                <div class="header_area_container">
                                    <nav class='primary-nav' style="height:100px;">
                                        <ul id="menu-main-2" class="menu">
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1153 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor  menu-item-1858">
                                                <a href="index.php"><span><span class="item_text" style="color: #e25e33;">Home</span></span>
                                                 
                                                </a>
                                               
                                            </li>
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-501">
                                                <a href="about-me/index.php"><span><span class="item_text">About
                                                            us</span></span>
                                                    
                                                </a>
                                             
                                            </li>
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-214">
                                                <a href="shop/index.php"><span><span class="item_text">Our
                                                            product</span></span><i class="menu-item__plus"></i></a>
                                              
                                            </li>
                                           
                                        
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-479">
                                                <a href="contacts/index.php"><span><span
                                                            class="item_text">Contacts</span></span><i
                                                        class="menu-item__plus"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                    </div>
                </div>
                <div class="mobile_nav_wrapper" data-mobile-width="$header_queries">
                    <div class="container-wrapper">
                        <div class="wgl-menu_overlay"></div>
                        <div class='wgl-menu_outer sub-menu-position_left' id='wgl-perfect-container'>
                            <div class="wgl-menu-outer_header">
                                <div class="mobile-hamburger-close">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class='wgl-menu-outer_content'>
                                <div class='wgl-logotype-container logo-mobile_enable'>
                                    <a href='index.php'>
                                        <img class="logo-mobile" src="wp-content/uploads/2020/02/light.png"
                                            alt="" style="height:72px;"> </a>
                                </div>
                                <nav class="primary-nav">
                                    <ul id="menu-main-3" class="menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-1858">
                                            <a href="index.php"><span><span class="item_text">Home</span></span></a>
                                            
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-481 menu-item-has-children menu-item-501">
                                            <a href="about-me/index.php"><span><span class="item_text">About
                                                        us</span></span></a>
                                            
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-214">
                                            <a href="shop/index.php"><span><span class="item_text">Our
                                                        products</span></span></a>
                              
                                        </li>
                                      
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-479">
                                            <a href="contacts/index.php"><span><span
                                                        class="item_text">Contacts</span></span><i
                                                    class="menu-item__plus"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main id="main" class="site-main">
        <div class="wgl-container">
            <div class="row ">
                <div id="main-content" class="wgl_col-12">
                    <div data-elementor-type="wp-page" data-elementor-id="1153" class="elementor elementor-1153"
                        data-elementor-settings="[]">
                        <div class="elementor-inner">
                            <div class="elementor-section-wrap">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-c54875c elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="c54875c" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1aa7f91"
                                                data-id="1aa7f91" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-94549e9 elementor-widget elementor-widget-slider_revolution"
                                                            data-id="94549e9" data-element_type="widget"
                                                            data-widget_type="slider_revolution.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="wp-block-themepunch-revslider">
                                                                    <!-- START home 1 REVOLUTION SLIDER 6.5.3 -->
                                                                    <p class="rs-p-wp-fix"></p>
                                                                    <rs-module-wrap id="rev_slider_1_1_wrapper"
                                                                        data-source="gallery"
                                                                        style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
                                                                        <rs-module id="rev_slider_1_1"
                                                                            data-version="6.5.3">
                                                                            <rs-slides>
                                                                                <rs-slide data-key="rs-1"
                                                                                    data-title="Slide"
                                                                                    data-anim="ms:300;r:0;"
                                                                                    data-in="o:0;" data-out="a:false;">
                                                                                    <img src="wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                                                        alt="Slide" title="Home"
                                                                                        class="rev-slidebg tp-rs-img rs-lazyload"
                                                                                        data-lazyload=""
                                                                                        data-parallax="off"
                                                                                        data-no-retina>
  
                                                                                    <rs-layer
                                                                                        id="slider-1-slide-1-layer-1"
                                                                                        class="rs-pxl-4"
                                                                                        data-type="image"
                                                                                        data-rsp_ch="on"
                                                                                        data-xy="xo:639px,483px,376px,91px;yo:-27px,-90px,-28px,-17px;"
                                                                                        data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
                                                                                        data-dim="w:1212px,1000px,759px,468px;h:1076px,888px,674px,415px;"
                                                                                        data-frame_0="x:50,41,31,19;"
                                                                                        data-frame_1="st:300;sp:1000;sR:300;"
                                                                                        data-frame_999="o:0;st:w;sR:7700;"
                                                                                        style="z-index:11;"><img
                                                                                            loading="lazy"
                                                                                            src="wp-content/avocado/content/home_1-slider_01.png"
                                                                                            alt="slider-1"
                                                                                            class="tp-rs-img rs-lazyload"
                                                                                            width="1212" height="1076"
                                                                                            data-lazyload="wp-content/avocado/content/home_1-slider_01.png"
                                                                                            data-no-retina>
                                                                                    </rs-layer>
                                                                                    

                                                                                    <rs-layer
                                                                                        id="slider-1-slide-1-layer-2"
                                                                                        class="rs-pxl-7"
                                                                                        data-type="image"
                                                                                        data-rsp_ch="on"
                                                                                        data-xy="xo:-873px,-720px,-547px,-270px;yo:100px,82px,62px,-13px;"
                                                                                        data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
                                                                                        data-dim="w:833px,687px,521px,321px;h:888px,733px,556px,343px;"
                                                                                        data-frame_0="x:-50,-41,-31,-19;"
                                                                                        data-frame_1="st:800;sp:1000;sR:800;"
                                                                                        data-frame_999="o:0;st:w;sR:7200;"
                                                                                        style="z-index:9;"><img
                                                                                            loading="lazy"
                                                                                            src="wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                                                            alt="slider-2"
                                                                                            class="tp-rs-img rs-lazyload"
                                                                                            width="833" height="888"
                                                                                            data-lazyload="wp-content/uploads/2020/02/home_1-slider_02.png"
                                                                                            data-no-retina>
                                                                                    </rs-layer>
                                                                                  

                                                                                    <rs-layer
                                                                                        id="slider-1-slide-1-layer-3"
                                                                                        class="rs-pxl-3"
                                                                                        data-type="image"
                                                                                        data-rsp_ch="on"
                                                                                        data-xy="xo:-430px,-355px,-269px,-34px;yo:781px,644px,489px,198px;"
                                                                                        data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
                                                                                        data-dim="w:273px,225px,170px,104px;h:268px,221px,167px,103px;"
                                                                                        data-frame_1="e:power4.inOut;st:1800;sp:1500;sR:1800;"
                                                                                        data-frame_999="o:0;st:w;sR:5700;"
                                                                                        data-loop_0="rZ:360deg;"
                                                                                        data-loop_999="sp:70000;"
                                                                                        style="z-index:10;"><img
                                                                                            loading="lazy"
                                                                                            src="wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                                                            alt="slider-3"
                                                                                            class="tp-rs-img rs-lazyload"
                                                                                            width="273" height="268"
                                                                                            data-lazyload=""
                                                                                            data-no-retina>
                                                                                    </rs-layer>
                                                                                   

                                                                                    <rs-layer
                                                                                        id="slider-1-slide-1-layer-4"
                                                                                        class="rs-pxl-8"
                                                                                        data-type="image"
                                                                                        data-rsp_ch="on"
                                                                                        data-xy="xo:599px,395px,300px,65px;yo:20px,-31px,-23px,-14px;"
                                                                                        data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
                                                                                        data-dim="w:273px,225px,170px,104px;h:268px,221px,167px,103px;"
                                                                                        data-frame_1="e:power4.inOut;st:1300;sp:1500;sR:1300;"
                                                                                        data-frame_999="o:0;st:w;sR:6200;"
                                                                                        data-loop_999="rZ:360;sp:60000;"
                                                                                        style="z-index:8;"><img
                                                                                            loading="lazy"
                                                                                            src="wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                                                            alt="slider-4"
                                                                                            class="tp-rs-img rs-lazyload"
                                                                                            width="273" height="268"
                                                                                            data-lazyload=""
                                                                                            data-no-retina>
                                                                                    </rs-layer>
                                                                        

                                                                                    
                                                                                    <rs-layer
                                                                                        id="slider-1-slide-1-layer-6"
                                                                                        data-type="text"
                                                                                        data-color="#212121"
                                                                                        data-rsp_ch="on"
                                                                                        data-xy="xo:32px,26px,19px,11px;yo:242px,251px,150px,342px;"
                                                                                        data-text="w:normal;s:60,60,45,32;l:70,70,53,42;fw:700;"
                                                                                        data-dim="w:auto,auto,auto,564px;"
                                                                                        data-frame_0="o:1;"
                                                                                        data-frame_0_chars="d:5;o:0;rX:90deg;oZ:-50;"
                                                                                        data-frame_1="st:100;sp:1750;sR:100;"
                                                                                        data-frame_1_chars="e:power4.inOut;d:10;oZ:-50;"
                                                                                        data-frame_999="o:0;st:w;sR:5350;"
                                                                                        style="z-index:23;font-family:Fira Sans;">
                                                                                       AVOCADO IRAQ
                                                                                    </rs-layer>
                                                                                    
                                                                                    <rs-layer
                                                                                        id="slider-1-slide-1-layer-7"
                                                                                        data-type="text"
                                                                                        data-color="#e25e33"
                                                                                        data-rsp_ch="on"
                                                                                        data-xy="xo:32px,26px,19px,11px;yo:322px,265px,211px,387px;"
                                                                                        data-text="w:normal;s:43,60,45,32;l:70,70,53,42;fw:400;"
                                                                                        data-frame_0="o:1;"
                                                                                        data-frame_0_chars="d:5;o:0;rX:-90deg;oZ:-50;"
                                                                                        data-frame_1="st:600;sp:1750;sR:600;"
                                                                                        data-frame_1_chars="e:power4.inOut;d:10;oZ:-50;"
                                                                                        data-frame_999="o:0;st:w;sR:5350;"
                                                                                        style="z-index:22;">
                                                                                       NUTRITION ADVISOR
                                                                                    </rs-layer>
                                                                                    

                                                                                    <rs-layer
                                                                                        id="slider-1-slide-1-layer-8"
                                                                                        data-type="text"
                                                                                        data-color="#616161"
                                                                                        data-rsp_ch="on"
                                                                                        data-xy="xo:36px,29px,22px,13px;yo:410px,420px,285px,449px;"
                                                                                        data-text="w:normal;s:16;l:30;"
                                                                                        data-dim="w:562px,551px,540px,452px;"
                                                                                        data-frame_0="y:50,41,31,19;"
                                                                                        data-frame_1="st:1600;sp:1000;sR:1600;"
                                                                                        data-frame_999="o:0;st:w;sR:6400;"
                                                                                        style="z-index:21;font-family:Fira Sans;">
                                                                                        Avocado is a platform that offers credible information to help you make
                                                                                         healthful eating choices. It serves as a gateway to reliable information on nutrition,
                                                                                          healthy eating,
                                                                                         physical activity, and food safety for community. 

                                                                                            <p style="margin-top:3%;">
                                                                                       <span style="text-transform: capitalize;">the first website in iraq that provides healthy products and life style diets</span> <br>
                                                                                        <span>. الموقع الأول في العراق الذي يقدم منتجات و انظمة غذائية بنمط حياة صحي  </span> </p>
                                                                                        

                                                                                        <a
                                                                                                href="about-me/index.php"
                                                                                                class="wgl-button ss"
                                                                                                style="margin-top:10%;
                                                                                                    border-radius: 42px;
                                                                                                   color: #ffffff; padding: 17px 30px; background-color: #e25e33; font-size: 16px;">
                                                                                                <div
                                                                                                    class="button-content-wrapper ">
                                                                                                    <span
                                                                                                        class="wgl-button-text ">MORE</span>
                                                                                                </div>
                                                                                            </a>
                                                                                    </rs-layer>
                                                                                    
                                                                                

                                                                                </rs-slide>
                                                                            </rs-slides>
                                                                        </rs-module>
                                                                        <script type="text/javascript">
                                                                            setREVStartSize({ c: 'rev_slider_1_1', rl: [1240, 1024, 778, 480], el: [1100, 800, 650, 800], gw: [1240, 1024, 778, 480], gh: [1100, 800, 650, 800], type: 'standard', justify: '', layout: 'fullwidth', mh: "0" });
                                                                        </script>
                                                                    </rs-module-wrap>
                                                                    <!-- END REVOLUTION SLIDER -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-1d85697 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="1d85697" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-01c2da5"
                                                data-id="01c2da5" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-5f83e28 elementor-widget elementor-widget-spacer"
                                                            data-id="5f83e28" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <section
                                                            class="elementor-section elementor-inner-section elementor-element elementor-element-2e05f4e elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                            data-id="2e05f4e" data-element_type="section">
                                                            <div
                                                                class="elementor-container elementor-column-gap-extended">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-cdc3a00"
                                                                        data-id="cdc3a00" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-d81d4c6 elementor-view-stacked animation_lifting aleft elementor-widget-icon-box wgl-icon-box elementor-shape-circle elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="d81d4c6"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="shop/index.php"></a>
                                                                                        <div class="wgl-infobox">
                                                                                            <div
                                                                                                class="wgl-infobox_wrapper wgl-layout-left">
                                                                                                <div
                                                                                                    class="media-wrapper icon-wrapper">
                                                                                                    <span
                                                                                                        class="wgl-icon"><i
                                                                                                            class="icon elementor-icon fas fa-check" style="background-color: #e25e33;"
                                                                                                            aria-hidden="true"></i></span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="content_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox-title_wrapper">
                                                                                                        <h3
                                                                                                            class="wgl-infobox_title">
                                                                                                            Healthy Products
                                                                                                            
                                                                                                        </h3>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="wgl-infobox_content">
                                                                                                        <p>منتجات صحية</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="wgl-infobox-button_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox_button button-read-more flaticon-arrow-point-to-right">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-8ea4c7e"
                                                                        data-id="8ea4c7e" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-e7a4d9b elementor-view-stacked animation_lifting aleft elementor-widget-icon-box wgl-icon-box elementor-shape-circle elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="e7a4d9b"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="healthy/index.php"></a>
                                                                                        <div class="wgl-infobox">
                                                                                            <div
                                                                                                class="wgl-infobox_wrapper wgl-layout-left">
                                                                                                <div
                                                                                                    class="media-wrapper icon-wrapper">
                                                                                                    <span
                                                                                                        class="wgl-icon"><i style="background-color: #ffc736;" class="icon elementor-icon fas fa-check" aria-hidden="true"></i>
                                                                                                    </span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="content_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox-title_wrapper">
                                                                                                        <h3
                                                                                                            class="wgl-infobox_title">
                                                                                                            Healthy Programs
                                                                                                        </h3>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="wgl-infobox_content">
                                                                                                        <p>أنظمة صحية
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="wgl-infobox-button_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox_button button-read-more flaticon-arrow-point-to-right">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-40dff66"
                                                                        data-id="40dff66" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-1c199d9 elementor-view-stacked animation_lifting aleft elementor-widget-icon-box wgl-icon-box elementor-shape-circle elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="1c199d9"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="contacts/index.php"></a>
                                                                                        <div class="wgl-infobox">
                                                                                            <div
                                                                                                class="wgl-infobox_wrapper wgl-layout-left">
                                                                                                <div
                                                                                                    class="media-wrapper icon-wrapper">
                                                                                                    <span
                                                                                                        class="wgl-icon"><i
                                                                                                            class="icon elementor-icon fas fa-check"
                                                                                                            aria-hidden="true"></i></span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="content_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox-title_wrapper">
                                                                                                        <h3
                                                                                                            class="wgl-infobox_title">
                                                                                                            Contact Avocado
                                                                                                        </h3>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="wgl-infobox_content">
                                                                                                        <p>تواصل مع أفوكادو</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="wgl-infobox-button_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox_button button-read-more flaticon-arrow-point-to-right">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <div class="elementor-element elementor-element-f6bd855 elementor-widget elementor-widget-spacer"
                                                            data-id="f6bd855" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <section
                                                            class="elementor-section elementor-inner-section elementor-element elementor-element-6c49150 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default"
                                                            data-id="6c49150" data-element_type="section">
                                                            <div
                                                                class="elementor-container elementor-column-gap-default custLeft">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-537ccb9"
                                                                        data-id="537ccb9" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-a33221d elementor-widget elementor-widget-wgl-image-layers"
                                                                                    data-id="a33221d"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-image-layers.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div class="wgl-image-layers">
                                                                                            <div class="img-layer_image-wrapper zoom_in"
                                                                                                style="z-index: 1">
                                                                                                <div class="img-layer_item"
                                                                                                    style="transform: translate(0px, 0%);">
                                                                                                    <div class="img-layer_image"
                                                                                                        style="transition: all 100ms; transition-delay: 0ms;">
                                                                                                        <img src="wp-content/avocado/content/home_01-1.png"
                                                                                                            alt="home_01-1" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                          
                                                                                            <div class="img-layer_image-wrapper fade_in"
                                                                                                style="z-index: 0">
                                                                                                <div class="img-layer_item"
                                                                                                    style="transform: translate(0px, 0%);">
                                                                                                    <div class="img-layer_image"
                                                                                                        style="transition: all 800ms; transition-delay: 1800ms;">
                                                                                                        <img src="wp-content/uploads/2020/02/home_01-3.png"
                                                                                                            alt="home_01-3" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7c60312"
                                                                        data-id="7c60312" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-1a17e52 elementor-widget elementor-widget-spacer"
                                                                                    data-id="1a17e52"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="spacer.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div class="elementor-spacer">
                                                                                            <div
                                                                                                class="elementor-spacer-inner">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-20b08c2 elementor-widget__width-initial aleft subtitle-suspended elementor-widget elementor-widget-wgl-double-headings"
                                                                                    data-id="20b08c2"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-double-headings.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div class="wgl-double_heading">
                                                                                           
                                                                                                <a
                                                                                                class="dbl__link">
                                                                                                <h3
                                                                                                    class="dbl__title-wrapper">
                                                                                                    <span
                                                                                                        class="dbl__title">
                                                                                                        About AVOCADO
                                                                                                    </span>
                                                                                                </h3>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-b5c5787 elementor-widget elementor-widget-spacer"
                                                                                    data-id="b5c5787"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="spacer.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div class="elementor-spacer">
                                                                                            <div
                                                                                                class="elementor-spacer-inner">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-e81c196 elementor-widget__width-initial elementor-widget-tablet__width-inherit elementor-widget elementor-widget-text-editor"
                                                                                    data-id="e81c196"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="text-editor.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div
                                                                                            class="elementor-text-editor elementor-clearfix">
                                                                                            <p
                                                                                                style="margin-bottom: 7px;">
                                                                                                Avocado platform was launched in 2020 with corona pandemic . 
                                                                                               It was founded by pharmacist Zainab Alaa ,
                                                                                                 qualified and experienced consultant pharmacist and dietitians 
                                                                                                So will ensure you get results by offering personalised advice ,
                                                                                                 alternatives and solutions specific to your needs and healthy lifestyle.
                                                                                            
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-5d56caa elementor-widget elementor-widget-spacer"
                                                                                    data-id="5d56caa"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="spacer.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div class="elementor-spacer">
                                                                                            <div
                                                                                                class="elementor-spacer-inner">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-6bd9714 elementor-widget__width-initial aleft elementor-widget elementor-widget-wgl-double-headings"
                                                                                    data-id="6bd9714"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-double-headings.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div class="wgl-double_heading">
                                                                                            <a class="dbl__link">
                                                                                                <h3
                                                                                                    class="dbl__title-wrapper">
                                                                                                    <span
                                                                                                        class="dbl__title">You
                                                                                                        Can Follow us
                                                                                                        also
                                                                                                        Here:</span>
                                                                                                </h3>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-f3ddfa2 elementor-widget elementor-widget-spacer"
                                                                                    data-id="f3ddfa2"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="spacer.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div class="elementor-spacer">
                                                                                            <div
                                                                                                class="elementor-spacer-inner">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-a965785 elementor-view-stacked elementor-widget__width-auto aleft elementor-widget-icon-box wgl-icon-box elementor-shape-circle elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="a965785"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="https://instagram.com/avocado_iq?utm_medium=copy_link"></a>
                                                                                        <div class="wgl-infobox">
                                                                                            <div
                                                                                                class="wgl-infobox_wrapper wgl-layout-left">
                                                                                                <div
                                                                                                    class="media-wrapper icon-wrapper">
                                                                                                    <span
                                                                                                        class="wgl-icon">
                                                                                                        <i
                                                                                                            class="icon elementor-icon fab fa-instagram"
                                                                                                            aria-hidden="true"></i></span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="content_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox-title_wrapper">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="wgl-infobox_content">
                                                                                                        <p>insta</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-c8b3d36 elementor-view-stacked elementor-widget__width-auto aleft elementor-widget-icon-box wgl-icon-box elementor-shape-circle elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="c8b3d36"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="https://www.linkedin.com/in/avocado-iraq-61932b215"></a>
                                                                                        <div class="wgl-infobox">
                                                                                            <div
                                                                                                class="wgl-infobox_wrapper wgl-layout-left">
                                                                                                <div
                                                                                                    class="media-wrapper icon-wrapper">
                                                                                                    <span
                                                                                                        class="wgl-icon"><i
                                                                                                            class="icon elementor-icon fab fa-linkedin-in"
                                                                                                            aria-hidden="true"></i></span>
                                                                                                </div>
                                                                                                <div class="content_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox-title_wrapper">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="wgl-infobox_content">
                                                                                                        <p>Linkedin</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                                
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <div class="elementor-element elementor-element-7dd48f7 elementor-widget elementor-widget-spacer"
                                                            data-id="7dd48f7" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- skils -->


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-8c4604a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="8c4604a" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-2e65421"
                                                data-id="2e65421" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-e286028 aleft subtitle-suspended elementor-widget elementor-widget-wgl-double-headings"
                                                            data-id="e286028" data-element_type="widget"
                                                            data-widget_type="wgl-double-headings.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="wgl-double_heading">
                                                                    <a
                                                                        class="dbl__link">
                                                                        <h3 class="dbl__title-wrapper"><span
                                                                                class="dbl__title">Healthy Products
                                                                                </span></h3>
                                                                                <h5>منتجات صحية</h5>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="elementor-element elementor-element-7229417 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                            data-id="7229417" data-element_type="widget"
                                                            data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-text-editor elementor-clearfix">
                                                                    <p>We have the knowledge and skills to help you get results so you look and feel your best.<br> “You are what you eat, and making healthy food choices can be easy and fun! “                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-e2cc7ce"
                                                data-id="e2cc7ce" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-a3709e6 elementor-widget elementor-widget-spacer"
                                                            data-id="a3709e6" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-44d1100 aright a-mobilecenter elementor-widget elementor-widget-wgl-button"
                                                            data-id="44d1100" data-element_type="widget"
                                                            data-widget_type="wgl-button.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="button-wrapper"><a
                                                                        class="wgl-button btn-size-lg " role="button"
                                                                        href="shop/index.php">
                                                                        <div class="button-content-wrapper "><span
                                                                                class="wgl-button-text">ALL PRODUCTS</span></div>
                                                                    </a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-7eae974 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="7eae974" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-wider">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c4edf0b"
                                                data-id="c4edf0b" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-c32e04f elementor-widget elementor-widget-wgl-portfolio"
                                                            data-id="c32e04f" data-element_type="widget"
                                                            data-widget_type="wgl-portfolio.default">
                                                            <div class="elementor-widget-container">
                                                                <section class="wgl_cpt_section">
                                                                    <div class="wgl-portfolio"
                                                                        id="portfolio_module_610bed3036745">
                                                                        <div class="portfolio__filter isotope-filter filter-left prodFilter" style="margin-top:4% !important;">
                                                                            <a href="#" data-filter=".item" class="active">All<span class="number_filter"></span></a>
                                                                            <a href="#" data-filter=".Men">Men<span  class="number_filter"></span></a>
                                                                            <a href="#" data-filter=".Women">Women<span class="number_filter"></span></a>
                                                                            <a href="#" data-filter=".Children">Children<span class="number_filter"></span></a>
                                                                        </div>
                                                                        <div class="wgl-portfolio_wrapper">
                                                                            <div class="wgl-portfolio_container container-grid row isotope appear-animation anim-slide-top"
                                                                                style="margin-right:-15px; margin-left:-15px; margin-bottom:-30px;">
                                                                                <div class="wgl-portfolio-list_item-size"
                                                                                    style="width: 25%;"></div>

                                                                                <ul class="wgl-products appear-animation anim-slide-left">

                                                                                <?php
                                                                                    while( $pro = mysqli_fetch_assoc($quer_pro)){
                                                                                        echo '
                                                                                        
                                                                                        <li   style="width: 22%;" class="specwid wgl-portfolio wgl-portfolio-list_item   '.$pro['product_class'].' item wgl_col-3 product type-product post-1822 status-publish instock product_cat-sweatshirt product_tag-clothes product_tag-inspiration has-post-thumbnail shipping-taxable purchasable product-type-simple animate">

                                                                                            <div class="woo_product_image shop_media" >
                                                                                                <div class="picture  no_effects">
                                                                                                    <a class="woo_post-link" href="product/product-details/index.php?product='.$pro['product_id'].'">
                                                                                                    <img width="540" height="700" src="product_img/'.$pro['photo1'].'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">
                                                                                                    <img width="540" height="700" src="product_img/'.$pro['photo1'].'" class="attachment-shop_catalog size-shop_catalog" alt="" loading="lazy"></a>
                                                                                                    
                                                                                                    <div id="con-'.$pro['product_id'].'">
                                                                                                        <button id="'.$pro['product_id'].'" onclick="addTocart(this.id)" style="border-radius: 10px;margin-top: 0%;height: 53px;background-color: #e25e33;margin-bottom: 14%;color: white;" class="product_cart button product_type_simple add_to_cart_button ajax_add_to_cart" >
                                                                                                            Add to cart
                                                                                                        </button>
                                                                                                    </div>
                                                                                                   
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="woo_product_content">
                                                                                                <h2 class="woocommerce-loop-product__title">
                                                                                                    <a href="product/product-details/index.php?product='.$pro['product_id'].'" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">'.$pro['product_name'].'</a>
                                                                                                </h2>
                                                                                                
                                                                                                
                                                                                                <span class="price">
                                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                                        <bdi>
                                                                                                            <span class="woocommerce-Price-currencySymbol"></span>'.number_format($pro['product_price']).'  د.ع 
                                                                                                      </bdi>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </div>
                                                                                    </li>

                                                                                        
                                                                                        ';
                                                                                    }

                                                                                
                                                                                ?>



                                                                                </ul>
                                                                                   


                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-a45390e elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="a45390e" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-732ae8c"
                                                data-id="732ae8c" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-7e02f22 aleft subtitle-suspended elementor-widget elementor-widget-wgl-double-headings"
                                                            data-id="7e02f22" data-element_type="widget"
                                                            data-widget_type="wgl-double-headings.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="wgl-double_heading">
                                                                   <a
                                                                        class="dbl__link" key="value">
                                                                        <h3 class="dbl__title-wrapper"><span
                                                                                class="dbl__title">Health Issues management :
                                                                                   
                                                                                </span></h3>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-c6e8189 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                            data-id="c6e8189" data-element_type="widget"
                                                            data-widget_type="text-editor.default">
                                                           
                                                        </div>
                                                        <section
                                                            class="elementor-section elementor-inner-section elementor-element elementor-element-cb71962 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                            data-id="cb71962" data-element_type="section">
                                                            <div
                                                                class="elementor-container elementor-column-gap-default">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5f0868a"
                                                                        data-id="5f0868a" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                              
                                                                                <div class="elementor-element elementor-element-605be95 elementor-widget elementor-widget-text-editor"
                                                                                    data-id="605be95"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="text-editor.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div
                                                                                            class="elementor-text-editor elementor-clearfix">
                                                                                            <ul class="nimbus_dot">
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Obesity </li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Heart
                                                                                                    Health/Cholesterol
                                                                                                </li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    High Blood Pressure
                                                                                                </li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Healthy Weight Gain
                                                                                                    Advice</li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Weight loss
                                                                                                    disorders </li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Pre Diabetes </li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Type 1 and Type 2
                                                                                                    Diabetes </li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Eating Disorders
                                                                                                </li>

                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-84aeb62"
                                                                        data-id="84aeb62" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-b956fde elementor-widget elementor-widget-text-editor"
                                                                                    data-id="b956fde"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="text-editor.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div
                                                                                            class="elementor-text-editor elementor-clearfix">
                                                                                            <ul class="nimbus_dot">
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Food
                                                                                                    Intolerance/Allergy
                                                                                                </li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Gut Health</li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Celiac Disease</li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Irritable Bowel
                                                                                                    Syndrome</li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Inflammatory Bowel
                                                                                                    Disease</li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Arthritis/Gout</li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Autoimmune Related
                                                                                                    Issues</li>
                                                                                                <li
                                                                                                    style="line-height: 37px;">
                                                                                                    Cancer Management
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7dd46f5"
                                                data-id="7dd46f5" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-5c9ae0c elementor-widget elementor-widget-wgl-image-layers"
                                                            data-id="5c9ae0c" data-element_type="widget"
                                                            data-widget_type="wgl-image-layers.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="wgl-image-layers">
                                                                    <div class="img-layer_image-wrapper fade_in"
                                                                        style="z-index: 1">
                                                                        <div class="img-layer_item"
                                                                            style="transform: translate(0px, 0%);">
                                                                            <div class="img-layer_image"
                                                                                style="transition: all 100ms; transition-delay: 50ms;">
                                                                                <img src="wp-content/avocado/content/home_05-1.png"
                                                                                    alt="home_05-1" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="img-layer_image-wrapper zoom_in"
                                                                        style="z-index: 0">
                                                                        <div class="img-layer_item"
                                                                            style="transform: translate(0px, 0%);">
                                                                            <div class="img-layer_image"
                                                                                style="transition: all 800ms; transition-delay: 1200ms;">
                                                                                <img src="wp-content/uploads/2020/02/home_05-2.png"
                                                                                    alt="home_05-2" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-8c1eac9 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="8c1eac9" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f09be0a"
                                                data-id="f09be0a" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-0fa7aee acenter elementor-widget elementor-widget-wgl-double-headings"
                                                            data-id="0fa7aee" data-element_type="widget"
                                                            data-widget_type="wgl-double-headings.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="wgl-double_heading"><a class="dbl__link">
                                                                        <h3 class="dbl__title-wrapper"><span
                                                                                class="dbl__title">Brands We Prefer</span></h3>
                                                                    </a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-d244ca5 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="d244ca5" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e2a7aa7"
                                                data-id="e2a7aa7" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-ca9e4df elementor-widget elementor-widget-spacer"
                                                            data-id="ca9e4df" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-a717b00 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="a717b00" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-dde0002"
                                                data-id="dde0002" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-1548eed elementor-widget elementor-widget-wgl-clients"
                                                            data-id="1548eed" data-element_type="widget"
                                                            data-widget_type="wgl-clients.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="wgl-clients clearfix anim-ex_images_ver items-6"
                                                                    data-carousel="yes">
                                                                    <div class="wgl-carousel_wrapper">
                                                                        <div class="wgl-carousel">
                                                                            <div class="wgl-carousel_slick"
                                                                                data-slick='{"slidesToShow":6,"slidesToScroll":1,"infinite":true,"variableWidth":false,"autoplay":true,"autoplaySpeed":"3000","speed":300,"arrows":false,"dots":false,"adaptiveHeight":false,"responsive":[{"breakpoint":1170,"settings":{"slidesToShow":4,"slidesToScroll":1}},{"breakpoint":1025,"settings":{"slidesToShow":3,"slidesToScroll":1}},{"breakpoint":600,"settings":{"slidesToShow":1,"slidesToScroll":1}}]}'>
                                                                                
                                                                                <div class="clients_image">
                                                                                    <div class="image_wrapper"><img
                                                                                            class="hover_image"
                                                                                            alt="partners-4-hover"
                                                                                            src="wp-content/avocado/brands/black-partner-1.png" /><img
                                                                                            class="main_image"
                                                                                            alt="partners_1"
                                                                                            src="wp-content/avocado/brands/black-partner-1.png" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clients_image">
                                                                                    <div class="image_wrapper"><img
                                                                                            class="hover_image"
                                                                                            alt="partners-1-hover"
                                                                                            src="wp-content/avocado/brands/black-partner-2.png" /><img
                                                                                            class="main_image"
                                                                                            alt="partners_2"
                                                                                            src="wp-content/avocado/brands/black-partner-2.png" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clients_image">
                                                                                    <div class="image_wrapper"><img
                                                                                            class="hover_image"
                                                                                            alt="partners-2-hover"
                                                                                            src="wp-content/avocado/brands/black-partner-3.png" /><img
                                                                                            class="main_image"
                                                                                            alt="partners_3"
                                                                                            src="wp-content/avocado/brands/black-partner-3.png" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clients_image">
                                                                                    <div class="image_wrapper"><img
                                                                                            class="hover_image"
                                                                                            alt="partners-3-hover"
                                                                                            src="wp-content/avocado/brands/black-partner-4.png" /><img
                                                                                            class="main_image"
                                                                                            alt="partners_4"
                                                                                            src="wp-content/avocado/brands/black-partner-4.png" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clients_image">
                                                                                    <div class="image_wrapper"><img
                                                                                            class="hover_image"
                                                                                            alt="partners-5-hover"
                                                                                            src="wp-content/avocado/brands/black-partner-5.png" /><img
                                                                                            class="main_image"
                                                                                            alt="partners_5"
                                                                                            src="wp-content/avocado/brands/black-partner-5.png" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="clients_image">
                                                                                    <div class="image_wrapper"><img
                                                                                            class="hover_image"
                                                                                            alt="partners-5-hover"
                                                                                            src="wp-content/avocado/brands/black-partner-6.png" /><img
                                                                                            class="main_image"
                                                                                            alt="partners_5"
                                                                                            src="wp-content/avocado/brands/black-partner-6.png" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
        
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-1c38f21 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="1c38f21" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f2446e1"
                                                data-id="f2446e1" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-31c2b5b elementor-widget elementor-widget-spacer"
                                                            data-id="31c2b5b" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-bde7ab1 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="bde7ab1" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-9de3004"
                                                data-id="9de3004" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-d219b7e elementor-widget elementor-widget-wgl-image-layers"
                                                            data-id="d219b7e" data-element_type="widget"
                                                            data-widget_type="wgl-image-layers.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="wgl-image-layers">
                                                                    <div class="img-layer_image-wrapper slide_down"
                                                                        style="z-index: 1">
                                                                        <div class="img-layer_item"
                                                                            style="transform: translate(0px, 0%);">
                                                                            <div class="img-layer_image"
                                                                                style="transition: all 100ms; transition-delay: 50ms;">
                                                                                <img src="wp-content/uploads/2020/02/testimonials_img-01.png"
                                                                                    alt="testimonials_img-01" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-f5bacd7"
                                                data-id="f5bacd7" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <section
                                                            class="elementor-section elementor-inner-section elementor-element elementor-element-07f3be4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                            data-id="07f3be4" data-element_type="section"
                                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div
                                                                class="elementor-container elementor-column-gap-default">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-2202b3a"
                                                                        data-id="2202b3a" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-d65ce3e aleft subtitle-suspended elementor-widget elementor-widget-wgl-double-headings"
                                                                                    data-id="d65ce3e"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-double-headings.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div class="wgl-double_heading">
                                                                                            
                                                                                                <a
                                                                                                class="dbl__link">
                                                                                                <h3
                                                                                                    class="dbl__title-wrapper">
                                                                                                    <span
                                                                                                        class="dbl__title">
                                                                                                        Director’s words:
                                                                                                    </span>
                                                                                                </h3>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-ee09a43 elementor-widget elementor-widget-wgl-testimonials"
                                                                                    data-id="ee09a43"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-testimonials.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <div
                                                                                            class="wgl-testimonials type-author_top aleft">
                                                                                            <div
                                                                                                class="wgl-carousel_wrapper">
                                                                                                <div
                                                                                                    class="wgl-carousel prev_next_pos_right">
                                                                                                    <div class="wgl-carousel_slick fade_slick"
                                                                                                        data-slick='{"slidesToShow":1,"slidesToScroll":1,"infinite":true,"variableWidth":false,"autoplay":false,"autoplaySpeed":"","speed":300,"arrows":true,"dots":false,"adaptiveHeight":false,"responsive":[{"breakpoint":0,"settings":{"slidesToShow":1,"slidesToScroll":1}},{"breakpoint":0,"settings":{"slidesToShow":1,"slidesToScroll":1}},{"breakpoint":0,"settings":{"slidesToShow":1,"slidesToScroll":1}}]}'>
                                                                                                        <div
                                                                                                            class="wgl-testimonials-item_wrap">
                                                                                                            <div
                                                                                                                class="wgl-testimonials_item">
                                                                                                                <div
                                                                                                                    class="content_wrap">
                                                                                                                    <div
                                                                                                                        class="wgl-testimonials_quote">
                                                                                                                        <p>
                                                                                                                            I believe that the best way to grow healthy families and communities is by working with a diverse team. We work closely with healthcare professionals, parents and teachers in many aspects of our company to help deliver timely 
                                                                                                                            and effective nutrition information.
                                                                                                                               
                                                                                                                    
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="meta_wrap">
                                                                                                                    <div
                                                                                                                        class="name_wrap">
                                                                                                                        <h3
                                                                                                                            class="wgl-testimonials_name">
                                                                                                                            Zainab Alaa
                                                                                                                        </h3>
                                                                                                                        <span
                                                                                                                            class="wgl-testimonials_position">
                                                                                                                            pharmacist
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="wgl-testimonials-item_wrap">
                                                                                                            <div
                                                                                                                class="wgl-testimonials_item">
                                                                                                                <div
                                                                                                                    class="content_wrap">
                                                                                                                    <div
                                                                                                                        class="wgl-testimonials_quote">
                                                                                                                        <p>
                                                                                                                            believes that exposing children and their parents to healthy whole and nutrient dense foods,
                                                                                                                            with a fruit and vegetable emphasis, will encourage them to adopt healthy eating habits early in life.
                                                                                                                             This foundation will make it more likely that they carry these good habits into adulthood.

 And finally You should know that 
 you're in good hands when you work with us .
                                                                                                                    
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="meta_wrap">
                                                                                                                    <div
                                                                                                                        class="name_wrap">
                                                                                                                        <h3
                                                                                                                            class="wgl-testimonials_name">
                                                                                                                            Zainab Alaa
                                                                                                                        </h3>
                                                                                                                        <span
                                                                                                                            class="wgl-testimonials_position">
                                                                                                                            pharmacist</span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-a3369d4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="a3369d4" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ebe46f4"
                                                data-id="ebe46f4" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-7923106 elementor-widget elementor-widget-spacer"
                                                            data-id="7923106" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-933361b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="933361b" data-element_type="section"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e529037"
                                                data-id="e529037" data-element_type="column"
                                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-6d994a3 elementor-widget elementor-widget-spacer"
                                                            data-id="6d994a3" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-0252dd1 elementor-widget elementor-widget-heading"
                                                            data-id="0252dd1" data-element_type="widget"
                                                            data-widget_type="heading.default">
                                                            <div class="elementor-widget-container">
                                                                <h2
                                                                    class="elementor-heading-title elementor-size-default">
                                                                    Let’s Talk!</h2>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-c774c95 elementor-widget elementor-widget-spacer"
                                                            data-id="c774c95" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <section
                                                            class="elementor-section elementor-inner-section elementor-element elementor-element-2dd86fd elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                            data-id="2dd86fd" data-element_type="section">
                                                            <div
                                                                class="elementor-container elementor-column-gap-default">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-1a7359e"
                                                                        data-id="1a7359e" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-b4f5ed0 acenter elementor-widget-icon-box wgl-icon-box elementor-view-default elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="b4f5ed0"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="tel:your-tel"></a>
                                                                                        <div class="wgl-infobox">
                                                                                            <div
                                                                                                class="wgl-infobox_wrapper wgl-layout-top">
                                                                                                <div
                                                                                                    class="media-wrapper icon-wrapper">
                                                                                                    <span
                                                                                                        class="wgl-icon"><i
                                                                                                            class="icon elementor-icon flaticon flaticon-phone-1"
                                                                                                            aria-hidden="true"></i></span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="content_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox-title_wrapper">
                                                                                                        <h3
                                                                                                            class="wgl-infobox_title">
                                                                                                            Call us:
                                                                                                        </h3>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="wgl-infobox_content">
                                                                                                        <p>+964 782 685 5550</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-ff6436a"
                                                                        data-id="ff6436a" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-a4fcf9d acenter elementor-widget-icon-box wgl-icon-box elementor-view-default elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="a4fcf9d"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="mailto:your-mail"></a>
                                                                                        <div class="wgl-infobox">
                                                                                            <div
                                                                                                class="wgl-infobox_wrapper wgl-layout-top">
                                                                                                <div
                                                                                                    class="media-wrapper icon-wrapper">
                                                                                                    <span
                                                                                                        class="wgl-icon"><i
                                                                                                            class="icon elementor-icon flaticon flaticon-send"
                                                                                                            aria-hidden="true"></i></span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="content_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox-title_wrapper">
                                                                                                        <h3
                                                                                                            class="wgl-infobox_title">
                                                                                                            Email us
                                                                                                        </h3>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="wgl-infobox_content">
                                                                                                        <p>info@avocado-iq.com
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-d360891"
                                                                        data-id="d360891" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-c4167b6 acenter elementor-widget-icon-box wgl-icon-box elementor-view-default elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="c4167b6"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="indexf776.html?your-social"></a>
                                                                                        <div class="wgl-infobox">
                                                                                            <div
                                                                                                class="wgl-infobox_wrapper wgl-layout-top">
                                                                                                <div
                                                                                                    class="media-wrapper icon-wrapper">
                                                                                                    <span
                                                                                                        class="wgl-icon"><i
                                                                                                            class="icon elementor-icon fab fa-instagram"
                                                                                                            aria-hidden="true"></i></span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="content_wrapper">
                                                                                                    <div
                                                                                                        class="wgl-infobox-title_wrapper">
                                                                                                        <h3
                                                                                                            class="wgl-infobox_title">
                                                                                                            Follow us:
                                                                                                        </h3>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="wgl-infobox_content">
                                                                                                        <p>avocado_iq
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <div class="elementor-element elementor-element-2142926 elementor-widget elementor-widget-spacer"
                                                            data-id="2142926" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-da01387 acenter elementor-widget elementor-widget-wgl-button"
                                                            data-id="da01387" data-element_type="widget"
                                                            data-widget_type="wgl-button.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="button-wrapper"><a
                                                                        class="wgl-button btn-size-xl " role="button"
                                                                        href="contacts/index.php">
                                                                        <div class="button-content-wrapper "><span
                                                                                class="wgl-button-text">CONTACT US</span>
                                                                        </div>
                                                                    </a></div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-28e119a elementor-widget elementor-widget-spacer"
                                                            data-id="28e119a" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-5e31284 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="5e31284" data-element_type="section"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5afcbd1"
                                                data-id="5afcbd1" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-bca37e9 elementor-widget elementor-widget-text-editor"
                                                            data-id="bca37e9" data-element_type="widget"
                                                            data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-text-editor elementor-clearfix">
                                                                    <p style="text-align: center;">Designed by <a
                                                                            href="https://it.ubc-iraq.com/"
                                                                            target="blank"
                                                                            style="color: inherit;">United Business Corner-IT</a>.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class='footer clearfix' id='footer'></footer>
    
    
    <a href="#" id="scroll_up"></a>
    

   
    <div id="basket">
        <?php if($basket == 'true'): ?>
            <a href="cart/cart.php" style="opacity: 1;right: 22px;width: 50px;height: 50px;top: 48%;background-color: #e25e33;position: fixed;z-index: 20;color:white;bottom: 20px;border-radius: 50%;text-align: center;" id=""><i  style="    margin-top: 30%;font-size: 21px;" class="fas fa-shopping-basket"></i></a>
        <?php endif; ?>
    </div>


    <link rel="preload" as="font" id="rs-icon-set-revicon-woff"
        href="wp-content/plugins/revslider/public/assets/fonts/revicons/revicons90c6.woff?5510888" type="font/woff"
        crossorigin="anonymous" media="all" />

    <script type="text/javascript">
        if (typeof revslider_showDoubleJqueryError === "undefined") { function revslider_showDoubleJqueryError(sliderID) { console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion."); console.log("To fix this, you can:"); console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on"); console.log("2. Find the double jQuery.js inclusion and remove it"); return "Double Included jQuery Library"; } }
    </script>
    <link rel='stylesheet' id='animate-css' href='wp-content/cache/wpfc-minified/otpn2na/4plcs.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='e-animations-css' href='wp-content/cache/wpfc-minified/9mg4cu5e/4plcs.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css' href='wp-content/cache/wpfc-minified/7x75up1e/4plcs.css'
        type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'>
        .wgl-button:before {
            content: '';
            position: absolute;
            top: -5%;
            right: 7%;
            bottom: 10%;
            left: 2%;
            filter: brightness(0.9);
            border-radius: 50% 50% 78% 22% / 0% 0% 100% 100%;
            animation: btn_morph 3s linear infinite forwards paused;
            transition: inherit;
            background-color: #e25e33;
            
        }

        .button-black.wgl-button:before {
            background-color: #000000
        }
    </style>

    <script type='text/javascript' src='wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js'
        id='wp-polyfill-js'></script>

 

    <script type='text/javascript'
        src='wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js'
        id='jquery-blockui-js'></script>

    <script type='text/javascript'
        src='wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min4245.js'
        id='wc-add-to-cart-js'></script>
    <script type='text/javascript'
        src='wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js'
        id='js-cookie-js'></script>

    <script type='text/javascript'
        src='wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min4245.js'
        id='woocommerce-js'></script>

    <script type='text/javascript'
        src='wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min4245.js'
        id='wc-cart-fragments-js'></script>
    <script type='text/javascript' src='wp-content/themes/nimbus/js/theme-addons41a3.js'
        id='nimbus-theme-addons-js'></script>

    <script type='text/javascript' src='wp-content/themes/nimbus/js/theme41a3.js' id='nimbus-theme-js'></script>
    <script type='text/javascript' src='wp-content/themes/nimbus/js/perfect-scrollbar.min8a54.js'
        id='perfect-scrollbar-js'></script>
    <script type='text/javascript' src='wp-includes/js/wp-embed.min41a3.js' id='wp-embed-js'></script>
    <script type='text/javascript'
        src='wp-content/plugins/nimbus-core/includes/elementor/assets/js/wgl_elementor_widgets8a54.js'
        id='wgl-elementor-extensions-widgets-js'></script>
        <script src="wp-content/jquery.js"></script>
    <script type='text/javascript' src='wp-content/themes/nimbus/js/jquery.appear8a54.js'
        id='jquery-appear-js'></script>
        
    <script type='text/javascript' src='wp-content/themes/nimbus/js/parallax.min41a3.js'
        id='parallax-js'></script>
        
    <script type='text/javascript' src='wp-content/themes/nimbus/js/jquery.paroller.min41a3.js'
        id='jquery-paroller-js'></script>
        
    <script type='text/javascript' src='wp-content/themes/nimbus/js/particles.min41a3.js'
        id='particles-js'></script>

    <script type='text/javascript' src='wp-includes/js/imagesloaded.mineda1.js' id='imagesloaded-js'></script>

    <script type='text/javascript'
        src='wp-content/plugins/nimbus-core/includes/elementor/assets/js/isotope.pkgd.min8a54.js'
        id='isotope-js'></script>
        
    <script type='text/javascript' src='wp-content/themes/nimbus/js/slick.min8a54.js' id='slick-js'></script>
  
    <script type='text/javascript' src='wp-content/themes/nimbus/js/jarallax.min8a54.js'
        id='jarallax-js'></script>
        
    <script type='text/javascript' src='wp-content/themes/nimbus/js/jarallax-video.min8a54.js'
        id='jarallax-video-js'></script>

    <script type='text/javascript'
        src='wp-content/plugins/nimbus-core/includes/elementor/assets/js/wgl_elementor_sections41a3.js'
        id='wgl-parallax-js'></script>
    <script type='text/javascript'
        src='wp-content/plugins/nimbus-core/includes/elementor/assets/js/wgl_elementor_column41a3.js'
        id='wgl-column-js'></script>
        
    <script type='text/javascript' src='wp-content/plugins/elementor/assets/js/webpack.runtime.min3d36.js'
        id='elementor-webpack-runtime-js'></script>
    <script type='text/javascript' src='wp-content/plugins/elementor/assets/js/frontend-modules.min3d36.js'
        id='elementor-frontend-modules-js'></script>
        
    <script type='text/javascript'
        src='wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js'
        id='elementor-waypoints-js'></script>
    <script type='text/javascript' src='wp-includes/js/jquery/ui/core.min35d0.js'
        id='jquery-ui-core-js'></script>
    <script type='text/javascript' src='wp-content/plugins/elementor/assets/lib/swiper/swiper.min48f5.js'
        id='swiper-js'></script>
        
    <script type='text/javascript'font-weight: 300;
        src='wp-content/plugins/elementor/assets/lib/share-link/share-link.min3d36.js'
        id='share-link-js'></script>
    <script type='text/javascript' src='wp-content/plugins/elementor/assets/lib/dialog/dialog.mina288.js'
        id='elementor-dialog-js'></script>

    <script type='text/javascript' id='elementor-frontend-js-before'>
        var elementorFrontendConfig = { "environmentMode": { "edit": false, "wpPreview": false, "isScriptDebug": false }, "i18n": { "shareOnFacebook": "Share on Facebook", "shareOnTwitter": "Share on Twitter", "pinIt": "Pin it", "download": "Download", "downloadImage": "Download image", "fullscreen": "Fullscreen", "zoom": "Zoom", "share": "Share", "playVideo": "Play Video", "previous": "Previous", "next": "Next", "close": "Close" }, "is_rtl": false, "breakpoints": { "xs": 0, "sm": 480, "md": 768, "lg": 1025, "xl": 1440, "xxl": 1600 }, "responsive": { "breakpoints": { "mobile": { "label": "Mobile", "value": 767, "direction": "max", "is_enabled": true, "default_value": 767 }, "mobile_extra": { "label": "Mobile Extra", "value": 880, "direction": "max", "is_enabled": false, "default_value": 880 }, "tablet": { "label": "Tablet", "value": 1024, "direction": "max", "is_enabled": true, "default_value": 1024 }, "tablet_extra": { "label": "Tablet Extra", "value": 1365, "direction": "max", "is_enabled": false, "default_value": 1365 }, "laptop": { "label": "Laptop", "value": 1620, "direction": "max", "is_enabled": false, "default_value": 1620 }, "widescreen": { "label": "Widescreen", "value": 2400, "direction": "min", "is_enabled": false, "default_value": 2400 } } }, "version": "3.3.1", "is_static": false, "experimentalFeatures": { "e_import_export": true, "landing-pages": true, "elements-color-picker": true, "admin-top-bar": true }, "urls": { "assets": "wp-content\/plugins\/elementor\/assets\/" }, "settings": { "page": [], "editorPreferences": [] }, "kit": { "global_image_lightbox": "yes", "active_breakpoints": ["viewport_mobile", "viewport_tablet"], "lightbox_enable_counter": "yes", "lightbox_enable_fullscreen": "yes", "lightbox_enable_zoom": "yes", "lightbox_enable_share": "yes", "lightbox_title_src": "title", "lightbox_description_src": "description" }, "post": { "id": 1153, "title": "Nimbus%20%E2%80%93%20Just%20another%20WordPress%20site", "excerpt": "", "featuredImage": false } };
    </script>
    
    <script type='text/javascript' src='wp-content/plugins/elementor/assets/js/frontend.min3d36.js'
        id='elementor-frontend-js'></script>
    <script type='text/javascript' src='wp-content/plugins/elementor/assets/js/preloaded-modules.min3d36.js'
        id='preloaded-modules-js'></script>


    <script type="text/javascript" id="rs-initialisation-scripts">
        var tpj = jQuery;
        var revapi1;
        if (window.RS_MODULES === undefined) window.RS_MODULES = {};
        if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
        RS_MODULES.modules["revslider11"] = {
            init: function () {
                revapi1 = jQuery("#rev_slider_1_1");
                if (revapi1 == undefined || revapi1.revolution == undefined) { revslider_showDoubleJqueryError("rev_slider_1_1"); return; }
                revapi1.revolutionInit({
                    sliderLayout: "fullwidth",
                    visibilityLevels: "1240,1024,778,480",
                    gridwidth: "1240,1024,778,480",
                    gridheight: "1100,800,650,800",
                    lazyType: "smart",
                    perspectiveType: "local",
                    editorheight: "1100,800,650,800",
                    responsiveLevels: "1240,1024,778,480",
                    progressBar: { disableProgressBar: true },
                    navigation: {
                        onHoverStop: false
                    },
                    parallax: {
                        levels: [-5, -4, -3, -2, -1, 1, 2, 3, 4, 5, 47, 48, 49, 50, 51, 30],
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 0
                    },
                    viewPort: {
                        global: true,
                        globalDist: "-200px",
                        enable: false
                    },
                    fallbacks: {
                        allowHTML5AutoPlayOnAndroid: true
                    },
                });
            }
        } // End of RevInitScript
        if (window.RS_MODULES.checkMinimal !== undefined) { window.RS_MODULES.checkMinimal(); };
    </script>


    <style>
        .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #e25e33;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        margin-left: 39%;
        margin-bottom: 15%;
        }

        /* Safari */
        @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
        }
    </style>


    <script>
        // $(".product_cart").hide();
        var con = 0 ;
        function addTocart(id) {
            con = con + 1 ;
            $("#"+ id +"").remove();
            $("#con-"+ id +"").append('\
                <div id="spn-'+ id +'" class="loader"></div>');
            // alert(id);
            $.ajax({
                method: 'POST',
                url: 'addcart.php',
                dataType: "json",
                data: {
                    id: id,
                },
                success: function(data) {
                    if(data == 'true'){
                        $("#spn-"+ id +"").remove();
                        $("#con-"+ id +"").append('\
                        <a href="cart/cart.php"  style="border-radius: 10px;" class="product_cart button product_type_simple add_to_cart_button ajax_add_to_cart" >\
                            View Cart\
                        </a>');

                        if( con == 1){
                            $("#basket").append('\
                            <a href="cart/cart.php" style="opacity: 1;right: 22px;width: 50px;height: 50px;top: 48%;background-color: #e25e33;position: fixed;z-index: 20;color:white;bottom: 20px;border-radius: 50%;text-align: center;" id=""><i  style="    margin-top: 30%;font-size: 21px;" class="fas fa-shopping-basket"></i></a>');
                        }
                    }else{
                        alert('خطأ ! يرجى اعادة الطلب مره اخرى');
                    }

                
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // alert(JSON.stringify(jqXHR));
                    // alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });


        }

    </script>
</body>

</html>
