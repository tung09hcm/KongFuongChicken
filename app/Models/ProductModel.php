<?php
namespace Models;

use PDO;

class ProductModel extends BaseModel {
    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createProduct($name, $price, $description, $imageLink) {
        $stmt = $this->db->prepare("INSERT INTO PRODUCT (name, price, description, image_link) VALUES (:name, :price, :description, :imageLink)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':imageLink', $imageLink);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateProduct($id, $name, $price, $description, $imageLink) {
        $stmt = $this->db->prepare("UPDATE PRODUCT SET name = :name, price = :price, description = :description,  image_link = :imageLink WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':imageLink', $imageLink);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM PRODUCT WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getProductsByPromotionId($promotion_id) {
        $stmt = $this->db->prepare("SELECT PRODUCT.* FROM PRODUCT JOIN PROMOTION_PRODUCT ON PRODUCT.id = PROMOTION_PRODUCT.product_id WHERE PROMOTION_PRODUCT.promotion_id = :promotion_id");
        $stmt->bindParam(':promotion_id', $promotion_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
