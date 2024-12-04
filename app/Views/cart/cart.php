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
    <link rel="stylesheet" href="app/Views/partials/partials.css">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css">
    <!-- Link css homepage -->
    <link rel="stylesheet" href="app/Views/cart/cart.css">
    <link rel="stylesheet" href="app/Views/cart/cart_responsive.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include 'app/Views/partials/header_cart.php';
    ?>

    <!-- Main -->
    <!-- Không Có hàng trong giỏ -->
    <div class="container no-products-ordered my-5">
        <h2 class="no-products-ordered-title">GIỎ HÀNG CỦA TÔI</h2>
        <div class="row no-products-ordered-container">
            <div class="col">
                <div class="no-products-ordered-info">
                    <div class="no-products-ordered-cart-title">
                        <P>GIỎ HÀNG CỦA BẠN ĐANG TRỐNG. HÃY ĐẶT MÓN NGAY!</p>
                        <button type="submit" class="no-products-ordered-btn mt-3">Bắt đầu đặt hàng</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="no-products-ordered-img">
                    <div class="no-products-ordered-cart-img">
                        <img src="https://static.kfcvietnam.com.vn/images/web/empty-cart.png?v=5.0" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Có hàng trong giỏ -->
    <div class="container products-ordered hide-on-mobile">
        <div class="products-ordered-title">
            GIỎ HÀNG CỦA TÔI
        </div>
        <div class="row">
            <div class="col-md-8 mb-4">
                <div id="order-items-container"></div>
                <!-- Đề xuất thêm 4 sản phẩm -->
                <div class="suggestions">
                    <h3>SẼ NGON HƠN KHI THƯỞNG THỨC CÙNG</h3>
                    <div class="suggestions-card-deck d-flex">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="summary">
                    <div class="mb-3">
                        <label class="summary-form form-label" for="discount-code">Bạn có Mã giảm giá?</label>
                        <div class="input-group">
                            <input class="form-control" id="discount-code" placeholder="Mã giảm giá *" type="text"/>
                            <button class="btn summary-btn-apply" onclick="addDiscount()">Áp dụng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Có hàng trong giỏ css đt -->
    <div class="container products-ordered-mobile hide-on-tablet-desktop">
        <div class="products-ordered-title">
            GIỎ HÀNG CỦA TÔI
        </div>

        <div class="products-ordered-card" id="products-ordered-card"></div>
        
        <div class="suggestions">
            <h3>SẼ NGON HƠN KHI THƯỞNG THỨC CÙNG</h3>
            <div class="suggestions-card-deck d-flex"></div>
        </div>

        <div class="summary">
            <div class="mb-3">
                <label class="summary-form form-label" for="discount-code">Bạn có Mã giảm giá?</label>
                <div class="input-group">
                    <input class="form-control" id="discount-code" placeholder="Mã giảm giá *" type="text"/>
                    <button class="btn summary-btn-apply" onclick="addDiscount()">Áp dụng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php 
        include 'app/Views/partials/footer.php';
    ?>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="app/Views/cart/cart.js"></script>
</body>
</html>