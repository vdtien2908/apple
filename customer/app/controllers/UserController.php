<?php
class UserController extends BaseController
{
    public function index()
    {
        $this->view(
            'app',
            [
                'pages' => 'profile/index',
                'title' => 'Profile Page',
            ]
        );
    }

    public function profile()
    {
        $this->view(
            'app',
            [
                'pages' => 'profile/index',
                'title' => 'Profile Page',
            ]
        );
    }

    public function orderHistory()
    {
        $this->view(
            'app',
            [
                'pages' => 'checkout/history',
                'title' => 'Order History Page',
            ]
        );
    }
}
