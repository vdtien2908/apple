<?php
class HomeController extends BaseController
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
                'pages' => 'home/index',
                'title' => 'Trang chủ',
            ] 
        );
    }
}
