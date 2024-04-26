<?php
class Post_categoryController extends BaseController
{
    
    private $categoryModel;
    private $folder;

    public function __construct()
    {
        $this->categoryModel = $this->model('post_categoryModel');
        $this->folder = 'post_categories';
    }

    function index()
    {
        $this->view(
            'main-layout',
            [
                'page' => $this->folder . "/index",
                'title' => 'Post Categories',
            ]
        );
    }

    function all()
    {
        $categories = $this->categoryModel->getAll();

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($categories);
    }

    function create(){
        if(!isset($_POST['title'])) {
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Title not provided!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }
        
        $title = $_POST['title'];
        $slug = $this->slugify($title);
    
        $result = [];
        $data = ['title' => $title, 'slug' => $slug];
        $categories = $this->categoryModel->querySql("SELECT * FROM categories WHERE categories.title = '$title' AND `delete` = 0");
    
        if(mysqli_num_rows($categories) > 0){
            $result['status'] = 500;
            $result['title'] = 'Failed';
            $result['message'] = "Title already exists!";

            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $this->categoryModel->create($data);
    
            $result['status'] = 200;
            $result['title'] = 'Success';
            $result['message'] = "Created successfully!";
    
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    function edit($id){
        $category =$this->categoryModel->find($id);
        header('Content-Type: application/json');
        echo json_encode($category);
    }

    function update($id){
        if(!isset($_POST['title'])) {
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Title not provided!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }

        $title = $_POST['title'];
        $slug = $this->slugify($title);
        $result = [];
        $data = ['title' => $title,'slug' => $slug];
        $categories = $this->categoryModel->querySql("SELECT * FROM categories WHERE categories.title = '$title' AND `delete` = 0 AND categories.id != $id");
    
        if(mysqli_num_rows($categories) > 0){
            $result['status'] = 500;
            $result['title'] = 'Failed';
            $result['message'] = "Title already exists!";

            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $this->categoryModel->update($id,$data);
    
            $result['status'] = 200;
            $result['title'] = 'Success';
            $result['message'] = "Updated successfully!";
    
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    function delete($id){
        $products_by_category = $this->categoryModel->querySql("SELECT * FROM products WHERE products.category_id = '$id' AND `delete` = 0");
    
        if(mysqli_num_rows($products_by_category) > 0){
            $result['status'] = 500;
            $result['title'] = 'Failed';
            $result['message'] = "Products containing categories cannot be deleted!";

            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $this->categoryModel->destroy($id);
            $result =[
                'status'=>'success',
                'message'=>"Deleted category successfully"
            ];
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
