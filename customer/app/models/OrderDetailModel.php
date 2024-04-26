<?php
class OrderDetailModel extends BaseModel
{
    const TableName = 'order_details';

    public function createOrderDetail($order_id, $product_id, $quantity, $price)
    {
        $sql = "
        INSERT INTO order_details (order_id, product_id, quantity, price)
        VALUES ('$order_id', '$product_id', '$quantity', '$price');        
    ";
        $result = $this->querySql($sql);
        return $result;
    }
}
