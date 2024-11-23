<?php
namespace App\Controllers;



use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\ReviewModel;
use Models\AccountModel;
use Models\CartModel as ModelsCartModel;
use Models\DiscountModel;
use Models\OrderModel as ModelsOrderModel;
use Models\ProductModel as ModelsProductModel;
use Models\ReviewModel as ModelsReviewModel;
use Models\StoreModel;
use Models\UserModel as ModelsUserModel;

require_once  __DIR__ ."/../Models/OrderModel.php";
require_once  __DIR__ ."/../Models/CartModel.php";
require_once  __DIR__ ."/../Models/UserModel.php";
require_once  __DIR__ ."/../Models/AccountModel.php";
require_once  __DIR__ ."/../Models/ReviewModel.php";
require_once  __DIR__ ."/../Models/ProductModel.php";
require_once  __DIR__ ."/../Models/DiscountModel.php";
require_once  __DIR__ ."/../Models/StoreModel.php";
class UserController {
    public function dashboard() {
        $this->checkAuth('user');
        $orderModel = new ModelsOrderModel();
        $orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);
        echo json_encode(['status' => 'success', 'orders' => $orders]);
        exit();
    }

    public function updateProfile() {
        $this->checkAuth('user');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);
            $userModel = new ModelsUserModel();
            // $userModel->updateUserInfo($_SESSION['user_id'], $phone, $address);
            $user = $userModel->getAccountById($_SESSION['user_id']);
            echo json_encode(['status' => 'success', 'user' => $user]);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    public function changePassword() {
        $this->checkAuth('user');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $current_password = trim($_POST['current_password']);
            $new_password = password_hash(trim($_POST['new_password']), PASSWORD_BCRYPT);
            $accountModel = new AccountModel();
            $account = $accountModel->getAccountById($_SESSION['user_id']);
            if ($account && password_verify($current_password, $account['password'])) {
                $accountModel->updatePassword($_SESSION['user_id'], $new_password);
                echo json_encode(['status' => 'success', 'message' => 'Mật khẩu đã được đổi thành công.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Mật khẩu hiện tại không đúng.']);
            }
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    public function orderHistory() {
        $this->checkAuth('user');
        $orderModel = new ModelsOrderModel();
        $orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);
        echo json_encode(['status' => 'success', 'orders' => $orders]);
        exit();
    }

    public function reviews() {
        $this->checkAuth('user');
        $productModel = new ModelsProductModel();
        $reviewModel = new ModelsReviewModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = intval($_POST['product_id']);
            $content = trim($_POST['content']);
            $rating = intval($_POST['rating']);
            if ($rating >= 1 && $rating <= 5) {
                $reviewModel->createReview($product_id, $_SESSION['user_id'], $content, $rating);
                echo json_encode(['status' => 'success', 'message' => 'Đánh giá đã được gửi thành công.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Đánh giá phải từ 1 đến 5 sao.']);
            }
            exit();
        }
        $products = $productModel->getAllProducts();
        $product_reviews = [];
        foreach ($products as $product) {
            $product_reviews[$product['id']] = $reviewModel->getReviewsByProductId($product['id']);
        }
        echo json_encode(['status' => 'success', 'products' => $products, 'product_reviews' => $product_reviews]);
        exit();
    }

    public function addToCart() {
        $this->checkAuth('user');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = intval($_POST['product_id']);
            $quantity = intval($_POST['quantity']);
            $cartModel = new ModelsCartModel();
            $cart = $cartModel->getCartByUserId($_SESSION['user_id']);
            if (!$cart) {
                $cartModel->createCart($_SESSION['user_id']);
                $cart = $cartModel->getCartByUserId($_SESSION['user_id']);
            }
            $cartModel->addProductToCart($cart['id'], $product_id, $quantity);
            echo json_encode(['status' => 'success', 'message' => 'Đã thêm sản phẩm vào giỏ hàng.']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    public function viewCart() {
        $this->checkAuth('user');
        $cartModel = new ModelsCartModel();
        $cart = $cartModel->getCartByUserId($_SESSION['user_id']);
        $products = $cart ? $cartModel->getProductsInCart($cart['id']) : [];
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
    }

    public function checkout() {
        $this->checkAuth('user');
        $cartModel = new ModelsCartModel();
        $orderModel = new ModelsOrderModel();
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
