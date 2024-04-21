<?php
class ShopController extends BaseController
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
                'pages' => 'shop/index',
                'title' => 'Trang sản phẩm',
            ]
        );
    }

    public function detail($id)
    {
        $this->view(
            'app',
            [
                'pages' => 'shop/detail',
                'title' => 'Trang sản phẩm',
            ]
        );
    }
}
