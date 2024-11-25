<?php

use Models\AccountModel;
use Models\AdminModel;
use Models\AdminPermissionModel;
use Models\DiscountModel;
use Models\ProductModel;
use Models\PromotionModel;
use Models\ReviewModel;
use Models\StoreModel;
use Models\UserModel;
use Models\PostModel;

require_once  __DIR__ ."/../Models/PromotionModel.php";
require_once  __DIR__ ."/../Models/PostModel.php";
require_once  __DIR__ ."/../Models/DiscountModel.php";
require_once  __DIR__ ."/../Models/StoreModel.php";
require_once  __DIR__ ."/../Models/ReviewModel.php";
require_once  __DIR__ ."/../Models/ProductModel.php";
require_once  __DIR__ ."/../Models/UserModel.php";
require_once  __DIR__ ."/../Models/AdminModel.php";
require_once  __DIR__ ."/../Models/AdminPermissionModel.php";

class AdminController {
    // ok
    private function checkAuth($role, $permission = null) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== $role) {
            // TODO: có thể đặt header đến nơi muốn 
            // ví dụ header("Location: index.php?controller=home&action=index");
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập để tiếp tục.', 'redirect' => BASE_URL . 'login']);
            exit();
        }
        if ($permission) {
            $permissionModel = new AdminPermissionModel();
            $permissions = $permissionModel->getPermissions($_SESSION['user_id']);
            if (!$permissions[$permission]) {
                echo json_encode(['status' => 'error', 'message' => 'Bạn không có quyền truy cập chức năng này.']);
                exit();
            }
        }
    }
    // ok
    public function dashboard() {
        // xuất ra các quyền admin hiện tại
        $this->checkAuth('admin');
        $permissionModel = new AdminPermissionModel();
        $permissions = $permissionModel->getPermissions($_SESSION['user_id']);
        echo json_encode(['status' => 'success', 'permissions' => $permissions]);
        exit();
    }
    // ok
    public function manageUsers() {
        $this->checkAuth('admin', 'can_manage_user');
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        return $users;
    }
    // ok
    public function editUser($id) {
        $this->checkAuth('admin', 'can_manage_user');
        $accountModel = new AccountModel();
        $userModel = new UserModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $address = trim($_POST['address']);
            $phone = trim($_POST['phone']);
            $accountModel->updateInfo($id, $phone, $address);
            // $userModel->updateUserInfo($id, $phone, $address);
            echo json_encode(['status' => 'success', 'message' => 'Cập nhật người dùng thành công.']);
            exit();
        }
        
        exit();
    }
    // ok
    public function deleteUser($id) {
        $this->checkAuth('admin', 'can_manage_user');
        $accountModel = new AccountModel();
        $accountModel->deleteAccount($id);
        echo json_encode(['status' => 'success', 'message' => 'Xóa người dùng thành công.']);
        exit();
    }
    // ok
    public function manageReviews() {
        $this->checkAuth('admin', 'can_manage_review');
        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->getAllReviews();
        echo json_encode(['status' => 'success', 'reviews' => $reviews]);
        exit();
    }
    // ok
    public function handleReview($id) {
        $this->checkAuth('admin', 'can_manage_review');
        $reviewModel = new ReviewModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['reply'])) {
                $reply = trim($_POST['reply']);
                $reviewModel->replyToReview($id, $reply);
                echo json_encode(['status' => 'success', 'message' => 'Trả lời đánh giá thành công.']);
                exit();
            } elseif (isset($_POST['delete'])) {
                $reviewModel->deleteReview($id);
                echo json_encode(['status' => 'success', 'message' => 'Xóa đánh giá thành công.']);
                exit();
            }
        }
        $review = $reviewModel->getReviewById($id);
        echo json_encode(['status' => 'success', 'review' => $review]);
        exit();
    }

    public function addProductTestView(){
        require __DIR__ . '/../Testing/manageProduct.php';
    }
    // ok
    public function manageProducts() {
        $this->checkAuth('admin', 'can_manage_product');
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        echo json_encode(['status' => 'success', 'products' => $products]);
        exit();
    }
    // ok
    public function addProduct() {
        $this->checkAuth('admin', 'can_manage_product');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $price = floatval($_POST['price']);
            $description = trim($_POST['description']);
            $image_link = trim($_POST['image_link']);
            $productModel = new ProductModel();
            $productModel->createProduct($name, $price, $description, $image_link);
            echo json_encode(['status' => 'success', 'message' => 'Thêm sản phẩm thành công.']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }
    // ok
    public function editProduct($id) {
        $this->checkAuth('admin', 'can_manage_product');
        $productModel = new ProductModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $price = floatval($_POST['price']);
            $description = trim($_POST['description']);
            $imageLink = trim($_POST['image_link']);
            $productModel->updateProduct($id, $name, $price, $description, $imageLink);
            echo json_encode(['status' => 'success', 'message' => 'Cập nhật sản phẩm thành công.']);
            exit();
        }
        $product = $productModel->getProductById($id);
        echo json_encode(['status' => 'success', 'product' => $product]);
        exit();
    }
    // ok
    public function deleteProductByID($id) {
        $this->checkAuth('admin', 'can_manage_product');
        $productModel = new ProductModel();
        $productModel->deleteProduct($id);
        echo json_encode(['status' => 'success', 'message' => 'Xóa sản phẩm thành công.']);
        exit();
    }
    // ok
    public function deleteProduct() {
        $this->checkAuth('admin', 'can_manage_product');
        $id = intval($_POST['id']);
        $productModel = new ProductModel();
        $productModel->deleteProduct($id);
        echo json_encode(['status' => 'success', 'message' => 'Xóa sản phẩm thành công.']);
        exit();
    }
    // ok
    public function manageStores() {
        $this->checkAuth('admin', 'can_manage_store');
        $storeModel = new StoreModel();
        $stores = $storeModel->getAllStores();
        echo json_encode(['status' => 'success', 'stores' => $stores]);
        exit();
    }
    // ok
    public function addStore() {
        $this->checkAuth('admin', 'can_manage_store');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $phone = trim($_POST['phone']);
            $opening_hours = trim($_POST['opening_hours']);
            $services = trim($_POST['services']);
            $storeModel = new StoreModel();
            $storeModel->createStore($name, $address, $phone, $opening_hours, $services);
            echo json_encode(['status' => 'success', 'message' => 'Thêm cửa hàng thành công.']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }
    // ok
    public function editStore($id) {
        $this->checkAuth('admin', 'can_manage_store');
        $storeModel = new StoreModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $phone = trim($_POST['phone']);
            $opening_hours = trim($_POST['opening_hours']);
            $services = trim($_POST['services']);
            $storeModel->updateStore($id, $name, $address, $phone, $opening_hours, $services);
            echo json_encode(['status' => 'success', 'message' => 'Cập nhật cửa hàng thành công.']);
            exit();
        }
        $store = $storeModel->getStoreById($id);
        echo json_encode(['status' => 'success', 'store' => $store]);
        exit();
    }
    // ok
    public function deleteStore($id) {
        $this->checkAuth('admin', 'can_manage_store');
        $storeModel = new StoreModel();
        $storeModel->deleteStore($id);
        echo json_encode(['status' => 'success', 'message' => 'Xóa cửa hàng thành công.']);
        exit();
    }
    // ok
    public function manageDiscounts() {
        $this->checkAuth('admin', 'can_manage_discount');
        $discountModel = new DiscountModel ();
        $discounts = $discountModel->getAllDiscounts();
        echo json_encode(['status' => 'success', 'discounts' => $discounts]);
        exit();
    }
    // ok
    public function addDiscount() {
        $this->checkAuth('admin', 'can_manage_discount');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = trim($_POST['code']);
            $percentage = floatval($_POST['percentage']);
            $expiry_date = trim($_POST['expiry_date']);
            $discountModel = new DiscountModel();
            $discountModel->createDiscount($code, $percentage, $expiry_date);
            echo json_encode(['status' => 'success', 'message' => 'Thêm mã giảm giá thành công.']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }
    // ok
    public function editDiscount($id) {
        $this->checkAuth('admin', 'can_manage_discount');
        $discountModel = new DiscountModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = trim($_POST['code']);
            $percentage = floatval($_POST['percentage']);
            $expiry_date = trim($_POST['expiry_date']);
            $discountModel->updateDiscount($id, $code, $percentage, $expiry_date);
            echo json_encode(['status' => 'success', 'message' => 'Cập nhật mã giảm giá thành công.']);
            exit();
        }
        $discount = $discountModel->getDiscountByCode($id);
        echo json_encode(['status' => 'success', 'discount' => $discount]);
        exit();
    }
    // ok
    public function deleteDiscount($id) {
        $this->checkAuth('admin', 'can_manage_discount');
        $discountModel = new DiscountModel();
        $discountModel->deleteDiscount($id);
        echo json_encode(['status' => 'success', 'message' => 'Xóa mã giảm giá thành công.']);
        exit();
    }
    // ok
    public function managePromotions() {
        $this->checkAuth('admin', 'can_manage_promotion');
        $promotionModel = new PromotionModel();
        $promotions = $promotionModel->getAllPromotions();
        echo json_encode(['status' => 'success', 'promotions' => $promotions]);
        exit();
    }
    // ok
    public function addPromotion() {
        $this->checkAuth('admin', 'can_manage_promotion');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $details = trim($_POST['details']);
            $start_date = trim($_POST['start_date']);
            $end_date = trim($_POST['end_date']);
            $promotionModel = new PromotionModel();
            $promotionModel->createPromotion($name, $details, $start_date, $end_date);
            echo json_encode(['status' => 'success', 'message' => 'Thêm chương trình khuyến mãi thành công.']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }
    // ok
    public function editPromotion($id) {
        $this->checkAuth('admin', 'can_manage_promotion');
        $promotionModel = new PromotionModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $details = trim($_POST['details']);
            $start_date = trim($_POST['start_date']);
            $end_date = trim($_POST['end_date']);
            $promotionModel->updatePromotion($id, $name, $details, $start_date, $end_date);
            echo json_encode(['status' => 'success', 'message' => 'Cập nhật chương trình khuyến mãi thành công.']);
            exit();
        }
        $promotion = $promotionModel->getPromotionById($id);
        echo json_encode(['status' => 'success', 'promotion' => $promotion]);
        exit();
    }
    // ok
    public function deletePromotion($id) {
        $this->checkAuth('admin', 'can_manage_promotion');
        $promotionModel = new PromotionModel();
        $promotionModel->deletePromotion($id);
        echo json_encode(['status' => 'success', 'message' => 'Xóa chương trình khuyến mãi thành công.']);
        exit();
    }
    public function managePost() {
        $this->checkAuth('admin', 'can_manage_post');
        $postModel = new PostModel();
        $posts = $postModel->getAllPosts();
        echo json_encode(['status' => 'success', 'posts' => $posts]);
        exit();
    }
    // ok
    public function addPost() {
        $this->checkAuth('admin', 'can_manage_post');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $postModel = new PostModel();
            $postModel->createPost($_SESSION['user_id'], $title, $content);
            echo json_encode(['status' => 'success', 'message' => 'Thêm chương trình khuyến mãi thành công.']);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }
    // ok
    public function editPost($id) {
        $this->checkAuth('admin', 'can_manage_post');
        $postModel = new PostModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $postModel->updatePost($id, $title, $content);
            echo json_encode(['status' => 'success', 'message' => 'Cập nhật chương trình khuyến mãi thành công.']);
            exit();
        }
        $promotion = $postModel->getPostById($id);
        echo json_encode(['status' => 'success', 'promotion' => $promotion]);
        exit();
    }
    // ok
    public function deletePost($id) {
        $this->checkAuth('admin', 'can_manage_post');
        $postModel = new PostModel();
        $postModel->deletePost($id);
        echo json_encode(['status' => 'success', 'message' => 'Xóa chương trình khuyến mãi thành công.']);
        exit();
    }
    public function addAdmin()
    {   
        $this->checkAuth('admin', 'can_add_admin');
        $firstname = trim($_POST['firstName']);
        $lastname = trim($_POST['lastName']);
        $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $accountModel = new AccountModel();
        $adminModel = new AdminModel();
        if ($accountModel->getAccountByEmail($email)) {
            echo json_encode(['status' => 'error', 'message' => 'Email đã được sử dụng.']);
            exit();
        }
        $account_id = $accountModel->createAccount($firstname, $lastname, $password, $email, $phone);
        $adminModel->createAdmin($account_id);
    }
    public function deleteAdmin($id){
        $this->checkAuth('admin', 'can_delete_admin');
        $adminModel = new AdminModel();
        $adminModel->deleteAdmin($id);
    }
}
