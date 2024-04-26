<?php
class Post_categoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table ='post_categories';
    }
}
