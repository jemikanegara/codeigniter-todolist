<?php 

class Home extends CI_Controller{
    public function index(){
        $data['main_content'] = 'home';
        $data['login'] = 'users/login';
        $this->load->view('layouts/main', $data);
    }

    public function test(){
        $this->load->view('whatever');
    }
}

