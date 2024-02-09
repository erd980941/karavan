<?php
require_once __DIR__.'/../../data_access/db-connector.php';

class User
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

    public function addUser($userData)
    {
        $hashedPassword=password_hash($userData['user_password'],PASSWORD_DEFAULT);

        $query = "INSERT INTO users SET user_email=:user_email, user_password=:user_password";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_email', $userData['user_email'], PDO::PARAM_STR);
        $statement->bindParam(':user_password', $hashedPassword, PDO::PARAM_STR);
        return $statement->execute();

    }

    public function isExistEmail($userData)
    {
        $query = "SELECT COUNT(*) as count FROM users WHERE user_email = :email";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':email', $userData['user_email']);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            return true; // E-posta mevcut
        } else {
            return false; // E-posta mevcut değil
        }
    }

    public function getUserByEmail($user_email){
        $query='SELECT * FROM users WHERE user_email=:user_email LIMIT 1';
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_email',$user_email,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    public function getUserInformation($userId,$userEmail){
        $query='SELECT user_id,user_email, user_first_name, user_last_name, user_phone_number, user_status FROM users WHERE user_id=:user_id AND user_email=:user_email LIMIT 1';
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $statement->bindParam(':user_email',$userEmail,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserInformation($userData){
        $query='UPDATE users SET user_first_name=:user_first_name, user_last_name=:user_last_name, user_phone_number=:user_phone_number WHERE user_id=:user_id';
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_first_name',$userData['user_first_name'],PDO::PARAM_STR);
        $statement->bindParam(':user_last_name',$userData['user_last_name'],PDO::PARAM_STR);
        $statement->bindParam(':user_phone_number',$userData['user_phone_number'],PDO::PARAM_STR);
        $statement->bindParam(':user_id',$userData['user_id'],PDO::PARAM_STR);
        return $statement->execute();
    }
    
    public function updateUserEmailVerification($userId) {
        $query = "UPDATE users SET email_verified = '1' WHERE user_id = :user_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function getUserPassword($userId,$userEmail){
        $query='SELECT user_password FROM users WHERE user_id=:user_id AND user_email=:user_email LIMIT 1';
        $statement=$this->db->prepare($query);
        $statement->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $statement->bindParam(':user_email',$userEmail,PDO::PARAM_STR);
        $statement->execute();
        $userPassword=$statement->fetch(PDO::FETCH_ASSOC);
        return $userPassword['user_password'];
    }

    public function changePassword($userPasswordData) {
    
        $hashedNewPassword = password_hash($userPasswordData['new_password'], PASSWORD_DEFAULT);
    
        $query = "UPDATE users SET user_password = :new_password WHERE user_id = :user_id AND user_email = :user_email";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':new_password', $hashedNewPassword, PDO::PARAM_STR);
        $statement->bindParam(':user_id', $userPasswordData['user_id'], PDO::PARAM_INT);
        $statement->bindParam(':user_email', $userPasswordData['user_email'], PDO::PARAM_STR);
    
        return $statement->execute();
    }

}
?>