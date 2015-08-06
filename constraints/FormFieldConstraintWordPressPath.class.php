<?php
class FormFieldConstraintWordPressPath extends AbstractFormFieldConstraint {
    public function __construct($error_message = '') {
        if(empty($error_message)) {
            $error_message = LangLoader::get_message('constraint.wp-path', 'common', 'wpimport');
        }
        $this->set_validation_error_message($error_message);
    }

    public function validate(FormField $field) {
        $value = $field->get_value();

        if(empty($value))
            return false;

        if(file_exists($value)) {
            $value = substr($value, -1) == '/' ? $value : $value . '/';
            if(file_exists($value . 'wp-config.php')) {
                require_once $value . 'wp-config.php';
                if(defined('DB_HOST'))
                    return true;
            }
        }

        return false;
    }
}