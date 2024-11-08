<?php
namespace Models;

use PDO;

class OrderModel extends BaseModel {
    public function createOrder($user_id, $store_id, $discount_id, $delivery_address, $order_date, $total) {
        $stmt = $this->db->prepare("INSERT INTO `Order` (user_id, store_id, discount_id, delivery_address, order_date, total) VALUES (:user_id, :store_id, :discount_id, :delivery_address, :order_date, :total)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_INT);
        $stmt->bindParam(':discount_id', $discount_id, PDO::PARAM_INT);
        $stmt->bindParam(':delivery_address', $delivery_address);
        $stmt->bindParam(':order_date', $order_date);
        $stmt->bindParam(':total', $total);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getOrdersByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM `Order` WHERE user_id = :user_id ORDER BY order_date DESC");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrderById($id) {
        $stmt = $this->db->prepare("SELECT * FROM `Order` WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getProductInOrder($order_id) {
        $stmt = $this->db->prepare("SELECT Product.*, Order_Product.quantity FROM Product JOIN Order_Product ON Product.id = Order_Product.product_id WHERE Order_Product.order_id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
