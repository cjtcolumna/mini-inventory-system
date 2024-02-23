<?php
class Account_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_user() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $hashed_password = hash("sha256", $password);
        $query = $this->db->get_where('tbluser', array('lemail' => $email, 'lpassword' => $hashed_password));
        return $query->row_array();
    }

    
}
