<!-- DONE -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include 'navBar.php';

        // Kết nối cơ sở dữ liệu
        include  __DIR__ . '/../../../config/config.php';

        // Kết nối cơ sở dữ liệu
        $host = DB_HOST;
        $port = DB_PORT;
        $dbname = DB_NAME;
        $username = DB_USER;
        $password = DB_PASSWORD;

        // Tạo kết nối
        $conn = new mysqli($host, $username, $password, $dbname, $port);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        // Truy vấn dữ liệu từ bảng ACCOUNT
        $sql = "SELECT ACCOUNT.id, ACCOUNT.first_name, ACCOUNT.last_name, ACCOUNT.phone, ACCOUNT.email FROM ACCOUNT JOIN USER ON ACCOUNT.id = USER.account_id";
        $result = $conn->query($sql);

        // Đóng kết nối
        $conn->close();
    ?>

    <div class="big-container">
        <h1>Thành viên</h1>

        <!-- /*order*/ -->
        <div class="contain2" style="margin-top: 0px;">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Mã khách hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Họ khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                            // Kiểm tra nếu có dữ liệu
                            if ($result->num_rows > 0) {
                                // Lặp qua từng bản ghi và tạo các dòng <tr>
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr onclick=\"showPopup(this)\" 
                                        data-id=\"{$row['id']}\" 
                                        data-firstname=\"{$row['first_name']}\"
                                        data-lastname=\"{$row['last_name']}\"
                                        data-phone=\"{$row['phone']}\"
                                        data-email=\"{$row['email']}\">";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td>{$row['first_name']}</td>";
                                    echo "<td>{$row['last_name']}</td>";
                                    echo "<td>{$row['phone']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo '<tr><td colspan="5">Không có dữ liệu</td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php 
            include '../partials/footer.php';
        ?>
    
    </div>
</body>
</html>