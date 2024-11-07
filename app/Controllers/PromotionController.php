<?php
namespace App\Controllers;



use App\Models\PromotionModel;
use App\Models\ProductModel;

class PromotionController {
    public function list() {
        $promotionModel = new PromotionModel();
        $promotions = $promotionModel->getAllPromotions();
        echo json_encode(['status' => 'success', 'promotions' => $promotions]);
        exit();
    }

    public function detail($id) {
        $promotionModel = new PromotionModel();
        $promotion = $promotionModel->getPromotionById($id);
        if ($promotion) {
            $productModel = new ProductModel();
            $products = $productModel->getProductsByPromotionId($id);
            echo json_encode(['status' => 'success', 'promotion' => $promotion, 'products' => $products]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Promotion not found!']);
        }
        exit();
    }
}
