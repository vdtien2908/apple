<?php
class PostModel extends BaseModel
{
    const TableName = 'posts';

    public function getPosts()
    {
        $sql = "SELECT p.*,pc.id as post_cat_id, pc.title as cat_title 
        FROM posts as p
        JOIN post_categories as pc
        ON p.post_cat_id = pc.id
        where p.delete = 0 ORDER BY p.created_at DESC";

        $result = $this->querySql($sql);
        if ($result) {
            $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $post;
        }
        return [];
    }

    public function getBySlug($slug)
    {
        $sql = "SELECT p.*,pc.id as post_cat_id, pc.title as cat_title ,u.* 
        FROM posts as p
        JOIN post_categories as pc ON p.post_cat_id = pc.id
        JOIN users as u ON p.user_id = u.id
        WHERE p.slug = '${slug}'
        ORDER BY p.delete = 0 DESC, p.created_at DESC";

        $result = $this->querySql($sql);
        return mysqli_fetch_assoc($result);
    }

    public function getByCatSlug($slug)
    {
        $sql = "SELECT p.*,pc.id as post_cat_id, pc.title as cat_title
        FROM posts as p
        JOIN post_categories as pc ON p.post_cat_id = pc.id
        WHERE pc.slug = '${slug}'
        ORDER BY p.delete = 0 DESC, p.created_at DESC";

        $result = $this->querySql($sql);
        return mysqli_fetch_assoc($result);
    }

    public function updateViews($slug)
    {
        $sql = "UPDATE posts SET views = views + 1 WHERE slug = '${slug}'";
        return $this->querySql($sql);
    }
}
