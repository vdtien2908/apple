<?php
class UserController extends BaseController
{
    private $userModel;
    private $orderModel;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->orderModel = $this->model('OrderModel');
    }

    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: /apple/customer/home');
            return;
        }

        $this->view(
            'app',
            [
                'pages' => 'profile/index',
                'title' => 'User Information',
            ]
        );
    }

    public function profile()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: /apple/customer/home');
            return;
        }

        $this->view(
            'app',
            [
                'pages' => 'profile/index',
                'title' => 'User Information',
            ]
        );
    }

    public function orderHistory()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: /apple/customer/home');
            return;
        }

        $this->view(
            'app',
            [
                'pages' => 'checkout/history',
                'title' => 'Order History',
            ]
        );
    }

    public function updateProfile()
    {
        try {
            $id  = $_SESSION['auth']['id'];
            $existCustomoer = $this->userModel->getUser($id);

            if ($existCustomoer) {

                $data = [
                    'address' => $_POST['address'],
                    'gender' => $_POST['gender'],
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                ];

                $this->userModel->updateUser($id, $data);

                $_SESSION['auth'] = $this->userModel->getUser($id);

                $result = [
                    'status' => 200,
                    'message' => 'Cập nhật người dùng thành công'
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
                return;
            }
        } catch (\Throwable $th) {
            $result = [
                'status' => 404,
                'message' => $th->getMessage(),
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public function getOrderHistory()
    {
        $orderDetail = $this->orderModel->getOrderHistory($_SESSION['auth']['id']);

        if (isset($orderDetail)) {
            $result = [
                'status' => 200,
                'message' => "success",
                'data' => $orderDetail,
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $result = [
                'status' => 200,
                'message' => "Fail to fetch orderDetail"
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }
}
