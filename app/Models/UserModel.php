<?php
namespace Models;

use PDO;

class UserModel extends AccountModel {
    public function createAccount($first_name, $last_name, $password, $email, $phone) {
        parent::createAccount($first_name, $last_name, $password, $email, $phone);
        $account = parent::getAccountByEmail($email);
        if ($account) {
            $this->createUser($account['id']);
        }
    }

    public function createUser($account_id) {
        $stmt = $this->db->prepare("INSERT INTO USER (account_id) VALUES (:account_id)");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT ACCOUNT.* FROM ACCOUNT JOIN USER ON ACCOUNT.id = USER.account_id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
