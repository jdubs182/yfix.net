<?php
$dev_settings = dirname(__DIR__).'/.dev/override.php';
if (file_exists($dev_settings)) {
    require_once $dev_settings;
}
$saved_settings = dirname(__DIR__).'/config/saved_settings.php';
if (file_exists($saved_settings)) {
    require_once $saved_settings;
}
define('DEBUG_MODE', false);
define('YF_PATH', '/home/www/yf/');
define('WEB_PATH', '//'.$_SERVER['HTTP_HOST'].'/');
define('SITE_DEFAULT_PAGE', './?object=docs');
define('SITE_ADVERT_NAME', $_SERVER['HTTP_HOST']);
require dirname(__DIR__).'/config/project_conf.php';
$PROJECT_CONF['tpl']['REWRITE_MODE'] = true;
require YF_PATH.'classes/yf_main.class.php';
new yf_main('user', $no_db_connect = false, $auto_init_all = true);