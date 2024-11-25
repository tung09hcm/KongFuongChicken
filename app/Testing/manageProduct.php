<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
</head>
<body>

    <h2>Thêm Sản Phẩm Mới</h2>

    <form action="index.php?controller=admin&action=addProduct" method="POST" method="POST">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Giá sản phẩm:</label>
        <input type="number" id="price" name="price" required><br><br>

        <label for="description">Mô tả sản phẩm:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="image">Hình ảnh sản phẩm:</label>
        <input type="text"  id="image" name="image_link" required><br><br>

        <button type="submit">Thêm sản phẩm</button>
    </form>
    <hr>
    <form action="index.php?controller=auth&action=logout" method="POST">
        <button type="submit">Logout</button>
    </form>
    <hr>
    <form action="index.php?controller=admin&action=deleteProduct" method="POST">
        <input type="text" id="id" name="id" required><br><br>
        <button type="submit">Delete_product</button>
    </form>
    <hr>
    <a href="index.php?controller=admin&action=dashboard">Watch this admin permission</a>
    <br>
    <a href="index.php?controller=admin&action=manageUsers">Watch all users</a>
    <hr>
    <form action="index.php?controller=admin&action=editUser" method="POST">
        <input type="text" id="address" name="address" placeholder="Nhập địa chỉ">
        <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại">
        <button type="submit">Edit User</button>
    </form>
    <hr>
    <a href="index.php?controller=admin&action=deleteUser">Delete users</a>
    <hr>
    <a href="index.php?controller=admin&action=manageReviews">Watch all reviews</a>
    <hr>
    <form id="reply-form" action="index.php?controller=admin&action=handleReview" method="POST">
        <textarea name="reply" id="reply" placeholder="Nhập câu trả lời..."></textarea>
        <button type="submit" class="btn-reply">Trả lời</button>
    </form>
    <hr>
    <a href="index.php?controller=admin&action=handleReview">Delete review id 1</a>
    <hr>
    <a href="index.php?controller=admin&action=manageStores">Watch all stores</a>
    <hr>
    <form action="index.php?controller=admin&action=addStore" method="POST" id="add-store-form">
        <label for="name">Tên cửa hàng:</label>
        <input type="text" id="name" name="name" placeholder="Nhập tên cửa hàng" required>
        <br>
        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="address" placeholder="Nhập địa chỉ cửa hàng" required></textarea>
        <br>
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
        <br>
        <label for="opening_hours">Giờ mở cửa:</label>
        <input type="text" id="opening_hours" name="opening_hours" placeholder="Nhập giờ mở cửa (VD: 08:00 - 21:00)" required>
        <br>
        <label for="services">Dịch vụ:</label>
        <textarea id="services" name="services" placeholder="Nhập danh sách dịch vụ (VD: WiFi, Điều hòa, Đậu xe...)" required></textarea>
        <br>
        <button type="submit">Thêm Cửa Hàng</button>
    </form>
    <hr>
    <form action="index.php?controller=admin&action=editStore" method="POST" id="add-store-form">
        <label for="name">Tên cửa hàng:</label>
        <input type="text" id="name" name="name" placeholder="Nhập tên cửa hàng" required>
        <br>
        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="address" placeholder="Nhập địa chỉ cửa hàng" required></textarea>
        <br>
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
        <br>
        <label for="opening_hours">Giờ mở cửa:</label>
        <input type="text" id="opening_hours" name="opening_hours" placeholder="Nhập giờ mở cửa (VD: 08:00 - 21:00)" required>
        <br>
        <label for="services">Dịch vụ:</label>
        <textarea id="services" name="services" placeholder="Nhập danh sách dịch vụ (VD: WiFi, Điều hòa, Đậu xe...)" required></textarea>
        <br>
        <button type="submit">Sửa Cửa Hàng</button>
    </form>
    <hr>
    <a href="index.php?controller=admin&action=deleteStore">Delete Store</a>
    <hr>
    <a href="index.php?controller=admin&action=manageDiscounts">ViewDiscount</a>
    <hr>
    <form action="index.php?controller=admin&action=addDiscount" method="POST" id="addDiscountForm">
        <label for="code">Mã giảm giá:</label>
        <input type="text" id="code" name="code" required placeholder="Nhập mã giảm giá">

        <label for="percentage">Phần trăm giảm giá (%):</label>
        <input type="number" id="percentage" name="percentage" required min="0" max="100" step="0.01" placeholder="Nhập phần trăm giảm giá">

        <label for="expiry_date">Ngày hết hạn:</label>
        <input type="date" id="expiry_date" name="expiry_date" required>

        <button type="submit">Thêm mã giảm giá</button>
    </form>
    <hr>
    <form action="index.php?controller=admin&action=editDiscount" method="POST">
        <label for="code">Mã giảm giá:</label>
        <input type="text" id="code" name="code" required placeholder="Nhập mã giảm giá">

        <label for="percentage">Phần trăm giảm giá (%):</label>
        <input type="number" id="percentage" name="percentage" required min="0" max="100" step="0.01" placeholder="Nhập phần trăm giảm giá">

        <label for="expiry_date">Ngày hết hạn:</label>
        <input type="date" id="expiry_date" name="expiry_date" required>

        <button type="submit">sửa mã giảm giá</button>
    </form>
    <hr>
    <a href="index.php?controller=admin&action=deleteDiscount">Delete Discount</a>
    <hr>
    <a href="index.php?controller=admin&action=managePromotions">View all Promotion</a>
    <hr>
    <form action="index.php?controller=admin&action=addPromotion" method="POST" id="addPromotionForm">
        <label for="name">Tên chương trình khuyến mãi:</label>
        <input type="text" id="name" name="name" required placeholder="Nhập tên chương trình">

        <label for="details">Chi tiết khuyến mãi:</label>
        <textarea id="details" name="details" required placeholder="Nhập chi tiết chương trình khuyến mãi"></textarea>

        <label for="start_date">Ngày bắt đầu:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">Ngày kết thúc:</label>
        <input type="date" id="end_date" name="end_date" required>

        <button type="submit">Thêm chương trình</button>
    </form>
    <hr>
    <form action="index.php?controller=admin&action=editPromotion" method="POST" >
        <label for="name">Tên chương trình khuyến mãi:</label>
        <input type="text" id="name" name="name" required placeholder="Nhập tên chương trình">

        <label for="details">Chi tiết khuyến mãi:</label>
        <textarea id="details" name="details" required placeholder="Nhập chi tiết chương trình khuyến mãi"></textarea>

        <label for="start_date">Ngày bắt đầu:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">Ngày kết thúc:</label>
        <input type="date" id="end_date" name="end_date" required>

        <button type="submit">Sửa chương trình</button>
    </form>
    <hr>
    <a href="index.php?controller=admin&action=managePost">View all Post</a>
</body>
</html>
