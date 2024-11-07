<?php
namespace App\Controllers;



use App\Models\StoreModel;

class StoreController {
    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $location = trim($_POST['location']);
            $storeModel = new StoreModel();
            $stores = $storeModel->searchStores($location);
            echo json_encode(['status' => 'success', 'stores' => $stores]);
            exit();
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        exit();
    }

    public function detail($id) {
        $storeModel = new StoreModel();
        $store = $storeModel->getStoreById($id);
        if ($store) {
            echo json_encode(['status' => 'success', 'store' => $store]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Store not found!']);
        }
        exit();
    }
}
