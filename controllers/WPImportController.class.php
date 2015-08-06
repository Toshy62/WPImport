<?php
class WPImportController extends AdminModuleController {
    /**
     * @var View
     */
    private $views;

    /**
     * @var HTMLForm
     */
    private $form;

    private $submit_button;

    /**
     * @var array
     */
    private $lang;

    function execute(HTTPRequestCustom $request) {
        // Define template
        $this->views = new FileTemplate('wpimport/import.tpl');
        // Load lang
        $this->lang = LangLoader::get('common', 'wpimport');
        // Add lang
        $this->views->add_lang($this->lang);
        // Build Form
        $this->build_form();
        // Add Form to template
        $this->views->put('FORM', $this->form->display());

        // Check max_execution_time
        $maxExecutionTime = ini_get('max_execution_time');
        $this->views->put('CAN_SET_EXECUTION_TIME', false);
        $this->views->put('MAX_EXECUTION_TIME', $maxExecutionTime);
        @ini_set('max_execution_time', 0);
        if(ini_get('max_execution_time') == 0) {
            $this->views->put('CAN_SET_EXECUTION_TIME', true);
        }

        if ($this->submit_button->has_been_submited() && $this->form->validate()) {
            $importer = array();
            if($this->form->get_field_by_id('importer_User')->get_value()) $importer[] = 'User';
            if($this->form->get_field_by_id('importer_Cat')->get_value()) $importer[] = 'Cat';
            if($this->form->get_field_by_id('importer_Article')->get_value()) $importer[] = 'Article';

            session_start();
            $_SESSION['wpimport'] = array(
                'phpboostpath' => $this->form->get_field_by_id('phpboostpath')->get_value(),
                'wppath' => $this->form->get_field_by_id('wppath')->get_value(),
                'default_author' => $this->form->get_field_by_id('default_author')->get_value(),
                'default_cat_image' => $this->form->get_field_by_id('default_cat_image')->get_value(),
                'import_location' => $this->form->get_field_by_id('import_location')->get_value(),
                'importer' => implode(',', $importer)
            );

            AppContext::get_response()->redirect(DispatchManager::get_url('../wpimport', '/admin/import/start'));

        }

        return $this->build_response();
    }

    private function build_response() {
        $response = new AdminMenuDisplayResponse($this->views);
        $response->get_graphical_environment()->set_page_title('Importation');
        $response->add_link($this->lang['menu.title'], DispatchManager::get_url('../wpimport', '/admin/import'), 'wpimport.png');
        return $response;
    }

    public function build_form() {
        $form = new HTMLForm(__CLASS__);

        // Fieldset to configure path
        $fieldsetPath = new FormFieldsetHTML('wpimport-path', $this->lang['wpimport.fieldset-path']);
        $form->add_fieldset($fieldsetPath);

        $fieldsetPath->add_field(new FormFieldTextEditor('phpboostpath', $this->lang['wpimport.phpboostpath'], realpath(__DIR__ . '/../../')));
        $fieldsetPath->add_field(new FormFieldTextEditor('wppath', $this->lang['wpimport.wppath'], realpath(__DIR__ . '/../../../'), array(), array(
            new FormFieldConstraintWordPressPath($this->lang['constraint.wp-path'])
        )));

        // Fieldset to configure which data are import
        $fieldsetImporter = new FormFieldsetHTML('wpimport-importer', $this->lang['wpimport.fieldset-importer']);
        $form->add_fieldset($fieldsetImporter);

        $importers = $this->listImporters();
        foreach($importers as $importer) {
            $fieldsetImporter->add_field(new FormFieldCheckbox('importer_' . $importer['name'], $importer['name'], FormFieldCheckbox::UNCHECKED, array(
                'description' => $this->lang['wpimport.description'] . ': ' . utf8_decode($importer['description']) . '<br />' . $this->lang['wpimport.version'] . ': ' . $importer['version']
            )));
        }

        // Fieldset to confgure options
        $fieldsetOptions = new FormFieldsetHTML('wpimport-options', $this->lang['wpimport.fieldset-options']);
        $form->add_fieldset($fieldsetOptions);

        // Default Author
        $fieldsetOptions->add_field(new FormFieldAjaxUserAutoComplete('default_author', $this->lang['wpimport.default_author'], AppContext::get_current_user()->get_login(), array(
            'description' => $this->lang['wpimport.default_author.decription']
        ), array(new FormFieldConstraintUserExist($this->lang['wpimport.default_author.error_user_exist']))));

        // Default Image
        $fieldsetOptions->add_field(new FormFieldUploadFile('default_cat_image', $this->lang['wpimport.default_cat_image'], $this->getDefaultConfiguration()['PHPBOOST_CAT_IMAGE'], array(
            'description' => $this->lang['wpimport.default_cat_image.description']
        )));

        $fieldsetOptions->add_field(new FormFieldTextEditor('import_location', $this->lang['wpimport.import_location'], $this->getDefaultConfiguration()['FILESYSTEM_IMPORT_LOCATION'], array(
            'description' => $this->lang['wpimport.import_location.description']
        )));

        $this->submit_button = new FormButtonSubmit($this->lang['wpimport.submit_configuration'], 'submit_configuration');
        $form->add_button($this->submit_button);
        $form->add_button(new FormButtonReset($this->lang['wpimport.reset']));

        $this->form = $form;
    }

    private function listImporters() {
        require_once __DIR__ . '/../WP2PhpBoost/lib/Importer.php';
        return Importer::getAvailableImporter();
    }

    private function getDefaultConfiguration() {
        return require __DIR__ . '/../WP2PhpBoost/config-default.php';
    }

}