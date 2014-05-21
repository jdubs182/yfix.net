<?php
$dev_settings = dirname(dirname(__FILE__)).'/.dev/override.php';
if (file_exists($dev_settings)) {
    require_once $dev_settings;
}
$saved_settings = dirname(__FILE__).'/saved_settings.php';
if (file_exists($saved_settings)) {
    require_once $saved_settings;
}
define('DEBUG_MODE', false);
define('YF_PATH', '/home/www/yf/');
define('WEB_PATH', '//yfix.net/');
define('SITE_DEFAULT_PAGE', './?object=docs');
define('SITE_ADVERT_NAME', 'Yfix.net');
require dirname(__FILE__).'/project_conf.php';
$PROJECT_CONF['tpl']['REWRITE_MODE'] = true;
require YF_PATH.'classes/yf_main.class.php';
new yf_main('user', $no_db_connect = false, $auto_init_all = true);