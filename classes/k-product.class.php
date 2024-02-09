<?php
require_once __DIR__.'/../data_access/db-connector.php';

class KProduct
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }
   

    public function getProductsByCategoryUrl($categoryUrl){
        $query="SELECT p.product_name,p.product_short_description,p.product_url,c.category_name,c.category_url,c.category_type,pp.photo_name
                FROM k_products p 
                INNER JOIN k_categories c ON p.k_category_id=c.k_category_id
                LEFT JOIN k_product_photos pp ON pp.k_photo_id=p.main_photo_id
                WHERE c.category_url=:category_url";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':category_url',$categoryUrl,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductByUrl($productUrl){
        $query="SELECT p.*,pp.* FROM k_products p
                LEFT JOIN k_product_photos pp ON p.main_photo_id=pp.k_photo_id
                WHERE p.product_url=:product_url
                LIMIT 1;";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':product_url',$productUrl,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }



}
?>