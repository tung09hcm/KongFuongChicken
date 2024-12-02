// Tải dữ liệu từ API
fetch('index.php?controller=admin&action=managePost')
.then(response => response.json())
.then(posts => {
    let postList = document.getElementById('post-list');
    
    const currentUrl = window.location.search;
    let filteredPosts = posts.posts;

    if (currentUrl.includes('action=Menu')) {
        filteredPosts = filteredPosts.slice(0, 5);
    }

    const itemsPerPage = 10; // Số sản phẩm mỗi trang
    let currentPage = 1; // Trang hiện tại
    const totalPages = Math.ceil(filteredPosts.length / itemsPerPage);

    // Hàm hiển thị sản phẩm theo trang
    const renderProducts = () => {
        postList.innerHTML = ''; // Xóa nội dung cũ

        let productsToDisplay = filteredPosts; 

        // Nếu URL chứa `action=Menu`, giới hạn 5 sản phẩm
        if (!currentUrl.includes('action=Menu')) {
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            productsToDisplay = filteredPosts.slice(start, end);
        }

        console.log(productsToDisplay);

        filteredPosts.forEach(post => {
            postList.innerHTML += `
                <tr onclick="window.location.href='index.php?controller=admin&action=viewPostDetail&idPost=${post.id}'">
                    <td>${post.id}</td>
                    <td>${post.title}</td>
                    <td class="news-content">
                        <p>${post.content}</p>
                    </td>
                    <td>${post.created_at}</td>
                </tr>
            `;
        });
    };

    if (!currentUrl.includes('action=Menu')) {
        // Hàm cập nhật trạng thái nút
        const updateButtons = () => {
            document.getElementById('prev-page').disabled = currentPage === 1;
            document.getElementById('next-page').disabled = currentPage === totalPages;
        };

        // Xử lý khi nhấn nút phân trang
        document.getElementById('prev-page').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderProducts();
                updateButtons();
            }
        });

        document.getElementById('next-page').addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                renderProducts();
                updateButtons();
            }
        });

        updateButtons();
    }

    // Khởi tạo lần đầu
    renderProducts();
})
.catch(error => console.error('Lỗi tải dữ liệu:', error));