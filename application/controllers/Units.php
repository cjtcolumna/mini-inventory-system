<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Units extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'upload', 'CurrentUserClass'));
        $this->load->helper(array('form', 'url_helper'));
        $this->load->model('unit_model');
    }

    public function index()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = 'UNITS';
        $data['units']  = $this->unit_model->get_unit_list_with_status();
        $data['total_records'] = count($data['units']);

        $this->form_validation->set_rules('input_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('input_display', 'Unit Display', 'required');
        $this->form_validation->set_rules('input_qty', 'Quantity', 'required');

        $btn_create = $this->input->post('btn_create');
        $btn_update = $this->input->post('btn_update');
        $btn_delete = $this->input->post('btn_delete');
        if (isset($btn_create)) {
            if ($this->form_validation->run() === FALSE) {
                //set error message
                $data['error_msg'] = validation_errors();
            } else {
                //create data to db
                $this->unit_model->create_unit_record();
                //set success message
                $this->session->set_flashdata('success_msg', 'Unit record successfully created.');
                //refresh
                redirect('units/list');
            }
        } else if (isset($btn_update)) {
            if ($this->form_validation->run() === FALSE) {
                //set error message
                $data['error_msg'] = validation_errors();
            } else {
                //update data from db
                $this->unit_model->update_unit_record();
                //set success message
                $this->session->set_flashdata('success_msg', 'Unit record successfully updated.');
                //refresh
                redirect('units/list');
            }
        } else if (isset($btn_delete)) {
            $id = $btn_delete;
            //update data from db
            $this->unit_model->delete_unit_record($id);
            //set success message
            $this->session->set_flashdata('success_msg', 'Unit record successfully deleted.');
            //refresh
            redirect('units/list');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('units/list', $data);
        $this->load->view('templates/footer');
    }
}
