<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('account_model');
        $this->load->helper('url_helper'); 
    }

    public function home()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('dashboard/login');
        }
        
        $data = array(
            'title' => "DASHBOARD",
            'id' => $this->session->userdata('id'),
            'firstname' => $this->session->userdata('firstname'),
            'lastname' => $this->session->userdata('lastname'),
            'email' => $this->session->userdata('email')
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('dashboard/home');
        $this->load->view('templates/footer');
    }


    public function login()
    {
        if ($this->session->userdata('logged_in') === TRUE) {
            redirect('dashboard/home');
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['title'] = "Login";

        
        $btn_login_clicked = $this->input->post('btn_login');
        if (isset($btn_login_clicked)){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === FALSE) {
                $data['error_msg'] = 'Please enter your email and password.';
                $this->load->view('dashboard/login', $data);
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
                    $this->load->view('dashboard/login', $data);
                }
            }
        }else {
            $this->load->view('dashboard/login', $data);
        }
        
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('dashboard/login');
        exit();
    }
}
