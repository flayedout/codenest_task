<?php


class LoginController extends CI_Controller
{
    protected $database;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('export');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('user');
        $this->load->helper('url');
//        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('common/header.php');
        $this->load->view('login/index.php');
        $this->load->view('common/footer.php');
    }

    public function login()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : NULL;
        $password = isset($_POST['password']) ? $_POST['password'] : NULL;
        $this->user->login($email,$password);
    }

    public function logout()
    {

        $this->session->set_flashdata('logged_out', 'You are kicked out');
        $_SESSION['is_logged'] = false;
        $_SESSION['user'] = NULL;
         $_SESSION['user_id'] = NULL;
         $_SESSION['is_admin'] = NULL;
        redirect('/login'); session_destroy();


//        header('Location: http://codenest.dev/login');

    }

    public function register($email = NULL, $password = NULL)
    {
        $email = '';
        $password = '';
        $cpassword = '';
        (isset($_POST['email']) ? $email = $_POST['email'] : '');
        (isset($_POST['password']) ? $password = $_POST['password'] : '');
        (isset($_POST['cpassword']) ? $cpassword = $_POST['cpassword'] : '');

        $this->user->register($email, $password, $cpassword);

        $this->load->view('common/header.php');
        $this->load->view('login/register.php');
        $this->load->view('common/footer.php');
    }
}

