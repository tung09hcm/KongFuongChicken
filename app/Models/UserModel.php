<?php
// UserModel.php
namespace App\Models;

use PDO;

class UserModel extends BaseModel {
    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT * FROM user");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE user_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function createUser($name, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function updateUser($id, $name, $email, $password) {
        $stmt = $this->db->prepare("UPDATE user SET name = :name, email = :email, password = :password WHERE user_id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM user WHERE user_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
