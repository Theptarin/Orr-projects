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
        $this->load->model('orr_authorize');
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
     * singin_check : 
     * 
     */
    public function singin_check() {
        $this->orr_authorize->user = $this->input->post('username');
        $this->orr_authorize->pass = $this->input->post('password');

        switch ($this->orr_authorize->get_singin_status()) {
            case "connected":
                $output = "Singin user root staus is connected. ";
                break;
            case "unknown":
                $output = "Singin user is unknown. ";
                break;
            default :
                $output = "Singin is invalid. ";
        }

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
