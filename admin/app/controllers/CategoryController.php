<?php
class CategoryController extends BaseController
{
    
    private $categoryModel;
    private $table;

    public function __construct()
    {
        $this->categoryModel = $this->model('CategoryModel');
        $this->table = 'categories';
    }

    function index()
    {
        $this->view(
            'main-layout',
            [
                'page' => 'categories/index',
                'title' => 'Categories',
            ]
        );
    }

    function all()
    {
        $categories = $this->categoryModel->getAll($this->table);

        header('Content-Type: application/json');
        echo json_encode($categories);
    }

    function create(){
        $title = $_POST['title'];
        if ($title) {
            $data = ['title' => $title];
            $this->categoryModel->create($this->table,$data);
            $result =[
                'status'=>'success',
                'message'=>"created category successfully"
            ];
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $result =[
                'status'=>'error',
                'message'=>"created category failure!"
            ];
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    function edit($id){
        $category =$this->categoryModel->find($this->table,$id);
        header('Content-Type: application/json');
        echo json_encode($category);
    }

    function update($id){
        $title = $_POST['title'];

        if ($title) {
            $data = ['title' => $title];
            $this->categoryModel->update($this->table,$id,$data);
            $result =[
                'status'=>'success',
                'message'=>"created category successfully"
            ];
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $result =[
                'status'=>'error',
                'message'=>"created category failure!"
            ];
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    function delete($id){
        $this->categoryModel->destroy($this->table,$id);
        $result =[
            'status'=>'success',
            'message'=>"Deleted category successfully"
        ];
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
