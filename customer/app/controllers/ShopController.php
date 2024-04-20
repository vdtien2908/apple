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
}
