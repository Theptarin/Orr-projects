<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Welcome
 *
 * @author it
 */
class Welcome extends CI_Controller {

    private $use_set = ['0' => '0 ระบุ', '1' => '1 ไม่ระบุ'];
    private $aut_set = ['0' => '0 ไม่ได้', '1' => '1 อ่านได้', '2' => '2 เขียนได้', '3' => '3 ลบได้'];

    public function __construct() {
        parent::__construct();
        $this->load->database('orr-projects');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('orr_projects');
    }

    private function set_view($output) {
        $this->load->view('welcome_home', (array) $output);
    }

    public function index() {
        $output = "This is output.";
        $this->set_view((object) ['output' => $output, 'js_files' => array(base_url('assets/jquery/jquery-3.2.1.min.js'), base_url('assets/jquery/jquery-3.2.1.min.js')), 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'))]);
    }

    public function login() {
        $this->load->view('login');
    }

    public function my_sys() {
        try {
            $crud = new Orr_projects();

            $crud->set_theme('datatables');
            $crud->set_table('my_sys');
            $crud->set_subject('โปรแกรม');
            $crud->columns('sys_id', 'title', 'description');
            $crud->required_fields(array('sys_id', 'any_use', 'any_user', 'aut_user', 'aut_group', 'aut_any', 'aut_god'));
            $crud->default_as('any_use', 1)->default_as('aut_user', 3)->default_as('aut_group', 2)->default_as('aut_any', 1)
                    ->default_as('aut_god', 1);
            $crud->display_as('sys_id', 'รหัส')->display_as('aut_user', 'สิทธ์เจ้าของ')->display_as('title', 'ชื่อโปรแกรม');

            $crud->field_type('any_use', 'dropdown', $this->use_set)->field_type('aut_user', 'dropdown', $this->aut_set)
                    ->field_type('aut_group', 'dropdown', $this->aut_set)->field_type('aut_any', 'dropdown', $this->aut_set)
                    ->field_type('aut_god', 'dropdown', $this->use_set);
            $crud->set_relation('aut_can_from', 'my_sys', '{sys_id}  -  {title}');
            $crud->set_relation('sec_user', 'my_user', '{user}  -  {fname} {lname}');


            $output = $crud->render();

            $this->set_view($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}
