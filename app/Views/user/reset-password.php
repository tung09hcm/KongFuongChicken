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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include 'app/Views/partials/header.php';
    ?>

    <!-- Reset password on mobile -->
    <div class="container hide-on-tablet-desktop">
        <div class="row user-info">
            <div class="col user-edit-sidebar text-center">
                <div class="row user-edit-sidebar-info">
                    <div class="col user-edit-sidebar-info-avt">
                        <img src="https://tmssl.akamaized.net//images/foto/galerie/cristiano-ronaldo-im-trikot-von-portugal-1718197560-139337.jpg?lm=1718197575" alt="Profile" class="rounded-circle mb-3 user-edit-img">
                    </div>
                    <div class="col user-edit-sidebar-info-name">
                        <h3>Xin chào</h3>
                        <a class="user-edit-logout" href="index.php?controller=auth&action=logout">Đăng xuất</a>
                    </div>
                </div>
                <nav class="user-select mt-4">
                    <a class="user-edit-item" href="index.php?controller=user&action=previousOrders">Đơn hàng đã đặt</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=Addresses">Địa chỉ của bạn</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=Profile">Chi tiết tài khoản</a>
                    <a class="user-edit-item active" href="index.php?controller=user&action=resetPassword">Đặt lại mật khẩu</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=delete">Xóa tài khoản</a>
                </nav>
            </div>
        </div>
        <div class="row">
        <div class="form-container">
                <h2 class="form-title" style="margin-top: 10px;">ĐẶT LẠI MẬT KHẨU</h2>
                <form id="reset-password-mobile">
                    <div class="mb-3">
                        <label class="form-label" for="current-password-mobile">Mật khẩu hiện tại *</label>
                        <input class="form-control" id="current-password-mobile" required type="password" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="new-password-mobile">Mật khẩu *</label>
                        <input class="form-control" id="new-password-mobile" required type="password" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="confirm-password-mobile">Xác nhận mật khẩu *</label>
                        <input class="form-control" id="confirm-password-mobile" required type="password" />
                    </div>
                    <button type="submit" class="submit-btn mt-3">Đổi mật khẩu</button>
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
                    <a class="user-edit-logout" href="index.php?controller=auth&action=logout">Đăng xuất</a>
                    <nav class="nav flex-column mt-4">
                        <a class="user-edit-item" href="index.php?controller=user&action=previousOrders">Đơn hàng đã đặt</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=Addresses">Địa chỉ của bạn</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=Profile">Chi tiết tài khoản</a>
                        <a class="user-edit-item active" href="index.php?controller=user&action=resetPassword">Đặt lại mật khẩu</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=delete">Xóa tài khoản</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-title ">ĐẶT LẠI MẬT KHẨU</h2>
                    <form id="reset-password-desktop">
                        <div class="mb-3">
                            <label class="form-label" for="current-password-desktop">Mật khẩu hiện tại *</label>
                            <input class="form-control" id="current-password-desktop" required type="password" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="new-password-desktop">Mật khẩu *</label>
                            <input class="form-control" id="new-password-desktop" required type="password" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="confirm-password-desktop">Xác nhận mật khẩu *</label>
                            <input class="form-control" id="confirm-password-desktop" required type="password" />
                        </div>
                        <button type="submit" class="submit-btn mt-3">Đổi mật khẩu</button>
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
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Xử lý form mobile
            const mobileForm = document.getElementById("reset-password-mobile");
            const desktopForm = document.getElementById("reset-password-desktop");

            // Hàm xử lý gửi form
            const handleSubmit = (event, formType) => {
                event.preventDefault();

                // Lấy giá trị từ form
                const currentPassword = document.getElementById(`current-password-${formType}`).value.trim();
                const newPassword = document.getElementById(`new-password-${formType}`).value.trim();
                const confirmPassword = document.getElementById(`confirm-password-${formType}`).value.trim();

                // Kiểm tra đầu vào
                if (!currentPassword || !newPassword || !confirmPassword) {
                    alert("Vui lòng điền đầy đủ các trường!");
                    return;
                }

                if (newPassword !== confirmPassword) {
                    alert("Mật khẩu mới và xác nhận mật khẩu không khớp!");
                    return;
                }

                // Gửi dữ liệu
                const formData = new FormData();
                formData.append("current_password", currentPassword);
                formData.append("new_password", newPassword);

                fetch("index.php?controller=user&action=changePassword", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Đổi mật khẩu thành công!");
                        //location.reload();
                    } else {
                        alert(`Lỗi: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error("Lỗi khi gửi form:", error);
                    alert("Có lỗi xảy ra, vui lòng thử lại.");
                });
            };

            // Gắn sự kiện submit cho từng form
            mobileForm.addEventListener("submit", (event) => handleSubmit(event, "mobile"));
            desktopForm.addEventListener("submit", (event) => handleSubmit(event, "desktop"));
        });

    </script>
</body>
</html>