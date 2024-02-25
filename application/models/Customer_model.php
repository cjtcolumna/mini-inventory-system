<?php
class Customer_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_customer_list()
    {
        $query = $this->db->get('tblcustomer');
        return $query->result_array();
    }

    public function get_customer($id)
    {
        $query = $this->db->get_where('tblcustomer', array('lid' => $id));
        return $query->row_array();
    }

    public function create_customer()
    {
        $inputs = array(
            'lcode' => $this->input->post('input_code'),
            'lfirstname' => $this->input->post('input_firstname'),
            'llastname' => $this->input->post('input_lastname'),
            'lcontact' => $this->input->post('input_contact')
        );
        $query = $this->db->insert('tblcustomer', $inputs);
        return $query;
    }

    public function update_customer_record($customer_id)
    {
        $data = array (
            'lcode' => $this->input->post('input_code'),
            'lfirstname' => $this->input->post('input_firstname'),
            'llastname' => $this->input->post('input_lastname'),
            'lcontact' => $this->input->post('input_contact')
        );
        $this->db->where('lid', $customer_id);
        $this->db->update('tblcustomer', $data);
    }

    public function delete_customer_record($customer_id)
    {
        $this->db->delete('tblcustomer', array('lid' => $customer_id));
    }
}
