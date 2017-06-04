<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Welcome
 * ตัวอย่างหน้าจอเริ่มต้น
 * @link Orr-projects/index.php/Welcome/
 * @author suchart bunhachirat
 */
class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database('orr-projects');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('orr_projects');
    }

    private function set_view($output) {
        $this->load->view('welcome_home.php', (array) $output);
    }

    public function index() {
        $this->set_view((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function my_sys() {
        try {
            $crud = new Orr_projects();

            $crud->set_theme('datatables');
            $crud->set_table('my_sys');
            $crud->set_subject('โปรแกรม');
            $crud->required_fields(array('sys_id','any_use','any_user','aut_user','aut_group','aut_any','aut_god'));
            $crud->default_as('any_use', 1)->default_as('aut_user', 3)->default_as('aut_group', 2)->default_as('aut_any', 1);
            $crud->columns('sys_id', 'title', 'description');
            $crud->display_as('sys_id', 'รหัส')->display_as('aut_user', 'สิทธ์เจ้าของ')->display_as('title', 'ชื่อโปรแกรม');

            $crud->field_type('any_use', 'dropdown', array('0' => '0 ระบุ', '1' => '1 ไม่ระบุ'));
           
            $output = $crud->render();

            $this->set_view($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}
