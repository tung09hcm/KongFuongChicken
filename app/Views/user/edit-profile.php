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
    <!-- Link css user -->
    <link rel="stylesheet" href="app/Views/user/user.css">
    <link rel="stylesheet" href="app/Views/user/user_responsive.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <!-- Header -->
    <?php 
        include 'app/Views/partials/header.php';
    ?>

    <div class="container hide-on-tablet-desktop">
        <div class="row user-info">
            <div class="col user-edit-sidebar text-center">
                <div class="row user-edit-sidebar-info">
                    <div class="col user-edit-sidebar-info-avt">
                        <img src="https://tmssl.akamaized.net//images/foto/galerie/cristiano-ronaldo-im-trikot-von-portugal-1718197560-139337.jpg?lm=1718197575" alt="Profile" class="rounded-circle mb-3 user-edit-img">
                    </div>
                    <div class="col user-edit-sidebar-info-name">
                        <h3>Xin chào</h3>
                        <a class="user-edit-logout" href="#">Đăng xuất</a>
                    </div>
                </div>
                <nav class="user-select mt-4">
                    <a class="user-edit-item" href="index.php?controller=user&action=previousOrders">Đơn hàng đã đặt</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=Addresses">Địa chỉ của bạn</a>
                    <a class="user-edit-item active" href="index.php?controller=user&action=Profile">Chi tiết tài khoản</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=resetPassword">Đặt lại mật khẩu</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=delete">Xóa tài khoản</a>
                </nav>
            </div>
        </div>
        <div class="row user-edit">
            <div class="form-container">
                <h2 class="form-title ">CHI TIẾT TÀI KHOẢN</h2>
                <form action="" method="POST" name="updateAccount1" id="updateAccount1">
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Họ của bạn *</label>
                        <input type="text" class="form-control" id="last_Name">
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Tên của bạn *</label>
                        <input type="text" class="form-control" id="first_Name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại *</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ email của bạn *</label>
                        <input type="email" class="form-control" id="email" readonly>
                    </div>
                    <button id="updateAccountBtn" type="submit" class="submit-btn mt-3">Cập nhật tài khoản</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main -->
    <div class="container my-5 hide-on-mobile">
        <div class="row user-edit">
            <div class="col-md-4">
                <div class="user-edit-sidebar text-center">
                    <img src="https://tmssl.akamaized.net//images/foto/galerie/cristiano-ronaldo-im-trikot-von-portugal-1718197560-139337.jpg?lm=1718197575" alt="Profile" class="rounded-circle mb-3 user-edit-img">
                    <h3>Xin chào</h3>
                    <a class="user-edit-logout" href="#">Đăng xuất</a>
                    <nav class="nav flex-column mt-4">
                        <a class="user-edit-item" href="index.php?controller=user&action=previousOrders">Đơn hàng đã đặt</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=Addresses">Địa chỉ của bạn</a>
                        <a class="user-edit-item active" href="index.php?controller=user&action=Profile">Chi tiết tài khoản</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=resetPassword">Đặt lại mật khẩu</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=delete">Xóa tài khoản</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-title ">CHI TIẾT TÀI KHOẢN</h2>
                    <form action="" method="POST" name="updateAccount2" id="updateAccount2">
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Họ của bạn *</label>
                            <input type="text" class="form-control" id="last_Name">
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Tên của bạn *</label>
                            <input type="text" class="form-control" id="first_Name">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại *</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Địa chỉ email của bạn *</label>
                            <input type="email" class="form-control" id="email" readonly>
                        </div>
                        <button id="updateAccountBtn" type="submit" class="submit-btn mt-3">Cập nhật tài khoản</button>
                    </form>
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
    <script src="app/Views/user/user.js"></script>
    <script>
        fetch('index.php?controller=user&action=getProfile')
        .then(response => response.json())
        .then(data => {
            document.querySelectorAll('#last_Name').forEach(element => {
                element.value = data.user.last_name;
            });
            document.querySelectorAll('#first_Name').forEach(element => {
                element.value = data.user.first_name;
            });
            document.querySelectorAll('#phone').forEach(element => {
                element.value = data.user.phone;
            });
            document.querySelectorAll('#email').forEach(element => {
                element.value = data.user.email;
            });
        });

        document.querySelector('#updateAccount1').addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn hành động gửi form mặc định

            // Lấy giá trị hiện tại của các trường
            const lastName = document.querySelector('#updateAccount1 #last_Name').value.trim();
            const firstName = document.querySelector('#updateAccount1 #first_Name').value.trim();
            const phone = document.querySelector('#updateAccount1 #phone').value.trim();
            const email = document.querySelector('#updateAccount1 #email').value.trim(); // email là readonly

            // Kiểm tra dữ liệu
            if (lastName === '' || firstName === '' || phone === '') {
                alert('Vui lòng nhập đầy đủ thông tin');
                return;
            }

            send(lastName, firstName, phone, email);
        });

        document.querySelector('#updateAccount2').addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn hành động gửi form mặc định

            // Lấy giá trị hiện tại của các trường
            const lastName = document.querySelector('#updateAccount2 #last_Name').value.trim();
            const firstName = document.querySelector('#updateAccount2 #first_Name').value.trim();
            const phone = document.querySelector('#updateAccount2 #phone').value.trim();
            const email = document.querySelector('#updateAccount2 #email').value.trim(); // email là readonly

            // Kiểm tra dữ liệu
            if (lastName === '' || firstName === '' || phone === '') {
                alert('Vui lòng nhập đầy đủ thông tin');
                return;
            }

            send(lastName, firstName, phone, email);
        });

        function send(lastName, firstName, phone, email) {
            // Đóng gói dữ liệu
            const formData = new FormData();
            formData.append('last_name', lastName);
            formData.append('first_name', firstName);
            formData.append('phone', phone);
            formData.append('email', email);

            // Gửi dữ liệu qua fetch
            fetch('index.php?controller=user&action=editAccount', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Cập nhật tài khoản thành công!');
                } else {
                    alert('Cập nhật thất bại: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Lỗi khi cập nhật tài khoản:', error);
                alert('Có lỗi xảy ra, vui lòng thử lại.');
            });
        }

    </script>
</body>
</html>