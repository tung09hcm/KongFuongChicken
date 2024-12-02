// Lấy URL hiện tại
const currentUrl = window.location.search;

// Tải dữ liệu từ API
fetch('index.php?controller=admin&action=manageProducts')
.then(response => response.json())
.then(products => {
    let productList = document.getElementById('card-items');
    let filteredProducts = products.products;

    // Nếu URL chứa `action=Menu`, giới hạn 5 sản phẩm
    if (currentUrl.includes('action=Menu')) {
        filteredProducts = filteredProducts.slice(0, 5);
    }

    const itemsPerPage = 10; // Số sản phẩm mỗi trang
    let currentPage = 1; // Trang hiện tại
    const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);

    // Hàm hiển thị sản phẩm theo trang
    const renderProducts = () => {
        productList.innerHTML = ''; // Xóa nội dung cũ

        let productsToDisplay = filteredProducts; 

        // Nếu URL chứa `action=Menu`, giới hạn 5 sản phẩm
        if (!currentUrl.includes('action=Menu')) {
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            productsToDisplay = filteredProducts.slice(start, end);
        }

        console.log(productsToDisplay);

        productsToDisplay.forEach(product => {
            productList.innerHTML += `
                <div class="item" onclick="window.location.href='index.php?controller=admin&action=viewProduct&idProduct=${product.id}'">
                    <img src="${product.image_link}" alt="">
                    <h4>${product.name}</h4>
                    <div class="info">
                        <p class="price-product">${Number(product.price).toLocaleString()}đ</p>
                        <p class="description-product">${product.description}</p>
                    </div>
                </div>
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
