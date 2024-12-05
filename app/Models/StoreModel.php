<?php
namespace Models;

require_once  __DIR__ ."/BaseModel.php";

use PDO;

class StoreModel extends BaseModel {
    public function getAllStores() {
        $stmt = $this->db->prepare("SELECT * FROM STORE");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getStoreById($id) {
        $stmt = $this->db->prepare("SELECT * FROM STORE WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function searchStores($location) {
        $stmt = $this->db->prepare("SELECT * FROM STORE WHERE address = :location");
        $stmt->bindParam(':location', $location, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createStore($name, $address, $phone, $opening_hours) {
        $stmt = $this->db->prepare("INSERT INTO STORE (name, address, phone, opening_hours) VALUES (:name, :address, :phone, :opening_hours)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':opening_hours', $opening_hours);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateStore($id, $name, $address, $phone, $opening_hours) {
        $stmt = $this->db->prepare("UPDATE STORE SET name = :name, address = :address, phone = :phone, opening_hours = :opening_hours WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':opening_hours', $opening_hours);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteStore($id) {
        $stmt = $this->db->prepare("DELETE FROM STORE WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAllStoreAndAdmin() {
        $stmt = $this->db->prepare("
            SELECT 
                STORE.id AS `store_id`,
                STORE.name AS `store_name`,
                STORE.address AS `store_address`,
                CONCAT(ACCOUNT.first_name, ' ', ACCOUNT.last_name) AS `admin_name`,
                STORE.phone AS `store_phone`,
                ACCOUNT.email AS `admin_email`
            FROM ADMIN_STORE
            JOIN STORE ON ADMIN_STORE.store_id = STORE.id
            JOIN ADMIN ON ADMIN_STORE.admin_id = ADMIN.account_id
            JOIN ACCOUNT ON ADMIN.account_id = ACCOUNT.id;
            ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getStoreAndAdmin($id) {
        $stmt = $this->db->prepare("
            SELECT 
                STORE.id AS `store_id`,
                STORE.name AS `store_name`,
                STORE.address AS `store_address`,
                STORE.phone AS `store_phone`,
                STORE.opening_hours AS `store_opening_hours`,

                ACCOUNT.id AS `admin_id`,
                ACCOUNT.phone AS `admin_phone`,
                ACCOUNT.first_name AS `admin_first_name`,
                ACCOUNT.last_name AS `admin_last_name`,
                ACCOUNT.email AS `admin_email`
            FROM ADMIN_STORE
            JOIN STORE ON ADMIN_STORE.store_id = STORE.id
            JOIN ADMIN ON ADMIN_STORE.admin_id = ADMIN.account_id
            JOIN ACCOUNT ON ADMIN.account_id = ACCOUNT.id
            WHERE STORE.id = :id;
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }




}
