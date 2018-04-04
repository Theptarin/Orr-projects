<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orr_welcome
 *
 * @author it
 */
class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('orr_authorize_model');
    }

    /**
     * index :
     * @param String $name Description
     *  @return NULL
     */
    public function index() {
        $output = "Welcome Orr-projects Testing  output.";
        $this->home((object) ['output' => $output, 'js_files' => array(base_url('assets/jquery/jquery-3.2.1.min.js'), base_url('assets/jquery/jquery-3.2.1.min.js')), 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'))]);
    }

    /**
     * singin : 
     * 
     */
    public function singin() {
        $this->load->view('welcome_singin');
    }

    /**
     * ตรวจสอบรหัสผู้ใช้งาน จากหน้าจอเข้าระบบ
     * 
     */
    public function singin_check() {
        $output = $this->orr_authorize_model->get_singin($this->input->post('username'), $this->input->post('password'));
        $output = "Singin is " . $output;
        $this->home((object) ['output' => $output, 'js_files' => array(base_url('assets/jquery/jquery-3.2.1.min.js'), base_url('assets/jquery/jquery-3.2.1.min.js')), 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'))]);
    }

    /**
     * 
     * @param type $output
     */
    private function home($output) {
        $this->load->view('welcome_home', (array) $output);
    }

}
