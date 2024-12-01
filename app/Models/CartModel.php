<?php
namespace Models;

use PDO;
class CartModel extends BaseModel {
    public function createCart($user_id) {
        $stmt = $this->db->prepare("INSERT INTO CART (user_id) VALUES (:user_id)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getCartByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM CART WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addProductToCart($cart_id, $product_id, $quantity) {
        $stmt = $this->db->prepare("INSERT INTO CART_PRODUCT (cart_id, product_id, quantity) VALUES (:cart_id, :product_id, :quantity) ON DUPLICATE KEY UPDATE quantity = quantity + :quantity");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }
    
    public function updateQuantity($cart_id, $product_id, $quantity) {
        $stmt = $this->db->prepare("UPDATE CART_PRODUCT SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function removeProductFromCart($cart_id, $product_id) {
        $stmt = $this->db->prepare("DELETE FROM CART_PRODUCT WHERE cart_id = :cart_id AND product_id = :product_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getProductsInCart($cart_id) {
        $stmt = $this->db->prepare("SELECT PRODUCT.*, CART_PRODUCT.cart_id, CART_PRODUCT.quantity FROM PRODUCT JOIN CART_PRODUCT ON PRODUCT.id = CART_PRODUCT.product_id WHERE CART_PRODUCT.cart_id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function clearCart($cart_id) {
        $stmt = $this->db->prepare("DELETE FROM CART_PRODUCT WHERE cart_id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getTotal($cart_id) {
        $stmt = $this->db->prepare("SELECT total FROM CART WHERE id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateTotal($cart_id, $total) {
        $stmt = $this->db->prepare("UPDATE CART SET total = :total WHERE id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':total', $total);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
