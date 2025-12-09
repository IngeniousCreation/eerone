<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News Brick Kit
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-meta">
		<?php
			/* Author */
			news_brick_kit_posted_by();
			/* Date */
			news_brick_kit_posted_on();
			/* Comment */
			$comments_num = '<span class="comments-context">' .get_comments_number(). '</span>';
			echo '<a class="post-comments-num" href="'. esc_url( get_the_permalink() ) .'#commentform"><i class="far fa-comment"></i>' . $comments_num . '</a>';
		?>
	</div>
	<?php news_brick_kit_post_thumbnail(); ?>
	<div class="content-wrap">

		<div class="single-post-content">
			<div class="entry-content">
				<?php
					the_content();
		
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'news-brick-kit' ),
							'after'  => '</div>',
						)
					);
				?>
			</div><!-- .entry-content -->
			<footer class="entry-footer">
				<?php
					$tag_count = get_tags([ 'object_ids' => get_the_ID() ]);
					if( count( $tag_count ) != 0 ) :
						news_brick_kit_tags_list();
					endif;
						news_brick_kit_entry_footer();
				?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

