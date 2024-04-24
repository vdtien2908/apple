<?php
class SpecificationModel extends BaseModel
{
    const TableName = "specifications";

    public function getSpecificationByProductId($id)
    {
        $sql = "SELECT sp.* FROM specifications sp
            JOIN products p ON sp.product_id = p.id
            WHERE sp.product_id = ${id}";

        $result = $this->querySql($sql);

        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }

        return [];
    }
}
