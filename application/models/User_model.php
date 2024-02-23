<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_user_list() {
       $query = $this->db->get('tbluser');
       return $query->result_array();
    }

    
}
