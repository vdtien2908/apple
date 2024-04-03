<?php
class OrderModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table ='orders';
    }
}
