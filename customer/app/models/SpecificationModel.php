<?php
class SpecificationModel extends BaseModel
{
    const TableName = "specifications";

    public function getSpecificationByProductId($id)
    {
        $sql = "
        SELECT * FROM specifications, products WHERE specifications.product_id = products.id AND specifications.delete=0 AND products.id = ${id}
    ";
    

        $result = $this->querySql($sql);

        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }

        return [];
    }
}
