<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_user_list()
    {
        $query = $this->db->get('tbluser');
        return $query->result_array();
    }

    public function get_user($id)
    {
        $query = $this->db->get_where('tbluser', array('lid' => $id));
        return $query->row_array();
    }

    public function create_user()
    {
        $hashed_input_password = hash("sha256", $this->input->post('input_password'));
        $inputs = array(
            'lfirstname' => $this->input->post('input_firstname'),
            'llastname' => $this->input->post('input_lastname'),
            'lemail' => $this->input->post('input_email'),
            'lpassword' => $hashed_input_password
        );
        $query = $this->db->insert('tbluser', $inputs);
        return $query;
    }

    public function update_user_profile($user_id)
    {
        $data = array (
            'lfirstname' => $this->input->post('input_firstname'),
            'llastname' => $this->input->post('input_lastname'),
            'lemail' => $this->input->post('input_email')
        );
        $this->db->where('lid', $user_id);
        $this->db->update('tbluser', $data);

        if($user_id === $this->session->userdata('id')){
            $this->session->set_userdata('firstname', $this->input->post('input_firstname'));
            $this->session->set_userdata('lastname', $this->input->post('input_lastname'));
            $this->session->set_userdata('email', $this->input->post('input_email'));
        }
    }

    public function update_user_password($user_id)
    {
        $hashed_input_password = hash("sha256", $this->input->post('input_new_password'));
        $this->db->where('lid', $user_id);
        $this->db->update('tbluser', array('lpassword' => $hashed_input_password));
    }

    public function delete_user($user_id)
    {
        $this->db->delete('tbluser', array('lid' => $user_id));

        if($user_id === $this->session->userdata('id')){
            redirect('dashboard/logout');
        }
    }
}
