<?php
namespace Models;
require_once  __DIR__ ."/BaseModel.php";

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
        $stmt = $this->db->prepare("
            SELECT 
                REVIEW.*, 
                ACCOUNT.first_name, 
                ACCOUNT.last_name, 
                REVIEW_REPLY.review_id AS review_id,
                REVIEW_REPLY.reply_content, 
                REVIEW_REPLY.reply_date, 
                REVIEW_REPLY.admin_id,
                ADMIN_ACCOUNT.first_name AS admin_first_name, 
                ADMIN_ACCOUNT.last_name AS admin_last_name
            FROM REVIEW 
            JOIN USER ON REVIEW.user_id = USER.account_id 
            JOIN ACCOUNT ON USER.account_id = ACCOUNT.id 
            LEFT JOIN REVIEW_REPLY ON REVIEW.id = REVIEW_REPLY.review_id 
            LEFT JOIN ACCOUNT AS ADMIN_ACCOUNT ON REVIEW_REPLY.admin_id = ADMIN_ACCOUNT.id 
            WHERE REVIEW.product_id = :product_id
        ");


        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllReviews() {
        $stmt = $this->db->prepare("
            SELECT 
                p.id AS product_id, 
                p.name AS product_name, 
                p.image_link AS product_image, 
                p.price AS product_price, 
                p.description AS product_description, 
                
                c.id AS comment_id, 
                c.content AS comment_content, 
                c.rating AS comment_rating, 
                
                u.first_name AS user_first_name, 
                u.last_name AS user_last_name, 
                
                r.id AS reply_id, 
                r.reply_content AS reply_content, 
                r.reply_date AS reply_date, 
                
                a.first_name AS admin_first_name, 
                a.last_name AS admin_last_name 
                
            FROM PRODUCT p 
                LEFT JOIN REVIEW c ON p.id = c.product_id 
                LEFT JOIN ACCOUNT u ON c.user_id = u.id 
                LEFT JOIN REVIEW_REPLY r ON c.id = r.review_id 
                LEFT JOIN ACCOUNT a ON r.admin_id = a.id 
            WHERE c.id IS NOT NULL
            ORDER BY c.id DESC;"
        );
        //$stmt = $this->db->prepare("SELECT REVIEW.*, ACCOUNT.first_name,ACCOUNT.last_name, PRODUCT.name as product_name FROM REVIEW JOIN USER ON REVIEW.user_id = USER.account_id JOIN ACCOUNT ON USER.account_id = ACCOUNT.id JOIN PRODUCT ON REVIEW.product_id = PRODUCT.id");
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
        // Xoá reply
        $stmt = $this->db->prepare("DELETE FROM REVIEW_REPLY WHERE review_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Xóa comment
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
        $stmt = $this->db->prepare("SELECT REVIEW_REPLY.*, ACCOUNT.first_name,ACCOUNT.last_name FROM REVIEW_REPLY JOIN ADMIN ON REVIEW_REPLY.admin_id = ADMIN.account_id JOIN ACCOUNT ON ADMIN.account_id = ACCOUNT.id WHERE REVIEW_REPLY.review_id = :review_id");
        $stmt->bindParam(':review_id', $review_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getReplyById($id) {
        $stmt = $this->db->prepare("SELECT REVIEW_REPLY.*, ACCOUNT.first_name, ACCOUNT.last_name FROM REVIEW_REPLY JOIN ADMIN ON REVIEW_REPLY.admin_id = ADMIN.account_id JOIN ACCOUNT ON ADMIN.account_id = ACCOUNT.id WHERE REVIEW_REPLY.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
