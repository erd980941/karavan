<?php
require_once __DIR__.'/../data_access/db-connector.php';

class OurBrand
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }



    //--------------------- Site Ayarlar ---------------------
    
    public function getOurBrands()
    {
        $query = "SELECT * FROM our_brands ORDER BY brand_id DESC";
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>