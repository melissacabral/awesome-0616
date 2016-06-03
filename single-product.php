<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<?php the_post_thumbnail( 'large' ); ?>

			<div class="entry-content">
				<?php the_terms( get_the_id(), 'brand', 
						'<span class="fancy">Brand:</span>' ); ?>

				<?php the_terms( get_the_id(), 'feature', 
						'<br><span class="fancy">Feature:</span>' ); ?>

				<?php the_meta(); //all the custom fields ?>

				<?php the_content(); ?>
			</div>
				
		</article><!-- end post -->

		<?php endwhile; ?>

		<section class="pagination">
			<?php 
			previous_post_link('%link', '&larr; %title'); //1 older post
			next_post_link('%link', '%title &rarr;'); //1 newer post
			?>
		</section>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar('shop'); //include sidebar-shop.php ?>
<?php get_footer(); //include footer.php ?>