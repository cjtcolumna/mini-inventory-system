<?php
class material_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    //USED
    public function get_material_list()
    {
        $query = $this->db->get('tblmaterial');
        return $query->result_array();
    }

    public function get_unit_list()
    {
        $query = $this->db->get('tblunit');
        return $query->result_array();
    }

    public function get_processed_list()
    {
        $query = $this->db->query(
        "SELECT m.lid, m.lcode, m.limage, m.lname, m.lcategory, m.lunit_id, m.lunit_set_id, m.lunit_set_default, m.lcost, m.lprice, m.lqty, m.lis_finish_product, u.ldisplay as lunit, u.lqty as lunit_qty, us.ldisplay as lunit_set, us.lqty as lunit_set_qty
        FROM tblmaterial AS m
        JOIN tblunit AS u ON m.lunit_id = u.lid
        JOIN tblunit AS us ON m.lunit_set_id = us.lid"
        );
        $result = $query->result_array();
        return $result;
    }

    public function create_record($file_name)
    {
        $is_finish_product = $this->input->post('checkbox_is_finish_product') ? TRUE : FALSE;
        $is_unit_set_default = $this->input->post('checkbox_default_unit') ? TRUE : FALSE;


        //Insert material record to tblmaterial
        $inputs = array(
            'lcode' => $this->input->post('input_code'),
            'limage' => $file_name,
            'lname' => $this->input->post('input_name'),
            'lcategory' => $this->input->post('input_category'),
            'lunit_id' => $this->input->post('select_material_unit_id'),
            'lunit_set_id' => $this->input->post('select_material_unit_set_id'),
            'lunit_set_default' => $is_unit_set_default,
            'lcost' => $this->input->post('input_cost'),
            'lprice' => $this->input->post('input_price'),
            'lqty' => $this->input->post('input_qty'),
            'lis_finish_product' => $is_finish_product
        );
        $this->db->insert('tblmaterial', $inputs);

        //Insert bom record to tbl bom 
        if ($is_finish_product) {
            $id = $this->get_id($this->input->post('input_code'));
            $materials_used_count = $this->input->post('btn_save');
            $bom_data = array();

            for ($i = 1; $i <= $materials_used_count; $i++) {
                array_push($bom_data, array(
                    'lfinish_product_id' => $id,
                    'lmaterial_id' => $this->input->post('select_bom_material' . $i),
                    'lunit_id' => $this->input->post('input_bom_material_consumed' . $i),
                    'lqty_consumed' => $this->input->post('select_bom_material_unit' . $i)
                ));
            }
            $this->db->insert_batch('tblbom', $bom_data);
        }
    }

    public function get_id($material_code)
    {
        $query = $this->db->get_where('tblmaterial', array('lcode' => $material_code));
        $row = $query->row_array();
        return $row['lid'];
    }


    //USED
    public function get_material_record($material_id)
    {
        $query = $this->db->get_where('tblmaterial', array('lid' => $material_id));
        return $query->row_array();
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
