<?php
class ProductModel extends BaseModel
{
    const TableName = 'products';

    public function getProducts()
    {
        $sql = "SELECT p.* FROM products as p ORDER BY p.created_at DESC";

        $result = $this->querySql($sql);

        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        return [];
    }

    public function getProductsASC()
    {
        $sql = "SELECT p.* FROM products as p ORDER BY p.price ASC";

        $result = $this->querySql($sql);

        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        return [];
    }

    public function getProductsDESC()
    {
        $sql = "SELECT p.* FROM products as p ORDER BY p.price DESC";

        $result = $this->querySql($sql);

        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        return [];
    }

    public function getProduct($slug)
    {
        $sql = "SELECT p.*, c.title as cat_title FROM products p
            JOIN categories as c ON p.category_id = c.id 
            WHERE p.slug = '$slug'
            ORDER BY p.created_at DESC";
        $result = $this->querySql($sql);

        $product = null;
        while ($row = mysqli_fetch_assoc($result)) {
            if (!$product) {
                $product = [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'slug' => $row['slug'],
                    'description' => $row['description'],
                    'content' => $row['content'],
                    'price' => $row['price'],
                    'sale_price' => $row['sale_price'],
                    'hot' => $row['hot'],
                    'view_count' => $row['view_count'],
                    'brand' => $row['brand'],
                    'img' => $row['img'],
                    'color' => $row['color'],
                    'category_id' => $row['category_id'],
                    'cat_title' => $row['cat_title'],
                    'delete' => $row['delete'],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at'],
                ];
            }
        }

        return $product;
    }

    public function getProductByCategory($cat_slug)
    {
        $sql = "SELECT p.* FROM products as p 
        JOIN categories AS c ON c.id = p.category_id
        WHERE c.slug = '${cat_slug}'
        ORDER BY p.created_at DESC";

        $result = $this->querySql($sql);

        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        return [];
    }

    public function getProductByTitle($title)
    {
        $sql = "SELECT p.* FROM products as p 
        WHERE p.title LIKE '%${title}%'
        ORDER BY p.created_at DESC";

        $result = $this->querySql($sql);

        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        return [];
    }

    public function getProductsByPriceRange($minPrice, $maxPrice)
    {
        $sql = "SELECT p.* FROM products as p 
                WHERE p.price BETWEEN ${minPrice} AND ${maxPrice}
                ORDER BY p.created_at DESC";

        $result = $this->querySql($sql);

        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        return [];
    }

    public function getTop10Seller()
    {
        $sql = "SELECT products.*, SUM(order_details.quantity) AS total_quantity FROM products
        JOIN order_details ON order_details.product_id = products.id
        JOIN orders ON orders.id = order_details.order_id
        GROUP BY products.id, products.category_id, products.title, products.price, 
            products.slug, products.img, products.description,
            products.content,products.sale_price,products.hot,products.view_count,
            products.brand,products.color,
            products.created_at, products.updated_at
        ORDER BY total_quantity DESC
        LIMIT 10";

        $result = $this->querySql($sql);

        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        return [];
    }

    public function getRelatedProducts($id, $cat_id)
    {
        $sql = "SELECT * FROM products WHERE category_id = ${cat_id} AND id != ${id}";
        $result = $this->querySql($sql);
        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }
        return [];
    }

    public function updateViews($slug)
    {
        $sql = "UPDATE products SET view_count = view_count + 1 WHERE slug = '${slug}'";
        return $this->querySql($sql);
    }

    public function getProductPagination($itemsPerPage, $offset)
    {
        $limit = '';
        if ($itemsPerPage > 0) {
            $limit = "LIMIT $itemsPerPage OFFSET $offset";
        }

        $sql = "SELECT p.* FROM products p ORDER BY p.created_at DESC $limit";

        $result = $this->querySql($sql);

        if ($result) {
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $products;
        }

        return [];
    }
}
