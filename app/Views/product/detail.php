<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Gà Rán KFC, Giao Hàng Tận Nơi | KFC Việt Nam</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <!-- Link css header -->
    <link rel="stylesheet" href="app/Views/partials/partials.css">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css">
    <!-- Link css homepage -->
    <!-- <link rel="stylesheet" href="../../Views/homepage/homepage.css"> -->
    <!-- Link css product detail -->
    <link rel="stylesheet" href="app/Views/product/product.css">
    <link rel="stylesheet" href="app/Views/product/product_responsive.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include 'app/Views/partials/header.php';
    ?>

    <script>
        const id = "<?php echo $id; ?>";

        fetch('index.php?controller=product&action=detail&id=' + encodeURIComponent(id))
        .then(response => response.json())
        .then(data => {
            renderProduct(data); // Gọi hàm để hiển thị dữ liệu
        });

        function renderProduct(product) {
            // Chèn dữ liệu hình ảnh
            product = product.product;

            const productImage = document.querySelectorAll('.product-detail-image img');
            if (productImage) {
                productImage.forEach((el) => {
                    el.src = product.image_link;
                    el.alt = product.name;
                });
            }

            // Chèn dữ liệu tên sản phẩm
            const productNameElements = document.querySelectorAll('.product-detail-card-item h5');
            productNameElements.forEach((el) => {
                el.textContent = product.name;
            });

            // Chèn mô tả sản phẩm
            const productDescriptionElements = document.querySelectorAll('.product-detail-card-item p:first-of-type');
            productDescriptionElements.forEach((el) => {
                el.textContent = product.description;
            });

            // Chèn giá sản phẩm
            const productPriceElements = document.querySelectorAll('.product-detail-card-price');
            const productPriceElementsLap = document.querySelectorAll('.product-detail-card-item-price');
            productPriceElements.forEach((el) => {
                el.innerHTML += new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.price);
            });
            productPriceElementsLap.forEach((el) => {
                el.innerHTML += new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.price);
            });
        }

        fetch('index.php?controller=review&action=view&product_id=' + encodeURIComponent(id))
        .then(response => response.json())
        .then(data => {
            data = groupReviewsAndReplies(data.reviews); // Gom nhóm các comment và reply
            renderReviews(data); // Gọi hàm để hiển thị dữ liệu
        });

        function groupReviewsAndReplies(reviews) {
            const groupedReviews = {};

            // Lặp qua mảng reviews
            reviews.forEach(review => {
                const { 
                    id, admin_first_name, admin_last_name, product_id, 
                    user_id, content, rating, review_id, reply_content, reply_date,
                    first_name, last_name 
                } = review;

                // Kiểm tra xem bình luận đã tồn tại trong groupedReviews chưa
                if (!groupedReviews[id]) {
                    groupedReviews[id] = {
                        id,
                        product_id,
                        user_id,
                        content,
                        rating,
                        first_name, last_name,
                        replies: [] // Khởi tạo mảng replies rỗng
                    };
                }

                // Nếu có phản hồi (review_id trùng với id), gom nó vào mảng replies của review
                if (review_id && groupedReviews[review_id]) {
                    groupedReviews[review_id].replies.push({
                        admin_first_name,
                        admin_last_name,
                        reply_content,  // Sửa lại cho chính xác
                        reply_date
                    });
                }
            });

            // Trả về danh sách các bình luận (reviews) sau khi đã gom
            return Object.values(groupedReviews);
        }


        function renderReviews(groupedReviews) {
            const container = document.querySelector('.container-comment');  // Giả sử bạn đã có một phần tử để hiển thị các bình luận

            // Lặp qua từng review đã nhóm lại
            groupedReviews.forEach(review => {
                // Tạo phần tử div cho mỗi bình luận
                const commentInput = document.createElement('div');
                commentInput.classList.add('comment-input');

                // Tạo phần header cho bình luận
                const commentHeader = document.createElement('div');
                commentHeader.classList.add('comment-header');
                commentHeader.innerHTML = `
                    <span class="name">${review.first_name} ${review.last_name} <span style="font-weight: 400;">đánh giá ${review.rating} sao</span></span>
                `;
                
                // Tạo phần body cho bình luận
                const commentBody = document.createElement('div');
                commentBody.classList.add('comment-body');
                commentBody.innerHTML = `
                    <p>${review.content}</p>
                `;

                // Tạo phần reply cho bình luận
                const commentReply = document.createElement('div');
                commentReply.classList.add('comment-reply');

                // Kiểm tra nếu có phản hồi cho bình luận này
                review.replies.forEach(reply => {
                    // Tạo phần header cho reply
                    const replyHeader = document.createElement('div');
                    replyHeader.classList.add('reply-header');
                    replyHeader.innerHTML = `
                        <span class="name">${reply.admin_first_name} ${reply.admin_last_name}</span>
                        <span class="reply-date">${reply.reply_date}</span>
                    `;

                    // Tạo phần body cho reply
                    const replyBody = document.createElement('div');
                    replyBody.classList.add('reply-body');
                    replyBody.innerHTML = `
                        <p>${reply.reply_content}</p>
                    `;

                    // Gắn phần reply vào commentReply
                    commentReply.appendChild(replyHeader);
                    commentReply.appendChild(replyBody);
                });

                // Gắn tất cả vào commentInput
                commentInput.appendChild(commentHeader);
                commentInput.appendChild(commentBody);
                commentInput.appendChild(commentReply);

                // Thêm commentInput vào container
                container.appendChild(commentInput);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const commentForm = document.getElementById('comment-input-user');
            if (commentForm) {
                commentForm.addEventListener('submit', function(event) {
                    event.preventDefault();  // Ngăn không cho form gửi theo cách mặc định

                    console.log('Form submitted!');
                    // Lấy dữ liệu từ form
                    const content = document.getElementById('user-comment').value;
                    const rating = document.getElementById('rating').value;

                    // Kiểm tra dữ liệu nhập vào
                    if (!content || !rating) {
                        alert('Vui lòng nhập bình luận và chọn đánh giá!');
                        return;
                    }

                    const formData = new FormData(this);

                    // Gọi API gửi bình luận
                    fetch('index.php?controller=review&action=write', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Kiểm tra kết quả từ API
                        if (data.status === 'success') {
                            alert('Bình luận đã được gửi thành công!');
                            // Xử lý sau khi gửi thành công (ví dụ: reset form, cập nhật UI, v.v.)
                            document.getElementById('comment-input-user').reset();
                            location.reload()
                        } else {
                            alert('Có lỗi xảy ra, vui lòng thử lại!');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Có lỗi xảy ra, vui lòng thử lại!');
                    });
                });
            } else {
                console.error('Form with id "comment-input-user" not found');
            }

            const addToCartButtons = document.querySelectorAll('.product-detail-btn');
            if (addToCartButtons) {
                addToCartButtons.forEach((button) => {
                    button.addEventListener('click', function() {
                        const product_id = id;
                        const quantity = 1;

                        const data = new FormData();
                        data.append('product_id', product_id);
                        data.append('quantity', 1);

                        // Gọi API thêm sản phẩm vào giỏ hàng
                        fetch('index.php?controller=user&action=addToCart', {
                            method: 'POST',
                            body: data
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Kiểm tra kết quả từ API
                            if (data.status === 'success') {
                                alert('Đã thêm sản phẩm vào giỏ hàng!');
                                location.reload()
                            } else {
                                alert('Có lỗi xảy ra, vui lòng thử lại!');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Có lỗi xảy ra, vui lòng thử lại!');
                        });
                    });
                })
            } else {
                console.error('Button with class "product-detail-btn" not found');
            }
        });


    </script>

    <!-- Main -->
    <div class="top-bar top-bar-on-mobile d-flex justify-content-center">
        <div class="container d-flex justify-content-center align-items-center">
        <div class="d-flex">
            <span class="icon-text hide-on-mobile">
                Đặt Ngay
            </span>
            <span class="icon-text">
                <span class="icon-at-home"></span>
                Giao Hàng
            </span>
            <span class="icon-text">
                <span class="icon-at-pickup"></span>
                hoặc Mang đi
            </span>
        </div>
            <button class="btn">
            Bắt đầu đặt hàng
            </button>
        </div>
    </div>

    <div class="container mt-3 product-detail hide-on-tablet-desktop">
        <div class="row justify-content-center">
            <div class="col-12 text-center product-detail-image">
                <img src="" alt="" class="product-detail-image-item" height="500" width="500"/>
            </div>
        </div>    

        <hr style="border-top: 2px solid #B6B6B6 !important; margin-top: 15px !important; margin-bottom: 10px !important;">
        
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <div class="col-md-6 product-detail-card">
                    <div class="product-detail-card-item">
                        <h5></h5>
                        <p></p>
                        <p>
                            <span class="product-detail-card-price">Giá: </span>
                        </p>
                        <button class="btn product-detail-btn">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product detail -->
    <div class="container mt-4 product-detail hide-on-mobile">
        <div class="row justify-content-center">
            <div class="col-md-6 product-detail-image">
                <img src="" alt="" class="product-detail-image-item" height="500" width="500"/>
            </div>
            <div class="col-md-6 product-detail-card">
                <div class="product-detail-card-item">
                    <h5></h5>
                    <p></p>
                    <p class="product-detail-card-item-price">
                        <span>Giá: </span>
                    </p>
                    <button class="btn product-detail-btn">Thêm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-comment mt-5">
        <h2>Bình luận</h2>

        <div class="comment-input">
            <form action="" method="POST" id="comment-input-user" name="comment-input-user">
                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                <div class="comment-body"> 
                    <textarea name="content" id="user-comment" placeholder="Nhập bình luận của bạn..." rows="4" style="width: 100%;"></textarea>
                </div>
                <!-- Select để chọn đánh giá sao -->
                <div class="rating-container">
                    <label for="rating">Đánh giá:</label>
                    <select id="rating" name="rating">
                        <option value="1">1 sao</option>
                        <option value="2">2 sao</option>
                        <option value="3">3 sao</option>
                        <option value="4">4 sao</option>
                        <option value="5">5 sao</option>
                    </select>
                </div>
                <div class="comment-footer">
                    <button type="submit" class="btn" id="submit-comment">Gửi bình luận</button>
                </div>
            </form>
                
        </div>
    </div>

    

    <!-- Footer -->
    <?php 
        include 'app/Views/partials/footer.php';
    ?>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="app/Views/product/product.js"></script>
</body>
</html>