<?php
class BlogController extends BaseController
{
    private $postModel;
    private $categoriesModel;

    public function __construct()
    {
        $this->postModel = $this->model("PostModel");
        $this->categoriesModel = $this->model("PostCategoriesModel");
    }

    public function index()
    {
        $this->view(
            'app',
            [
                'pages' => 'blog/index',
                'title' => 'Blog',
            ]
        );
    }

    public function getAll()
    {
        try {
            $post = $this->postModel->getPosts();

            if (!$post) {
                $result = [
                    'status' => 204,
                    'message' => "Lỗi fetch posts!"
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
                return;
            }

            $result = [
                'status' => 200,
                'message' => "success",
                'data' => $post,
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (\Throwable $th) {
            $result = [
                'status' => 404,
                'message' => "Fail to fetch post, " . $th->getMessage(),
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public function getCategories()
    {
        try {
            $categories = $this->categoriesModel->getCategories();

            if (!$categories) {
                $result = [
                    'status' => 204,
                    'message' => "Lỗi fetch categories categories!"
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
                return;
            }

            $result = [
                'status' => 200,
                'message' => "success",
                'data' => $categories,
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (\Throwable $th) {
            $result = [
                'status' => 404,
                'message' => "Fail to fetch categories, " . $th->getMessage(),
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public function category($slug)
    {
        try {
            $categories = $this->postModel->getByCatSlug($slug);

            if (!$categories) {
                $result = [
                    'status' => 204,
                    'message' => "No categories found for this category.",
                    'data' => []
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
                return;
            }

            $result = [
                'status' => 200,
                'message' => "Blog with category name '" . $categories['cat_title'] . "' founded.",
                'data' => $categories,
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (\Throwable $th) {
            $result = [
                'status' => 404,
                'message' => "Failed to fetch categories, " . $th->getMessage(),
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public function detail($slug)
    {
        $this->postModel->updateViews($slug);
        $this->view(
            'app',
            [
                'pages' => 'blog/detail',
                'title' => 'Trang Blog Detail',
            ]
        );
    }

    public function getDetail($slug)
    {
        try {
            $post = $this->postModel->getBySlug($slug);

            if (!$post) {
                $result = [
                    'status' => 204,
                    'message' => "Lỗi fetch posts!"
                ];

                header('Content-Type: application/json');
                echo json_encode($result);
                return;
            }

            $result = [
                'status' => 200,
                'message' => "success",
                'data' => $post,
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (\Throwable $th) {
            $result = [
                'status' => 404,
                'message' => "Fail to fetch post, " . $th->getMessage(),
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    public function increaceViews()
    {
    }
}
