<?php

/**
 * Orr-projects Authorize Class
 * คลาสการตรวจสอบสิทธิ์การเข้าถึงข้อมูล
 * @package Orr-projects
 * @author Suchart Bunhachirat <suchartbu@gmail.com>
 * @version 2561
 */
class Orr_authorize extends CI_Model {

    public $user;
    public $pass;

    /**
     * Class construct
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->load->database('orr-projects');
    }

    /**
     * เช็คข้อมูลผู้ใช้งานในฐานข้อมูล ค่าที่ได้ connected=เข้าใช้งานได้ , unknown=ไม่มีข้อมูล
     * @param string $user username
     * @param string $pass password
     * @return string connected , not_authorized , unknown
     */
    public function get_singin_status() {
        $sql = "SELECT * FROM `my_user` WHERE  `user` = ? AND `status` = ?";
        $query = $this->db->query($sql, array($this->user, 0));
        if ($query->num_rows() === 1) {
            return 'connected';
        } else {
            return 'unknown';
        }
    }

}
