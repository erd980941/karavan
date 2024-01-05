<?php
date_default_timezone_set('UTC');
require_once __DIR__.'/../../data_access/db-connector.php';
class ActivationCode
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

    public function addActivationCode($codeData)
    {
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 month'));
        $query = "INSERT INTO activation_codes 
                  SET user_id=:user_id, 
                      activation_code=:activation_code, 
                      expires_at=:expires_at, 
                      code_type=:code_type"; // code_type alanını sorguya ekledik

        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $codeData['user_id'], PDO::PARAM_INT);
        $statement->bindParam(':activation_code', $codeData['activation_code'], PDO::PARAM_STR);
        $statement->bindParam(':expires_at', $expires_at, PDO::PARAM_STR);
        $statement->bindParam(':code_type', $codeData['code_type'], PDO::PARAM_STR); // code_type parametresini bind ettik
        return $statement->execute();
    }
    public function getActivationCode($codeData)
    {
        $currentDate = date('Y-m-d H:i:s');
        $query = "SELECT ac.*, u.user_email FROM activation_codes ac
                    INNER JOIN users u ON ac.user_id = u.user_id
                    WHERE u.user_email =:user_email
                    AND ac.activation_code =:activation_code
                    AND ac.created_at >:current_date
                    AND u.email_verified = '0' LIMIT 1";
        

        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_email',$codeData['user_email'],PDO::PARAM_STR);
        $statement->bindParam(':activation_code',$codeData['activation_code'],PDO::PARAM_STR);
        $statement->bindParam(':current_date',$currentDate,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }




}
?>