<?php
class Unit_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_unit_list()
    {
        $query = $this->db->get('tblunit');
        return $query->result_array();
    }

    public function create_unit_record()
    {
        $inputs = array(
            'lname' => $this->input->post('input_name'),
            'ldisplay' => $this->input->post('input_display'),
            'lqty' => $this->input->post('input_qty')
        );
        $query = $this->db->insert('tblunit', $inputs);
        return $query;
    }

    public function update_unit_record()
    {
        $unit_id = $this->input->post('input_id');
        $data = array (
            'lname' => $this->input->post('input_name'),
            'ldisplay' => $this->input->post('input_display'),
            'lqty' => $this->input->post('input_qty')
        );
        $this->db->where('lid', $unit_id);
        $this->db->update('tblunit', $data);
    }
    
    public function delete_unit_record($unit_id)
    {
        $this->db->delete('tblunit', array('lid' => $unit_id));
    }
}
