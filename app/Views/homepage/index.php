<?php
    require_once __DIR__ . '/../../Controllers/ProductController.php';

    use App\Controllers\ProductController;

    // Tạo instance ProductController và lấy danh sách sản phẩm
    $productController = new ProductController();
    $products = json_decode($productController->listComboGroupProducts(), true)['products'];
?>


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
    <link rel="stylesheet" href="../../Views/homepage/homepage.css">
    <link rel="stylesheet" href="../../Views/homepage/homepage_responsive.css">
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

    <!-- Theme image -->
    <div id="promotionCarousel" class="theme-img theme-img-on-mobile carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://static.kfcvietnam.com.vn/images/content/home/carousel/lg/ComboMaGe.webp?v=gqGP8L" alt="Promotion Image 1">
            </div>
            <div class="carousel-item">
                <img src="https://static.kfcvietnam.com.vn/images/content/home/carousel/lg/ComboMaGe.jpg?v=gqGP8L" alt="Promotion Image 2">
            </div>
            <div class="carousel-item">
                <img src="https://static.kfcvietnam.com.vn/images/content/home/carousel/xs/ComboMaGe.webp?v=gqGP8L" alt="Promotion Image 3">
            </div>
            <div class="carousel-item">
                <img src="https://static.kfcvietnam.com.vn/images/content/home/carousel/xs/ComboMaGe.jpg?v=gqGP8L" alt="Promotion Image 3">
            </div>
            <div class="carousel-item">
                <img src="https://static.kfcvietnam.com.vn/images/content/home/carousel/lg/ComboMaGe.jpg?v=gqGP8L" alt="Promotion Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#promotionCarousel" data-bs-slide="prev">
            <i class="fa-solid fa-chevron-left"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#promotionCarousel" data-bs-slide="next">
            <i class="fa-solid fa-chevron-right"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <!-- Food list -->
    <div class="container container-food-list">
        <div class="category-food-list-title">
            DANH MỤC MÓN ĂN
        </div>
        <div class="row food-list-row">
            <div class="col-md-3 mb-4 food-list-col">
                <a href="../../Views/product/index.php#uudai" class="card card-food-list">
                    <img alt="Món Mới" class="card-img-top" height="200" src="https://static.kfcvietnam.com.vn/images/category/lg/KHUYEN MAI.jpg?v=gOqwaL" width="300"/>
                    <div class="card-body text-center">
                        <h5 class="card-food-list-title">Ưu Đãi</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4 food-list-col">
                <a href="../../Views/product/index.php#monmoi" class="card card-food-list">
                    <img alt="Món Mới" class="card-img-top" height="200" src="https://static.kfcvietnam.com.vn/images/category/lg/MON MOI.jpg?v=gqGP8L" width="300"/>
                    <div class="card-body text-center">
                        <h5 class="card-food-list-title">Món Mới</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4 food-list-col">
                <a href="../../Views/product/index.php#combo1nguoi" class="card card-food-list">
                    <img alt="Combo 1 Người" class="card-img-top" height="200" src="https://static.kfcvietnam.com.vn/images/category/lg/COMBO 1 NGUOI.jpg?v=gOqwaL" width="300"/>
                    <div class="card-body text-center">
                        <h5 class="card-food-list-title">Combo 1 Người</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4 food-list-col">
                <a href="../../Views/product/index.php#combonhom" class="card card-food-list">
                    <img alt="Combo Nhóm" class="card-img-top" height="200" src="https://static.kfcvietnam.com.vn/images/category/lg/COMBO NHOM.jpg?v=gOqwaL" width="300"/>
                    <div class="card-body text-center">
                        <h5 class="card-food-list-title">Combo Nhóm</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4 food-list-col">
                <a href="../../Views/product/index.php#garan" class="card card-food-list">
                    <img alt="Gà Rán - Gà Quay" class="card-img-top" height="200" src="https://static.kfcvietnam.com.vn/images/category/lg/GA.jpg?v=gOqwaL" width="300"/>
                    <div class="card-body text-center">
                        <h5 class="card-food-list-title">Gà Rán - Gà Quay</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4 food-list-col">
                <a href="../../Views/product/index.php#burgercom" class="card card-food-list">
                    <img alt="Burger - Cơm - Mì Ý" class="card-img-top" height="200" src="https://static.kfcvietnam.com.vn/images/category/lg/COM.jpg?v=gOqwaL" width="300"/>
                    <div class="card-body text-center">
                        <h5 class="card-food-list-title">Burger - Cơm - Mì Ý</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4 food-list-col">
                <a href="../../Views/product/index.php#thucan" class="card card-food-list">
                    <img alt="Thức Ăn Nhẹ" class="card-img-top" height="200" src="https://static.kfcvietnam.com.vn/images/category/lg/MON AN NHE.jpg?v=gOqwaL" width="300"/>
                    <div class="card-body text-center">
                        <h5 class="card-food-list-title">Thức Ăn Nhẹ</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4 food-list-col">
                <a href="../../Views/product/index.php#thucuong" class="card card-food-list">
                    <img alt="Thức Uống &amp; Tráng Miệng" class="card-img-top" height="200" src="https://static.kfcvietnam.com.vn/images/category/lg/TRANG MIENG.jpg?v=gOqwaL" width="300"/>
                    <div class="card-body text-center">
                        <h5 class="card-food-list-title">Thức Uống &amp; Tráng Miệng</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Recommend on mobile -->
    <div class="container container-recommend mt-4 mb-3 hide-on-tablet-desktop">
        <div class="container-recommend-header">
            <i class="recommend-icon-avatar"></i>
            <h3 class="category-recommend-title mt-2 mb-0">
                CÓ THỂ BẠN SẼ THÍCH MÓN NÀY
            </h3>
        </div>

        <div class="container-recommend-row pt-2">
            <!-- Combo Item 1 -->
            <!-- <div class="container-recommend-col">
                <a href="../../Views/product/detail.php" class="card card-recommend">
                    <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img" alt="Combo Tối Burger">
                    <div class="card-recommend-body">
                        <h5 class="product-recommend-title">Combo Tối Burger</h5>
                        <p class="price-recommend">78.000đ</p>
                        <p class="description-recommend">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                        <button class="btn btn-recommend-add w-100">Thêm</button>
                    </div>
                </a>
            </div> -->
            
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="container-recommend-col">
                        <a href="../../Views/product/detail.php?id=<?= $product['id'] ?>" class="card card-recommend">
                            <img src="<?= htmlspecialchars($product['image_link']) ?>" class="card-recommend-img" alt="<?= htmlspecialchars($product['name']) ?>">
                            <div class="card-recommend-body">
                                <h5 class="product-recommend-title"><?= htmlspecialchars($product['name']) ?></h5>
                                <p class="price-recommend"><?= number_format($product['price'], 0, ',', '.') ?>đ</p>
                                <p class="description-recommend"><?= htmlspecialchars($product['description']) ?></p>
                                <button class="btn btn-recommend-add w-100" data-id="<?= $product['id'] ?>">Thêm</button>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Không có sản phẩm nào để hiển thị!</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recommend -->
    <div class="container container-recommend mt-4 mb-3 hide-on-mobile">
        <h3 class="category-recommend-title mt-2 mb-0">
            <i class="recommend-icon-avatar"></i>
            CÓ THỂ BẠN SẼ THÍCH MÓN NÀY
        </h3>

        <div class="container-recommend-row row row-cols-1 row-cols-md-4 g-4 pt-2">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="container-recommend-col">
                        <a href="../../Views/product/detail.php?id=<?= $product['id'] ?>" class="card card-recommend">
                            <img src="<?= htmlspecialchars($product['image_link']) ?>" class="card-recommend-img" alt="<?= htmlspecialchars($product['name']) ?>">
                            <div class="card-recommend-body">
                                <h5 class="product-recommend-title"><?= htmlspecialchars($product['name']) ?></h5>
                                <p class="price-recommend"><?= number_format($product['price'], 0, ',', '.') ?>đ</p>
                                <p class="description-recommend"><?= htmlspecialchars($product['description']) ?></p>
                                <button class="btn btn-recommend-add w-100" data-id="<?= $product['id'] ?>">Thêm</button>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Không có sản phẩm nào để hiển thị!</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Theme image footer -->
    <div class="theme-img-ft">
        <img class="theme-img-left-main" src="https://static.kfcvietnam.com.vn/images/content/home/mobileappbanner/lg/banner.jpg?v=gqGP8L" alt="coupon">
        <div class="theme-img-app">
            <a href="#" class="ng-star-inserted ng-star-inserted-google-play">
                <i class="icon-google-play-btn"></i>
            </a>
            <a href="#" class="ng-star-inserted  ng-star-inserted-app-store">
                <i class="icon-app-store-btn"></i>
            </a>
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