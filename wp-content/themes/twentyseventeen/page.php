<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="page-wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

				if ( is_page( 'media-gallery' )) {
					echo '<h1>';
					echo the_field('content_title');
					echo '</h1>';
					// Media Gallery Page
				    $categories = get_categories( array(
					    'orderby' => 'name',
					    'order'   => 'ASC',
					    'exclude' => 3
					) );
					 
					foreach( $categories as $category ) {
					    echo '<div class="media-category"><p>' . $category->name . '</p><i class="material-icons accordion-status closed">add</i><i class="material-icons accordion-status open">remove</i></div>';
					    $category_id = get_cat_ID($category->name);
					    $args = array(
						  'category' => $category_id
						);
						 
						$category_posts = get_posts( $args );

						if ($category_posts) {
							echo '<div class="posts-wrap">';
							foreach ($category_posts as $post):
								setup_postdata($post); ?>
								<div class="col-3">
									<?php if (get_field('youtube_link')) {
										echo '<div class="iframe-wrap">'; echo the_field('youtube_link'); echo '</div>';
									} else if (get_field('image')) {
										echo '<img src="'; echo the_field('image'); echo '">';
									} ?>
									
									<h3 class="media-title"><?php the_title(); ?></h3>
									<p class="media-subtitle"><?php the_field('post_subtitle');?></p>
									<p class="media-content"><?php echo get_the_content();?></p>
								</div>
							<?php
							endforeach;
							echo '</div>';
						}
					}
				}  else {
					// All other pages
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
