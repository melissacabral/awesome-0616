<aside id="sidebar">
	
	<?php 
	if(is_tax()){
	?>

	<section class="widget products-view-all">
		<a href="<?php echo get_post_type_archive_link( 'product' ); ?>" class="button">
		&larr; Back to all Products
		</a>
	</section>

	<?php } //end if is tax ?>
	

	<section class="widget">
		<h3 class="widget-title">Brands we Carry:</h3>
		<ul>
			<?php 
			wp_list_categories( array(
				'taxonomy' 		=> 'brand',
				'title_li' 		=> '',
				'show_count'	=> true,
			) ); 
			?>
		</ul>
	</section>

	<section class="widget">
		<h3 class="widget-title">Filter by Feature:</h3>
		<ul>
			<?php 
			wp_list_categories( array(
				'taxonomy' 		=> 'feature',
				'title_li' 		=> '',
				'show_count'	=> true,
			) ); 
			?>
		</ul>
	</section>
</aside>