<?php
class RewriteHelper{
	
	public function __construct($options = array()){		
		add_action('init', array($this,'add_tags_rule'));
		register_deactivation_hook($options['file'], array($this,'plugin_deactivation'));
	}	
	public function plugin_deactivation(){
		flush_rewrite_rules(false);
	}		
	public function add_tags_rule(){		
		/*add_rewrite_tag('%product%', '([^/]+)');
		add_permastruct('product', 'chi-tiet-san-pham/%product%.html');		*/
		add_rewrite_tag('%category_product%', '([^/]+)');
		add_permastruct('category_product', 'loai-san-pham/%category_product%.html');
		flush_rewrite_rules(false);
	}
	
	
}