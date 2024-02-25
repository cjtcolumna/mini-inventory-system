<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'CurrentUserClass'));
        $this->load->helper(array('form', 'url_helper'));
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = 'USERS';
        $user_list = $this->user_model->get_user_list();
        if (!empty($user_list)) {
            $data['users'] = $user_list;
        };

        $this->load->view('templates/header', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = "USERS | CREATE";

        $btn_save_clicked = $this->input->post('btn_save');
        if (isset($btn_save_clicked)) {
            $this->form_validation->set_rules('input_firstname', 'First Name', 'required');
            $this->form_validation->set_rules('input_lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('input_password', 'Password', 'required');
            $this->form_validation->set_rules('input_confirm_password', 'Password Confirmation', 'required|matches[input_password]');

            if ($this->form_validation->run() === FALSE) {
                //set error message
                $data['error_msg'] = validation_errors();
            } else {
                //add data to db
                $this->user_model->create_user();
                //set success message
                $this->session->set_flashdata('success_msg', 'User account successfully created.');
                //redirect to users/list
                redirect('users/list');
            }
        } 
        $this->load->view('templates/header', $data);
        $this->load->view('users/create', $data);
        $this->load->view('templates/footer');
    }

    public function view($user_id)
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));

        $data['title'] = "USERS | VIEW";
        //profile settings
        $btn_1 = $this->input->post('btn_profile_settings'); 
        //change password
        $btn_2 = $this->input->post('btn_change_password');
        //account settings
        $btn_3 = $this->input->post('btn_account_settings');

        if(isset($btn_1)) { 
            $this->form_validation->set_rules('input_firstname', 'First Name', 'required');
            $this->form_validation->set_rules('input_lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');

            if($this->form_validation->run() === FALSE){
                //set error message
                $data['error_msg'] = validation_errors();
            }else {
                //update data
                $this->user_model->update_user_profile($user_id);
                //set success message
                $data['success_msg'] = 'User profile settings successfully updated.';
            }
        }else if(isset($btn_2)) {
            $this->form_validation->set_rules('input_new_password', 'Password', 'required');
            $this->form_validation->set_rules('input_new_password_confirm', 'Password Confirmation', 'required|matches[input_new_password]');

            if($this->form_validation->run() === FALSE){
                //set error message
                $data['error_msg'] = validation_errors();
            }else {
                //update password
                $this->user_model->update_user_password($user_id);
                //set success message
                $data['success_msg'] = 'User password successfully updated.';
            }
        }else if(isset($btn_3)) {
            $this->form_validation->set_rules('checkbox_delete', 'Checkbox', 'required');

            if($this->form_validation->run() === FALSE){
                //set error message
                $data['error_msg'] = validation_errors();
            }else{
                //delete user data
                $this->user_model->delete_user($user_id);
                //set success message
                $this->session->set_flashdata('success_msg', 'User account successfully deleted.');
                //redirect
                redirect('users/list');
            }
        }

        //get user where id=user_id
        $row = $this->user_model->get_user($user_id);
        if (!empty($row)) {
            $data['user_id'] = $row['lid'];
            $data['user_firstname'] = $row['lfirstname'];
            $data['user_lastname'] = $row['llastname'];
            $data['user_email'] = $row['lemail'];
            $this->load->view('templates/header', $data);
            $this->load->view('users/view', $data);
            $this->load->view('templates/footer');
        } else {
            //no user found
            redirect('users/list');
        }
    }
}