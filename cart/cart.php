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


if (isset($_GET['delete'])) {

	$delete = $_GET['delete'];
  
	$sql_delete="DELETE FROM `order_details` WHERE `order_details_id` = '$delete'";
	$quer_delete=mysqli_query($con, $sql_delete) or die(mysqli_error($con));


	header("location:cart.php");
  
}


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

if(isset($_POST['checkout'])){

	$total_final = 0;
	
	$all_amount_array   = $_POST['all_amount'];
	$item_id_array = $_POST['item_id'];
	$quantity_array = $_POST['quantity'];
	$limit = $_POST['count'];


	
	for ($i = 0; $i < $limit; $i++) {
		$item_id = $item_id_array[$i];
		$quantity = $quantity_array[$i];
		$all_amount = $all_amount_array[$i] ;

		

		if ($item_id != 0 &&  $quantity != 0) {

			$total_final += ($all_amount * $quantity ) ;

			$sqlupdate="UPDATE `order_details` SET `product_quantity` = '$quantity' WHERE `order_details_id` = '$item_id'";
			$queryUpdate=mysqli_query($con, $sqlupdate);
		}
	}


	$sqlupdateOrderPrice="UPDATE `order` SET `total_amount` = '$total_final' WHERE `order_num` = '$inv_no'";
	$querUpdateOrderPrice=mysqli_query($con, $sqlupdateOrderPrice);


	header("location:../checkout/index.php");

}







?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>cart</title>

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

        body,h1,h2,h3,h4,h5,h6,span,li,div,a,table,th,tr,td,p,button,.elementor-heading-title .elementor-size-default{
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
		@media (max-width: 768px){
			.woocommerce table.shop_table td.product-name, .woocommerce table.shop_table thead th.product-name, .woocommerce table.shop_table tfoot tr th {
				padding-left: 0px;
			}
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
					<h1 class="page-header_title" style="color: #ffffff; font-size: 48px; line-height: 52px;">Cart</h1>
					<div class="page-header_breadcrumbs" style="color: #a3a3a3; font-size: 16px; line-height: 24px;">
						<div class="breadcrumbs"><a href="../index.html" class="home">Home</a> <span
								class="divider"></span> <span class="current">Cart</span></div><!-- .breadcrumbs -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<main id="main" class="site-main">
		<div class="wgl-container">
			<div class="row ">
            <div id="main-content" class="wgl_col-8"><div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>
                <form class="woocommerce-cart-form" action="" method="post">
                    
                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $total = 0 ;
							$count = 0 ;
                            while( $row = mysqli_fetch_assoc($quer_pro)){
								$count++ ;
                                echo '
                                <tr class="woocommerce-cart-form__cart-item cart_item">
                                    <td class="product-name" data-title="Product">
                                        <h6>'.$row['product_name'].'</h6>
                                    </td>

                                    <td class="product-price" data-title="Price">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi style="color:#e25e33;">
                                                <span class="woocommerce-Price-currencySymbol"> د.ع </span>'.number_format($row['product_price']).'
												<input type="text" name="all_amount[]" value="'.$row['product_price'].'" style="display:none;"> 
                                            </bdi>
                                        </span>
                                    </td>

                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity number-input">
                                            <label class="screen-reader-text label-qty" for="quantity_613b8564127c5">Sweatshirt Gray quantity</label>
                                                <div class="quantity-wrapper">
                                                    <span class="minus"></span>
													<input type="text" name="count" value="'.$count.'" style="display:none;">
													<input type="text" name="item_id[]" value="'.$row['order_details_id'].'" style="display:none;">
                                                    <input type="number" id="" class="input-text qty text" step="1" min="0" max="999" name="quantity[]" value="'.$row['quantity'].'" title="Qty" placeholder="" inputmode="numeric">
                                                    <span class="plus"></span>
                                                </div>
                                        </div>
                                    </td>

                                    <td class="product-subtotal" data-title="Total">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi style="color:#e25e33;">
                                                <span class="woocommerce-Price-currencySymbol"> د.ع </span>'.number_format($row['product_price'] * $row['quantity']).'
                                            </bdi>
                                        </span>
                                    </td>
                                    <td class="product-remove">
                                        <a onclick=\'return confirm("هل انت متأكد من عملية الحذف ؟ ")\'	href="cart.php?delete=' . $row['order_details_id'] . '" class="remove" >×</a>
                                    </td>
                                </tr>
                                
                                ';

                                $total += ($row['product_price'] * $row['quantity'])  ;
                            }
                            
                            
                            ?>

                        </tbody>
                    </table>
                    




                </div>
                </div>
			

            <div class="wgl_col-4">
            <div class="cart-collaterals">
                    <div class="cart_totals" style="width: 100%;margin-top: 0px;">

                        
                        <h2>Cart totals</h2>

                        <table cellspacing="0" class="shop_table shop_table_responsive">

                            <tbody>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"> د.ع </span><?php echo number_format($total); ?></bdi></span></strong> </td>
								
								</tr>
								<tr class="order-total">
								   <td colspan="2" style="text-align: center !important;border-top: #e25f33 3px solid;">اسعار التوصيل</td> 	
								</tr>
								<tr class="order-total">
								    <td style="width: 59%;">مركز البصرة</td>
								    <td>د.ع 3,000 </td>
								</tr>
								<tr class="order-total">
								    <td style="width: 59%;" >اقضية ونواحي البصرة</td>
								    <td>د.ع 5,000 </td>
								</tr>
								<tr class="order-total">
								    <td style="width: 59%;">بغداد</td>
								    <td>8,000 د.ع </td>
								    
								</tr>
								<tr class="order-total">
								    <td style="width: 59%;">المحافظات</td>
								    <td>10,000 د.ع </td>
								    
								</tr>
                            </tbody>
                        </table>

                        <div class="wc-proceed-to-checkout">
                            <style>
                                .wgl-button:before {
                                    background-color: #f0f8ff00 !important;
                                    position: inherit;
                                }
                            </style>
                            <span class="wgl-button has-morph">
                                <button name="checkout"  type="submit" style="background-color: #e25e33;color:white;" class="checkout-button button" style="color: white;">
                                Proceed to checkout
							</button>
                            </span>
                        </div>

						</form>
                    </div>
                </div>
            </div>
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
</body>

</html>