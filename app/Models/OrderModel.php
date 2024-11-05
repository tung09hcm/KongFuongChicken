<?php
// OrderModel.php
namespace App\Models;

use PDO;

class OrderModel extends BaseModel {
    public function getAllOrders() {
        $stmt = $this->db->prepare("SELECT * FROM `order`");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getOrderById($id) {
        $stmt = $this->db->prepare("SELECT * FROM `order` WHERE order_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function createOrder($order_date, $total_amount, $user_id) {
        $stmt = $this->db->prepare("INSERT INTO `order` (order_date, total_amount, user_id) VALUES (:order_date, :total_amount, :user_id)");
        $stmt->bindParam(':order_date', $order_date);
        $stmt->bindParam(':total_amount', $total_amount);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function updateOrder($id, $order_date, $total_amount, $user_id) {
        $stmt = $this->db->prepare("UPDATE `order` SET order_date = :order_date, total_amount = :total_amount, user_id = :user_id WHERE order_id = :id");
        $stmt->bindParam(':order_date', $order_date);
        $stmt->bindParam(':total_amount', $total_amount);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteOrder($id) {
        $stmt = $this->db->prepare("DELETE FROM `order` WHERE order_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
