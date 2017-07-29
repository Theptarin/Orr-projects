<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Bootstrap
 * Testing Bootstrap view
 * @author suchart bunhachirat
 */
class Bootstrap extends CI_Controller{
    public function index() {
        $this->load->view("bootstrap_basic");
    }
}
