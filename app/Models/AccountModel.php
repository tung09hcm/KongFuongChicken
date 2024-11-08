<?php
namespace Models;
use PDO;

class AccountModel extends BaseModel {
    protected function createAccount($username, $password, $name, $email, $phone, $birth_date) {
        $sql = "INSERT INTO ACCOUNT (username, password, name, email, phone, birth_date) VALUES (:username, :password, :name, :email, :phone, :birth_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':birth_date', $birth_date);
        return $stmt->execute();
    }

    public function getAccountByUsername($username) {
        $sql = "SELECT * FROM ACCOUNT WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAccountByEmail($email) {
        $sql = "SELECT * FROM ACCOUNT WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAccountById($id) {
        $sql = "SELECT * FROM ACCOUNT WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($id, $password) {
        $sql = "UPDATE ACCOUNT SET password = :password WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateInfo($id, $phone, $address) {
        $sql = "UPDATE ACCOUNT SET phone = :phone WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $sql = "UPDATE USER_ADDRESS SET address = :address, last_used = NOW() WHERE user_id = :user_id ORDER BY last_used DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteAccount($id) {
        $sql = "DELETE FROM ACCOUNT WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
