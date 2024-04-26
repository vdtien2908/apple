<?php
class OrderModel extends BaseModel
{
    const TableName = 'orders';

    public function getOrder($id)
    {
        $sql = "SELECT * FROM orders AS o
                WHERE o.id = ${id}";

        $result = $this->querySql($sql);
        return mysqli_fetch_assoc($result);
    }

    public function getOrderHistory($cus_id)
    {
        $sql = "SELECT 
                o.id,
                o.user_id,
                o.name_receive,
                o.phone_receive,
                o.address_receive,
                o.note,
                o.total_money AS order_total_price,
                o.status_order AS order_status,
                o.created_at AS order_created_at,
                o.updated_at AS order_updated_at,
                od.product_id,
                od.quantity AS order_detail_quantity,
                od.price AS order_detail_price,
                od.created_at AS order_detail_created_at,
                od.updated_at AS order_detail_updated_at,
                p.title,
                p.description AS product_description,
                p.img AS product_image,
                p.price AS product_price
            FROM orders AS o
            JOIN order_details AS od ON o.id = od.order_id
            JOIN products AS p ON od.product_id = p.id
            WHERE o.user_id = ${cus_id}
            ORDER BY o.created_at DESC
            ";

        $result = $this->querySql($sql);

        if ($result) {
            $orders = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['id'];

                // Tạo mới đối tượng order nếu chưa tồn tại
                if (!isset($orders[$order_id])) {
                    $orders[$order_id] = [
                        'order_id' => $order_id,
                        'user_id' => $row['user_id'],
                        'name_receive' => $row['name_receive'],
                        'phone_receive' => $row['phone_receive'],
                        'address_receive' => $row['address_receive'],
                        'note' => $row['note'],
                        'total_price' => $row['order_total_price'],
                        'status' => $row['order_status'],
                        'created_at' => $row['order_created_at'],
                        'updated_at' => $row['order_updated_at'],
                        'orderDetail' => []
                    ];
                }

                // Tạo mới đối tượng orderDetail
                $orderDetail = [
                    'product_id' => $row['product_id'],
                    'quantity' => $row['order_detail_quantity'],
                    'price' => $row['order_detail_price'],
                    'created_at' => $row['order_detail_created_at'],
                    'updated_at' => $row['order_detail_updated_at'],
                    'product' => [
                        'title' => $row['title'],
                        'description' => $row['product_description'],
                        'price' => $row['product_price'],
                        'image' => $row['product_image'],
                    ]
                ];

                // Thêm orderDetail vào order tương ứng
                $orders[$order_id]['orderDetail'][] = $orderDetail;
            }

            // Giải phóng bộ nhớ
            mysqli_free_result($result);

            // Chuyển đổi mảng kết quả thành mảng kết quả cuối cùng
            $final_orders = array_values($orders);

            return $final_orders;
        }

        return [];
    }

    public function getLastestOrder()
    {
        $sql = "SELECT o.* FROM orders as o ORDER BY o.id DESC LIMIT 1";
        $result = $this->querySql($sql);
        return mysqli_fetch_assoc($result);
    }

    public function createOrder($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function updateStatusCancle($id)
    {
        $sql = "UPDATE " . self::TableName . " SET status_order = 3 WHERE id = '{$id}'";
        $result = $this->querySql($sql);
        return $result;
    }
}
