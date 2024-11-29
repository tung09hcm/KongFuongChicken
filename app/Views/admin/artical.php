<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/Views/admin/css/artical.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include 'app/Views/admin/navBar.php';

        $idPost = isset($_GET['idPost']) ? intval($_GET['idPost']) : null;
    ?>

    <div class="big-container">
        <h1><?php echo $idPost > 0 ? 'Chỉnh sửa bài viết' : 'Thêm  bài viết mới'; ?></h1>

        <div class="writing-section">
            <form action="" method="POST" name="artical-form" id="artical-form">
                <input type="hidden" name="id" id="id" value="<?php echo $idPost; ?>">

                <label for="title">Tiêu đề</label><br>
                <input type="text" id="title" name="title" value="" autocomplete="off"><br>

                <label for="content">Nội dung</label><br>
                <textarea id="content" name="content" rows="30" cols="40" placeholder="Nhập nội dung bài viết ở đây..."></textarea><br>

                <div class="btn">
                    <button type="submit">Lưu</button>
                    <button type="button" onclick="deletePost();" style="display: <?php echo $idPost > 0 ? 'inline' : 'none'; ?>">Xóa</button>
                    <button type="reset" onclick="window.location.href='index.php?controller=admin&action=viewPost'">Hủy</button>
                </div>
            </form>
        </div>

        <?php 
            include 'app/Views/partials/footer.php';
        ?>
    </div>

    <script>
        fetch("index.php?controller=admin&action=getPost&idPost=" + encodeURIComponent(<?php echo $idPost; ?>))
        .then((response) => response.json())
        .then((data) => {
            // Điền thông tin vào form
            if (data.success) {
                document.getElementById('title').value = data.post.title || '';
                document.getElementById('content').value = data.post.content || '';
            } else {
                console.error("Dữ liệu không hợp lệ hoặc bài viết không tồn tại");
            }

        })
        .catch((error) => {
            console.error('Lỗi:', error);
            alert('Đã xảy ra lỗi khi lấy dữ liệu.');
        });

        document.getElementById('artical-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn không cho form tải lại trang
            
            const id = document.getElementById('id').value;
            const actionUrl = id > 0
                ? `index.php?controller=admin&action=editPost&idPost=${encodeURIComponent(id)}`
                : `index.php?controller=admin&action=addPost`;

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
                    window.location.href = 'index.php?controller=admin&action=viewPost';
                } else {
                    alert(data.message); // Hiển thị thông báo lỗi
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi gửi dữ liệu.');
            });
        });


        function deletePost() {
            event.preventDefault(); // Ngăn không cho form tải lại trang
            
            const form = document.getElementById('artical-form');
            const id = document.getElementById('id').value;

            const actionUrl = `index.php?controller=admin&action=deletePost&idPost=${encodeURIComponent(id)}`;                ;

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
                    window.location.href = 'index.php?controller=admin&action=viewPost';
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

    
</body>
</html>