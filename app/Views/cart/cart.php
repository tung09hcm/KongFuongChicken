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
    <link rel="stylesheet" href="../../Views/cart/cart.css">
    <link rel="stylesheet" href="../../Views/cart/cart_responsive.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include '../../Views/partials/header_cart.php';
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

    <!-- Có hàng trong giỏ css đt -->
    <div class="container products-ordered-mobile hide-on-tablet-desktop">
        <div class="products-ordered-title">
            GIỎ HÀNG CỦA TÔI
        </div>

        <div class="products-ordered-card">
            <div class="row products-ordered-card-info">
                <div class="col">
                    <img class="products-ordered-check-img" alt="" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/HD_B.jpg?v=g21eZ4" width="100"/>
                </div>
                <div class="col products-ordered-check-left">
                    <div>
                        <div class="d-flex align-items-center products-ordered-check-left-title">
                            <span>Combo FB live 79K</span>
                        </div>
                        <div class="text-muted products-ordered-check-left-des">
                            KFC Popcorn (lớn) - Mì Ý Gà Viên
                        </div>
                        <div class="products-ordered-check-left-edit">
                            <a class="text-decoration-none" href="#">Chỉnh sửa</a>
                            |
                            <a class="text-decoration-none" href="#">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="margin: 5px 0 !important;">

            <div class="row products-ordered-card-q-p">
                <div class="col-12 products-ordered-check-right">
                    <div class="d-flex products-ordered-check-right-card align-items-center">
                        <button class="btn btn-sm products-ordered-check-right-btn">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span class="mx-2">1</span>
                        <button class="btn btn-sm products-ordered-check-right-btn">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>

                    <div class="products-ordered-check-right-price">79.000đ</div>
                </div>
            </div>
        </div>
        
        <div class="suggestions">
            <h3>SẼ NGON HƠN KHI THƯỞNG THỨC CÙNG</h3>
            <div class="suggestions-card-deck d-flex">
                <div class="suggestions-card">
                    <img alt="" class="suggestions-card-img" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/Add-3taro.jpg?v=g21eZ4" width="150"/>
                    <div class="suggestions-card-body">
                        <h5 class="suggestions-card-title">3 VIÊN KHOAI MÔN KIM SA</h5>
                        <p class="suggestions-card-price">25.000đ</p>
                        <button class="btn suggestions-card-add w-100">Thêm</button>
                    </div>
                </div>
                <div class="suggestions-card">
                    <img alt="" class="suggestions-card-img" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/Add-4Nuggest.jpg?v=g21eZ4" width="150"/>
                    <div class="suggestions-card-body">
                        <h5 class="suggestions-card-title">4 GÀ MIẾNG NUGGETS</h5>
                        <p class="suggestions-card-price">25.000đ</p>
                        <button class="btn suggestions-card-add w-100">Thêm</button>
                    </div>
                </div>
                <div class="suggestions-card">
                    <img alt="" class="suggestions-card-img" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/Add-2eggtart.jpg?v=g21eZ4" width="150"/>
                    <div class="suggestions-card-body">
                        <h5 class="suggestions-card-title">2 BÁNH TRỨNG</h5>
                        <p class="suggestions-card-price">25.000đ</p>
                        <button class="btn suggestions-card-add w-100">Thêm</button>
                    </div>
                </div>
                <div class="suggestions-card">
                    <img alt="" class="suggestions-card-img" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/Add-2cheese.jpg?v=g21eZ4" width="150"/>
                    <div class="suggestions-card-body">
                        <h5 class="suggestions-card-title">3 PHÔ-MAI VIÊN</h5>
                        <p class="suggestions-card-price">25.000đ</p>
                        <button class="btn suggestions-card-add w-100">Thêm</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary">
            <h5>1 MÓN</h5>
            <hr style="border-top: 2px solid #E5E5E5; margin-top: 0px !important; margin-bottom: 10px !important;">
            <div class="mb-3">
                <label class="summary-form form-label" for="discount-code">Bạn có Mã giảm giá?</label>
                <div class="input-group">
                    <input class="form-control" id="discount-code" placeholder="Mã giảm giá *" type="text"/>
                    <button class="btn summary-btn-apply">Áp dụng</button>
                </div>
            </div>
            <div class="d-flex justify-content-between pb-3">
                <span>Tổng đơn hàng</span>
                <span>79.000đ</span>
            </div>
            <div class="d-flex justify-content-between pb-3">
                <span>Phí giao hàng</span>
                <span>10.000đ</span>
            </div>
            <div class="d-flex justify-content-between total mt-2 fw-bold">
                <span>Tổng thanh toán</span>
                <span>89.000đ</span>
            </div>
            <hr style="border-top: 2px solid #E5E5E5; margin-top: 5px !important; margin-bottom: 5px !important;">
            <button class="btn summary-btn-checkout mt-3">Thanh toán</button>
        </div>
    </div>

    <!-- Có hàng trong giỏ -->
    <div class="container products-ordered hide-on-mobile">
        <div class="products-ordered-title">
            GIỎ HÀNG CỦA TÔI
        </div>
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="row products-ordered-check">
                    <div class="col-sm">
                        <img class="products-ordered-check-img" alt="" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/HD_B.jpg?v=g21eZ4" width="100"/>
                    </div>
                    <div class="col-sm products-ordered-check-left">
                        <div>
                            <div class="d-flex align-items-center products-ordered-check-left-title">
                                <span>Combo FB live 79K</span>
                            </div>
                            <div class="text-muted products-ordered-check-left-des">
                                KFC Popcorn (lớn) - Mì Ý Gà Viên
                            </div>
                            <div class="products-ordered-check-left-edit">
                                <a class="text-decoration-none" href="#">Chỉnh sửa</a>
                                |
                                <a class="text-decoration-none" href="#">Xóa</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm products-ordered-check-right">
                        <div>
                            <div class="products-ordered-check-right-price">79.000đ</div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-sm products-ordered-check-right-btn">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <span class="mx-2">1</span>
                                <button class="btn btn-sm products-ordered-check-right-btn">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Đề xuất thêm 4 sản phẩm -->
                <div class="suggestions">
                    <h3>SẼ NGON HƠN KHI THƯỞNG THỨC CÙNG</h3>
                    <div class="suggestions-card-deck d-flex">
                        <div class="suggestions-card">
                            <img alt="" class="suggestions-card-img" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/Add-3taro.jpg?v=g21eZ4" width="150"/>
                            <div class="suggestions-card-body">
                                <h5 class="suggestions-card-title">3 VIÊN KHOAI MÔN KIM SA</h5>
                                <p class="suggestions-card-price">25.000đ</p>
                                <button class="btn suggestions-card-add w-100">Thêm</button>
                            </div>
                        </div>
                        <div class="suggestions-card">
                            <img alt="" class="suggestions-card-img" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/Add-4Nuggest.jpg?v=g21eZ4" width="150"/>
                            <div class="suggestions-card-body">
                                <h5 class="suggestions-card-title">4 GÀ MIẾNG NUGGETS</h5>
                                <p class="suggestions-card-price">25.000đ</p>
                                <button class="btn suggestions-card-add w-100">Thêm</button>
                            </div>
                        </div>
                        <div class="suggestions-card">
                            <img alt="" class="suggestions-card-img" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/Add-2eggtart.jpg?v=g21eZ4" width="150"/>
                            <div class="suggestions-card-body">
                                <h5 class="suggestions-card-title">2 BÁNH TRỨNG</h5>
                                <p class="suggestions-card-price">25.000đ</p>
                                <button class="btn suggestions-card-add w-100">Thêm</button>
                            </div>
                        </div>
                        <div class="suggestions-card">
                            <img alt="" class="suggestions-card-img" height="100" src="https://static.kfcvietnam.com.vn/images/items/lg/Add-2cheese.jpg?v=g21eZ4" width="150"/>
                            <div class="suggestions-card-body">
                                <h5 class="suggestions-card-title">3 PHÔ-MAI VIÊN</h5>
                                <p class="suggestions-card-price">25.000đ</p>
                                <button class="btn suggestions-card-add w-100">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="summary">
                    <h5>1 MÓN</h5>
                    <hr style="border-top: 2px solid #E5E5E5; margin-top: 0px !important; margin-bottom: 10px !important;">
                    <div class="mb-3">
                        <label class="summary-form form-label" for="discount-code">Bạn có Mã giảm giá?</label>
                        <div class="input-group">
                            <input class="form-control" id="discount-code" placeholder="Mã giảm giá *" type="text"/>
                            <button class="btn summary-btn-apply">Áp dụng</button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pb-3">
                        <span>Tổng đơn hàng</span>
                        <span>79.000đ</span>
                    </div>
                    <div class="d-flex justify-content-between pb-3">
                        <span>Phí giao hàng</span>
                        <span>10.000đ</span>
                    </div>
                    <div class="d-flex justify-content-between total mt-2 fw-bold">
                        <span>Tổng thanh toán</span>
                        <span>89.000đ</span>
                    </div>
                    <hr style="border-top: 2px solid #E5E5E5; margin-top: 5px !important; margin-bottom: 5px !important;">
                    <button class="btn summary-btn-checkout mt-3">Thanh toán</button>
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
    <script src="../../Views/cart/cart.js"></script>
</body>
</html>