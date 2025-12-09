<?php
/**
 * The template for displaying the home page.
 *
 * @package SKT Nurse
 */

get_header(); 
?>

<div class="container">
  <div id="content_navigator">
    <div class="page_content">

      <section class="site-main">
        <div class="blog-post">

          <?php
          // Check if the front page is set to display posts
          if ( 'posts' === get_option( 'show_on_front' ) ) {

            if ( have_posts() ) :
              while ( have_posts() ) : the_post();
                // Load content template based on post format
                get_template_part( 'content', get_post_format() );
              endwhile;

              // Pagination
              the_posts_pagination( array(
                'mid_size'   => 2,
                'prev_text'  => esc_html__( 'Back', 'skt-nurse' ),
                'next_text'  => esc_html__( 'Next', 'skt-nurse' ),
              ) );
            else :
              get_template_part( 'no-results', 'index' );
            endif;

          } else {
            // Static page content
            if ( have_posts() ) :
              while ( have_posts() ) : the_post();
                the_content();
              endwhile;

              the_posts_pagination( array(
                'mid_size'   => 2,
                'prev_text'  => esc_html__( 'Back', 'skt-nurse' ),
                'next_text'  => esc_html__( 'Next', 'skt-nurse' ),
              ) );
            else :
              get_template_part( 'no-results', 'index' );
            endif;
          }
          ?>

        </div><!-- .blog-post -->
      </section>

      <?php get_sidebar(); ?>
      <div class="clear"></div>

    </div><!-- .page_content -->
  </div><!-- #content_navigator -->
</div><!-- .container -->

<?php get_footer(); ?>