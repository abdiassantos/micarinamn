<?php
/**
 * Template part for displaying posts.
 */
$livesay_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$livesay_large_image = $livesay_large_image[0];

$livesay_read_more_text = cs_get_option('read_more_text');
$livesay_read_text = $livesay_read_more_text ? $livesay_read_more_text : esc_html__( 'Continue Reading', 'livesay' );
$livesay_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$livesay_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
if(is_sticky()){
	$sticky_cls = ' sticky';
} else {
	$sticky_cls = '';
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(' blog-item '.esc_attr($sticky_cls).''); ?>>
	<div class="blog-item">
	  <?php
	  if(has_post_thumbnail()) { ?>
		  <div class="blog-picture">
		    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($livesay_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
		  </div>
	  <?php }
	  if(has_post_thumbnail()) {
	  	$cnt_cls = 'blog-info';
	  } else {
	  	$cnt_cls = 'blog-infos';
	  }
	  ?>
	  <div class="<?php echo esc_attr($cnt_cls); ?>">
	    <h3 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-heading"><?php echo esc_attr(get_the_title()); ?></a></h3>
	    <?php livesay_post_metas();
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				echo'<div class="lvsy-custom-excerpt">';
				livesay_excerpt($blog_excerpt);
				echo'</div>';
				echo livesay_wp_link_pages();
			?>
			<div class="blog-links">
		    <div class="continue-reading">
		    	<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr($livesay_read_text); ?></a>
		    </div>
		    <?php if ( function_exists( 'livesay_post_share' ) ) { livesay_post_share(); } ?>
	    </div>
	  </div>
	</div>
</div>
