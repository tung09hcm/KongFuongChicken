<?php
namespace Models;

use PDO;

class PostModel extends BaseModel {
    public function createPost($admin_id, $title, $content) {
        $stmt = $this->db->prepare("INSERT INTO Post (admin_id, title, content) VALUES (:admin_id, :title, :content)");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updatePost($post_id, $title, $content) {
        $stmt = $this->db->prepare("UPDATE Post SET title = :title, content = :content, updated_at = CURRENT_TIMESTAMP WHERE id = :post_id");
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deletePost($post_id) {
        $stmt = $this->db->prepare("DELETE FROM Post WHERE id = :post_id");
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getPostById($post_id) {
        $stmt = $this->db->prepare("SELECT * FROM Post WHERE id = :post_id");
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getPostsByAdminId($admin_id) {
        $stmt = $this->db->prepare("SELECT * FROM Post WHERE admin_id = :admin_id ORDER BY created_at DESC");
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllPosts() {
        $stmt = $this->db->prepare("SELECT * FROM Post ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
