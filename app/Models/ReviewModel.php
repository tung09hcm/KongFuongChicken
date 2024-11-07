<?php
namespace App\Models;



use PDO;

class ReviewModel extends BaseModel {
    public function createReview($product_id, $user_id, $content, $rating) {
        $stmt = $this->db->prepare("INSERT INTO Review (product_id, user_id, content, rating) VALUES (:product_id, :user_id, :content, :rating)");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getReviewsByProductId($product_id) {
        $stmt = $this->db->prepare("SELECT Review.*, Account.name FROM Review JOIN User ON Review.user_id = User.account_id JOIN Account ON User.account_id = Account.id WHERE Review.product_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllReviews() {
        $stmt = $this->db->prepare("SELECT Review.*, Account.name, Product.name as product_name FROM Review JOIN User ON Review.user_id = User.account_id JOIN Account ON User.account_id = Account.id JOIN Product ON Review.product_id = Product.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getReviewById($id) {
        $stmt = $this->db->prepare("SELECT Review.*, Account.name FROM Review JOIN User ON Review.user_id = User.account_id JOIN Account ON User.account_id = Account.id WHERE Review.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteReview($id) {
        $stmt = $this->db->prepare("DELETE FROM Review WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function replyToReview($id, $reply) {
        $stmt = $this->db->prepare("UPDATE Review SET reply = :reply WHERE id = :id");
        $stmt->bindParam(':reply', $reply);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
