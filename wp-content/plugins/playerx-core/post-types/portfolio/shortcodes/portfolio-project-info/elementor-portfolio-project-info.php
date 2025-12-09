<?php
class ElementorEdgtfPortfolioProjectInfo extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_portfolio_project_info'; 
	}

	public function get_title() {
		return esc_html__( 'Portfolio Project Info', 'playerx-core' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-portfolio-project-info';
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
			'project_id',
			[
				'label'     => esc_html__( 'Selected Project', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'If you left this field empty then project ID will be of the current page', 'playerx-core' )
			]
		);

		$this->add_control(
			'project_info_type',
			[
				'label'     => esc_html__( 'Project Info Type', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'title' => esc_html__( 'Title', 'playerx-core'), 
					'category' => esc_html__( 'Category', 'playerx-core'), 
					'tag' => esc_html__( 'Tag', 'playerx-core'), 
					'author' => esc_html__( 'Author', 'playerx-core'), 
					'date' => esc_html__( 'Date', 'playerx-core'), 
					'image' => esc_html__( 'Featured Image', 'playerx-core')
				),
				'default' => 'title'
			]
		);

		$this->add_control(
			'project_info_title_type_tag',
			[
				'label'     => esc_html__( 'Project Title Tag', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Set title tag for project title element', 'playerx-core' ),
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'h1' => esc_html__( 'h1', 'playerx-core'), 
					'h2' => esc_html__( 'h2', 'playerx-core'), 
					'h3' => esc_html__( 'h3', 'playerx-core'), 
					'h4' => esc_html__( 'h4', 'playerx-core'), 
					'h5' => esc_html__( 'h5', 'playerx-core'), 
					'h6' => esc_html__( 'h6', 'playerx-core'), 
					'p' => esc_html__( 'p', 'playerx-core')
				),
				'default' => 'h4',
				'condition' => [
					'project_info_type' => array( 'title' )
				]
			]
		);

		$this->add_control(
			'project_info_title',
			[
				'label'     => esc_html__( 'Project Info Label', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Add project info label before project info element/s', 'playerx-core' )
			]
		);

		$this->add_control(
			'project_info_title_tag',
			[
				'label'     => esc_html__( 'Project Info Label Tag', 'playerx-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx-core'), 
					'h1' => esc_html__( 'h1', 'playerx-core'), 
					'h2' => esc_html__( 'h2', 'playerx-core'), 
					'h3' => esc_html__( 'h3', 'playerx-core'), 
					'h4' => esc_html__( 'h4', 'playerx-core'), 
					'h5' => esc_html__( 'h5', 'playerx-core'), 
					'h6' => esc_html__( 'h6', 'playerx-core'), 
					'p' => esc_html__( 'p', 'playerx-core')
				),
				'default' => 'h4',
				'condition' => [
					'project_info_title!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {
		$args   = array(
			'project_id'                  => '',
			'project_info_type'           => 'title',
			'project_info_title_type_tag' => 'h4',
			'project_info_title'          => '',
			'project_info_title_tag'      => 'h4'
		);

		$params = $this->get_settings_for_display();

		$project_info_type                     = ! empty( $params['project_info_type'] ) ? $params['project_info_type'] : $args['project_info_type'];
		$params['project_id']                  = ! empty( $params['project_id'] ) ? $params['project_id'] : get_the_ID();
		$params['project_info_title_type_tag'] = ! empty( $params['project_info_title_type_tag'] ) ? $params['project_info_title_type_tag'] : $args['project_info_title_type_tag'];
		$project_info_title_tag                = ! empty( $params['project_info_title_tag'] ) ? $params['project_info_title_tag'] : $args['project_info_title_tag'];
		$project_info_title                    = ! empty( $params['project_info_title'] ) ? $params['project_info_title'] : $args['project_info_title_tag'];
		
		$html = '<div class="edgtf-portfolio-project-info">';
		if ( ! empty( $project_info_title ) ) {
			$html .= '<' . esc_attr( $project_info_title_tag ) . ' class="edgtf-ppi-label">' . esc_html( $project_info_title ) . '</' . esc_attr( $project_info_title_tag ) . '>';
		}
		
		switch ( $project_info_type ) {
			case 'title':
				$html .= $this->getItemTitleHtml( $params );
				break;
			case 'category':
				$html .= $this->getItemCategoryHtml( $params );
				break;
			case 'tag':
				$html .= $this->getItemTagHtml( $params );
				break;
			case 'author':
				$html .= $this->getItemAuthorHtml( $params );
				break;
			case 'date':
				$html .= $this->getItemDateHtml( $params );
				break;
			case 'image':
				$html .= $this->getItemImageHtml( $params );
				break;
			default:
				$html .= $this->getItemTitleHtml( $params );
				break;
		}
		
		$html .= '</div>';

		echo playerx_edge_get_module_part($html);
	}

	public function getItemTitleHtml( $params ) {
		$html       = '';
		$project_id = $params['project_id'];
		$title      = get_the_title( $project_id );
		$title_tag  = $params['project_info_title_type_tag'];
		
		if ( ! empty( $title ) ) {
			$html = '<' . esc_attr( $title_tag ) . ' itemprop="name" class="edgtf-ppi-title entry-title">';
				$html .= '<a itemprop="url" href="' . esc_url( get_the_permalink( $project_id ) ) . '">' . esc_html( $title ) . '</a>';
			$html .= '</' . esc_attr( $title_tag ) . '>';
		}
		
		return $html;
	}

	public function getItemCategoryHtml( $params ) {
		$html       = '';
		$project_id = $params['project_id'];
		$categories = wp_get_post_terms( $project_id, 'portfolio-category' );
		
		if ( ! empty( $categories ) ) {
			$html = '<div class="edgtf-ppi-category">';
			foreach ( $categories as $cat ) {
				$html .= '<a itemprop="url" class="edgtf-ppi-category-item" href="' . esc_url( get_term_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
			}
			$html .= '</div>';
		}
		
		return $html;
	}

	public function getItemTagHtml( $params ) {
		$html       = '';
		$project_id = $params['project_id'];
		$tags       = wp_get_post_terms( $project_id, 'portfolio-tag' );
		
		if ( ! empty( $tags ) ) {
			$html = '<div class="edgtf-ppi-tag">';
			foreach ( $tags as $tag ) {
				$html .= '<a itemprop="url" class="edgtf-ppi-tag-item" href="' . esc_url( get_term_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
			}
			$html .= '</div>';
		}
		
		return $html;
	}

	public function getItemAuthorHtml( $params ) {
		$html         = '';
		$project_id   = $params['project_id'];
		$project_post = get_post( $project_id );
		$autor_id     = $project_post->post_author;
		$author       = get_the_author_meta( 'display_name', $autor_id );
		
		if ( ! empty( $author ) ) {
			$html = '<div class="edgtf-ppi-author">' . esc_html( $author ) . '</div>';
		}
		
		return $html;
	}

	public function getItemDateHtml( $params ) {
		$html       = '';
		$project_id = $params['project_id'];
		$date       = get_the_time( get_option( 'date_format' ), $project_id );
		
		if ( ! empty( $date ) ) {
			$html = '<div class="edgtf-ppi-date">' . esc_html( $date ) . '</div>';
		}
		
		return $html;
	}

	public function getItemImageHtml( $params ) {
		$html       = '';
		$project_id = $params['project_id'];
		$image      = get_the_post_thumbnail( $project_id, 'full' );
		
		if ( ! empty( $image ) ) {
			$html = '<a itemprop="url" class="edgtf-ppi-image" href="' . esc_url( get_the_permalink( $project_id ) ) . '">' . $image . '</a>';
		}
		
		return $html;
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ElementorEdgtfPortfolioProjectInfo() );
