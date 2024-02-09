<?php
require_once __DIR__.'/../../data_access/db-connector.php'; 

class BankAccount
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

   public function getBankAccount(){
    $query="SELECT bank_name, account_name, account_iban, account_enabled,currency_type FROM bank_accounts WHERE account_enabled='1'";
    $statement=$this->db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
   }
    

}
?>