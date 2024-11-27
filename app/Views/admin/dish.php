<!-- DONE -->
<?php
    ob_start();
    include 'navBar.php'; 
    include  __DIR__ . '/../../../config/config.php';

    // Kết nối cơ sở dữ liệu
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    $conn = new mysqli($host, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy ID sản phẩm từ URL
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $product = [
        'image_link' => '',
        'name' => '',
        'description' => '',
        'price' => ''
    ];

    if ($product_id > 0) {
        // Truy vấn sản phẩm từ cơ sở dữ liệu
        $sql = "SELECT * FROM PRODUCT WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form
        $image_link = $_POST['img'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Loại bỏ dấu phẩy và dấu chấm
        $price = str_replace('.', '', $price); // Loại bỏ dấu chấm
        $price = str_replace(',', '', $price); // Loại bỏ dấu phẩy

        // Chuyển thành số (int hoặc float nếu cần)
        $price = (float)$price; // Hoặc (int)$price nếu bạn muốn là số nguyên

        // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
        if ($product_id > 0) {
            // Cập nhật sản phẩm
            $update_sql = "UPDATE PRODUCT SET 
                            image_link = '$image_link', 
                            name = '$name', 
                            description = '$description', 
                            price = '$price' 
                            WHERE id = $product_id";
            if ($conn->query($update_sql) === TRUE) {
                ob_clean();  // Dọn sạch bất kỳ output nào đã được buffer
                header("Location: menus.php");
                exit();
            } else {
                echo "Lỗi: " . $conn->error;
            }
        } else {
            // Nếu không có ID (tạo sản phẩm mới)
            $insert_sql = "INSERT INTO PRODUCT (image_link, name, description, price) 
                        VALUES ('$image_link', '$name', '$description', '$price')";
            if ($conn->query($insert_sql) === TRUE) {
                ob_clean();
                header("Location: menus.php");
                exit();
            } else {
                echo "Lỗi khi thêm sản phẩm mới: " . $conn->error;
            }
        }
    }

    $conn->close();
?>



<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="stylesheet" href="css/dish.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="big-container">
        <h1><?php echo $product_id > 0 ? 'Cập nhật món ăn' : 'Thêm món ăn mới'; ?></h1>
        <div class="info">
            <form action="" method="POST" name="dish-form">
                <img id="product-image" src="<?php  echo $product_id > 0 ? $product['image_link'] : "" ?>" alt=""><br>
                <div class="info-item">
                    <label for="img">Link ảnh</label><br>
                    <input type="text" id="img" name="img" value="<?php echo $product_id > 0 ? $product['image_link'] : ""; ?>" autocomplete="off" oninput="updateImage()"><br>

                    <label for="name">Tên</label><br>
                    <input type="text" id="name" name="name" value="<?php echo $product_id > 0 ? $product['name'] : ""; ?>" autocomplete="name"><br>

                    <label for="description">Mô tả</label><br>
                    <input type="text" id="description" name="description" value="<?php echo $product_id > 0 ? $product['description'] : ""; ?>" autocomplete="off"><br>

                    <label for="price">Giá</label><br>
                    <input type="number" id="price" name="price" value="<?php echo $product_id > 0 ? number_format($product['price'], 0, ',', '.') : ""; ?>" autocomplete="off"><br>

                    <div class="btn">
                        <button type="submit">Lưu</button>
                        <button type="button" onclick="deleteProduct();" style="display: <?php echo $product_id > 0 ? 'inline' : 'none'; ?>">Xóa</button>
                        <button type="reset" onclick="window.location.href = 'menus.php'">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Hàm để cập nhật ảnh khi thay đổi giá trị của ô nhập liệu
        function updateImage() {
            const imageUrl = document.getElementById('img').value;  // Lấy giá trị của ô nhập liệu
            const imgElement = document.getElementById('product-image');  // Thẻ img

            // Cập nhật thuộc tính src của thẻ img
            imgElement.src = imageUrl;
        }

        function deleteProduct() {
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                const productId = <?php echo $product_id; ?>;  // Lấy ID của sản phẩm hiện tại

                // Gửi yêu cầu xóa sản phẩm tới PHP
                fetch('api/deleteProduct.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${productId}`  // Gửi ID sản phẩm qua POST
                })
                .then(response => response.json())  // Chuyển đổi phản hồi từ JSON
                .then(data => {
                    if (data.success) {
                        // Nếu xóa thành công, chuyển hướng về trang menus.php
                        window.location.href = 'menus.php';
                    } else {
                        // Nếu có lỗi khi xóa
                        alert('Có lỗi khi xóa sản phẩm: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);  // Hiển thị lỗi nếu có
                });
            }
        }

    </script>

    <?php 
        include '../partials/footer.php';
    ?>
</body>
</html>
