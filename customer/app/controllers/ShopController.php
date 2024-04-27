<?php
class ShopController extends BaseController
{
    private $productModel;
    private $categoriesModel;
    private $specificationModel;
    private $imagesModel;

    public function __construct()
    {
        $this->productModel = $this->model('ProductModel');
        $this->categoriesModel = $this->model('CategoryModel');
        $this->specificationModel = $this->model('SpecificationModel');
        $this->imagesModel = $this->model('ImagesModel');
    }

    public function index()
    {
        $products = $this->productModel->getProducts();

        $this->view(
            'app',
            [
                'pages' => 'shop/index',
                'title' => 'Shop',
                'products' => $products
            ]
        );
    }

    public function getCategories()
    {
        $categories = $this->categoriesModel->getCategories();

        if (!$categories) {
            $result = [
                'status' => 204,
                'message' => "Error in fetching data from server!"
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }

        $result = [
            'status' => 200,
            'message' => "Fetch categories success",
            'data' => $categories,
        ];

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function filterByCat($slug)
    {
        $products = $this->productModel->getProductByCategory($slug);

        if (!$products) {
            $this->view(
                'app',
                [
                    'pages' => 'shop/index',
                    'title' => 'Shop',
                    'products' => []
                ]
            );
        }

        $this->view(
            'app',
            [
                'pages' => 'shop/index',
                'title' => 'Shop',
                'products' => $products
            ]
        );
    }

    public function filterByTitle($title)
    {
        $_SESSION['filter-title'] = $title;

        if ($title == "getAll") {
            $_SESSION['filter-title'] = "";
            $products = $this->productModel->getProducts();

            if (!$products) {
                $this->view(
                    'app',
                    [
                        'pages' => 'shop/index',
                        'title' => 'Shop',
                        'products' => []
                    ]
                );
            }

            $this->view(
                'app',
                [
                    'pages' => 'shop/index',
                    'title' => 'Shop',
                    'products' => $products
                ]
            );

            return;
        }

        $products = $this->productModel->getProductByTitle(isset($title) ? $title : '');

        if (!$products) {
            $this->view(
                'app',
                [
                    'pages' => 'shop/index',
                    'title' => 'Shop',
                    'products' => []
                ]
            );
        }

        $this->view(
            'app',
            [
                'pages' => 'shop/index',
                'title' => 'Shop',
                'products' => $products
            ]
        );
    }

    public function filterByPrice($minPrice, $maxPrice)
    {
        $products = $this->productModel->getProductsByPriceRange($minPrice, $maxPrice);

        if (!$products) {
            $this->view(
                'app',
                [
                    'pages' => 'shop/index',
                    'title' => 'Shop',
                    'products' => []
                ]
            );
        } else {
            $this->view(
                'app',
                [
                    'pages' => 'shop/index',
                    'title' => 'Shop',
                    'products' => $products
                ]
            );
        }
    }


    public function sortASC()
    {
        $products = $this->productModel->getProductsASC();

        $this->view(
            'app',
            [
                'pages' => 'shop/index',
                'title' => 'Shop',
                'products' => $products
            ]
        );
    }

    public function sortDESC()
    {
        $products = $this->productModel->getProductsDESC();

        $this->view(
            'app',
            [
                'pages' => 'shop/index',
                'title' => 'Shop',
                'products' => $products
            ]
        );
    }

    public function detail($slug)
    {
        $product = $this->productModel->getProduct($slug);

        if (!isset($product)) {
            header('Location: /apple/customer/shop');
            return;
        }

        // update views
        $this->productModel->updateViews($slug);

        $specifications = $this->specificationModel->getSpecificationByProductId($product["id"]);


        $this->view(
            'app',
            [
                'pages' => 'shop/detail',
                'title' => 'Shop',
                'product' => $product,
                'specifications' => $specifications ? $specifications  : [],
            ]
        );
    }

    public function getDetail($slug)
    {
        $product = $this->productModel->getProduct($slug);

        $specifications = $this->specificationModel->getSpecificationByProductId($product["id"]);
        $images = $this->imagesModel->getImagesByProductId($product["id"]);
        $relatedProduct = $this->productModel->getRelatedProducts($product["id"], $product["category_id"]);

        $data = [
            'product' => $product,
            'specifications' => $specifications ? $specifications  : [],
            'images' => $images ? $images  : [],
            'relatedProduct' => $relatedProduct ? $relatedProduct  : [],
        ];

        if (!$product) {
            $result = [
                'status' => 204,
                'message' => "Error in fetching data from server!"
            ];

            header('Content-Type: application/json');
            echo json_encode($result);
            return;
        }

        $result = [
            'status' => 200,
            'message' => "Fetch product success",
            'data' => $data,
        ];

        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
