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
                'title' => 'Trang chủ',
            ]
        );
    }
}
