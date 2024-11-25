<?php
namespace Models;
use PDO;

class OrderModel extends BaseModel {
    public function createOrder($user_id, $store_id, $discount_id, $address, $total, $status = 'Pending') {
        $stmt = $this->db->prepare("INSERT INTO `ORDER` (user_id, store_id, discount_id, user_address_id, total, status) VALUES (:user_id, :store_id, :discount_id, :address, :total, :status)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_INT);
        $stmt->bindParam(':discount_id', $discount_id, PDO::PARAM_INT);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function addProductToOrder($order_id, $product_id, $quantity) {
        $stmt = $this->db->prepare("INSERT INTO ORDER_PRODUCT (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateOrderStatus($order_id, $status) {
        $stmt = $this->db->prepare("UPDATE `ORDER` SET status = :status WHERE id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getOrdersByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM `ORDER` WHERE user_id = :user_id ORDER BY order_date DESC");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrderById($id) {
        $stmt = $this->db->prepare("SELECT * FROM `ORDER` WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getProductInOrder($order_id) {
        $stmt = $this->db->prepare("SELECT PRODUCT.*, ORDER_PRODUCT.quantity FROM PRODUCT JOIN ORDER_PRODUCT ON PRODUCT.id = ORDER_PRODUCT.product_id WHERE ORDER_PRODUCT.order_id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteOrder($order_id) {
        $stmt = $this->db->prepare("DELETE FROM `ORDER` WHERE id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
