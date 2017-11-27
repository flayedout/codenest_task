<?php


class TaskController extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->helper('export');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('tasks');
        $this->load->model('lists');
        $this->load->database();
        if ( ! $this->session->userdata('user'))
        {
            redirect('/login');
        }
    }
    public function myTasks(){
        $this->load->view('common/header.php');
        if($_SESSION['is_admin'] == 1){
            $alltasks = $this->tasks->getAllTasksIfAdmin();
            $pendingDeletes = $this->lists->getAllPendingListsToDelete();
            $data['alllists'] = $this->lists->getAllLists();
            $data['tasks'] = $alltasks;
            $data['pendingdeletes'] = $pendingDeletes;
            $this->load->view('admin/index.php',$data);
        }else if($_SESSION['is_admin'] == 0){
            $alltasks = $this->tasks->getAllTasksByAllLists();

            $data['alltasks'] = $alltasks;

            $this->load->view('tasks/mytasks.php',$data);
        }
        $this->load->view('common/footer.php');
    }

    public function createTask(){
        $title = '';
        $list = '';
        if($_POST['title'] === ""){
            redirect('/mytasks');
        }
        if($_POST['list'] === "0"){
            redirect('/mytasks');
        }
        (isset($_POST['title']) ? $title = $_POST['title'] : NULL);
        (isset($_POST['list']) ? $list = $_POST['list'] : NULL);
        $this->tasks->createNewTask($title,$list);
    }

    public function createTaskIndex(){
        $this->load->view('common/header.php');
        $alllists = $this->lists->getAllLists();
        $data['alllists'] = $alllists;
        $this->load->view('tasks/create.php',$data);
        $this->load->view('common/footer.php');
    }
    public function deleteTaskIndex(){
        $this->load->view('common/header.php');
        $alllists = $this->lists->getAllLists();
        $alltasks = $this->lists->getAllTasksByAllLists();
        $data['alllists'] = $alllists;
        $data['alltasks'] = $alltasks;
        $this->load->view('tasks/delete.php',$data);
        $this->load->view('common/footer.php');
    }

    public function deleteTask(){
        $id = $_POST['task'];
        if($id === 0){
            redirect('/mytasks');
        }
        $this->tasks->deleteTask($id);
    }

    public function exportToExcelAllTasks($id){

        if($_SESSION['is_admin'] == 1){
            $this->tasks->exportTasksIfAdmin($id);
        }else{
            $this->tasks->exportTasksForList($id);
        }

    }

}
