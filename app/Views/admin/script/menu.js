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

    // Hiển thị sản phẩm
    filteredProducts.forEach(product => {
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
})
.catch(error => console.error('Lỗi tải dữ liệu:', error));
