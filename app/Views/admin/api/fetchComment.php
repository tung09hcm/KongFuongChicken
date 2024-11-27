<?php
    // Thiết lập kết nối cơ sở dữ liệu
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
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn tất cả các sản phẩm và bình luận
    $sql = "
        SELECT 
            p.id AS product_id, 
            p.name AS product_name, 
            p.image_link AS product_image, 
            p.price AS product_price, 
            p.description AS product_description, 
            
            c.id AS comment_id, 
            c.content AS comment_content, 
            c.rating AS comment_rating, 
            
            u.first_name AS user_first_name, 
            u.last_name AS user_last_name, 
            
            r.id AS reply_id, 
            r.reply_content AS reply_content, 
            r.reply_date AS reply_date, 
            a.first_name AS admin_first_name, 
            a.last_name AS admin_last_name 
            
        FROM PRODUCT p 
            LEFT JOIN REVIEW c ON p.id = c.product_id 
            LEFT JOIN ACCOUNT u ON c.user_id = u.id 
            LEFT JOIN REVIEW_REPLY r ON c.id = r.review_id 
            LEFT JOIN ACCOUNT a ON r.admin_id = a.id 
        ORDER BY p.id, c.id;
    ";

    $result = $conn->query($sql);

    // Mảng chứa các sản phẩm và bình luận
    $products = array();

    // Kiểm tra và lấy kết quả
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Thêm thông tin sản phẩm
            if (!isset($products[$row['product_id']])) {
                $products[$row['product_id']] = array(
                    'product_id' => $row['product_id'],
                    'product_name' => $row['product_name'],
                    'product_image' => $row['product_image'],
                    'product_price' => $row['product_price'],
                    'product_description' => $row['product_description'],
                    'comments' => array()
                );
            }

            // Thêm bình luận cho sản phẩm
            if ($row['comment_id'] != null) {
                if (!isset($products[$row['product_id']]['comments'][$row['comment_id']])) {
                    $products[$row['product_id']]['comments'][$row['comment_id']] = array(
                        'comment_id' => $row['comment_id'],
                        'content' => $row['comment_content'],
                        'rating' => $row['comment_rating'],
                        'user_first_name' => $row['user_first_name'],
                        'user_last_name' => $row['user_last_name'],
                        'replies' => array() // Danh sách câu trả lời của admin
                    );
                }

                // Thêm câu trả lời của admin
                if ($row['reply_id'] != null) {
                    $products[$row['product_id']]['comments'][$row['comment_id']]['replies'][] = array(
                        'reply_id' => $row['reply_id'],
                        'reply_content' => $row['reply_content'],
                        'reply_date' => $row['reply_date'],
                        'admin_first_name' => $row['admin_first_name'],
                        'admin_last_name' => $row['admin_last_name']
                    );
                }
            }
        }
    }

    // Trả dữ liệu dưới dạng JSON
    echo json_encode(array_values($products));

    // Đóng kết nối
    $conn->close();
?>
