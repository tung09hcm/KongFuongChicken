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
                <a id="menus" href="index.php?controller=admin&action=viewMenu">Xem thêm</a>
            </div>
            <div id="card-items"></div>
        </div>

        <!-- /*order*/ DONE-->
        <div class="contain2">
            <div class="link">
                <h2>Đơn hàng gần đây</h2>
                <a id="orders" href="index.php?controller=admin&action=viewOrder">Xem thêm</a>
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
                <a id="news" href="index.php?controller=admin&action=viewPost">Xem thêm</a>
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
                        <button type="button" onclick="deleteDiscount();" style="display: none" id="deleteDiscount">Xóa</button>
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

        <div class="contain2">
            <div class="link">
                <h2>Danh sách cửa hàng</h2>
            </div>
            <div class="store-box">
                <form action="" method="POST" name="store-form" id="store-form">
                    <div class="store-detail-form">
                        <div id="store-info">
                            <h3>Thông tin cửa hàng</h3>
                            <input type="hidden" name="idStore" id="idStore" value="">

                            <label for="name">Tên cửa hàng</label><br>
                            <input type="text" id="name" name="name" value="" autocomplete="off"><br>

                            <label for="address">Địa chỉ</label><br>
                            <input type="number" id="address" name="address" value="" autocomplete="off"><br>

                            <label for="phone">SĐT</label><br>
                            <input type="text" id="phone" name="phone" value="" autocomplete="off" required><br>

                            <label for="opening_hours">Giờ mở cửa</label><br>
                            <input type="time" id="opening_hours" name="opening_hours" value="" autocomplete="off" required><br>
                        </div>
                        <div id="admin-info">
                            <h3>Thông tin admin</h3>
                            <input type="hidden" name="idAdmin" id="idAdmin" value="">

                            <label for="first-name">Tên</label><br>
                            <input type="text" id="first-name" name="first-name" value="" autocomplete="off"><br>

                            <label for="last-name">Họ</label><br>
                            <input type="text" id="last-name" name="last-name" value="" autocomplete="off"><br>

                            <label for="phone">SĐT</label><br>
                            <input type="text" id="admin-phone" name="phone" value="" autocomplete="off" required><br>

                            <label for="email">Email</label><br>
                            <input type="text" id="email" name="email" value="" autocomplete="off" required><br>
                        </div>
                    </div>
                    <div class="btn">
                        <button type="submit">Lưu</button>
                        <button type="button" onclick="deleteStore();" style="display: none" id="deleteStore">Xóa</button>
                        <button type="reset">Hủy</button>
                    </div>
                </form>
                <div class="table" id="store-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Mã cửa hàng</th>
                                <th>Tên cửa hàng</th>
                                <th>Địa chỉ</th>
                                <th>Tên admin</th>
                                <th>SĐT cửa hàng</th>
                                <th>Email admin</th>
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