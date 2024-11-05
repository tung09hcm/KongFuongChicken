<?php
// OrderController.php
namespace App\Controllers;

use App\Models\OrderModel;

class OrderController {
    private $model;

    public function __construct() {
        $this->model = new OrderModel();
    }

    public function index() {
        $orders = $this->model->getAllOrders();
    }

    public function show($id) {
        $order = $this->model->getOrderById($id);
    }

    public function create($data) {
        $this->model->createOrder($data['order_date'], $data['total_amount'], $data['user_id']);
    }

    public function update($id, $data) {
        $this->model->updateOrder($id, $data['order_date'], $data['total_amount'], $data['user_id']);
    }

    public function delete($id) {
        $this->model->deleteOrder($id);
    }
}
?>
