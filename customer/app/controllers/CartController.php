<?php
class CartController extends BaseController
{
    public function index()
    {
        $this->view(
            'app',
            [
                'pages' => 'cart/index',
                'title' => 'Trang gio hang',
            ]
        );
    }
}
