// Tải dữ liệu từ API
fetch('api/getProduct.php')
.then(response => response.json())
.then(products => {
    let productList = document.getElementById('card-items');
    products.forEach(product => {
        productList.innerHTML += `
            <div class="item" onclick="window.location.href='dish.php?id=${product.id}'">
                <img src="${product.image_link}" alt="">
                <h4>${product.name}</h4>
                <div class="info">
                    <p class="price-product">${Number(product.price).toLocaleString()}đ</p>
                    <p class="description-product">${product.description}</p>
                    <h5>Orders <span>15</span></h5>
                </div>
            </div>
        `;
    });
})
.catch(error => console.error('Lỗi tải dữ liệu:', error));