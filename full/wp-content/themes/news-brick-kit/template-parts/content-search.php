<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News Brick Kit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="content-wrap">
		<?php
			$figureClass = 'post-thumb';
			if( ! has_post_thumbnail() ) $figureClass .= ' no-thumb';
		?>
		<figure class="<?php echo esc_attr( $figureClass ); ?>">
			<?php if( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			<?php
			endif;
			news_brick_kit_get_post_categories( get_the_ID() );
			?>
		</figure>
		<div class="post-element">
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
			?>
			<div class="entry-meta">
				<?php
					news_brick_kit_posted_by();
					news_brick_kit_posted_on();

					$comments_num = '<span class="comments-context">' .get_comments_number(). '</span>';
					echo '<a class="post-comments-num" href="'. esc_url( get_the_permalink() ) .'#commentform"><i class="far fa-comment"></i>' . $comments_num . '</a>';
				?>
			</div><!-- .entry-meta -->
			<div class="entry-content">
				<?php
					the_excerpt();
		
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'news-brick-kit' ),
							'after'  => '</div>',
						)
					);
				?>
			</div><!-- .entry-content -->
			<div class="read-more-btn">
				<a href="<?php the_permalink(); ?>" class="post-read-more">
					<?php echo esc_html__( 'Read More', 'news-brick-kit' ); ?>
					<i class="fas fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<footer class="entry-footer">
		<?php news_brick_kit_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
