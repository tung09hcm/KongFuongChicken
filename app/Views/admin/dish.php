<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="stylesheet" href="app/Views/admin/css/dish.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include 'app/Views/admin/navBar.php';

        $idProduct = isset($_GET['idProduct']) ? intval($_GET['idProduct']) : null;
    ?>

    <div class="big-container">
        <h1><?php echo $idProduct > 0 ? 'Cập nhật món ăn' : 'Thêm món ăn mới'; ?></h1>
        <div id="info">
            <form action="" method="POST" name="dish-form" id="dish-form">
                <img id="product-image" src="" alt=""><br>
                <div class="info-item">
                    <input type="hidden" name="id" id="id" value="<?php echo $idProduct; ?>">

                    <label for="img">Link ảnh</label><br>
                    <input type="text" id="image_link" name="image_link" value="" autocomplete="off" oninput="updateImage()"><br>

                    <label for="name">Tên</label><br>
                    <input type="text" id="name" name="name" value="" autocomplete="name"><br>

                    <label for="description">Mô tả</label><br>
                    <input type="text" id="description" name="description" value="" autocomplete="off"><br>

                    <label for="price">Giá</label><br>
                    <input type="number" id="price" name="price" value="" autocomplete="off"><br>

                    <div class="btn">
                        <button type="submit" id="saveButton">Lưu</button>
                        <button type="button" onclick="deleteProduct();" style="display: <?php echo $idProduct > 0 ? 'inline' : 'none'; ?>">Xóa</button>
                        <button type="reset" onclick="window.location.href='index.php?controller=admin&action=viewMenu'">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        fetch("index.php?controller=admin&action=getProduct&idProduct=" + encodeURIComponent(<?php echo $idProduct; ?>))
        .then((response) => response.json())
        .then((data) => {
            // Điền thông tin vào form
            if (data.success) {
                let form = document.getElementById('info');
                document.getElementById('product-image').src = data.product.image_link;
                document.getElementById('image_link').value = data.product.image_link;
                document.getElementById('name').value = data.product.name;
                document.getElementById('description').value = data.product.description;
                document.getElementById('price').value = data.product.price;
            }
        })
        .catch((error) => {
            console.error('Lỗi:', error);
            alert('Đã xảy ra lỗi khi lấy dữ liệu.');
        });

        // Hàm để cập nhật ảnh khi thay đổi giá trị của ô nhập liệu
        function updateImage() {
            const imageUrl = document.getElementById('img').value;  // Lấy giá trị của ô nhập liệu
            const imgElement = document.getElementById('product-image');  // Thẻ img

            // Cập nhật thuộc tính src của thẻ img
            imgElement.src = imageUrl;
        }

        document.getElementById('dish-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn không cho form tải lại trang
            
            const id = document.getElementById('id').value;
            const actionUrl = id > 0
                ? `index.php?controller=admin&action=editProduct&idProduct=${encodeURIComponent(id)}`
                : `index.php?controller=admin&action=addProduct`;

            // Tạo FormData để gửi dữ liệu
            const formData = new FormData(this);

            // Gửi form bằng Fetch API
            fetch(actionUrl, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json()) // Giả sử server trả về JSON
            .then(data => {
                if (data.status) {
                    // Điều hướng khi thành công
                    window.location.href = 'index.php?controller=admin&action=viewMenu';
                } else {
                    alert(data.message); // Hiển thị thông báo lỗi
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi gửi dữ liệu.');
            });
        });


        function deleteProduct() {
            event.preventDefault(); // Ngăn không cho form tải lại trang
            
            const form = document.getElementById('dish-form');
            const id = document.getElementById('id').value;

            const actionUrl = `index.php?controller=admin&action=deleteProductByID&idProduct=${encodeURIComponent(id)}`;                ;

            // Tạo FormData để gửi dữ liệu
            const formData = new FormData(form);

            // Gửi form bằng Fetch API
            fetch(actionUrl, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json()) // Giả sử server trả về JSON
            .then(data => {
                if (data.status) {
                    // Điều hướng khi thành công
                    window.location.href = 'index.php?controller=admin&action=viewMenu';
                } else {
                    alert(data.message); // Hiển thị thông báo lỗi
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi gửi dữ liệu.');
            });
        }
    </script>

    <?php 
        include 'app/Views/partials/footer.php';
    ?>
</body>
</html>
