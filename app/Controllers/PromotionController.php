<?php
namespace App\Controllers;



use App\Models\PromotionModel;
use App\Models\ProductModel;
use Models\ProductModel as ModelsProductModel;
use Models\PromotionModel as ModelsPromotionModel;

require_once  __DIR__ ."/../Models/PromotionModel.php";
require_once  __DIR__ ."/../Models/ProductModel.php";
class PromotionController {
    public function list() {
        $promotionModel = new ModelsPromotionModel();
        $promotions = $promotionModel->getAllPromotions();
        echo json_encode(['status' => 'success', 'promotions' => $promotions]);
        exit();
    }

    public function detail($id) {
        $promotionModel = new ModelsPromotionModel();
        $promotion = $promotionModel->getPromotionById($id);
        if ($promotion) {
            $productModel = new ModelsProductModel();
            $products = $productModel->getProductsByPromotionId($id);
            echo json_encode(['status' => 'success', 'promotion' => $promotion, 'products' => $products]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Promotion not found!']);
        }
        exit();
    }
}
