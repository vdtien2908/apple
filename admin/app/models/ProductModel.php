<?php
class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table ='products';
    }
}
