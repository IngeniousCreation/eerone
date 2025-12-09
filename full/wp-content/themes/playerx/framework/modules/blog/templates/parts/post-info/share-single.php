<?php
$share_type = isset( $share_type ) ? $share_type : 'list';
?>
<div class="edgtf-blog-share">
	<?php echo playerx_edge_get_social_share_html( array( 'type' => $share_type ) ); ?>
</div>
