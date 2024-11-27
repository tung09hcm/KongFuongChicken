<?php
    // Kết nối cơ sở dữ liệu
    include  __DIR__ . '/../../../../config/config.php';

    // Kết nối cơ sở dữ liệu
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    $conn = new mysqli($host, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        die(json_encode(["error" => "Kết nối thất bại"]));
    }

    // Truy vấn dữ liệu
    $sql = "SELECT id, name, price, description, image_link FROM PRODUCT";
    $result = $conn->query($sql);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    // Trả dữ liệu JSON
    header('Content-Type: application/json');
    echo json_encode($products);

    $conn->close();
?>
