<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Gà Rán KFC, Giao Hàng Tận Nơi | KFC Việt Nam</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link css header -->
    <link rel="stylesheet" href="../../Views/partials/partials.css">
    <link rel="stylesheet" href="../../Views/partials/partials_responsive.css">
    <!-- Link css homepage -->
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

    <!-- Navbar on mobile -->
    <div class="container navbar-product hide-on-tablet-desktop">
        <div class="nav-wrapper">
            <nav class="nav">
                <a class="nav-link active" href="#uudai">ƯU ĐÃI</a>
                <a class="nav-link" href="#monmoi">MÓN MỚI</a>
                <a class="nav-link" href="#combo1nguoi">COMBO 1 NGƯỜI</a>
                <a class="nav-link" href="#combonhom">COMBO NHÓM</a>
                <a class="nav-link" href="#garan">GÀ RÁN - GÀ QUAY</a>
                <a class="nav-link" href="#burgercom">BURGER - CƠM - MÌ Ý</a>
                <a class="nav-link" href="#thucan">THỨC ĂN NHẸ</a>
                <a class="nav-link" href="#thucuong">THỨC UỐNG & TRÁNG MIỆNG</a>
            </nav>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar-product navbar navbar-expand-lg navbar-light bg-light hide-on-mobile" style="background-color: #FFFFFF !important;">
        <div class="container-fluid navbar-product-main">
            <div class="navbar-collapse">
                <ul class="navbar-nav navbar-nav-main mx-auto">
                    <li class="nav-item"><a class="nav-link-main nav-link active" href="#uudai">ƯU ĐÃI</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#monmoi">MÓN MỚI</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#combo1nguoi">COMBO 1 NGƯỜI</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#combonhom">COMBO NHÓM</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#garan">GÀ RÁN - GÀ QUAY</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#burgercom">BURGER - CƠM - MÌ Ý</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#thucan">THỨC ĂN NHẸ</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#thucuong">THỨC UỐNG &amp; TRÁNG MIỆNG</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <hr style="border-top: 2px solid #E5E5E5; margin-top: 0px !important; margin-bottom: 15px !important;">

    <!-- Main Content On Mobile -->
    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="uudai">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-2">
                    ƯU ĐÃI
                </h3>
            </div>

            <div class="container-product-row pt-2">
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
                
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="monmoi">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-2">
                    MÓN MỚI
                </h3>
            </div>

            <div class="container-product-row pt-2">
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
                
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="combo1nguoi">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    COMBO 1 NGƯỜI
                </h3>
            </div>

            <div class="container-product-row pt-2">
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
                
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="combonhom">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    COMBO NHÓM
                </h3>
            </div>

            <div class="container-product-row pt-2">
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
                
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="garan">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    GÀ RÁN - GÀ QUAY
                </h3>
            </div>

            <div class="container-product-row pt-2">
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
                
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="burgercom">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    BURGER - CƠM - MÌ Ý
                </h3>
            </div>

            <div class="container-product-row pt-2">
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
                
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="thucan">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    THỨC ĂN NHẸ
                </h3>
            </div>

            <div class="container-product-row pt-2">
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
                
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="thucuong">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    THỨC UỐNG &amp; TRÁNG MIỆNG
                </h3>
            </div>

            <div class="container-product-row pt-2">
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
                
                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 1 -->
                <div class="container-product-col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-recommend-img card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <!-- Main Content-->
    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="uudai">
            <h3 class="mb-4 category-product-title">ƯU ĐÃI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- Combo Item 1 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 2 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 3 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price-product">148.000đ</p>
                            <p class="description-product">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 4 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price-product">178.000đ</p>
                            <p class="description-product">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="monmoi">
            <h3 class="mb-4 category-product-title">MÓN MỚI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 2 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 3 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price-product">148.000đ</p>
                            <p class="description-product">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 4 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price-product">178.000đ</p>
                            <p class="description-product">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="combo1nguoi">
            <h3 class="mb-4 category-product-title">COMBO 1 NGƯỜI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 2 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 3 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price-product">148.000đ</p>
                            <p class="description-product">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 4 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price-product">178.000đ</p>
                            <p class="description-product">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="combonhom">
            <h3 class="mb-4 category-product-title">COMBO NHÓM</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 2 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 3 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price-product">148.000đ</p>
                            <p class="description-product">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 4 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price-product">178.000đ</p>
                            <p class="description-product">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="garan">
            <h3 class="mb-4 category-product-title">GÀ RÁN - GÀ QUAY</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 2 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 3 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price-product">148.000đ</p>
                            <p class="description-product">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 4 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price-product">178.000đ</p>
                            <p class="description-product">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="burgercom">
            <h3 class="mb-4 category-product-title">BURGER - CƠM - MÌ Ý</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 2 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 3 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price-product">148.000đ</p>
                            <p class="description-product">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 4 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price-product">178.000đ</p>
                            <p class="description-product">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="thucan">
            <h3 class="mb-4 category-product-title">THỨC ĂN NHẸ</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 2 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 3 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price-product">148.000đ</p>
                            <p class="description-product">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 4 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price-product">178.000đ</p>
                            <p class="description-product">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="container container-product mt-4 hide-on-mobile" style="margin-bottom: 50px;">
        <section id="thucuong">
            <h3 class="mb-4 category-product-title">THỨC UỐNG & TRÁNG MIỆNG</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Burger">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 2 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price-product">78.000đ</p>
                            <p class="description-product">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 3 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price-product">148.000đ</p>
                            <p class="description-product">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>

                <!-- Combo Item 4 -->
                <div class="col container-product-col">
                    <a href="../../Views/product/detail.php" class="card card-product">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-product-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-product-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price-product">178.000đ</p>
                            <p class="description-product">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-product-add w-100">Thêm</button>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php 
        include '../../Views/partials/footer.php';
    ?>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../Views/product/product.js"></script>
</body>
</html>