<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User TEST</title>
</head>
<body>
    <a href="index.php?controller=cart&action=view">Cart_Controller_View</a>
    <hr>
    <form id="addToCartForm" method="POST" action="index.php?controller=cart&action=add">
        <label for="product_id">ID sản phẩm:</label>
        <input type="number" id="product_id" name="product_id" required>
        <br><br>

        <label for="quantity">Số lượng:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1" required>
        <br><br>

        <button type="submit">Thêm vào giỏ hàng</button>
    </form>
    <a href="index.php?controller=order&action=history">History Order</a>
    <hr>
    <form id="checkoutForm" method="POST" action="index.php?controller=order&action=checkout">
        <label for="store_id">Chọn cửa hàng:</label>
        <input type="text" id="discount_code" name="store_id" placeholder="Nhập id cửa hàng">
        <br><br>

        <label for="discount_code">Mã giảm giá (nếu có):</label>
        <input type="text" id="discount_code" name="discount_code" placeholder="Nhập mã giảm giá">
        <br><br>

        <label for="delivery_address">Địa chỉ giao hàng:</label>
        <textarea id="delivery_address" name="delivery_address" required></textarea>
        <br><br>

        <button type="submit">Thanh Toán</button>
    </form>
</body>
</html>