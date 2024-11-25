<?php
namespace Models;

use PDO;
require_once  __DIR__ ."/../Models/AccountModel.php";
class UserModel extends AccountModel {
    public function createAccount($first_name, $last_name, $password, $email, $phone, $is_admin = 0) {
        parent::createAccount($first_name, $last_name, $password, $email, $phone);
        $account = parent::getAccountByEmail($email);
        if ($account) {
            $this->createUser($account['id']);
        }
    }

    public function getAccountById($id) {
        $sql = "SELECT * FROM USER WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    public function addAddress($user_id, $address) {
        $stmt = $this->db->prepare("INSERT INTO USER_ADDRESS (user_id, address, last_used) VALUES (:user_id, :address, :last_used)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':address', $address);
        $date = date('Y-m-d H:i:s');
        $stmt->bindParam(':last_used', $date);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateAddress($user_id, $address) {
        $stmt = $this->db->prepare("UPDATE USER_ADDRESS SET address = :address, last_used = NOW() WHERE user_id = :user_id ORDER BY last_used DESC LIMIT 1");
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAddresses($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM USER_ADDRESS WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAddress($id) {
        $stmt = $this->db->prepare("DELETE FROM USER_ADDRESS WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
