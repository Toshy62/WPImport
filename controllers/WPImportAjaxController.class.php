<?php
class WPImportAjaxController extends AdminController {
    function execute(HTTPRequestCustom $request) {
        session_start();

        $data = PersistenceContext::get_querier()->select_single_row(PREFIX . 'member', array('user_id'), 'WHERE login=:user_login', array(
            'user_login' => $_SESSION['wpimport']['default_author']
        ));

        $_SESSION['wpimport']['wppath'] = (substr($_SESSION['wpimport']['wppath'], -1) != '/' ? $_SESSION['wpimport']['wppath'] . '/' : $_SESSION['wpimport']['wppath']);
        $_SESSION['wpimport']['phpboostpath'] = (substr($_SESSION['wpimport']['phpboostpath'], -1) != '/' ? $_SESSION['wpimport']['phpboostpath'] . '/': $_SESSION['wpimport']['phpboostpath']);

        define('WP_PATH', $_SESSION['wpimport']['wppath']);
        define('PBOOST_PATH', $_SESSION['wpimport']['phpboostpath']);
        define('IMPORTER_LIST', $_SESSION['wpimport']['importer']);
        
        define('PHPBOOST_CAT_IMAGE', $_SESSION['wpimport']['default_cat_image']);
        define('FILESYSTEM_IMPORT_LOCATION', $_SESSION['wpimport']['import_location']);
        define('DEFAULT_AUTHOR_ID', $data['user_id']);

        ini_set('max_execution_time', 0);
        if(function_exists('xdebug_disable')) {
            xdebug_disable();
        }
        ob_start();
        echo 'Start import : ' . date('H:i:s') . PHP_EOL;
        echo '-----' . PHP_EOL . PHP_EOL;

        $success = require_once __DIR__ . '/../WP2PhpBoost/wp2phpboost.php';
        echo 'Clean cache...' . PHP_EOL;
        AppContext::get_cache_service()->clear_cache();
        echo PHP_EOL . PHP_EOL;
        echo '-----' . PHP_EOL;
        echo 'End import : ' . date('H:i:s');
        $logs= ob_get_clean();

        return new JSONResponse(array(
            'success' => $success,
            'logs' => utf8_decode($logs)
        ));
    }
}