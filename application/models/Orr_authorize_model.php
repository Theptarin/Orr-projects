<?php

/**
 * Orr-projects Authorize Class
 * คลาสการตรวจสอบสิทธิ์การเข้าถึงข้อมูล
 * @package Orr-projects
 * @author Suchart Bunhachirat <suchartbu@gmail.com>
 * @version 2561
 */
class Orr_authorize_model extends CI_Model {

    protected $user;

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
        return;
    }

    /**
     * 
     * @param string $user
     * @param string $pass
     * @return string
     */
    public function get_singin($user, $pass) {
        /**
         * ค้นข้อมูลจากชื่อผู้ใช้ รหัสผ่าน และสถานะ
         */
        $sql = "SELECT * FROM  `my_user`  WHERE  user = ? AND val_pass LIKE  ? AND`status` = 0 ";
        $pass = "%".md5($pass)."%";
        $query = $this->db->query($sql, array($user,$pass));
        if ($query->num_rows() === 1) {
            return 'connected';
        } else {
            return 'unknown';
        }
    }

}
