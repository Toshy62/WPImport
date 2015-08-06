<?php
class WPImportStartController extends AdminController {
    private $views;
    private $lang;

    function execute(HTTPRequestCustom $request) {
        session_start();

        if(!array_key_exists('wpimport', $_SESSION)) {
            AppContext::get_response()->redirect(DispatchManager::get_url('../wpimport', '/admin/import'));
        }

        // Define template
        $this->views = new FileTemplate('wpimport/start-import.tpl');
        // Load lang
        $this->lang = LangLoader::get('common', 'wpimport');
        // Add lang
        $this->views->add_lang($this->lang);

        $this->views->put('AJAX_IMPORT_URL', DispatchManager::get_url('../wpimport', '/admin/import/ajax')->absolute());

        return $this->build_response();
    }

    private function build_response() {
        $response = new AdminMenuDisplayResponse($this->views);
        $response->get_graphical_environment()->set_page_title('Importation');
        $response->add_link($this->lang['menu.title'], DispatchManager::get_url('../wpimport', '/admin/import'), 'wpimport.png');
        return $response;
    }
}