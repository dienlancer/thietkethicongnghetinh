<?php

// enqueue the child theme stylesheet

function wp_schools_enqueue_scripts() {
	/* begin fontawesome */
	wp_register_style( 'fontawesome', get_stylesheet_directory_uri() . '/web-fonts-with-css/css/fontawesome-all.min.css' ,array(),false,'all' );
	wp_enqueue_style( 'fontawesome' );
	/* end fontawesome */
	/* begin owlcarousel */
	wp_register_style( 'owlcarousel_css', get_stylesheet_directory_uri() . '/owlcarousel/assets/owl.carousel.min.css' ,array(),false,'all' );
	wp_enqueue_style( 'owlcarousel_css' );
	wp_register_script('owlcarousel_js',get_stylesheet_directory_uri() . '/owlcarousel/owl.carousel.min.js',array(),false,false);
	wp_enqueue_script('owlcarousel_js');
	/* end owlcarousel */
	/* begin bootstrap */
	wp_register_style( 'bootstrap_css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' ,array(),false,'all' );
	wp_enqueue_style( 'bootstrap_css' );
	wp_register_script('bootstrap_js',get_stylesheet_directory_uri() . '/js/bootstrap.min.js',array(),false,false);
	wp_enqueue_script('bootstrap_js');
	/* end bootstrap */
	/* begin elevatezoom */
	wp_register_script('elevatezoom',get_stylesheet_directory_uri() . '/js/jquery.elevatezoom-3.0.8.min.js',array('jquery'),'1.0',false);
	wp_enqueue_script('elevatezoom');	
	/* end elevatezoom */
	/* begin youtube */	
	wp_register_script('jquery_modal_video',get_stylesheet_directory_uri() . '/youtube/jquery-modal-video.min.js',array(),false,false);
	wp_enqueue_script('jquery_modal_video');
	wp_register_script('modal_video_js',get_stylesheet_directory_uri() . '/youtube/modal-video.min.js',array(),false,false);
	wp_enqueue_script('modal_video_js');
	wp_register_style( 'modal_video_css', get_stylesheet_directory_uri() . '/youtube/modal-video.min.css' ,array(),false,'all'  );
	wp_enqueue_style( 'modal_video_css' );
	/* end youtube */
	/* begin tab */
	wp_register_style( 'tab_css', get_stylesheet_directory_uri() . '/css/tab.css' ,array(),false,'all'  );
	wp_enqueue_style( 'tab_css' );
	/* end tab */	
	/* begin custom js */
	wp_register_script('customy_js',get_stylesheet_directory_uri() . '/js/custom.js',array(),false,false);
	wp_enqueue_script('customy_js');
	/* end custom js */
	/* begin style */
	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css',array(),false,'all'   );
	wp_enqueue_style( 'childstyle' );
	/* end style */	
}
function do_output_buffer(){
		ob_start();
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);
add_action('init', 'do_output_buffer');
/* begin ẩn menu */
function vnkings_admin_menus() {   
   remove_menu_page( 'edit.php?post_type=portfolio_page' ); 
   remove_menu_page( 'edit.php?post_type=testimonials' ); 
   remove_menu_page( 'edit.php?post_type=slides' ); 
   remove_menu_page( 'edit.php?post_type=carousels' ); 
   remove_menu_page( 'edit.php?post_type=masonry_gallery' ); 
   remove_menu_page( 'edit-comments.php' ); 
   remove_menu_page( 'tools.php' );     
   remove_menu_page( 'edit.php?post_type=acf' );   
   remove_menu_page( 'vc-general' );    
   remove_menu_page( 'wpseo_dashboard' ); 
}
add_action( 'admin_menu', 'vnkings_admin_menus' );
/* end ẩn menu */
/* begin quick alo phone */
add_action('wp_footer', 'footer_script_code');
function footer_script_code(){
	$script= '<div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon" style="right: 10px; top: 20%;">
  <a href="tel:097 340 80 07" title="Liên hệ nhanh">
  <div class="quick-alo-ph-circle"></div>
  <div class="quick-alo-ph-circle-fill"></div>
  <div class="quick-alo-ph-img-circle"></div>
  </a>
</div>
	';	
	echo $script;

	$tawk_to="<!--Start of Tawk.to Script-->
<script type=\"text/javascript\">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b496f1d6d961556373dba13/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->";
	echo $tawk_to;

}
/* end quick alo phone */
/* begin cong trinh tieu bieu */
add_shortcode( 'cong_trinh_tieu_bieu', 'showFeaturedConstruction' );
function showFeaturedConstruction(){
	$args = array(		
		'orderby' => 'date',
		'order'   => 'DESC',
		'posts_per_page'=>9     										
	);  	
	$the_query = new WP_Query( $args );
	if($the_query->have_posts()){
		$k=0;
		
		while ($the_query->have_posts()){
			$the_query->the_post();     
			$post_id=$the_query->post->ID;                          
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);
			$acreage=get_post_meta($post_id,"acreage",true);		
			if($k%3 == 0){
				echo '<div class="section_inner_margin clearfix">';
			}	
			?>
			<div class="wpb_column vc_column_container vc_col-sm-4">
				<div class="vc_column-inner">
					<div class="margin-top-15 relative v2_bnc_pr_item">
						<div><img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" /></div>
						<div class="hfsaiiidsuh">
							<a class="links_fixed" href="<?php echo $permalink; ?>"></a>
							<div class="uweriuruiw">
								<div class="lsouwuruwe"><?php echo $title; ?></div>
								<div class="kjhgsruewi">Diện tích : căn hộ <?php echo $acreage; ?>m2</div>
							</div>
						</div>					
					</div>		
				</div>						
			</div>
			<?php
			$k++;
			if($k%3==0 || $k == $the_query->post_count){
				echo '</div>';
			}  
		}
		wp_reset_postdata();		
		
	}
}
/* end cong trinh tieu bieu */
/* begin fanpage */
add_action('wp_footer', 'script_fanpage');
function script_fanpage(){
	$strScript='<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = \'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=206740246563578\';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, \'script\', \'facebook-jssdk\'));</script>';
	echo $strScript;
}
/* end fanpage */
/* begin sản phẩm lẻ */
add_shortcode( 'san_pham_le', 'loadSanPhamLe' );
function loadSanPhamLe(){
	global $zController,$zendvn_sp_settings;    
	$vHtml=new HtmlControl();
	$productModel=$zController->getModel("/frontend","ProductModel"); 
	$terms = get_terms( array(
		'taxonomy' => 'category_product',
		'hide_empty' => false, 
		'parent' => 0 ) );		
	$source_category=array();	
	foreach ($terms as $key => $value) {
		$source_category[]=$value->slug;
	}
	$args = array(
		'post_type' => 'product',  
		'orderby' => 'id',
		'order'   => 'DESC',  		 							
		'tax_query' => array(
			array(
				'taxonomy' => 'category_product',
				'field'    => 'slug',
				'terms'    => $source_category,									
			),
		)
	);
	$the_query = new WP_Query( $args );	
	$totalItemsPerPage=0;
	$pageRange=10;
	$currentPage=1; 
	$totalItemsPerPage=get_option( 'posts_per_page' );    
	if(!empty(@$_POST["filter_page"]))          {
		$currentPage=@$_POST["filter_page"];  
	}		
	$productModel->setWpQuery($the_query); 			
	$productModel->setPerpage($totalItemsPerPage);        
	$productModel->prepare_items();               	
	$totalItems= $productModel->getTotalItems();               
	$arrPagination=array(
		"totalItems"=>$totalItems,
		"totalItemsPerPage"=>$totalItemsPerPage,
		"pageRange"=>$pageRange,
		"currentPage"=>$currentPage   
	);    
	$pagination=$zController->getPagination("Pagination",$arrPagination); 

	if($the_query->have_posts()){		
		$k=0;		
		if(count($terms) > 0){
			?>
			<div class="section_inner_margin clearfix">
				<div class="wpb_column vc_column_container vc_col-sm-12">
					<div class="vc_column-inner">
						<div class="wpb_wrapper">
							<div class="ruqotoiexxzzz">						
								<div align="center">
									<?php 
									foreach ($terms as $key => $value) {
										$term_link= get_term_link($value,'category_product');		
										?>
										<a href="<?php echo $term_link; ?>"><?php echo @$value->name; ?></a>										
										<?php
									}
									?>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}		
		echo '<form  method="post"  class="frm" name="frm">';
		echo '<input type="hidden" name="filter_page" value="1" />';		
		while ($the_query->have_posts()){			
			$the_query->the_post();     
			$post_id=$the_query->post->ID;                          
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);
			$price=get_post_meta($post_id,"price",true);    
			$thumbnail_id   = get_post_thumbnail_id($post_id);  
			$featured_img=wp_get_attachment_image_src($thumbnail_id,"single-post-thumbnail");       
			if($k%3 == 0){
				echo '<div class="section_inner_margin clearfix">';
			}			
			?>
			<div class="wpb_column vc_column_container vc_col-sm-4">
				<div class="vc_column-inner">
					<div class="margin-top-15 relative v2_bnc_pr_item">
						<div>
							<?php 
							if($featured_img != null){
								?>
								<img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" />
								<?php
							}else{
								?>
								<img src="<?php echo site_url('wp-content/uploads/no-image.png'); ?>" />
								<?php
							}
							?>							
						</div>
						<div class="hfsaiiidsuh">
							<a class="links_fixed" href="<?php echo $permalink; ?>"></a>
							<div class="uweriuruiw">
								<div class="lsouwuruwe"><?php echo $title; ?></div>
								<div class="kjhgsruewi">Giá : <?php echo $vHtml->fnPrice($price).'&nbspđ'; ?></div>								
							</div>
						</div>					
					</div>				
				</div>				
			</div>
			<?php
			$k++;
			if($k%3==0 || $k == $the_query->post_count){
				echo '</div>';
			}  
		}		
		wp_reset_postdata();
		?>
		<div class="section_inner_margin clearfix">
			<div class="wpb_column vc_column_container vc_col-sm-12">
				<div class="vc_column-inner">
					<?php echo $pagination->showPagination(); ?>
				</div>
			</div>
		</div>
		<?php				
		echo '</form>';			
	}
}
/* end sản phẩm lẻ */
/* begin tìm kiếm dự án */
add_shortcode( 'search_project', 'searchProject' );
function searchProject(){		
	global $zController,$zendvn_sp_settings;    
	$vHtml=new HtmlControl();
	$productModel=$zController->getModel("/frontend","ProductModel"); 
	$args = array(		
			'post_type'=>'post',	
			'orderby' => 'id',
			'order'   => 'DESC',  		 										
		);
	if(isset($_POST['q'])){
		$q=$_POST['q'];
		$args['s'] = $q;
	}	
	$the_query = new WP_Query( $args );
	$totalItemsPerPage=0;
	$pageRange=10;
	$currentPage=1; 
	$totalItemsPerPage=get_option( 'posts_per_page' );    
	if(!empty(@$_POST["filter_page"]))          {
		$currentPage=@$_POST["filter_page"];  
	}
	$productModel->setWpQuery($the_query);   
	$productModel->setPerpage($totalItemsPerPage);        
	$productModel->prepare_items();               
	$totalItems= $productModel->getTotalItems();               
	$arrPagination=array(
		"totalItems"=>$totalItems,
		"totalItemsPerPage"=>$totalItemsPerPage,
		"pageRange"=>$pageRange,
		"currentPage"=>$currentPage   
	);    
	$pagination=$zController->getPagination("Pagination",$arrPagination); 
	if($the_query->have_posts()){
		$k=0;
		echo '<form  method="post"  class="frm" name="frm">';
		echo '<input type="hidden" name="filter_page" value="1" />';
		
		while ($the_query->have_posts()){
			$the_query->the_post();     
			$post_id=$the_query->post->ID;                          
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);
			$acreage=get_post_meta($post_id,"acreage",true);	
			$thumbnail_id   = get_post_thumbnail_id($post_id);  
			$featured_img=wp_get_attachment_image_src($thumbnail_id,"single-post-thumbnail"); 			
			if($k%3 == 0){
				echo '<div class="section_inner_margin clearfix">';
			}			
			?>
			<div class="wpb_column vc_column_container vc_col-sm-4">
				<div class="vc_column-inner">
					<div class="margin-top-15 relative v2_bnc_pr_item">
						<div>
							<?php 
							if($featured_img != null){
								?>
								<img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" />
								<?php
							}else{
								?>
								<img src="<?php echo site_url('wp-content/uploads/no-image.png'); ?>" />
								<?php
							}
							?>							
						</div>
						<div class="hfsaiiidsuh">
							<a class="links_fixed" href="<?php echo $permalink; ?>"></a>
							<div class="uweriuruiw">
								<div class="lsouwuruwe"><?php echo $title; ?></div>	
								<div class="kjhgsruewi">Diện tích : căn hộ <?php echo $acreage; ?>m2</div>							
							</div>
						</div>					
					</div>				
				</div>				
			</div>
			<?php
			$k++;
			if($k%3==0 || $k == $the_query->post_count){
				echo '</div>';
			}  
		}		
		wp_reset_postdata();
		?>
		<div class="section_inner_margin clearfix">
			<div class="wpb_column vc_column_container vc_col-sm-12">
				<div class="vc_column-inner">
					<?php echo $pagination->showPagination(); ?>
				</div>
			</div>
		</div>
		<?php		
		
		echo '</form>';	
		
	}
}
/* end tìm kiếm dự án */
/* begin social icon */
add_shortcode('social_icon','showSocialIcon');
function showSocialIcon(){
	global $zendvn_sp_settings;	
	$facebook_url=$zendvn_sp_settings['facebook_url'];
	$twitter_url=$zendvn_sp_settings['twitter_url'];
	$google_plus=$zendvn_sp_settings['google_plus'];
	$youtube_url=$zendvn_sp_settings['youtube_url'];
	$q='';	
	if(!empty(@$_POST['q'])){
		$q=trim(@$_POST['q']);
	}    
	?>
	<div class="intubin">
		<div class="relative">
			<form name="frm-search" method="POST" action="/tim-kiem-du-an">
				<input type="text" name="q" autocomplete="off" placeholder="Tìm kiếm dự án" value="<?php echo $q; ?>">
				<a href="javascript:void(0);" onclick="document.forms['frm-search'].submit();"><i class="fa fa-search" aria-hidden="true"></i></a>
			</form>			
		</div>
		<div class="mioo">
			<ul class="nicolas">
				<li><a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
				<li><a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
				<li><a href="<?php echo $google_plus; ?>" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
				<li><a href="<?php echo $youtube_url; ?>" target="_blank"><i class="fab fa-youtube-square"></i></a></li>
			</ul>
		</div>
	</div>	
	<?php
}
/* end social icon */
/* begin ảnh công trình */
add_shortcode( 'show_album', 'showAlbum' );
function showAlbum($atts){
	$att = shortcode_atts( array(		
		'post_type'=>'',		        
	), $atts );	
	$post_type=trim($att['post_type']);	
	global $zController,$zendvn_sp_settings;    
	$vHtml=new HtmlControl();
	$productModel=$zController->getModel("/frontend","ProductModel"); 
	$args = array(
		'post_type' => $post_type,  
		'orderby' => 'date',
		'order'   => 'DESC',  		 								
	);   
	$the_query = new WP_Query( $args );
	$totalItemsPerPage=0;
	$pageRange=10;
	$currentPage=1; 
	$totalItemsPerPage=12;    
	if(!empty(@$_POST["filter_page"]))          {
		$currentPage=@$_POST["filter_page"];  
	}
	$productModel->setWpQuery($the_query);   
	$productModel->setPerpage($totalItemsPerPage);        
	$productModel->prepare_items();               
	$totalItems= $productModel->getTotalItems();               
	$arrPagination=array(
		"totalItems"=>$totalItems,
		"totalItemsPerPage"=>$totalItemsPerPage,
		"pageRange"=>$pageRange,
		"currentPage"=>$currentPage   
	);    
	$pagination=$zController->getPagination("Pagination",$arrPagination); 
	if($the_query->have_posts()){
		$k=0;
		echo '<form  method="post"  class="frm" name="frm">';
		echo '<input type="hidden" name="filter_page" value="1" />';		
		while ($the_query->have_posts()){
			$the_query->the_post();     
			$post_id=$the_query->post->ID;                          
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);	
			$thumbnail_id   = get_post_thumbnail_id($post_id);  
            $featured_img=wp_get_attachment_image_src($thumbnail_id,"single-post-thumbnail");  
			if($k%4 == 0){
				echo '<div class="section_inner_margin clearfix">';
			}		
			?>
			<div class="wpb_column vc_column_container vc_col-sm-3">
				<div class="vc_column-inner">
					<div class="margin-top-15 relative v2_bnc_pr_item">
						<div>
                                                <?php 
                                                if($featured_img != null){
                                                    ?>
                                                    <img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" />
                                                    <?php
                                                }else{
                                                    ?>
                                                    <img src="<?php echo site_url('wp-content/uploads/no-image.png'); ?>" />
                                                    <?php
                                                }
                                                ?>                          
                                            </div>
						<div class="hfsaiiidsuh">
							<a class="links_fixed" href="<?php echo $permalink; ?>"></a>
							<div class="uweriuruiw">
								<div class="lsouwuruwe"><?php echo $title; ?></div>							
							</div>
						</div>					
					</div>		
				</div>					
			</div>
			<?php
			$k++;
			if($k%4==0 || $k == $the_query->post_count){
				echo '</div>';
			}  
		}
		wp_reset_postdata();
		?>
		<div class="section_inner_margin clearfix">
			<div class="wpb_column vc_column_container vc_col-sm-12">
				<div class="vc_column-inner">
					<?php echo $pagination->showPagination(); ?>
				</div>
			</div>
		</div>
		<?php				
		echo '</form>';	
		
	}
}
/* end ảnh công trình */