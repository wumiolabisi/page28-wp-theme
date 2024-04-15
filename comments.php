<?php
// Get only the approved comments
$args = array(
	'post_id' => get_the_ID(),
	'status'  => 'approve',
);
// The comment Query
$comments_query = new WP_Comment_Query();
$comments       = $comments_query->query($args);

// Comment Loop
if ($comments) :
	foreach ($comments as $comment) : ?>
		<div class="p28-approuved-comments">
			<p class="p28-txt-15071d p28-boldtxt"><?php echo $comment->comment_author; ?></p>
			<p class="p28-txt-15071d p28-smalltxt"><?php echo get_comment_date('D M j Y'); ?></p>
			<p class="p28-txt-15071d p28-comment-item">► <?php echo $comment->comment_content; ?>
			</p>
		</div>
	<?php
	endforeach;
else : ?>
	<p class="p28-txt-15071d">Pas de commentaire pour le moment.</p>
<?php
endif;
