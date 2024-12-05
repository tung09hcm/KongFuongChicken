<?php

use App\Models\StoreModel;
use Models\StoreModel as ModelsStoreModel;

require_once  __DIR__ ."/../Models/StoreModel.php";

class StoreController {
    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $location = trim($_POST['location']);
            $location = preg_replace('/["\']/', '', $location);
            $storeModel = new ModelsStoreModel();
            $stores = $storeModel->searchStores($location);
            echo json_encode(['status' => 'success', 'stores' => $stores]);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    public function detail($id) {
        $storeModel = new ModelsStoreModel();
        $store = $storeModel->getStoreById($id);
        if ($store) {
            echo json_encode(['status' => 'success', 'store' => $store]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Store not found!']);
        }
        exit();
    }

    public function getAllStores() {
        $storeModel = new ModelsStoreModel();
        $stores = $storeModel->getAllStores();
        if ($stores) {
            echo json_encode(['status' => 'success', 'stores' => $stores]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Store not found!']);
        }
        exit();
    }
}
