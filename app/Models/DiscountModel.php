<?php
namespace Models;

use PDO;

class DiscountModel extends BaseModel {
    public function getDiscountByCode($code) {
        $stmt = $this->db->prepare("SELECT * FROM DISCOUNT WHERE code = :code AND expiry_date >= CURDATE()");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createDiscount($code, $percentage, $expiry_date) {
        $stmt = $this->db->prepare("INSERT INTO DISCOUNT (code, percentage, expiry_date) VALUES (:code, :percentage, :expiry_date)");
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':percentage', $percentage);
        $stmt->bindParam(':expiry_date', $expiry_date);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function deleteDiscount($id) {
        $stmt = $this->db->prepare("DELETE FROM DISCOUNT WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateDiscount($id, $code, $percentage, $expiry_date) {
        $stmt = $this->db->prepare("UPDATE DISCOUNT SET code = :code, percentage = :percentage, expiry_date = :expiry_date WHERE id = :id");
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':percentage', $percentage);
        $stmt->bindParam(':expiry_date', $expiry_date);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAllDiscounts() {
        $stmt = $this->db->prepare("
        SELECT * 
            FROM DISCOUNT
            WHERE expiry_date > CURDATE()
            ORDER BY expiry_date ASC;
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDiscount($id) {
        $stmt = $this->db->prepare("SELECT * FROM DISCOUNT WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
