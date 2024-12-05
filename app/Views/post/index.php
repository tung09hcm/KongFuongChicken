<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức | KFC Việt Nam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="app/Views/partials/partials.css">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css">
    <link rel="stylesheet" href="app/Views/post/post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <?php include 'app/Views/partials/header.php'; ?>

    <div class="container my-5">
        <h2 class="mb-4">Danh sách tin tức</h2>
        <div id="row" style="
            display: flex;
            gap: 20px;
            flex-wrap: wrap;">
        </div>
    </div>

    <?php include 'app/Views/partials/footer.php'; ?>

    <script>
        fetch('index.php?controller=user&action=getAllPost')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                let contain = document.getElementById('row');

                console.log(data);
                data.posts.forEach(post => {
                    const postHTML = `
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="	https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfCfCvoK4uUQbglLMwrfyegpjn2CdSaUkefw&s" class="card-img-top" alt="${post.title}">
                                <div class="card-body">
                                    <h5 class="card-title">${post.title}</h5>
                                    <a href="index.php?controller=user&action=PostDetail&idPost=${post.id}" class="btn btn-primary">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    `;

                    // Thêm nội dung vào phần tử DOM
                    contain.innerHTML += postHTML;
                })
                
           
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Có lỗi xảy ra, vui lòng thử lại.');
        });
    </script>
</body>
</html>
