<?php
namespace App\Models;



use PDO;

class AdminModel extends BaseModel {
    public function createAdmin($account_id) {
        $stmt = $this->db->prepare("INSERT INTO Admin (account_id) VALUES (:account_id)");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function findByAccountId($account_id) {
        $stmt = $this->db->prepare("SELECT * FROM Admin WHERE account_id = :account_id");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteAdmin($account_id) {
        $stmt = $this->db->prepare("DELETE FROM Admin WHERE account_id = :account_id");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
