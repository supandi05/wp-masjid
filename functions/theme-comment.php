<?php

/**
 * Menampilkan list daftar komentar
 *
 */
 
function commentslist($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<table>
				<tr>
					<td>
			    		<?php if(get_avatar($comment)) { ?>
					    	<?php echo get_avatar($comment, 80); ?>
							<?php } else { ?>
							     <img src="<?php echo get_template_directory_uri(); ?>/images/avatar.png"/>
						<?php } ?>
					</td>
					<td>
				    	<div class="comment-meta">
							<?php printf(__('<p class="comment-author"><span>%s</span></p>'), get_comment_author_link()) ?>
							<?php printf(__('<p class="comment-date">%s</p>'), get_comment_date('l, j M Y')) ?>
							
							<?php if ($comment->comment_approved == '0'): ?>
								<p><?php _e('Komentar Anda menunggu disetujui admin.', 'wpmasjid') ?></p>
								<br/>
							<?php endif; ?>
							<?php comment_text() ?>
							<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
							
						</div>
					</td>
				</tr>
			</table>
		 </div>
<?php
}

function comments_link_attributes() {
	return 'class="comments_popup_link"';
}
add_filter('comments_popup_link_attributes', 'comments_link_attributes');

function next_posts_attributes() {
	return 'class="nextpostslink"';
}
add_filter('next_posts_link_attributes', 'next_posts_attributes');

function prev_posts_attributes() {
	return 'class="previouspostslink"';
}
add_filter('previous_posts_link_attributes', 'prev_posts_attributes');

$exl_posts = array();

?>