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
                <img class="login-image" src="https://static.kfcvietnam.com.vn/images/web/signin/lg/signin.jpg?v=gqGP8L" alt="signin">
            </div>
            <div class="col-md-6 right-section">
                <h2>ĐĂNG NHẬP</h2>
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="email">Địa chỉ email của bạn *</label>
                        <input class="form-control" id="email" required="" type="email"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Mật khẩu *</label>
                        <input class="form-control" id="password" required="" type="password"/>
                        <div class="form-text">
                            <a href="#">Bạn quên mật khẩu?</a>
                        </div>
                    </div>
                    <button class="btn btn-login" type="submit">Đăng nhập</button>
                </form>
                <p class="text-center">Hoặc tiếp tục với</p>
                <button class="btn btn-apple">
                    <i class="icon-apple appico"></i>
                    Đăng nhập bằng apple
                </button>
                <button class="btn btn-google">
                    <i class="fab fa-google btn-google-item"></i>
                    Đăng nhập bằng google
                </button>
                <p class="register-text">
                    Bạn chưa có tài khoản?
                    <a href="../../Views/auth/register.php">Đăng ký</a>
                </p>
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
    <script src="../../Views/homepage/homepage.js"></script>
</body>
</html>