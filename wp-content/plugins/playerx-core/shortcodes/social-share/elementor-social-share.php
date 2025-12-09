<?php
class ElementorEdgtfSocialShare extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_social_share'; 
	}

	public function get_title() {
		return esc_html__( 'Social Share', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-social-share';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'type',
			[
				'label'     => esc_html__( 'Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'list' => esc_html__( 'List', 'playerx-core'), 
					'dropdown' => esc_html__( 'Dropdown', 'playerx-core'), 
					'text' => esc_html__( 'Text', 'playerx-core')
				),
				'default' => 'list'
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label'     => esc_html__( 'Icons Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'font-awesome' => esc_html__( 'Font Awesome', 'playerx-core'), 
					'font-elegant' => esc_html__( 'Font Elegant', 'playerx-core')
				),
				'default' => 'font-awesome',
				'condition' => [
					'type' => array( 'list', 'dropdown' )
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label'     => esc_html__( 'Social Share Title', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type' => array( 'list', 'text' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		//Is social share enabled
		$params['enable_social_share'] = ( playerx_edge_options()->getOptionValue( 'enable_social_share' ) === 'yes' ) ? true : false;
		
		//Is social share enabled for post type
		$post_type         = get_post_type();
		$params['enabled'] = ( playerx_edge_options()->getOptionValue( 'enable_social_share_on_' . $post_type ) == 'yes' ) ? true : false;
		
		//Social Networks Data
		$params['networks'] = $this->getSocialNetworksParams( $params );
		
		if ( $params['enable_social_share'] ) {
			if ( $params['enabled'] ) {
				echo playerx_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'social-share', '', $params );
			}
		}
	}

	public function getSocialNetworks() {
		$this->socialNetworks = array(
			'facebook',
			'twitter',
			'linkedin',
			'tumblr',
			'pinterest',
			'vk'
		);

		return $this->socialNetworks;
	}

	private function getSocialNetworksParams( $params ) {
		$networks   = array();
		$icons_type = $params['icon_type'];
		$type       = $params['type'];
		
		foreach ( $this->getSocialNetworks() as $net ) {
			$html = '';
			
			if ( playerx_edge_options()->getOptionValue( 'enable_' . $net . '_share' ) == 'yes' ) {
				$image                 = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				$params                = array(
					'name' => $net,
					'type' => $type
				);

				$params['link']        = $this->getSocialNetworkShareLink( $net, $image );

				if ($type == 'text') {
					$params['text']    = $this->getSocialNetworkText( $net );
				} else {
					$params['icon']    = $this->getSocialNetworkIcon( $net, $icons_type );
				}

				$params['custom_icon'] = ( playerx_edge_options()->getOptionValue( $net . '_icon' ) ) ? playerx_edge_options()->getOptionValue( $net . '_icon' ) : '';
				
				$html = playerx_core_get_shortcode_module_template_part( 'templates/parts/network', 'social-share', '', $params );
			}
			
			$networks[ $net ] = $html;
		}
		
		return $networks;
	}

    private function getSocialNetworkShareLink($net, $image) {
        switch ($net) {
            case 'facebook':
                if (wp_is_mobile()) {
                    $link = 'window.open(\'https://m.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '\');';
                } else {
                    $link = 'window.open(\'https://www.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');';
                }
                break;
            case 'twitter':
                $count_char = (isset($_SERVER['https'])) ? 23 : 22;
                $twitter_via = (playerx_edge_options()->getOptionValue('twitter_via') !== '') ? ' via ' . playerx_edge_options()->getOptionValue('twitter_via') . ' ' : '';
                $link =  'window.open(\'https://twitter.com/intent/tweet?text=' . urlencode( playerx_edge_the_excerpt_max_charlength( $count_char ) . $twitter_via ) . ' ' . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');';
                break;
            case 'google_plus':
                $link = 'popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
                break;
            case 'linkedin':
                $link = 'popUp=window.open(\'https://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
                break;
            case 'tumblr':
                $link = 'popUp=window.open(\'https://www.tumblr.com/share/link?url=' . urlencode(get_permalink()) . '&amp;name=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
                break;
            case 'pinterest':
                $link = 'popUp=window.open(\'https://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . sanitize_title(get_the_title()) . '&amp;media=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
                break;
            case 'vk':
                $link = 'popUp=window.open(\'https://vkontakte.ru/share.php?url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '&amp;image=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
                break;
            default:
                $link = '';
        }

        return $link;
    }

	private function getSocialNetworkIcon( $net, $type ) {
		switch ( $net ) {
			case 'facebook':
				$icon = ( $type == 'font-elegant' ) ? 'social_facebook' : 'fab fa-facebook';
				break;
			case 'twitter':
				$icon = ( $type == 'font-elegant' ) ? 'social_twitter' : 'fab fa-twitter-square';
				break;
			case 'linkedin':
				$icon = ( $type == 'font-elegant' ) ? 'social_linkedin' : 'fab fa-linkedin';
				break;
			case 'tumblr':
				$icon = ( $type == 'font-elegant' ) ? 'social_tumblr' : 'fab fa-tumblr';
				break;
			case 'pinterest':
				$icon = ( $type == 'font-elegant' ) ? 'social_pinterest' : 'fab fa-pinterest';
				break;
			case 'vk':
				$icon = 'fab fa-vk';
				break;
			default:
				$icon = '';
		}
		
		return $icon;
	}

	private function getSocialNetworkText( $net ) {
		switch ( $net ) {
			case 'facebook':
				$text = esc_html__( 'fb', 'playerx-core');
				break;
			case 'twitter':
				$text = esc_html__( 'tw', 'playerx-core');
				break;
			case 'google_plus':
				$text = esc_html__( 'g+', 'playerx-core');
				break;
			case 'linkedin':
				$text = esc_html__( 'lnkd', 'playerx-core');
				break;
			case 'tumblr':
				$text = esc_html__( 'tmb', 'playerx-core');
				break;
			case 'pinterest':
				$text = esc_html__( 'pin', 'playerx-core');
				break;
			case 'vk':
				$text = esc_html__( 'vk', 'playerx-core');
				break;
			default:
				$text = '';
		}
		
		return $text;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfSocialShare() );
