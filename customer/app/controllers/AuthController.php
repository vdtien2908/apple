<?php
class AuthController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    public function index()
    {
        $this->view(
            'app',
            [
                'pages' => 'auth/login',
                'title' => 'Home',
            ]
        );
    }

    public function login()
    {
        $this->view(
            'app',
            [
                'pages' => 'auth/login',
                'title' => 'Login',
            ]
        );
    }

    public function register()
    {
        $this->view(
            'app',
            [
                'pages' => 'auth/register',
                'title' => 'Register',
            ]
        );
    }

    public function forgotpassword()
    {
        $this->view(
            'app',
            [
                'pages' => 'auth/forgot',
                'title' => 'Register',
            ]
        );
    }

    public function signIn()
    {
        try {
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $result = $this->userModel->findEmail($email);

            if ($result) {
                if (password_verify($pass, $result['password'])) {
                    // if ($pass == $result['password']) {
                    $_SESSION['auth'] = $result;
                    $_SESSION['authenticated'] = true;

                    //  **************** GLOBAL CART COUNT VARIABLE***************
                    // $cart = $this->cartModel->getCartByCustomerId($_SESSION['auth']['customer_id']);
                    // $cartCount = $this->cartDetailModel->countCart($_SESSION['auth']['customer_id'], $cart['cart_id']);
                    // $_SESSION['cartCount'] = $cartCount;

                    $result = [
                        'status' => 200,
                        'message' => "Login successfully!"
                    ];

                    header('Content-Type: application/json');
                    echo json_encode($result);
                } else {
                    $result = [
                        'status' => 404,
                        'message' => "Wrong password, please check your password."
                    ];

                    header('Content-Type: application/json');
                    echo json_encode($result);
                }
            } else {
                $result = [
                    'status' => 204,
                    'message' => "Email not exist!"
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
            }
        } catch (\Throwable $th) {
            $result = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public function signUp()
    {
        try {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->findEmail($email);

            if ($user) {
                $result = [
                    'status' => 204,
                    'message' => "Email alrealy exist!"
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
                return;
            }

            if (!isset($password)) {
                $result = [
                    'status' => 404,
                    'message' => "Please, enter your password."
                ];

                header('Content-Type: application/json'); 
                echo json_encode($result);
            }

            $data = [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $this->userModel->createUser($data);

            $_SESSION['register-success'] = "Register successfully!";

            $result = [
                'status' => 200,
                'message' => "Register successfully!"
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (Exception $e) {
            $result = [
                'status' => 404,
                'message' => $e->getMessage()
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public function changePassword()
    {
        try {
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $result = $this->userModel->findEmail($email);

            if ($result) {

                $data = [
                    'password' => password_hash($pass, PASSWORD_DEFAULT),
                ];

                $this->userModel->updateUser($result['id'], $data);

                $_SESSION['changepw-success'] = "Change password successfullly! Please login for apply change.";
                unset($_SESSION['auth']);
                unset($_SESSION['authenticated']);

                $result = [
                    'status' => 200,
                    'message' => "Change password successfully!"
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
            } else {
                $result = [
                    'status' => 204,
                    'message' => "Email not exist!"
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
            }
        } catch (\Throwable $th) {
            $result = [
                'status' => 500,
                'message' => 'Got error in server process, please contact admin for more information!'
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public function logout()
    {
        if ($_SESSION['auth']) {
            unset($_SESSION['auth']);
            unset($_SESSION['authenticated']);

            $result = [
                'status' => 200,
                'message' => "Logout successfully!"
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }
}
