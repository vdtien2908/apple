<?php
class CategoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table ='categories';
    }
}
