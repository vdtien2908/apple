<?php
class CustomerController extends BaseController
{
    
    private $userModel;
    private $folder;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->folder = 'customers';
    }

    function index()
    {
        $this->view(
            'main-layout',
            [
                'page' => $this->folder . "/index",
                'title' => 'Customers',
            ]
        );
    }

    function all()
    {
        $sql = "SELECT * FROM users WHERE `role`='customer'";
        $query = $this->userModel->querySql($sql);
        $customers = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($customers, $row);
        }

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($customers);
    }
}
