<?php
namespace App\Models;



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

    public function addProductToCart($cart_id, $product_id) {
        $stmt = $this->db->prepare("INSERT INTO Cart_Product (cart_id, product_id) VALUES (:cart_id, :product_id)");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
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
}
