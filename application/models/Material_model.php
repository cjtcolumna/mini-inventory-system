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
    
    public function get_material_record($material_id)
    {
        $query = $this->db->query(
            "SELECT m.lid, m.lcode, m.limage, m.lname, m.lcategory, m.lunit_id, m.lunit_set_id, m.lunit_set_default, m.lcost, m.lprice, m.lqty, m.lis_finish_product, u.lname as lunit_name, u.ldisplay as lunit_display, u.lqty as lunit_qty, us.lname as lunit_set_name, us.ldisplay as lunit_set_display, us.lqty as lunit_set_qty
            FROM tblmaterial AS m
            JOIN tblunit AS u ON m.lunit_id = u.lid
            JOIN tblunit AS us ON m.lunit_set_id = us.lid
            WHERE m.lid = " . $material_id
        );
        return $query->row_array();
    }

    public function get_unit_list()
    {
        $query = $this->db->get('tblunit');
        return $query->result_array();
    }

    public function get_processed_list($materials_only = FALSE, $keyword = null)
    {
        $this->db->select('
        m.lid, m.lcode, m.limage, m.lname, m.lcategory, m.lunit_id, m.lunit_set_id, m.lunit_set_default, m.lcost, m.lprice, m.lqty, m.lis_finish_product, 
        u.lname as lunit_name, u.ldisplay as lunit_display, u.lqty as lunit_qty, 
        us.lname as lunit_set_name, us.ldisplay as lunit_set_display, us.lqty as lunit_set_qty');
        $this->db->from('tblmaterial AS m');
        $this->db->join('tblunit AS u', 'm.lunit_id = u.lid');
        $this->db->join('tblunit AS us', 'm.lunit_set_id = us.lid');
        if ($materials_only) {
            $this->db->where('m.lis_finish_product', 0);
        }
        if ($keyword) {
            $this->db->like('m.lname', $keyword);
        }

        $this->db->order_by('m.lid', 'DESC');

        $query = $this->db->get();
        return $query->result_array();

        // OLD
        // $where = $materials_only ? " WHERE lis_finish_product = 0" : "";
        // $query = $this->db->query(
        //     "SELECT m.lid, m.lcode, m.limage, m.lname, m.lcategory, m.lunit_id, m.lunit_set_id, m.lunit_set_default, m.lcost, m.lprice, m.lqty, m.lis_finish_product, u.lname as lunit_name, u.ldisplay as lunit_display, u.lqty as lunit_qty, us.lname as lunit_set_name, us.ldisplay as lunit_set_display, us.lqty as lunit_set_qty
        //     FROM tblmaterial AS m
        //     JOIN tblunit AS u ON m.lunit_id = u.lid
        //     JOIN tblunit AS us ON m.lunit_set_id = us.lid" .
        //         $where
        // );
        // $result = $query->result_array();
        // return $result;
    }

    public function get_bom_record($finish_product_id)
    {
        $query = $this->db->query(
            "SELECT b.lid, m.lname, b.lqty_consumed, u.ldisplay, u.lqty as lmultiplier, m.lcost
            FROM tblbom AS b 
            JOIN tblmaterial AS m ON b.lmaterial_id = m.lid 
            JOIN tblunit AS u ON b.lunit_id = u.lid 
            WHERE b.lfinish_product_id = " . $finish_product_id
        );
        return $query->result_array();
    }


    public function get_id($material_code)
    {
        $query = $this->db->get_where('tblmaterial', array('lcode' => $material_code));
        $row = $query->row_array();
        return $row['lid'];
    }

    public function get_image_name($material_id)
    {
        $query = $this->db->get_where('tblmaterial', array('lid' => $material_id));
        $row = $query->row_array();
        return $row['limage'];
    }

    public function get_code($material_id)
    {
        $query = $this->db->get_where('tblmaterial', array('lid' => $material_id));
        $row = $query->row_array();
        return $row['lcode'];
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
                    'lunit_id' => $this->input->post('select_bom_material_unit' . $i),
                    'lqty_consumed' => $this->input->post('input_bom_material_consumed' . $i)
                ));
            }
            $this->db->insert_batch('tblbom', $bom_data);
        }
    }

    public function add_item_to_bom($product_id)
    {
        $inputs = array(
            'lfinish_product_id' => $product_id,
            'lmaterial_id' => $this->input->post('select_bom_material'),
            'lunit_id' => $this->input->post('select_bom_material_unit'),
            'lqty_consumed' => $this->input->post('input_bom_material_consumed')
        );
        $this->db->insert('tblbom', $inputs);
    }

    public function delete_item_from_bom($bom_id)
    {
        //delete data from db
        $this->db->delete('tblbom', array('lid' => $bom_id));
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

    public function is_material_used($material_id)
    {
        $query = $this->db->get_where('tblbom', array('lmaterial_id' => $material_id));
        return $query->num_rows() > 0 ? TRUE : FALSE;
    }
    //USED




    public function update_material_record($material_id, $image_name = '')
    {
        $is_finish_product = $this->input->post('checkbox_is_finish_product') ? TRUE : FALSE;
        $is_unit_set_default = $this->input->post('checkbox_default_unit') ? TRUE : FALSE;

        $inputs = array(
            'lcode' => $this->input->post('input_code'),
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

        if (!empty($image_name)) {
            $inputs['limage'] = $image_name;
        }
        
        $this->db->where('lid', $material_id);
        $this->db->update('tblmaterial', $inputs);
    }
}
