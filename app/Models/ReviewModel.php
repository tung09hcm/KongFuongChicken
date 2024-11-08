<?php
namespace Models;

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
        $stmt = $this->db->prepare("INSERT INTO Review_Reply (review_id, admin_id, reply_content) VALUES (:review_id, :admin_id, :reply_content)");
        $stmt->bindParam(':review_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':admin_id', $_SESSION['admin_id'], PDO::PARAM_INT);
        $stmt->bindParam(':reply_content', $reply);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getReplyByReviewId($review_id) {
        $stmt = $this->db->prepare("SELECT Review_Reply.*, Account.name FROM Review_Reply JOIN Admin ON Review_Reply.admin_id = Admin.account_id JOIN Account ON Admin.account_id = Account.id WHERE Review_Reply.review_id = :review_id");
        $stmt->bindParam(':review_id', $review_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
