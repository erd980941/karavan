<?php 
    require_once __DIR__.'/../data_access/db-connector.php';

    class WhyUs  {
        private $db;

        public function __construct(){
            $dbConnector=DbConnector::getInstance();
            $this->db=$dbConnector->getConnection();
        }
        public function getWhyUsItems(){
            $query = "SELECT * FROM why_us ORDER BY why_us_id DESC";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    
    }
?>