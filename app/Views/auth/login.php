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
    <link rel="stylesheet" href="/KongFuongChicken/app/Views/partials/partials.css">
    <link rel="stylesheet" href="/KongFuongChicken/app/Views/partials/partials_responsive.css">
    <!-- Link css homepage -->
    <link rel="stylesheet" href="/KongFuongChicken/app/Views/auth/auth.css">
    <link rel="stylesheet" href="/KongFuongChicken/app/Views/auth/auth_responsive.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php
        include dirname(__FILE__) . '/../partials/header.php';
    ?>

    <!-- Login on mobile -->
    <div class="container-fluid container-login container-login-on-mobile hide-on-tablet-desktop">
        <div class="row">
            <div class="col right-section">
                <h2>ĐĂNG NHẬP</h2>
                <form action="index.php?controller=auth&action=login" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="email">Địa chỉ email của bạn *</label>
                        <input class="form-control" id="email" required="" type="email" name = "email"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Mật khẩu *</label>
                        <input class="form-control" id="password" required="" type="password" name = "password"/>
                        <div class="form-text">
                            <a id="forgotpassword" href="#">Bạn quên mật khẩu?</a>
                        </div>
                    </div>
                    <button class="btn btn-login" type="submit" style="font-size: 18px !important;">Đăng nhập</button>
                </form>
                <p class="text-center" style="font-size: 18px !important;">Hoặc tiếp tục với</p>
                <button class="btn btn-apple" style="font-size: 18px !important;">
                    <i class="icon-apple appico"></i>
                    Đăng nhập bằng apple
                </button>
                <button class="btn btn-google" style="font-size: 18px !important;">
                    <i class="fab fa-google btn-google-item"></i>
                    Đăng nhập bằng google
                </button>
                <p class="register-text">
                    Bạn chưa có tài khoản?
                    <a href="/KongFuongChicken/app/Views/auth/register.php">Đăng ký</a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col left-section">
                <img class="login-image" src="https://static.kfcvietnam.com.vn/images/web/signin/lg/signin.jpg?v=gqGP8L" alt="signin">
            </div>
        </div>
    </div>

    <!-- Main -->
    <div class="container-fluid container-login hide-on-mobile">
        <div class="row">
            <div class="col-md-6 left-section">
                <img class="login-image" src="https://static.kfcvietnam.com.vn/images/web/signin/lg/signin.jpg?v=gqGP8L" alt="signin">
            </div>
            <div class="col-md-6 right-section">
                <h2>ĐĂNG NHẬP</h2>
                <form action="index.php?controller=auth&action=login" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="email">Địa chỉ email của bạn *</label>
                        <input class="form-control" id="email" required="" type="email" name = "email"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Mật khẩu *</label>
                        <input class="form-control" id="password" required="" type="password" name = "password"/>
                        <div class="form-text">
                            <a id="forgotpassword" href="#">Bạn quên mật khẩu?</a>
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
                    <a href="index.php?controller=auth&action=registerView">Đăng ký</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Modal overlay -->
    <div id="modalOverlay" class="login-modal-overlay">
        <div class="login-modal-box">
            <span class="login-close-btn" id="closeBtn">
                <i class="fa-solid fa-circle-xmark"></i>
            </span>
            <div class="login-modal-header">
                <h5 class="login-modal-title">Bạn quên mật khẩu?</h5>
            </div>
            <div class="login-modal-body">
                <p class="login-modal-body-title">Đừng lo lắng, bạn có thể đặt lại dễ dàng.</p>
                <p class="login-modal-body-des">Chúng tôi sẽ gửi cho bạn một email có liên kết để đặt lại mật khẩu của bạn.</p>
                <label for="email" class="login-modal-body-form-label">Địa chỉ email của bạn *</label>
                <input type="email" class="login-modal-body-form-control" id="email" placeholder="">
                <button type="button" class="btn btn-primary login-modal-body-btn mt-3">Gửi Email Đặt lại Mật khẩu</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        include dirname(__FILE__) . '/../partials/footer.php';
    ?>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/KongFuongChicken/app/Views/auth/auth.js"></script>
</body>
</html>