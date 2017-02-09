<?php
//wordpress index file
include('cacher.php');
$ccc_cache = new ccc_cache();
$ccc_cache->start();
define('WP_USE_THEMES', true);
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
$ccc_cache->end();