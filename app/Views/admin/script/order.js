// DONE
function changeColor(selectElement, orderId) {
    const value = selectElement.value;
    
    // Reset background color to a default color
    selectElement.style.backgroundColor = '';

    if (value == "Pending") {
        selectElement.style.border = '3px solid #f1c40f'; // Yellow for "Đang chờ"
    } else if (value == "Processing") {
        selectElement.style.border = '3px solid #3498db'; // Blue for "Đang giao"
    } else if (value == "Shipped") {
        selectElement.style.border = '3px solid #2e3bcc'; // Green for "Đã giao"
    } else if (value == "Delivered") {
        selectElement.style.border = '3px solid #2ecc71'; // Green for "Đã giao"
    } else if (value == "Cancelled") {
        selectElement.style.border = '3px solid #cc2e2e'; // Green for "Đã giao"
    }

    // Update the database with the new status
    updateStatusInDB(value, orderId);
}
//DONE
function updateStatusInDB(status, orderId) {
    fetch("index.php?controller=admin&action=updateStatus&idOrder=" + encodeURIComponent(orderId) + "&status=" + encodeURIComponent(status))
    .then((response) => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert('Lỗi khi tải dữ liệu!');
    });
}


// DONE Tải dữ liệu từ API
fetch('index?controller=admin&action=getAllOrders')
.then(response => response.json())
.then(orders => {
    let orderList = document.getElementById('order-list');

    const currentUrl = window.location.search;

    // Nếu URL chứa `action=Menu`, giới hạn 5 sản phẩm
    if (currentUrl.includes('action=Menu')) {
        orders.orders = orders.orders.slice(0, 5);
    }
    
    orders.orders.forEach(order => {
        orderList.innerHTML += `
            <tr>
                <td onclick="showPopup('${order.order_id}')">${order.order_id}</td>
                <td onclick="showPopup('${order.order_id}')">${order.customer_name}</td>
                <td onclick="showPopup('${order.order_id}')">${order.customer_address}</td>
                <td>
                    <select onchange="changeColor(this, ${order.order_id})" value="${order.status}">
                        <option value="Pending" ${order.status === 'Pending' ? 'selected' : ''}>Đang chờ</option>
                        <option value="Processing" ${order.status === 'Processing' ? 'selected' : ''}>Đang thực hiện</option>
                        <option value="Shipped" ${order.status === 'Shipped' ? 'selected' : ''}>Đang giao</option>
                        <option value="Delivered" ${order.status === 'Delivered' ? 'selected' : ''}>Đã giao</option>
                        <option value="Cancelled" ${order.status === 'Cancelled' ? 'selected' : ''}>Hủy</option>
                    </select>

                </td>
                <td onclick="showPopup('${order.order_id}')">${Number(order.order_total).toLocaleString()}đ</td>
            </tr>
        `;
    });
})
.catch(error => console.error('Lỗi tải dữ liệu:', error));

// Hàm hiển thị popup
function showPopup(orderId) {
    fetch("index.php?controller=admin&action=getOrderDetail&idOrder=" + encodeURIComponent(orderId))
    .then((response) => response.json())
    .then(data => {
        let orderDetail = document.getElementById('popup');

        const discountPercentage = data.order.discount_percentage || 0; // Nếu không có, mặc định là 0
        const total = data.order.total || 0; // Tổng giá trị đơn hàng
        const discount = total * discountPercentage; // Số tiền giảm giá
        const finalTotal = total - discount + 10000; // Thành tiền sau giảm giá + phí 10,000

        // Định dạng số theo kiểu tiền tệ
        const formattedDiscount = discountPercentage > 0 ? (discountPercentage * 100).toLocaleString() + '%' : 'Không';
        const formattedTotal = finalTotal.toLocaleString() + 'đ';

        orderDetail.innerHTML = `
            <div class="id-order">
                <h3>${data.order.order_id}</h3>
                <svg onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg> 
            </div>
            <h3>Tên khách hàng: <span>${data.order.customer_name}</span></h3>
            <h5>Địa chỉ: <span>${data.order.customer_address}</span></h5>
            <h5>Tình trạng: <span>${data.order.status}</span></h5>
            <h5>Thời gian đặt: <span>${data.order.order_date}</span></h5>
            <div class="sumary">
                <h3>Tóm tắt đơn hàng</h3>
                <div class="detail">
                    ${data.order.items && data.order.items.length > 0 
                    ? data.order.items.map(detail => `
                        <div class="dish-name">
                            <h5>${detail.quantity}x ${detail.product_name}</h5>
                            <h5>${Number(detail.item_total).toLocaleString()}đ</h5>
                        </div>
                        `).join('')
                    : ''}
                </div>
                <div class="dish-name">
                    <h5>Tổng đơn hàng</h5>
                    <span>${Number(data.order.total).toLocaleString()}đ</span>
                </div>
                <div class="dish-name">
                    <h5>Phí giao hàng</h5>
                    <span>10.000đ</span>
                </div>
                <div class="dish-name">
                    <h5>Khuyến mãi</h5>
                    <span>${formattedDiscount}</span>
                </div>
                <div class="dish-name">
                    <h5>Thành tiền</h5>
                    <span>${formattedTotal}</span>
                </div>
            </div>
        `;

        orderDetail.style.display = 'block';
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert('Lỗi khi tải dữ liệu!');
    });

}

// Đóng popup
function closePopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'none';
}