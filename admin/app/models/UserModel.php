<?php
class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table ='users';
    }
}
