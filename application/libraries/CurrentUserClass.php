<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurrentUserClass {

    public function is_logged_in($logged_in, $is_login_page = false) {
        if ($logged_in && $is_login_page) {
            redirect('dashboard/home');
        }else if(!$logged_in && !$is_login_page){
            redirect('dashboard/login');
        }
    }
}