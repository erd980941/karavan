<?php 
    require_once __DIR__.'/../../data_access/db-connector.php';

    class MagazaSlider{
        private $db;

        public function __construct(){
            $dbConnector=DbConnector::getInstance();
            $this->db=$dbConnector->getConnection();
        }

        public function getSliderItems(){
            $query='SELECT * FROM magaza_sliders ORDER BY order_priority ASC ';
            $statement= $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSliderItemById($sliderId){
            $query= 'SELECT * FROM magaza_sliders WHERE slider_id=:slider_id LIMIT 1';
            $statement= $this->db->prepare($query);
            $statement->bindParam(':slider_id', $sliderId, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

       

    }
?>