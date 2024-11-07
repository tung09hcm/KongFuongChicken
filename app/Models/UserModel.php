<?php
namespace App\Models;
use PDO;

class UserModel extends BaseModel {
    public function createUser($account_id) {
        $stmt = $this->db->prepare("INSERT INTO User (account_id) VALUES (:account_id)");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function findByAccountId($account_id) {
        $stmt = $this->db->prepare("SELECT * FROM User WHERE account_id = :account_id");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM User JOIN Account ON User.account_id = Account.id WHERE Account.email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    // public function updateUserInfo($account_id, $phone, $address) {
    //     $stmt = $this->db->prepare("UPDATE User SET phone = :phone WHERE account_id = :account_id");
    //     $stmt->bindParam(':phone', $phone);
    //     $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $stmt = $this->db->prepare("UPDATE Account SET address = :address WHERE id = :account_id");
    //     $stmt->bindParam(':address', $address);
    //     $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->rowCount();
    // }

    public function deleteUser($account_id) {
        $stmt = $this->db->prepare("DELETE FROM User WHERE account_id = :account_id");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT Account.name, Account.email, Account.phone, Account.address, Account.birth_date FROM Account JOIN User ON Account.id = User.account_id WHERE Account.role = 'user'");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
