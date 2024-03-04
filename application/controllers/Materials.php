<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materials extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'upload', 'CurrentUserClass'));
        $this->load->helper(array('form', 'url_helper'));
        $this->load->model('material_model');
    }

    public function index()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = 'MATERIALS';
        $data['form_addons']= TRUE;
        $data['materials']  = $this->material_model->get_material_list();
        $data['total_records'] = count($data['materials']);
        $this->load->view('templates/header', $data);
        $this->load->view('materials/list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = 'MATERIALS | NEW';
        $data['dropify'] = TRUE;
        $data['form_addons'] = TRUE;

        $data['materials']  = $this->material_model->get_material_list();
        $data['units'] = $this->material_model->get_unit_list();

        $btn_save_clicked = $this->input->post('btn_save');
        if (isset($btn_save_clicked)) {
            //form validations
            $this->form_validation->set_rules('input_code', 'Code', 'required');
            $this->form_validation->set_rules('input_name', 'Name', 'required');
            $this->form_validation->set_rules('input_unit', 'Unit', 'required');
            $this->form_validation->set_rules('input_unit_set', 'Unit Set', 'required');
            $this->form_validation->set_rules('input_unit_qty', 'Unit Qty', 'required');
            $this->form_validation->set_rules('input_qty', 'Qty', 'required');
            if ($this->form_validation->run() === FALSE) {
                //set error message
                $data['error_msg'] = validation_errors();
            } else {
                //file upload
                $config['upload_path'] = 'uploads\materials\images'; //'c:\wamp64\www\mini-inventory-system\uploads\materials\images'; base_url('uploads/materials/images');
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['overwrite'] = TRUE;
                $config['file_name'] = strtolower($this->input->post('input_code')) . "_" . uniqid();
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('input_image')) {
                    //set error message
                    $data['error_msg'] = $this->upload->display_errors();
                } else {
                    //image upload success
                    $image_name = $this->upload->data('file_name');
                    //add data to db
                    $this->material_model->create_record($image_name);
                    //set success message
                    $this->session->set_flashdata('success_msg', 'Material record successfully created.');
                    //redirect to customers/list
                    redirect('materials/list');
                }
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('materials/create', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($material_id)
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = "MATERIALS | VIEW";
        $data['dropify'] = TRUE;
        //record settings
        $btn_1 = $this->input->post('btn_record_settings');
        //change password
        $btn_2 = $this->input->post('btn_record_deletion');

        if (isset($btn_1)) {
            //form validations
            $this->form_validation->set_rules('input_name', 'Name', 'required');
            $this->form_validation->set_rules('input_unit', 'Unit', 'required');
            $this->form_validation->set_rules('input_unit_set', 'Unit Set', 'required');
            $this->form_validation->set_rules('input_unit_qty', 'Unit Qty', 'required');
            $this->form_validation->set_rules('input_qty', 'Qty', 'required');

            if ($this->form_validation->run() === FALSE) {
                //set error message
                $data['error_msg'] = validation_errors();
            } else {
                if ($_FILES['input_image']['error'] === UPLOAD_ERR_OK) {
                    //file upload
                    $config['upload_path'] = 'uploads\materials\images';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = strtolower($this->material_model->get_code($material_id)) . "_" . uniqid();
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('input_image')) {
                        //set error message
                        $data['error_msg'] = $this->upload->display_errors();
                    } else {
                        //delete old image
                        $image_name = $this->material_model->get_image_name($material_id);
                        $this->material_model->delete_image($image_name);
                        //image upload success
                        $image_name = $this->upload->data('file_name');
                        //update data
                        $this->material_model->update_material_record($material_id, $image_name);
                        //set success message
                        $data['success_msg'] = 'Material record successfully updated.';
                    }
                } else {
                    //update data
                    $this->material_model->update_material_record($material_id);
                    //set success message
                    $data['success_msg'] = 'Material record successfully updated.';
                }
            }
        } else if (isset($btn_2)) {
            $this->form_validation->set_rules('checkbox_delete', 'Checkbox', 'required');

            if ($this->form_validation->run() === FALSE) {
                //set error message
                $data['error_msg'] = validation_errors();
            } else {
                //delete material data
                $this->material_model->delete_material_record($material_id);
                //set success message
                $this->session->set_flashdata('success_msg', 'Material record successfully deleted.');
                //redirect
                redirect('materials/list');
            }
        }

        //get material record where id=material_id
        $row = $this->material_model->get_material_record($material_id);

        if (!empty($row)) {
            $data['material_id'] = $material_id;
            $data['material_code'] = $row['lcode'];
            $data['material_name'] = $row['lname'];
            $data['material_category'] = $row['lcategory'];
            $data['material_unit'] = $row['lunit'];
            $data['material_unit_set'] = $row['lunit_set'];
            $data['material_unit_set_default'] = $row['lunit_set_default'];
            $data['material_unit_qty'] = $row['lunit_qty'];
            $data['material_qty'] = $row['lqty'];
            $data['material_image'] = $row['limage'];
            $this->load->view('templates/header', $data);
            $this->load->view('materials/view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            //no record found
            redirect('materials/list');
        }
    }

    public function get_id($material_code)
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $material_id = $this->material_model->get_id($material_code);
        redirect("materials/view/$material_id");
    }
}
