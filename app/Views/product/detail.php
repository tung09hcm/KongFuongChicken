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
    <link rel="stylesheet" href="../../Views/partials/partials_responsive.css">
    <!-- Link css homepage -->
    <!-- <link rel="stylesheet" href="../../Views/homepage/homepage.css"> -->
    <!-- Link css product detail -->
    <link rel="stylesheet" href="../../Views/product/product.css">
    <link rel="stylesheet" href="../../Views/product/product_responsive.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include '../../Views/partials/header.php';
    ?>

    <!-- Main -->
    <div class="top-bar top-bar-on-mobile d-flex justify-content-center">
        <div class="container d-flex justify-content-center align-items-center">
        <div class="d-flex">
            <span class="icon-text hide-on-mobile">
                Đặt Ngay
            </span>
            <span class="icon-text">
                <span class="icon-at-home"></span>
                Giao Hàng
            </span>
            <span class="icon-text">
                <span class="icon-at-pickup"></span>
                hoặc Mang đi
            </span>
        </div>
            <button class="btn">
            Bắt đầu đặt hàng
            </button>
        </div>
    </div>

    <!-- Product detail mobile -->
    <div class="container mt-3 product-detail hide-on-tablet-desktop">
        <div class="row justify-content-center">
            <div class="col-12 text-center product-detail-image">
                <img alt="Burger Bánh Mì with fries and a can of Pepsi" class="product-detail-image-item" height="500" src="https://static.kfcvietnam.com.vn/images/items/lg/HD_A.jpg?v=gqGP8L" width="500"/>
            </div>
        </div>    

        <hr style="border-top: 2px solid #B6B6B6 !important; margin-top: 15px !important; margin-bottom: 10px !important;">
        
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Món Mới</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">Burger Bánh Mì HDA</a>
                        </li>
                    </ol>
                </nav>

                <div class="col-md-6 product-detail-card">
                    <div class="product-detail-card-item">
                        <h5>BURGER BÁNH MÌ HDA</h5>
                        <p>
                            1 Burger Bánh Mì + 1 Khoai Tây Chiên (vừa) + 1 Lon Pepsi
                        </p>
                        <button class="btn product-detail-btn">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product detail -->
    <div class="container mt-4 product-detail hide-on-mobile">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Món Mới</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="#">Burger Bánh Mì HDA</a>
                </li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-6 product-detail-image">
                <img alt="Burger Bánh Mì with fries and a can of Pepsi" class="product-detail-image-item" height="500" src="https://static.kfcvietnam.com.vn/images/items/lg/HD_A.jpg?v=gqGP8L" width="500"/>
            </div>
            <div class="col-md-6 product-detail-card">
                <div class="product-detail-card-item">
                    <h5>BURGER BÁNH MÌ HDA</h5>
                    <p>
                        1 Burger Bánh Mì + 1 Khoai Tây Chiên (vừa) + 1 Lon Pepsi
                    </p>
                    <button class="btn product-detail-btn">Thêm</button>
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
    <script src="../../Views/product/product.js"></script>
</body>
</html>