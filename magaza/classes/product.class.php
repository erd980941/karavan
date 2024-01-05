<?php
require_once __DIR__.'/../../data_access/db-connector.php';

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
                        ORDER BY p.product_id DESC";

        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($productId)
    {
        $query = "SELECT * FROM products p WHERE product_id=:product_id LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":product_id", $productId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductsByFeatured(){
        $query="SELECT p.*,pp.photo_name FROM products p 
                LEFT JOIN product_photos pp ON p.main_photo_id=pp.photo_id
                WHERE p.product_featured='1' ORDER BY created_at DESC";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLastAddedProducts(){
        $query="SELECT p.*,pp.photo_name FROM products p 
                LEFT JOIN product_photos pp ON p.main_photo_id=pp.photo_id
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
                WHERE p.category_id = :category_id 
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
                    WHERE p.category_id IN (";

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

    public function searchProducts($search_query){

        $search_query = "%" . $search_query . "%"; 
        $query="SELECT p.*,ph.photo_name FROM products p 
                LEFT JOIN product_photos ph ON p.main_photo_id = ph.photo_id
                WHERE product_name LIKE :search_query";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':search_query',$search_query,PDO::PARAM_STR);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $products;
    }

    public function decrementProductQuantity($productId, $quantityToDecrement){
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