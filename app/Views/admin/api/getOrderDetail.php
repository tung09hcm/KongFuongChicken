<?php
    // Tắt hiển thị lỗi PHP để tránh trả về HTML
    ini_set('display_errors', 0);
    error_reporting(E_ALL);

    // Kết nối cơ sở dữ liệu
    include  __DIR__ . '/../../../../config/config.php';

    // Kết nối cơ sở dữ liệu
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    $conn = new mysqli($host, $username, $password, $dbname, $port);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        echo json_encode(['error' => 'Kết nối thất bại: ' . $conn->connect_error]);
        exit;
    }

    // Lấy order_id từ query string
    $order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($order_id <= 0) {
        echo json_encode(['error' => 'Mã đơn hàng không hợp lệ']);
        $conn->close();
        exit;
    }

    // Truy vấn chi tiết đơn hàng
    $sql = "
        SELECT o.id AS order_id, 
            CONCAT(a.first_name, ' ', a.last_name) AS customer_name,
            ua.address AS customer_address,
            o.total,
            o.order_date,
            p.id AS order_detail_id,
            od.quantity, 
            p.name AS product_name, 
            (p.price * od.quantity) AS item_total,
            d.percentage,
            d.code,
            o.status
        FROM `ORDER` o
        LEFT JOIN `ACCOUNT` a ON o.user_id = a.id
        LEFT JOIN `USER_ADDRESS` ua ON o.address = ua.id
        LEFT JOIN `ORDER_PRODUCT` od ON o.id = od.order_id
        LEFT JOIN `PRODUCT` p ON od.product_id = p.id
        LEFT JOIN `DISCOUNT` d ON o.discount_id = d.id
        WHERE o.id = $order_id
    ";

    $result = $conn->query($sql);

    if (!$result) {
        echo json_encode(['error' => 'Lỗi truy vấn: ' . $conn->error]);
        $conn->close();
        exit;
    }

    $details = array(); // Khởi tạo mảng details chỉ một lần

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $details = array(
                'order_id' => $row['order_id'],
                'customer_name' => $row['customer_name'],
                'customer_address' => $row['customer_address'],
                'total' => $row['total'],
                'order_date' => $row['order_date'],
                'discount_code' => $row['code'],
                'discount_percentage' => $row['percentage'],
                'status' => $row['status'],
                'items' => array() // Mảng chứa các sản phẩm
            );

            $details['items'][] = array(
                'quantity' => $row['quantity'],
                'product_name' => $row['product_name'],
                'item_total' => $row['item_total']
            );
        }
    }

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($details, JSON_UNESCAPED_UNICODE);

    $conn->close();
?>
