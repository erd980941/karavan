<?php
require_once __DIR__.'/../../data_access/db-connector.php'; 

class Category
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }



    public function getCategories()
    {
        $query = "SELECT * FROM categories ORDER BY category_id";
        $statement = $this->db->query($query);
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

    public function getParentCategories($categoryId)
    {
        $categories = [];

        $query = "SELECT * FROM categories WHERE category_id = :category_id LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":category_id", $categoryId, PDO::PARAM_INT);
        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);

        if ($category != null) {

            $categories = $this->getParentCategories($category['parent_id']);
            $categories[] = [
                'category_id' => $category['category_id'],
                'category_title' => $category['category_title'],
            ];
        }
        return $categories;
    }


    public function getCategoryById($categoryId)
    {
        $query = "SELECT * FROM categories WHERE category_id=:category_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':category_id', $categoryId);
        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);
        return $category ? $category : null;
    }

    


}
?>