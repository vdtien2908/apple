<?php
class CheckoutController extends BaseController
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
                'pages' => 'checkout/index',
                'title' => 'Trang Checkout',
            ]
        );
    }

    public function process()
    {
        $this->view(
            'app',
            [
                'pages' => 'checkout/index',
                'title' => 'Trang Checkout',
            ]
        );
    }
}
