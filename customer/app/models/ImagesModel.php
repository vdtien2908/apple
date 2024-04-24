<?php
class ImagesModel extends BaseModel
{
    const TableName = "Images";

    public function getImagesByProductId($id)
    {
        $sql = "SELECT * FROM images i
            JOIN products p ON i.product_id = p.id
            WHERE i.product_id = ${id}";

        $result = $this->querySql($sql);

        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }

        return [];
    }
}
