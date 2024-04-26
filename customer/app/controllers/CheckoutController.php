<?php
class CheckoutController extends BaseController
{
    private $orderModel;
    private $orderDetailModel;

    public function __construct()
    {
        $this->orderModel = $this->model('OrderModel');
        $this->orderDetailModel = $this->model('OrderDetailModel');
    }


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

    public function placeOrder()
    {
        try {
            $nameReceive = $_POST['name_receive'];
            $phoneReceive = $_POST['phone_receive'];
            $addressReceive = $_POST['address_receive'];
            $notes = $_POST['note'];
            $totalPrice = $_POST['total_money'];
            $userId = $_SESSION['auth']['id'];
            $listProductDetail = $_POST['listProductDetail'];

            $dataOrder = [
                'user_id' => $userId,
                'name_receive' => $nameReceive,
                'phone_receive' => $phoneReceive,
                'address_receive' => $addressReceive,
                'note' => $notes,
                'total_money' => $totalPrice,
                'status_order' => 1
            ];


            $this->orderModel->createOrder($dataOrder);

            $order = $this->orderModel->getLastestOrder();
            foreach ($listProductDetail as $item) {
                // $dataDetail = [
                //     'order_id' => $order['id'],
                //     'product_id' => $item['id'],
                //     'quantity' => $item['quantity'],
                //     'price' => $item['price']
                // ];

                $this->orderDetailModel->createOrderDetail($order['id'], $item['id'], $item['quantity'], $item['price']);
            }

            $result = [
                'status' => 200,
                'message' => 'Place order success!'
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (\Throwable $th) {
            $result = [
                'status' => 500,
                'message' => 'Got error in order process, please contact admin for more information!',
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }
}
