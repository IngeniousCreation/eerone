<?php
//about theme info
add_action( 'admin_menu', 'skt_nurse_abouttheme' );
function skt_nurse_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-nurse'), esc_html__('About Theme', 'skt-nurse'), 'edit_theme_options', 'skt_nurse_guide', 'skt_nurse_mostrar_guide');   
} 
//guidline for about theme
function skt_nurse_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-nurse'); ?>
		   </div>
          <p><?php esc_html_e('SKT Nurse WordPress Theme is perfect for caregivers. It is suitable for attendants and healthcare providers who want a professional online presence. Designed for medical assistants, care assistants, and paramedical workers, it offers clean layouts, easy customization, and responsive design. Whether you aim to attend to patients, care for the elderly, or support community health programs, this theme helps you share your services, book appointments, and build trust with visitors.','skt-nurse'); ?></p>
          <a href="<?php echo esc_url(SKT_NURSE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="<?php esc_attr_e('Free Vs Pro', 'skt-nurse'); ?>" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_NURSE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-nurse'); ?></a> | 
				<a href="<?php echo esc_url(SKT_NURSE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-nurse'); ?></a> | 
				<a href="<?php echo esc_url(SKT_NURSE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-nurse'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_NURSE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="<?php esc_attr_e('SKT Themes', 'skt-nurse'); ?>" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>