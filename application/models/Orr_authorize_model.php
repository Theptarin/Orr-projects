<?php

/**
 * Orr-projects Authorize Class
 * คลาสการตรวจสอบสิทธิ์การเข้าถึงข้อมูล
 * @package Orr-projects
 * @author Suchart Bunhachirat <suchartbu@gmail.com>
 * @version 2561
 */
class Orr_authorize_model extends CI_Model {
    
    public $user = NULL;


    /**
     * User status : online , offline , missing
     * @var String 
     */
    public $status = NULL;

    /**
     * Sign status
     * @var array 
     */
    protected $sign_status = [];

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
     * สถานะการเข้าใชัระบบ
     * @return array
     */
    private function sign_status() {
        /**
         * เช็คข้อมูลผุ้ใช้งานจากฐานข้อมูล
         */
        if ($this->session->has_userdata('sign_status')) {
            $this->sign_status = json_decode($this->session->userdata('sign_status'));
            $sql = "SELECT * FROM  `my_user`  WHERE  id = ? AND`status` = 0 ";
            $query = $this->db->query($sql, array($this->sign_status->id));
            if ($this->sign_status->key === md5($query->row()->sec_time)) {
                $this->user = $query->row()->user;
                $this->status = "online";
            } else {
                $this->sing_out();
                $this->status = "missing";
            }
        } else {
            $this->status = "offline";
        }
        return $this->status;
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
            $data = json_encode(array('id' => $query->row()->id, 'user' => $query->row()->user, 'key' => md5($query->row()->sec_time), 'status' => "on line"));
            $this->session->set_userdata("sign_status", $data);
        } 
        return $this->sign_status();
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
