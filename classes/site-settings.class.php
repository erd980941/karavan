<?php
require_once __DIR__.'/../data_access/db-connector.php';

class SiteSettings
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }



    //--------------------- Site Ayarlar ---------------------
    
    public function getSiteSettings()
    {
        $query = "SELECT * FROM site_settings WHERE site_id = 0";
        $statement = $this->db->query($query);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    //--------------------- Site İletişim Ayarları  ---------------------
    
    public function getSiteContactInformation()
    {
        $query = "SELECT * FROM site_contact_information WHERE site_id = 0";
        $statement = $this->db->query($query);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    //--------------------- Site Email ---------------------
    
    public function getSiteEmail()
    {
        $query = "SELECT * FROM site_email WHERE site_id = 0";
        $statement = $this->db->query($query);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    //--------------------- LOGO ---------------------
    public function getSiteLogo()
    {
        $query = "SELECT site_logo FROM site_settings WHERE site_id = 0";
        $statement = $this->db->query($query);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['site_logo'];
    }
}
?>