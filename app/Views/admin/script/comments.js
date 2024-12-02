// DONE Function to load product details and comments
function loadProducts() {
    fetch("index.php?controller=admin&action=manageReviews")
    .then((response) => response.json())
    .then(data => {
        displayProducts(data);
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert('Lỗi khi tải dữ liệu!');
    });
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

    // Hàm nhóm dữ liệu theo product và comment
    const groupedReviews = filteredComment.reduce((acc, review) => {
        const { product_id, product_name, product_image, product_price, product_description, comment_id, comment_content, comment_rating, user_first_name, user_last_name, reply_id, reply_content, reply_date } = review;
    
        // Nếu sản phẩm chưa có trong mảng, thêm vào
        if (!acc[product_id]) {
        acc[product_id] = {
            product_id,
            product_name,
            product_image,
            product_price,
            product_description,
            comments: []
        };
        }
    
        // Thêm bình luận vào sản phẩm
        const comment = acc[product_id].comments.find(c => c.comment_id === comment_id);
    
        if (!comment) {
        acc[product_id].comments.push({
            comment_id,
            comment_content,
            comment_rating,
            user_first_name,
            user_last_name,
            replies: []
        });
        }
    
        // Nếu có reply, thêm vào
        if (reply_content) {
        const comment = acc[product_id].comments.find(c => c.comment_id === comment_id);
        comment.replies.push({
            reply_content,
            reply_date,
            admin_first_name: review.admin_first_name,
            admin_last_name: review.admin_last_name
        });
        }
    
        return acc;
    }, {});
  
    // Chuyển đổi sang mảng
    const result = Object.values(groupedReviews);

    // Sắp xếp products theo comment_id giảm dần
    result.sort((a, b) => {
        // Kiểm tra nếu a.comments và b.comments là mảng hợp lệ
        const maxCommentIdA = Array.isArray(a.comments) && a.comments.length > 0
        ? Math.max(...a.comments.map(comment => comment.comment_id))
        : -Infinity;
    
        const maxCommentIdB = Array.isArray(b.comments) && b.comments.length > 0
        ? Math.max(...b.comments.map(comment => comment.comment_id))
        : -Infinity;
    
        return maxCommentIdB - maxCommentIdA;
    });
    
    // Sắp xếp các comments trong mỗi product theo comment_id giảm dần, nếu có comments
    result.forEach(product => {
        if (Array.isArray(product.comments)) {
        product.comments.sort((a, b) => b.comment_id - a.comment_id);
        }
    });  

    result.forEach(function(product) {
        // Check if product has comments
        if (product.comments && Object.keys(product.comments).length > 0) {
            // Create product card
            var productDiv = document.createElement('div');
            productDiv.classList.add('product-card');

            productDiv.innerHTML = `
                <div class="item" onclick="window.location.href='index.php?controller=admin&action=viewProduct&idProduct=${product.id}'">
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
                    <p style="color: #00000082; margin-bottom: 10px;">Rating: ${comment.comment_rating}</p>
                    <p>${comment.comment_content}</p>
                    <button onclick="deleteComments('${commentDiv.id}')">Xóa</button>
                    <div class="answer" id="answer-item-${comment.comment_id}">${repliesHTML}</div>
                    <div class="answer-input">
                        <form id="answer-form-${comment.comment_id}">
                            <input id="answer-form-${comment.comment_id}-input" name="reply" type="text" placeholder="Trả lời bình luận...">
                        </form>
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
    commentId = commentId.replace('comment_', '');

    var inputField = document.getElementById('answer-form-'+ commentId + '-input');
    var replyContent = inputField.value.trim();

    if (replyContent === '') {
        alert('Vui lòng nhập nội dung trả lời.');
        return;
    }

    // Lấy form bằng ID
    const formElement = document.getElementById('answer-form-' + commentId);

    // Tạo FormData từ form
    const formData = new FormData(formElement);

    // Gửi form bằng Fetch API
    fetch("index.php?controller=admin&action=handleReview&idReview=" + encodeURIComponent(commentId), {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json()) // Giả sử server trả về JSON
    .then(result => {
        if (result.status == 'success') {
            
            fetch("index.php?controller=admin&action=getReplyById&idReply=" + encodeURIComponent(result.reply))
            .then(response => response.json())
            .then(data => {
                // Thêm câu trả lời vào giao diện
                var answerDiv = document.getElementById('answer-item-' + commentId);
                var newReply = document.createElement('div');
                newReply.classList.add('answer-item');
                newReply.innerHTML = `
                    <h3>${data.reply.last_name} ${data.reply.first_name}</h3>
                    <p style="color: #00000082; margin-bottom: 10px;">${data.reply.reply_date}</p>
                    <p>${data.reply.reply_content}</p>
                `;
                answerDiv.appendChild(newReply);

                // Xóa nội dung trong ô input
                inputField.value = '';
            })
        } else {
            alert('Không thể thêm trả lời. Vui lòng thử lại.');
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
        alert('Có lỗi xảy ra khi gửi dữ liệu.');
    });
}

function deleteComments(commentId) {
    // Lấy ID bình luận
    var commentId = commentId.replace('comment_', '');

    // Gửi yêu cầu xóa bình luận
    fetch("index.php?controller=admin&action=handleReview&idReview=" + encodeURIComponent(commentId), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded' // Đảm bảo rằng gửi dữ liệu với đúng kiểu form
        },
        body: 'delete=true' // Gửi dữ liệu dưới dạng key=value
    })
    .then(response => response.json())
    .then(result => {
        if (result.status == 'success') {
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