<?php

ob_start();
ob_end_flush();
session_start();

include('../maanage/system/connection.php');

// foreach($_COOKIE as  $key => $val){

//     if($key == 'avocadoShop'){
// 		$cart = 'true';
//       if($_COOKIE['avocadoShop'] > 0 &&  $_COOKIE['avocadoShop'] != '' ){
//           $inv_no = $_COOKIE['avocadoShop'] ;
//       }
//     }else{
// 		$cart = 'false';
// 	}
// }

if($_SESSION['avocadoShop'] != '' and  $_SESSION['avocadoShop'] != 0 and  $_SESSION['avocadoShop'] > 0){
	$cart = 'true';
	$inv_no = $_SESSION['avocadoShop'];
}else{
    $cart = 'false';
}

if( $cart == 'false'){
	header("location:../index.php");
}else{}


$sql_pro="SELECT *,sum(product_quantity) as quantity from `order` LEFT JOIN `order_details` ON `order`.`order_id` = `order_details`.`order_id` LEFT JOIN `products` ON `order_details`.`product_id` = `products`.`product_id`  WHERE `order_num` = '$inv_no' group by `order_details`.`product_id`";
$quer_pro=mysqli_query($con, $sql_pro) or die(mysqli_error($con));




if (isset($_GET['delete'])) {

	$delete = $_GET['delete'];
  
	$sql_delete="DELETE FROM `order_details` WHERE `order_details_id` = '$delete'";
	$quer_delete=mysqli_query($con, $sql_delete) or die(mysqli_error($con));


	header("location:index.php");
  
}



?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Checkout</title>

	<link rel='stylesheet' id='wc-block-vendors-style-css'
		href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/vendors-style1852.css?ver=5.3.3'
		type='text/css' media='all' />
	<link rel='stylesheet' id='wc-block-style-css'
		href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style1852.css?ver=5.3.3'
		type='text/css' media='all' />

	<link rel='stylesheet' id='wgl-toolbar-css'
		href='../wp-content/plugins/WGL-toolbar/public/css/wgl-toolbar-public4b68.css?ver=1.0.4' type='text/css'
		media='all' />
	<link rel='stylesheet' id='contact-form-7-css'
		href='../wp-content/plugins/contact-form-7/includes/css/styles7661.html?ver=5.4.2' type='text/css'
		media='all' />
	<link rel='stylesheet' id='select2-css'
		href='../wp-content/plugins/woocommerce/assets/css/select24245.css?ver=5.5.2' type='text/css' media='all' />
	<link rel='stylesheet' id='woocommerce-layout-css'
		href='../wp-content/plugins/woocommerce/assets/css/woocommerce-layout4245.css?ver=5.5.2' type='text/css'
		media='all' />
	<link rel='stylesheet' id='woocommerce-smallscreen-css'
		href='../wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen4245.css?ver=5.5.2' type='text/css'
		media='only screen and (max-width: 768px)' />
	<link rel='stylesheet' id='woocommerce-general-css'
		href='../wp-content/plugins/woocommerce/assets/css/woocommerce4245.css?ver=5.5.2' type='text/css' media='all' />
	<style id='woocommerce-inline-inline-css' type='text/css'>
		.woocommerce form .form-row .required {
			visibility: visible;
		}
	</style>
	<link rel='stylesheet' id='elementor-icons-css'
		href='../wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.minb683.css?ver=5.12.0'
		type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-frontend-legacy-css'
		href='../wp-content/plugins/elementor/assets/css/frontend-legacy.min3d36.css?ver=3.3.1' type='text/css'
		media='all' />
	<link rel='stylesheet' id='elementor-frontend-css'
		href='../wp-content/plugins/elementor/assets/css/frontend.min3d36.css?ver=3.3.1' type='text/css' media='all' />
	<style id='elementor-frontend-inline-css' type='text/css'>
		@font-face {
			/* font-family: eicons;
			src: url(../wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons0b93.eot?5.10.0);
			src: url(http://nimbus.wgl-demo.net/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.eot?5.10.0#iefix) format("embedded-opentype"), url(http://nimbus.wgl-demo.net/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.woff2?5.10.0) format("woff2"), url(http://nimbus.wgl-demo.net/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.woff?5.10.0) format("woff"), url(http://nimbus.wgl-demo.net/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.ttf?5.10.0) format("truetype"), url(http://nimbus.wgl-demo.net/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.svg?5.10.0#eicon) format("svg");
			font-weight: 400;
			font-style: normal */
		}

		.elementor-column-gap-default>.elementor-column>.elementor-element-populated {
			padding-left: 15px;
			padding-right: 15px;
		}
	</style>
	<link rel='stylesheet' id='elementor-post-1353-css'
		href='../wp-content/uploads/elementor/css/post-13531e00.css?ver=1627298371' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-global-css'
		href='../wp-content/uploads/elementor/css/global1e00.css?ver=1627298371' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-post-1038-css'
		href='../wp-content/uploads/elementor/css/post-1038bbdd.css?ver=1627298476' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-post-1398-css'
		href='../wp-content/uploads/elementor/css/post-1398bbdd.css?ver=1627298476' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-post-142-css'
		href='../wp-content/uploads/elementor/css/post-14276a9.css?ver=1627298477' type='text/css' media='all' />
	<link rel='stylesheet' id='nimbus-default-style-css' href='../wp-content/themes/nimbus/style41a3.css?ver=5.8'
		type='text/css' media='all' />
	<link rel='stylesheet' id='nimbus-flaticon-css'
		href='../wp-content/themes/nimbus/fonts/flaticon/flaticon41a3.css?ver=5.8' type='text/css' media='all' />
	<link rel='stylesheet' id='font-awesome-5-all-css' href='../wp-content/themes/nimbus/css/all.min41a3.css?ver=5.8'
		type='text/css' media='all' />
	<link rel='stylesheet' id='nimbus-main-css' href='../wp-content/themes/nimbus/css/main41a3.css?ver=5.8'
		type='text/css' media='all' />
        <link href="../fonts/font.css" rel="stylesheet">
        <style id='elementor-frontend-inline-css' type='text/css'>
        @font-face {
            font-family: 'Tajawal', sans-serif !important;
            font-weight: 400;
            font-style: normal
        }

        body,h1,h2,h3,h4,h5,h6,span,li,label,div,a,table,th,tr,td,p,button,input,.input-text ,.elementor-heading-title .elementor-size-default{
            font-family: 'Tajawal', sans-serif !important;
        }

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
			font-family: Open Sans;
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
			font-family: Open Sans;
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
			font-family: IBM Plex Mono;
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
			font-family: IBM Plex Mono;
		}

		blockquote,
		.banner_404,
		.author-info_public,
		.wgl-portfolio-single_item .tagcloud .tagcloud_desc,
		.wgl-portfolio-single_item .single_info-share_social-wpapper .share_title {
			font-family: IBM Plex Mono;
			color: #212121;
		}

		.wgl-background-text,
		.elementor-section.wgl-add-background-text:before {
			font-family: IBM Plex Mono;
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
		.wgl-button,
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
			background-color: #ffae00;
		}

		#scroll_up:not(:empty):hover {
			color: #ffae00;
			background-color: #ffffff;
		}

		.primary-nav>div>ul,
		.primary-nav>ul,
		.sitepress_container>.wpml-ls li,
		.primary-nav ul li.mega-menu-links>ul>li {
			font-family: IBM Plex Mono;
			font-weight: 700;
			line-height: 30px;
			font-size: 17px;
		}

		.primary-nav ul li ul,
		.wpml-ls,
		.sitepress_container>.wpml-ls ul ul li,
		.primary-nav ul li div.mega-menu-container {
			font-family: Open Sans;
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
			color: #ffae00;
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
			color: #ffae00;
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
			color: #ffae00;
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
			color: #ffae00;
		}

		.primary-nav ul li.mega-menu.mega-cat div.mega-menu-container ul.mega-menu.cats-horizontal>li.is-active>a,
		.primary-nav>ul>li>a>span:before,
		.primary-nav>ul>li>a>span:after,
		.primary-nav ul li ul li>a>span:before,
		.primary-nav ul li ul li>a>span:after,
		.mobile_nav_wrapper .primary-nav>ul>li>a>span:after {
			background: #ffae00;
		}

		header .header-link:hover,
		.hover_links a:hover {
			color: #ffae00 !important;
		}

		.wgl-video_popup .videobox_link {
			fill: #ffae00;
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
			background: #ffae00;
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
			background-color: #ffae00;
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
			background-color: #ffae00;
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
			border-color: #ffae00;
			background: #ffae00;
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
			border-color: #ffae00;
		}

		.portfolio-category:hover,
		.inside_image.sub_layer_animation .portfolio-category:hover {
			color: #e69d00;
		}

		.button-read-more span {
			background-color: #e69d00;
		}

		.blog-posts .blog-post_title>a {
			background-image: linear-gradient(0deg, #ffae00, #ffae00);
		}

		.footer_top-area .widget.widget_archive ul li>a:hover,
		.footer_top-area .widget.widget_categories ul li>a:hover,
		.footer_top-area .widget.widget_pages ul li>a:hover,
		.footer_top-area .widget.widget_meta ul li>a:hover,
		.footer_top-area .widget.widget_recent_comments ul li>a:hover,
		.footer_top-area .widget.widget_recent_entries ul li>a:hover,
		.footer_top-area .widget.widget_nav_menu ul li>a:hover,
		.footer_top-area .widget.widget_wgl_posts .recent-posts-widget li>.recent-posts-content .post_title a:hover {
			color: #ffae00;
		}

		.footer ul li:before,
		.footer_top-area a:hover {
			color: #ffae00;
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
			background-color: #ffae00;
		}

		.woocommerce #review_form #respond form#commentform label,
		.woocommerce table.cart td.actions .coupon .input-text,
		.woocommerce .product_meta>span *,
		.woocommerce div.product form.cart div.quantity label.label-qty,
		.woocommerce .summary .product_meta>span span,
		.woocommerce div.product .woocommerce-tabs .panel table.shop_attributes th,
		.widget_price_filter .price_label {
			font-family: Open Sans;
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
			font-family: IBM Plex Mono;
		}

		.woocommerce-cart-form .coupon label {
			font-family: IBM Plex Mono;
			font-weight: 700;
		}

		.woocommerce .cart-collaterals .cart_totals table th {
			font-family: IBM Plex Mono;
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
			font-family: IBM Plex Mono;
		}

		#add_payment_method table.cart td.actions .coupon .input-text,
		.product_list_widget .product-title,
		.wgl-theme-header .woo_mini_cart .woocommerce-mini-cart__total.wgl-theme-header .wgl-woo_mini_cart .header_cart-heading_description,
		.woocommerce div.product form.cart .group_table tr td label,
		.woocommerce div.product span.price {
			font-family: IBM Plex Mono;
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
			color: #ffae00;
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
			background-color: #ffae00;
		}

		.wgl-products .wc-forward:after,
		.woocommerce button.button:hover,
		.woocommerce #payment #place_order,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-handle {
			background: #ffae00;
		}

		.woocommerce-message a.button:hover,
		.wgl-theme-header .mini-cart a.woo_icon:before {
			border-color: #ffae00;
		}

		.wgl-products .button:before,
		.wgl-products .added_to_cart:before,
		.wgl-products .button.added:after {
			background: #e69d00;
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
			font-family: IBM Plex Mono;
			font-weight: 700;
			font-size: 48px;
			line-height: 72px;
		}

		h2,
		h2 a,
		h2 span {
			font-family: IBM Plex Mono;
			font-weight: 700;
			font-size: 42px;
			line-height: 60px;
		}

		h3,
		h3 a,
		h3 span {
			font-family: IBM Plex Mono;
			font-weight: 700;
			font-size: 36px;
			line-height: 50px;
		}

		h4,
		h4 a,
		h4 span {
			font-family: IBM Plex Mono;
			font-weight: 700;
			font-size: 30px;
			line-height: 40px;
		}

		h5,
		h5 a,
		h5 span {
			font-family: IBM Plex Mono;
			font-weight: 700;
			font-size: 24px;
			line-height: 38px;
		}

		h6,
		h6 a,
		h6 span {
			font-family: IBM Plex Mono;
			font-weight: 700;
			font-size: 18px;
			line-height: 32px;
		}

		@media only screen and (max-width:1200px) {
			.wgl-theme-header {
				background-color: rgba(49, 49, 49, 1) !important;
				color: #ffffff !important;
			}
		}

		@media only screen and (max-width:1200px) {
			.wgl-theme-header .wgl-mobile-header {
				display: block;
			}

			.wgl-site-header,
			.wgl-theme-header .primary-nav {
				display: none;
			}

			.wgl-theme-header .hamburger-box {
				display: inline-flex;
			}

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
		#scroll_up {
			color: #ffffff;
			background-color: #e25e33;
		}

		.primary-nav ul li.mega-menu.mega-cat div.mega-menu-container ul.mega-menu.cats-horizontal>li.is-active>a, .primary-nav>ul>li>a>span:before, .primary-nav>ul>li>a>span:after, .primary-nav ul li ul li>a>span:before, .primary-nav ul li ul li>a>span:after, .mobile_nav_wrapper .primary-nav>ul>li>a>span:after {
			background: #e25e33;
		}
	</style>

	<script type='text/javascript' src='../wp-includes/js/jquery/jquery.minaf6c.js?ver=3.6.0'
		id='jquery-core-js'></script>
	<script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.mind617.js?ver=3.3.2'
		id='jquery-migrate-js'></script>

	<script type='text/javascript'
		src='../wp-content/plugins/WGL-toolbar/public/js/wgl-toolbar-public.min4b68.js?ver=1.0.4'
		id='wgl-toolbar-js'></script>
	<script type='text/javascript' src='../wp-content/plugins/revslider/public/assets/js/rbtools.minef10.js?ver=6.5.3'
		async id='tp-tools-js'></script>
	<script type='text/javascript' src='../wp-content/plugins/revslider/public/assets/js/rs6.minef10.js?ver=6.5.3' async
		id='revmin-js'></script>
    <meta name="generator" content="Designed By United Business Corner-IT" />
    <link rel="icon" href="../wp-content/uploads/2020/02/Icon.ico" sizes="32x32" />
    <link rel="icon" href="../wp-content/uploads/2020/02/Icon.ico" sizes="192x192" />
    <link rel="apple-touch-icon" href="../wp-content/uploads/2020/02/Icon.ico" />
		<style>
			.woocommerce-product-gallery {
				opacity: 1 !important;
			}
		</style>
	</noscript>

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
	class="page-template-default page page-id-1742 theme-nimbus woocommerce-cart woocommerce-page woocommerce-no-js elementor-default elementor-kit-1353">
    <header class='wgl-theme-header'>
        <div class='wgl-site-header mobile_header_custom'>
            <div class='container-wrapper'>
                <div data-elementor-type="wp-post" data-elementor-id="1038" class="elementor elementor-1038"
                    data-elementor-settings="[]">
                    <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-1ca01b7 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default"
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
                                                                <a href='../index.php'>
                                                                    <img class="default_logo"
                                                                        src="../wp-content/uploads/2020/02/light.png" alt="logo"
                                                                        style="height:72px;"> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-3e8e5f2 elementor-widget elementor-widget-wgl-menu"
                                                        data-id="3e8e5f2" data-element_type="widget"
                                                        data-widget_type="wgl-menu.default">
                                                        <div class="elementor-widget-container">
                                                            <nav class='primary-nav'>
                                                                <ul id="menu-main" class="menu">
                                                                    <li id="menu-item-1858"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  menu-item-1858">
                                                                        <a href="../index.php"><span><span
                                                                                    class="item_text">Home</span></span>
                                                                        </a>
                                                                    </li>

                                                                    <li id="menu-item-501"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-501">
                                                                        <a href="../about-me/index.php"><span><span
                                                                                    class="item_text">About
                                                                                    us</span></span>
                                                                        </a>
                                                                    </li>
                                                                    <li id="menu-item-214"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-214">
                                                                        <a href="../shop/index.php"><span><span
                                                                                    class="item_text">Our
                                                                                    products</span></span>
                                                                        </a>
                                                                    </li>



                                                                    <li id="menu-item-479"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-479">
                                                                        <a href="../contacts/index.php"><span>
                                                                                <span
                                                                                    class="item_text">Contacts</span></span><i
                                                                                class="menu-item__plus">

                                                                            </i></a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                            <div class="mobile-hamburger-toggle">
                                                                <div class="hamburger-box">
                                                                    <div class="hamburger-inner">

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
        <div class='wgl-sticky-header wgl-sticky-element' data-style="scroll_up">
            <div class="container-wrapper">
                <div data-elementor-type="wp-post" data-elementor-id="1398" class="elementor elementor-1398"
                    data-elementor-settings="[]">
                    <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-1ca01b7 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default"
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
                                                                <a href='../index.php'>
                                                                    <img class="default_logo"
                                                                        src="../wp-content/uploads/2020/02/light.png" alt="logo"
                                                                        style="height:72px;"> </a>
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
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  menu-item-1858">
                                                                        <a href="../index.php"><span><span
                                                                                    class="item_text">Home</span></span></a>
                                                                    </li>
                                                                    <li
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-501">
                                                                        <a href="../about-me/index.php"><span><span
                                                                                    class="item_text">About
                                                                                    us</span></span>
                                                                        </a>

                                                                    </li>
                                                                    <li
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-214 ">
                                                                        <a href="../shop/index.php"><span><span
                                                                                    class="item_text">Our
                                                                                    Products</span></span></a>
                                                                    </li>


                                                                    <li
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-479">
                                                                        <a href="../contacts/index.php"><span><span
                                                                                    class="item_text">Contacts</span></span><i
                                                                                class="menu-item__plus">

                                                                            </i></a>
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
                                                    <div class="elementor-element elementor-element-a9864c4 elementor-align-right elementor-icon-list--layout-inline
 elementor-widget elementor-widget-wgl-header-list-info" data-id="a9864c4" data-element_type="widget"
                                                        data-widget_type="wgl-header-list-info.default">
                                                        <div class="elementor-widget-container">

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
                            <div class="position_center header_side">
                                <div class="header_area_container">
                                    <div class='wgl-logotype-container logo-mobile_enable'>
                                        <a href='../index.php'>
                                            <img class="logo-mobile" src="../wp-content/uploads/2020/02/light.png"
                                                alt="" style="height:72px;"> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="position_left header_side">
                                <div class="header_area_container">
                                    <nav class='primary-nav' style="height:100px;">
                                        <ul id="menu-main-2" class="menu">
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  menu-item-1858">
                                                <a href="../index.php"><span><span
                                                            class="item_text">Home</span></span></a>
                                            </li>
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-501">
                                                <a href="../about-me/index.php"><span><span class="item_text">About
                                                            us</span></span></a>

                                            </li>


                                            <li class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-1826"><a href="../shop/index.php"><span>
                                                        <span class="item_text">
                                                            Our products</span></span></a>

                                            </li>

                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-479">
                                                <a href="../contacts/index.php"><span><span
                                                            class="item_text">Contacts</span></span>
                                                    <i class="menu-item__plus"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"><span></span><span></span><span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
                <div class="mobile_nav_wrapper" data-mobile-width="$header_queries">
                    <div class="container-wrapper">
                        <div class="wgl-menu_overlay">

                        </div>
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
                                    <a href='../index.php'>
                                        <img class="logo-mobile" src="../wp-content/uploads/2020/02/light.png"
                                            alt="" style="height:72px;"> </a>
                                </div>
                                <nav class="primary-nav">
                                    <ul id="menu-main-3" class="menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-1858">
                                            <a href="../index.php"><span><span class="item_text">Home</span></span></a>
                                            
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-481 menu-item-has-children menu-item-501">
                                            <a href="../about-me/index.php"><span><span class="item_text">About
                                                        us</span></span></a>
                                            
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-214">
                                            <a href="index.php"><span><span class="item_text">Our
                                                        products</span></span></a>
                              
                                        </li>
                                      
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-479">
                                            <a href="../contacts/index.php"><span><span
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
	<div class="page-header page-header_align_center"
		style="background-image: url(../wp-content/uploads/2020/02/nimbus_page_title.jpg); background-size:cover; background-repeat:no-repeat; background-attachment:scroll; background-position:center bottom;background-color: #202020; height: 350px; margin-bottom: 50px; padding-top: 76px; padding-bottom: 80px;">
		<div class="page-header_wrapper">
			<div class="wgl-container">
				<div class="page-header_content">
					<h1 class="page-header_title" style="color: #ffffff; font-size: 48px; line-height: 52px;">Checkout</h1>
					<div class="page-header_breadcrumbs" style="color: #a3a3a3; font-size: 16px; line-height: 24px;">
						<div class="breadcrumbs"><a href="../index.html" class="home">Home</a> <span
								class="divider"></span> <span class="current">Checkout</span></div><!-- .breadcrumbs -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<main id="main" class="site-main">
		<div class="wgl-container">
			<div class="row ">

                <div id="main-content" class="wgl_col-7"><div class="woocommerce"><div class="woocommerce-notices-wrapper"></div><div class="woocommerce-form-coupon-toggle">
        


                    <div class="woocommerce-notices-wrapper"></div>
                    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="" enctype="multipart/form-data" novalidate="novalidate">
    
        
            
                        <div class="col-md-12" id="customer_details">
                            <div class="col-1">
                                <div class="woocommerce-billing-fields">
                    
                                    <h3>Billing details</h3>
                
                    
                    
                                    <div class="woocommerce-billing-fields__field-wrapper">
                                        <p class="form-row form-row-first validate-required" id="" data-priority="10">
                                            <label for="billing_first_name" class="">Your Name
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input style="border: 1px solid #ccc1c1;" autocomplete="off" required="" type="text" class="input-text " name="billing_first_name" id="firstName" placeholder="" value="" autocomplete="given-name">
                                            </span>
                                        </p>
                                        <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                                            <label for="billing_first_name" class="">phone number
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input  style="border: 1px solid #ccc1c1;" autocomplete="off" type="text" class="input-text " name="billing_first_name" id="phone" placeholder="" value="" autocomplete="given-name">
                                            </span>
                                        </p>

                                        <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                                            <label for="billing_first_name" class="">Address
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input style="border: 1px solid #ccc1c1;" autocomplete="off" type="text" class="input-text " name="billing_first_name" id="address" placeholder="" value="" autocomplete="given-name">
                                            </span>
                                        </p>
                                        
                                        
                                        <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                                            <label for="billing_first_name" class="">Note
                                                
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input style="border: 1px solid #ccc1c1;" autocomplete="off" type="text" class="input-text " name="billing_first_name" id="note" placeholder="" value="" >
                                            </span>
                                        </p>
                                        
                                    </div>
                                
                                </div> 
                            </div>
    

                        </div>
    
            
            

                                </div>


                    
                        </div>
                    
                        
                
                    
                </div>


                <div class="wgl_col-5">
                    <h3 id="order_review_heading">Your order</h3>
        
        
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total = 0;
                                    while( $row = mysqli_fetch_assoc($quer_pro)){
                                        echo '
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    '.$row['product_name'].'
                                                    <strong class="product-quantity">×&nbsp; '.$row['product_quantity'].'</strong>
                                                </td>
                                                <td class="product-total">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span class="woocommerce-Price-currencySymbol"> </span>'.number_format($row['product_price'] * $row['product_quantity']).' د.ع   
                                                    </bdi>
                                                </span>
                                                </td>
                                            </tr>
                                        
                                        ';

                                        $total = $total + ($row['product_price'] * $row['product_quantity']);
                                    }
                                
                                
                                ?>
                                <input type="text" id="Invo" hidden="" style="display: none;" value="<?php echo $inv_no ; ?>">
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"> </span><?php echo number_format($total); ?> د.ع </bdi></span></strong> </td>
                                </tr>

                    
                            </tfoot>
                        </table>
                        <div id="payment" class="woocommerce-checkout-payment">
                            <style>
                                .wgl-button:before {
                                    position: inherit;
                                    top: 0;
                                    right: 4%;
                                    bottom: 15%;
                                    left: 0;
                                    background-color: #7fffd400;
                                    filter: brightness(0.9);
                                    border-radius: 30% 70% 72% 28% / 0% 0% 100% 100%;
                                    animation: btn_morph 3s linear infinite forwards paused;
                                    transition: inherit;
                                }
                            </style>
                        
                            <span class="wgl-button has-morph" style="width: 100%;">
                                <button onclick="finish()" style="background-color: #e25e33;width:100%;color: white;font-size: 23px;" type="button" class="button alt" name="woocommerce_checkout_place_order"  value="Place order" data-value="Place order">Place order</button>
                            </span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

		<!--WPFC_FOOTER_START-->
	</main>
    <footer class='footer clearfix' id='footer'>
        <div class="footer_top-area">
            <div class="wgl-container">
                <div class="row-footer">
                    <div data-elementor-type="wp-post" data-elementor-id="142" class="elementor elementor-142"
                        data-elementor-settings="[]">
                        <div class="elementor-inner">
                            <div class="elementor-section-wrap">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-a40bf7b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="a40bf7b" data-element_type="section"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8374ec6"
                                                data-id="8374ec6" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-b30cd62 elementor-widget elementor-widget-spacer"
                                                            data-id="b30cd62" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-2b96f9b elementor-widget elementor-widget-heading"
                                                            data-id="2b96f9b" data-element_type="widget"
                                                            data-widget_type="heading.default">
                                                            <div class="elementor-widget-container">
                                                                <h2
                                                                    class="elementor-heading-title elementor-size-default">
                                                                    Let’s Talk!</h2>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-41c47bb elementor-widget elementor-widget-spacer"
                                                            data-id="41c47bb" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <section
                                                            class="elementor-section elementor-inner-section elementor-element elementor-element-b4e6c7b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                            data-id="b4e6c7b" data-element_type="section">
                                                            <div
                                                                class="elementor-container elementor-column-gap-default">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-d5b79a4"
                                                                        data-id="d5b79a4" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-5ff409e acenter elementor-widget-icon-box wgl-icon-box elementor-view-default elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="5ff409e"
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
                                                                                                       <p style="color:white;">+964 773 877 5557</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-7ae02a3"
                                                                        data-id="7ae02a3" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-63eb3f8 acenter elementor-widget-icon-box wgl-icon-box elementor-view-default elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="63eb3f8"
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
                                                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-fb62052"
                                                                        data-id="fb62052" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-41c7917 acenter elementor-widget-icon-box wgl-icon-box elementor-view-default elementor-widget elementor-widget-wgl-info-box"
                                                                                    data-id="41c7917"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="wgl-info-box.default">
                                                                                    <div
                                                                                        class="elementor-widget-container">
                                                                                        <a class="wgl-infobox__link"
                                                                                            href="https://www.instagram.com/avocado_iq/"></a>
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
                                                        <div class="elementor-element elementor-element-440d150 elementor-widget elementor-widget-spacer"
                                                            data-id="440d150" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="elementor-element elementor-element-cf8c0b4 elementor-widget elementor-widget-spacer"
                                                            data-id="cf8c0b4" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-05ffadc elementor-widget elementor-widget-text-editor"
                                                            data-id="05ffadc" data-element_type="widget"
                                                            data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-text-editor elementor-clearfix">
                                                                    <p style="text-align: center;">Designed by <a
                                                                            href="https://it.ubc-iraq.com/"
                                                                            rel="nofollow noreferrer" target="blank"
                                                                            style="color: inherit;">United Business
                                                                            Corner-IT</a>.
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
    </footer>
    
    <a href="#" id="scroll_up"></a>

    <script src="../wp-content/jquery.js"></script>

	<link rel="preload" as="font" id="rs-icon-set-revicon-woff"
		href="../wp-content/plugins/revslider/public/assets/fonts/revicons/revicons90c6.woff?5510888" type="font/woff"
		crossorigin="anonymous" media="all" />
	<script type="text/javascript">
		(function () {
			var c = document.body.className;
			c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
			document.body.className = c;
		})();
	</script>
	<link rel='stylesheet' id='animate-css' href='../wp-content/themes/nimbus/css/animate41a3.css?ver=5.8'
		type='text/css' media='all' />
	<link rel='stylesheet' id='e-animations-css'
		href='../wp-content/plugins/elementor/assets/lib/animations/animations.min3d36.css?ver=3.3.1' type='text/css'
		media='all' />
	<link rel='stylesheet' id='rs-plugin-settings-css'
		href='../wp-content/plugins/revslider/public/assets/css/rs6ef10.css?ver=6.5.3' type='text/css' media='all' />
	<style id='rs-plugin-settings-inline-css' type='text/css'>
		#rs-demo-id {}
	</style>
	<script type='text/javascript' src='../wp-includes/js/dist/vendor/regenerator-runtime.minb36a.js?ver=0.13.7'
		id='regenerator-runtime-js'></script>
	<script type='text/javascript' src='../wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0'
		id='wp-polyfill-js'></script>
	<script type='text/javascript' id='contact-form-7-js-extra'>
		/* <![CDATA[ */
		var wpcf7 = { "api": { "root": "http:\/\/nimbus.wgl-demo.net\/wp-json\/", "namespace": "contact-form-7\/v1" } };
/* ]]> */
	</script>
	<script type='text/javascript' src='../wp-content/plugins/contact-form-7/includes/js/index7661.html?ver=5.4.2'
		id='contact-form-7-js'></script>
	<script type='text/javascript'
		src='../wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'
		id='jquery-blockui-js'></script>
	<script type='text/javascript' id='wc-add-to-cart-js-extra'>
		/* <![CDATA[ */
		var wc_add_to_cart_params = { "ajax_url": "\/wp-admin\/admin-ajax.php", "wc_ajax_url": "\/?wc-ajax=%%endpoint%%", "i18n_view_cart": "View cart", "cart_url": "http:\/\/nimbus.wgl-demo.net\/cart\/", "is_cart": "1", "cart_redirect_after_add": "no" };
/* ]]> */
	</script>
	<script type='text/javascript'
		src='../wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min4245.js?ver=5.5.2'
		id='wc-add-to-cart-js'></script>
	<script type='text/javascript'
		src='../wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4'
		id='js-cookie-js'></script>
	<script type='text/javascript' id='woocommerce-js-extra'>
		/* <![CDATA[ */
		var woocommerce_params = { "ajax_url": "\/wp-admin\/admin-ajax.php", "wc_ajax_url": "\/?wc-ajax=%%endpoint%%" };
/* ]]> */
	</script>
	<script type='text/javascript'
		src='../wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min4245.js?ver=5.5.2'
		id='woocommerce-js'></script>
	<script type='text/javascript' id='wc-country-select-js-extra'>
		/* <![CDATA[ */
		var wc_country_select_params = { "countries": "{\"AF\":[],\"AO\":{\"BGO\":\"Bengo\",\"BLU\":\"Benguela\",\"BIE\":\"Bi\\u00e9\",\"CAB\":\"Cabinda\",\"CNN\":\"Cunene\",\"HUA\":\"Huambo\",\"HUI\":\"Hu\\u00edla\",\"CCU\":\"Kuando Kubango\",\"CNO\":\"Kwanza-Norte\",\"CUS\":\"Kwanza-Sul\",\"LUA\":\"Luanda\",\"LNO\":\"Lunda-Norte\",\"LSU\":\"Lunda-Sul\",\"MAL\":\"Malanje\",\"MOX\":\"Moxico\",\"NAM\":\"Namibe\",\"UIG\":\"U\\u00edge\",\"ZAI\":\"Zaire\"},\"AR\":{\"C\":\"Ciudad Aut\\u00f3noma de Buenos Aires\",\"B\":\"Buenos Aires\",\"K\":\"Catamarca\",\"H\":\"Chaco\",\"U\":\"Chubut\",\"X\":\"C\\u00f3rdoba\",\"W\":\"Corrientes\",\"E\":\"Entre R\\u00edos\",\"P\":\"Formosa\",\"Y\":\"Jujuy\",\"L\":\"La Pampa\",\"F\":\"La Rioja\",\"M\":\"Mendoza\",\"N\":\"Misiones\",\"Q\":\"Neuqu\\u00e9n\",\"R\":\"R\\u00edo Negro\",\"A\":\"Salta\",\"J\":\"San Juan\",\"D\":\"San Luis\",\"Z\":\"Santa Cruz\",\"S\":\"Santa Fe\",\"G\":\"Santiago del Estero\",\"V\":\"Tierra del Fuego\",\"T\":\"Tucum\\u00e1n\"},\"AT\":[],\"AU\":{\"ACT\":\"Australian Capital Territory\",\"NSW\":\"New South Wales\",\"NT\":\"Northern Territory\",\"QLD\":\"Queensland\",\"SA\":\"South Australia\",\"TAS\":\"Tasmania\",\"VIC\":\"Victoria\",\"WA\":\"Western Australia\"},\"AX\":[],\"BD\":{\"BD-05\":\"Bagerhat\",\"BD-01\":\"Bandarban\",\"BD-02\":\"Barguna\",\"BD-06\":\"Barishal\",\"BD-07\":\"Bhola\",\"BD-03\":\"Bogura\",\"BD-04\":\"Brahmanbaria\",\"BD-09\":\"Chandpur\",\"BD-10\":\"Chattogram\",\"BD-12\":\"Chuadanga\",\"BD-11\":\"Cox's Bazar\",\"BD-08\":\"Cumilla\",\"BD-13\":\"Dhaka\",\"BD-14\":\"Dinajpur\",\"BD-15\":\"Faridpur \",\"BD-16\":\"Feni\",\"BD-19\":\"Gaibandha\",\"BD-18\":\"Gazipur\",\"BD-17\":\"Gopalganj\",\"BD-20\":\"Habiganj\",\"BD-21\":\"Jamalpur\",\"BD-22\":\"Jashore\",\"BD-25\":\"Jhalokati\",\"BD-23\":\"Jhenaidah\",\"BD-24\":\"Joypurhat\",\"BD-29\":\"Khagrachhari\",\"BD-27\":\"Khulna\",\"BD-26\":\"Kishoreganj\",\"BD-28\":\"Kurigram\",\"BD-30\":\"Kushtia\",\"BD-31\":\"Lakshmipur\",\"BD-32\":\"Lalmonirhat\",\"BD-36\":\"Madaripur\",\"BD-37\":\"Magura\",\"BD-33\":\"Manikganj \",\"BD-39\":\"Meherpur\",\"BD-38\":\"Moulvibazar\",\"BD-35\":\"Munshiganj\",\"BD-34\":\"Mymensingh\",\"BD-48\":\"Naogaon\",\"BD-43\":\"Narail\",\"BD-40\":\"Narayanganj\",\"BD-42\":\"Narsingdi\",\"BD-44\":\"Natore\",\"BD-45\":\"Nawabganj\",\"BD-41\":\"Netrakona\",\"BD-46\":\"Nilphamari\",\"BD-47\":\"Noakhali\",\"BD-49\":\"Pabna\",\"BD-52\":\"Panchagarh\",\"BD-51\":\"Patuakhali\",\"BD-50\":\"Pirojpur\",\"BD-53\":\"Rajbari\",\"BD-54\":\"Rajshahi\",\"BD-56\":\"Rangamati\",\"BD-55\":\"Rangpur\",\"BD-58\":\"Satkhira\",\"BD-62\":\"Shariatpur\",\"BD-57\":\"Sherpur\",\"BD-59\":\"Sirajganj\",\"BD-61\":\"Sunamganj\",\"BD-60\":\"Sylhet\",\"BD-63\":\"Tangail\",\"BD-64\":\"Thakurgaon\"},\"BE\":[],\"BG\":{\"BG-01\":\"Blagoevgrad\",\"BG-02\":\"Burgas\",\"BG-08\":\"Dobrich\",\"BG-07\":\"Gabrovo\",\"BG-26\":\"Haskovo\",\"BG-09\":\"Kardzhali\",\"BG-10\":\"Kyustendil\",\"BG-11\":\"Lovech\",\"BG-12\":\"Montana\",\"BG-13\":\"Pazardzhik\",\"BG-14\":\"Pernik\",\"BG-15\":\"Pleven\",\"BG-16\":\"Plovdiv\",\"BG-17\":\"Razgrad\",\"BG-18\":\"Ruse\",\"BG-27\":\"Shumen\",\"BG-19\":\"Silistra\",\"BG-20\":\"Sliven\",\"BG-21\":\"Smolyan\",\"BG-23\":\"Sofia\",\"BG-22\":\"Sofia-Grad\",\"BG-24\":\"Stara Zagora\",\"BG-25\":\"Targovishte\",\"BG-03\":\"Varna\",\"BG-04\":\"Veliko Tarnovo\",\"BG-05\":\"Vidin\",\"BG-06\":\"Vratsa\",\"BG-28\":\"Yambol\"},\"BH\":[],\"BI\":[],\"BJ\":{\"AL\":\"Alibori\",\"AK\":\"Atakora\",\"AQ\":\"Atlantique\",\"BO\":\"Borgou\",\"CO\":\"Collines\",\"KO\":\"Kouffo\",\"DO\":\"Donga\",\"LI\":\"Littoral\",\"MO\":\"Mono\",\"OU\":\"Ou\\u00e9m\\u00e9\",\"PL\":\"Plateau\",\"ZO\":\"Zou\"},\"BO\":{\"B\":\"Chuquisaca\",\"H\":\"Beni\",\"C\":\"Cochabamba\",\"L\":\"La Paz\",\"O\":\"Oruro\",\"N\":\"Pando\",\"P\":\"Potos\\u00ed\",\"S\":\"Santa Cruz\",\"T\":\"Tarija\"},\"BR\":{\"AC\":\"Acre\",\"AL\":\"Alagoas\",\"AP\":\"Amap\\u00e1\",\"AM\":\"Amazonas\",\"BA\":\"Bahia\",\"CE\":\"Cear\\u00e1\",\"DF\":\"Distrito Federal\",\"ES\":\"Esp\\u00edrito Santo\",\"GO\":\"Goi\\u00e1s\",\"MA\":\"Maranh\\u00e3o\",\"MT\":\"Mato Grosso\",\"MS\":\"Mato Grosso do Sul\",\"MG\":\"Minas Gerais\",\"PA\":\"Par\\u00e1\",\"PB\":\"Para\\u00edba\",\"PR\":\"Paran\\u00e1\",\"PE\":\"Pernambuco\",\"PI\":\"Piau\\u00ed\",\"RJ\":\"Rio de Janeiro\",\"RN\":\"Rio Grande do Norte\",\"RS\":\"Rio Grande do Sul\",\"RO\":\"Rond\\u00f4nia\",\"RR\":\"Roraima\",\"SC\":\"Santa Catarina\",\"SP\":\"S\\u00e3o Paulo\",\"SE\":\"Sergipe\",\"TO\":\"Tocantins\"},\"CA\":{\"AB\":\"Alberta\",\"BC\":\"British Columbia\",\"MB\":\"Manitoba\",\"NB\":\"New Brunswick\",\"NL\":\"Newfoundland and Labrador\",\"NT\":\"Northwest Territories\",\"NS\":\"Nova Scotia\",\"NU\":\"Nunavut\",\"ON\":\"Ontario\",\"PE\":\"Prince Edward Island\",\"QC\":\"Quebec\",\"SK\":\"Saskatchewan\",\"YT\":\"Yukon Territory\"},\"CH\":{\"AG\":\"Aargau\",\"AR\":\"Appenzell Ausserrhoden\",\"AI\":\"Appenzell Innerrhoden\",\"BL\":\"Basel-Landschaft\",\"BS\":\"Basel-Stadt\",\"BE\":\"Bern\",\"FR\":\"Fribourg\",\"GE\":\"Geneva\",\"GL\":\"Glarus\",\"GR\":\"Graub\\u00fcnden\",\"JU\":\"Jura\",\"LU\":\"Luzern\",\"NE\":\"Neuch\\u00e2tel\",\"NW\":\"Nidwalden\",\"OW\":\"Obwalden\",\"SH\":\"Schaffhausen\",\"SZ\":\"Schwyz\",\"SO\":\"Solothurn\",\"SG\":\"St. Gallen\",\"TG\":\"Thurgau\",\"TI\":\"Ticino\",\"UR\":\"Uri\",\"VS\":\"Valais\",\"VD\":\"Vaud\",\"ZG\":\"Zug\",\"ZH\":\"Z\\u00fcrich\"},\"CN\":{\"CN1\":\"Yunnan \\\/ \\u4e91\\u5357\",\"CN2\":\"Beijing \\\/ \\u5317\\u4eac\",\"CN3\":\"Tianjin \\\/ \\u5929\\u6d25\",\"CN4\":\"Hebei \\\/ \\u6cb3\\u5317\",\"CN5\":\"Shanxi \\\/ \\u5c71\\u897f\",\"CN6\":\"Inner Mongolia \\\/ \\u5167\\u8499\\u53e4\",\"CN7\":\"Liaoning \\\/ \\u8fbd\\u5b81\",\"CN8\":\"Jilin \\\/ \\u5409\\u6797\",\"CN9\":\"Heilongjiang \\\/ \\u9ed1\\u9f99\\u6c5f\",\"CN10\":\"Shanghai \\\/ \\u4e0a\\u6d77\",\"CN11\":\"Jiangsu \\\/ \\u6c5f\\u82cf\",\"CN12\":\"Zhejiang \\\/ \\u6d59\\u6c5f\",\"CN13\":\"Anhui \\\/ \\u5b89\\u5fbd\",\"CN14\":\"Fujian \\\/ \\u798f\\u5efa\",\"CN15\":\"Jiangxi \\\/ \\u6c5f\\u897f\",\"CN16\":\"Shandong \\\/ \\u5c71\\u4e1c\",\"CN17\":\"Henan \\\/ \\u6cb3\\u5357\",\"CN18\":\"Hubei \\\/ \\u6e56\\u5317\",\"CN19\":\"Hunan \\\/ \\u6e56\\u5357\",\"CN20\":\"Guangdong \\\/ \\u5e7f\\u4e1c\",\"CN21\":\"Guangxi Zhuang \\\/ \\u5e7f\\u897f\\u58ee\\u65cf\",\"CN22\":\"Hainan \\\/ \\u6d77\\u5357\",\"CN23\":\"Chongqing \\\/ \\u91cd\\u5e86\",\"CN24\":\"Sichuan \\\/ \\u56db\\u5ddd\",\"CN25\":\"Guizhou \\\/ \\u8d35\\u5dde\",\"CN26\":\"Shaanxi \\\/ \\u9655\\u897f\",\"CN27\":\"Gansu \\\/ \\u7518\\u8083\",\"CN28\":\"Qinghai \\\/ \\u9752\\u6d77\",\"CN29\":\"Ningxia Hui \\\/ \\u5b81\\u590f\",\"CN30\":\"Macao \\\/ \\u6fb3\\u95e8\",\"CN31\":\"Tibet \\\/ \\u897f\\u85cf\",\"CN32\":\"Xinjiang \\\/ \\u65b0\\u7586\"},\"CZ\":[],\"DE\":[],\"DK\":[],\"DO\":{\"DO-01\":\"Distrito Nacional\",\"DO-02\":\"Azua\",\"DO-03\":\"Baoruco\",\"DO-04\":\"Barahona\",\"DO-05\":\"Dajab\\u00f3n\",\"DO-06\":\"Duarte\",\"DO-07\":\"El\\u00edas Pi\\u00f1a\",\"DO-08\":\"El Seibo\",\"DO-09\":\"Espaillat\",\"DO-10\":\"Independencia\",\"DO-11\":\"La Altagracia\",\"DO-12\":\"La Romana\",\"DO-13\":\"La Vega\",\"DO-14\":\"Mar\\u00eda Trinidad S\\u00e1nchez\",\"DO-15\":\"Monte Cristi\",\"DO-16\":\"Pedernales\",\"DO-17\":\"Peravia\",\"DO-18\":\"Puerto Plata\",\"DO-19\":\"Hermanas Mirabal\",\"DO-20\":\"Saman\\u00e1\",\"DO-21\":\"San Crist\\u00f3bal\",\"DO-22\":\"San Juan\",\"DO-23\":\"San Pedro de Macor\\u00eds\",\"DO-24\":\"S\\u00e1nchez Ram\\u00edrez\",\"DO-25\":\"Santiago\",\"DO-26\":\"Santiago Rodr\\u00edguez\",\"DO-27\":\"Valverde\",\"DO-28\":\"Monse\\u00f1or Nouel\",\"DO-29\":\"Monte Plata\",\"DO-30\":\"Hato Mayor\",\"DO-31\":\"San Jos\\u00e9 de Ocoa\",\"DO-32\":\"Santo Domingo\"},\"DZ\":{\"DZ-01\":\"Adrar\",\"DZ-02\":\"Chlef\",\"DZ-03\":\"Laghouat\",\"DZ-04\":\"Oum El Bouaghi\",\"DZ-05\":\"Batna\",\"DZ-06\":\"B\\u00e9ja\\u00efa\",\"DZ-07\":\"Biskra\",\"DZ-08\":\"B\\u00e9char\",\"DZ-09\":\"Blida\",\"DZ-10\":\"Bouira\",\"DZ-11\":\"Tamanghasset\",\"DZ-12\":\"T\\u00e9bessa\",\"DZ-13\":\"Tlemcen\",\"DZ-14\":\"Tiaret\",\"DZ-15\":\"Tizi Ouzou\",\"DZ-16\":\"Algiers\",\"DZ-17\":\"Djelfa\",\"DZ-18\":\"Jijel\",\"DZ-19\":\"S\\u00e9tif\",\"DZ-20\":\"Sa\\u00efda\",\"DZ-21\":\"Skikda\",\"DZ-22\":\"Sidi Bel Abb\\u00e8s\",\"DZ-23\":\"Annaba\",\"DZ-24\":\"Guelma\",\"DZ-25\":\"Constantine\",\"DZ-26\":\"M\\u00e9d\\u00e9a\",\"DZ-27\":\"Mostaganem\",\"DZ-28\":\"M\\u2019Sila\",\"DZ-29\":\"Mascara\",\"DZ-30\":\"Ouargla\",\"DZ-31\":\"Oran\",\"DZ-32\":\"El Bayadh\",\"DZ-33\":\"Illizi\",\"DZ-34\":\"Bordj Bou Arr\\u00e9ridj\",\"DZ-35\":\"Boumerd\\u00e8s\",\"DZ-36\":\"El Tarf\",\"DZ-37\":\"Tindouf\",\"DZ-38\":\"Tissemsilt\",\"DZ-39\":\"El Oued\",\"DZ-40\":\"Khenchela\",\"DZ-41\":\"Souk Ahras\",\"DZ-42\":\"Tipasa\",\"DZ-43\":\"Mila\",\"DZ-44\":\"A\\u00efn Defla\",\"DZ-45\":\"Naama\",\"DZ-46\":\"A\\u00efn T\\u00e9mouchent\",\"DZ-47\":\"Gharda\\u00efa\",\"DZ-48\":\"Relizane\"},\"EE\":[],\"EG\":{\"EGALX\":\"Alexandria\",\"EGASN\":\"Aswan\",\"EGAST\":\"Asyut\",\"EGBA\":\"Red Sea\",\"EGBH\":\"Beheira\",\"EGBNS\":\"Beni Suef\",\"EGC\":\"Cairo\",\"EGDK\":\"Dakahlia\",\"EGDT\":\"Damietta\",\"EGFYM\":\"Faiyum\",\"EGGH\":\"Gharbia\",\"EGGZ\":\"Giza\",\"EGIS\":\"Ismailia\",\"EGJS\":\"South Sinai\",\"EGKB\":\"Qalyubia\",\"EGKFS\":\"Kafr el-Sheikh\",\"EGKN\":\"Qena\",\"EGLX\":\"Luxor\",\"EGMN\":\"Minya\",\"EGMNF\":\"Monufia\",\"EGMT\":\"Matrouh\",\"EGPTS\":\"Port Said\",\"EGSHG\":\"Sohag\",\"EGSHR\":\"Al Sharqia\",\"EGSIN\":\"North Sinai\",\"EGSUZ\":\"Suez\",\"EGWAD\":\"New Valley\"},\"ES\":{\"C\":\"A Coru\\u00f1a\",\"VI\":\"Araba\\\/\\u00c1lava\",\"AB\":\"Albacete\",\"A\":\"Alicante\",\"AL\":\"Almer\\u00eda\",\"O\":\"Asturias\",\"AV\":\"\\u00c1vila\",\"BA\":\"Badajoz\",\"PM\":\"Baleares\",\"B\":\"Barcelona\",\"BU\":\"Burgos\",\"CC\":\"C\\u00e1ceres\",\"CA\":\"C\\u00e1diz\",\"S\":\"Cantabria\",\"CS\":\"Castell\\u00f3n\",\"CE\":\"Ceuta\",\"CR\":\"Ciudad Real\",\"CO\":\"C\\u00f3rdoba\",\"CU\":\"Cuenca\",\"GI\":\"Girona\",\"GR\":\"Granada\",\"GU\":\"Guadalajara\",\"SS\":\"Gipuzkoa\",\"H\":\"Huelva\",\"HU\":\"Huesca\",\"J\":\"Ja\\u00e9n\",\"LO\":\"La Rioja\",\"GC\":\"Las Palmas\",\"LE\":\"Le\\u00f3n\",\"L\":\"Lleida\",\"LU\":\"Lugo\",\"M\":\"Madrid\",\"MA\":\"M\\u00e1laga\",\"ML\":\"Melilla\",\"MU\":\"Murcia\",\"NA\":\"Navarra\",\"OR\":\"Ourense\",\"P\":\"Palencia\",\"PO\":\"Pontevedra\",\"SA\":\"Salamanca\",\"TF\":\"Santa Cruz de Tenerife\",\"SG\":\"Segovia\",\"SE\":\"Sevilla\",\"SO\":\"Soria\",\"T\":\"Tarragona\",\"TE\":\"Teruel\",\"TO\":\"Toledo\",\"V\":\"Valencia\",\"VA\":\"Valladolid\",\"BI\":\"Biscay\",\"ZA\":\"Zamora\",\"Z\":\"Zaragoza\"},\"FI\":[],\"FR\":[],\"GF\":[],\"GH\":{\"AF\":\"Ahafo\",\"AH\":\"Ashanti\",\"BA\":\"Brong-Ahafo\",\"BO\":\"Bono\",\"BE\":\"Bono East\",\"CP\":\"Central\",\"EP\":\"Eastern\",\"AA\":\"Greater Accra\",\"NE\":\"North East\",\"NP\":\"Northern\",\"OT\":\"Oti\",\"SV\":\"Savannah\",\"UE\":\"Upper East\",\"UW\":\"Upper West\",\"TV\":\"Volta\",\"WP\":\"Western\",\"WN\":\"Western North\"},\"GP\":[],\"GR\":{\"I\":\"Attica\",\"A\":\"East Macedonia and Thrace\",\"B\":\"Central Macedonia\",\"C\":\"West Macedonia\",\"D\":\"Epirus\",\"E\":\"Thessaly\",\"F\":\"Ionian Islands\",\"G\":\"West Greece\",\"H\":\"Central Greece\",\"J\":\"Peloponnese\",\"K\":\"North Aegean\",\"L\":\"South Aegean\",\"M\":\"Crete\"},\"GT\":{\"AV\":\"Alta Verapaz\",\"BV\":\"Baja Verapaz\",\"CM\":\"Chimaltenango\",\"CQ\":\"Chiquimula\",\"PR\":\"El Progreso\",\"ES\":\"Escuintla\",\"GU\":\"Guatemala\",\"HU\":\"Huehuetenango\",\"IZ\":\"Izabal\",\"JA\":\"Jalapa\",\"JU\":\"Jutiapa\",\"PE\":\"Pet\\u00e9n\",\"QZ\":\"Quetzaltenango\",\"QC\":\"Quich\\u00e9\",\"RE\":\"Retalhuleu\",\"SA\":\"Sacatep\\u00e9quez\",\"SM\":\"San Marcos\",\"SR\":\"Santa Rosa\",\"SO\":\"Solol\\u00e1\",\"SU\":\"Suchitep\\u00e9quez\",\"TO\":\"Totonicap\\u00e1n\",\"ZA\":\"Zacapa\"},\"HK\":{\"HONG KONG\":\"Hong Kong Island\",\"KOWLOON\":\"Kowloon\",\"NEW TERRITORIES\":\"New Territories\"},\"HU\":{\"BK\":\"B\\u00e1cs-Kiskun\",\"BE\":\"B\\u00e9k\\u00e9s\",\"BA\":\"Baranya\",\"BZ\":\"Borsod-Aba\\u00faj-Zempl\\u00e9n\",\"BU\":\"Budapest\",\"CS\":\"Csongr\\u00e1d-Csan\\u00e1d\",\"FE\":\"Fej\\u00e9r\",\"GS\":\"Gy\\u0151r-Moson-Sopron\",\"HB\":\"Hajd\\u00fa-Bihar\",\"HE\":\"Heves\",\"JN\":\"J\\u00e1sz-Nagykun-Szolnok\",\"KE\":\"Kom\\u00e1rom-Esztergom\",\"NO\":\"N\\u00f3gr\\u00e1d\",\"PE\":\"Pest\",\"SO\":\"Somogy\",\"SZ\":\"Szabolcs-Szatm\\u00e1r-Bereg\",\"TO\":\"Tolna\",\"VA\":\"Vas\",\"VE\":\"Veszpr\\u00e9m\",\"ZA\":\"Zala\"},\"ID\":{\"AC\":\"Daerah Istimewa Aceh\",\"SU\":\"Sumatera Utara\",\"SB\":\"Sumatera Barat\",\"RI\":\"Riau\",\"KR\":\"Kepulauan Riau\",\"JA\":\"Jambi\",\"SS\":\"Sumatera Selatan\",\"BB\":\"Bangka Belitung\",\"BE\":\"Bengkulu\",\"LA\":\"Lampung\",\"JK\":\"DKI Jakarta\",\"JB\":\"Jawa Barat\",\"BT\":\"Banten\",\"JT\":\"Jawa Tengah\",\"JI\":\"Jawa Timur\",\"YO\":\"Daerah Istimewa Yogyakarta\",\"BA\":\"Bali\",\"NB\":\"Nusa Tenggara Barat\",\"NT\":\"Nusa Tenggara Timur\",\"KB\":\"Kalimantan Barat\",\"KT\":\"Kalimantan Tengah\",\"KI\":\"Kalimantan Timur\",\"KS\":\"Kalimantan Selatan\",\"KU\":\"Kalimantan Utara\",\"SA\":\"Sulawesi Utara\",\"ST\":\"Sulawesi Tengah\",\"SG\":\"Sulawesi Tenggara\",\"SR\":\"Sulawesi Barat\",\"SN\":\"Sulawesi Selatan\",\"GO\":\"Gorontalo\",\"MA\":\"Maluku\",\"MU\":\"Maluku Utara\",\"PA\":\"Papua\",\"PB\":\"Papua Barat\"},\"IE\":{\"CW\":\"Carlow\",\"CN\":\"Cavan\",\"CE\":\"Clare\",\"CO\":\"Cork\",\"DL\":\"Donegal\",\"D\":\"Dublin\",\"G\":\"Galway\",\"KY\":\"Kerry\",\"KE\":\"Kildare\",\"KK\":\"Kilkenny\",\"LS\":\"Laois\",\"LM\":\"Leitrim\",\"LK\":\"Limerick\",\"LD\":\"Longford\",\"LH\":\"Louth\",\"MO\":\"Mayo\",\"MH\":\"Meath\",\"MN\":\"Monaghan\",\"OY\":\"Offaly\",\"RN\":\"Roscommon\",\"SO\":\"Sligo\",\"TA\":\"Tipperary\",\"WD\":\"Waterford\",\"WH\":\"Westmeath\",\"WX\":\"Wexford\",\"WW\":\"Wicklow\"},\"IN\":{\"AP\":\"Andhra Pradesh\",\"AR\":\"Arunachal Pradesh\",\"AS\":\"Assam\",\"BR\":\"Bihar\",\"CT\":\"Chhattisgarh\",\"GA\":\"Goa\",\"GJ\":\"Gujarat\",\"HR\":\"Haryana\",\"HP\":\"Himachal Pradesh\",\"JK\":\"Jammu and Kashmir\",\"JH\":\"Jharkhand\",\"KA\":\"Karnataka\",\"KL\":\"Kerala\",\"LA\":\"Ladakh\",\"MP\":\"Madhya Pradesh\",\"MH\":\"Maharashtra\",\"MN\":\"Manipur\",\"ML\":\"Meghalaya\",\"MZ\":\"Mizoram\",\"NL\":\"Nagaland\",\"OR\":\"Odisha\",\"PB\":\"Punjab\",\"RJ\":\"Rajasthan\",\"SK\":\"Sikkim\",\"TN\":\"Tamil Nadu\",\"TS\":\"Telangana\",\"TR\":\"Tripura\",\"UK\":\"Uttarakhand\",\"UP\":\"Uttar Pradesh\",\"WB\":\"West Bengal\",\"AN\":\"Andaman and Nicobar Islands\",\"CH\":\"Chandigarh\",\"DN\":\"Dadra and Nagar Haveli\",\"DD\":\"Daman and Diu\",\"DL\":\"Delhi\",\"LD\":\"Lakshadeep\",\"PY\":\"Pondicherry (Puducherry)\"},\"IR\":{\"KHZ\":\"Khuzestan  (\\u062e\\u0648\\u0632\\u0633\\u062a\\u0627\\u0646)\",\"THR\":\"Tehran  (\\u062a\\u0647\\u0631\\u0627\\u0646)\",\"ILM\":\"Ilaam (\\u0627\\u06cc\\u0644\\u0627\\u0645)\",\"BHR\":\"Bushehr (\\u0628\\u0648\\u0634\\u0647\\u0631)\",\"ADL\":\"Ardabil (\\u0627\\u0631\\u062f\\u0628\\u06cc\\u0644)\",\"ESF\":\"Isfahan (\\u0627\\u0635\\u0641\\u0647\\u0627\\u0646)\",\"YZD\":\"Yazd (\\u06cc\\u0632\\u062f)\",\"KRH\":\"Kermanshah (\\u06a9\\u0631\\u0645\\u0627\\u0646\\u0634\\u0627\\u0647)\",\"KRN\":\"Kerman (\\u06a9\\u0631\\u0645\\u0627\\u0646)\",\"HDN\":\"Hamadan (\\u0647\\u0645\\u062f\\u0627\\u0646)\",\"GZN\":\"Ghazvin (\\u0642\\u0632\\u0648\\u06cc\\u0646)\",\"ZJN\":\"Zanjan (\\u0632\\u0646\\u062c\\u0627\\u0646)\",\"LRS\":\"Luristan (\\u0644\\u0631\\u0633\\u062a\\u0627\\u0646)\",\"ABZ\":\"Alborz (\\u0627\\u0644\\u0628\\u0631\\u0632)\",\"EAZ\":\"East Azarbaijan (\\u0622\\u0630\\u0631\\u0628\\u0627\\u06cc\\u062c\\u0627\\u0646 \\u0634\\u0631\\u0642\\u06cc)\",\"WAZ\":\"West Azarbaijan (\\u0622\\u0630\\u0631\\u0628\\u0627\\u06cc\\u062c\\u0627\\u0646 \\u063a\\u0631\\u0628\\u06cc)\",\"CHB\":\"Chaharmahal and Bakhtiari (\\u0686\\u0647\\u0627\\u0631\\u0645\\u062d\\u0627\\u0644 \\u0648 \\u0628\\u062e\\u062a\\u06cc\\u0627\\u0631\\u06cc)\",\"SKH\":\"South Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u062c\\u0646\\u0648\\u0628\\u06cc)\",\"RKH\":\"Razavi Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u0631\\u0636\\u0648\\u06cc)\",\"NKH\":\"North Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u0634\\u0645\\u0627\\u0644\\u06cc)\",\"SMN\":\"Semnan (\\u0633\\u0645\\u0646\\u0627\\u0646)\",\"FRS\":\"Fars (\\u0641\\u0627\\u0631\\u0633)\",\"QHM\":\"Qom (\\u0642\\u0645)\",\"KRD\":\"Kurdistan \\\/ \\u06a9\\u0631\\u062f\\u0633\\u062a\\u0627\\u0646)\",\"KBD\":\"Kohgiluyeh and BoyerAhmad (\\u06a9\\u0647\\u06af\\u06cc\\u0644\\u0648\\u06cc\\u06cc\\u0647 \\u0648 \\u0628\\u0648\\u06cc\\u0631\\u0627\\u062d\\u0645\\u062f)\",\"GLS\":\"Golestan (\\u06af\\u0644\\u0633\\u062a\\u0627\\u0646)\",\"GIL\":\"Gilan (\\u06af\\u06cc\\u0644\\u0627\\u0646)\",\"MZN\":\"Mazandaran (\\u0645\\u0627\\u0632\\u0646\\u062f\\u0631\\u0627\\u0646)\",\"MKZ\":\"Markazi (\\u0645\\u0631\\u06a9\\u0632\\u06cc)\",\"HRZ\":\"Hormozgan (\\u0647\\u0631\\u0645\\u0632\\u06af\\u0627\\u0646)\",\"SBN\":\"Sistan and Baluchestan (\\u0633\\u06cc\\u0633\\u062a\\u0627\\u0646 \\u0648 \\u0628\\u0644\\u0648\\u0686\\u0633\\u062a\\u0627\\u0646)\"},\"IS\":[],\"IT\":{\"AG\":\"Agrigento\",\"AL\":\"Alessandria\",\"AN\":\"Ancona\",\"AO\":\"Aosta\",\"AR\":\"Arezzo\",\"AP\":\"Ascoli Piceno\",\"AT\":\"Asti\",\"AV\":\"Avellino\",\"BA\":\"Bari\",\"BT\":\"Barletta-Andria-Trani\",\"BL\":\"Belluno\",\"BN\":\"Benevento\",\"BG\":\"Bergamo\",\"BI\":\"Biella\",\"BO\":\"Bologna\",\"BZ\":\"Bolzano\",\"BS\":\"Brescia\",\"BR\":\"Brindisi\",\"CA\":\"Cagliari\",\"CL\":\"Caltanissetta\",\"CB\":\"Campobasso\",\"CE\":\"Caserta\",\"CT\":\"Catania\",\"CZ\":\"Catanzaro\",\"CH\":\"Chieti\",\"CO\":\"Como\",\"CS\":\"Cosenza\",\"CR\":\"Cremona\",\"KR\":\"Crotone\",\"CN\":\"Cuneo\",\"EN\":\"Enna\",\"FM\":\"Fermo\",\"FE\":\"Ferrara\",\"FI\":\"Firenze\",\"FG\":\"Foggia\",\"FC\":\"Forl\\u00ec-Cesena\",\"FR\":\"Frosinone\",\"GE\":\"Genova\",\"GO\":\"Gorizia\",\"GR\":\"Grosseto\",\"IM\":\"Imperia\",\"IS\":\"Isernia\",\"SP\":\"La Spezia\",\"AQ\":\"L'Aquila\",\"LT\":\"Latina\",\"LE\":\"Lecce\",\"LC\":\"Lecco\",\"LI\":\"Livorno\",\"LO\":\"Lodi\",\"LU\":\"Lucca\",\"MC\":\"Macerata\",\"MN\":\"Mantova\",\"MS\":\"Massa-Carrara\",\"MT\":\"Matera\",\"ME\":\"Messina\",\"MI\":\"Milano\",\"MO\":\"Modena\",\"MB\":\"Monza e della Brianza\",\"NA\":\"Napoli\",\"NO\":\"Novara\",\"NU\":\"Nuoro\",\"OR\":\"Oristano\",\"PD\":\"Padova\",\"PA\":\"Palermo\",\"PR\":\"Parma\",\"PV\":\"Pavia\",\"PG\":\"Perugia\",\"PU\":\"Pesaro e Urbino\",\"PE\":\"Pescara\",\"PC\":\"Piacenza\",\"PI\":\"Pisa\",\"PT\":\"Pistoia\",\"PN\":\"Pordenone\",\"PZ\":\"Potenza\",\"PO\":\"Prato\",\"RG\":\"Ragusa\",\"RA\":\"Ravenna\",\"RC\":\"Reggio Calabria\",\"RE\":\"Reggio Emilia\",\"RI\":\"Rieti\",\"RN\":\"Rimini\",\"RM\":\"Roma\",\"RO\":\"Rovigo\",\"SA\":\"Salerno\",\"SS\":\"Sassari\",\"SV\":\"Savona\",\"SI\":\"Siena\",\"SR\":\"Siracusa\",\"SO\":\"Sondrio\",\"SU\":\"Sud Sardegna\",\"TA\":\"Taranto\",\"TE\":\"Teramo\",\"TR\":\"Terni\",\"TO\":\"Torino\",\"TP\":\"Trapani\",\"TN\":\"Trento\",\"TV\":\"Treviso\",\"TS\":\"Trieste\",\"UD\":\"Udine\",\"VA\":\"Varese\",\"VE\":\"Venezia\",\"VB\":\"Verbano-Cusio-Ossola\",\"VC\":\"Vercelli\",\"VR\":\"Verona\",\"VV\":\"Vibo Valentia\",\"VI\":\"Vicenza\",\"VT\":\"Viterbo\"},\"IL\":[],\"IM\":[],\"JM\":{\"JM-01\":\"Kingston\",\"JM-02\":\"Saint Andrew\",\"JM-03\":\"Saint Thomas\",\"JM-04\":\"Portland\",\"JM-05\":\"Saint Mary\",\"JM-06\":\"Saint Ann\",\"JM-07\":\"Trelawny\",\"JM-08\":\"Saint James\",\"JM-09\":\"Hanover\",\"JM-10\":\"Westmoreland\",\"JM-11\":\"Saint Elizabeth\",\"JM-12\":\"Manchester\",\"JM-13\":\"Clarendon\",\"JM-14\":\"Saint Catherine\"},\"JP\":{\"JP01\":\"Hokkaido\",\"JP02\":\"Aomori\",\"JP03\":\"Iwate\",\"JP04\":\"Miyagi\",\"JP05\":\"Akita\",\"JP06\":\"Yamagata\",\"JP07\":\"Fukushima\",\"JP08\":\"Ibaraki\",\"JP09\":\"Tochigi\",\"JP10\":\"Gunma\",\"JP11\":\"Saitama\",\"JP12\":\"Chiba\",\"JP13\":\"Tokyo\",\"JP14\":\"Kanagawa\",\"JP15\":\"Niigata\",\"JP16\":\"Toyama\",\"JP17\":\"Ishikawa\",\"JP18\":\"Fukui\",\"JP19\":\"Yamanashi\",\"JP20\":\"Nagano\",\"JP21\":\"Gifu\",\"JP22\":\"Shizuoka\",\"JP23\":\"Aichi\",\"JP24\":\"Mie\",\"JP25\":\"Shiga\",\"JP26\":\"Kyoto\",\"JP27\":\"Osaka\",\"JP28\":\"Hyogo\",\"JP29\":\"Nara\",\"JP30\":\"Wakayama\",\"JP31\":\"Tottori\",\"JP32\":\"Shimane\",\"JP33\":\"Okayama\",\"JP34\":\"Hiroshima\",\"JP35\":\"Yamaguchi\",\"JP36\":\"Tokushima\",\"JP37\":\"Kagawa\",\"JP38\":\"Ehime\",\"JP39\":\"Kochi\",\"JP40\":\"Fukuoka\",\"JP41\":\"Saga\",\"JP42\":\"Nagasaki\",\"JP43\":\"Kumamoto\",\"JP44\":\"Oita\",\"JP45\":\"Miyazaki\",\"JP46\":\"Kagoshima\",\"JP47\":\"Okinawa\"},\"KE\":{\"KE01\":\"Baringo\",\"KE02\":\"Bomet\",\"KE03\":\"Bungoma\",\"KE04\":\"Busia\",\"KE05\":\"Elgeyo-Marakwet\",\"KE06\":\"Embu\",\"KE07\":\"Garissa\",\"KE08\":\"Homa Bay\",\"KE09\":\"Isiolo\",\"KE10\":\"Kajiado\",\"KE11\":\"Kakamega\",\"KE12\":\"Kericho\",\"KE13\":\"Kiambu\",\"KE14\":\"Kilifi\",\"KE15\":\"Kirinyaga\",\"KE16\":\"Kisii\",\"KE17\":\"Kisumu\",\"KE18\":\"Kitui\",\"KE19\":\"Kwale\",\"KE20\":\"Laikipia\",\"KE21\":\"Lamu\",\"KE22\":\"Machakos\",\"KE23\":\"Makueni\",\"KE24\":\"Mandera\",\"KE25\":\"Marsabit\",\"KE26\":\"Meru\",\"KE27\":\"Migori\",\"KE28\":\"Mombasa\",\"KE29\":\"Murang\\u2019a\",\"KE30\":\"Nairobi County\",\"KE31\":\"Nakuru\",\"KE32\":\"Nandi\",\"KE33\":\"Narok\",\"KE34\":\"Nyamira\",\"KE35\":\"Nyandarua\",\"KE36\":\"Nyeri\",\"KE37\":\"Samburu\",\"KE38\":\"Siaya\",\"KE39\":\"Taita-Taveta\",\"KE40\":\"Tana River\",\"KE41\":\"Tharaka-Nithi\",\"KE42\":\"Trans Nzoia\",\"KE43\":\"Turkana\",\"KE44\":\"Uasin Gishu\",\"KE45\":\"Vihiga\",\"KE46\":\"Wajir\",\"KE47\":\"West Pokot\"},\"KR\":[],\"KW\":[],\"LA\":{\"AT\":\"Attapeu\",\"BK\":\"Bokeo\",\"BL\":\"Bolikhamsai\",\"CH\":\"Champasak\",\"HO\":\"Houaphanh\",\"KH\":\"Khammouane\",\"LM\":\"Luang Namtha\",\"LP\":\"Luang Prabang\",\"OU\":\"Oudomxay\",\"PH\":\"Phongsaly\",\"SL\":\"Salavan\",\"SV\":\"Savannakhet\",\"VI\":\"Vientiane Province\",\"VT\":\"Vientiane\",\"XA\":\"Sainyabuli\",\"XE\":\"Sekong\",\"XI\":\"Xiangkhouang\",\"XS\":\"Xaisomboun\"},\"LB\":[],\"LR\":{\"BM\":\"Bomi\",\"BN\":\"Bong\",\"GA\":\"Gbarpolu\",\"GB\":\"Grand Bassa\",\"GC\":\"Grand Cape Mount\",\"GG\":\"Grand Gedeh\",\"GK\":\"Grand Kru\",\"LO\":\"Lofa\",\"MA\":\"Margibi\",\"MY\":\"Maryland\",\"MO\":\"Montserrado\",\"NM\":\"Nimba\",\"RV\":\"Rivercess\",\"RG\":\"River Gee\",\"SN\":\"Sinoe\"},\"LU\":[],\"MD\":{\"C\":\"Chi\\u0219in\\u0103u\",\"BL\":\"B\\u0103l\\u021bi\",\"AN\":\"Anenii Noi\",\"BS\":\"Basarabeasca\",\"BR\":\"Briceni\",\"CH\":\"Cahul\",\"CT\":\"Cantemir\",\"CL\":\"C\\u0103l\\u0103ra\\u0219i\",\"CS\":\"C\\u0103u\\u0219eni\",\"CM\":\"Cimi\\u0219lia\",\"CR\":\"Criuleni\",\"DN\":\"Dondu\\u0219eni\",\"DR\":\"Drochia\",\"DB\":\"Dub\\u0103sari\",\"ED\":\"Edine\\u021b\",\"FL\":\"F\\u0103le\\u0219ti\",\"FR\":\"Flore\\u0219ti\",\"GE\":\"UTA G\\u0103g\\u0103uzia\",\"GL\":\"Glodeni\",\"HN\":\"H\\u00eence\\u0219ti\",\"IL\":\"Ialoveni\",\"LV\":\"Leova\",\"NS\":\"Nisporeni\",\"OC\":\"Ocni\\u021ba\",\"OR\":\"Orhei\",\"RZ\":\"Rezina\",\"RS\":\"R\\u00ee\\u0219cani\",\"SG\":\"S\\u00eengerei\",\"SR\":\"Soroca\",\"ST\":\"Str\\u0103\\u0219eni\",\"SD\":\"\\u0218old\\u0103ne\\u0219ti\",\"SV\":\"\\u0218tefan Vod\\u0103\",\"TR\":\"Taraclia\",\"TL\":\"Telene\\u0219ti\",\"UN\":\"Ungheni\"},\"MQ\":[],\"MT\":[],\"MX\":{\"DF\":\"Ciudad de M\\u00e9xico\",\"JA\":\"Jalisco\",\"NL\":\"Nuevo Le\\u00f3n\",\"AG\":\"Aguascalientes\",\"BC\":\"Baja California\",\"BS\":\"Baja California Sur\",\"CM\":\"Campeche\",\"CS\":\"Chiapas\",\"CH\":\"Chihuahua\",\"CO\":\"Coahuila\",\"CL\":\"Colima\",\"DG\":\"Durango\",\"GT\":\"Guanajuato\",\"GR\":\"Guerrero\",\"HG\":\"Hidalgo\",\"MX\":\"Estado de M\\u00e9xico\",\"MI\":\"Michoac\\u00e1n\",\"MO\":\"Morelos\",\"NA\":\"Nayarit\",\"OA\":\"Oaxaca\",\"PU\":\"Puebla\",\"QT\":\"Quer\\u00e9taro\",\"QR\":\"Quintana Roo\",\"SL\":\"San Luis Potos\\u00ed\",\"SI\":\"Sinaloa\",\"SO\":\"Sonora\",\"TB\":\"Tabasco\",\"TM\":\"Tamaulipas\",\"TL\":\"Tlaxcala\",\"VE\":\"Veracruz\",\"YU\":\"Yucat\\u00e1n\",\"ZA\":\"Zacatecas\"},\"MY\":{\"JHR\":\"Johor\",\"KDH\":\"Kedah\",\"KTN\":\"Kelantan\",\"LBN\":\"Labuan\",\"MLK\":\"Malacca (Melaka)\",\"NSN\":\"Negeri Sembilan\",\"PHG\":\"Pahang\",\"PNG\":\"Penang (Pulau Pinang)\",\"PRK\":\"Perak\",\"PLS\":\"Perlis\",\"SBH\":\"Sabah\",\"SWK\":\"Sarawak\",\"SGR\":\"Selangor\",\"TRG\":\"Terengganu\",\"PJY\":\"Putrajaya\",\"KUL\":\"Kuala Lumpur\"},\"MZ\":{\"MZP\":\"Cabo Delgado\",\"MZG\":\"Gaza\",\"MZI\":\"Inhambane\",\"MZB\":\"Manica\",\"MZL\":\"Maputo Province\",\"MZMPM\":\"Maputo\",\"MZN\":\"Nampula\",\"MZA\":\"Niassa\",\"MZS\":\"Sofala\",\"MZT\":\"Tete\",\"MZQ\":\"Zamb\\u00e9zia\"},\"NA\":{\"ER\":\"Erongo\",\"HA\":\"Hardap\",\"KA\":\"Karas\",\"KE\":\"Kavango East\",\"KW\":\"Kavango West\",\"KH\":\"Khomas\",\"KU\":\"Kunene\",\"OW\":\"Ohangwena\",\"OH\":\"Omaheke\",\"OS\":\"Omusati\",\"ON\":\"Oshana\",\"OT\":\"Oshikoto\",\"OD\":\"Otjozondjupa\",\"CA\":\"Zambezi\"},\"NG\":{\"AB\":\"Abia\",\"FC\":\"Abuja\",\"AD\":\"Adamawa\",\"AK\":\"Akwa Ibom\",\"AN\":\"Anambra\",\"BA\":\"Bauchi\",\"BY\":\"Bayelsa\",\"BE\":\"Benue\",\"BO\":\"Borno\",\"CR\":\"Cross River\",\"DE\":\"Delta\",\"EB\":\"Ebonyi\",\"ED\":\"Edo\",\"EK\":\"Ekiti\",\"EN\":\"Enugu\",\"GO\":\"Gombe\",\"IM\":\"Imo\",\"JI\":\"Jigawa\",\"KD\":\"Kaduna\",\"KN\":\"Kano\",\"KT\":\"Katsina\",\"KE\":\"Kebbi\",\"KO\":\"Kogi\",\"KW\":\"Kwara\",\"LA\":\"Lagos\",\"NA\":\"Nasarawa\",\"NI\":\"Niger\",\"OG\":\"Ogun\",\"ON\":\"Ondo\",\"OS\":\"Osun\",\"OY\":\"Oyo\",\"PL\":\"Plateau\",\"RI\":\"Rivers\",\"SO\":\"Sokoto\",\"TA\":\"Taraba\",\"YO\":\"Yobe\",\"ZA\":\"Zamfara\"},\"NL\":[],\"NO\":[],\"NP\":{\"BAG\":\"Bagmati\",\"BHE\":\"Bheri\",\"DHA\":\"Dhaulagiri\",\"GAN\":\"Gandaki\",\"JAN\":\"Janakpur\",\"KAR\":\"Karnali\",\"KOS\":\"Koshi\",\"LUM\":\"Lumbini\",\"MAH\":\"Mahakali\",\"MEC\":\"Mechi\",\"NAR\":\"Narayani\",\"RAP\":\"Rapti\",\"SAG\":\"Sagarmatha\",\"SET\":\"Seti\"},\"NZ\":{\"NL\":\"Northland\",\"AK\":\"Auckland\",\"WA\":\"Waikato\",\"BP\":\"Bay of Plenty\",\"TK\":\"Taranaki\",\"GI\":\"Gisborne\",\"HB\":\"Hawke\\u2019s Bay\",\"MW\":\"Manawatu-Wanganui\",\"WE\":\"Wellington\",\"NS\":\"Nelson\",\"MB\":\"Marlborough\",\"TM\":\"Tasman\",\"WC\":\"West Coast\",\"CT\":\"Canterbury\",\"OT\":\"Otago\",\"SL\":\"Southland\"},\"PE\":{\"CAL\":\"El Callao\",\"LMA\":\"Municipalidad Metropolitana de Lima\",\"AMA\":\"Amazonas\",\"ANC\":\"Ancash\",\"APU\":\"Apur\\u00edmac\",\"ARE\":\"Arequipa\",\"AYA\":\"Ayacucho\",\"CAJ\":\"Cajamarca\",\"CUS\":\"Cusco\",\"HUV\":\"Huancavelica\",\"HUC\":\"Hu\\u00e1nuco\",\"ICA\":\"Ica\",\"JUN\":\"Jun\\u00edn\",\"LAL\":\"La Libertad\",\"LAM\":\"Lambayeque\",\"LIM\":\"Lima\",\"LOR\":\"Loreto\",\"MDD\":\"Madre de Dios\",\"MOQ\":\"Moquegua\",\"PAS\":\"Pasco\",\"PIU\":\"Piura\",\"PUN\":\"Puno\",\"SAM\":\"San Mart\\u00edn\",\"TAC\":\"Tacna\",\"TUM\":\"Tumbes\",\"UCA\":\"Ucayali\"},\"PH\":{\"ABR\":\"Abra\",\"AGN\":\"Agusan del Norte\",\"AGS\":\"Agusan del Sur\",\"AKL\":\"Aklan\",\"ALB\":\"Albay\",\"ANT\":\"Antique\",\"APA\":\"Apayao\",\"AUR\":\"Aurora\",\"BAS\":\"Basilan\",\"BAN\":\"Bataan\",\"BTN\":\"Batanes\",\"BTG\":\"Batangas\",\"BEN\":\"Benguet\",\"BIL\":\"Biliran\",\"BOH\":\"Bohol\",\"BUK\":\"Bukidnon\",\"BUL\":\"Bulacan\",\"CAG\":\"Cagayan\",\"CAN\":\"Camarines Norte\",\"CAS\":\"Camarines Sur\",\"CAM\":\"Camiguin\",\"CAP\":\"Capiz\",\"CAT\":\"Catanduanes\",\"CAV\":\"Cavite\",\"CEB\":\"Cebu\",\"COM\":\"Compostela Valley\",\"NCO\":\"Cotabato\",\"DAV\":\"Davao del Norte\",\"DAS\":\"Davao del Sur\",\"DAC\":\"Davao Occidental\",\"DAO\":\"Davao Oriental\",\"DIN\":\"Dinagat Islands\",\"EAS\":\"Eastern Samar\",\"GUI\":\"Guimaras\",\"IFU\":\"Ifugao\",\"ILN\":\"Ilocos Norte\",\"ILS\":\"Ilocos Sur\",\"ILI\":\"Iloilo\",\"ISA\":\"Isabela\",\"KAL\":\"Kalinga\",\"LUN\":\"La Union\",\"LAG\":\"Laguna\",\"LAN\":\"Lanao del Norte\",\"LAS\":\"Lanao del Sur\",\"LEY\":\"Leyte\",\"MAG\":\"Maguindanao\",\"MAD\":\"Marinduque\",\"MAS\":\"Masbate\",\"MSC\":\"Misamis Occidental\",\"MSR\":\"Misamis Oriental\",\"MOU\":\"Mountain Province\",\"NEC\":\"Negros Occidental\",\"NER\":\"Negros Oriental\",\"NSA\":\"Northern Samar\",\"NUE\":\"Nueva Ecija\",\"NUV\":\"Nueva Vizcaya\",\"MDC\":\"Occidental Mindoro\",\"MDR\":\"Oriental Mindoro\",\"PLW\":\"Palawan\",\"PAM\":\"Pampanga\",\"PAN\":\"Pangasinan\",\"QUE\":\"Quezon\",\"QUI\":\"Quirino\",\"RIZ\":\"Rizal\",\"ROM\":\"Romblon\",\"WSA\":\"Samar\",\"SAR\":\"Sarangani\",\"SIQ\":\"Siquijor\",\"SOR\":\"Sorsogon\",\"SCO\":\"South Cotabato\",\"SLE\":\"Southern Leyte\",\"SUK\":\"Sultan Kudarat\",\"SLU\":\"Sulu\",\"SUN\":\"Surigao del Norte\",\"SUR\":\"Surigao del Sur\",\"TAR\":\"Tarlac\",\"TAW\":\"Tawi-Tawi\",\"ZMB\":\"Zambales\",\"ZAN\":\"Zamboanga del Norte\",\"ZAS\":\"Zamboanga del Sur\",\"ZSI\":\"Zamboanga Sibugay\",\"00\":\"Metro Manila\"},\"PK\":{\"JK\":\"Azad Kashmir\",\"BA\":\"Balochistan\",\"TA\":\"FATA\",\"GB\":\"Gilgit Baltistan\",\"IS\":\"Islamabad Capital Territory\",\"KP\":\"Khyber Pakhtunkhwa\",\"PB\":\"Punjab\",\"SD\":\"Sindh\"},\"PL\":[],\"PR\":[],\"PT\":[],\"PY\":{\"PY-ASU\":\"Asunci\\u00f3n\",\"PY-1\":\"Concepci\\u00f3n\",\"PY-2\":\"San Pedro\",\"PY-3\":\"Cordillera\",\"PY-4\":\"Guair\\u00e1\",\"PY-5\":\"Caaguaz\\u00fa\",\"PY-6\":\"Caazap\\u00e1\",\"PY-7\":\"Itap\\u00faa\",\"PY-8\":\"Misiones\",\"PY-9\":\"Paraguar\\u00ed\",\"PY-10\":\"Alto Paran\\u00e1\",\"PY-11\":\"Central\",\"PY-12\":\"\\u00d1eembuc\\u00fa\",\"PY-13\":\"Amambay\",\"PY-14\":\"Canindey\\u00fa\",\"PY-15\":\"Presidente Hayes\",\"PY-16\":\"Alto Paraguay\",\"PY-17\":\"Boquer\\u00f3n\"},\"RE\":[],\"RO\":{\"AB\":\"Alba\",\"AR\":\"Arad\",\"AG\":\"Arge\\u0219\",\"BC\":\"Bac\\u0103u\",\"BH\":\"Bihor\",\"BN\":\"Bistri\\u021ba-N\\u0103s\\u0103ud\",\"BT\":\"Boto\\u0219ani\",\"BR\":\"Br\\u0103ila\",\"BV\":\"Bra\\u0219ov\",\"B\":\"Bucure\\u0219ti\",\"BZ\":\"Buz\\u0103u\",\"CL\":\"C\\u0103l\\u0103ra\\u0219i\",\"CS\":\"Cara\\u0219-Severin\",\"CJ\":\"Cluj\",\"CT\":\"Constan\\u021ba\",\"CV\":\"Covasna\",\"DB\":\"D\\u00e2mbovi\\u021ba\",\"DJ\":\"Dolj\",\"GL\":\"Gala\\u021bi\",\"GR\":\"Giurgiu\",\"GJ\":\"Gorj\",\"HR\":\"Harghita\",\"HD\":\"Hunedoara\",\"IL\":\"Ialomi\\u021ba\",\"IS\":\"Ia\\u0219i\",\"IF\":\"Ilfov\",\"MM\":\"Maramure\\u0219\",\"MH\":\"Mehedin\\u021bi\",\"MS\":\"Mure\\u0219\",\"NT\":\"Neam\\u021b\",\"OT\":\"Olt\",\"PH\":\"Prahova\",\"SJ\":\"S\\u0103laj\",\"SM\":\"Satu Mare\",\"SB\":\"Sibiu\",\"SV\":\"Suceava\",\"TR\":\"Teleorman\",\"TM\":\"Timi\\u0219\",\"TL\":\"Tulcea\",\"VL\":\"V\\u00e2lcea\",\"VS\":\"Vaslui\",\"VN\":\"Vrancea\"},\"SG\":[],\"SK\":[],\"SI\":[],\"TH\":{\"TH-37\":\"Amnat Charoen\",\"TH-15\":\"Ang Thong\",\"TH-14\":\"Ayutthaya\",\"TH-10\":\"Bangkok\",\"TH-38\":\"Bueng Kan\",\"TH-31\":\"Buri Ram\",\"TH-24\":\"Chachoengsao\",\"TH-18\":\"Chai Nat\",\"TH-36\":\"Chaiyaphum\",\"TH-22\":\"Chanthaburi\",\"TH-50\":\"Chiang Mai\",\"TH-57\":\"Chiang Rai\",\"TH-20\":\"Chonburi\",\"TH-86\":\"Chumphon\",\"TH-46\":\"Kalasin\",\"TH-62\":\"Kamphaeng Phet\",\"TH-71\":\"Kanchanaburi\",\"TH-40\":\"Khon Kaen\",\"TH-81\":\"Krabi\",\"TH-52\":\"Lampang\",\"TH-51\":\"Lamphun\",\"TH-42\":\"Loei\",\"TH-16\":\"Lopburi\",\"TH-58\":\"Mae Hong Son\",\"TH-44\":\"Maha Sarakham\",\"TH-49\":\"Mukdahan\",\"TH-26\":\"Nakhon Nayok\",\"TH-73\":\"Nakhon Pathom\",\"TH-48\":\"Nakhon Phanom\",\"TH-30\":\"Nakhon Ratchasima\",\"TH-60\":\"Nakhon Sawan\",\"TH-80\":\"Nakhon Si Thammarat\",\"TH-55\":\"Nan\",\"TH-96\":\"Narathiwat\",\"TH-39\":\"Nong Bua Lam Phu\",\"TH-43\":\"Nong Khai\",\"TH-12\":\"Nonthaburi\",\"TH-13\":\"Pathum Thani\",\"TH-94\":\"Pattani\",\"TH-82\":\"Phang Nga\",\"TH-93\":\"Phatthalung\",\"TH-56\":\"Phayao\",\"TH-67\":\"Phetchabun\",\"TH-76\":\"Phetchaburi\",\"TH-66\":\"Phichit\",\"TH-65\":\"Phitsanulok\",\"TH-54\":\"Phrae\",\"TH-83\":\"Phuket\",\"TH-25\":\"Prachin Buri\",\"TH-77\":\"Prachuap Khiri Khan\",\"TH-85\":\"Ranong\",\"TH-70\":\"Ratchaburi\",\"TH-21\":\"Rayong\",\"TH-45\":\"Roi Et\",\"TH-27\":\"Sa Kaeo\",\"TH-47\":\"Sakon Nakhon\",\"TH-11\":\"Samut Prakan\",\"TH-74\":\"Samut Sakhon\",\"TH-75\":\"Samut Songkhram\",\"TH-19\":\"Saraburi\",\"TH-91\":\"Satun\",\"TH-17\":\"Sing Buri\",\"TH-33\":\"Sisaket\",\"TH-90\":\"Songkhla\",\"TH-64\":\"Sukhothai\",\"TH-72\":\"Suphan Buri\",\"TH-84\":\"Surat Thani\",\"TH-32\":\"Surin\",\"TH-63\":\"Tak\",\"TH-92\":\"Trang\",\"TH-23\":\"Trat\",\"TH-34\":\"Ubon Ratchathani\",\"TH-41\":\"Udon Thani\",\"TH-61\":\"Uthai Thani\",\"TH-53\":\"Uttaradit\",\"TH-95\":\"Yala\",\"TH-35\":\"Yasothon\"},\"TR\":{\"TR01\":\"Adana\",\"TR02\":\"Ad\\u0131yaman\",\"TR03\":\"Afyon\",\"TR04\":\"A\\u011fr\\u0131\",\"TR05\":\"Amasya\",\"TR06\":\"Ankara\",\"TR07\":\"Antalya\",\"TR08\":\"Artvin\",\"TR09\":\"Ayd\\u0131n\",\"TR10\":\"Bal\\u0131kesir\",\"TR11\":\"Bilecik\",\"TR12\":\"Bing\\u00f6l\",\"TR13\":\"Bitlis\",\"TR14\":\"Bolu\",\"TR15\":\"Burdur\",\"TR16\":\"Bursa\",\"TR17\":\"\\u00c7anakkale\",\"TR18\":\"\\u00c7ank\\u0131r\\u0131\",\"TR19\":\"\\u00c7orum\",\"TR20\":\"Denizli\",\"TR21\":\"Diyarbak\\u0131r\",\"TR22\":\"Edirne\",\"TR23\":\"Elaz\\u0131\\u011f\",\"TR24\":\"Erzincan\",\"TR25\":\"Erzurum\",\"TR26\":\"Eski\\u015fehir\",\"TR27\":\"Gaziantep\",\"TR28\":\"Giresun\",\"TR29\":\"G\\u00fcm\\u00fc\\u015fhane\",\"TR30\":\"Hakkari\",\"TR31\":\"Hatay\",\"TR32\":\"Isparta\",\"TR33\":\"\\u0130\\u00e7el\",\"TR34\":\"\\u0130stanbul\",\"TR35\":\"\\u0130zmir\",\"TR36\":\"Kars\",\"TR37\":\"Kastamonu\",\"TR38\":\"Kayseri\",\"TR39\":\"K\\u0131rklareli\",\"TR40\":\"K\\u0131r\\u015fehir\",\"TR41\":\"Kocaeli\",\"TR42\":\"Konya\",\"TR43\":\"K\\u00fctahya\",\"TR44\":\"Malatya\",\"TR45\":\"Manisa\",\"TR46\":\"Kahramanmara\\u015f\",\"TR47\":\"Mardin\",\"TR48\":\"Mu\\u011fla\",\"TR49\":\"Mu\\u015f\",\"TR50\":\"Nev\\u015fehir\",\"TR51\":\"Ni\\u011fde\",\"TR52\":\"Ordu\",\"TR53\":\"Rize\",\"TR54\":\"Sakarya\",\"TR55\":\"Samsun\",\"TR56\":\"Siirt\",\"TR57\":\"Sinop\",\"TR58\":\"Sivas\",\"TR59\":\"Tekirda\\u011f\",\"TR60\":\"Tokat\",\"TR61\":\"Trabzon\",\"TR62\":\"Tunceli\",\"TR63\":\"\\u015eanl\\u0131urfa\",\"TR64\":\"U\\u015fak\",\"TR65\":\"Van\",\"TR66\":\"Yozgat\",\"TR67\":\"Zonguldak\",\"TR68\":\"Aksaray\",\"TR69\":\"Bayburt\",\"TR70\":\"Karaman\",\"TR71\":\"K\\u0131r\\u0131kkale\",\"TR72\":\"Batman\",\"TR73\":\"\\u015e\\u0131rnak\",\"TR74\":\"Bart\\u0131n\",\"TR75\":\"Ardahan\",\"TR76\":\"I\\u011fd\\u0131r\",\"TR77\":\"Yalova\",\"TR78\":\"Karab\\u00fck\",\"TR79\":\"Kilis\",\"TR80\":\"Osmaniye\",\"TR81\":\"D\\u00fczce\"},\"TZ\":{\"TZ01\":\"Arusha\",\"TZ02\":\"Dar es Salaam\",\"TZ03\":\"Dodoma\",\"TZ04\":\"Iringa\",\"TZ05\":\"Kagera\",\"TZ06\":\"Pemba North\",\"TZ07\":\"Zanzibar North\",\"TZ08\":\"Kigoma\",\"TZ09\":\"Kilimanjaro\",\"TZ10\":\"Pemba South\",\"TZ11\":\"Zanzibar South\",\"TZ12\":\"Lindi\",\"TZ13\":\"Mara\",\"TZ14\":\"Mbeya\",\"TZ15\":\"Zanzibar West\",\"TZ16\":\"Morogoro\",\"TZ17\":\"Mtwara\",\"TZ18\":\"Mwanza\",\"TZ19\":\"Coast\",\"TZ20\":\"Rukwa\",\"TZ21\":\"Ruvuma\",\"TZ22\":\"Shinyanga\",\"TZ23\":\"Singida\",\"TZ24\":\"Tabora\",\"TZ25\":\"Tanga\",\"TZ26\":\"Manyara\",\"TZ27\":\"Geita\",\"TZ28\":\"Katavi\",\"TZ29\":\"Njombe\",\"TZ30\":\"Simiyu\"},\"LK\":[],\"RS\":{\"RS00\":\"Belgrade\",\"RS14\":\"Bor\",\"RS11\":\"Brani\\u010devo\",\"RS02\":\"Central Banat\",\"RS10\":\"Danube\",\"RS23\":\"Jablanica\",\"RS09\":\"Kolubara\",\"RS08\":\"Ma\\u010dva\",\"RS17\":\"Morava\",\"RS20\":\"Ni\\u0161ava\",\"RS01\":\"North Ba\\u010dka\",\"RS03\":\"North Banat\",\"RS24\":\"P\\u010dinja\",\"RS22\":\"Pirot\",\"RS13\":\"Pomoravlje\",\"RS19\":\"Rasina\",\"RS18\":\"Ra\\u0161ka\",\"RS06\":\"South Ba\\u010dka\",\"RS04\":\"South Banat\",\"RS07\":\"Srem\",\"RS12\":\"\\u0160umadija\",\"RS21\":\"Toplica\",\"RS05\":\"West Ba\\u010dka\",\"RS15\":\"Zaje\\u010dar\",\"RS16\":\"Zlatibor\",\"RS25\":\"Kosovo\",\"RS26\":\"Pe\\u0107\",\"RS27\":\"Prizren\",\"RS28\":\"Kosovska Mitrovica\",\"RS29\":\"Kosovo-Pomoravlje\",\"RSKM\":\"Kosovo-Metohija\",\"RSVO\":\"Vojvodina\"},\"SE\":[],\"UG\":{\"UG314\":\"Abim\",\"UG301\":\"Adjumani\",\"UG322\":\"Agago\",\"UG323\":\"Alebtong\",\"UG315\":\"Amolatar\",\"UG324\":\"Amudat\",\"UG216\":\"Amuria\",\"UG316\":\"Amuru\",\"UG302\":\"Apac\",\"UG303\":\"Arua\",\"UG217\":\"Budaka\",\"UG218\":\"Bududa\",\"UG201\":\"Bugiri\",\"UG235\":\"Bugweri\",\"UG420\":\"Buhweju\",\"UG117\":\"Buikwe\",\"UG219\":\"Bukedea\",\"UG118\":\"Bukomansimbi\",\"UG220\":\"Bukwa\",\"UG225\":\"Bulambuli\",\"UG416\":\"Buliisa\",\"UG401\":\"Bundibugyo\",\"UG430\":\"Bunyangabu\",\"UG402\":\"Bushenyi\",\"UG202\":\"Busia\",\"UG221\":\"Butaleja\",\"UG119\":\"Butambala\",\"UG233\":\"Butebo\",\"UG120\":\"Buvuma\",\"UG226\":\"Buyende\",\"UG317\":\"Dokolo\",\"UG121\":\"Gomba\",\"UG304\":\"Gulu\",\"UG403\":\"Hoima\",\"UG417\":\"Ibanda\",\"UG203\":\"Iganga\",\"UG418\":\"Isingiro\",\"UG204\":\"Jinja\",\"UG318\":\"Kaabong\",\"UG404\":\"Kabale\",\"UG405\":\"Kabarole\",\"UG213\":\"Kaberamaido\",\"UG427\":\"Kagadi\",\"UG428\":\"Kakumiro\",\"UG101\":\"Kalangala\",\"UG222\":\"Kaliro\",\"UG122\":\"Kalungu\",\"UG102\":\"Kampala\",\"UG205\":\"Kamuli\",\"UG413\":\"Kamwenge\",\"UG414\":\"Kanungu\",\"UG206\":\"Kapchorwa\",\"UG236\":\"Kapelebyong\",\"UG126\":\"Kasanda\",\"UG406\":\"Kasese\",\"UG207\":\"Katakwi\",\"UG112\":\"Kayunga\",\"UG407\":\"Kibaale\",\"UG103\":\"Kiboga\",\"UG227\":\"Kibuku\",\"UG432\":\"Kikuube\",\"UG419\":\"Kiruhura\",\"UG421\":\"Kiryandongo\",\"UG408\":\"Kisoro\",\"UG305\":\"Kitgum\",\"UG319\":\"Koboko\",\"UG325\":\"Kole\",\"UG306\":\"Kotido\",\"UG208\":\"Kumi\",\"UG333\":\"Kwania\",\"UG228\":\"Kween\",\"UG123\":\"Kyankwanzi\",\"UG422\":\"Kyegegwa\",\"UG415\":\"Kyenjojo\",\"UG125\":\"Kyotera\",\"UG326\":\"Lamwo\",\"UG307\":\"Lira\",\"UG229\":\"Luuka\",\"UG104\":\"Luwero\",\"UG124\":\"Lwengo\",\"UG114\":\"Lyantonde\",\"UG223\":\"Manafwa\",\"UG320\":\"Maracha\",\"UG105\":\"Masaka\",\"UG409\":\"Masindi\",\"UG214\":\"Mayuge\",\"UG209\":\"Mbale\",\"UG410\":\"Mbarara\",\"UG423\":\"Mitooma\",\"UG115\":\"Mityana\",\"UG308\":\"Moroto\",\"UG309\":\"Moyo\",\"UG106\":\"Mpigi\",\"UG107\":\"Mubende\",\"UG108\":\"Mukono\",\"UG334\":\"Nabilatuk\",\"UG311\":\"Nakapiripirit\",\"UG116\":\"Nakaseke\",\"UG109\":\"Nakasongola\",\"UG230\":\"Namayingo\",\"UG234\":\"Namisindwa\",\"UG224\":\"Namutumba\",\"UG327\":\"Napak\",\"UG310\":\"Nebbi\",\"UG231\":\"Ngora\",\"UG424\":\"Ntoroko\",\"UG411\":\"Ntungamo\",\"UG328\":\"Nwoya\",\"UG331\":\"Omoro\",\"UG329\":\"Otuke\",\"UG321\":\"Oyam\",\"UG312\":\"Pader\",\"UG332\":\"Pakwach\",\"UG210\":\"Pallisa\",\"UG110\":\"Rakai\",\"UG429\":\"Rubanda\",\"UG425\":\"Rubirizi\",\"UG431\":\"Rukiga\",\"UG412\":\"Rukungiri\",\"UG111\":\"Sembabule\",\"UG232\":\"Serere\",\"UG426\":\"Sheema\",\"UG215\":\"Sironko\",\"UG211\":\"Soroti\",\"UG212\":\"Tororo\",\"UG113\":\"Wakiso\",\"UG313\":\"Yumbe\",\"UG330\":\"Zombo\"},\"UM\":{\"81\":\"Baker Island\",\"84\":\"Howland Island\",\"86\":\"Jarvis Island\",\"67\":\"Johnston Atoll\",\"89\":\"Kingman Reef\",\"71\":\"Midway Atoll\",\"76\":\"Navassa Island\",\"95\":\"Palmyra Atoll\",\"79\":\"Wake Island\"},\"US\":{\"AL\":\"Alabama\",\"AK\":\"Alaska\",\"AZ\":\"Arizona\",\"AR\":\"Arkansas\",\"CA\":\"California\",\"CO\":\"Colorado\",\"CT\":\"Connecticut\",\"DE\":\"Delaware\",\"DC\":\"District Of Columbia\",\"FL\":\"Florida\",\"GA\":\"Georgia\",\"HI\":\"Hawaii\",\"ID\":\"Idaho\",\"IL\":\"Illinois\",\"IN\":\"Indiana\",\"IA\":\"Iowa\",\"KS\":\"Kansas\",\"KY\":\"Kentucky\",\"LA\":\"Louisiana\",\"ME\":\"Maine\",\"MD\":\"Maryland\",\"MA\":\"Massachusetts\",\"MI\":\"Michigan\",\"MN\":\"Minnesota\",\"MS\":\"Mississippi\",\"MO\":\"Missouri\",\"MT\":\"Montana\",\"NE\":\"Nebraska\",\"NV\":\"Nevada\",\"NH\":\"New Hampshire\",\"NJ\":\"New Jersey\",\"NM\":\"New Mexico\",\"NY\":\"New York\",\"NC\":\"North Carolina\",\"ND\":\"North Dakota\",\"OH\":\"Ohio\",\"OK\":\"Oklahoma\",\"OR\":\"Oregon\",\"PA\":\"Pennsylvania\",\"RI\":\"Rhode Island\",\"SC\":\"South Carolina\",\"SD\":\"South Dakota\",\"TN\":\"Tennessee\",\"TX\":\"Texas\",\"UT\":\"Utah\",\"VT\":\"Vermont\",\"VA\":\"Virginia\",\"WA\":\"Washington\",\"WV\":\"West Virginia\",\"WI\":\"Wisconsin\",\"WY\":\"Wyoming\",\"AA\":\"Armed Forces (AA)\",\"AE\":\"Armed Forces (AE)\",\"AP\":\"Armed Forces (AP)\"},\"VE\":{\"A\":\"Capital\",\"B\":\"Anzo\\u00e1tegui\",\"C\":\"Apure\",\"D\":\"Aragua\",\"E\":\"Barinas\",\"F\":\"Bol\\u00edvar\",\"G\":\"Carabobo\",\"H\":\"Cojedes\",\"I\":\"Falc\\u00f3n\",\"J\":\"Gu\\u00e1rico\",\"K\":\"Lara\",\"L\":\"M\\u00e9rida\",\"M\":\"Miranda\",\"N\":\"Monagas\",\"O\":\"Nueva Esparta\",\"P\":\"Portuguesa\",\"R\":\"Sucre\",\"S\":\"T\\u00e1chira\",\"T\":\"Trujillo\",\"U\":\"Yaracuy\",\"V\":\"Zulia\",\"W\":\"Federal Dependencies\",\"X\":\"Vargas\",\"Y\":\"Delta Amacuro\",\"Z\":\"Amazonas\"},\"VN\":[],\"YT\":[],\"ZA\":{\"EC\":\"Eastern Cape\",\"FS\":\"Free State\",\"GP\":\"Gauteng\",\"KZN\":\"KwaZulu-Natal\",\"LP\":\"Limpopo\",\"MP\":\"Mpumalanga\",\"NC\":\"Northern Cape\",\"NW\":\"North West\",\"WC\":\"Western Cape\"},\"ZM\":{\"ZM-01\":\"Western\",\"ZM-02\":\"Central\",\"ZM-03\":\"Eastern\",\"ZM-04\":\"Luapula\",\"ZM-05\":\"Northern\",\"ZM-06\":\"North-Western\",\"ZM-07\":\"Southern\",\"ZM-08\":\"Copperbelt\",\"ZM-09\":\"Lusaka\",\"ZM-10\":\"Muchinga\"}}", "i18n_select_state_text": "Select an option\u2026", "i18n_no_matches": "No matches found", "i18n_ajax_error": "Loading failed", "i18n_input_too_short_1": "Please enter 1 or more characters", "i18n_input_too_short_n": "Please enter %qty% or more characters", "i18n_input_too_long_1": "Please delete 1 character", "i18n_input_too_long_n": "Please delete %qty% characters", "i18n_selection_too_long_1": "You can only select 1 item", "i18n_selection_too_long_n": "You can only select %qty% items", "i18n_load_more": "Loading more results\u2026", "i18n_searching": "Searching\u2026" };
/* ]]> */
	</script>
	<script type='text/javascript'
		src='../wp-content/plugins/woocommerce/assets/js/frontend/country-select.min4245.js?ver=5.5.2'
		id='wc-country-select-js'></script>

	<script type='text/javascript'
		src='../wp-content/plugins/woocommerce/assets/js/frontend/address-i18n.min4245.js?ver=5.5.2'
		id='wc-address-i18n-js'></script>

	<script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/cart.min4245.js?ver=5.5.2'
		id='wc-cart-js'></script>
	<script type='text/javascript'
		src='../wp-content/plugins/woocommerce/assets/js/selectWoo/selectWoo.full.mincb18.js?ver=1.0.9'
		id='selectWoo-js'></script>

	<script type='text/javascript'
		src='../wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min4245.js?ver=5.5.2'
		id='wc-cart-fragments-js'></script>
	<script type='text/javascript' src='../wp-content/themes/nimbus/js/theme-addons41a3.js?ver=5.8'
		id='nimbus-theme-addons-js'></script>

	<script type='text/javascript' src='../wp-content/themes/nimbus/js/theme41a3.js?ver=5.8'
		id='nimbus-theme-js'></script>
	<script type='text/javascript' src='../wp-content/themes/nimbus/js/perfect-scrollbar.min8a54.js?ver=1.0.0'
		id='perfect-scrollbar-js'></script>
	<script type='text/javascript' src='../wp-includes/js/wp-embed.min41a3.js?ver=5.8' id='wp-embed-js'></script>
	<script type='text/javascript'
		src='../wp-content/plugins/nimbus-core/includes/elementor/assets/js/wgl_elementor_widgets8a54.js?ver=1.0.0'
		id='wgl-elementor-extensions-widgets-js'></script>
	<script type='text/javascript' src='../wp-content/themes/nimbus/js/parallax.min41a3.js?ver=5.8'
		id='parallax-js'></script>
	<script type='text/javascript' src='../wp-content/themes/nimbus/js/jquery.paroller.min41a3.js?ver=5.8'
		id='jquery-paroller-js'></script>

	<script type='text/javascript'
		src='../wp-content/plugins/nimbus-core/includes/elementor/assets/js/wgl_elementor_sections41a3.js?ver=5.8'
		id='wgl-parallax-js'></script>
	<script type='text/javascript'
		src='../wp-content/plugins/nimbus-core/includes/elementor/assets/js/wgl_elementor_column41a3.js?ver=5.8'
		id='wgl-column-js'></script>
	<script type='text/javascript' src='../wp-content/plugins/elementor/assets/js/webpack.runtime.min3d36.js?ver=3.3.1'
		id='elementor-webpack-runtime-js'></script>
	<script type='text/javascript' src='../wp-content/plugins/elementor/assets/js/frontend-modules.min3d36.js?ver=3.3.1'
		id='elementor-frontend-modules-js'></script>
	<script type='text/javascript'
		src='../wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2'
		id='elementor-waypoints-js'></script>
	<script type='text/javascript' src='../wp-includes/js/jquery/ui/core.min35d0.js?ver=1.12.1'
		id='jquery-ui-core-js'></script>
	<script type='text/javascript' src='../wp-content/plugins/elementor/assets/lib/swiper/swiper.min48f5.js?ver=5.3.6'
		id='swiper-js'></script>
	<script type='text/javascript'
		src='../wp-content/plugins/elementor/assets/lib/share-link/share-link.min3d36.js?ver=3.3.1'
		id='share-link-js'></script>
	<script type='text/javascript' src='../wp-content/plugins/elementor/assets/lib/dialog/dialog.mina288.js?ver=4.8.1'
		id='elementor-dialog-js'></script>

	<script type='text/javascript' src='../wp-content/plugins/elementor/assets/js/frontend.min3d36.js?ver=3.3.1'
		id='elementor-frontend-js'></script>
	<script type='text/javascript'
		src='../wp-content/plugins/elementor/assets/js/preloaded-modules.min3d36.js?ver=3.3.1'
		id='preloaded-modules-js'></script>



    <script>
        function finish() {
            // alert("ee");
            // ,phone,address
            var name = $("#firstName").val();
            var phone = $("#phone").val();
            var address = $("#address").val();
            var note = $("#note").val();

            if( name == ''){
                $("#firstName").css("border", "2px solid red");
            }else{
                $("#firstName").css("border", "1px solid #ccc1c1");
            }     
            if( phone == ''){
                $("#phone").css("border", "2px solid red");
            }else{
                $("#phone").css("border", "1px solid #ccc1c1");
            }
            if( address == ''){
                $("#address").css("border", "2px solid red");
            }else{
                $("#address").css("border", "1px solid #ccc1c1");
            }


            if( name != '' && phone != '' && address != ''){
                var invo = $("#Invo").val();
                $.ajax({
                    method: 'POST',
                    url: '../doneOrder.php',
                    dataType: "json",
                    data: {
                        invo: invo,
                        name: name,
                        phone:phone,
                        address:address,
                        note:note,
                    },
                    success: function(data) {
                        alert("تم إكمال الطلب بنجاح , شكراً لإختياركم افكادو عراق");
                        window.open("../index.php","_self");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // alert(JSON.stringify(jqXHR));
                        // alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            }
        }
    </script>
</body>

</html>