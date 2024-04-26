<?php
class PostModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table ='posts';
    }
}
