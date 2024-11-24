<?php
namespace Models;
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

    public function searchStores($location) {
        $stmt = $this->db->prepare("SELECT * FROM Store WHERE address LIKE :location");
        $stmt->bindValue(':location', "%$location%");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createStore($name, $address, $phone, $opening_hours) {
        $stmt = $this->db->prepare("INSERT INTO Store (name, address, phone, opening_hours) VALUES (:name, :address, :phone, :opening_hours)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':opening_hours', $opening_hours);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateStore($id, $name, $address, $phone, $opening_hours) {
        $stmt = $this->db->prepare("UPDATE Store SET name = :name, address = :address, phone = :phone, opening_hours = :opening_hours, WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':opening_hours', $opening_hours);
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
