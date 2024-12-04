<?php
require_once  __DIR__ ."/../Models/BaseModel.php";

use App\Models\ProductModel;
use Models\ProductModel as ModelsProductModel;

require_once  __DIR__ ."/../Models/ProductModel.php";
class ProductController {
    // Lấy tất cả sản phẩm
    public function list() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getAllProducts();
        return json_encode(['status' => 'success', 'products' => $products]);
    }

    // Lấy sản phẩm ưu đãi
    public function listPromotionProducts() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getPromotionProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
        //return json_encode(['status' => 'success', 'products' => $products]);
    }

    // Lấy sản phẩm mới
    public function listNewProducts() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getNewProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
        //return json_encode(['status' => 'success', 'products' => $products]);
    }

    // Lấy sản phẩm combo 1
    public function listCombo1Products() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getCombo1Products();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
        //return json_encode(['status' => 'success', 'products' => $products]);
    }

    // Lấy sản phẩm combo nhóm
    public function listComboGroupProducts() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getComboGroupProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
        //return json_encode(['status' => 'success', 'products' => $products]);
    }

    // Lấy sản phẩm gà rán - gà quay
    public function listChickenProducts() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getChickenProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
        //return json_encode(['status' => 'success', 'products' => $products]);
    }

    // Lấy sản phẩm burger - cơm - mì ý
    public function listMainDishProducts() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getMainDishProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
        //return json_encode(['status' => 'success', 'products' => $products]);
    }

    // Lấy sản phẩm thức ăn nhẹ
    public function listSnackProducts() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getSnackProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
        //return json_encode(['status' => 'success', 'products' => $products]);
    }

    // Lấy sản phẩm thức uống tráng miệng
    public function listDrinkDessertProducts() {
        $productModel = new ModelsProductModel();
        $products = $productModel->getDrinkDessertProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
        //return json_encode(['status' => 'success', 'products' => $products]);
    }

    public function detail() {
        $id = $_GET['id'];
        $id = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $id);
        $productModel = new ModelsProductModel();
        $product = $productModel->getProductById($id);
        if ($product) {
            echo json_encode(['status' => 'success', 'product' => $product]);
            exit();
            //return json_encode(['status' => 'success', 'products' => $products]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Product not found!']);
            exit();
            //return json_encode(['status' => 'error', 'message' => 'Product not found!']);
        }
        exit();
    }

    public function viewDetail() {
        $id = $_GET['id'];
        $id = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $id);
        require __DIR__ . '/../Views/product/detail.php?id=' . $id;
    }
}
