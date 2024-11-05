<?php
// ProductController.php
namespace App\Controllers;

use App\Models\ProductModel;

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    public function index() {
        $products = $this->model->getAllProducts();
    }

    public function show($id) {
        $product = $this->model->getProductById($id);
    }

    public function create($data) {
        $this->model->createProduct($data['product_name'], $data['price'], $data['stock_quantity']);
    }

    public function update($id, $data) {
        $this->model->updateProduct($id, $data['product_name'], $data['price'], $data['stock_quantity']);
    }

    public function delete($id) {
        $this->model->deleteProduct($id);
    }
}
?>
