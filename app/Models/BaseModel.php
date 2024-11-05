<?php
// BaseModel.php
namespace App\Models;

use PDO;

class BaseModel {
    protected $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=kongfuongchicken', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>
