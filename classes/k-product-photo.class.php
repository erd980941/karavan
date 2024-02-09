<?php 
    require_once __DIR__.'/../data_access/db-connector.php';

    class KProductPhoto {
        private $db;

        public function __construct(){
            $dbConnector=DbConnector::getInstance();
            $this->db=$dbConnector->getConnection();
        }


        public function getProductPhotos(){
            $query = "SELECT * FROM k_product_photos ORDER BY k_photo_id";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getPhotosByProductId($productId){
            $query = "SELECT * FROM k_product_photos WHERE k_product_id=:k_product_id ORDER BY k_photo_id DESC";
            $statement = $this->db->prepare($query);
            $statement->bindParam("k_product_id", $productId, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }


    }
?>