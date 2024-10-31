<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- link fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light navbar-header">
            <div class="container container-header">
                <a class="navbar-brand" href="../../Views/homepage/index.php">
                    <img alt="KFC logo" class="navbar-brand-logo" src="https://static.kfcvietnam.com.vn/images/web/kfc-logo.svg?v=5.0"/>
                </a>
                <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav navbar-nav-list me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="../../Views/product/index.php">THỰC ĐƠN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../Views/product/hotdeal.php">KHUYẾN MÃI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../Views/bookparty/index.php">DỊCH VỤ TIỆC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">HỆ THỐNG NHÀ HÀNG</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <!-- User icon -->
                        <li class="nav-item navbar-header-user">
                            <a class="nav-link" href="../../Views/auth/login.php"> <i class="nav-link-icon fa-solid fa-user"></i> </a>
                        </li>
                        <!-- Card icon -->
                        <li class="nav-item navbar-header-cart">
                            <a class="nav-link" href="../../Views/cart/cart.php"> 
                                <i class="nav-link-icon fa-solid fa-cart-shopping"></i>
                                <span class="navbar-header-cart-notice">1</span>
                            </a>
                        </li>
                        <!-- Category icon -->
                        <li class="nav-item navbar-header-category">
                            <button id="menuButton" class="nav-link btn text-dark">
                                <i class="nav-link-icon fa-solid fa-bars"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <button id="closeSidebar" class="btn-close" aria-label="Close"></button>
        <hr>
        <div class="sidebar-category">
            <h5 class="px-3 pt-3">DANH MỤC MÓN ĂN</h5>
            <ul class="list-unstyled px-3">
                <li><a href="#">Món Mới <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Combo 1 Người <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Combo Nhóm <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Gà Rán - Gà Quay <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Burger - Cơm - Mì Ý <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Thức Ăn Nhẹ <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Thức Uống & Tráng Miệng <i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
        </div>
        <hr>
        <div class="sidebar-category">
            <h5 class="px-3">VỀ KFC</h5>
            <ul class="list-unstyled px-3">
                <li><a href="#">Câu Chuyện Của Chúng Tôi <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Tin Khuyến Mãi <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Tin tức KFC <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Tuyển dụng</a></li>
                <li><a href="#">Đặt tiệc Sinh nhật</a></li>
            </ul>
        </div>
        <hr>
        <div class="sidebar-category">
            <h5 class="px-3">LIÊN HỆ KFC</h5>
            <ul class="list-unstyled px-3">
                <li><a href="#">Theo dõi đơn hàng <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="#">Liên hệ KFC <i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
        </div>
        <hr>
        <div class="sidebar-category">
        <h5 class="px-3">CHÍNH SÁCH</h5>
        <ul class="list-unstyled px-3">
            <li><a href="#">Chính sách hoạt động <i class="fa-solid fa-angle-right"></i></a></li>
            <li><a href="#">Chính sách và quy định <i class="fa-solid fa-angle-right"></i></a></li>
            <li><a href="#">Chính sách bảo mật thông tin <i class="fa-solid fa-angle-right"></i></a></li>
        </ul>
        </div>
        <div class="sidebar-footer">
            <div class="sidebar-social-icons">
                <a href="https://www.facebook.com/KFCVietnam/"><i class="sidebar-footer-icon fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/kfc_vietnam/"><i class="sidebar-footer-icon fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/user/KFCVietnam2011"><i class="sidebar-footer-icon fab fa-youtube"></i></a>
                <a href="https://twitter.com/kfc_vietnam"><i class="sidebar-footer-icon fab fa-twitter"></i></a>
            </div>
            <hr style="border-top: 2px solid #E5E5E5;">
            <div class="sidebar-footer-text">
                <p>Copyright © 2023 KFC Vietnam</p>
            </div>
        </div>
    </div>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="../../Views/partials/partials.js"></script>
</body>
</html>