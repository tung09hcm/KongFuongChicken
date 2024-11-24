<?php
namespace Models;

use PDO;

class ReviewModel extends BaseModel {
    public function createReview($product_id, $user_id, $content, $rating) {
        $stmt = $this->db->prepare("INSERT INTO REVIEW (product_id, user_id, content, rating) VALUES (:product_id, :user_id, :content, :rating)");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getReviewsByProductId($product_id) {
        $stmt = $this->db->prepare("SELECT REVIEW.*, ACCOUNT.first_name,ACCOUNT.last_name, FROM REVIEW JOIN USER ON REVIEW.user_id = USER.account_id JOIN ACCOUNT ON USER.account_id = ACCOUNT.id WHERE REVIEW.product_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllReviews() {
        $stmt = $this->db->prepare("SELECT REVIEW.*, ACCOUNT.first_name,ACCOUNT.last_name, PRODUCT.name as product_name FROM REVIEW JOIN USER ON REVIEW.user_id = USER.account_id JOIN ACCOUNT ON USER.account_id = ACCOUNT.id JOIN PRODUCT ON REVIEW.product_id = PRODUCT.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getReviewById($id) {
        $stmt = $this->db->prepare("SELECT REVIEW.*, ACCOUNT.first_name,ACCOUNT.last_name FROM REVIEW JOIN USER ON REVIEW.user_id = USER.account_id JOIN ACCOUNT ON USER.account_id = ACCOUNT.id WHERE REVIEW.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteReview($id) {
        $stmt = $this->db->prepare("DELETE FROM REVIEW WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function replyToReview($id, $reply) {
        $stmt = $this->db->prepare("INSERT INTO REVIEW_REPLY (review_id, admin_id, reply_content) VALUES (:review_id, :admin_id, :reply_content)");
        $stmt->bindParam(':review_id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':admin_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindParam(':reply_content', $reply);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getReplyByReviewId($review_id) {
        $stmt = $this->db->prepare("SELECT REVIEW_REPLY.*, ACCOUNT.first_name,ACCOUNT.last_name FROM REVIEW_REPLY JOIN Admin ON REVIEW_REPLY.admin_id = ADMIN.account_id JOIN ACCOUNT ON ADMIN.account_id = ACCOUNT.id WHERE REVIEW_REPLY.review_id = :review_id");
        $stmt->bindParam(':review_id', $review_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
