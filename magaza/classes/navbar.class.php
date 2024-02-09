<?php
require_once __DIR__ . '/../../data_access/db-connector.php';

class Navbar
{
    private $db;

    public function __construct()
    {
        $dbConnector = DbConnector::getInstance();
        $this->db = $dbConnector->getConnection();
    }

    public function GetCartCount($userId)
    {
        $query = 'SELECT COUNT(*) AS cart_count FROM cart WHERE user_id = :user_id AND cart_approval="0"';
        $statement = $this->db->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return isset($result['cart_count']) ? (int) $result['cart_count'] : 0;
    }

    public function getCategories()
    {
        $query = "SELECT * FROM categories ORDER BY category_id";
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoriesTree()
    {
        $categories = $this->fetchCategories();
        $tree = $this->buildTree($categories);
        return $tree;
    }

    private function fetchCategories()
    {
        $query = "SELECT * FROM categories ORDER BY category_id";
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    private function buildTree(array &$elements, $parentId = null)
    {
        $branch = [];

        foreach ($elements as &$element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['category_id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
                unset($element);
            }
        }

        return $branch;
    }

}
?>