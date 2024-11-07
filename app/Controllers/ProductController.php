<?php
namespace App\Controllers;



use App\Models\ProductModel;

class ProductController {
    public function list() {
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
    }

    public function detail($id) {
        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);
        if ($product) {
            echo json_encode(['status' => 'success', 'product' => $product]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Product not found!']);
        }
        exit();
    }
}
