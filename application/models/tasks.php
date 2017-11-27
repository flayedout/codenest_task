<?php

class Tasks extends CI_Model
{

    public function __construct(){
        $this->load->database();
        $this->load->helper('export');
    }

        public function getAllTasksByAllLists(){
        $this->db->select('tasks.id,tasks.list_id,tasks.title,tasks.created_at,lists.date,tasks.status');
        $this->db->from('tasks');
        $this->db->join('lists', 'tasks.list_id = lists.id');
        $this->db->where('tasks.user_id',$_SESSION['user_id']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCompletedTasksByList($id){
        $this->db->select('tasks.id,tasks.list_id,tasks.title,tasks.created_at,lists.date,tasks.status');
        $this->db->from('tasks');
        $this->db->join('lists', 'tasks.list_id = lists.id');
        $this->db->where('tasks.user_id',$_SESSION['user_id']);
        $this->db->where('lists.id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCompletedTasksByListAdmin($id){
        $this->db->select('tasks.id,tasks.list_id,tasks.title,tasks.created_at,lists.date,tasks.status');
        $this->db->from('tasks');
        $this->db->join('lists', 'tasks.list_id = lists.id');

        $this->db->where('lists.id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllTasks(){
        $this->db->select('tasks.id,tasks.list_id,tasks.title,tasks.created_at,tasks.status');
        $this->db->from('tasks');

        $this->db->where('tasks.user_id',$_SESSION['user_id']);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllTasksIfAdmin(){
        $query = $this->db
              ->select('tasks.id,tasks.list_id,tasks.title,tasks.created_at')
              ->from('tasks')
               ->join('lists', 'tasks.list_id = lists.id')
              ->get();
        return $query->result_array();
    }
    
    public function createNewTask($title,$list_id){
        $data = [
            'title' => $title,
            'list_id' => $list_id,
            'user_id' => $_SESSION['user_id']
        ];

        $this->db->where('user_id',$_SESSION['user_id']);
        $this->db->insert('tasks', $data);
        redirect('/mytasks');
    }
    public function deleteTask($id){
        $this->db->where('id', $id);
        $this->db->delete('tasks');
        redirect('/mytasks');
    }
    
    public function exportTasksIfAdmin($list_id){
        $data = $this->tasks->getCompletedTasksByListAdmin($list_id);
        $this->export($data);
    }

    public function exportTasksForList($list_id){
        $data = $this->tasks->getCompletedTasksByList($list_id);
        $this->export($data);
    }

    private function export($data){
        export_helper($data);
    }
}