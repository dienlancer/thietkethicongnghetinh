<?php 
get_header(); 
global $zController,$zendvn_sp_settings;    
$vHtml=new HtmlControl();
$productModel=$zController->getModel("/frontend","ProductModel");   
$the_query = $wp_query;
$totalItemsPerPage=0;
$pageRange=10;
$currentPage=1; 
$totalItemsPerPage=9;
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];  
}
if(!empty(@$zendvn_sp_settings["article_number"])){
    $totalItemsPerPage=(int)@$zendvn_sp_settings["article_number"];        
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
?>
<div class="category-inner">
    <div class="full_width">
    <div class="full_width_inner">
        <div class="vc_row wpb_row section vc_row-fluid grid_section">
            <div class="section_inner clearfix">
                <form  method="post"  class="frm margin-top-15" name="frm">
                    <input type="hidden" name="filter_page" value="1" />
                    <div class="section_inner_margin clearfix">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner">
                                <center><div class="title_subtitle_holder"><h1><?php single_cat_title(); ?></h1></div></center>
                            </div>                  
                        </div>
                    </div>  
                    <?php
                    if($the_query->have_posts()){               
                        $k=0;                   
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
                                    <div class="wpb_wrapper">
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
                            </div>   
                            <?php
                            $k++;
                            if($k%3==0 || $k == $the_query->post_count){
                                echo '</div>';
                            }               
                        }
                        wp_reset_postdata();                                 
                    }       
                    ?>  
                    <div class="section_inner_margin clearfix">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner">
                                <?php 
                                echo $pagination->showPagination(); 
                                ?>
                            </div>                  
                        </div>
                    </div>      
                </form> 
            </div>
        </div>      
    </div>
</div>
</div>
<?php get_footer(); ?>
<?php wp_footer();?>