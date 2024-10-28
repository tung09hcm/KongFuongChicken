<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Gà Rán KFC, Giao Hàng Tận Nơi | KFC Việt Nam</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Link css header -->
    <link rel="stylesheet" href="../../Views/partials/partials.css">
    <!-- Link css homepage -->
    <link rel="stylesheet" href="../../Views/product/product.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include '../../Views/partials/header.php';
    ?>

    <!-- Main -->
    <div class="top-bar d-flex justify-content-center">
        <div class="container d-flex justify-content-center align-items-center">
        <div class="d-flex">
            <span class="icon-text">
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

    <!-- Navbar -->
    <nav class="navbar-main navbar navbar-expand-lg navbar-light bg-light" style="background-color: #FFFFFF !important;">
        <div class="container-fluid">
            <div class="navbar-collapse">
                <ul class="navbar-nav navbar-nav-main mx-auto">
                    <li class="nav-item"><a class="nav-link-main nav-link active" href="#uudai">ƯU ĐÃI</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#monmoi">MÓN MỚI</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#combo1nguoi">COMBO 1 NGƯỜI</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#combonhom">COMBO NHÓM</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#garan">GÀ RÁN - GÀ QUAY</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#burgercom">BURGER - CƠM - MÌ Ý</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#thucan">THỨC ĂN NHẸ</a></li>
                    <li class="nav-item"><a class="nav-link-main nav-link" href="#thucuong">THỨC UỐNG & TRÁNG MIỆNG</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <hr style="border-top: 2px solid #E5E5E5; margin-top: 0px !important; margin-bottom: 35px !important;">

    <!-- Main Content -->
    <div class="container mt-4 mb-3">
        <section id="uudai">
            <h3 class="mb-4 category-title">ƯU ĐÃI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- Combo Item 1 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Burger">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 2 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 3 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price">148.000đ</p>
                            <p class="description">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 4 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price">178.000đ</p>
                            <p class="description">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-4 mb-3">
        <section id="monmoi">
            <h3 class="mb-4 category-title">MÓN MỚI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Burger">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 2 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 3 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price">148.000đ</p>
                            <p class="description">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 4 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price">178.000đ</p>
                            <p class="description">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-4 mb-3">
        <section id="combo1nguoi">
            <h3 class="mb-4 category-title">COMBO 1 NGƯỜI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Burger">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 2 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 3 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price">148.000đ</p>
                            <p class="description">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 4 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price">178.000đ</p>
                            <p class="description">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-4 mb-3">
        <section id="combonhom">
            <h3 class="mb-4 category-title">COMBO NHÓM</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Burger">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 2 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 3 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price">148.000đ</p>
                            <p class="description">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 4 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price">178.000đ</p>
                            <p class="description">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-4 mb-3">
        <section id="garan">
            <h3 class="mb-4 category-title">GÀ RÁN - GÀ QUAY</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Burger">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 2 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 3 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price">148.000đ</p>
                            <p class="description">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 4 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price">178.000đ</p>
                            <p class="description">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-4 mb-3">
        <section id="burgercom">
            <h3 class="mb-4 category-title">BURGER - CƠM - MÌ Ý</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Burger">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 2 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 3 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price">148.000đ</p>
                            <p class="description">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 4 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price">178.000đ</p>
                            <p class="description">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-4 mb-3">
        <section id="thucan">
            <h3 class="mb-4 category-title">THỨC ĂN NHẸ</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Burger">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 2 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 3 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price">148.000đ</p>
                            <p class="description">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 4 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price">178.000đ</p>
                            <p class="description">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container mt-4" style="margin-bottom: 50px;">
        <section id="thucuong">
            <h3 class="mb-4 category-title">THỨC UỐNG & TRÁNG MIỆNG</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <!-- Combo Item 1 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Burger">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Burger</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Miếng gà rán + 1 Burger tôm + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 2 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Cơm Gà Rán">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Cơm Gà Rán</h5>
                            <p class="price">78.000đ</p>
                            <p class="description">1 Cơm gà rán + 3 Gà rán tenders vị nguyên bản + 1 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 3 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm</h5>
                            <p class="price">148.000đ</p>
                            <p class="description">3 Miếng gà rán + 1 Gà viên Popcorn (Vừa) + 1 Khoai tây múi cau (Vừa) + 2 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
                </div>

                <!-- Combo Item 4 -->
                <div class="col">
                    <div class="card">
                        <img src="https://static.kfcvietnam.com.vn/images/items/lg/D-CBO-CHICKEN-2.jpg?v=gqGP8L" class="card-img" alt="Combo Tối Nhóm 178K">
                        <div class="card-body">
                            <h5 class="product-title">Combo Tối Nhóm 178K</h5>
                            <p class="price">178.000đ</p>
                            <p class="description">4 Miếng gà rán + 1 Mì Ý gà viên + 3 Pepsi (Lớn)</p>
                            <button class="btn btn-add w-100">Thêm</button>
                        </div>
                    </div>
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
    <script src="../../Views/product/product.js"></script>
</body>
</html>