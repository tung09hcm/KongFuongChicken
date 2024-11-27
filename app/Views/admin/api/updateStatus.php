<?php
// updateStatus.php

    include  __DIR__ . '/../../../../config/config.php';

    // Kết nối cơ sở dữ liệu
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if both status and orderId are set
        if (isset($_POST['status']) && isset($_POST['orderId'])) {
            $status = htmlspecialchars($_POST['status']); // Sanitize status
            $orderId = intval($_POST['orderId']); // Sanitize orderId

            // Update the database
            $sql = "UPDATE `ORDER` SET `status` = :status WHERE `id` = :orderId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['status' => $status, 'orderId' => $orderId]);

            echo "Status updated successfully";
        } else {
            echo "Missing status or orderId";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
