<?php
class HomeController extends BaseController
{
    private $orderModel;
    private $customerModel;
    private $productModel;

    public function __construct()
    {
        // $this->orderModel = $this->model('OrderModel');
        // $this->customerModel = $this->model('CustomerModel');
        // $this->productModel = $this->model('ProductModel');
    }

    function index()
    {
        $this->view(
            'main-layout',
            [
                'page' => 'home/index',
                'title' => 'Dashboard',
                'totalOrderNew' => 1,
                'totalProduct' => 2,
                'totalPrice' => 3,
                'totalCustomer' => 4
            ]
        );
    }
}
