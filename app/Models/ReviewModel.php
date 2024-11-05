<?php
// ReviewModel.php
namespace App\Models;

use PDO;

class ReviewModel extends BaseModel {
    public function getAllReviews() {
        $stmt = $this->db->prepare("SELECT * FROM review");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getReviewById($id) {
        $stmt = $this->db->prepare("SELECT * FROM review WHERE review_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function createReview($product_id, $user_id, $review_text, $rating) {
        $stmt = $this->db->prepare("INSERT INTO review (product_id, user_id, review_text, rating) VALUES (:product_id, :user_id, :review_text, :rating)");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':review_text', $review_text, PDO::PARAM_STR);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function updateReview($id, $product_id, $user_id, $review_text, $rating) {
        $stmt = $this->db->prepare("UPDATE review SET product_id = :product_id, user_id = :user_id, review_text = :review_text, rating = :rating WHERE review_id = :id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':review_text', $review_text, PDO::PARAM_STR);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deleteReview($id) {
        $stmt = $this->db->prepare("DELETE FROM review WHERE review_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
