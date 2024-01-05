<?php
require_once __DIR__.'/../data_access/db-connector.php';

class MisionVision
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }



    //--------------------- Site Ayarlar ---------------------
    
    public function getMisionVision($mv_type)
    {
        $query = "SELECT * FROM mision_vision WHERE mv_type=:mv_type LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':mv_type',$mv_type,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}
?>