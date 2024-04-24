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

    public function getAll()
    {
        $products = $this->productModel->getTop10Seller();

        if (!$products) {
            $result = [
                'status' => 204,
                'message' => "Error in fetching data from server!"
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }

        $result = [
            'status' => 200,
            'message' => "Fetch products success",
            'data' => $products,
        ];

        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
