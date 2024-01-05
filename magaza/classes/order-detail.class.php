<?php
require_once __DIR__.'/../../data_access/db-connector.php'; 

class OrderDetail
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

    public function addOrderDetail($orderDetailData){
        $query="INSERT INTO order_details SET 
                order_id=:order_id, 
                order_number=:order_number, 
                product_id=:product_id, 
                quantity=:quantity, 
                unit_price=:unit_price, 
                subtotal=:subtotal";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':order_id',$orderDetailData['order_id'],PDO::PARAM_INT);
        $statement->bindParam(':order_number',$orderDetailData['order_number'],PDO::PARAM_INT);
        $statement->bindParam(':product_id',$orderDetailData['product_id'],PDO::PARAM_INT);
        $statement->bindParam(':quantity',$orderDetailData['quantity'],PDO::PARAM_INT);
        $statement->bindParam(':unit_price',$orderDetailData['unit_price'],PDO::PARAM_INT);
        $statement->bindParam(':subtotal',$orderDetailData['subtotal'],PDO::PARAM_INT);
        return $statement->execute();
    }

    public function getOrderDetailByOrderId($orderId){
        $query='SELECT od.*,p.product_name,p.main_photo_id,ph.photo_name
        FROM order_details od 
        INNER JOIN products p ON p.product_id=od.product_id
        LEFT JOIN product_photos ph ON ph.photo_id=p.main_photo_id
        WHERE od.order_id=:order_id';

        $statement=$this->db->prepare($query);
        $statement->bindParam(':order_id',$orderId,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    
    

}
?>