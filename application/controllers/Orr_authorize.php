<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orr_authorize
 *
 * @author suchart bunhachirat
 */
class Orr_authorize extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    /**
     * Check singin status
     *  
     */
    
    public function index(){
        $this->load->view('login.php');
    }
    
}
