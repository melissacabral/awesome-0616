<?php 
/*
Template Name: Automatic Sitemap

This is a custom page template. apply it to any page in the admin panel! yay
*/
get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<?php the_post_thumbnail( 'banner' ); //image size created in functions ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<div class="entry-content">
				<?php the_content(); ?>

				<section class="onethird">
					<h3>Pages</h3>
					<ul>
						<?php wp_list_pages( array(
							'title_li' => '',
							'sort_column' => 'post_title',
							'exclude' 	=> '1710',
						) ); ?>
					</ul>
				</section>

				<section class="onethird">
					<h3>Categories</h3>
					<ul>
						<?php wp_list_categories( array(
							'title_li' => '',
							'show_count' => 1,
							'orderby' => 'count',  //sorted by popularity
							'order'  => 'DESC',  //most popular first
						) ); ?> 
					</ul>
				</section>

				<section class="onethird">
					<h3>Feeds</h3>
					<ul>
						<li><a href="<?php bloginfo( 'rss2_url' ); ?>">
							All Posts</a></li>
						<li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>">
							All Comments</a></li>
					</ul>


					<h3>Posts</h3>
					<ul>
						<?php wp_get_archives( array(
							'type' => 'alpha', //or 'postbypost'
						) ); ?>
					</ul>
				</section>

			</div>
			
					
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_footer(); //include footer.php ?>