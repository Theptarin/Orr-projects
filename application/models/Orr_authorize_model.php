<?php

/**
 * Orr-projects Authorize Class
 * คลาสการตรวจสอบสิทธิ์การเข้าถึงข้อมูล
 * @package Orr-projects
 * @author Suchart Bunhachirat <suchartbu@gmail.com>
 * @version 2561
 */
class Orr_authorize_model extends CI_Model {

    /**
     * Class construct
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database('orr-projects');
    }
    
    /**
     * ตรวจสอบสถานะการเข้าใชัระบบ
     * @return array
     */
    public function get_sign_status() {
        /**
         * เช็คข้อมูลผุ้ใช้งานจากฐานข้อมูล
         */
        $sign_status = json_decode($this->session->userdata('sign_status'));
        $sql = "SELECT * FROM  `my_user`  WHERE  id = ? AND`status` = 0 ";
        $query = $this->db->query($sql, array($sign_status->id));
        if ($sign_status->key === md5($query->row()->sec_time)) {
            return $sign_status;
        } else {
            $this->sing_out();
            die("sign status missing");
        }
    }

    /**
     * 
     * @param type $user
     * @param string $pass
     * @return string
     */
    public function sign_in($user, $pass) {
        /**
         * ค้นข้อมูลจากชื่อผู้ใช้ รหัสผ่าน และสถานะ
         */
        $sql = "SELECT * FROM  `my_user`  WHERE  user = ? AND val_pass LIKE  ? AND`status` = 0 ";
        $pass = "%" . md5($pass) . "%";
        $query = $this->db->query($sql, array($user, $pass));
        if ($query->num_rows() === 1) {
            $data = json_encode(array('id' => $query->row()->id, 'user' => $query->row()->user, 'key' => md5($query->row()->sec_time)));
            $this->session->set_userdata("sign_status", $data);
        } else {
            $this->sing_out();
            die("Sign in missing.");
        }
    }

    public function name() {
        $data = json_decode($this->session->userdata('sign_status'));
        return $data->username;
    }

    /**
     * 
     */
    public function sing_out() {
        $this->session->sess_destroy();
    }

}
