<?php

namespace PlayerxCore\CPT\Shortcodes\Match;

use PlayerxCore\Lib;
use PlayerxCore\CPT\Match\Lib as MatchLib;

class ElementorEdgtfMatchSmallList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_match_small_list'; 
	}

	public function get_title() {
		return esc_html__( 'Match Small List', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-match-small-list';
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
		$this->end_controls_section();

		$this->start_controls_section(
			'layout_options',
			[
				'label' => esc_html__( 'Layout Options', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'skin',
			[
				'label'     => esc_html__( 'Style', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'dark' => esc_html__( 'Dark', 'playerx-core'), 
					'light' => esc_html__( 'Light', 'playerx-core')
				),
				'default' => 'dark'
			]
		);

		$this->add_control(
			'team_title_tag',
			[
				'label'     => esc_html__( 'Team Name Tag', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'playerx-core'), 
					'h2' => esc_html__( 'h2', 'playerx-core'), 
					'h3' => esc_html__( 'h3', 'playerx-core'), 
					'h4' => esc_html__( 'h4', 'playerx-core'), 
					'h5' => esc_html__( 'h5', 'playerx-core'), 
					'h6' => esc_html__( 'h6', 'playerx-core')
				),
				'default' => 'h5'
			]
		);

		$this->add_control(
			'show_categories',
			[
				'label'     => esc_html__( 'Show Categories', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is No', 'playerx-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'show_date',
			[
				'label'     => esc_html__( 'Show Date', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is Yes', 'playerx-core' ),
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'show_result',
			[
				'label'     => esc_html__( 'Show Result', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Default value is Yes', 'playerx-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'playerx-core'), 
					'yes' => esc_html__( 'Yes', 'playerx-core')
				),
				'default' => 'yes'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'query_options',
			[
				'label' => esc_html__( 'Query Options', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'order_by',
			[
				'label'     => esc_html__( 'Order By', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'menu_order' => esc_html__( 'Menu Order', 'playerx-core'), 
					'title' => esc_html__( 'Title', 'playerx-core'), 
					'date' => esc_html__( 'Date', 'playerx-core')
				),
				'default' => 'menu_order',
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'playerx-core'), 
					'DESC' => esc_html__( 'DESC', 'playerx-core')
				),
				'default' => 'ASC',
			]
		);

		$this->add_control(
			'category',
			[
				'label'     => esc_html__( 'One-Category Match List', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'playerx-core' )
			]
		);

		$this->add_control(
			'status',
			[
				'label'     => esc_html__( 'One-Status Match List', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Choose one status slug (leave empty for showing all statuses)', 'playerx-core' ),
				'options' => array(
					'' => esc_html__( '', 'playerx-core'), 
					'to_be_played' => esc_html__( 'To Be Played', 'playerx-core'), 
					'in_progress' => esc_html__( 'In Progress', 'playerx-core'), 
					'finished' => esc_html__( 'Finished', 'playerx-core'), 
					'canceled' => esc_html__( 'Canceled', 'playerx-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Number of Matches Per Page', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter -1 to show all', 'playerx-core' ),
				'default' => '-1'
			]
		);

		$this->add_control(
			'selected_projects',
			[
				'label'     => esc_html__( 'Show Only Projects with Listed IDs', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'playerx-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$args = array(
			'skin'            => 'dark',
			'team_title_tag'  => 'h5',
			'show_categories' => 'no',
			'show_date'       => 'yes',
			'show_result'     => 'yes',
			'order_by'        => 'menu_order',
			'order'           => 'ASC',
			'number'          => '-1',
		);

		$params = shortcode_atts( $args, $this->get_settings_for_display() );

		$matchQuery = MatchLib\MatchQuery::getInstance();

		$queryResults            = $matchQuery->buildQueryObject( $params );
		$params['query_results'] = $queryResults;

		$holder_classes = $this->getMatchHolderClasses( $params );

		$html = '';
		$html .= '<div ' . playerx_edge_get_class_attribute( $holder_classes ) . ' >';

		if ( $queryResults->have_posts() ) {
			while ( $queryResults->have_posts() ) {
				$queryResults->the_post();

				$new_params                   = $this->getTeamsOptions( $params );
				$new_params['team_title_tag'] = $params['team_title_tag'];

				$html .= playerx_core_get_cpt_shortcode_module_template_part( 'match', 'match-small-list', 'match', '', $new_params );
			}

		} else {
			$html .= '<p>' . esc_html_e( 'Sorry, no posts matched your criteria.', 'playerx-core' ) . '</p>';
		}

		wp_reset_postdata();

		$html .= '</div>'; //close edgtf-match-list-holder

		echo playerx_edge_get_module_part($html);
	}

	public function getItemCategoriesHtml( $params ) {
		$id = get_the_ID();

		$category_html = '';
		if ( $params['show_categories'] == 'yes' ) {

			$categories    = wp_get_post_terms( $id, 'match-category' );
			$category_html = '<span class="edgtf-match-category-holder">';
			$k             = 1;
			foreach ( $categories as $cat ) {
				$category_html .= '<span>' . $cat->name . '</span>';
				if ( count( $categories ) != $k ) {
					$category_html .= ', ';
				}
				$k ++;
			}
			$category_html .= '</span>';
		}

		return $category_html;
	}

	public function getItemDateHtml( $params ) {
		$id   = get_the_ID();
		$html = '';

		if ( $params['show_date'] == 'yes' ) {

			$date = get_post_meta( $id, 'edgtf_match_date_meta', true );

			if ( ! empty( $date ) ) {
				$dateobj = date_create_from_format( 'Y-m-d', $date );
				$date = date_format( $dateobj, 'jS M Y' );
				$time = get_post_meta( $id, 'edgtf_match_time_meta', true );

				$html = '<span class="edgtf-match-date">' . $date . ', ' . $time . '</span>';
			}
		}

		return $html;
	}

	public function getItemLink( $params ) {

		$match_link_array = array();

		$id           = get_the_ID();
		$match_link   = get_permalink( $id );
		$match_target = '';

		$match_link_array['href']   = $match_link;
		$match_link_array['target'] = $match_target;

		return $match_link_array;

	}

	public function getMatchHolderClasses( $params ) {

		$classes = array();

		$classes[] = 'edgtf-match-small-list-holder';

		if ( $params['skin'] != '' ) {
			$classes[] = 'edgtf-match-skin-' . $params['skin'];
		}

		return implode( ' ', $classes );

	}

	public function getMatchItemClasses( $params ) {

		$classes = array();

		$status = get_post_meta( $id = get_the_ID(), 'edgtf_match_status_meta', true );

		if ( $status ) {
			$classes[] = 'edgtf-match-status-' . $status;
		}

		return implode( ' ', $classes );

	}

	public function getVSImageURL( $params ) {

		$url = '';

		$status = get_post_meta( get_the_ID(), 'edgtf_match_status_meta', true );

		if ( $status == 'finished' ) {
			$url = PLAYERX_CORE_ASSETS_URL_PATH . '/img/vs_finished.png';
		} else if ( $params['skin'] == 'light' ) {
			$url = PLAYERX_CORE_ASSETS_URL_PATH . '/img/vs_light.png';
		} else {
			$url = PLAYERX_CORE_ASSETS_URL_PATH . '/img/vs_dark.png';
		}

		return $url;

	}

	private function getTeamsOptions( $params ) {

		$new_params = array();

		$id                         = get_the_ID();
		$new_params['item_classes'] = $this->getMatchItemClasses( $params );
		$new_params['link_atts']    = $this->getItemLink( $params );
		$new_params['vs_image']     = $this->getVSImageURL( $params );

		$new_params['status']         = get_post_meta( $id, 'edgtf_match_status_meta', true );
		$new_params['category']       = $this->getItemCategoriesHtml( $params );
		$new_params['date']           = $this->getItemDateHtml( $params );
		$new_params['team_one_name']  = get_post_meta( $id, 'edgtf_match_team_one_name_meta', true );
		$new_params['team_two_name']  = get_post_meta( $id, 'edgtf_match_team_two_name_meta', true );
		$new_params['team_one_image'] = get_post_meta( $id, 'edgtf_match_team_one_image_meta', true );
		$new_params['team_two_image'] = get_post_meta( $id, 'edgtf_match_team_two_image_meta', true );

		$new_params['result'] = '';
		if ( $params['show_result'] == 'yes' ) {
			$new_params['result'] = get_post_meta( $id, 'edgtf_match_result_meta', true );
		}

		$new_params['stream'] = get_post_meta( $id, 'edgtf_match_stream_link', true );


		return $new_params;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfMatchSmallList() );
