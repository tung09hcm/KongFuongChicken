<?php
// CartController.php
namespace App\Controllers;

use App\Models\CartModel;

class CartController {
    private $model;

    public function __construct() {
        $this->model = new CartModel();
    }

    public function index($user_id) {
        $cart = $this->model->getCartByUserId($user_id);
    }

    public function add($data) {
        $this->model->addToCart($data['user_id'], $data['product_id'], $data['quantity']);
    }

    public function update($cart_id, $quantity) {
        $this->model->updateCart($cart_id, $quantity);
    }

    public function delete($cart_id) {
        $this->model->deleteFromCart($cart_id);
    }
}
?>
