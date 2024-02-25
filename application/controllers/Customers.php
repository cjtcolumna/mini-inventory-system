<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'CurrentUserClass'));
        $this->load->helper(array('form', 'url_helper'));
        $this->load->model('customer_model');
    }

    public function index()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = 'CUSTOMERS';
        $customer_list = $this->customer_model->get_customer_list();
        if (!empty($customer_list)) {
            $data['customers'] = $customer_list;
        };

        $this->load->view('templates/header', $data);
        $this->load->view('customers/list', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = "CUSTOMERS | CREATE";

        $btn_save_clicked = $this->input->post('btn_save');
        if (isset($btn_save_clicked)) {
            $this->form_validation->set_rules('input_code', 'Code', 'required');
            $this->form_validation->set_rules('input_firstname', 'First Name', 'required');
            $this->form_validation->set_rules('input_lastname', 'Last Name', 'required');

            if ($this->form_validation->run() === FALSE) {
                //set error message
                $data['error_msg'] = validation_errors();
            } else {
                //add data to db
                $this->customer_model->create_customer();
                //set success message
                $this->session->set_flashdata('success_msg', 'Customer record successfully created.');
                //redirect to customers/list
                redirect('customers/list');
            }
        } 
        $this->load->view('templates/header', $data);
        $this->load->view('customers/create', $data);
        $this->load->view('templates/footer');
    }
    //DONE

    public function view($customer_id)
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = "CUSTOMERS | VIEW";
        //record settings
        $btn_1 = $this->input->post('btn_record_settings'); 
        //change password
        $btn_2 = $this->input->post('btn_record_deletion');

        if(isset($btn_1)) { 
            $this->form_validation->set_rules('input_code', 'Code', 'required');
            $this->form_validation->set_rules('input_firstname', 'First Name', 'required');
            $this->form_validation->set_rules('input_lastname', 'Last Name', 'required');

            if($this->form_validation->run() === FALSE){
                //set error message
                $data['error_msg'] = validation_errors();
            }else {
                //update data
                $this->customer_model->update_customer_record($customer_id);
                //set success message
                $data['success_msg'] = 'Customer record successfully updated.';
            }
        }else if(isset($btn_2)) {
            $this->form_validation->set_rules('checkbox_delete', 'Checkbox', 'required');

            if($this->form_validation->run() === FALSE){
                //set error message
                $data['error_msg'] = validation_errors();
            }else{
                //delete customer data
                $this->customer_model->delete_customer_record($customer_id);
                //set success message
                $this->session->set_flashdata('success_msg', 'Customer record successfully deleted.');
                //redirect
                redirect('customers/list');
            }
        }

        //get customer where id=customer_id
        $row = $this->customer_model->get_customer($customer_id);
        if (!empty($row)) {
            $data['customer_id'] = $row['lid'];
            $data['customer_code'] = $row['lcode'];
            $data['customer_firstname'] = $row['lfirstname'];
            $data['customer_lastname'] = $row['llastname'];
            $data['customer_contact'] = $row['lcontact'];
            $this->load->view('templates/header', $data);
            $this->load->view('customers/view', $data);
            $this->load->view('templates/footer');
        } else {
            //no record found
            redirect('customers/list');
        }
    }
}