<?php
class PlayerxEdgeElementorProductInfo extends \Elementor\Widget_Base {

	public function get_name() {
		return 'edgtf_product_info';
	}

	public function get_title() {
		return esc_html__( 'Product Info', 'playerx' );
	}

	public function get_icon() {
		return 'playerx-elementor-custom-icon playerx-elementor-product-info';
	}

	public function get_categories() {
		return [ 'edge' ];
	}

	public function get_style_depends() {
		return array(
			'playerx-edge-woo'
		);
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'playerx' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'product_id',
			[
				'label'     => esc_html__( 'Selected Product', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'If you left this field empty then product ID will be of the current page', 'playerx' )
			]
		);

		$this->add_control(
			'product_info_type',
			[
				'label'     => esc_html__( 'Product Info Type', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'title' => esc_html__( 'Title', 'playerx'),
					'featured_image' => esc_html__( 'Featured Image', 'playerx'),
					'category' => esc_html__( 'Category', 'playerx'),
					'excerpt' => esc_html__( 'Excerpt', 'playerx'),
					'price' => esc_html__( 'Price', 'playerx'),
					'rating' => esc_html__( 'Rating', 'playerx'),
					'add_to_cart' => esc_html__( 'Add To Cart', 'playerx'),
					'tag' => esc_html__( 'Tag', 'playerx'),
					'author' => esc_html__( 'Author', 'playerx'),
					'date' => esc_html__( 'Date', 'playerx')
				),
				'default' => 'title'
			]
		);

		$this->add_control(
			'featured_image_size',
			[
				'label'     => esc_html__( 'Featured Image Proportions', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'full' => esc_html__( 'Original', 'playerx'),
					'playerx_edge_image_square' => esc_html__( 'Square', 'playerx'),
					'playerx_edge_image_landscape' => esc_html__( 'Landscape', 'playerx'),
					'playerx_edge_image_portrait' => esc_html__( 'Portrait', 'playerx'),
					'medium' => esc_html__( 'Medium', 'playerx'),
					'large' => esc_html__( 'Large', 'playerx'),
					'woocommerce_single' => esc_html__( 'Shop Single', 'playerx'),
					'woocommerce_thumbnail' => esc_html__( 'Shop Thumbnail', 'playerx')
				),
				'default' => 'full',
				'condition' => [
					'product_info_type' => array( 'featured_image' )
				]
			]
		);

		$this->add_control(
			'add_to_cart_skin',
			[
				'label'     => esc_html__( 'Add To Cart Skin', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'white' => esc_html__( 'White', 'playerx'),
					'dark' => esc_html__( 'Dark', 'playerx')
				),
				'default' => '',
				'condition' => [
					'product_info_type' => array( 'add_to_cart' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'product_info_style',
			[
				'label' => esc_html__( 'Product Info Style', 'playerx' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'product_info_color',
			[
				'label'     => esc_html__( 'Product Info Color', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'product_info_type' => array( 'title', 'category', 'excerpt', 'price', 'rating', 'tag', 'author', 'date' )
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Set title tag for product title element', 'playerx' ),
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'h1' => esc_html__( 'h1', 'playerx'),
					'h2' => esc_html__( 'h2', 'playerx'),
					'h3' => esc_html__( 'h3', 'playerx'),
					'h4' => esc_html__( 'h4', 'playerx'),
					'h5' => esc_html__( 'h5', 'playerx'),
					'h6' => esc_html__( 'h6', 'playerx'),
					'p' => esc_html__( 'p', 'playerx')
				),
				'default' => 'h5',
				'condition' => [
					'product_info_type' => array( 'title' )
				]
			]
		);

		$this->add_control(
			'category_tag',
			[
				'label'     => esc_html__( 'Category Tag', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Set category tag for product category element', 'playerx' ),
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'h1' => esc_html__( 'h1', 'playerx'),
					'h2' => esc_html__( 'h2', 'playerx'),
					'h3' => esc_html__( 'h3', 'playerx'),
					'h4' => esc_html__( 'h4', 'playerx'),
					'h5' => esc_html__( 'h5', 'playerx'),
					'h6' => esc_html__( 'h6', 'playerx')
				),
				'default' => '',
				'condition' => [
					'product_info_type' => array( 'category' )
				]
			]
		);

		$this->add_control(
			'add_to_cart_size',
			[
				'label'     => esc_html__( 'Add To Cart Size', 'playerx' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'playerx'),
					'small' => esc_html__( 'Small', 'playerx'),
					'medium' => esc_html__( 'Medium', 'playerx'),
					'large' => esc_html__( 'Large', 'playerx')
				),
				'default' => '',
				'condition' => [
					'product_info_type' => array( 'playerx' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		extract($params);

		$params['product_id'] = !empty($params['product_id']) ? $params['product_id'] : get_the_ID();
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : 'h2';
		$params['category_tag'] = !empty($params['category_tag']) ? $params['category_tag'] : '';

		$params['product_info_style'] = $this->getProductInfoStyle($params);

		$html = '';
		$html .= '<div class="edgtf-product-info">';

		switch ($product_info_type) {
			case 'title':
				$html .= $this->getItemTitleHtml($params);
				break;
			case 'featured_image':
				$html .= $this->getItemFeaturedImageHtml($params);
				break;
			case 'category':
				$html .= $this->getItemCategoryHtml($params);
				break;
			case 'excerpt':
				$html .= $this->getItemExcerptHtml($params);
				break;
			case 'price':
				$html .= $this->getItemPriceHtml($params);
				break;
			case 'rating':
				$html .= $this->getItemRatingHtml($params);
				break;
			case 'add_to_cart':
				$html .= $this->getItemAddToCartHtml($params);
				break;
			case 'tag':
				$html .= $this->getItemTagHtml($params);
				break;
			case 'author':
				$html .= $this->getItemAuthorHtml($params);
				break;
			case 'date':
				$html .= $this->getItemDateHtml($params);
				break;
			default:
				$html .= $this->getItemTitleHtml($params);
				break;
		}

		$html .= '</div>';

		echo playerx_edge_get_module_part($html);
	}

	private function getProductInfoStyle( $params ) {
		$styles = array();

		if ( ! empty( $params['product_info_color'] ) ) {
			$styles[] = 'color: ' . $params['product_info_color'];
		}

		return $styles;
	}

	public function getItemTitleHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$title              = get_the_title( $product_id );
		$title_tag          = $params['title_tag'];
		$product_info_style = $params['product_info_style'];

		if ( ! empty( $title ) ) {
			$html = '<' . esc_attr( $title_tag ) . ' itemprop="name" class="edgtf-pi-title entry-title" ' . playerx_edge_get_inline_style( $product_info_style ) . '>';
			$html .= '<a itemprop="url" href="' . esc_url( get_the_permalink( $product_id ) ) . '">' . esc_html( $title ) . '</a>';
			$html .= '</' . esc_attr( $title_tag ) . '>';
		}

		return $html;
	}

	public function getItemFeaturedImageHtml( $params ) {
		$html                = '';
		$product_id          = $params['product_id'];
		$featured_image_size = ! empty( $params['featured_image_size'] ) ? $params['featured_image_size'] : 'full';
		$featured_image      = get_the_post_thumbnail( $product_id, $featured_image_size );

		if ( ! empty( $featured_image ) ) {
			$html = '<a itemprop="url" class="edgtf-pi-image" href="' . esc_url( get_the_permalink( $product_id ) ) . '">' . $featured_image . '</a>';
		}

		return $html;
	}

	public function getItemCategoryHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$categories         = wp_get_post_terms( $product_id, 'product_cat' );
		$product_info_style = $params['product_info_style'];

		if ( ! empty( $categories ) ) {
			$html .= '<div class="edgtf-pi-category">';
			foreach ( $categories as $cat ) {
				if ( ! empty( $params['category_tag'] ) ) {
					$html .= '<' . esc_attr( $params['category_tag'] ) . ' ' . playerx_edge_get_inline_style( $product_info_style ) . '>';
					$html .= '<a itemprop="url" class="edgtf-pi-category-item" href="' . esc_url( get_term_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
					$html .= '</' . esc_attr( $params['category_tag'] ) . '>';
				} else {
					$html .= '<a itemprop="url" class="edgtf-pi-category-item" href="' . esc_url( get_term_link( $cat->term_id ) ) . '" ' . playerx_edge_get_inline_style( $product_info_style ) . '>' . esc_html( $cat->name ) . '</a>';
				}
			}
			$html .= '</div>';
		}

		return $html;
	}

	public function getItemExcerptHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$excerpt            = get_the_excerpt( $product_id );
		$product_info_style = $params['product_info_style'];

		if ( ! empty( $excerpt ) ) {
			$html = '<div class="edgtf-pi-excerpt"><p itemprop="description" class="edgtf-pi-excerpt-item" ' . playerx_edge_get_inline_style( $product_info_style ) . '>' . esc_html( $excerpt ) . '</p></div>';
		}

		return $html;
	}

	public function getItemPriceHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$product            = wc_get_product( $product_id );
		$product_info_style = $params['product_info_style'];

		if ( $price_html = $product->get_price_html() ) {
			$html = '<div class="edgtf-pi-price" ' . playerx_edge_get_inline_style( $product_info_style ) . '>' . $price_html . '</div>';
		}

		return $html;
	}

	public function getItemRatingHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$product            = wc_get_product( $product_id );
		$product_info_style = $params['product_info_style'];

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$average = $product->get_average_rating();

			$html = '<div class="edgtf-pi-rating" title="' . sprintf( esc_attr__( "Rated %s out of 5", "playerx" ), $average ) . '" ' . playerx_edge_get_inline_style( $product_info_style ) . '><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"></span></div>';
		}

		return $html;
	}

	public function getItemAddToCartHtml( $params ) {
		$product_id = $params['product_id'];
		$product    = wc_get_product( $product_id );

		$button_classes = 'button add_to_cart_button ajax_add_to_cart edgtf-btn edgtf-btn-solid';

		if ( ! $product->is_in_stock() ) {
			$button_classes = 'button ajax_add_to_cart edgtf-btn edgtf-btn-solid edgtf-out-of-stock';
		} else if ( $product->get_type() === 'variable' ) {
			$button_classes = 'button product_type_variable add_to_cart_button edgtf-btn edgtf-btn-solid';
		} else if ( $product->get_type() === 'external' ) {
			$button_classes = 'button product_type_external edgtf-btn edgtf-btn-solid';
		}

		if ( ! empty( $params['add_to_cart_skin'] ) ) {
			$button_classes .= ' edgtf-' . $params['add_to_cart_skin'] . '-skin edgtf-btn-custom-hover-color edgtf-btn-custom-hover-bg edgtf-btn-custom-border-hover';
		}

		if ( ! empty( $params['add_to_cart_size'] ) ) {
			$button_classes .= ' edgtf-btn-' . $params['add_to_cart_size'];
		}

		$html = '<div class="edgtf-pi-add-to-cart">';
		$html .= apply_filters( 'playerx_edge_filter_product_info_add_to_cart_link',
			sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product_id ),
				esc_attr( $product->get_sku() ),
				esc_attr( $button_classes ),
				esc_html( $product->add_to_cart_text() )
			),
			$product );
		$html .= '</div>';

		return $html;
	}

	public function getItemTagHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$tags               = wp_get_post_terms( $product_id, 'product_tag' );
		$product_info_style = $params['product_info_style'];

		if ( ! empty( $tags ) ) {
			$html = '<div class="edgtf-pi-tag">';
			foreach ( $tags as $tag ) {
				$html .= '<a itemprop="url" class="edgtf-pi-tag-item" href="' . esc_url( get_term_link( $tag->term_id ) ) . '" ' . playerx_edge_get_inline_style( $product_info_style ) . '>' . esc_html( $tag->name ) . '</a>';
			}
			$html .= '</div>';
		}

		return $html;
	}

	public function getItemAuthorHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$product_post       = get_post( $product_id );
		$autor_id           = $product_post->post_author;
		$author             = get_the_author_meta( 'display_name', $autor_id );
		$product_info_style = $params['product_info_style'];

		if ( ! empty( $author ) ) {
			$html = '<div class="edgtf-pi-author" ' . playerx_edge_get_inline_style( $product_info_style ) . '>' . esc_html( $author ) . '</div>';
		}

		return $html;
	}

	public function getItemDateHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$date               = get_the_time( get_option( 'date_format' ), $product_id );
		$product_info_style = $params['product_info_style'];

		if ( ! empty( $date ) ) {
			$html = '<div class="edgtf-pi-date" ' . playerx_edge_get_inline_style( $product_info_style ) . '>' . esc_html( $date ) . '</div>';
		}

		return $html;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PlayerxEdgeElementorProductInfo() );
