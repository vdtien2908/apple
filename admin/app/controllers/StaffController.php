<?php
class StaffController extends BaseController
{
    
    private $userModel;
    private $folder;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->folder = 'staffs';
    }

    function index()
    {
        $this->view(
            'main-layout',
            [
                'page' => $this->folder . "/index",
                'title' => 'Staffs',
            ]
        );
    }

    function all()
    {
        $sql = "SELECT * FROM users WHERE `role`='staff' AND `delete`=0";
        $query = $this->userModel->querySql($sql);
        $staff = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($staff, $row);
        }

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($staff);
    }

    function create(){
        if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['address']) || !isset($_POST['gender']) || !isset($_POST['password'])) {
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Title not provided!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $password = $_POST['password'];
    
        $result = [];
        $data = [
            'name' => $name,
            'email'=> $email,
            'phone'=> $phone,
            'gender' => $gender,
            'address' => $address,
            'password' => md5($password),
            'role' => "staff"
        ];
        $users = $this->userModel->querySql("SELECT * FROM users WHERE users.email = '$email' AND `delete` = 0");
    
        if(mysqli_num_rows($users) > 0){
            $result['status'] = 500;
            $result['title'] = 'Failed';
            $result['message'] = "Email already exists!";

            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $this->userModel->create($data);
    
            $result['status'] = 200;
            $result['title'] = 'Success';
            $result['message'] = "Created successfully!";
    
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

  
    function edit($id){
        $staff =$this->userModel->find($id);
        header('Content-Type: application/json');
        echo json_encode($staff);
    }

    function update($id){
        if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['address']) || !isset($_POST['gender'])) {
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Title not provided!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
    
        $result = [];
        $data = [
            'name' => $name,
            'email'=> $email,
            'phone'=> $phone,
            'gender' => $gender,
            'address' => $address,
        ];
        $users = $this->userModel->querySql("SELECT * FROM users WHERE users.email = '$email' AND `delete` = 0 AND users.id != ${id}");
    
        if(mysqli_num_rows($users) > 0){
            $result['status'] = 500;
            $result['title'] = 'Failed';
            $result['message'] = "Email already exists!";

            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $this->userModel->update($id, $data);
    
            $result['status'] = 200;
            $result['title'] = 'Success';
            $result['message'] = "Updated successfully!";
    
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }


    function delete($id){
        $this->userModel->destroy($id);
        $result =[
            'status'=>'success',
            'message'=>"Deleted staff successfully"
        ];
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
