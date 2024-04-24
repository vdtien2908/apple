<?php
class CartController extends BaseController
{
    public function index()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: /apple/customer/home');
            return;
        }

        $this->view(
            'app',
            [
                'pages' => 'cart/index',
                'title' => 'Trang gio hang',
            ]
        );
    }
}