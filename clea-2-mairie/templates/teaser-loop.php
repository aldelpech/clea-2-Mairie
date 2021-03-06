<!-- Ceci est une copie d'un des templates de Shortcodes ultimates
	Il est modifié pour inclure les résumés et des classes spécifiques (pour le css)
-->

<!-- was "su-posts su-posts-teaser-loop" -->
<div class="al-category-loop">
	<?php
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>
				<article class="post bloc-article">
				
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="img-hyperlink" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
					<?php endif; ?>
					<header class="entry-header">
						<h3 class="entry-title font-headlines" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" itemprop="url"><?php the_title(); ?></a></h3>
					</header><!-- .entry-header -->
		
					<div class="entry-summary" itemprop="description">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
										
				</article>				
				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'su' ) . '</h4>';
		}
	?>
</div>

