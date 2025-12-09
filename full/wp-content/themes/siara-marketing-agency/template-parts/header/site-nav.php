<?php
/**
 * Displays the site navigation.
 *
 * @package Siaracorporatebusiness
 */

$class     = siaracorporatebusiness_get_sticky_menu();
?>
<div class="site-header-row-wrapper siaracorporatebusiness-primary-bar-row<?php echo esc_attr( $class ); ?>">
	<div class="primary-bar-row-wrapper">
		<div class="uf-wrapper">
			<div class="siaracorporatebusiness-primary-bar-wrapper">

				<?php do_action( 'siaracorporatebusiness_primary_nav_items' ); ?>

				<div class="secondary-navigation siaracorporatebusiness-secondary-nav">
					<?php do_action( 'siaracorporatebusiness_secondary_nav_items' ); ?>
				</div>

			</div>
		</div>
	</div>
</div>