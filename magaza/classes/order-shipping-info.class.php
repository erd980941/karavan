<?php
require_once __DIR__.'/../../data_access/db-connector.php'; 

class OrderShippingInfo
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

    public function addShippingInfo($shippingInfoData){
        
        $query="INSERT INTO order_shipping_info SET 
                order_id=:order_id, 
                recipient_name=:recipient_name, 
                recipient_surname=:recipient_surname, 
                phone_number=:phone_number, 
                recipient_address=:recipient_address, 
                recipient_city=:recipient_city, 
                recipient_district=:recipient_district, 
                postal_code=:postal_code,
                shipping_type=:shipping_type";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':order_id',$shippingInfoData['order_id'],PDO::PARAM_INT);
        $statement->bindParam(':recipient_name',$shippingInfoData['recipient_name'],PDO::PARAM_STR);
        $statement->bindParam(':recipient_surname',$shippingInfoData['recipient_surname'],PDO::PARAM_STR);
        $statement->bindParam(':phone_number',$shippingInfoData['phone_number'],PDO::PARAM_STR);
        $statement->bindParam(':recipient_address',$shippingInfoData['recipient_address'],PDO::PARAM_STR);
        $statement->bindParam(':recipient_city',$shippingInfoData['recipient_city'],PDO::PARAM_STR);
        $statement->bindParam(':recipient_district',$shippingInfoData['recipient_district'],PDO::PARAM_STR);
        $statement->bindParam(':postal_code',$shippingInfoData['postal_code'],PDO::PARAM_INT);
        $statement->bindParam(':shipping_type',$shippingInfoData['shipping_type'],PDO::PARAM_STR);
        return $statement->execute();
    }

    public function getAllShippingInfo($orderId){
        $query='SELECT * FROM order_shipping_info WHERE order_id=:order_id LIMIT 2';
        $statement=$this->db->prepare($query);
        $statement->bindParam(':order_id',$orderId,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    
    

}
?>