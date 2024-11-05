<?php
namespace App\Models;

use PDO;

class AdminModel extends BaseModel {
    public function getAllAdmins() {
        $stmt = $this->db->prepare("SELECT * FROM admin");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAdminById($id) {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function createAdmin($name, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO admin (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function updateAdmin($id, $name, $email, $password) {
        $stmt = $this->db->prepare("UPDATE admin SET name = :name, email = :email, password = :password WHERE id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteAdmin($id) {
        $stmt = $this->db->prepare("DELETE FROM admin WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
