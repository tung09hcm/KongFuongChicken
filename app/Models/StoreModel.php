<?php
namespace App\Models;
use PDO;

class StoreModel extends BaseModel {
    public function getAllStores() {
        $stmt = $this->db->prepare("SELECT * FROM Store");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getStoreById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Store WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function searchStores($keyword) {
        $stmt = $this->db->prepare("SELECT * FROM Store WHERE name LIKE :keyword OR address LIKE :keyword");
        $likeKeyword = '%' . $keyword . '%';
        $stmt->bindParam(':keyword', $likeKeyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createStore($name, $address, $phone, $opening_hours, $services) {
        $stmt = $this->db->prepare("INSERT INTO Store (name, address, phone, opening_hours, services) VALUES (:name, :address, :phone, :opening_hours, :services)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':opening_hours', $opening_hours);
        $stmt->bindParam(':services', $services);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateStore($id, $name, $address, $phone, $opening_hours, $services) {
        $stmt = $this->db->prepare("UPDATE Store SET name = :name, address = :address, phone = :phone, opening_hours = :opening_hours, services = :services WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':opening_hours', $opening_hours);
        $stmt->bindParam(':services', $services);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteStore($id) {
        $stmt = $this->db->prepare("DELETE FROM Store WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
