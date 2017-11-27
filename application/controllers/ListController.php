<?php

class ListController extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->helper('export');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('lists');
        $this->load->model('tasks');
        if ( ! $this->session->userdata('user'))
        {
            redirect('/login');
        }
    }

    public function update($id){

        $title = '';
        $description = '';

        if(isset($_POST['title'])){
            $title = sanitize($_POST['title']);
        }

        $result = $this->lists->updateTask($id,$title);
        if ($result){
            redirect('/lists');
        }

    }



    public function deleteList(){
        $list_id = '';
        (isset($_POST['list']) ? $list_id = $_POST['list'] : NULL);
        if($list_id != NULL){
            $this->lists->deleteList(sanitize($list_id));
        }
    }
    
    public function createList(){
        $date = '';
        if(isset($_POST['date']) && $_POST['date'] !== ''){
            $date = sanitize($_POST['date']);
            $this->lists->createNewList($date);
        }
    }



    public function createListIndex(){
        $this->load->view('common/header.php');
        $data = [];
        $this->load->view('lists/create.php',$data);
        $this->load->view('common/footer.php');
    }
    public function deleteListIndex(){
        $this->load->view('common/header.php');

        if($_SESSION['is_admin'] == 1){

            $data['pending'] = $this->lists->getAllPendingListsToDelete();
            $this->load->view('admin/deleterequests.php',$data);
        }else{
            $data['alllists'] = $this->lists->getAllLists();
            $data['notpendinglists'] = $this->lists->getNotPendingLists();
            $data['pendinglists'] = $this->lists->getAllPendingListsToDelete();
            $data['acceptedlists'] = $this->lists->getAllAcceptedForDeleteLists();
            $data['declinedlists'] = $this->lists->getAllDeniedRequests();
            $this->load->view('lists/delete.php',$data);
        }
        $this->load->view('common/footer.php');
    }

    public function myLists(){
        $this->load->view('common/header.php');

        if($_SESSION['is_admin'] == 1){
            $alltasks = $this->tasks->getAllTasksIfAdmin();

            $data['alllists'] = $this->lists->getAllLists();
            $data['tasks'] =  $this->tasks->getAllTasks();
            $data['alltasks'] = $alltasks;

            $this->load->view('admin/index.php',$data);
        }else if($_SESSION['is_admin'] == 0){

            $data['alllists'] = $this->lists->getAllLists();
            $data['tasks'] = $this->tasks->getAllTasks();

//            $data['queued'] = $this->lists->deleteLists();


            $this->load->view('lists/mylists.php',$data);
        }
        $this->load->view('common/footer.php');
    }

}