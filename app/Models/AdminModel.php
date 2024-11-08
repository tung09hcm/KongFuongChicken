<?php
namespace Models;

use PDO;

class AdminModel extends AccountModel {
    public function createAccount($username, $password, $name, $email, $phone, $birth_date) {
        parent::createAccount($username, $password, $name, $email, $phone, $birth_date);
        $account_id = parent::getAccountByUsername($username)['id'];
        $this->createAdmin($account_id);
    }

    public function createAdmin($account_id) {
        $stmt = $this->db->prepare("INSERT INTO ADMIN (account_id) VALUES (:account_id)");
        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAllAdmins() {
        $stmt = $this->db->prepare("SELECT Account.* FROM Account JOIN Admin ON Account.id = Admin.account_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // public function deleteAdmin($account_id) {
    //     $stmt = $this->db->prepare("DELETE FROM Admin WHERE account_id = :account_id");
    //     $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->rowCount();
    // }
}
