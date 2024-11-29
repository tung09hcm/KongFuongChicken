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
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($name, $price, $description, $image_link) {
        $stmt = $this->db->prepare("INSERT INTO PRODUCT (name, price, description, image_link) VALUES (:name, :price, :description, :image_link)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_link', $image_link);
        return $stmt->execute();
    }

    public function updateProduct($id, $name, $price, $description, $image_link) {
        $stmt = $this->db->prepare("UPDATE PRODUCT SET name = :name, price = :price, description = :description,  image_link = :image_link WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_link', $image_link);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM PRODUCT WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
