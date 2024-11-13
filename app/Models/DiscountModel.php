<?php
namespace Models;

use PDO;

class DiscountModel extends BaseModel {
    public function getDiscountByCode($code) {
        $stmt = $this->db->prepare("SELECT * FROM Discount WHERE code = :code AND expiry_date >= CURDATE()");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createDiscount($code, $percentage, $expiry_date) {
        $stmt = $this->db->prepare("INSERT INTO Discount (code, percentage, expiry_date) VALUES (:code, :percentage, :expiry_date)");
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':percentage', $percentage);
        $stmt->bindParam(':expiry_date', $expiry_date);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function deleteDiscount($id) {
        $stmt = $this->db->prepare("DELETE FROM Discount WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateDiscount($id, $code, $percentage, $expiry_date) {
        $stmt = $this->db->prepare("UPDATE Discount SET code = :code, percentage = :percentage, expiry_date = :expiry_date WHERE id = :id");
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':percentage', $percentage);
        $stmt->bindParam(':expiry_date', $expiry_date);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAllDiscounts() {
        $stmt = $this->db->prepare("SELECT * FROM Discount");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}