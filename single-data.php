<?php get_header(); ?>
<div class="mh-wrapper clearfix">
	<div class="mh-main clearfix">
		<div id="main-content" class="mh-content">
		<?php
			while (have_posts()) : the_post();
				mh_before_post_content();
				if (is_attachment()) {
					get_template_part('content', 'attachment');
				} else {
					get_template_part('content', 'data');
				}
				mh_after_post_content();
				comments_template();
			endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
    <?php mh_magazine_second_sidebar(); ?>
</div>
<?php get_footer(); ?>
