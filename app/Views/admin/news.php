<!-- Này chỉ cần load các bài viết ra là được -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../partials/partials.css">
    <link rel="stylesheet" href="../partials/partials_responsive.css">
</head>
<body>
    <?php 
        include 'navBar.php';
    ?>

    <div class="big-container">
        <h1>Bài viết</h1>

        <!-- /*news - mấy trang thông tin đồ đó*/ -->
        <div class="contain2">
            <div class="link">
                <a id="add-article" href="article.php?id=0">Thêm bài viết</a>
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
            include '../partials/footer.php';
        ?>
    </div>

    <script src="script/post.js"></script>
</body>
</html>