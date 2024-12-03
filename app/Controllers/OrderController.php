<?php



use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\DiscountModel;
use App\Models\StoreModel;
use Models\CartModel as ModelsCartModel;
use Models\DiscountModel as ModelsDiscountModel;
use Models\OrderModel as ModelsOrderModel;
use Models\StoreModel as ModelsStoreModel;
use Models\UserModel;
require_once  __DIR__ ."/../Models/UserModel.php";
require_once  __DIR__ ."/../Models/OrderModel.php";
require_once  __DIR__ ."/../Models/CartModel.php";
require_once  __DIR__ ."/../Models/DiscountModel.php";
require_once  __DIR__ ."/../Models/StoreModel.php";
require_once  __DIR__ ."/../Models/AccountModel.php";
class OrderController {
    public function history() {
        $this->checkAuth('user');
        $orderModel = new ModelsOrderModel();
        $orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);
        echo json_encode(['status' => 'success', 'orders' => $orders]);
        exit();
    }

    public function getProductInOrder() {
        $this->checkAuth('user');
        $order_id = $_GET['orderId'];
        $orderModel = new ModelsOrderModel();
        $orders = $orderModel->getProductInOrder($order_id);
        echo json_encode(['status' => 'success', 'orders' => $orders]);
        exit();
    }

    public function checkout() {
        $this->checkAuth('user');
        $cartModel = new ModelsCartModel();
        $orderModel = new ModelsOrderModel();
        $discountModel = new ModelsDiscountModel();
        $storeModel = new ModelsStoreModel();
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
            $userModel = new UserModel();
            $new_address_id = $userModel->addAddress($_SESSION['user_id'],$delivery_address);
            $order_date = date('Y-m-d H:i:s');
            $orderModel->createOrder($_SESSION['user_id'], $store_id, $discount_id, $new_address_id, $order_date, $total);
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
