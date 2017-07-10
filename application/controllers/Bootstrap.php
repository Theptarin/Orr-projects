<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Bootstrap
 *
 * @author it
 */
class Bootstrap extends CI_Controller{
    public function index() {
        $this->load->view("bootstrap_basic");
    }
}
