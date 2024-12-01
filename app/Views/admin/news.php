<!-- Này chỉ cần load các bài viết ra là được -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/Views/admin/css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../partials/partials_responsive.css">
</head>
<body>
    <?php 
        include 'app/Views/admin/navBar.php';
    ?>

    <div class="big-container">
        <h1>Bài viết</h1>

        <!-- /*news - mấy trang thông tin đồ đó*/ -->
        <div class="contain2">
            <div class="link">
                <a id="add-article" href="index.php?controller=admin&action=viewPostDetail&idPost=0">Thêm bài viết</a>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Mã bài viết</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Ngày đăng</th>
                        </tr>
                    </thead>
    
                    <tbody id="post-list"></tbody>
                </table>
            </div>
        </div>

        <?php 
            include 'app/Views/partials/footer.php';
        ?>
    </div>

    <script src="app/Views/admin/script/post.js"></script>
</body>
</html>