<?php
namespace Models;

use PDO;
require_once  __DIR__ ."/../Models/BaseModel.php";
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
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $stmt = $this->db->prepare("SELECT quantity FROM CART_PRODUCT WHERE cart_id = :cart_id AND product_id = :product_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        $existingProduct = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($existingProduct) {
            // Nếu sản phẩm đã tồn tại, thực hiện UPDATE số lượng
            $newQuantity = $existingProduct['quantity'] + $quantity;
            $updateStmt = $this->db->prepare("UPDATE CART_PRODUCT SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id");
            $updateStmt->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);
            $updateStmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
            $updateStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $updateStmt->execute();
            return "updated"; // Trả về trạng thái cập nhật
        } else {
            // Nếu sản phẩm chưa tồn tại, thực hiện INSERT
            $insertStmt = $this->db->prepare("INSERT INTO CART_PRODUCT (cart_id, product_id, quantity) VALUES (:cart_id, :product_id, :quantity)");
            $insertStmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
            $insertStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $insertStmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $insertStmt->execute();
            return $this->db->lastInsertId(); // Trả về ID của bản ghi mới
        }
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
