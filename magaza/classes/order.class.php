<?php
require_once __DIR__.'/../../data_access/db-connector.php'; 

class Order
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

    

    public function addOrder($orderData){
        $query="INSERT INTO orders SET order_number=:order_number, user_id=:user_id, total_amount=:total_amount";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':order_number',$orderData['order_number'],PDO::PARAM_INT);
        $statement->bindParam(':user_id',$orderData['user_id'],PDO::PARAM_INT);
        $statement->bindParam(':total_amount',$orderData['total_amount'],PDO::PARAM_INT);
        return $statement->execute();
    }

    public function updateOrderPaymentStatus($userId,$orderId){
        $query="UPDATE orders SET payment_status='1' WHERE user_id=:user_id AND order_id=:order_id";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $statement->bindParam(':order_id',$orderId,PDO::PARAM_INT);
        $result= $statement->execute();
        if ($result) {
            if ($statement->rowCount() > 0) {
                return true; // En az bir satır silindi.
            } else {
                return false; // Hiçbir satır silinmedi.
            }
        } else {
            return false; // Sorgu başarısız.
        }
    }

    public function getUnpaidOrders($userId){
        $query="SELECT * FROM orders WHERE user_id=:user_id AND  payment_status='0' ORDER BY order_date DESC";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaidOrders($userId){
        $query="SELECT * FROM orders WHERE user_id=:user_id AND  payment_status='1' ORDER BY order_date DESC";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUnpaidOrdersByOrderId($userId,$orderId){
        $query="SELECT * FROM orders WHERE user_id=:user_id AND  payment_status='0' AND order_id=:order_id ORDER BY order_date DESC";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $statement->bindParam(':order_id',$orderId,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getLatestOrderByUserId($userId){
        $query = 'SELECT * FROM orders WHERE user_id = :user_id ORDER BY order_id DESC LIMIT 1';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getLatestOrder(){
        $query = 'SELECT * FROM orders ORDER BY order_id DESC LIMIT 1';
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    
    

}
?>