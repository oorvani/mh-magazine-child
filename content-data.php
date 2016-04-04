<?php /* Default template for displaying post content */ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
		<?php mh_post_header(); ?>
	</header>
	<?php dynamic_sidebar('mh-posts-1'); ?>
	<div class="entry-content clearfix"><?php
		mh_post_content_top();
		the_content();
	$post_obj = get_field( 'tablepress' );
// get the post-table pair json data
$table_json = get_option( 'tablepress_tables' );
// json decode to array
$json_dec = json_decode( $table_json, true );
// get the pair data
$post_table = $json_dec['table_post'];
// flip the key/value of the array
$flip = array_flip( $post_table );
	?>
<?php 
	if ( function_exists('tablepress_print_table') ){
		tablepress_print_table( array( 'id' => $flip[$post_obj->ID], 'use_datatables' => true, 'print_name' => false, 'datatables_buttons' => 'colvis,copy,csv,excel,pdf,print') ); 
	}else{
		echo "Install tablepress";
	}
?>
                        <table id="data_meta_table"> 
                        <tr><td><strong>Source:</strong></td><td><?php echo get_field('source'); ?></td></tr>
                         <tr><td><strong>Credit:</strong></td><td><?php echo get_field('credit'); ?></td></tr>
                         <tr><td><strong>License:</strong></td><td><?php echo get_field('license'); ?></td></tr>
                         <tr><td><strong>Notes:</strong></td><td><?php echo get_field('notes'); ?></td></tr>
                        </table>


	<?php	mh_post_content_bottom(); ?>
	</div>
	<?php the_tags('<div class="entry-tags clearfix"><i class="fa fa-tag"></i><ul><li>','</li><li>','</li></ul></div>'); ?>
	<?php dynamic_sidebar('mh-posts-2'); ?>
</article>
