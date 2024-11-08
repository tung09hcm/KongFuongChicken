<?php
namespace Models;
use PDO;

class UserModel extends AccountModel {
    public function createAccount($username, $password, $name, $email, $phone, $birth_date) {
        parent::createAccount($username, $password, $name, $email, $phone, $birth_date);
        $account_id = parent::getAccountByUsername($username)['id'];
        $this->createUser($account_id);
    }
    public function createUser($account_id) {
        $stmt = $this->db->prepare("INSERT INTO User (account_id) VALUES (:account_id)");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    // public function deleteUser($account_id) {
    //     $stmt = $this->db->prepare("DELETE FROM User WHERE account_id = :account_id");
    //     $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->rowCount();
    // }

    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT Account.* FROM Account JOIN User ON Account.id = User.account_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
