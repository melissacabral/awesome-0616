<?php 
//hide this file if the post is behind a password
if( post_password_required() ){
	return; //jump to the end of the file
}

//separate the trackbacks from the comments and count them
$comments_by_type = separate_comments( $comments );
$comment_count 		= count($comments_by_type['comment']);
$trackback_count 	= count($comments_by_type['pings']);
 ?>


<section id="comments">
	<h3 class="comments-title">
	
	<?php if( $comment_count == 1 ){
			echo '1 Comment';
		}else{
			echo $comment_count . ' Comments';
		}  
	?> 

	<?php  if( comments_open() ){  ?>
		| <a href="#respond">Leave a Comment</a> </h3>
	<?php } //end if comments open ?> 

	<div class="commentlist">
		<?php wp_list_comments( array(
			'style' 		=> 'div',
			'avatar_size' 	=> 55,
			'type'			=> 'comment', //hide trackbacks and pingbacks
		) ); ?>
	</div>


	<div class="pagination">
		<?php previous_comments_link(); ?>
		<?php next_comments_link(); ?>
	</div>

	<?php comment_form(); ?>

</section>

