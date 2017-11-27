<?php


class User extends CI_Model
{

    public function __construct(){
        $this->load->database();
        $this->load->library('session');
            $this->load->helper('url');
    }

    public function register($email = null, $password = null, $cpassword = null){
        $result = $this->validateRegistration($email,$password,$cpassword);
        if($result){

            $salt = random_bytes(10);
            $salt = bin2hex($salt);


            $data = [
                'email' => sanitize($email),
                'password' => sanitize(hash('sha512',$password.$salt)),
                'salt' => sanitize($salt)
            ];
            $this->db->insert('users', $data);
            redirect('/login');
        }

    }

    public function login($email = null, $password = null){
        $salt = '';
        $is_admin = '';
        $email = trim($email);
        $password = trim($password);

        $email = sanitize($email);
        $password = sanitize($password);
        $query = "SELECT u.id, u.email, u.password, u.salt, u.is_admin FROM users as u WHERE u.email = '$email'";
        $result = $this->db->query($query);

        if ($result->result_id->num_rows > 0) {
            $salt = $result->result_array()[0]['salt'];
            $user_id = $result->result_array()[0]['id'];
            $dbpass = $result->result_array()[0]['password'];
            $userpass = (hash('sha512',$password.$salt));
            (isset($result->result_array()[0]['is_admin']) ? $is_admin = $result->result_array()[0]['is_admin'] : 0);
        }
        if ($userpass === $dbpass) {
            $_SESSION['user'] = $email;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['is_admin'] = $is_admin;
            $_SESSION['logged_in'] = true;
            redirect('/mylists');
        }
        else{
            redirect('/login');
        }
    }


    private function validateRegistration($email,$password,$cpassword){

        $result = $this->db
            ->select('email')
            ->from('users')
            ->where('email', $email)
            ->get();

        if ($result->result_id->num_rows > 0) {
            return false;
        }else{
             if ($password !== $cpassword){
                 return false;
             }else{
                 return true;
             }
        }



//        echo ($dbemail->email === $email);
//        if($dbemail !== NULL && isset($dbemail)){

//            return ($dbemail[0]['email'] === $email);

//        }


    }


}