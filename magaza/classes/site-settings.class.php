<?php
require_once __DIR__.'/../../data_access/db-connector.php';

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
    

    public function getAllSettingForEmail(){
        $query='SELECT
        ss.site_id,ss.site_title,ss.site_url,
        sci.site_city,sci.site_district,sci.site_address,sci.site_tel,
        se.site_smtpEmail,se.site_smtpHost,se.site_smtpUser,se.site_smtpPassword,se.site_smtpPort
        FROM site_settings ss
        INNER JOIN site_email se ON ss.site_id=se.site_id
        INNER JOIN site_contact_information sci ON ss.site_id=sci.site_id
        WHERE ss.site_id=0';
        $statement = $this->db->query($query);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
   
}
?>