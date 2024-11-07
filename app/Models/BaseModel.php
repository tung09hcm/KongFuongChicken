<?php
namespace App\Models;

use PDO;
use PDOException;

class BaseModel {
    protected $db;

    public function __construct() {
        require_once __DIR__ . '/../../config/config.php';

        $host = DB_HOST;
        $port = DB_PORT;
        $dbname = DB_NAME;
        $user = DB_USER;
        $password = DB_PASSWORD;
        $charset = DB_CHARSET;
        $timeout = 10;

        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT            => $timeout,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->db = new PDO($dsn, $user, $password, $options);            
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
