<?php

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
use Models\PostModel;
use Models\UserModel as ModelsUserModel;

require_once  __DIR__ ."/../Models/OrderModel.php";
require_once  __DIR__ ."/../Models/CartModel.php";
require_once  __DIR__ ."/../Models/UserModel.php";
require_once  __DIR__ ."/../Models/AccountModel.php";
require_once  __DIR__ ."/../Models/ReviewModel.php";
require_once  __DIR__ ."/../Models/ProductModel.php";
require_once  __DIR__ ."/../Models/DiscountModel.php";
require_once  __DIR__ ."/../Models/StoreModel.php";
require_once  __DIR__ ."/../Models/PostModel.php";

class UserController {

    public function Menu()
    {
        require __DIR__ . '/../Views/homepage/index.php';
    }

    public function Product() {
        $section = $_GET['section'] ?? 'all';
        require __DIR__ . '/../Views/product/index.php';
    }

    public function hotDeal() {
        $section = $_GET['section'] ?? 'all';
        require __DIR__ . '/../Views/product/hotdeal.php';
    }

    public function bookParty() {
        $section = $_GET['section'] ?? 'all';
        require __DIR__ . '/../Views/bookparty/index.php';
    }

    public function ProductDetail() {
        $id = $_GET['id'] ?? 0;
        require __DIR__ . '/../Views/product/detail.php';
    }

    public function Cart() {
        if (!isset($_SESSION['user_id'])) {
            require __DIR__ . '/../Views/auth/login.php';
            exit();
        }
        require __DIR__ . '/../Views/cart/cart.php';
    }

    public function Profile() {
        if (!isset($_SESSION['user_id'])) {
            require __DIR__ . '/../Views/auth/login.php';
            exit();
        }
        require __DIR__ . '/../Views/user/edit-profile.php';
    }

    public function previousOrders() {
        require __DIR__ . '/../Views/user/previous-orders.php';
    }

    public function Addresses() {
        require __DIR__ . '/../Views/user/addresses.php';
    }

    public function resetPassword() {
        require __DIR__ . '/../Views/user/reset-password.php';
    }

    public function delete() {
        require __DIR__ . '/../Views/user/delete.php';
    }

    public function Post() {
        require __DIR__ . '/../Views/post/index.php';
    }

    public function PostDetail() {
        require __DIR__ . '/../Views/post/post-detail.php';
    }



    public function dashboard() {
        $this->checkAuth('user');
        $orderModel = new ModelsOrderModel();
        $orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);
        echo json_encode(['status' => 'success', 'orders' => $orders]);
        exit();
    }

    public function getProfile() {
        $this->checkAuth('user');
        $userModel = new ModelsUserModel();
        $user = $userModel->getAccountById($_SESSION['user_id']);
        echo json_encode(['status' => 'success', 'user' => $user]);
        exit();
    }

    public function updateProfile() {
        $this->checkAuth('user');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);
            $userModel = new ModelsUserModel();
            $userModel->updateInfo($_SESSION['user_id'], $phone, $address);
            $user = $userModel->getAccountById($_SESSION['user_id']);
            echo json_encode(['status' => 'success', 'user' => $user]);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    public function editAccount() {
        $this->checkAuth('user');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = trim($_POST['first_name']);
            $last_name = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $accountModel = new AccountModel();
            $accountModel->editAccount($_SESSION['user_id'], $first_name, $last_name, $email, $phone);
            echo json_encode(['status' => 'success', 'message' => 'Thông tin đã được cập nhật.']);
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
        // echo 'user_id: '.$_SESSION['user_id'];
        // echo '<br>';
        // echo 'cart_id: '.$cart['id'];
        $products = $cartModel->getProductsInCart($cart['id']);
        // echo '<pre>';
        // foreach ($products as $product) {
        //     echo 'Cart ID: ' . $product['cart_id'] . ', Quantity: ' . $product['quantity'] . "\n";
        // }
        // echo '</pre>';
        $total = 0;
        foreach ($products as $product) {
            $total += $product['price'];
        }
        // echo 'price: '.$total;
        // echo '<br>';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $store_id = intval($_POST['store_id']);
            $discount_code = trim($_POST['discount_code']);
            $delivery_address = trim($_POST['delivery_address']);
            // echo 'store_id: '.$store_id .'<br>';
            // echo 'discount_code: '.$discount_code .'<br>';
            // echo 'delivery_address: '.$delivery_address .'<br>';
            if(isset($discount_code))
            {
                $discount = $discountModel->getDiscountByCode($discount_code);
                if ($discount) {
                    $total -= ($total * ($discount['percentage'] / 100));
                    $discount_id = $discount['id'];
                } else {
                    $discount_id = null;
                }
            }
            else {
                $discount_id = null;
            }
            // echo 'discount id is null'.'<br>';
            $order_date = date('Y-m-d H:i:s');
            $order_id = $orderModel->createOrder($_SESSION['user_id'], $store_id, $discount_id, $delivery_address, $order_date, $total);
            // echo 'order_id: '.$order_id.'<br>';
            foreach ($products as $product) {
                $orderModel->addProductToOrder($order_id,$product['id'],$product['quantity']);
            }
            
            $cartModel->clearCart($cart['id']);
            // echo ' đặt hàng thành công';
            echo json_encode(['status' => 'success', 'message' => 'Đặt hàng thành công.', 'redirect' => BASE_URL . 'order/history']);
            exit();
        }

        $stores = $storeModel->getAllStores();
        // echo json_encode(['status' => 'success', 'stores' => $stores, 'total' => $total]);
        exit();
    }

    private function checkAuth($role) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== $role) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập để tiếp tục.', 'redirect' => BASE_URL . 'login']);
            exit();
        }
    }

    public function getQuantity() {
        $this->checkAuth('user');
        $cartModel = new ModelsCartModel();
        $quantity = $cartModel->getQuantity($_SESSION['user_id']);

        echo json_encode(['status' => 'success', 'quantity' => $quantity]);
        exit();
    }

    public function getDiscountByCode() {
        $code = $_GET['code'];

        $discountModel = new DiscountModel();
        $discount = $discountModel->getDiscountByCode($code);
        if ($discount) {
            echo json_encode(['status' => 'success', 'discount' => $discount]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Promotion not found!']);
        }
        exit();
    }

    public function getAddresses() {
        $id = $_SESSION['user_id'];
        $userModel = new ModelsUserModel();
        $addresses = $userModel->getAddresses($id);

        echo json_encode(['status' => 'success', 'addresses' => $addresses]);
        exit();
    }

    public function addAddress() {
        $this->checkAuth('user');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            $address = trim($_POST['address']);
            $userModel = new ModelsUserModel();
            $userModel->addAddress($user_id, $address);
            echo json_encode(['status' => 'success', 'message' => 'Địa chỉ đã được thêm.']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    public function deleteAddress() {
        $this->checkAuth('user');
        
        $user_id = $_SESSION['user_id'];
        $address = trim($_POST['address']);
        $userModel = new ModelsUserModel();
        $userModel->deleteAddress($user_id, $address);
        echo json_encode(['status' => 'success', 'message' => 'Địa chỉ đã được xóa.']);
        exit();
    }

    public function editAddress() {
        $this->checkAuth('user');
        
        $address_id = trim($_POST['address_id']);
        $address = trim($_POST['address']);
        $userModel = new ModelsUserModel();
        $userModel->editAddress($address, $address_id);
        echo json_encode(['status' => 'success', 'message' => 'Địa chỉ đã được chỉnh sửa.']);
        exit();
    }

    public function getAllOrdersForUser() {
        $this->checkAuth('user');

        $orderModel = new ModelsOrderModel();
        $orders = $orderModel->getAllOrdersForUser();
        echo json_encode(['status' => 'success', 'orders' => $orders]);
        exit();
    }

    public function deleteAccount() {
        $this->checkAuth('user');
        $id = $_SESSION['user_id'];

        $accountModel = new AccountModel();
        $accountModel->deleteAccount($id);
        echo json_encode(['status' => 'success', 'mess' => 'Tài khoảng được xóa thành công.']);
        exit();
    }

    public function getAllPost() {
        $postModel = new PostModel();
        $posts = $postModel->getAllPosts();
        echo json_encode(['status' => 'success', 'posts' => $posts]);
        exit();
    }

    public function getPostById() {
        $id = $_GET['idPost'];
        $postModel = new PostModel();
        $post = $postModel->getPostById($id);
        echo json_encode(['status' => 'success', 'post' => $post]);
        exit();
    }
}
