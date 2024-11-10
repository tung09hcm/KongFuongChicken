<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="../../Views/partials/partials.css">
    <!-- link fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <footer class="footer-mobile hide-on-tablet-desktop">
        <div class="container">
            <div class="footer-mobile-accordion" id="footerAccordion">
                <!-- Menu Section -->
                <div class="footer-mobile-accordion-accordion-item">
                    <h2 class="footer-mobile-accordion-header" id="headingMenu">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMenu" aria-expanded="false" aria-controls="collapseMenu">
                            <span class="footer-mobile-title">Danh Mục Món Ăn</span>
                            <i class="footer-mobile-icon fa-solid fa-chevron-down"></i>
                        </button>
                    </h2>
                    <div id="collapseMenu" class="accordion-collapse collapse" aria-labelledby="headingMenu" data-bs-parent="#footerAccordion">
                        <div class="accordion-body">
                            <ul class="footer-mobile-list">
                                <a href="../../Views/product/index.php#monmoi" class="footer-mobile-list-item">Món Mới</a>
                                <a href="../../Views/product/index.php#combo1nguoi" class="footer-mobile-list-item">Combo 1 Người</a>
                                <a href="../../Views/product/index.php#combonhom" class="footer-mobile-list-item">Combo Nhóm</a>
                                <a href="../../Views/product/index.php#garan" class="footer-mobile-list-item">Gà Rán - Gà Quay</a>
                                <a href="../../Views/product/index.php#burgercom" class="footer-mobile-list-item">Burger - Cơm - Mì Ý</a>
                                <a href="../../Views/product/index.php#thucan" class="footer-mobile-list-item">Thức Ăn Nhẹ</a>
                                <a href="../../Views/product/index.php#thucuong" class="footer-mobile-list-item">Thức Uống & Tráng Miệng</a>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr style="margin: 3px 0 !important;">

                <!-- About Section -->
                <div class="footer-mobile-accordion-accordion-item">
                    <h2 class="footer-mobile-accordion-header" id="headingAbout">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAbout" aria-expanded="false" aria-controls="collapseAbout">
                            <span class="footer-mobile-title">Về KFC</span>
                            <i class="footer-mobile-icon fa-solid fa-chevron-down"></i>
                        </button>
                    </h2>
                    <div id="collapseAbout" class="accordion-collapse collapse" aria-labelledby="headingAbout" data-bs-parent="#footerAccordion">
                        <div class="accordion-body">
                            <ul class="footer-mobile-list">
                                <li class="footer-mobile-list-item">Câu chuyện của chúng tôi</li>
                                <li class="footer-mobile-list-item">Tin khuyến mãi</li>
                                <li class="footer-mobile-list-item">Tin tức KFC</li>
                                <li class="footer-mobile-list-item">Tuyển dụng</li>
                                <li class="footer-mobile-list-item">Đặt tiệc sinh nhật</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr style="margin: 3px 0 !important;">

                <!-- Contact Section -->
                <div class="footer-mobile-accordion-accordion-item">
                    <h2 class="footer-mobile-accordion-header" id="headingContact">
                        <button class="footer-mobile-button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContact" aria-expanded="false" aria-controls="collapseContact">
                            <span class="footer-mobile-title">Liên hệ KFC</span>
                            <i class="footer-mobile-icon fa-solid fa-chevron-down"></i>
                        </button>
                    </h2>
                    <div id="collapseContact" class="accordion-collapse collapse" aria-labelledby="headingContact" data-bs-parent="#footerAccordion">
                        <div class="accordion-body">
                            <ul class="footer-mobile-list">
                                <li class="footer-mobile-list-item">Theo dõi đơn hàng</li>
                                <li class="footer-mobile-list-item">Hệ thống nhà hàng</li>
                                <li class="footer-mobile-list-item">Liên hệ KFC</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr style="margin: 3px 0 !important;">

                <!-- Policy Section -->
                <div class="footer-mobile-accordion-accordion-item">
                    <h2 class="footer-mobile-accordion-header" id="headingPolicy">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePolicy" aria-expanded="false" aria-controls="collapsePolicy">
                            <span class="footer-mobile-title">Chính sách</span>
                            <i class="footer-mobile-icon fa-solid fa-chevron-down"></i>
                        </button>
                    </h2>
                    <div id="collapsePolicy" class="accordion-collapse collapse" aria-labelledby="headingPolicy" data-bs-parent="#footerAccordion">
                        <div class="accordion-body">
                            <ul class="footer-mobile-list">
                                <li class="footer-mobile-list-item">Chính sách hoạt động</li>
                                <li class="footer-mobile-list-item">Chính sách và quy định</li>
                                <li class="footer-mobile-list-item">Chính sách bảo mật thông tin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="margin: 3px 0 !important;">

            <!-- App Download Section -->
            <div class="footer-mobile-app mt-3">
                <p class="footer-mobile-app-title">Download App</p>
                <div class="footer-mobile-down-app">
                    <img class="footer-mobile-down-app-img" src="https://static.kfcvietnam.com.vn/images/web/logo_appstore.png" alt="App Store">
                    <img class="footer-mobile-down-app-img" src="https://static.kfcvietnam.com.vn/images/web/logo_playstore.png" alt="Google Play">
                </div>
            </div>
        </div>

        <div class="footer-mobile-social-icons">
            <a href="https://www.facebook.com/KFCVietnam/"><i class="footer-mobile-icon fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/kfc_vietnam/"><i class="footer-mobile-icon fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/user/KFCVietnam2011"><i class="footer-mobile-icon fab fa-youtube"></i></a>
            <a href="https://twitter.com/kfc_vietnam"><i class="footer-mobile-icon fab fa-twitter"></i></a>
        </div>

        <hr style="margin: 15px 0 !important;">

        <p class="footer-mobile-copyright">Copyright © 2023 KFC Vietnam</p>

        <hr style="margin: 3px 0 !important;">

        <!-- Company Info and Social Media -->
        <div class="text-center">
            <div class="footer-mobile-company-info">
                <p class="footer-mobile-company-info-title">CÔNG TY LIÊN DOANH TNHH KFC VIỆT NAM</p>
                <p>Số 292 Bà Triệu, P. Lê Đại Hành, Q. Hai Bà Trưng, TP. Hà Nội.</p>
                <p>Điện thoại: (028) 38489828 | Email: lienhe@kfcvietnam.com.vn</p>
                <p>Mã số thuế: 0100773885</p>
                <p>Ngày cấp: 29/10/1998 - Nơi cấp: Cục Thuế Thành Phố Hà Nội</p>
            </div>
        </div>
    </footer>

    <footer class="footer text-center text-md-start hide-on-mobile">
        <div class="container">
            <div class="row">
                <!-- Menu Category -->
                <div class="col mb-4">
                    <h6>Danh Mục Món Ăn</h6>
                    <p><a href="#">Món Mới</a></p>
                    <p><a href="#">Combo 1 Người</a></p>
                    <p><a href="#">Combo Nhóm</a></p>
                    <p><a href="#">Gà Rán - Gà Quay</a></p>
                    <p><a href="#">Burger - Cơm - Mì Ý</a></p>
                    <p><a href="#">Thức Ăn Nhẹ</a></p>
                    <p><a href="#">Thức Uống & Tráng Miệng</a></p>
                </div>

                <!-- About KFC -->
                <div class="col mb-4">
                    <h6>Về KFC</h6>
                    <p><a href="#">Câu Chuyện Của Chúng Tôi</a></p>
                    <p><a href="#">Tin Khuyến Mãi</a></p>
                    <p><a href="#">Tin tức KFC</a></p>
                    <p><a href="#">Tuyển dụng</a></p>
                    <p><a href="#">Đặt tiệc Sinh nhật</a></p>
                </div>

                <!-- Contact KFC -->
                <div class="col mb-4">
                    <h6>Liên hệ KFC</h6>
                    <p><a href="#">Theo dõi đơn hàng</a></p>
                    <p><a href="#">Hệ Thống Nhà Hàng</a></p>
                    <p><a href="#">Liên hệ KFC</a></p>
                </div>

                <!-- Policies -->
                <div class="col mb-4">
                    <h6>Chính sách</h6>
                    <p><a href="#">Chính sách hoạt động</a></p>
                    <p><a href="#">Chính sách và quy định</a></p>
                    <p><a href="#">Chính sách bảo mật thông tin</a></p>
                </div>

                <!-- Download App -->
                <div class="col mb-4">
                    <h6>Download App</h6>
                    <div class="app-badges">
                        <img src="https://static.kfcvietnam.com.vn/images/web/logo_appstore.png" alt="Google Play">
                        <img src="https://static.kfcvietnam.com.vn/images/web/logo_playstore.png" alt="App Store">
                    </div>
                </div>
            </div>

            <!-- Social Media Icons -->
            <div class="social-icons">
                <a href="https://www.facebook.com/KFCVietnam/"><i class="footer-icon fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/kfc_vietnam/"><i class="footer-icon fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/user/KFCVietnam2011"><i class="footer-icon fab fa-youtube"></i></a>
                <a href="https://twitter.com/kfc_vietnam"><i class="footer-icon fab fa-twitter"></i></a>
            </div>

            <p class="footer-copyright">Copyright © 2023 KFC Vietnam</p>

            <hr style="border-top: 2px solid #E5E5E5; max-width: 100%;">

            <!-- Company Info and Social Media -->
            <div class="text-center">
                <div class="company-info">
                    <p class="company-info-title">CÔNG TY LIÊN DOANH TNHH KFC VIỆT NAM</p>
                    <p>Số 292 Bà Triệu, P. Lê Đại Hành, Q. Hai Bà Trưng, TP. Hà Nội.</p>
                    <p>Điện thoại: (028) 38489828 | Email: lienhe@kfcvietnam.com.vn</p>
                    <p>Mã số thuế: 0100773885</p>
                    <p>Ngày cấp: 29/10/1998 - Nơi cấp: Cục Thuế Thành Phố Hà Nội</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../../Views/partials/partials.js"></script>
</body>
</html>