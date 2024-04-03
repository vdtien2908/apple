<?php
class AuthController extends BaseController
{
    
    private $userModel;
    private $folder;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->folder = 'auth';
    }

    function index()
    {
        $this->view(
            'auth-layout',
            [
                'page' => $this->folder . "/index",
                'title' => 'Auth',
            ]
        );
    }

    function verify(){
        if(!isset($_POST['email']) || !isset($_POST['password'])) {
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Missing not input!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE users.email = '${email}'";
        $query = $this->userModel->querySql($sql);
        $user = mysqli_fetch_assoc($query);

        if(!isset($user['email'])){
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Email is incorrect!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }

        if(md5($password) !== $user['password']){
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Password is incorrect!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }

        $_SESSION['login'] = $user;
        $result['status'] = 200;
        $result['title'] = 'Error';
        $result['message'] = "Login successfully!";
        
        http_response_code($result['status']);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function profile(){
        if(!isset($_SESSION['login'])){
            $result['status'] = 500;
            $result['title'] = 'No data';
            $result['message'] = "No data found";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }

        $result['status'] = 200;
        $result['title'] = 'Success';
        $result['message'] = "Get current user successfully.";
        $result['user'] = $_SESSION['login'];
        
        http_response_code($result['status']);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
