<?php// Get only the approved comments
$args = array(
	'status' => 'approved',
);

// The comment Query
$comments_query = new WP_Comment_Query();
$comments       = $comments_query->query( $args );

// Comment Loop
if ( $comments ) {
	foreach ( $comments as $comment ) {
		echo '<p class="p28-txt-cbbdff">' . $comment->comment_content . '</p>';
	}
} else {

    var_dump($comments);
	echo '<p class="p28-txt-cbbdff">Pas de commentaire pour le moment.</p>';
}?>