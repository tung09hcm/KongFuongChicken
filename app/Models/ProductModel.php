<?php
// ProductModel.php
namespace App\Models;

use PDO;

class ProductModel extends BaseModel {
    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM product");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM product WHERE product_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function createProduct($name, $price, $stock) {
        $stmt = $this->db->prepare("INSERT INTO product (product_name, price, stock_quantity) VALUES (:name, :price, :stock)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function updateProduct($id, $name, $price, $stock) {
        $stmt = $this->db->prepare("UPDATE product SET product_name = :name, price = :price, stock_quantity = :stock WHERE product_id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM product WHERE product_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
