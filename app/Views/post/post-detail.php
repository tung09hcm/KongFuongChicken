<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tin tức | KFC Việt Nam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="app/Views/partials/partials.css">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <?php 
        include 'app/Views/partials/header.php'; 

        $idPost = isset($_GET['idPost']) ? intval($_GET['idPost']) : null;
    ?>

    <div class="container my-5">
        <div class="post-detail">
            <h1 id="post-title" class="post-title text-center"></h1>
            <div id="post-meta" class="post-meta text-center my-3">
                <span id="post-date"></span> | <span id="post-author">KFC</span>
            </div>
            <div id="post-content" class="post-content"></div>
        </div>
    </div>

    <?php include 'app/Views/partials/footer.php'; ?>

    <script>
        fetch("index.php?controller=user&action=getPostById&idPost=" + encodeURIComponent(<?php echo $idPost; ?>))
        .then((response) => response.json())
        .then((data) => {
            if (data.status == 'success') {
                document.getElementById('post-title').textContent = data.post.title;
                document.getElementById('post-date').textContent = `Ngày đăng: ${data.post.created_at}`;
                document.getElementById('post-content').innerHTML = data.post.content;
            } else {
                alert('Không tìm thấy thông tin bài viết.');
            }
        })
        .catch((error) => {
            console.error('Lỗi:', error);
            alert('Đã xảy ra lỗi khi lấy dữ liệu.');
        });

    </script>
</body>
</html>
