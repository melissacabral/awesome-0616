<?php get_header(); //include header.php ?>

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
				<?php wp_link_pages(); ?>
			</div>
			
					
		</article><!-- end post -->

		<?php endwhile; ?>

		<?php comments_template(); ?>
		
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar( 'staticpage' ); //include sidebar-staticpage.php ?>
<?php get_footer(); //include footer.php ?>