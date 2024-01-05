<?php
require_once __DIR__.'/../../data_access/db-connector.php'; 

class Cart
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

    public function addToCart($cartData){
        $query="INSERT INTO cart SET user_id=:user_id, product_id=:product_id, quantity=:quantity";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$cartData['user_id'],PDO::PARAM_INT);
        $statement->bindParam(':product_id',$cartData['product_id'],PDO::PARAM_INT);
        $statement->bindParam(':quantity',$cartData['quantity'],PDO::PARAM_INT);
        return $statement->execute();
    }

    public function getCartByUserId($userId){
        $query="SELECT c.*,p.*,ph.photo_name FROM cart c
                INNER JOIN products p ON c.product_id=p.product_id
                LEFT JOIN product_photos ph ON p.main_photo_id=ph.photo_id
                WHERE user_id=:user_id AND cart_approval='0'";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCartByUserIdCartApproved($userId){
        $query="SELECT c.*,p.*,ph.photo_name FROM cart c
                INNER JOIN products p ON c.product_id=p.product_id
                LEFT JOIN product_photos ph ON p.main_photo_id=ph.photo_id
                WHERE user_id=:user_id AND cart_approval='1'";
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeFromCart($cartId, $userId){
        $query = "DELETE FROM cart WHERE cart_id = :cart_id AND user_id = :user_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':cart_id', $cartId, PDO::PARAM_INT);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
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

    public function removeFromCartAllProduct($userId){
        $query = "DELETE FROM cart WHERE user_id =:user_id and cart_approval='1' ";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
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

    public function approveCartItems($userId){
        $query = "UPDATE cart SET cart_approval = '1' WHERE user_id = :user_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function isProductInCart($userId, $productId) {
        $query = "SELECT COUNT(*) as count FROM cart WHERE user_id = :user_id AND product_id = :product_id AND cart_approval='0'";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

    public function updateCartQuantity($userId, $productId, $quantity) {
        $query = "UPDATE cart SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $statement->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function getTotalQuantityInCart($userId, $productId) {
        $query = "SELECT SUM(quantity) as total_quantity FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total_quantity'] ?: 0;
    }

    public function clearCart($userId) {
        $query = "DELETE FROM cart WHERE user_id = :user_id and cart_approval='1'";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        return $statement->execute();
    }
    

}
?>