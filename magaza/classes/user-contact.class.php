<?php
require_once __DIR__.'/../../data_access/db-connector.php';

class UserContact
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }


    public function addUserContact($contactData)
    {
        $query = 'INSERT INTO user_contact SET 
                contact_title=:contact_title, 
                contact_city=:contact_city, 
                contact_district=:contact_district,
                contact_address=:contact_address,
                postal_code=:postal_code,
                contact_favorite=:contact_favorite,
                user_id=:user_id';

        $statement = $this->db->prepare($query);
        $statement->bindParam(':contact_title', $contactData['contact_title'], PDO::PARAM_STR);
        $statement->bindParam(':contact_city', $contactData['contact_city'], PDO::PARAM_STR);
        $statement->bindParam(':contact_district', $contactData['contact_district'], PDO::PARAM_STR);
        $statement->bindParam(':contact_address', $contactData['contact_address'], PDO::PARAM_STR);
        $statement->bindParam(':postal_code', $contactData['postal_code'], PDO::PARAM_STR);
        $statement->bindParam(':contact_favorite', $contactData['contact_favorite'], PDO::PARAM_STR);
        $statement->bindParam(':user_id', $contactData['user_id'], PDO::PARAM_INT);
        return $statement->execute();
    }


    public function getUserContact($userId)
    {
        $query = 'SELECT * FROM user_contact WHERE user_id=:user_id ORDER BY contact_id DESC';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserContactByContactId($userId,$contactId)
    {
        $query = 'SELECT * FROM user_contact WHERE user_id=:user_id AND contact_id=:contact_id LIMIT 1';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindParam(':contact_id', $contactId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    public function updateUserInformation($userData)
    {
        $query = 'UPDATE users SET user_first_name=:user_first_name, user_last_name=:user_last_name, user_phone_number=:user_phone_number WHERE user_id=:user_id';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_first_name', $userData['user_first_name'], PDO::PARAM_STR);
        $statement->bindParam(':user_last_name', $userData['user_last_name'], PDO::PARAM_STR);
        $statement->bindParam(':user_phone_number', $userData['user_phone_number'], PDO::PARAM_STR);
        $statement->bindParam(':user_id', $userData['user_id'], PDO::PARAM_INT);
        return $statement->execute();
    }

    public function updateUserContactFavorite($userId, $contactId)
    {
        $resetQuery = "UPDATE user_contact SET contact_favorite = '0' WHERE user_id = :user_id";
        $resetStatement = $this->db->prepare($resetQuery);
        $resetStatement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $resetStatement->execute();

        $setFavoriteQuery = "UPDATE user_contact SET contact_favorite = '1' WHERE user_id = :user_id AND contact_id = :contact_id";
        $setFavoriteStatement = $this->db->prepare($setFavoriteQuery);
        $setFavoriteStatement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $setFavoriteStatement->bindParam(':contact_id', $contactId, PDO::PARAM_INT);
        return $setFavoriteStatement->execute();
    }

    public function deleteUserContact($userId, $contactId)
    {
        $query = 'DELETE FROM user_contact WHERE user_id = :user_id AND contact_id = :contact_id';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindParam(':contact_id', $contactId, PDO::PARAM_INT);
        $result = $statement->execute();

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

}
?>