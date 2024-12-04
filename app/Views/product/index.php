<?php
    // require_once __DIR__ . '/../../Controllers/ProductController.php';

    // use App\Controllers\ProductController;

    // // Tạo instance ProductController và lấy danh sách sản phẩm
    // $productController = new ProductController();

    // // Lấy danh sách sản phẩm theo từng mục
    // // Sản phẩm ưu đãi
    // $promotionProducts = json_decode($productController->listPromotionProducts(), true)['products'];
    // // Sản phẩm mới
    // $newProducts = json_decode($productController->listNewProducts(), true)['products'];
    // // Sản phẩm combo 1
    // $combo1Products = json_decode($productController->listCombo1Products(), true)['products'];
    // // Sản phẩm combo nhóm
    // $comboGroupProducts = json_decode($productController->listComboGroupProducts(), true)['products'];
    // // Sản phẩm gà rán - gà quay
    // $chickenProducts = json_decode($productController->listChickenProducts(), true)['products'];
    // // Sản phẩm burger - cơm - mì ý
    // $mainDishProducts = json_decode($productController->listMainDishProducts(), true)['products'];
    // // Sản phẩm snack
    // $snackProducts = json_decode($productController->listSnackProducts(), true)['products'];
    // // Sản phẩm thức uống tráng miệng
    // $drinkDessertProducts = json_decode($productController->listDrinkDessertProducts(), true)['products'];

    
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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link css header -->
    <link rel="stylesheet" href="app/Views/partials/partials.css">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css">
    <!-- Link css homepage -->
    <link rel="stylesheet" href="app/Views/product/product.css">
    <link rel="stylesheet" href="app/Views/product/product_responsive.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include 'app/Views/partials/header.php'; 
    ?>

    <script>
        const section = "<?php echo $section; ?>"; // Lấy giá trị section từ PHP
        if (section) {
            const target = document.getElementById(section);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' }); // Cuộn đến phần tử
            }
        }

        function renderProducts(products, sectionId) {
            // Tìm section theo ID
            const sections = document.querySelectorAll(sectionId);

            if (!section) {
                console.error(`Không tìm thấy section với class: ${sectionId}`);
                return;
            }

            // Tạo chuỗi HTML cho tất cả sản phẩm
            let productHTML = '';

            products.forEach(product => {
                productHTML += `
                    <div class="col container-product-col">
                        <a href="index.php?controller=user&action=ProductDetail&id=${product.id}" class="card card-product">
                            <img src="${product.image_link}" class="card-product-img" alt="${product.name}">
                            <div class="card-product-body">
                                <h5 class="product-title">${product.name}</h5>
                                <p class="price-product">${new Intl.NumberFormat('vi-VN').format(Math.floor(product.price))}đ</p>
                                <p class="description-product">${product.description}</p>
                                <button class="btn btn-product-add w-100" id="${product.id}">Thêm</button>
                            </div>
                        </a>
                    </div>
                `;
            });


            // Lặp qua từng section và xử lý
            sections.forEach((section) => {
                // Tìm container bên trong section
                const productContainerMobile = section.querySelector('.container-product-row.pt-2');
                const productContainer = section.querySelector('.row.row-cols-1.row-cols-md-4.g-4');

                if (productContainerMobile) {
                    productContainerMobile.innerHTML += productHTML;
                }

                if (productContainer) {
                    productContainer.innerHTML += productHTML;
                }
            });
        }


        fetch('index.php?controller=product&action=listPromotionProducts')
        .then(response => response.json())
        .then(data => renderProducts(data.products, '#uudai'));

        fetch('index.php?controller=product&action=listNewProducts')
        .then(response => response.json())
        .then(data => renderProducts(data.products, '#monmoi'));
        
        fetch('index.php?controller=product&action=listCombo1Products')
        .then(response => response.json())
        .then(data => renderProducts(data.products, '#combo1nguoi'));

        fetch('index.php?controller=product&action=listComboGroupProducts')
        .then(response => response.json())
        .then(data => renderProducts(data.products, '#combonhom'));

        fetch('index.php?controller=product&action=listChickenProducts')
        .then(response => response.json())
        .then(data => renderProducts(data.products, '#garan'));

        fetch('index.php?controller=product&action=listMainDishProducts')
        .then(response => response.json())
        .then(data => renderProducts(data.products, '#burgercom'));

        fetch('index.php?controller=product&action=listSnackProducts')
        .then(response => response.json())
        .then(data => renderProducts(data.products, '#thucan'));

        fetch('index.php?controller=product&action=listDrinkDessertProducts')
        .then(response => response.json())
        .then(data => renderProducts(data.products, '#thucuong'));
    </script>

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
        <section id="uudai" class="uudai">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-2">
                    ƯU ĐÃI
                </h3>
            </div>

            <div class="container-product-row pt-2"></div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="monmoi" class="monmoi">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-2">
                    MÓN MỚI
                </h3>
            </div>

            <div class="container-product-row pt-2"></div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="combo1nguoi" class="combo1nguoi">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    COMBO 1 NGƯỜI
                </h3>
            </div>

            <div class="container-product-row pt-2"></div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="combonhom" class="combonhom">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    COMBO NHÓM
                </h3>
            </div>
            <div class="container-product-row pt-2"></div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="garan" class="garan">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    GÀ RÁN - GÀ QUAY
                </h3>
            </div>

            <div class="container-product-row pt-2"></div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="burgercom" class="burgercom">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    BURGER - CƠM - MÌ Ý
                </h3>
            </div>

            <div class="container-product-row pt-2"></div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="thucan" class="thucan">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    THỨC ĂN NHẸ
                </h3>
            </div>

            <div class="container-product-row pt-2"></div>
        </section>
    </div>

    <div class="container container-product mt-2 mb-3 hide-on-tablet-desktop">
        <section id="thucuong" class="thucuong">
            <div class="container-product-header">
                <h3 class="category-product-title mt-2 mb-4">
                    THỨC UỐNG &amp; TRÁNG MIỆNG
                </h3>
            </div>

            <div class="container-product-row pt-2"></div>
        </section>
    </div>

    <!-- Main Content-->
    <!-- Ưu đãi -->
    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="uudai" class="uudai">
            <h3 class="mb-4 category-product-title">ƯU ĐÃI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4"></div>
        </section>
    </div>
    
    <!-- Món mới -->
    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="monmoi" class="monmoi">
            <h3 class="mb-4 category-product-title">MÓN MỚI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4"></div>
        </section>
    </div>

    <!-- Combo 1 người -->
    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="combo1nguoi" class="combo1nguoi">
            <h3 class="mb-4 category-product-title">COMBO 1 NGƯỜI</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4"></div>
        </section>
    </div>

    <!-- Combo nhóm -->
    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="combonhom" class="combonhom">
            <h3 class="mb-4 category-product-title">COMBO NHÓM</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4"></div>
        </section>
    </div>

    <!-- Gà rán - gà quay -->
    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="garan" class="garan">
            <h3 class="mb-4 category-product-title">GÀ RÁN - GÀ QUAY</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4"></div>
        </section>
    </div>

    <!-- BURGER - CƠM - MÌ Ý -->
    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="burgercom" class="burgercom">
            <h3 class="mb-4 category-product-title">BURGER - CƠM - MÌ Ý</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4"></div>
        </section>
    </div>

    <!-- THỨC ĂN NHẸ -->
    <div class="container container-product mt-4 mb-3 hide-on-mobile">
        <section id="thucan" class="thucan">
            <h3 class="mb-4 category-product-title">THỨC ĂN NHẸ</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4"></div>
        </section>
    </div>

    <!-- THỨC UỐNG & TRÁNG MIỆNG -->
    <div class="container container-product mt-4 hide-on-mobile" style="margin-bottom: 50px;">
        <section id="thucuong" class="thucuong">
            <h3 class="mb-4 category-product-title">THỨC UỐNG & TRÁNG MIỆNG</h3>
            <div class="row row-cols-1 row-cols-md-4 g-4"></div>
        </section>
    </div>

    <!-- Footer -->
    <?php 
        include 'app/Views/partials/footer.php';
    ?>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app/Views/product/product.js"></script>
</body>
</html>