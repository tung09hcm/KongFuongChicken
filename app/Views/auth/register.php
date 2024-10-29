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
    <!-- Link css homepage -->
    <link rel="stylesheet" href="../../Views/auth/auth.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include '../../Views/partials/header.php';
    ?>

    <!-- Main -->
    <div class="container-fluid container-login">
        <div class="row">
            <div class="col-md-6 left-section">
                <img class="login-image" src="https://static.kfcvietnam.com.vn/images/web/signin/lg/signin.jpg?v=gqGP8L" style="height: 745px;" alt="signin">
            </div>
            <div class="col-md-6 right-section">
                <div class="form-container">
                    <h2>TẠO TÀI KHOẢN</h2>
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="lastName">Họ của bạn *</label>
                            <input class="form-control" id="lastName" required="" type="text"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="firstName">Tên của bạn *</label>
                            <input class="form-control" id="firstName" required="" type="text"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone">Số điện thoại *</label>
                            <input class="form-control" id="phone" required="" type="tel"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Địa chỉ email của bạn *</label>
                            <input class="form-control" id="email" required="" type="email"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Mật khẩu *</label>
                            <input class="form-control" id="password" required="" type="password"/>
                        </div>
                        <div class="mb-3 form-check">
                            <input class="form-check-input" id="terms" required="" type="checkbox"/>
                            <label class="form-check-label" for="terms">
                                Tôi đã đọc và đồng ý với các
                                <a href="#">Chính Sách Hoạt Động</a>
                                và
                                <a href="#">Chính Sách Bảo Mật Thông Tin của KFC Việt Nam</a>
                                .
                            </label>
                        </div>
                        <button class="btn btn-primary" type="submit">Tạo Tài Khoản</button>
                    </form>

                    <p class="form-text-register mt-3">
                        Bạn đã có tài khoản?
                        <a href="../../Views/auth/login.php">Đăng nhập</a>
                    </p>
                </div>
            </div>
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
</body>
</html>