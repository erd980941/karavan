<?php
require_once __DIR__ . '/../../data_access/db-connector.php';

class Product
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

    public function getProducts()
    {
        $query = "SELECT p.*, ph.photo_name FROM products p
                        LEFT JOIN product_photos ph ON p.main_photo_id = ph.photo_id
                        WHERE p.product_status='1'
                        ORDER BY p.product_id DESC ";

        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($productId)
    {
        $query = "SELECT p.* FROM products p WHERE p.product_id=:product_id AND p.product_status='1' LIMIT 1 ";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":product_id", $productId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductsByFeatured()
    {
        $query = "SELECT p.*,pp.photo_name,c.category_title FROM products p 
                LEFT JOIN product_photos pp ON p.main_photo_id=pp.photo_id
                INNER JOIN categories c ON p.category_id=c.category_id
                WHERE p.product_featured='1' AND p.product_status='1' ORDER BY created_at DESC";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLastAddedProducts()
    {
        $query = "SELECT p.*,pp.photo_name FROM products p 
                LEFT JOIN product_photos pp ON p.main_photo_id=pp.photo_id
                WHERE p.product_status='1'
                ORDER BY created_at DESC LIMIT 8 ";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByCategory($categoryId)
    {
        $query = "SELECT p.*, pp.photo_name 
                FROM products p 
                LEFT JOIN product_photos pp ON p.main_photo_id = pp.photo_id 
                WHERE p.category_id = :category_id AND WHERE p.product_status='1'
                ORDER BY p.product_id DESC";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":category_id", $categoryId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategoryAndSubcategories($categoryId)
    {
        $categories = $this->getNestedCategories($categoryId);
        $categoryIds = array_column($categories, 'category_id');
        $categoryIds[] = $categoryId;

        foreach ($categories as $category) {
            $subCategories = $this->getNestedCategories($category['category_id']);
            foreach ($subCategories as $subCategory) {
                $categoryIds[] = $subCategory['category_id'];
            }
        }

        $query = "SELECT p.*, ph.photo_name 
                    FROM products p 
                    LEFT JOIN product_photos ph ON p.main_photo_id = ph.photo_id 
                    WHERE p.product_status='1' AND p.category_id IN (";

        $placeholders = implode(',', array_fill(0, count($categoryIds), '?'));

        $query .= $placeholders . ") ORDER BY p.product_id DESC";

        $statement = $this->db->prepare($query);
        $statement->execute($categoryIds);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNestedCategories($parentId = null)
    {
        $query = "SELECT * FROM categories WHERE parent_id = :parent_id ORDER BY category_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchProducts($search_query)
    {

        $search_query = "%" . $search_query . "%";
        $query = "SELECT p.*,ph.photo_name FROM products p 
                LEFT JOIN product_photos ph ON p.main_photo_id = ph.photo_id
                WHERE product_name LIKE :search_query AND p.product_status='1' ";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':search_query', $search_query, PDO::PARAM_STR);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function getProductsByCategoryAndSubcategoriesWithFilters($categoryId, $minPrice, $maxPrice)
    {
        $categories = $this->getNestedCategories($categoryId);
        $categoryIds = array_column($categories, 'category_id');
        $categoryIds[] = $categoryId;

        foreach ($categories as $category) {
            $subCategories = $this->getNestedCategories($category['category_id']);
            foreach ($subCategories as $subCategory) {
                $categoryIds[] = $subCategory['category_id'];
            }
        }

        $query = "SELECT p.*, ph.photo_name 
                  FROM products p 
                  LEFT JOIN product_photos ph ON p.main_photo_id = ph.photo_id 
                  WHERE p.product_status='1' AND p.category_id IN (";

        $placeholders = implode(',', array_fill(0, count($categoryIds), '?'));

        $query .= $placeholders . ")";

        // Filtreleme parametrelerini ekleyelim
        if ($minPrice !== null && $maxPrice !== null) {
            $query .= " AND p.product_price BETWEEN :min_price AND :max_price";
        }

        $query .= " ORDER BY p.product_id DESC";

        $statement = $this->db->prepare($query);

        // Kategorileri bind etme
        foreach ($categoryIds as $index => $categoryId) {
            $statement->bindValue($index + 1, $categoryId, PDO::PARAM_INT);
        }

        // Filtreleme parametrelerini bind etme
        if ($minPrice !== null && $maxPrice !== null) {
            $statement->bindParam(':min_price', $minPrice, PDO::PARAM_INT);
            $statement->bindParam(':max_price', $maxPrice, PDO::PARAM_INT);
        }

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function decrementProductQuantity($productId, $quantityToDecrement)
    {
        $query = 'SELECT product_quantity FROM products WHERE product_id = :product_id';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);

        if ($product['product_quantity'] >= $quantityToDecrement) {
            $query = 'UPDATE products SET product_quantity = product_quantity - :quantityToDecrement WHERE product_id = :product_id';
            $statement = $this->db->prepare($query);
            $statement->bindParam(':quantityToDecrement', $quantityToDecrement, PDO::PARAM_INT);
            $statement->bindParam(':product_id', $productId, PDO::PARAM_INT);
            return $statement->execute();
        } else {
            return false; // Stok yetersiz olduğu için azaltma işlemi yapılamaz
        }
    }

}
?>