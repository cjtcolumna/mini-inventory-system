<?php
class material_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    //MATERIALS
    public function get_material_list()
    {
        $query = $this->db->get_where('tblmaterial', array('lis_finish_product' => FALSE));
        return $query->result_array();
    }

    public function get_material_record($material_id)
    {
        $query = $this->db->get_where('tblmaterial', array('lid' => $material_id));
        return $query->row_array();
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

    public function update_material_record($material_id, $image_name = '')
    {
        $checkbox = $this->input->post('checkbox_default_unit');
        $is_unit_set_default = $checkbox ? TRUE : FALSE;

        $data = array(
            'lname' => $this->input->post('input_name'),
            'lcategory' => $this->input->post('input_category'),
            'lunit' => $this->input->post('input_unit'),
            'lunit_set' => $this->input->post('input_unit_set'),
            'lunit_set_default' => $is_unit_set_default,
            'lunit_qty' => $this->input->post('input_unit_qty'),
            'lqty' => $this->input->post('input_qty'),
        );

        if (!empty($image_name)) {
            $data['limage'] = $image_name;
        }
        $this->db->where('lid', $material_id);
        $this->db->update('tblmaterial', $data);
    }

    public function delete_material_record($material_id)
    {
        //get image name
        $image_name = $this->get_image_name($material_id);
        //delete image from uploads
        $this->delete_image($image_name);
        //delete data from db
        $this->db->delete('tblmaterial', array('lid' => $material_id));
    }

    public function get_id($material_code)
    {
        $query = $this->db->get_where('tblmaterial', array('lcode' => $material_code));
        $row = $query->row_array();
        return $row['lid'];
    }

    public function get_code($material_id)
    {
        $query = $this->db->get_where('tblmaterial', array('lid' => $material_id));
        $row = $query->row_array();
        return $row['lcode'];
    }

    public function get_image_name($material_id)
    {
        $query = $this->db->get_where('tblmaterial', array('lid' => $material_id));
        $row = $query->row_array();
        return $row['limage'];
    }

    public function delete_image($image_name)
    {
        $file_path = "uploads\\materials\\images\\$image_name";
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            FALSE;
        }
    }

    //FINISH PRODUCTS
    public function get_product_list()
    {
        $query = $this->db->get_where('tblmaterial', array('lis_finish_product' => TRUE));
        return $query->result_array();
    }

    public function get_material_unit($material_id)
    {
        $query = $this->db->get_where('tblmaterial', array('lid' => $material_id));
        $row = $query->row_array();
        return $row['lunit'];
    }
    public function get_material_unit_set($material_id)
    {
        $query = $this->db->get_where('tblmaterial', array('lid' => $material_id));
        $row = $query->row_array();
        return $row['lunit_set'];
    }
}
