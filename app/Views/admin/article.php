<!-- DONE -->
<?php
    ob_start();

    // Kết nối cơ sở dữ liệu
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
    $post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $post = [
        'title' => '',
        'content' => ''
    ];

    if ($post_id > 0) {
        // Truy vấn sản phẩm từ cơ sở dữ liệu
        $sql = "SELECT * FROM POST WHERE id = $post_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $post = $result->fetch_assoc();
        } else {
            echo "Không tìm thấy bài viết.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        // Lấy dữ liệu từ form
        $title = $_POST['title'];
        $content = $_POST['content'];
        $created_at = (new DateTime())->format('Y-m-d H:i:s');
        $admin_id = 5;
       

        // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
        if ($post_id > 0) {
            // Cập nhật sản phẩm
            $update_sql = "UPDATE POST SET 
                            title = '$title', 
                            content = '$content',
                            created_at = '$created_at'
                            WHERE id = $post_id";
            if ($conn->query($update_sql) === TRUE) {
                ob_clean();  // Dọn sạch bất kỳ output nào đã được buffer
                header("Location: index.php");
                exit();
            } else {
                echo "Lỗi: " . $conn->error;
            }
        } else {
            // Nếu không có ID (tạo sản phẩm mới)
            $insert_sql = "INSERT INTO POST (title, content, created_at, admin_id) 
                        VALUES ('$title', '$content', '$created_at', '$admin_id' )";
            if ($conn->query($insert_sql) === TRUE) {
                ob_clean();
                header("Location: index.php");
                exit();
            } else {
                echo "Lỗi khi thêm bài viết mới: " . $conn->error;
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
    <link rel="stylesheet" href="css/artical.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include 'navBar.php';
    ?>

    <div class="big-container">
        <h1>Chỉnh sửa bài viết dễ dàng!!</h1>

        <div class="writing-section">
            <form action="" method="POST" name="artical-form">
                <label for="title">Tiêu đề</label><br>
                <input type="text" id="title" name="title" value="<?php echo $post_id > 0 ? $post['title'] : ""; ?>" autocomplete="name"><br>

                <label for="content">Nội dung</label><br>
                <textarea id="content" name="content" rows="30" cols="50" placeholder="Nhập nội dung bài viết ở đây...">
                    <?php echo $post_id > 0 ? $post['content'] : ""; ?>
                </textarea><br>

                <div class="btn">
                    <button type="submit">Lưu</button>
                    <button type="button" onclick="deletePost();" style="display: <?php echo $post_id > 0 ? 'inline' : 'none'; ?>">Xóa</button>
                    <button type="reset" onclick="window.location.href = 'index.php'">Hủy</button>
                </div>
            </form>
        </div>

        <script>
            function deletePost() {
                if (confirm("Bạn có chắc chắn muốn xóa bài viết này?")) {
                    const postId = <?php echo $post_id; ?>;  // Lấy ID của sản phẩm hiện tại

                    // Gửi yêu cầu xóa sản phẩm tới PHP
                    fetch('api/deletePost.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `id=${postId}`  // Gửi ID sản phẩm qua POST
                    })
                    .then(response => response.json())  // Chuyển đổi phản hồi từ JSON
                    .then(data => {
                        if (data.success) {
                            // Nếu xóa thành công, chuyển hướng về trang menus.php
                            window.location.href = 'index.php';
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
    </div>

    
</body>
</html>