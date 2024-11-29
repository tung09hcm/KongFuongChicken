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

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "app/Views/admin/api/updateStatus.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Encode status and orderId as URL-encoded parameters
    const params = `status=${encodeURIComponent(status)}&orderId=${encodeURIComponent(orderId)}`;
    
    // Send the data to the PHP script
    xhr.send(params);

    // Handle the response
    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log("Status updated successfully");
        } else {
            console.error("Error updating status: ", xhr.responseText);
        }
    };
}


// Tải dữ liệu từ API
fetch('app/Views/admin/api/getOrder.php')
.then(response => response.json())
.then(orders => {
    let orderList = document.getElementById('order-list');
    
    orders.forEach(order => {
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
    fetch(`app/Views/admin/api/getOrderDetail.php?id=${orderId}`)
    .then(response => {
        if (!response.ok) {
            console.error(`Server error: ${response.status}`);
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const contentType = response.headers.get("content-type");
        if (!contentType || !contentType.includes("application/json")) {
            throw new Error("Phản hồi không phải JSON");
        }
        return response.json();
    })
    .then(data => {

        let orderDetail = document.getElementById('popup');
        orderDetail.innerHTML = `
            <div class="id-order">
                <h3>${data.order_id}</h3>
                <svg onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg> 
            </div>
            <h3>Tên khách hàng: <span>${data.customer_name}</span></h3>
            <h5>Địa chỉ: <span>${data.customer_address}</span></h5>
            <h5>Tình trạng: <span>${data.status}</span></h5>
            <h5>Thời gian đặt: <span>${data.order_date}</span></h5>
            <div class="sumary">
                <h3>Tóm tắt đơn hàng</h3>
                <div class="detail">
                    ${data.items && data.items.length > 0 
                    ? data.items.map(detail => `
                        <div class="dish-name">
                            <h5>${detail.quantity}x ${detail.product_name}</h5>
                            <h5>${Number(detail.item_total).toLocaleString()}đ</h5>
                        </div>
                        `).join('')
                    : ''}
                </div>
                <div class="dish-name">
                    <h5>Tổng đơn hàng</h5>
                    <span>${Number(data.total).toLocaleString()}đ</span>
                </div>
                <div class="dish-name">
                    <h5>Phí giao hàng</h5>
                    <span>10.000đ</span>
                </div>
                <div class="dish-name">
                    <h5>Khuyến mãi</h5>
                    <span>${data.discount_code ? data.discount_percentage + '%' : 'Không'}</span>
                </div>
                <div class="dish-name">
                    <h5>Thành tiền</h5>
                    <span>${Number(data.total*data.discount_percentage).toLocaleString()}đ</span>
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