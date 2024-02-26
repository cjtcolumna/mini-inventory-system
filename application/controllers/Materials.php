<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materials extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'CurrentUserClass'));
        $this->load->helper(array('form', 'url_helper'));
        $this->load->model('material_model');
    }

    public function index()
    {
        $this->currentuserclass->is_logged_in($this->session->userdata('logged_in'));


        $data['title'] = 'CUSTOMERS';
        /*
        $material_list = $this->material_model->get_material_list();
        if (!empty($material_list)) {
            $data['materials'] = $material_list;
        };
        */

        $this->load->view('templates/header', $data);
        $this->load->view('materials/list', $data);
        $this->load->view('templates/footer');
    }
}
