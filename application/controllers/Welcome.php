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

    private $welcome_message = [];
    private $sign_data = NULL;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('orr_authorize_model');
        /**
         * $view 
         */
        $this->sign_data = $this->orr_authorize_model->sign_data;
        $this->welcome_message = array('sign_status' => $this->sign_data['status'] , 'title' =>"Orr projects Home" , 'topic'=>"Welcome...");    
    }

    /**
     * index :
     * @param String $name Description
     * @return NULL
     */
    public function index() {
        $this->home((object) ['welcome_message' => $this->welcome_message, 'js_files' => array(base_url('assets/jquery/jquery-3.2.1.min.js'), base_url('assets/jquery/jquery-3.2.1.min.js')), 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'))]);
    }

    /**
     * singin : 
     * 
     */
    public function sign_in_page() {
        $this->load->view('welcome_sign_in');
    }

    /**
     * ตรวจสอบรหัสผู้ใช้งาน จากหน้าจอเข้าระบบ
     * 
     */
    public function sign_in() {
        $this->orr_authorize_model->sign_in($this->input->post('username'), $this->input->post('password'));
        $this->index();
        //$this->home((object) ['message' => $this->message, 'js_files' => array(base_url('assets/jquery/jquery-3.2.1.min.js'), base_url('assets/jquery/jquery-3.2.1.min.js')), 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'))]);
        }

        /**
         * 
         * @param type $message
         */
        private function home($message) {
        $this->load->view('welcome_home', (array) $message);
    }

}
