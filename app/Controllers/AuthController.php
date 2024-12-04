<?php

use Models\AccountModel;
use Models\AdminModel;
use Models\UserModel;
use Models\CartModel;

require_once  __DIR__ ."/../Models/AccountModel.php";
require_once  __DIR__ ."/../Models/UserModel.php";
require_once  __DIR__ ."/../Models/AdminModel.php";
require_once  __DIR__ ."/../Models/CartModel.php";


class AuthController {

    // TESTING
    public function logOutView()
    {
        require __DIR__ . '/../Testing/logout.php';
    }

    public function index() {
        require __DIR__ . '/../Views/auth/login.php';
    }
    public function registerView() {
        require __DIR__ . '/../Views/auth/register.php';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST)) {
                $_POST = json_decode(file_get_contents("php://input"), true);
            }
            $email = trim($_POST['email']);
            $email = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $email);
            $password = trim($_POST['password']);
            $password = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $password);
            
            $accountModel = new AccountModel();
            $account = $accountModel->getAccountByEmail($email);
            if ($account) {
                // if (password_verify($password, $account['password'])) 
                if (($password == $account['password'])) 
                {
                    
                    // phân ra xem là admin hay user thông thường
                    // TODO
                    
                    $isAdmin = $account['is_admin'];
                    echo  "account_id: ".$account['id'];
                    echo "<br>";
                    echo   $account['email'];
                    if ($isAdmin) {
                        $_SESSION['role'] = 'admin';
                    } else {
                        $_SESSION['role'] = 'user';     
                    }
                    $_SESSION['user_id'] = $account['id'];
                    $cookieLifetime = time() + (10 * 365 * 24 * 60 * 60);
                    setcookie("id", $account['id'], $cookieLifetime, "/");

                    echo json_encode(['status' => 'success', 'message' => 'Login successful.', 'role' => $_SESSION['role']]);
                    if($_SESSION['role'] == "admin")
                    {
                        echo "giao diện admin". "<br>";
                        
                        header("Location: index.php?controller=admin&action=Menu");
                    }
                    else{
                        // TODO nối đến giao diện người dùng
                        header("Location: index.php?controller=user&action=Menu");

                    }
                    exit();
                    // TODO: có thể đặt header đến nơi muốn 
                    // ví dụ header("Location: index.php?controller=home&action=index");
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Invalid password.']);
                    header("Location: index.php");
                    exit();
                    // TODO: có thể đặt header đến nơi muốn 
                    // ví dụ header("Location: index.php?controller=home&action=index");
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Account not found.']);
                exit();
                // TODO: có thể đặt header đến nơi muốn 
                // ví dụ header("Location: index.php?controller=home&action=index");
            }
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method :vvv.']);
        exit();
        // TODO: có thể đặt header đến nơi muốn 
        // ví dụ header("Location: index.php?controller=home&action=index");
    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST)) {
                $_POST = json_decode(file_get_contents("php://input"), true);
            }
            $firstname = trim($_POST['firstName']);
            $firstname = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $firstname);
            $lastname = trim($_POST['lastName']);
            $lastname = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $lastname);
            // $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
            $password = trim($_POST['password']);
            $password = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $password);
            $role = 'user';
            $email = trim($_POST['email']);
            $email = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $email);
            $phone = trim($_POST['phone']);
            $phone = preg_replace('/[^a-zA-Z0-9!@#$%^&*()_+=\-]/', '', $phone);
            $accountModel = new AccountModel();
            $userModel = new UserModel();
            if ($accountModel->getAccountByEmail($email)) {
                echo json_encode(['status' => 'error', 'message' => 'Email đã được sử dụng.']);
                exit();
            }
            $account_id = $accountModel->createAccount($firstname, $lastname, $password, $email, $phone);
            $userModel->createUser($account_id);
            // Route đến trang chủ của user
            header("Location: index.php?controller=Auth&action=index");
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
            
    }
    
    public function logout() {
        echo "xóa session và cookie" ."<br>";
        session_unset();
        session_destroy();
        setcookie('id', '', time() - 3600, '/');
        // Trỏ đến header tùy thích sau khi đăng xuất
        echo "cookie_id: ". $_COOKIE['id'];
        header("Location: index.php?controller=auth&action=index");
        exit();
    }

}
?>