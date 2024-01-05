<?php 
    require_once __DIR__.'/../data_access/db-connector.php';

    class SliderItem{
        private $db;

        public function __construct(){
            $dbConnector=DbConnector::getInstance();
            $this->db=$dbConnector->getConnection();
        }

        public function getSliderItems(){
            $query='SELECT * FROM slider_items ORDER BY order_priority';
            $statement= $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>