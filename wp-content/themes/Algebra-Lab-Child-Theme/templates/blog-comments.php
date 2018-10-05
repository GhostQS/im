<?php
/**
 * Blog-layout template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      1.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<ul class="comments-list-author">

    <?php
        $queried_object = get_queried_object();
        $author_email = get_the_author_meta( 'user_email', $queried_object->ID );
				global $user_ID;


        $args = array(
            'author_email' => $author_email,
						'status' => 'approve',
						'user_id' => get_current_user_id(),
        );
        $comments = get_comments($args);
				?>
				<h3>Broj odobrenih ideja: <?php
					$args1 = array(
						'author_email' => $author_email,
						'status' => 'approve',
						'user_id' => get_current_user_id(),
						'count' => true
				);
					$comments1 = get_comments($args1);
					echo $comments1;?>
			</h3>

				<?php
        foreach($comments as $comment) :
            echo '<div class="comments-list-author-li"><h2 class="idea-title">Naslov izazova: <a href=" ' . get_permalink( $comment->comment_post_ID ) . ' " rel="external nofollow" title=" ' . get_the_title( $comment->comment_post_ID ) . ' ">' . get_the_title( $comment->comment_post_ID ) . '</a></h2><br /><strong>Datum prijave ideje: </strong>' . $comment->comment_date . '<br /><li><strong>Opis ideje: </strong>' . $comment->comment_content . '</li><li><strong>ID izazova: </strong>' . get_field("challenge_ide", $comment->comment_post_ID) . '</li></div>';
        endforeach;
    ?>
</ul><?php

wp_reset_postdata();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
