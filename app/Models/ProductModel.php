<?php
namespace Models;

require_once  __DIR__ ."/BaseModel.php";

use PDO;

class ProductModel extends BaseModel {
    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy sản phẩm ưu đãi
    public function getPromotionProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE IsDiscounted = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm mới
    public function getNewProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE IsNew = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm combo 1
    public function getCombo1Products() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE IsCombo1 = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm combo nhóm
    public function getComboGroupProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE IsComboGroup = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm gà rán - gà quay
    public function getChickenProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE IsChicken = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm burger - cơm - mì ý
    public function getMainDishProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE IsMainDish = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm thức ăn nhẹ
    public function getSnackProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE IsSnack = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm thức uống tráng miệng
    public function getDrinkDessertProducts() {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE IsDrinkDessert = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($name, $price, $description, $image_link, $IsNew) {
        // $stmt = $this->db->prepare("INSERT INTO PRODUCT (name, price, description, image_link) VALUES (:name, :price, :description, :image_link)");
        $stmt = $this->db->prepare(
            "INSERT INTO PRODUCT (
                name, price, description, image_link,
                IsRecommended, IsDiscounted, IsNew, IsCombo1, IsComboGroup,
                IsChicken, IsMainDish, IsSnack, IsDrinkDessert
            ) VALUES (
                :name, :price, :description, :image_link,
                0, 0, :IsNew, 0, 0,
                0, 0, 0, 0
            )"
        );
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_link', $image_link);
        $stmt->bindParam(':IsNew', $IsNew, PDO::PARAM_INT);
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
