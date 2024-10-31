<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Gà Rán KFC, Giao Hàng Tận Nơi | KFC Việt Nam</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <!-- Link css header -->
    <link rel="stylesheet" href="../../Views/partials/partials.css">
    <!-- Link css user -->
    <link rel="stylesheet" href="../../Views/user/user.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <!-- Header -->
    <?php 
        include '../../Views/partials/header.php';
    ?>

    <!-- Main -->
    <div class="container my-5">
        <div class="row user-edit">
            <div class="col-md-4">
                <div class="user-edit-sidebar text-center">
                    <img src="https://tmssl.akamaized.net//images/foto/galerie/cristiano-ronaldo-im-trikot-von-portugal-1718197560-139337.jpg?lm=1718197575" alt="Profile" class="rounded-circle mb-3 user-edit-img">
                    <h3>Xin chào, Bảy Nguyễn!</h3>
                    <a class="user-edit-logout" href="#">Đăng xuất</a>
                    <nav class="nav flex-column mt-4">
                        <a class="user-edit-item" href="../../Views/user/previous-orders.php">Đơn hàng đã đặt</a>
                        <a class="user-edit-item" href="../../Views/user/favourite-orders.php">Đơn hàng yêu thích</a>
                        <a class="user-edit-item" href="../../Views/user/addresses.php">Địa chỉ của bạn</a>
                        <a class="user-edit-item active" href="../../Views/user/edit-profile.php">Chi tiết tài khoản</a>
                        <a class="user-edit-item" href="../../Views/user/reset-password.php">Đặt lại mật khẩu</a>
                        <a class="user-edit-item" href="../../Views/user/delete.php">Xóa tài khoản</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-title ">CHI TIẾT TÀI KHOẢN</h2>
                    <form>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Họ của bạn *</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Bảy">
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Tên của bạn *</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Nguyễn">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại *</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Địa chỉ email của bạn *</label>
                            <input type="email" class="form-control" id="email" placeholder="baynguyen@gmail.com" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Giới tính *</label>
                            <select class="form-select" id="gender">
                                <option selected>Chọn giới tính</option>
                                <option value="male">Nam</option>
                                <option value="female">Nữ</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ngày sinh của bạn (tùy chọn)</label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select">
                                        <option selected>Ngày</option>
                                        <!-- Add options for days -->
                                        <script>
                                            for (let i = 1; i <= 31; i++) {
                                                document.write('<option value="' + i + '">' + i + '</option>');
                                            }
                                        </script>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select">
                                        <option selected>Tháng</option>
                                        <!-- Add options for months -->
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select">
                                        <option selected>Năm</option>
                                        <!-- Add options for years -->
                                        <script>
                                            const currentYear = new Date().getFullYear();
                                            for (let i = currentYear; i >= 1900; i--) {
                                                document.write('<option value="' + i + '">' + i + '</option>');
                                            }
                                        </script>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button id="updateAccountBtn" type="submit" class="submit-btn mt-3">Cập nhật tài khoản</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal overlay -->
    <div id="modalOverlay" class="modal-overlay">
        <div class="modal-box">
            <span class="close-btn" id="closeBtn">
                <i class="fa-solid fa-circle-xmark"></i>
            </span>
            <h4>CHI TIẾT TÀI KHOẢN CỦA BẠN ĐÃ ĐƯỢC CẬP NHẬT THÀNH CÔNG</h4>
        </div>
    </div>

    <!-- Footer -->
    <?php 
        include '../../Views/partials/footer.php';
    ?>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="../../Views/user/user.js"></script>
</body>
</html>