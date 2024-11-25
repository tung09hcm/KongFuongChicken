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

    public function isAdmin($userId) {
        $sql = "SELECT id FROM ADMIN WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAdmin($id)
    {
        $stmt = $this->db->prepare("DELETE FROM ACCOUNT WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
