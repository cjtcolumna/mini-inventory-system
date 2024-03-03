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

    public function get_unit_list_with_status()
    {
        //get array of units
        $units = $this->get_unit_list();
        //get array of used_units
        $used_units = $this->get_used_units();
        //add status to each units
        for ($i = 0; $i < sizeof($units); $i++) {
            $units[$i]['lstatus'] = in_array($units[$i]['lid'], $used_units) ? "Used" : "Not Used";
        }
        return $units;
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
        $data = array(
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

    public function get_used_units()
    {
        //$this->db->select('DISTINCT unit.lid');
        //$this->db->from('tblunit as unit');
        //$this->db->join('tblmaterial as material', 'unit.lid = material.lunit_id OR unit.lid = material.lunit_set_id');
        //$query = $this->db->get();
        $query = $this->db->query(
        "SELECT DISTINCT unit.lid " .
        "FROM tblunit AS unit " .
        "JOIN tblmaterial AS material ON unit.lid = material.lunit_id OR unit.lid = material.lunit_set_id"
        );
        $result = $query->result_array();
        //process data
        $used_units = array();
        foreach($result as $unit){
            array_push($used_units, $unit['lid']);
        }
        return $used_units;
    }
}
