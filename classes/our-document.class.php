<?php
require_once __DIR__.'/../data_access/db-connector.php';

class OurDocument
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }


    public function getAllDocuments()
    {
        $query = "SELECT * FROM our_documents ORDER BY document_id DESC";
        $statement = $this->db->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    
}
?>