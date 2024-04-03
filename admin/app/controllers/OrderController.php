<?php
class OrderController extends BaseController
{
    
    private $orderModel;
    private $folder;

    public function __construct()
    {
        $this->orderModel = $this->model('OrderModel');
        $this->folder = 'orders';
    }

    function index()
    {
        $this->view(
            'main-layout',
            [
                'page' => $this->folder . "/index",
                'title' => 'Orders',
            ]
        );
    }

    function all()
    {
        $orders = $this->orderModel->getAll();

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($orders);
    }


    function edit($id){
        $order =$this->orderModel->find($id);

        $sql_order_detail = "SELECT order_details.quantity,order_details.price,products.title 
                            FROM products, order_details 
                            WHERE products.id = order_details.product_id 
                            AND products.delete = 0 
                            AND order_details.order_id = ${id}";
        $query_order_detail = $this->orderModel->querySql($sql_order_detail);
        $order_details = [];
        while ($row = mysqli_fetch_assoc($query_order_detail)) {
            array_push($order_details, $row);
        };

        $sql_order_user = "SELECT * FROM users WHERE users.id = ${order['user_id']}";
        $query_order_user = $this->orderModel->querySql($sql_order_user);
        $customer = mysqli_fetch_assoc($query_order_user);

        $data = [
            "order" => $order,
            "order_details" => $order_details,
            "customer" => $customer
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function confirm($id){
        $this->orderModel->update($id,['status_order' => 1]);
        $result['status'] = 200;
        $result['title'] = 'Success';
        $result['message'] = "Confirm order successfully!";

        http_response_code($result['status']);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function cancel($id){
        $this->orderModel->update($id,['status_order' => 2]);
        $result['status'] = 200;
        $result['title'] = 'Success';
        $result['message'] = "Cancel order successfully!";

        http_response_code($result['status']);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
