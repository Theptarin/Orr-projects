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
            //$crud = new grocery_CRUD();
            $crud = new Orr_projects();

            $crud->set_theme('datatables');
            $crud->set_table('my_sys');
            $crud->set_subject('โปรแกรม');
            $crud->required_fields('sys_id');
            $crud->columns('sys_id', 'title', 'description');
            $crud->display_as('sys_id', 'รหัส')->display_as('title', 'ชื่อโปรแกรม'); //

            $crud->field_type('any_use', 'dropdown', array('0' => '0 ระบุ', '1' => '1 ไม่ระบุ'));
            //$crud->field_type('sec_user', 'readonly'); //อ่านได้อย่างเดียว
            //$crud->field_type('sec_time', 'readonly');
            $output = $crud->render();

            $this->set_view($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}
