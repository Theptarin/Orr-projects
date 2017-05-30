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
             * read only system field
             */
            $this->field_type('id', 'readonly');
            $this->field_type('sec_user', 'readonly');
            $this->field_type('sec_time', 'readonly');
            $this->field_type('sec_ip', 'readonly');
            $this->field_type('sec_script', 'readonly');
            
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}
