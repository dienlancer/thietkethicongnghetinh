<?php get_header();?>
<div class="category-inner">
	<div class="full_width">
		<div class="full_width_inner">
			<div class="vc_row wpb_row section vc_row-fluid  grid_section">
				<div class=" section_inner clearfix">
					<?php
					$post_type=get_query_var('post_type'); 
					switch ($post_type) {									
						case 'album_construction':												
						case 'za_album':			
						require_once get_theme_file_path() . DS . "loop-za-album.php"; 
						break;
						case 'product':										
						default:
						require_once get_theme_file_path() . DS . "loop-post.php"; 
						break;
					}
					?>
				</div>
			</div>
		</div>
	</div>	
</div>
<?php 
get_footer();
wp_footer();
?>
