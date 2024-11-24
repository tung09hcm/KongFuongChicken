<?php
namespace Models;

use PDO;

class AdminModel extends AccountModel {
    public function createAccount($first_name, $last_name, $password, $email, $phone, $is_admin = 1) {
        parent::createAccount($first_name, $last_name, $password, $email, $phone, $is_admin);
        $account = parent::getAccountByEmail($email);
        if ($account) {
            $this->createAdmin($account['id']);
        }
    }

    public function createAdmin($account_id) {
        $stmt = $this->db->prepare("INSERT INTO ADMIN (account_id) VALUES (:account_id)");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAllAdmins() {
        $stmt = $this->db->prepare("SELECT ACCOUNT.* FROM ACCOUNT JOIN ADMIN ON ACCOUNT.id = ADMIN.account_id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStore($admin_id, $store_id) {
        $stmt = $this->db->prepare("INSERT INTO ADMIN_STORE (admin_id, store_id) VALUES (:admin_id, :store_id)");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function removeStore($admin_id, $store_id) {
        $stmt = $this->db->prepare("DELETE FROM ADMIN_STORE WHERE admin_id = :admin_id AND store_id = :store_id");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getStores($admin_id) {
        $stmt = $this->db->prepare("SELECT STORE.* FROM STORE JOIN ADMIN_STORE ON STORE.id = ADMIN_STORE.store_id WHERE ADMIN_STORE.admin_id = :admin_id");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
