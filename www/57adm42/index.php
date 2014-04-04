<?php
$dev_settings = dirname(dirname(dirname(__FILE__))).'/.dev/override.php';
if (file_exists($dev_settings)) {
    require_once $dev_settings;
}
$saved_settings = dirname(dirname(__FILE__)).'/saved_settings.php';
if (file_exists($saved_settings)) {
    require_once $saved_settings;
}
define('DEBUG_MODE', false);
define('YF_PATH', '/var/www/yfix.net/yf/');
define('WEB_PATH', '//yfix.net/');
define('ADMIN_WEB_PATH', WEB_PATH. basename(dirname(__FILE__)).'/');
//define('ADMIN_WEB_PATH', '//'.$_SERVER['HTTP_HOST'].'/'.basename(dirname(__FILE__)).'/');
define('ADMIN_SITE_PATH', dirname(__FILE__).'/');
define('SITE_DEFAULT_PAGE', './?object=admin_home');
define('ADMIN_FRAMESET_MODE', 1);
require dirname(dirname(__FILE__)).'/project_conf.php';
require YF_PATH.'classes/yf_main.class.php';
new yf_main('admin', $no_db_connect = false, $auto_init_all = true);