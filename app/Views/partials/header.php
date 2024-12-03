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
    <!-- Mobile header -->
    <div class="header-mobile hide-on-tablet-desktop">
        <!-- Category icon -->
        <div class="header-mobile-category">
            <button id="openMenu" class="nav-link btn text-dark">
                <i class="nav-link-icon fa-solid fa-bars"></i>
            </button>
        </div>

        <a href="index.php?controller=user&action=Menu" class="header-mobile-logo">
            <img class="header-mobile-logo-item" src="https://static.kfcvietnam.com.vn/images/web/kfc-logo-mobile.svg?v=5.0" alt="">
        </a>

        <ul class="header-mobile-cart-user">
            <!-- User icon -->
            <li class="header-mobile-user">
                <a class="header-mobile-user-link" href="index.php?controller=user&action=Profile">
                    <i class="header-mobile-user-link-icon fa-solid fa-user"></i>
                </a>
            </li>
            <!-- Card icon -->
            <li class="header-mobile-cart">
                <a class="header-mobile-cart-link" href="index.php?controller=user&action=cart"> 
                    <i class="header-mobile-cart-link-icon fa-solid fa-cart-shopping"></i>
                    <span class="header-mobile-cart-notice"></span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Sidebar mobile-->
    <div id="sidebar_mobile" class="sidebar-mobile hide-on-tablet-desktop">
        <div class="sidebar-mobile-header">
            <button id="closeMenu" class="sidebar-mobile-btn-close btn-close" aria-label="Close"></button>
            <a class="sidebar-mobile-cart-link" href="index.php?controller=user&action=cart"> 
                <i class="sidebar-mobile-cart-link-icon fa-solid fa-cart-shopping"></i>
                <span class="sidebar-mobile-cart-notice"></span>
            </a>
        </div>
        
        <hr style="margin: 5px 15px !important;">

        <h2 class="sidebar-mobile-tile">BẮT ĐẦU</h2>
        <span class="sidebar-mobile-login">
            <a href="index.php?controller=auth&action=index" class="sidebar-mobile-link">Đăng nhập</a>
        </span> 
        
        <span>
            <a href="index.php?controller=auth&action=registerView" class="sidebar-mobile-link">Đăng ký</a>
        </span>

        <hr>

        <a href="index.php?controller=user&action=Product" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">THỰC ĐƠN</h5>
            <img src="https://static.kfcvietnam.com.vn/images/web/hamburger/lg/menu.png?v=gOqnPL" alt="">
        </a>
        <hr>
        <a href="index.php?controller=user&action=hotDeal" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">KHUYẾN MÃI</h5>
            <img src="https://static.kfcvietnam.com.vn/images/web/hamburger/lg/deal.png?v=gOqnPL" alt="">
        </a>
        <hr style="margin: 10px 15px !important;">

        <div class="sidebar-mobile-footer">
            <div class="sidebar-social-icons">
                <a href="https://www.facebook.com/KFCVietnam/"><i class="sidebar-footer-icon fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/kfc_vietnam/"><i class="sidebar-footer-icon fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/user/KFCVietnam2011"><i class="sidebar-footer-icon fab fa-youtube"></i></a>
                <a href="https://twitter.com/kfc_vietnam"><i class="sidebar-footer-icon fab fa-twitter"></i></a>
            </div>
            <hr style="border-top: 2px solid #E5E5E5;">
            <div class="sidebar-footer-text">
                <p class="sidebar-footer-text-item" style="color: var(--white-color) !important;">Copyright © 2023 KFC Vietnam</p>
            </div>
        </div>
    </div>

    <div class="header hide-on-mobile">
        <nav class="navbar navbar-expand-lg navbar-light navbar-header">
            <div class="container container-header">
                <a class="navbar-brand" href="index.php?controller=user&action=Menu">
                    <img alt="KFC logo" class="navbar-brand-logo" src="https://static.kfcvietnam.com.vn/images/web/kfc-logo.svg?v=5.0"/>
                </a>
                <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav navbar-nav-list me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?controller=user&action=Product">THỰC ĐƠN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=user&action=hotDeal">KHUYẾN MÃI</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <!-- User icon -->
                        <li class="nav-item navbar-header-user">
                            <a class="nav-link" href="index.php?controller=user&action=Profile"> <i class="nav-link-icon fa-solid fa-user"></i> </a>
                        </li>
                        <!-- Card icon -->
                        <li class="nav-item navbar-header-cart">
                            <a class="nav-link" href="index.php?controller=user&action=Cart"> 
                                <i class="nav-link-icon fa-solid fa-cart-shopping"></i>
                                <span class="navbar-header-cart-notice"></span>
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
    <div id="sidebar" class="sidebar hide-on-mobile">
        <button id="closeSidebar" class="btn-close" aria-label="Close"></button>
        <hr>
        <div class="sidebar-category">
            <h5 class="px-3 pt-3">DANH MỤC MÓN ĂN</h5>
            <ul class="list-unstyled px-3">
                <li><a href="index.php?controller=user&action=Product&section=monmoi">Món Mới <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="index.php?controller=user&action=Product&section=combo1nguoi">Combo 1 Người <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="index.php?controller=user&action=Product&section=combonhom">Combo Nhóm <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="index.php?controller=user&action=Product&section=garan">Gà Rán - Gà Quay <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="index.php?controller=user&action=Product&section=burgercom">Burger - Cơm - Mì Ý <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="index.php?controller=user&action=Product&section=thucan">Thức Ăn Nhẹ <i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="index.php?controller=user&action=Product&section=thucuong">Thức Uống & Tráng Miệng <i class="fa-solid fa-angle-right"></i></a></li>
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
    <script src="app/Views/partials/partials.js"></script>
    <script>
        fetch('index.php?controller=user&action=getQuantity')
        .then(response => response.json())
        .then(data => {
            const quantityElement = document.querySelector('.navbar-header-cart-notice'); // Đảm bảo selector chính xác
            if (quantityElement) {
                if (data.quantity === null) {
                    quantityElement.textContent = 0;
                }
                else {
                    quantityElement.textContent = data.quantity.total_quantity; // Sử dụng textContent để thay đổi nội dung
                }
            } else {
                console.error('Không tìm thấy phần tử với selector .navbar-header-cart-notice');
            }

            const quantityElement1 = document.querySelector('.header-mobile-cart-notice'); // Đảm bảo selector chính xác
            if (quantityElement1) {
                if (data.quantity === null) {
                    quantityElement1.textContent = 0;
                }
                else {
                    quantityElement1.textContent = data.quantity.total_quantity; // Sử dụng textContent để thay đổi nội dung
                }
            } else {
                console.error('Không tìm thấy phần tử với selector .navbar-header-cart-notice');
            }
        })
        .catch(error => {
            console.error('Có lỗi xảy ra khi lấy dữ liệu:', error);
        });
    </script>
</body>
</html>