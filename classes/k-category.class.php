<?php
require_once __DIR__.'/../data_access/db-connector.php';

class KCategory
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }
   

    public function getCategories()
    {
        $query = "SELECT * FROM k_categories ORDER BY k_category_id DESC";
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoriesByType($categoryType)
    {
        $query = "SELECT * FROM k_categories WHERE category_type=:category_type ORDER BY k_category_id DESC";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':category_type', $categoryType);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($categoryId)
    {
        $query = "SELECT * FROM k_categories WHERE k_category_id=:k_category_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':k_category_id', $categoryId);
        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);
        return $category ? $category : null;
    }




    public function getCategoryByUrl($categoryUrl)
    {
        $query = "SELECT * FROM k_categories WHERE category_url = :category_url";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':category_url', $categoryUrl, PDO::PARAM_STR);


        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }



}
?>