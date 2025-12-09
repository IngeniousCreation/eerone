<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Nurse
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<a class="skip-link screen-reader-text" href="#content_navigator">
    <?php esc_html_e( 'Skip to content', 'skt-nurse' ); ?>
</a>

<?php
$showpagebanner = get_theme_mod('inner_page_banner_option', 1);
$showpostbanner = get_theme_mod('inner_post_banner_option', 1);
$pagethumb = get_theme_mod('inner_page_banner_thumb');
$postthumb = get_theme_mod('inner_post_banner_thumb');
$header_phonenumbertext = esc_html(get_theme_mod('header_phonenumbertext'));
$hideheaderphone = esc_html(get_theme_mod('hide_header_phonenumber', 1));
?>

<div id="main-set">
    <div class="header-main-area">
        <div class="header">
            <div class="container">
            	<div class="navigarea">
                <div class="logo">
                    <?php skt_nurse_the_custom_logo(); ?>
                    <div id="logo-main">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <h2 class="site-title"><?php bloginfo('name'); ?></h2>
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>

                <div id="navigation">
                    <nav id="site-navigation" class="main-navigation">
                        <button type="button" class="menu-toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container'      => 'ul',
                            'menu_id'        => 'primary',
                            'menu_class'     => 'primary-menu menu'
                        ));
                        ?>
                    </nav>
                </div>
				</div>
 				<div class="header-right-infos">
				<?php if( $hideheaderphone == '') { ?>
                <div class="header-phone-number">
                    <?php if (!empty($header_phonenumbertext)) { ?>
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/header-phn-icon.png">
                        <span><?php esc_html_e('Call Anytime','skt-nurse');?></span>
                        <?php echo esc_html($header_phonenumbertext); ?>
                    <?php }?>
                </div>
                <?php } ?> 
                 <div class="clear"></div>
            </div>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <?php
    // Inner Page Banner
    if (!is_home() && !is_front_page() && is_page()) : ?>
        <div class="inner-banner-thumb">
            <?php if (empty($showpagebanner)) :
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } elseif (!empty($pagethumb)) { ?>
                    <img src="<?php echo esc_url($pagethumb); ?>" />
                <?php } ?>
            <?php endif; ?>
            <div class="banner-container"><h1><?php the_title(); ?></h1></div>
        </div>

    <?php
    // Inner Post Banner
    elseif (!is_home() && !is_front_page() && is_single() && get_post_type() === 'post') : ?>
        <div class="inner-banner-thumb">
            <?php if (empty($showpostbanner)) :
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } elseif (!empty($postthumb)) { ?>
                    <img src="<?php echo esc_url($postthumb); ?>" />
                <?php } ?>
            <?php endif; ?>
            <div class="banner-container"><h1><?php the_title(); ?></h1></div>
        </div>

    <?php
    // Archive/Category/Shop Banner
    elseif (is_category() || is_archive()) : ?>
        <div class="inner-banner-thumb">
            <?php if (empty($showpostbanner) && !empty($postthumb)) : ?>
                <img src="<?php echo esc_url($postthumb); ?>" />
            <?php endif; ?>
            <div class="banner-container">
                <h1>
                    <?php
                    if (class_exists('WooCommerce') && is_shop()) {
                        woocommerce_page_title();
                    } else {
                        the_archive_title();
                    }
                    ?>
                </h1>
            </div>
        </div>
    <?php endif; ?>

    <div class="clear"></div>
</div>