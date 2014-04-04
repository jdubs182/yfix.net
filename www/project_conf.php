<?php

define('SITE_UPLOADS_DIR',	'uploads/');				// Root folder for all uploads
define('SITE_AVATARS_DIR',	'uploads/avatars/');		// avatars folder
if (!defined('SITE_ADVERT_NAME')) {
	define('SITE_ADVERT_NAME',	'Yfix.net demo');	// Advertisement name
}
define('SITE_ADVERT_TITLE',	'Yfix.net demo');	// Advertisement title
define('SITE_ADVERT_URL',	defined('WEB_PATH')?WEB_PATH:'');	// Advertisement URL
define('SITE_ADMIN_NAME',	'Yfix');		// Site Admin name
define('SITE_ADMIN_EMAIL',	'info@'.$_SERVER['HTTP_HOST']);	// Admin's email used in common cases

if (!function_exists('my_array_merge')) {
	function my_array_merge($a1, $a2) {
		foreach ((array)$a2 as $k => $v) { if (isset($a1[$k]) && is_array($a1[$k])) { if (is_array($a2[$k])) { 
			foreach ((array)$a2[$k] as $k2 => $v2) { if (isset($a1[$k][$k1]) && is_array($a1[$k][$k1])) { $a1[$k][$k2] += $v2; } else { $a1[$k][$k2] = $v2; } 
		} } else { $a1[$k] += $v; } } else { $a1[$k] = $v; } }
		return $a1;
	}
}
$PROJECT_CONF = my_array_merge((array)$PROJECT_CONF, array(
	'main'	=> array(
		'USE_CUSTOM_ERRORS'		=> 1,
//		'USE_SYSTEM_CACHE'		=> 1,
//		'NO_CACHE_HEADERS'		=> 1,
//		'SPIDERS_DETECTION'		=> 1,
//		'OVERLOAD_PROTECTION'	=> 0,
//		'ALLOW_FAST_INIT'		=> 1,
//		'USE_GEO_IP'			=> 1,
//		'OUTPUT_CACHING'		=> 1,
//		'OUTPUT_GZIP_COMPRESS'	=> 1,
//		'LOG_EXEC'				=> 1,
		'STATIC_PAGES_ROUTE_TOP'=> 1,
	),
    'db' => array(
        'QUERY_REVISIONS'   => true,
    ),
    'cache' => array(
        'CACHE_NS'  => 'yfixnet_',
    ),
	'auth_user' => array(
		'URL_SUCCESS_LOGIN' => './?object=account', 
		'EXEC_AFTER_LOGIN'		=> array(
			array('_add_login_activity'),
		),
	),
	'send_mail'	=> array(
		'USE_MAILER'	=> 'phpmailer',
	),
	'tpl' => array(
		'ALLOW_LANG_BASED_STPLS' => 1,
		'REWRITE_MODE'			=> 1,
	),
	'i18n' => array(
		'TRACK_TRANSLATED'  => 1,
	),
	'debug_info' => array(
		'_SHOW_NOT_TRANSLATED'  => 1,
		'_SHOW_I18N_VARS'   => 1,
	),
	'rewrite'	=> array(
		'_rewrite_add_extension'	=> '/',
	),
	'comments'	=> array(
		'USE_TREE_MODE' => 1,
	),
	'logs'	=> array(
		'_LOGGING'			=> 1,
		'STORE_USER_AUTH'	=> 1,
		'UPDATE_LAST_LOGIN'	=> 1,
	),
	'bb_codes'	=> array(
		'SMILIES_DIR'	=> 'uploads/forum/smilies/',
	),
));

$OVERRIDE_CONF_FILE = dirname(dirname(__FILE__)).'/.dev/override_conf_after.php';
if (file_exists($OVERRIDE_CONF_FILE)) {
	include_once $OVERRIDE_CONF_FILE;
}
// Load auto-configured file
$AUTO_CONF_FILE = dirname(__FILE__).'/_auto_conf.php';
if (file_exists($AUTO_CONF_FILE)) {
	@eval('?>'.file_get_contents($AUTO_CONF_FILE));
}
