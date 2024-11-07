<?php
namespace App\Controllers;



use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\DiscountModel;
use App\Models\StoreModel;

class OrderController {
    public function history() {
        $this->checkAuth('user');
        $orderModel = new OrderModel();
        $orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);
        echo json_encode(['status' => 'success', 'orders' => $orders]);
        exit();
    }

    public function checkout() {
        $this->checkAuth('user');
        $cartModel = new CartModel();
        $orderModel = new OrderModel();
        $discountModel = new DiscountModel();
        $storeModel = new StoreModel();
        $cart = $cartModel->getCartByUserId($_SESSION['user_id']);
        if (!$cart) {
            echo json_encode(['status' => 'error', 'message' => 'Giỏ hàng trống.']);
            exit();
        }
        $products = $cartModel->getProductsInCart($cart['id']);
        $total = 0;
        foreach ($products as $product) {
            $total += $product['price'];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $store_id = intval($_POST['store_id']);
            $discount_code = trim($_POST['discount_code']);
            $delivery_address = trim($_POST['delivery_address']);
            $discount = $discountModel->getDiscountByCode($discount_code);
            if ($discount) {
                $total -= ($total * ($discount['percentage'] / 100));
                $discount_id = $discount['id'];
            } else {
                $discount_id = null;
            }
            $order_date = date('Y-m-d H:i:s');
            $orderModel->createOrder($_SESSION['user_id'], $store_id, $discount_id, $delivery_address, $order_date, $total);
            $cartModel->clearCart($cart['id']);
            echo json_encode(['status' => 'success', 'message' => 'Đặt hàng thành công.', 'redirect' => BASE_URL . 'order/history']);
            exit();
        }
        $stores = $storeModel->getAllStores();
        echo json_encode(['status' => 'success', 'stores' => $stores, 'total' => $total]);
        exit();
    }

    private function checkAuth($role) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== $role) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập để tiếp tục.', 'redirect' => BASE_URL . 'login']);
            exit();
        }
    }
}
