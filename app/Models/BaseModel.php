<?php
namespace App\Models;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class BaseModel {
    protected $db;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $charset = $_ENV['DB_CHARSET'];
        $timeout = 10;

        $conn = "mysql:";
        $conn .= "host=" . $host;
        $conn .= ";port=" . $port;
        $conn .= ";dbname=". $dbname;
        $conn .= ";sslmode=verify-ca;sslrootcert=" . __DIR__ . "/../../ca.pem";
        $conn .= ";charset=" . $charset;

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT            => $timeout,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->db = new PDO($conn, $user, $password, $options);            
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>
