<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tests
 *
 * @author it
 */
class Tests extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    private function set_view($output) {
        $this->load->view('test_home', (array) $output);
    }

    public function index() {
        $output = "This is output.";
        $this->set_view((object) ['output' => $output, 'js_files' => array() , 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'),base_url('assets/stylesheet/css/login.css'))]);
    }
    
    public function login(){
        $this->load->view('login');
    }
    
}
