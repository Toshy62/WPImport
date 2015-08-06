<?php
define('PATH_TO_ROOT', '..');

require_once PATH_TO_ROOT . '/kernel/init.php';

$url_controller_mappers = array(
    new UrlControllerMapper('WPImportController', '`^/admin/$`'),
    new UrlControllerMapper('WPImportController', '`^/admin/import$`'),
    new UrlControllerMapper('WPImportStartController', '`^/admin/import/start$`'),
    new UrlControllerMapper('WPImportAjaxController', '`^/admin/import/ajax`'),
);

DispatchManager::dispatch($url_controller_mappers);