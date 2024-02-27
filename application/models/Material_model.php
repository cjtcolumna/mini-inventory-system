<?php
class material_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_material_list()
    {
        $query = $this->db->get('tblmaterial');
        return $query->result_array();
    }

    public function create_record($file_name)
    {
        $checkbox = $this->input->post('checkbox_default_unit');
        $is_unit_set_default = $checkbox ? TRUE : FALSE;

        $inputs = array(
            'lcode' => $this->input->post('input_code'),
            'lname' => $this->input->post('input_name'),
            'lcategory' => $this->input->post('input_category'),
            'lunit' => $this->input->post('input_unit'),
            'lunit_set' => $this->input->post('input_unit_set'),
            'lunit_set_default' => $is_unit_set_default,
            'lunit_qty' => $this->input->post('input_unit_qty'),
            'lqty' => $this->input->post('input_qty'),
            'limage' => $file_name,
        );

        $query = $this->db->insert('tblmaterial', $inputs);
        return $query;
    }
}
