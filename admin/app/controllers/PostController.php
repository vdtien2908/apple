<?php
class PostController extends BaseController
{
    
    private $PostModel;
    private $folder;

    public function __construct()
    {
        $this->PostModel = $this->model('PostModel');
        $this->folder = 'posts';
    }

    function index()
    {
        $this->view(
            'main-layout',
            [
                'page' => $this->folder . "/index",
                'title' => 'posts',
            ]
        );
    }

    function all()
    {
        $products = $this->PostModel->getAll();

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($products);
    }

    function create(){
        // Result notification
        $result = [];

        if(!isset($_POST['title']) || !isset($_POST['content'])  || !isset($_POST['post_cat_id']) || !isset($_FILES['img'])) {
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Missing input!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }
        
        $title = $_POST['title'];
        $content = $_POST['content'];
        $img = $_FILES['img'];
        $post_cat_id = $_POST['post_cat_id'];
        $slug = $this->slugify($title);
        $user_id =  $_SESSION['login']['id'];
    
        

        $posts = $this->PostModel->querySql("SELECT * FROM posts WHERE posts.title = '$title' AND `delete` = 0");
    
        if(mysqli_num_rows($posts) > 0){
            $result['status'] = 500;
            $result['title'] = 'Failed';
            $result['message'] = "Title already exists!";

            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            // format name file
            $error = [];
            $size_allow = 10;
            $fileName = $img['name'];
            $fileName = explode('.', $fileName);
            $ext = end($fileName);
            $new_file_name = md5(uniqid()) . '.' . $ext;    

            $allow_ext = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
            if (in_array($ext, $allow_ext)) {
                $size = $img['size'] / 1024 / 1024;
                if ($size <= $size_allow) {
                    $upload = move_uploaded_file($img['tmp_name'], '../product_img/' . $new_file_name);
                    if (!$upload) {
                        $error[] = 'error upload';
                    }
                } else {
                    $error = 'size_error';
                }
            } else {
                $error[] = 'ext_error';
            }

        
            $data = [
                'title' => $title,
                'slug' => $slug, 
                'content' => $content, 
                'img' => $new_file_name, 
                'post_cat_id'=> $post_cat_id,
                'user_id' => $user_id
            ];
            $this->PostModel->create($data);
    
            $result['status'] = 200;
            $result['title'] = 'Success';
            $result['message'] = "Created successfully!";
    
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    function edit($id){
        $product =$this->PostModel->find($id);
        header('Content-Type: application/json');
        echo json_encode($product);
    }

    function update($id){
        // Result notification
        $result = [];

        if(!isset($_POST['title']) || !isset($_POST['content']) || !isset($_POST['post_cat_id'])) {
            $result['status'] = 500;
            $result['title'] = 'Error';
            $result['message'] = "Missing input!";
            
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }
        
        $title = $_POST['title'];
        $content = $_POST['content'];
        $post_cat_id = $_POST['post_cat_id'];
        $slug = $this->slugify($title);
    
        
        $posts = $this->PostModel->querySql("SELECT * FROM posts WHERE posts.title = '$title' AND `delete` = 0 AND posts.id != ${id}");
    
        if(mysqli_num_rows($posts) > 0){
            $result['status'] = 500;
            $result['title'] = 'Failed';
            $result['message'] = "Title already exists!";

            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            $product = $this->PostModel->find($id);            
            $data = [
                'title' => $title,
                'slug' => $slug, 
                'content' => $content, 
                'post_cat_id'=> $post_cat_id,
                'user_id' => $_SESSION['login']['id']
            ];

            // format name file
            if (isset($_FILES['img'])) {
                $img = $_FILES['img'];
                $error = [];
                $size_allow = 10;
                $fileName = $img['name'];
                $fileName = explode('.', $fileName);
                $ext = end($fileName);
                $new_file_name = md5(uniqid()) . '.' . $ext;    
    
                $allow_ext = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
                if (in_array($ext, $allow_ext)) {
                    $size = $img['size'] / 1024 / 1024;
                    if ($size <= $size_allow) {
                        // Xóa ảnh cũ trước khi tải lên ảnh mới
                        if (isset($product['img'])) {
                            $old_file_path = '../product_img/' . $product['img'];
                            if (file_exists($old_file_path)) {
                                unlink($old_file_path);
                            }
                        }

                        $upload = move_uploaded_file($img['tmp_name'], '../product_img/' . $new_file_name);
                        $data['img'] = $new_file_name;
                        if (!$upload) {
                            $error[] = 'error upload';
                        }
                    } else {
                        $error = 'size_error';
                    }
                } else {
                    $error[] = 'ext_error';
                }
            }

        
           
            $this->PostModel->update($id,$data);
    
            $result['status'] = 200;
            $result['title'] = 'Success';
            $result['message'] = "Updated successfully!";
    
            http_response_code($result['status']);
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    function delete($id){
        $this->PostModel->destroy($id);
        $result =[
            'status'=>'success',
            'message'=>"Deleted category successfully"
        ];
        header('Content-Type: application/json');
        echo json_encode($result);
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
