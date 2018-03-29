<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Orr_authorize : 
 *
 * @author it
 */
class Orr_authorize extends CI_Model {

    public $user;
    public $pass;

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->load->database('orr-projects');
    }

    /**
     * getSinginStatus : return singin status
     * @return string connected , not_authorized , unknown
     */
    public function get_singin_status() {
        $sql = "SELECT * FROM `my_user` WHERE  `user` = ? AND `status` = ?";
        $query = $this->db->query($sql,  array($this->user , 0));
        if($query->num_rows() === 1){
            return 'connected';
        }else{
            return 'unknown';
        }
    }

}
