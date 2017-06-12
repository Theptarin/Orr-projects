<?php

/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Orr_projects
 * 
 * A Codeigniter library .
 *
 * @package Orr-projects
 * @author Suchart Bunhachirat <suchartbu@gmail.com>
 * 
 */
class Orr_projects extends Grocery_CRUD {

    protected $default_as = [];

    /**
     *
     * Constructor
     *
     * @access  public
     */
    public function __construct() {
        parent::__construct();
        try {
            /**
             * Orr-projects
             *  - Read only fields
             */
            $this->field_type('id', 'readonly')->field_type('sec_time', 'readonly')->field_type('sec_ip', 'readonly')->field_type('sec_script', 'readonly');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     *
     * Default value of the field.
     * field type can use : string , readonly
     * @param $field_name
     * @param $default_as
     * @return void
     */
    public function default_as($field_name, $default_as = null) {

        if (is_array($field_name)) {
            foreach ($field_name as $field => $default_as) {
                $this->default_as[$field] = $default_as;
            }
        } elseif ($default_as !== null) {
            $this->default_as[$field_name] = $default_as;
        }
        return $this;
    }
    /**
     * 
     * @param object $field_info
     * @param $value
     * @return void
     */
    private function get_value($field_info, $value) {
        if (isset($this->default_as[$field_info->name]) && empty($value)) {
            $value = $this->default_as[$field_info->name];
        }
        return $value;
    }

    /**
     * 
     * Override method for default value.
     */
    protected function get_string_input($field_info, $value) {
        return parent::get_string_input($field_info, $this->get_value($field_info, $value));
    }

    /**
     * 
     * Override method for default value.
     */
    protected function get_readonly_input($field_info, $value) {
        return parent::get_readonly_input($field_info, $this->get_value($field_info, $value));
    }

    /**
     * 
     * Override method for default value.
     */
    protected function get_dropdown_input($field_info, $value) {
        return parent::get_dropdown_input($field_info, $this->get_value($field_info, $value));
    }

    /**
     * 
     * Override method for default value.
     */
    protected function get_integer_input($field_info, $value) {
        return parent::get_integer_input($field_info, $this->get_value($field_info, $value));
    }

}
