<?php
/*
 * The template for displaying comments.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
if ( have_comments() ) : ?>
<div id="comments" class="lvsy-comments-area comments-area">
	<div class="comments-section">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html__( _nx( 'Comment (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'livesay' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . esc_attr(get_the_title()) . '</span>'
				);
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation vt-comment-navigation" role="navigation">
			<h2 class="vt-screen-reader-text"><?php esc_html_e( 'Comment navigation', 'livesay' ); ?></h2>
			<div class="vt-nav-links">

				<div class="vt-nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'livesay' ) ); ?></div>
				<div class="vt-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'livesay' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comments">
			<?php wp_list_comments('type=all&callback=livesay_comment_modification'); ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="vt-comment-nav-below" class="navigation vt-comment-navigation" role="navigation">
			<h2 class="vt-screen-reader-text"><?php esc_html_e( 'Comment navigation', 'livesay' ); ?></h2>
			<div class="vt-nav-links">

				<div class="vt-nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'livesay' ) ); ?></div>
				<div class="vt-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'livesay' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="vt-no-comments"><?php esc_html_e( 'Comments are closed.', 'livesay' ); ?></p>
	<?php endif; ?>
	</div><!-- .comments-section -->
	</div>
	<?php endif;
	/* ==============================================
	  Comment Forms
	=============================================== */
	if ( comments_open() ) { ?>
	<div id="lvsy-respond" class="lvsy-comment-form comment-respond">
		<?php
		$post_comment_text = cs_get_option('post_comment_text');
		$post_comment_text = $post_comment_text ? $post_comment_text : esc_html__( 'Post Comment', 'livesay' );
		$fields = array(
			'author' => '<div class="lvsy-form-inputs no-padding-left"><div class="row"><div class="col-md-6 col-sm-6"><input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="1" placeholder="' . esc_html__( 'Name', 'livesay' ) . '"/></div>',
			'email' => '<div class="col-md-6 col-sm-6"><input type="text" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2" placeholder="' . esc_html__( 'Email', 'livesay' ) . '"/></div></div></div>',
		);
		$defaults = array(
      'comment_notes_before' => '',
      'comment_notes_after'  => '',
      'fields' => apply_filters( 'comment_form_default_fields', $fields),
      'id_form'              => 'commentform',
      'id_submit'            => 'submit',
      'title_reply'          => esc_html__( 'Leave a Comment', 'livesay' ),
      'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'livesay' ),
      'cancel_reply_link'    => '<i class="fa fa-times-circle"></i>'. '',
      'label_submit'         => $post_comment_text,
      'comment_field' 			 => '<div class="lvsy-form-textarea no-padding-right"><textarea id="comment" name="comment" tabindex="4" rows="3" cols="30" placeholder="' . esc_html__( 'Write your comment...', 'livesay' ) . '" ></textarea></div>'
    );

		comment_form($defaults);
		?>
	</div>
	<?php } ?>

<?php
