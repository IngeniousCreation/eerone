<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    
    
	<?php
	/**
	 * playerx_edge_action_header_meta hook
	 *
	 * @see playerx_edge_header_meta() - hooked with 10
	 * @see playerx_edge_user_scalable_meta - hooked with 10
	 * @see playerx_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'playerx_edge_action_header_meta' );
	
	wp_head(); ?>
	
	
</head>
	
<meta name="publication-media-verification"content="1ebe9089d92647b3b88294de308625d5">
	
<meta name="google-site-verification" content="bbHSZOsYyL6IpkbrSTUCvUvK67zaQKrnroIpc-yQhks" />
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-VQ9RNVTKND"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-VQ9RNVTKND'); </script>
		
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * playerx_edge_action_after_body_tag hook
	 *
	 * @see playerx_edge_get_side_area() - hooked with 10
	 * @see playerx_edge_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'playerx_edge_action_after_body_tag' ); ?>

    <div class="edgtf-wrapper">
        <div class="edgtf-wrapper-inner">
            <?php
            /**
             * playerx_edge_action_after_wrapper_inner hook
             *
             * @see playerx_edge_get_header() - hooked with 10
             * @see playerx_edge_get_mobile_header() - hooked with 20
             * @see playerx_edge_back_to_top_button() - hooked with 30
             * @see playerx_edge_get_header_minimal_full_screen_menu() - hooked with 40
             * @see playerx_edge_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'playerx_edge_action_after_wrapper_inner' ); ?>
	        
            <div class="edgtf-content" <?php playerx_edge_content_elem_style_attr(); ?>>
                <div class="edgtf-content-inner">