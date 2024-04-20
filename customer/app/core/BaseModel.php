<?php
class BaseModel extends Database
{
    protected $connect;
    protected $table;

    public function __construct()
    {
        $this->connect = $this->HandleConnect();
    }

    public function getAll($select = ['*'], $orderBy = [])
    {
        $table = $this->table;
        $columns = implode(', ', $select);
        $orderByString = implode(' ', $orderBy);
        if ($orderByString) {
            $sql = "
                SELECT ${columns} 
                FROM ${table} 
                where `delete` = 0 
                ORDER BY ${orderByString} 
                ";
        } else {
            $sql = "
                SELECT ${columns} 
                FROM ${table} 
                where `delete` = 0 
            ";
        }

        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function find($id)
    {
        $table = $this->table;
        $sql = "SELECT * FROM ${table} Where id = ${id}";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

   
    public function querySql($sql)
    {
        $query = $this->_query($sql);
        return $query;
    }


    public function create($data)
    {
        $table = $this->table;
        function handleString($value)
        {
            return "'" . $value . "'";
        }
        $valueString = array_map('handleString', array_values($data));
        $columns = implode(', ', array_keys($data));
        $newValue = implode(', ', $valueString);
        $sql = "
            INSERT INTO ${table}(${columns}) 
            VALUE(${newValue})
        ";
        $this->_query($sql);
    }

    public function update($id, $data)
    {
        $table=$this->table;
        $dataSet = [];
        foreach ($data as $key => $value) {
            array_push($dataSet, "${key} = '${value}'");
        }
        $dataSetString = implode(', ', $dataSet);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE ${table} SET ${dataSetString}, updated_at='${date}' WHERE id = ${id}";
        $this->_query($sql);
    }

    public function destroy($id)
    {
        $table = $this->table;
        $sql = "UPDATE ${table} SET `delete` = 1 WHERE id = ${id}";
        $this->_query($sql);
    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
}
