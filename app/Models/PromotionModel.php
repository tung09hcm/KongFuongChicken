<?php
namespace Models;

require_once  __DIR__ ."/BaseModel.php";

use PDO;
class PromotionModel extends BaseModel {
    public function getAllPromotions() {
        $stmt = $this->db->prepare("SELECT * FROM PROMOTION WHERE start_date <= CURDATE() AND end_date >= CURDATE()");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPromotionById($id) {
        $stmt = $this->db->prepare("SELECT * FROM PROMOTION WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createPromotion($name, $details, $start_date, $end_date) {
        $stmt = $this->db->prepare("INSERT INTO PROMOTION (name, details, start_date, end_date) VALUES (:name, :details, :start_date, :end_date)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':details', $details);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updatePromotion($id, $name, $details, $start_date, $end_date) {
        $stmt = $this->db->prepare("UPDATE PROMOTION SET name = :name, details = :details, start_date = :start_date, end_date = :end_date WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':details', $details);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deletePromotion($id) {
        $stmt = $this->db->prepare("DELETE FROM PROMOTION WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getActivePromotions() {
        $stmt = $this->db->prepare("SELECT * FROM PROMOTION WHERE start_date <= CURDATE() AND end_date >= CURDATE()");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
