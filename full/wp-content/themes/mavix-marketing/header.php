<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mavix Marketing
 */
/**
* Hook - mavix_marketing_action_doctype.
*
* @hooked mavix_marketing_doctype -  10
*/
do_action( 'mavix_marketing_action_doctype' );
?>
<head>
<?php
/**
* Hook - mavix_marketing_action_head.
*
* @hooked mavix_marketing_head -  10
*/
do_action( 'mavix_marketing_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - mavix_marketing_action_before.
*
* @hooked mavix_marketing_page_start - 10
*/
do_action( 'mavix_marketing_action_before' );

/**
*
* @hooked mavix_marketing_header_start - 10
*/
do_action( 'mavix_marketing_action_before_header' );

/**
*
*@hooked mavix_marketing_site_branding - 10
*@hooked mavix_marketing_header_end - 15 
*/
do_action('mavix_marketing_action_header');

/**
*
* @hooked mavix_marketing_content_start - 10
*/
do_action( 'mavix_marketing_action_before_content' );

/**
 * Banner start
 * 
 * @hooked mavix_marketing_banner_header - 10
*/
do_action( 'mavix_marketing_banner_header' );  
