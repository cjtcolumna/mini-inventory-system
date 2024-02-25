<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'CurrentUserClass'));
        $this->load->helper(array('form', 'url_helper')); 
        $this->load->model('account_model');
    }

    public function home()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));
        
        $data['title'] = 'DASHBOARD';
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/home');
        $this->load->view('templates/footer');
    }


    public function login()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'), TRUE);

        $data['title'] = "Login";
        
        $btn_login_clicked = $this->input->post('btn_login');
        if (isset($btn_login_clicked)){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === FALSE) {
                $data['error_msg'] = 'Please enter your email and password.';
            }else {
                $row = $this->account_model->get_user();
                if(!empty($row)){
                    $userdata = array(
                        'logged_in' => TRUE,
                        'id' => $row['lid'],
                        'firstname' => $row['lfirstname'],
                        'lastname' => $row['llastname'],
                        'email' => $row['lemail']
                    );
                    $this->session->set_userdata($userdata);
                    redirect('dashboard/home');
                }else {
                    $data['error_msg'] = 'Account not found.';
                }
            }
        }
        
        $this->load->view('dashboard/login', $data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('dashboard/login');
    }

}