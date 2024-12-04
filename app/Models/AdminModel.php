<?php
namespace Models;

require_once  __DIR__ ."/AccountModel.php";

use PDO;

class AdminModel extends AccountModel {
    public function createAccount($first_name, $last_name, $password, $email, $phone, $is_admin = 1) {
        parent::createAccount($first_name, $last_name, $password, $email, $phone, $is_admin);
        $account = parent::getAccountByEmail($email);
        if ($account) {
            $this->createAdmin($account['id']);
        }
        return $account['id'];
    }

    private function createAdmin($account_id) {
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

    public function deleteAdmin($id) {
        $stmt = $this->db->prepare("DELETE FROM ADMIN WHERE account_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
