<?php
class CheckoutController extends BaseController
{
    public function index()
    {
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
