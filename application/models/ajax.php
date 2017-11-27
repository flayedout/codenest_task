<?php

class Ajax extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function cancelDeleteList($id){
        if ($id != NULL){
            $data = array(
                'delete_status' => NULL
            );
            $this->db->where('id', $id);
            $this->db->update('lists', $data);

            echo json_encode(['success' => 'Success']);
        }else{
            echo json_encode(['error' => 'Could not submit request']);
        }
    }
    
    public function updateListStatus($id,$status){

        switch ($status){
            case "accept":

                $data = array(
                    'delete_status' => 'accepted'
                );
                $this->db->where('id', $id);
                $this->db->update('lists', $data);
                $this->db->delete('lists', $data);
                break;
            case "decline":
                $data = array(
                    'delete_status' => 'declined'
                );
                $this->db->where('id', $id);
                $this->db->update('lists', $data);
                break;
            default:
                echo 'default';
                break;

        }
    }

    public function updateTaskStatusDone($id){
        $data = [
            'status' => 1
        ];
        $this->db->where('id', $id);
        $this->db->update('tasks', $data);
        redirect('/list/delete/index');
    }

    public function updateTaskStatusNotFinished($id){
        $data = [
            'status' => 0
        ];
        $this->db->where('id', $id);
        $this->db->update('tasks', $data);
        redirect('/list/delete/index');
    }
}