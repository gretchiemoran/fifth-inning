<?php
# Database Configuration
define( 'DB_NAME', 'wp_fifthinning' );
define( 'DB_USER', 'fifthinning' );
define( 'DB_PASSWORD', 'QmaqTUj2zIuxuU8IL6re' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'VNW8$^m6o{*&ZR),hbPe-%<3-k8+v:WGYb9-l@1S*j>PO w VYMD-c@0{C.Q+^aQ');
define('SECURE_AUTH_KEY',  'c>bW2-#33g/dRt$+3z>HAgb}:^raAY[)CNe7G]j/%Uju^snPIVh#|,PKE.H+v-fM');
define('LOGGED_IN_KEY',    '1vgYXm#pg6q;=#ch(@u@<D-pfvDlw?W;:kUVq-$>B/4Yt3P.0M>Hh57kH|1+RNE&');
define('NONCE_KEY',        'L,kRh%h3{obIM<-2|2L#pNp}Wh~jdI%${]gyIN40rx71&O*(=zLG~]V3x?VPI-ND');
define('AUTH_SALT',        'dp.waafqTenGav,Pmrz( v99G8x:s6qMJiehXNR>Y9t+ja#-6C$9uq+bX=%wRt_Z');
define('SECURE_AUTH_SALT', 'M|-):{-G|lU-bwc!l.h[+(OSN1fu|vbRR2P;UgQ$B<grQ}HWh$NwYKmmi%JgO]H:');
define('LOGGED_IN_SALT',   'H.SnGpni#p![9CQQAqhY&Dm/(vGJ e3=8mh7T,I!u{Q]jI&T a/ @ZC-1p,c5QW8');
define('NONCE_SALT',       '56BJcCqRs(-Oe8Z-tZAs86;O6_-oDFwqRm?s9N=bk=&_t1HH+BE D[W-ADp(b_~d');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'fifthinning' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'd1953d24351e5165eadd936ed1299911652f26db' );

define( 'WPE_CLUSTER_ID', '153908' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'fifthinning.com', 1 => 'fifthinning.wpengine.com', 2 => 'www.fifthinning.com', );

$wpe_varnish_servers=array ( 0 => 'pod-153908', );

$wpe_special_ips=array ( 0 => '35.185.31.208', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
