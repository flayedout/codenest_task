<?php

class AjaxController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('export');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('ajax');
        if ( ! $this->session->userdata('user'))
        {
            redirect('/login');
        }
    }
    
    public function cancelByUser(){
        $id = (isset($_POST['id']) ? $_POST['id'] : '');
        $id = sanitize($id);
        $this->ajax->cancelDeleteList($id);
    }
    
    public function updateByAdmin(){
        $status = $_POST['action'];
        $id = $_POST['id'];

        $this->ajax->updateListStatus($id,$status);
        redirect('/list/delete/index');
    }

    public function updateTaskStatusDone(){

        $id = $_POST['id'];

        $this->ajax->updateTaskStatusDone($id);

    }

    public function updateTaskStatusNotFinished(){
        $id = $_POST['id'];
        $this->ajax->updateTaskStatusNotFinished($id);
    }

}