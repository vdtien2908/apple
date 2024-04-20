<?php
class ContactController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = $this->model('ProductModel');
    }

    public function index()
    {
        $this->view(
            'app',
            [
                'pages' => 'contact/index',
                'title' => 'Trang liên hệ',
            ]
        );
    }
}
