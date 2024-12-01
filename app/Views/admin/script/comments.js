// DONE Function to load product details and comments
function loadProducts() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?controller=admin&action=manageReviews', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            displayProducts(response);
        }
    };
    xhr.send();
}

// DONE Function to display products and their comments
function displayProducts(products) {
    const currentUrl = window.location.search;

    var productsContainer = document.querySelector('.comments');
    productsContainer.innerHTML = ''; // Clear the previous products

    let filteredComment = products.reviews;

    // Nếu URL chứa `action=Menu`, giới hạn 5 sản phẩm
    if (currentUrl.includes('action=Menu')) {
        filteredComment = filteredComment.slice(0, 5);
    }

    console.log(filteredComment);

    filteredComment.forEach(function(product) {
        // Check if product has comments
        if (product.comments && Object.keys(product.comments).length > 0) {
            // Create product card
            var productDiv = document.createElement('div');
            productDiv.classList.add('product-card');

            productDiv.innerHTML = `
                <div class="item" onclick="window.location.href='dish.php?id=${product.product_id}'">
                    <img src="${product.product_image}" alt="${product.product_name}">
                    <h4>${product.product_name}</h4>
                    <div class="info">
                        <p class="price-product">${Number(product.product_price).toLocaleString()}đ</p>
                        <p class="description-product">${product.product_description}</p>
                    </div>
                </div>
            `;

            // Create comments section
            var commentsDiv = document.createElement('div');
            commentsDiv.classList.add('comment');

            Object.values(product.comments).forEach(function(comment) {
                var commentDiv = document.createElement('div');
                commentDiv.classList.add('content');
                commentDiv.id = `comment_${comment.comment_id}`;

                // Create replies section
                var repliesHTML = '';
                if (comment.replies && comment.replies.length > 0) {
                    comment.replies.forEach(function(reply) {
                        repliesHTML += `
                            <div class="answer-item">
                                <h3>${reply.admin_first_name} ${reply.admin_last_name}</h3>
                                <p style="color: #00000082; margin-bottom: 10px;">${reply.reply_date}</p>
                                <p>${reply.reply_content}</p>
                            </div>
                        `;
                    });
                }

                commentDiv.innerHTML = `
                    <h3>${comment.user_first_name} ${comment.user_last_name}</h3>
                    <p style="color: #00000082; margin-bottom: 10px;">Rating: ${comment.rating}</p>
                    <p>${comment.content}</p>
                    <button onclick="deleteComments('${commentDiv.id}')">Xóa</button>
                    <div class="answer">${repliesHTML}</div>
                    <div class="answer-input">
                        <input type="text" placeholder="Trả lời bình luận...">
                        <button onclick="answerComments('${commentDiv.id}')">Gửi</button>
                    </div>
                `;

                commentsDiv.appendChild(commentDiv);

                productDiv.appendChild(commentsDiv);
                productsContainer.appendChild(productDiv);
            });
        }

    });
}

// Load products when the page is ready
document.addEventListener('DOMContentLoaded', loadProducts);

function answerComments(commentId) {
    // Lấy nội dung từ ô input
    var commentDiv = document.getElementById(commentId);
    var inputField = commentDiv.querySelector('.answer-input input');
    var replyContent = inputField.value.trim();

    if (replyContent === '') {
        alert('Vui lòng nhập nội dung trả lời.');
        return;
    }

    // Dữ liệu gửi tới server
    var data = {
        comment_id: commentId.replace('comment_', ''), // Lấy ID bình luận
        admin_id: 1, // ID của admin đang đăng nhập, bạn có thể lấy từ session hoặc biến toàn cục
        reply_content: replyContent
    };

    // Gửi yêu cầu AJAX tới server
    fetch('api/addReply.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Thêm câu trả lời vào giao diện
                var answerDiv = commentDiv.querySelector('.answer');
                var newReply = document.createElement('div');
                newReply.classList.add('answer-item');
                newReply.innerHTML = `
                    <h3>${result.admin_name}</h3>
                    <p style="color: #00000082; margin-bottom: 10px;">${result.reply_date}</p>
                    <p>${replyContent}</p>
                `;
                answerDiv.appendChild(newReply);

                // Xóa nội dung trong ô input
                inputField.value = '';
            } else {
                alert('Không thể thêm trả lời. Vui lòng thử lại.');
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Đã xảy ra lỗi. Vui lòng thử lại.');
        });
}

function deleteComments(commentId) {
    // Lấy ID bình luận
    var commentId = commentId.replace('comment_', '');

    // Gửi yêu cầu xóa bình luận
    fetch(`api/deleteComment.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded' // Đảm bảo rằng gửi dữ liệu với đúng kiểu form
        },
        body: `id=${commentId}` // Gửi dữ liệu dưới dạng URL encoded
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            // Xóa bình luận khỏi giao diện
            var commentDiv = document.getElementById(`comment_${commentId}`);
            commentDiv.remove();
        } else {
            alert('Không thể xóa bình luận. Vui lòng thử lại.');
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
        alert('Đã xảy ra lỗi. Vui lòng thử lại.');
    });
}