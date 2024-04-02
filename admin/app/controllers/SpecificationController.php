<?php
class SpecificationController extends BaseController
{
    
    private $specificationModel;
    private $folder;

    public function __construct()
    {
        $this->specificationModel = $this->model('specificationModel');
        $this->folder = 'categories';
    }

    function all($id)
    {
        $sql ="SELECT * FROM specifications WHERE specifications.product_id=${id} AND specifications.delete = 0";
        $query = $this->specificationModel->querySql($sql);

        $specifications = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($specifications, $row);
        }

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($specifications);
    }

    function create($id){
        if(!isset($_POST['key']) || !isset($_POST['value'])) {
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Missing input!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }
        
        $key = $_POST['key'];
        $value = $_POST['value'];
        $result = [];
        $data = ['`key`' => $key, '`value`' => $value, 'product_id' => $id];
        
        $this->specificationModel->create($data);

        $result['status'] = 200;
        $result['title'] = 'Success';
        $result['message'] = "Created successfully!";

        http_response_code($result['status']);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function edit($id){
        $specification =$this->specificationModel->find($id);
        header('Content-Type: application/json');
        echo json_encode($specification);
    }

    // function update($id){
    //     if(!isset($_POST['key']) || !isset($_POST['value'])) {
    //         $result['status'] = 500;
    //         $result['title'] = 'Error';
    //         $result['message'] = "Missing input!";
            
    //         http_response_code($result['status']);
    //         header('Content-Type: application/json');
    //         echo json_encode($result);
    //         return;
    //     }

    //     $key = $_POST['key'];
    //     $value = $_POST['value'];
    //     $result = [];
    //     $data = ['key' => $key,'value' => $value];
     
    //     $this->specificationModel->update($id,$data);

    //     $result['status'] = 200;
    //     $result['title'] = 'Success';
    //     $result['message'] = "Updated successfully!";

    //     http_response_code($result['status']);
    //     header('Content-Type: application/json');
    //     echo json_encode($result);
        
    // }

    function delete($id){
        $this->specificationModel->destroy($id);
        $result =[
            'status'=>'success',
            'message'=>"Deleted category successfully"
        ];
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
