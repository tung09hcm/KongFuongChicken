<?php
namespace App\Controllers;



use App\Models\ReviewModel;
use App\Models\ProductModel;

class ReviewController {
    public function view($product_id) {
        $productModel = new ProductModel();
        $reviewModel = new ReviewModel();
        $product = $productModel->getProductById($product_id);
        if (!$product) {
            echo json_encode(['status' => 'error', 'message' => 'Product not found!']);
            exit();
        }
        $reviews = $reviewModel->getReviewsByProductId($product_id);
        echo json_encode(['status' => 'success', 'product' => $product, 'reviews' => $reviews]);
        exit();
    }

    public function write() {
        $this->checkAuth('user');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = intval($_POST['product_id']);
            $content = trim($_POST['content']);
            $rating = intval($_POST['rating']);
            if ($rating >= 1 && $rating <= 5) {
                $reviewModel = new ReviewModel();
                $reviewModel->createReview($product_id, $_SESSION['user_id'], $content, $rating);
                echo json_encode(['status' => 'success', 'message' => 'Đánh giá đã được gửi thành công.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Đánh giá phải từ 1 đến 5 sao.']);
            }
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    private function checkAuth($role) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== $role) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập để tiếp tục.', 'redirect' => BASE_URL . 'login']);
            exit();
        }
    }
}
