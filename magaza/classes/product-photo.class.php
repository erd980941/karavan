<?php 
    require_once __DIR__.'/../../data_access/db-connector.php';

    class ProductPhoto {
        private $db;

        public function __construct(){
            $dbConnector=DbConnector::getInstance();
            $this->db=$dbConnector->getConnection();
        }


        public function getProductPhotos(){
            $query = "SELECT * FROM product_photos ORDER BY photo_id";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductPhotoById($photoId){
            $query = "SELECT * FROM product_photos WHERE photo_id=:photo_id LIMIT 1";
            $statement = $this->db->prepare($query);
            $statement->bindParam("photo_id", $photoId, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        public function getPhotosByProductId($productId){
            $query = "SELECT * FROM product_photos WHERE product_id=:product_id ORDER BY photo_id DESC";
            $statement = $this->db->prepare($query);
            $statement->bindParam("product_id", $productId, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
       

    }
?>