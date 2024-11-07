<?php
namespace App\Controllers;



use App\Models\CartModel;
use App\Models\ProductModel;

class CartController {
    public function view() {
        $this->checkAuth('user');
        $cartModel = new CartModel();
        $cart = $cartModel->getCartByUserId($_SESSION['user_id']);
        $products = $cart ? $cartModel->getProductsInCart($cart['id']) : [];
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
    }

    public function add() {
        $this->checkAuth('user');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = intval($_POST['product_id']);
            $cartModel = new CartModel();
            $cart = $cartModel->getCartByUserId($_SESSION['user_id']);
            if (!$cart) {
                $cartModel->createCart($_SESSION['user_id']);
                $cart = $cartModel->getCartByUserId($_SESSION['user_id']);
            }
            $cartModel->addProductToCart($cart['id'], $product_id);
            echo json_encode(['status' => 'success', 'message' => 'Đã thêm sản phẩm vào giỏ hàng.']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    public function remove($product_id) {
        $this->checkAuth('user');
        $cartModel = new CartModel();
        $cart = $cartModel->getCartByUserId($_SESSION['user_id']);
        if ($cart) {
            $cartModel->removeProductFromCart($cart['id'], $product_id);
            echo json_encode(['status' => 'success', 'message' => 'Đã loại bỏ sản phẩm khỏi giỏ hàng.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Giỏ hàng không tồn tại.']);
        }
        exit();
    }

    private function checkAuth($role) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== $role) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập để tiếp tục.', 'redirect' => BASE_URL . 'login']);
            exit();
        }
    }
}
