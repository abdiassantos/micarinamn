<?php
/**
 * Single Post.
 */
$livesay_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$livesay_large_image = $livesay_large_image[0];

$livesay_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );

// Single Theme Option
$livesay_single_featured_image = cs_get_option('single_featured_image');
$livesay_single_author_info = cs_get_option('single_author_info');
$livesay_single_share_option = cs_get_option('single_share_option');
$tags_text = cs_get_option('tags_text');
if($tags_text){
	$tag_txt = $tags_text;
} else {
	$tag_txt = esc_html__('Tags', 'livesay');
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ($livesay_single_featured_image) {
		if(has_post_thumbnail()) { ?>
		<div class="blog-picture">
			<img src="<?php echo esc_url($livesay_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
		</div>
	<?php }
	} // Featured Image
	?>
	<h3 class="blog-title"><?php echo esc_attr(get_the_title()); ?></h3>
	<?php
	// Content
	livesay_post_metas();
	the_content();
	echo livesay_wp_link_pages(); ?>
  <div class="lvsy-blog-meta">
			<?php $tag_list = get_the_tags();
			if($tag_list) { ?>
				<div class="lvsy-blog-tags">
					<?php echo the_tags( '<ul><li>'.esc_attr($tag_txt).' :</li> <li><span>', '</span></li> <li><span>', '</span></li> </ul>' ); ?>
				</div>
		<?php } if($livesay_single_share_option) {
			if ( function_exists( 'livesay_post_share' ) ) { ?>
			<div class="lvsy-blog-share">
        <?php livesay_post_share(); ?>
      </div>
    <?php } } ?>
  </div>
	<div class="lvsy-more-posts">
		<div class="pull-left">
			<?php $prev_post = get_adjacent_post(false, '', true);
			if(!empty($prev_post)) {
			echo '<span>'.esc_html__('Previous Post', 'livesay').'</span><a href="' . esc_url(get_permalink($prev_post->ID)) . '" title="' . esc_attr($prev_post->post_title). '">' . esc_attr($prev_post->post_title). '</a>'; } ?>
		</div>
		<div class="pull-right">
			<?php $next_post = get_adjacent_post(false, '', false);
			if(!empty($next_post)) {
			echo '<span>'.esc_html__('Next Post', 'livesay').'</span><a href="' . esc_url(get_permalink($next_post->ID)) . '" title="' . esc_attr($next_post->post_title). '">' . esc_attr($next_post->post_title). '</a>'; } ?>
		</div>
	</div>

	<!-- Author Info -->
	<?php
		if($livesay_single_author_info) {
			echo livesay_author_info();
		}
	?>
	<!-- Author Info -->
</div><?php
