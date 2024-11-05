<?php
// ReviewController.php
namespace App\Controllers;

use App\Models\ReviewModel;

class ReviewController {
    private $model;

    public function __construct() {
        $this->model = new ReviewModel();
    }

    public function index() {
        $reviews = $this->model->getAllReviews();
    }

    public function show($id) {
        $review = $this->model->getReviewById($id);
    }

    public function create($data) {
        $this->model->createReview($data['product_id'], $data['user_id'], $data['review_text'], $data['rating']);
    }

    public function update($id, $data) {
        $this->model->updateReview($id, $data['product_id'], $data['user_id'], $data['review_text'], $data['rating']);
    }

    public function delete($id) {
        $this->model->deleteReview($id);
    }
}
?>
