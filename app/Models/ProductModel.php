<?php
namespace App\Models;



use PDO;

class ProductModel extends BaseModel {
    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM Product");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createProduct($name, $price, $description) {
        $stmt = $this->db->prepare("INSERT INTO Product (name, price, description) VALUES (:name, :price, :description)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateProduct($id, $name, $price, $description) {
        $stmt = $this->db->prepare("UPDATE Product SET name = :name, price = :price, description = :description WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM Product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getProductsByPromotionId($promotion_id) {
        $stmt = $this->db->prepare("SELECT Product.* FROM Product JOIN Promotion_Product ON Product.id = Promotion_Product.product_id WHERE Promotion_Product.promotion_id = :promotion_id");
        $stmt->bindParam(':promotion_id', $promotion_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
