<section class="siaracorporatebusiness-section-services-wrapper">
    <div class="uf-wrapper">

        <?php
            $services_heading_text  = get_theme_mod( 'services_heading_text','Services Offer' );
            $services_heading  = get_theme_mod( 'services_heading','Experts In Business, Promote' );
        ?>

        <div class="services-header">
            <div class="heading">
                <h3><?php echo esc_html( $services_heading_text ); ?></h3>
                <h2><?php echo esc_html( $services_heading ); ?></h2>
            </div>
        </div>

        <?php
        $service_page_ids = array();
        for ( $i = 1; $i <= 6; $i++ ) {
            $page_id = get_theme_mod( 'services_page' . $i, 0 );
            if ( $page_id ) {
                $service_page_ids[] = absint( $page_id );
            }
        }

        $container_class = '';
        $column_class    = 'col-lg-4 col-md-6 col-sm-12';
        ?>

        <div class="siaracorporatebusiness-section-services<?php echo esc_attr( $container_class ); ?>">
            <div class="row g-4">

                <?php if ( ! empty( $service_page_ids ) ) :

                    foreach ( $service_page_ids as $page_id ) :
                        $service_page = get_post( $page_id );

                        if ( $service_page && 'page' === $service_page->post_type && 'publish' === $service_page->post_status ) :
                            $title     = esc_html( $service_page->post_title );
                            $permalink = get_permalink( $service_page );
                            $excerpt   = has_excerpt( $service_page ) ? wp_kses_post( $service_page->post_excerpt ) : wp_trim_words( apply_filters( 'the_content', $service_page->post_content ), 25, '&hellip;' );

                            $current_box_index = array_search( $page_id, $service_page_ids ) + 1;
                            $icon_class = get_theme_mod( 'services_page' . $current_box_index . '_icon', '' );
                            ?>
                            <div class="<?php echo esc_attr( $column_class ); ?>">
                                <div class="service-card" <?php if ( has_post_thumbnail( $service_page ) ) : ?>style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $service_page, 'full' ) ); ?>')"<?php endif; ?>>
                                    <div class="service-overlay"></div>
                                    <div class="service-content">
                                        <h3 class="service-title">
                                            <?php echo $title; ?>
                                        </h3>
                                        <div class="service-excerpt">
                                            <p><?php echo $excerpt; ?></p>
                                        </div>
                                        <div class="service-readmore">
                                            <a href="<?php echo esc_url( $permalink ); ?>" class="service-btn">
                                                <?php esc_html_e( 'Read More', 'siara-marketing-agency' ); ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                                                    <path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endif;
                    endforeach;

                    else :
                        // ✅ Static fallback services
                        $default_services = array(
                            array(
                                'title'   => 'Web Development',
                                'desc'    => 'Professional website development for businesses and startups.',
                                'image'   => get_template_directory_uri() . '/assets/images/services-default1.png',
                                'link'    => '#',
                            ),
                            array(
                                'title'   => 'Digital Marketing',
                                'desc'    => 'Boost your brand’s visibility and engagement online.',
                                'image'   => get_template_directory_uri() . '/assets/images/services-default2.png',
                                'link'    => '#',
                            ),
                            array(
                                'title'   => 'Graphic Design',
                                'desc'    => 'Creative and custom designs for all your branding needs.',
                                'image'   => get_template_directory_uri() . '/assets/images/services-default3.png',
                                'link'    => '#',
                            ),
                        );

                        foreach ( $default_services as $service ) : ?>
                            <div class="<?php echo esc_attr( $column_class ); ?>">
                                <div class="service-card" style="background-image: url('<?php echo esc_url( $service['image'] ); ?>')">
                                    <div class="service-overlay"></div>
                                    <div class="service-content">
                                        <h3 class="service-title">
                                            <?php echo esc_html( $service['title'] ); ?>
                                        </h3>
                                        <div class="service-excerpt">
                                            <p><?php echo esc_html( $service['desc'] ); ?></p>
                                        </div>
                                        <div class="service-readmore">
                                            <a href="<?php echo esc_url( $service['link'] ); ?>" class="service-btn">
                                                <?php esc_html_e( 'Read More', 'siara-marketing-agency' ); ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                                                    <path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                    endif;

                ?>
            </div>
        </div>
    </div>
</section>
