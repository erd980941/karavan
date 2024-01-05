<?php
require_once __DIR__.'/../data_access/db-connector.php';

class AboutUs
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }



    //--------------------- Site Ayarlar ---------------------
    
    public function getAbousUs()
    {
        $query = "SELECT * FROM about_us WHERE about_id = 0";
        $statement = $this->db->query($query);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}
?>