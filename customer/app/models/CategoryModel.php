<?php
class CategoryModel extends BaseModel
{
    const TableName = 'categories';

    public function getCategories()
    {
        $sql = "SELECT c.* FROM categories as c where `delete` = 0 ORDER BY c.created_at DESC";

        $result = $this->querySql($sql);

        if ($result) {
            $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $categories;
        }

        return [];
    }
}
