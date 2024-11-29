<!-- DONE -->

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
            <button id="openMenu" class="nav-link btn text-dark" onclick="document.getElementById('sidebar_mobile').classList.add('show');">
                <i class="nav-link-icon fa-solid fa-bars"></i>
            </button>
        </div>

        <a href="index.php?controller=admin&action=Menu" class="header-mobile-logo">
            <img class="header-mobile-logo-item" src="https://static.kfcvietnam.com.vn/images/web/kfc-logo-mobile.svg?v=5.0" alt="">
        </a>
    </div>

    <!-- Sidebar mobile-->
    <div id="sidebar_mobile" class="sidebar-mobile hide-on-tablet-desktop">
        <div class="sidebar-mobile-header" style="padding-top: 27px">
            <button id="closeMenu" class="sidebar-mobile-btn-close btn-close" aria-label="Close" onclick="document.getElementById('sidebar_mobile').classList.remove('show');"></button>
        </div>
        
        <hr style="margin: 5px 15px !important;">

        <a href="index.php?controller=admin&action=Menu" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">TRANG CHỦ</h5>
        </a>
        <hr>
        <a href="index.php?controller=admin&action=viewMenu" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">MENU</h5>
        </a>
        <hr>
        <a href="index.php?controller=admin&action=viewOrder" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">ĐƠN HÀNG</h5>
        </a>
        <hr>
        <a href="index.php?controller=admin&action=viewCustomer" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">THÀNH VIÊN</h5>
        </a>
        <hr>
        <a href="index.php?controller=admin&action=viewComment" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">BÌNH LUẬN</h5>
        </a>
        <hr>
        <a href="index.php?controller=admin&action=viewPost" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">TIN TỨC</h5>
        </a>
        <hr>
        <a href="log-out.php" class="sidebar-category-mobile">
            <h5 class="px-3 pt-3">ĐĂNG XUẤT</h5>
        </a>
        <hr style="margin: 10px 15px !important;">
    </div>

    <div class="header hide-on-mobile">
        <nav class="navbar navbar-expand-lg navbar-light navbar-header">
            <div class="container container-header">
                <a class="navbar-brand" href="index.php?controller=admin&action=Menu">
                    <img alt="KFC logo" class="navbar-brand-logo" src="https://static.kfcvietnam.com.vn/images/web/kfc-logo.svg?v=5.0"/>
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav navbar-nav-list me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" id="home" href="index.php?controller=admin&action=Menu">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="menus" href="index.php?controller=admin&action=viewMenu">MENU</a>                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orders" href="index.php?controller=admin&action=viewOrder">ĐƠN HÀNG</a>                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="customers" href="index.php?controller=admin&action=viewCustomer">THÀNH VIÊN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="comments" href="index.php?controller=admin&action=viewComment">BÌNH LUẬN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="news" href="index.php?controller=admin&action=viewPost">TIN TỨC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="log-out" href="log-out.php">ĐĂNG XUẤT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>