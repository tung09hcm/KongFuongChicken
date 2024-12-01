<?php
    require_once __DIR__ . '/../../Controllers/ProductController.php';

    use App\Controllers\ProductController;

    // Lấy ID từ URL
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Nếu không có ID, chuyển hướng về trang sản phẩm
    if (!$id) {
        header('Location: ../../Views/product/index.php');
        exit();
    }

    // Lấy thông tin chi tiết sản phẩm
    $productController = new ProductController();
    $productData = json_decode($productController->detail($id), true);

    // Kiểm tra xem sản phẩm có tồn tại
    if ($productData['status'] !== 'success') {
        echo '<h1>Sản phẩm không tồn tại!</h1>';
        exit();
    }

    $product = $productData['product'];
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
    <?php
        // Lấy URL của trang trước đó (referrer)
        $previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '#';

        // Lấy thông tin của sản phẩm hiện tại từ URL
        $currentProductName = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Sản phẩm';

        // Đảm bảo rằng link breadcrumb không bị lỗi nếu referrer không có
        $previousPageName = 'Trang trước'; // Đổi tên này thành tên mặc định nếu cần
        if (strpos($previousPage, 'homepage') !== false) {
            $previousPageName = 'Trang chủ';
        } elseif (strpos($previousPage, 'category') !== false) {
            $previousPageName = 'Danh mục';
        } // Bạn có thể thêm các logic khác để xác định tên phù hợp cho trang trước.
    ?>

    <div class="container mt-3 product-detail hide-on-tablet-desktop">
        <div class="row justify-content-center">
            <div class="col-12 text-center product-detail-image">
                <img src="<?= htmlspecialchars($product['image_link']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-detail-image-item" height="500" width="500"/>
            </div>
        </div>    

        <hr style="border-top: 2px solid #B6B6B6 !important; margin-top: 15px !important; margin-bottom: 10px !important;">
        
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <!-- Breadcrumb trang trước -->
                        <li class="breadcrumb-item">
                            <a href="<?= $previousPage ?>"><?= $previousPageName ?></a>
                        </li>
                        <!-- Breadcrumb trang hiện tại -->
                        <li class="breadcrumb-item active" aria-current="page">
                            <?= htmlspecialchars($product['name']) ?>
                        </li>
                    </ol>
                </nav>

                <div class="col-md-6 product-detail-card">
                    <div class="product-detail-card-item">
                        <h5><?= htmlspecialchars($product['name']) ?></h5>
                        <p><?= htmlspecialchars($product['description']) ?></p>
                        <p>
                            <span class="product-detail-card-price">Giá: </span>
                            <?= number_format($product['price'], 0, ',', '.') ?>đ
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
                <!-- Breadcrumb trang trước -->
                <li class="breadcrumb-item">
                    <a href="<?= $previousPage ?>"><?= $previousPageName ?></a>
                </li>
                <!-- Breadcrumb trang hiện tại -->
                <li class="breadcrumb-item active" aria-current="page">
                    <?= htmlspecialchars($product['name']) ?>
                </li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-6 product-detail-image">
                <img src="<?= htmlspecialchars($product['image_link']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-detail-image-item" height="500" width="500"/>
            </div>
            <div class="col-md-6 product-detail-card">
                <div class="product-detail-card-item">
                    <h5><?= htmlspecialchars($product['name']) ?></h5>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                    <p class="product-detail-card-item-price">
                        <span>Giá: </span>
                        <?= number_format($product['price'], 0, ',', '.') ?>đ
                    </p>
                    <button class="btn product-detail-btn">Thêm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-comment mt-5">
        <h2>
            Bình luận
        </h2>

        <div class="comment-input">
            <div class="comment-header">
                <img alt="User profile picture" height="50" src="https://storage.googleapis.com/a1aa/image/voCa6nRO4N63FFZDqqJc9dCX48W0O2r834q5iE6gm4O7bj9E.jpg" width="50"/>
                <span class="name">
                    Văn A
                </span>
            </div>
            <div class="comment-body">
                <p>
                    Ngon ngon ngon
                </p>
            </div>
            <div class="comment-footer">
                <button class="btn">
                    Bình luận
                </button>
            </div>
        </div>

        <div class="comment-box">
            <div class="comment-header">
                <img alt="User profile picture" height="50" src="https://storage.googleapis.com/a1aa/image/voCa6nRO4N63FFZDqqJc9dCX48W0O2r834q5iE6gm4O7bj9E.jpg" width="50"/>
                <span class="name">
                    Văn B
                </span>
            </div>
            <div class="comment-body">
                <p>
                    Chưa ăn chưa biết
                </p>
            </div>
            <div class="comment-footer">
                <span class="time">
                    5 phút trước
                </span>
            </div>
        </div>
        <div class="load-more">
            <button class="btn btn-more">
                Xem thêm
            </button>
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