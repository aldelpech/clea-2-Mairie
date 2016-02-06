<?php
/**
 * Template Name: maquette accueil Mairie
 */


get_header(); // Loads the header.php template. ?>

<!--  begin sidebar-before-front-page area -->

<?php get_sidebar( 'before-front-page' );  ?>

<!--  end  sidebar-before-front-page area -->

<?php

//Protect against arbitrary paged values
// http://codex.wordpress.org/Function_Reference/paginate_links
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$loop = new WP_Query(
	array(
		'post_type' 		=> 'post',
		'posts_per_page' 	=> 8,
		'paged'				=> $paged,
		'ignore_sticky_posts' => true, /* will not show featured posts first */
		'orderby' => 'date', /* 'modified' last modified 'date' would order by published date */
		'order' => 'DESC',         /* 'ASC' */
		'tax_query' => array(
			array(
				'taxonomy' => 'post_format',
				'field' 	=> 'slug',
				'terms' 	=> array(
								'post-format-aside',
								'post-format-audio',
								'post-format-chat',
								'post-format-gallery',
								'post-format-image', 
								'post-format-link', 
								'post-format-quote',
								'post-format-status',
								'post-format-video'
							),
				'operator' 	=> 'NOT IN'
			)
		),
		'category__not_in'	=> '72' /* exclude category "AIDE" */
	)
); ?>

<main <?php hybrid_attr( 'content' ); ?>>

<h3 class="widget-title font-headlines articles">Les derniers articles</h3>

<?php if ( $loop->have_posts() ) : // Checks if any posts were found. ?>

	<?php while ( $loop->have_posts() ) : // Begins the loop through found posts. ?>

		<?php $loop->the_post(); // Loads the post data. ?>

			<?php get_the_image( array( 'size' => 'stargazer-full', 'order' => array( 'featured', 'attachment' ) ) ); ?>

			<header class="entry-header">

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

				<div class="entry-byline">
					<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
					<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
					<?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', '' ); ?>
					<?php edit_post_link(); ?>
				</div><!-- .entry-byline -->

			</header><!-- .entry-header -->

			<div <?php hybrid_attr( 'entry-summary' ); ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

	<?php endwhile; // End found posts loop. ?>
	
<?php endif; // End check for posts. ?>

<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Tous les articles du Blog</a>

<?php wp_reset_query(); ?>	
</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>