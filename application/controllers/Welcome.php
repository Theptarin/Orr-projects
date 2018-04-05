<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * หน้าจอหลักของระบบ
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
        $output = "Welcome " . $this->orr_authorize_model->get_sign_status()->user;
        $this->home((object) ['output' => $output, 'js_files' => array(base_url('assets/jquery/jquery-3.2.1.min.js'), base_url('assets/jquery/jquery-3.2.1.min.js')), 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'))]);
    }

    /**
     * singin : 
     * 
     */
    public function sign_in() {
        $this->load->view('welcome_sign_in');
    }

    /**
     * ตรวจสอบรหัสผู้ใช้งาน จากหน้าจอเข้าระบบ
     * 
     */
    public function check_in() {
        $this->orr_authorize_model->sign_in($this->input->post('username'), $this->input->post('password'));
        $sign_status = $this->orr_authorize_model->get_sign_status();
        $output = "Singin is " . $sign_status->user . " KEY " . $sign_status->key;
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
