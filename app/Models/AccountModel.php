<?php
namespace App\Models;



use PDO;

class AccountModel extends BaseModel {
    public function createAccount($username, $password, $role, $name, $email, $address, $birth_date, $phone) {
        $stmt = $this->db->prepare("INSERT INTO Account (username, password, role, name, email, address, birth_date, phone) VALUES (:username, :password, :role, :name, :email, :address, :birth_date, :phone)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':birth_date', $birth_date);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM Account WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Account WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updatePassword($id, $new_password) {
        $stmt = $this->db->prepare("UPDATE Account SET password = :password WHERE id = :id");
        $stmt->bindParam(':password', $new_password);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateAccount($id, $name, $email, $address, $phone) {
        $stmt = $this->db->prepare("UPDATE Account SET name = :name, email = :email, address = :address, phone = :phone WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteAccount($id) {
        $stmt = $this->db->prepare("DELETE FROM Account WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAllAccounts() {
        $stmt = $this->db->prepare("SELECT * FROM Account");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
