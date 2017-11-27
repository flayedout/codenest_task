<?php


class Lists extends CI_Model
{

    public function __construct(){
         $this->load->database();
    }

    public function getAllLists(){
        $query = $this->db->get('lists');
        return $query->result_array();
    }

    public function getTasksByListName($name){
        $this->db->from('tasks');
        $this->db->join('lists', 'tasks.list_id = lists.id');
        $this->db->where('lists.name', $name);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllTasksByAllLists(){
        $this->db->select('tasks.id,tasks.list_id,tasks.title,tasks.created_at,lists.date');
        $this->db->from('tasks');
        $this->db->join('lists', 'tasks.list_id = lists.id');
        $this->db->where('tasks.user_id',$_SESSION['user_id']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllTasksIfAdmin(){
        $this->db->select('tasks.id,tasks.list_id,tasks.title,tasks.created_at,lists.date, users.email');
        $this->db->from('tasks');
        $this->db->join('lists', 'tasks.list_id = lists.id');
        $this->db->join('users', 'tasks.user_id = users.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getListsWhichAreNotDeleteRequested(){
        $this->db->select('lists.id,lists.date');
        $this->db->from('lists');
        $this->db->where('lists.user_action','none');

        $query = $this->db->get();
        return $query->result_array();
    }
   
    public function getAllPendingListsToDelete(){
        $this->db->select('lists.id,lists.date,lists.delete_status');
        $this->db->from('lists');

        $this->db->where('lists.delete_status','pending');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNotPendingLists(){
        $this->db->select('lists.id,lists.date');
        $this->db->from('lists');
        $this->db->where('lists.delete_status',NULL);
//        $this->db->or_where('lists.delete_status','declined');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getListFromDatabase($date){
        $this->db->select('lists.id,lists.date');
        $this->db->from('lists');
        $this->db->where('lists.date',$date);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDeclinedLists(){
        $this->db->select('lists.id,lists.date');
        $this->db->from('lists');
        $this->db->where('lists.status','declined');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function createNewList($date){
        $dbdate = '';
        $date = $_POST['date'];
        $result = $this->lists->getListFromDatabase($date);
        if(!empty($result)){
            $dbdate = $result[0]['date'];
            redirect('/mylists');
        }else{
            $data = [
                'date' => $date,
                'delete_status' => NULL
            ];
            $this->db->insert('lists', $data);
            redirect('/mylists');
        }
    }

    public function deleteList($list_id){
        echo 'Currently trying to delete list id '.$list_id;
        $data = array(

            'delete_status' => 'pending'
        );
        $this->db->where('id', $list_id);
        $this->db->update('lists', $data);
        redirect('/list/delete/index');
    }


    public function getAllAcceptedForDeleteLists(){
        $this->db->select('lists.id,lists.date,lists.delete_status');
        $this->db->from('lists');

        $this->db->where('lists.delete_status','accepted');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDeniedRequests(){
        $this->db->select('lists.id,lists.date,lists.delete_status');
        $this->db->from('lists');

        $this->db->where('lists.delete_status','declined');
        $query = $this->db->get();
        return $query->result_array();
    }


}