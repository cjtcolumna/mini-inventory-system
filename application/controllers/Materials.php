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
        
        $data['materials']  = $this->material_model->get_material_list();
        $data['total_records'] = count($data['materials']);
        $this->load->view('templates/header', $data);
        $this->load->view('materials/list', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = 'MATERIALS | NEW';
        $data['dropify'] = TRUE;

        $data['error_msg'] = '';


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
                $config['upload_path'] = 'uploads\materials\images';//'c:\wamp64\www\mini-inventory-system\uploads\materials\images'; base_url('uploads/materials/images');
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = "{$this->input->post('input_name')} {$this->input->post('input_code')}";
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
}
