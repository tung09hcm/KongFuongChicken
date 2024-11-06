<?php
// AdminController.php
namespace App\Controllers;

use App\Models\AdminModel;

class AdminController {
    private $model;

    public function __construct() {
        $this->model = new AdminModel();
    }

    public function index() {
        $admins = $this->model->getAllAdmins();
        return $admins;
    }

    public function show($id) {
        $admin = $this->model->getAdminById($id);
    }

    public function create($data) {
        $this->model->createAdmin($data['name'], $data['email'], $data['password']);
    }

    public function update($id, $data) {
        $this->model->updateAdmin($id, $data['name'], $data['email'], $data['password']);
    }

    public function delete($id) {
        $this->model->deleteAdmin($id);
    }
}
?>
