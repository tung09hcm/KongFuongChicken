<?php
namespace App\Controllers;
require_once  __DIR__ ."/../Models/BaseModel.php";



use App\Models\ProductModel;
use Models\ProductModel as ModelsProductModel;

require_once  __DIR__ ."/../Models/ProductModel.php";
class ProductController {
    public function list() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getAllProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
    }

    public function detail($id) {
        $productModel = new ModelsProductModel();
        $product = $productModel->getProductById($id);
        if ($product) {
            echo json_encode(['status' => 'success', 'product' => $product]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Product not found!']);
        }
        exit();
    }
}
