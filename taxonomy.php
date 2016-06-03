<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>

		<h2 class="archive-title">
			<?php if(is_tax( 'brand' )){
					echo 'Products by Brand: ';
				}else{
					echo 'Products by Feature: ';
				}  

				single_term_title(); ?>

		</h2>

		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'thumbnail' ); //featured image ?>
			</a>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<div class="entry-content">
				<?php the_terms( get_the_id(), 'brand' ); ?>

				<?php the_excerpt(); ?>

				<?php 
				//if the product has a price field, show it
				$price = get_post_meta( get_the_id(), 'Price', true );
				if($price){ 
				?>
				<span class="product-price"><?php echo $price; ?></span>
				<?php } //end if price ?>

			</div>
					
		</article><!-- end post -->

		<?php endwhile; ?>

		<section class="pagination">
			<?php 
			//check to see if this version of WP supports numbered pagination
			if( function_exists( 'the_posts_pagination' ) ){
				the_posts_pagination( array(
					'mid_size' => 3, //how many pages in the middle
					'next_text' => 'Next Page &rarr;',
				) );
			}else{
				previous_posts_link( '&larr; Newer Posts' ); 
				next_posts_link( 'Older Posts &rarr;' ); 
			}
			?>
		</section>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar('shop'); //include sidebar-shop.php ?>
<?php get_footer(); //include footer.php ?>