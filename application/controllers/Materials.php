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
        $data['form_addons'] = TRUE;
        $data['materials']  = $this->material_model->get_processed_list();
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
        $data['json_materials'] =  json_encode($data['materials']);
        $data['units'] = $this->material_model->get_unit_list();
        $data['json_units'] = json_encode($data['units']);

        $btn_save_clicked = $this->input->post('btn_save');
        if (isset($btn_save_clicked)) {
            //form validations
            $this->form_validation->set_rules('input_code', 'Code', 'required');
            $this->form_validation->set_rules('input_name', 'Name', 'required');
            $this->form_validation->set_rules(
                'select_material_unit_id',
                'Unit',
                'required|numeric',
                array('numeric' => 'Selecting Unit is required.')
            );
            $this->form_validation->set_rules(
                'select_material_unit_set_id',
                'Unit',
                'required|numeric',
                array('numeric' => 'Selecting Unit Set is required.')
            );
            $this->form_validation->set_rules('input_cost', 'Cost', 'required');
            $this->form_validation->set_rules('input_price', 'Price', 'required');
            $this->form_validation->set_rules('input_qty', 'Qty (Inv)', 'required');
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
        $data['form_addons'] = TRUE;

        //Button for adding BOM item
        $btn_add_item = $this->input->post('btn_add_item');
        //Button for deleting BOM item
        $btn_delete_item = $this->input->post('btn_delete_item');
        //Button for deleting Material/Product
        $btn_delete = $this->input->post('btn_delete');

        if (isset($btn_add_item)) {
            $this->form_validation->set_rules(
                'select_bom_material',
                'Material',
                'required|numeric',
                array('numeric' => 'Selecting Material is required.')
            );
            $this->form_validation->set_rules('input_bom_material_consumed', 'Quantity', 'required');
            $this->form_validation->set_rules(
                'select_bom_material_unit',
                'Material',
                'required|numeric',
                array('numeric' => 'Selecting Unit is required.')
            );


            if ($this->form_validation->run() === FALSE) {
                //set error message
                $data['error_msg'] = validation_errors();
            } else {
                //add item
                $this->material_model->add_item_to_bom($material_id);
            }
        } else if (isset($btn_delete_item)) {
            $bom_id = $btn_delete_item;
            $this->material_model->delete_item_from_bom($bom_id);
        } else if (isset($btn_delete)) {
            //delete material data
            $this->material_model->delete_material_record($material_id);
            //set success message
            $this->session->set_flashdata('success_msg', 'Material record successfully deleted.');
            //redirect
            redirect('materials/list');
        }

        //get material record where id=material_id
        $material_record = $this->material_model->get_material_record($material_id);
        if (!empty($material_record)) {
            $data['material'] = $material_record;
            $data['material']['material_id'] = $material_id;
            $data['material']['is_used'] = $this->material_model->is_material_used($material_id);
            $data['is_finish_product'] = $data['material']['lis_finish_product'];

            if ($data['is_finish_product']) {
                $data['bom'] = $this->material_model->get_bom_record($material_id);
                $data['materials'] = $this->material_model->get_processed_list(TRUE);
                $data['json_materials'] =  json_encode($data['materials']);
            }

            $this->load->view('templates/header', $data);
            $this->load->view('materials/view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            //no record found
            redirect('materials/list');
        }
    }

    public function edit($material_id)
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = 'MATERIALS | NEW';
        $data['dropify'] = TRUE;
        $data['form_addons'] = TRUE;

        $data['material']  = $this->material_model->get_material_record($material_id);
        $data['units'] = $this->material_model->get_unit_list();
        $data['material_id'] = $material_id;

        //If btn_save is clicked
        $btn_save = $this->input->post('btn_save');
        if (isset($btn_save)) {
            //form validations
            $this->form_validation->set_rules('input_code', 'Code', 'required');
            $this->form_validation->set_rules('input_name', 'Name', 'required');
            $this->form_validation->set_rules(
                'select_material_unit_id',
                'Unit',
                'required|numeric',
                array('numeric' => 'Selecting Unit is required.')
            );
            $this->form_validation->set_rules(
                'select_material_unit_set_id',
                'Unit',
                'required|numeric',
                array('numeric' => 'Selecting Unit Set is required.')
            );
            $this->form_validation->set_rules('input_cost', 'Cost', 'required');
            $this->form_validation->set_rules('input_price', 'Price', 'required');
            $this->form_validation->set_rules('input_qty', 'Qty (Inv)', 'required');

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
                        $this->session->set_flashdata('success_msg', 'Product record successfully updated.');
                        //redirect
                        redirect("materials/view/{$material_id}");
                    }
                } else {
                    //update data
                    $this->material_model->update_material_record($material_id);
                    //set success message
                    $this->session->set_flashdata('success_msg', 'Product record successfully updated.');
                    //redirect
                    redirect("materials/view/{$material_id}");
                }
            }
        }

        if (!empty($data['material'])) {
            $this->load->view('templates/header', $data);
            $this->load->view('materials/edit', $data);
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
