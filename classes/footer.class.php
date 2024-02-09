<?php 
    require_once __DIR__.'/../data_access/db-connector.php';

    class Footer{
        private $db;

        public function __construct(){
            $dbConnector=DbConnector::getInstance();
            $this->db=$dbConnector->getConnection();
        }

        public function getKCategoriesByType($categoryType){
            $query = "SELECT * FROM k_categories WHERE category_type=:category_type ORDER BY k_category_id DESC";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':category_type', $categoryType);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getSocialMedia()
    {
        $query = "SELECT * FROM social_media WHERE social_media_id = 0";
        $statement = $this->db->query($query);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    }
?>