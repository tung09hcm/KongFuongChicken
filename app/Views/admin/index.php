<!-- admin_id: 9, // ID của admin đang đăng nhập, bạn có thể lấy từ session hoặc biến toàn cục
    Này lúc làm đăng nhập coi lại nè -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>KFC ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="stylesheet" href="app/Views/admin/css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include 'app/Views/admin/navBar.php';
    ?>

    <div class="big-container">
        <h1>Chào mừng quay trở lại!</h1>

        <!-- /*chart*/ -->
        <div class="contain1">
            <div class="chart">
                <div id="month">
                    <h2>Thu nhập hàng tháng</h2>
                    <select>
                        <option value="1">Tháng 1</option>
                        <option value="2">Tháng 2</option>
                        <option value="3">Tháng 3</option>
                        <option value="4">Tháng 4</option>
                        <option value="5">Tháng 5</option>
                        <option value="6">Tháng 6</option>
                        <option value="7">Tháng 7</option>
                        <option value="8">Tháng 8</option>
                        <option value="9">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                    </select>
                </div>
    
                <div class="bar">
                    <div class="bar-label">Tuần 1</div>
                    <div class="bar-value" style="width: 50%;">50%</div>
                </div>
                <div class="bar">
                    <div class="bar-label">Tuần 2</div>
                    <div class="bar-value" style="width: 10%;">10%</div>
                </div>
                <div class="bar">
                    <div class="bar-label">Tuần 3</div>
                    <div class="bar-value" style="width: 20%;">20%</div>
                </div>
                <div class="bar">
                    <div class="bar-label">Tuần 4</div>
                    <div class="bar-value" style="width: 20%;">20%</div>
                </div>
            </div>
            <div class="item" onclick="window.location.href='dish.php'">
                <img src="https://static.kfcvietnam.com.vn/images/items/lg/burger-copy.jpg?v=4lY0lg" alt="">
                <h4>Combo 1 người</h4>
                <div class="info">
                    <p class="price-product">78.000đ</p>
                    <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                    <h5>Orders <span>15</span></h5>
                </div>
            </div>
        </div>

        <!-- /*menu*/ DONE -->
        <div class="contain2">
            <div class="link">
                <h2>Menu</h2>
                <a id="menus" href="menus.php">Xem thêm</a>
            </div>
            <div id="card-items"></div>
        </div>

        <!-- /*order*/ DONE-->
        <div class="contain2">
            <div class="link">
                <h2>Đơn hàng gần đây</h2>
                <a id="orders" href="orders.php">Xem thêm</a>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Tình trạng</th>
                            <th>Giá tiền</th>
                        </tr>
                    </thead>
    
                    <tbody id="order-list"></tbody>
                </table>
            </div>
        </div>

        <!-- /*popup*/ DONE-->
        <div class="overlay" id="overlay"></div>

        <div class="popup" id="popup"></div>

        <!-- /*comment*/ DONE -->
        <div class="contain2">
            <div class="link">
                <h2>Bình luận gần đây</h2>
                <a id="comments" href="comments.php">Xem thêm</a>
            </div>
            <div class="comments"></div>
        </div>        

        <!-- /*news - mấy trang thông tin đồ đó*/ DONE-->
        <div class="contain2">
            <div class="link">
                <h2>Các bài viết gần đây</h2>
                <a id="news" href="news.php">Xem thêm</a>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Mã bài viết</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Ngày đăng</th>
                        </tr>
                    </thead>
    
                    <tbody id="post-list">
                    </tbody>
                </table>
            </div>
        </div>

        <?php
            ob_start();

            // Kết nối cơ sở dữ liệu
            include __DIR__ . '/../../../config/config.php';
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            $discount_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

            $discount = [
                'code' => '',
                'percentage' => '',
                'expiry_date' => ''
            ];

            // Xử lý khi form được submit
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $code = $_POST['code'] ?? '';
                $percentage = $_POST['percentage'] ?? 0;
                $expiry_date = $_POST['expiry_date'] ?? '';

                // Kiểm tra dữ liệu
                if (empty($code) || empty($percentage) || empty($expiry_date)) {
                    alert("Vui lòng điền đầy đủ thông tin.");
                    exit;
                }

                if ($discount_id > 0) {
                    // Cập nhật mã giảm giá
                    $stmt = $conn->prepare("UPDATE DISCOUNT SET code = ?, percentage = ?, expiry_date = ? WHERE id = ?");
                    $stmt->bind_param("sdsi", $code, $percentage, $expiry_date, $discount_id);

                    if ($stmt->execute()) {
                        ob_clean();
                        header("Location: index.php");
                        exit();
                    } else {
                        error_log("Database error: " . $stmt->error);
                        echo "Có lỗi xảy ra khi cập nhật mã giảm giá.";
                    }
                    $stmt->close();
                } else {
                    // Thêm mã giảm giá mới
                    $stmt = $conn->prepare("INSERT INTO DISCOUNT (code, percentage, expiry_date) VALUES (?, ?, ?)");
                    $stmt->bind_param("sds", $code, $percentage, $expiry_date);

                    if ($stmt->execute()) {
                        ob_clean();
                        header("Location: index.php");
                        exit();
                    } else {
                        error_log("Database error: " . $stmt->error);
                        echo "Có lỗi xảy ra khi thêm mã giảm giá.";
                    }
                    $stmt->close();
                }
            }

            $conn->close();
        ?>

        <div class="contain2">
            <div class="link">
                <h2>Khuyến mãi</h2>
            </div>
            <div class="discount-box">
                <form action="" method="POST" name="discount-form" id="discount-form">
                    <input type="hidden" name="id" id="id" value="">

                    <label for="code">Code</label><br>
                    <input type="text" id="code" name="code" value="" autocomplete="off" required placeholder="Nhập mã giảm giá"><br>

                    <label for="percentage">Phần trăm giảm giá</label><br>
                    <input type="number" id="percentage" name="percentage" value="" autocomplete="off" step="0.01" min="0" max="1" required placeholder="Nhập giá trị từ 0 đến 1"><br>

                    <label for="expiry_date">Ngày hết hạn</label><br>
                    <input type="date" id="expiry_date" name="expiry_date" value="" autocomplete="off" required><br>

                    <div class="btn">
                        <button type="submit">Lưu</button>
                        <button type="button" onclick="deleteProduct();" style="display: <?php echo $discount_id > 0 ? 'inline' : 'none'; ?>">Xóa</button>
                        <button type="reset">Hủy</button>
                    </div>
                </form>
                <div class="table" id="discount-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Mã Code</th>
                                <th>Code</th>
                                <th>Phần trăm</th>
                                <th>Ngày hết hạn</th>
                            </tr>
                        </thead>
        
                        <tbody id="code-list"></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <?php 
        include 'app/Views/partials/footer.php';
    ?>

    <script src="app/Views/admin/script/menu.js"></script>
    <script src="app/Views/admin/script/comments.js"></script>
    <script src="app/Views/admin/script/order.js"></script>
    <script src="app/Views/admin/script/post.js"></script>
    <script src="app/Views/admin/script/code.js"></script>
</body>
</html>