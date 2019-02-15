<?php 

class Home extends CI_Controller{
    public function index(){
        $data['welcome'] = 'Welcome to Todo App';
        $this->load->view('home', $data);
    }
}

