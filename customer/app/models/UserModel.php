<?php
class UserModel extends BaseModel
{

    const TableName = 'users';

    public function getUsers()
    {
        $sql = "SELECT c.* FROM users as c 
        ORDER BY c.status DESC, c.created_at DESC";
        $result = $this->querySql($sql);

        if ($result) {
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $users;
        }

        return [];
    }

    public function getUser($id)
    {
        $sql = "SELECT c.* FROM users as c WHERE c.id = '{$id}'";
        $result = $this->querySql($sql);
        return mysqli_fetch_assoc($result);
    }

    public function findEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = '${email}'";
        $result =  $this->querySql($sql);
        return mysqli_fetch_assoc($result);
    }

    public function createUser($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function updateUser($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }
}
