<?php
// CartModel.php
namespace App\Models;

use PDO;

class CartModel extends BaseModel {
    public function getCartByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM cart WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function addToCart($user_id, $product_id, $quantity) {
        $stmt = $this->db->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function updateCart($cart_id, $quantity) {
        $stmt = $this->db->prepare("UPDATE cart SET quantity = :quantity WHERE cart_id = :cart_id");
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteFromCart($cart_id) {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE cart_id = :cart_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
