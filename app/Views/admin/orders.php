<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h1>Đơn hàng</h1>

        <!-- /*order*/ -->
        <div class="contain2" style="margin-top: 0px;">
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

        <!-- /*popup*/ -->
        <div class="overlay" id="overlay"></div>

        <div class="popup" id="popup"></div>

        <?php 
            include 'app/Views/partials/footer.php';
        ?>
    </div>
    <script src="app/Views/admin/script/order.js"></script>
</body>
</html>