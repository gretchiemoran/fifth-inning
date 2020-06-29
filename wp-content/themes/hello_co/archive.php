<?php
/**
* @package      Hello Co
* @link         https://helloyoudesigns.com
* @author       Hello You Designs
* @copyright    Copyright (c) 2019, Hello You Designs
* @license      GPL-2.0+
*/

get_template_part( 'grid-archive' );
remove_action( 'genesis_before_entry_content', 'hyd_affiliate', 12 );
remove_action ( 'genesis_after_entry_content', 'hyd_show_page_excerpt' );
remove_action( 'genesis_after_entry', 'hyd_postadbar_widget_area' );
genesis();
