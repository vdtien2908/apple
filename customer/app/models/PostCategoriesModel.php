<?php
class PostCategoriesModel extends BaseModel
{
    const TableName = 'posts';

    public function getCategories()
    {
        $sql = "SELECT * FROM post_categories 
        WHERE `delete` = 0 order by created_at DESC";

        $result = $this->querySql($sql);
        if ($result) {
            $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $post;
        }
        return [];
    }

    public function getBySlug($slug)
    {
        $sql = "SELECT * FROM post_categories
        WHERE slug = '${slug}'
        ORDER BY `delete` = 0 DESC, created_at DESC";

        $result = $this->querySql($sql);
        return mysqli_fetch_assoc($result);
    }
}
