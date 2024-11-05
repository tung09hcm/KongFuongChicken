<?php
// UserController.php
namespace App\Controllers;

use App\Models\UserModel;

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function index() {
        $users = $this->model->getAllUsers();
    }

    public function show($id) {
        $user = $this->model->getUserById($id);
    }

    public function create($data) {
        $this->model->createUser($data['name'], $data['email'], $data['password']);
    }

    public function update($id, $data) {
        $this->model->updateUser($id, $data['name'], $data['email'], $data['password']);
    }

    public function delete($id) {
        $this->model->deleteUser($id);
    }
}
?>
