<?php

namespace PlayerxCore\CPT\Shortcodes\Match;

use PlayerxCore\Lib;
use PlayerxCore\CPT\Match\Lib as MatchLib;

class ElementorEdgtfMatchList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_match_list'; 
	}

	public function get_title() {
		return esc_html__( 'Match List', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-match-list';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	protected function register_controls() {

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
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( '', 'playerx-core'), 
					'h2' => esc_html__( 'h2', 'playerx-core'), 
					'h3' => esc_html__( 'h3', 'playerx-core'), 
					'h4' => esc_html__( 'h4', 'playerx-core'), 
					'h5' => esc_html__( 'h5', 'playerx-core'), 
					'h6' => esc_html__( 'h6', 'playerx-core')
				),
				'default' => 'h4'
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
				'description' => esc_html__( 'Default value is Yes', 'playerx-core' ),
				'options' => array(
					'yes' => esc_html__( 'Yes', 'playerx-core'), 
					'no' => esc_html__( 'No', 'playerx-core')
				),
				'default' => 'yes'
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
			'show_load_more',
			[
				'label'     => esc_html__( 'Show Load More', 'playerx-core' ),
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

		$this->start_controls_section(
			'developer_tools',
			[
				'label' => esc_html__( 'Developer Tools', 'playerx-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'shortcode_snippet',
			array(
				'label'   => esc_html__( 'Show Shortcode Snippet', 'playerx-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'no',
				'options' => array(
					'no'  => esc_html__( 'No', 'playerx-core' ),
					'yes' => esc_html__( 'Yes', 'playerx-core' ),
				),
			)
		);

		$this->end_controls_section();
	}
	public function render() {
		$args = array(
			'skin'              => 'dark',
			'title_tag'         => 'h4',
			'team_title_tag'    => 'h5',
			'show_categories'   => 'yes',
			'show_date'         => 'yes',
			'show_load_more'    => 'no',
			'show_result'       => 'yes',
			'order_by'          => 'menu_order',
			'order'             => 'ASC',
			'number'            => '-1',
			'category'          => '',
			'status'            => '',
			'selected_projects' => '',
			'shortcode_snippet' => 'no',
		);
		$params = shortcode_atts( $args, $this->get_settings_for_display() );

		if ( isset( $params['shortcode_snippet'] ) && 'yes' === $params['shortcode_snippet'] ) {
			echo $this->get_shortcode_snippet( $this, array_filter( $params ) );
		} elseif ( isset( $params['content'] ) ) { // Handle nested shortcodes
			echo $this->render( $params, $params['content'] );
		} else {
			$matchQuery = MatchLib\MatchQuery::getInstance();

			$queryResults            = $matchQuery->buildQueryObject( $params );
			$params['query_results'] = $queryResults;

			$holder_classes = $this->getMatchHolderClasses( $params );
			$dataAtts       = $this->getDataAtts( $params );
			$dataAtts       .= ' data-max-num-pages = ' . $queryResults->max_num_pages;

			$html = '<div class="edgtf-match-list-holder-outer';

			if ( $params['show_load_more'] == 'yes' ) {
				$html .= ' edgtf-match-load-more';
			}
			$html .= '">';

			$html .= '<div ' . playerx_edge_get_class_attribute( $holder_classes ) . ' ' . $dataAtts . '>';

			if ( $queryResults->have_posts() ) {
				while ( $queryResults->have_posts() ) {
					$queryResults->the_post();

					$new_params                   = $this->getTeamsOptions( $params );
					$new_params['title_tag']      = $params['title_tag'];
					$new_params['team_title_tag'] = $params['team_title_tag'];

					$html .= playerx_core_get_cpt_shortcode_module_template_part( 'match', 'match-list', 'match', '', $new_params );
				}

			} else {
				$html .= '<p>' . esc_html_e( 'Sorry, no posts matched your criteria.', 'playerx-core' ) . '</p>';
			}

			$html .= '</div>'; //close edgtf-match-list-holder

			if ( $params['show_load_more'] == 'yes' ) {
				$html .= playerx_core_get_cpt_shortcode_module_template_part( 'match', 'match-list', 'load-more-template', '', $params );
			}

			wp_reset_postdata();

			$html .= '</div>'; // close edgtf-match-list-holder-outer

			echo playerx_edge_get_module_part($html);

		} // snippet check close
	}

	public function loadMoreMatches() {
		$shortcodeParams = $this->getShortcodeParamsFromPost();

		$html         = '';
		$matchQuery   = MatchLib\MatchQuery::getInstance();
		$queryResults = $matchQuery->buildQueryObject( $shortcodeParams );

		if ( $queryResults->have_posts() ) {
			while ( $queryResults->have_posts() ) {
				$queryResults->the_post();

				$new_params                   = $this->getTeamsOptions( $shortcodeParams );
				$new_params['title_tag']      = $shortcodeParams['title_tag'];
				$new_params['team_title_tag'] = $shortcodeParams['team_title_tag'];


				$html .= playerx_core_get_cpt_shortcode_module_template_part( 'match', 'match-list', 'match', '', $new_params );
			}

			wp_reset_postdata();
		} else {
			$html .= '<p>' . esc_html__( 'Sorry, no posts matched your criteria.', 'playerx-core' ) . '</p>';
		}

		$returnObj = array(
			'html' => $html,
		);

		echo json_encode( $returnObj );
		exit;
	}

	private function getShortcodeParamsFromPost() {
		$shortcodeParams = array();

		if ( ! empty( $_POST['orderBy'] ) ) {
			$shortcodeParams['order_by'] = $_POST['orderBy'];
		}

		if ( ! empty( $_POST['order'] ) ) {
			$shortcodeParams['order'] = $_POST['order'];
		}

		if ( ! empty( $_POST['number'] ) ) {
			$shortcodeParams['number'] = $_POST['number'];
		}

		if ( ! empty( $_POST['titleTag'] ) ) {
			$shortcodeParams['title_tag'] = $_POST['titleTag'];
		}

		if ( ! empty( $_POST['teamTitleTag'] ) ) {
			$shortcodeParams['team_title_tag'] = $_POST['teamTitleTag'];
		}

		if ( ! empty( $_POST['showCategories'] ) ) {
			$shortcodeParams['show_categories'] = $_POST['showCategories'];
		}

		if ( ! empty( $_POST['showDate'] ) ) {
			$shortcodeParams['show_date'] = $_POST['showDate'];
		}

		if ( ! empty( $_POST['category'] ) ) {
			$shortcodeParams['category'] = $_POST['category'];
		}

		if ( ! empty( $_POST['status'] ) ) {
			$shortcodeParams['status'] = $_POST['status'];
		}

		if ( ! empty( $_POST['selectedProjects'] ) ) {
			$shortcodeParams['selected_projects'] = $_POST['selectedProjects'];
		}

		if ( ! empty( $_POST['showLoadMore'] ) ) {
			$shortcodeParams['show_load_more'] = $_POST['showLoadMore'];
		}

		if ( ! empty( $_POST['skin'] ) ) {
			$shortcodeParams['skin'] = $_POST['skin'];
		}

		if ( ! empty( $_POST['showResult'] ) ) {
			$shortcodeParams['show_result'] = $_POST['show_result'];
		}

		if ( ! empty( $_POST['nextPage'] ) ) {
			$shortcodeParams['next_page'] = $_POST['nextPage'];
		}

		return $shortcodeParams;
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
				$date = date_format( $dateobj, 'jS F Y' );
				$time = get_post_meta( $id, 'edgtf_match_time_meta', true );

				$html = '<span class="edgtf-match-date">' . $date . ', ' . $time . '</span>';
			}
		}

		return $html;
	}

	public function getDataAtts( $params ) {

		$data_attr          = array();
		$data_return_string = '';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		if ( ! empty( $paged ) ) {
			$data_attr['data-next-page'] = $paged + 1;
		}

		if ( ! empty( $params['order_by'] ) ) {
			$data_attr['data-order-by'] = $params['order_by'];
		}

		if ( ! empty( $params['order'] ) ) {
			$data_attr['data-order'] = $params['order'];
		}

		if ( ! empty( $params['number'] ) ) {
			$data_attr['data-number'] = $params['number'];
		}

		if ( ! empty( $params['category'] ) ) {
			$data_attr['data-category'] = $params['category'];
		}

		if ( ! empty( $params['status'] ) ) {
			$data_attr['data-status'] = $params['status'];
		}

		if ( ! empty( $params['selected_projectes'] ) ) {
			$data_attr['data-selected-projects'] = $params['selected_projectes'];
		}

		if ( ! empty( $params['title_tag'] ) ) {
			$data_attr['data-title-tag'] = $params['title_tag'];
		}

		if ( ! empty( $params['team_title_tag'] ) ) {
			$data_attr['data-team-title-tag'] = $params['team_title_tag'];
		}

		if ( ! empty( $params['show_categories'] ) ) {
			$data_attr['data-show-categories'] = $params['show_categories'];
		}

		if ( ! empty( $params['show_date'] ) ) {
			$data_attr['data-show-date'] = $params['show_date'];
		}

		if ( ! empty( $params['skin'] ) ) {
			$data_attr['data-skin'] = $params['skin'];
		}

		if ( ! empty( $params['show_result'] ) ) {
			$data_attr['data-show-result'] = $params['show_result'];
		}

		if ( ! empty( $params['show_load_more'] ) ) {
			$data_attr['data-show-load-more'] = $params['show_load_more'];
		}


		foreach ( $data_attr as $key => $value ) {
			if ( $key !== '' ) {
				$data_return_string .= $key . '= ' . esc_attr( $value ) . ' ';
			}
		}


		return $data_return_string;
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

		$classes[] = 'edgtf-match-list-holder';

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

	private function get_shortcode_snippet( $shortcode_object, $params ) {
		$atts = array();

		if ( empty( $shortcode_object ) || ! is_object( $shortcode_object ) ) {
			return '';
		}

		if ( ! empty( $params ) ) {
			foreach ( $params as $key => $value ) {
				if ( is_array( $value ) || 'shortcode_snippet' === $key ) {
					continue;
				}

				$atts[] = $key . '="' . esc_attr( $value ) . '"';
			}
		}

		return sprintf(
			'<textarea rows="3" readonly>[%s %s]</textarea>',
			$shortcode_object->get_name(),
			implode( ' ', $atts )
		);
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfMatchList() );
