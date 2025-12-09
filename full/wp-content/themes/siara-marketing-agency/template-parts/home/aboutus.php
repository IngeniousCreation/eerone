<section class="siaracorporatebusiness-section-aboutus-wrapper">
    <div class="uf-wrapper">
        <div class="row">
            <!-- Left Side - Image -->
            <div class="col-lg-6 col-md-6 col-sm-12 image">
                <?php
                    $about_us_image_url = get_theme_mod( 'aboutus_image' );
                    $default_about_us_image_url = get_template_directory_uri() . '/assets/images/placeholder.png';

                    // Check if the Customizer setting has a valid image URL.
                    // If not, fall back to the predefined default image.
                    $display_image_url = ! empty( $about_us_image_url ) ? esc_url( $about_us_image_url ) : esc_url( $default_about_us_image_url );

                    // You might also want an alt text for accessibility.
                    // This could be another Customizer setting, or a static text.
                    $about_us_alt_text = get_theme_mod( 'aboutus_image_alt_text', __( 'About Us Section Image', 'siara-marketing-agency' ) );
                ?>

                <div class="img">
                    <img src="<?php echo $display_image_url; ?>" alt="<?php echo esc_attr( $about_us_alt_text ); ?>">
                </div>
            </div>

            <!-- Right Side - Content -->
            <div class="col-lg-6 col-md-6 col-sm-12 content">
                <div class="about--content">
                    <?php
                        $aboutus_subtitle_text  = get_theme_mod( 'aboutus_subtitle_text','About Us' );
                        $aboutus_title_text  = get_theme_mod( 'aboutus_title_text','Where Expertise Meets Exceptional Results' );
                        $aboutus_box1_heading  = get_theme_mod( 'aboutus_box1_heading','Property Acquisition' );
                        $aboutus_box1_description  = get_theme_mod( 'aboutus_box1_description','There are many variations of passages of Lorem Ipsum' );
                        $aboutus_box2_heading  = get_theme_mod( 'aboutus_box2_heading','Market Analysis' );
                        $aboutus_box2_description  = get_theme_mod( 'aboutus_box2_description','There are many variations of passages of Lorem Ipsum' );
                        $aboutus_description_text  = get_theme_mod( 'aboutus_description_text','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some look even slightly believable.' );
                        $aboutus_list1_text  = get_theme_mod( 'aboutus_list1_text','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.' );
                        $aboutus_list2_text  = get_theme_mod( 'aboutus_list2_text','Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.' );
                        $aboutus_button_text  = get_theme_mod( 'aboutus_button_text','Get Stared' );
                        $aboutus_button_link  = get_theme_mod( 'aboutus_button_link','#' );
                    ?>
                    <!-- About Us Heading -->
                    <div class="heading">
                        <h3><?php echo esc_html( $aboutus_subtitle_text ); ?></h3>
                        <h2><?php echo esc_html( $aboutus_title_text ); ?></h2>
                    </div>

                    <!-- Features with Icons -->
                    <div class="features-section">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#0daea8" viewBox="0 0 256 256">
                                    <path d="M240,208H224V136l2.34,2.34A8,8,0,0,0,237.66,127L139.31,28.68a16,16,0,0,0-22.62,0L18.34,127a8,8,0,0,0,11.32,11.31L32,136v72H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM48,120l80-80,80,80v88H160V152a8,8,0,0,0-8-8H104a8,8,0,0,0-8,8v56H48Zm96,88H112V160h32Z"/>
                                </svg>
                            </div>
                            <div class="feature-content">
                                <h4><?php echo esc_html( $aboutus_box1_heading ); ?></h4>
                                <p><?php echo esc_html( $aboutus_box1_description ); ?></p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#0daea8" viewBox="0 0 256 256">
                                    <path d="M232,208a8,8,0,0,1-8,8H32a8,8,0,0,1-8-8V48a8,8,0,0,1,16,0V156.69l50.34-50.35a8,8,0,0,1,11.32,0L128,132.69,180.69,80H160a8,8,0,0,1,0-16h40a8,8,0,0,1,8,8V112a8,8,0,0,1-16,0V91.31L133.66,149.66a8,8,0,0,1-11.32,0L96,123.31l-56,56V200H224A8,8,0,0,1,232,208Z"/>
                                </svg>
                            </div>
                            <div class="feature-content">
                                <h4><?php echo esc_html( $aboutus_box2_heading ); ?></h4>
                                <p><?php echo esc_html( $aboutus_box2_description ); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="description">
                        <p><?php echo esc_html( $aboutus_description_text ); ?></p>
                    </div>

                    <!-- Checked Bullet Points -->
                    <div class="bullet-points">
                        <div class="bullet-item">
                            <div class="check-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0daea8" viewBox="0 0 256 256">
                                    <path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"/>
                                </svg>
                            </div>
                            <p><?php echo esc_html( $aboutus_list1_text ); ?></p>
                        </div>
                        <div class="bullet-item">
                            <div class="check-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#0daea8" viewBox="0 0 256 256">
                                    <path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"/>
                                </svg>
                            </div>
                            <p><?php echo esc_html( $aboutus_list2_text ); ?></p>
                        </div>
                    </div>

                    <!-- Contact Us Button -->
                    <div class="contact-button">
                        <a href="<?php echo esc_html( $aboutus_button_link ); ?>" class="contact-us-btn">
                            <?php echo esc_html( $aboutus_button_text ); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>