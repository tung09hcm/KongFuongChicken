<?php
namespace Models;

use PDO;

class CartModel extends BaseModel {
    public function createCart($user_id) {
        $stmt = $this->db->prepare("INSERT INTO Cart (user_id) VALUES (:user_id)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getCartByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM Cart WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addProductToCart($cart_id, $product_id, $quantity) {
        $stmt = $this->db->prepare("INSERT INTO Cart_Product (cart_id, product_id, quantity) VALUES (:cart_id, :product_id, :quantity)");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateQuantity($cart_id, $product_id, $quantity) {
        $stmt = $this->db->prepare("UPDATE Cart_Product SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function removeProductFromCart($cart_id, $product_id) {
        $stmt = $this->db->prepare("DELETE FROM Cart_Product WHERE cart_id = :cart_id AND product_id = :product_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getProductsInCart($cart_id) {
        $stmt = $this->db->prepare("SELECT Product.*, Cart_Product.cart_id FROM Product JOIN Cart_Product ON Product.id = Cart_Product.product_id WHERE Cart_Product.cart_id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function clearCart($cart_id) {
        $stmt = $this->db->prepare("DELETE FROM Cart_Product WHERE cart_id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    // public function getTotal($cart_id) {
    //     $stmt = $this->db->prepare("SELECT SUM(Product.price * Cart_Product.quantity) as total FROM Product JOIN Cart_Product ON Product.id = Cart_Product.product_id WHERE Cart_Product.cart_id = :cart_id");
    //     $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetch();
    // }

//     -- Bảng CART để lưu thông tin giỏ hàng của người dùng
// CREATE TABLE CART (
//     id INT PRIMARY KEY AUTO_INCREMENT,
//     user_id INT NOT NULL UNIQUE,
// 		total DECIMAL(10, 2) DEFAULT 0,
//     FOREIGN KEY (user_id) REFERENCES USER(account_id) ON DELETE CASCADE
// );
    public function getTotal($cart_id) {
        $stmt = $this->db->prepare("SELECT total FROM Cart WHERE id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateTotal($cart_id, $total) {
        $stmt = $this->db->prepare("UPDATE Cart SET total = :total WHERE id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':total', $total);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
