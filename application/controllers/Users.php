<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper('url_helper');
    }

    public function index()
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

        $rows = $this->user_model->get_user_list();
        if(!empty($rows)){
            $data['users'] = $rows;
        };

        



        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('users/create');
    }

    public function view($user_id)
    {
        $this->load->view('users/view');
    }
}
