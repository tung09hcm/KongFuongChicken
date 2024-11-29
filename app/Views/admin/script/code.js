//DONE Tải dữ liệu từ API
fetch('index.php?controller=admin&action=manageDiscounts')
.then(response => response.json())
.then(codes => {
    let codeList = document.getElementById('code-list');
    codes.discounts.forEach(code => {
        codeList.innerHTML += `
            <tr onclick="selectDiscount(${code.id})">
                <td>${code.id}</td>
                <td>${code.code}</td>
                <td>${code.percentage}</td>
                <td>${code.expiry_date}</td>
            </tr>
        `;
    });
})
.catch(error => console.error('Lỗi tải dữ liệu:', error));


// BỊ gì á what the fuck
function selectDiscount(id) {
    // Tạo một POST request gửi ID đến server
    console.log("index.php?controller=admin&action=getDiscount&idDiscount=" + encodeURIComponent(id));
    fetch("index.php?controller=admin&action=getDiscount&idDiscount=" + encodeURIComponent(id))
    .then((response) => response.json())
    .then((data) => {
        // Điền thông tin vào form
        if (data.success) {
            document.getElementById('id').value = data.discount.id;
            document.getElementById('code').value = data.discount.code;
            document.getElementById('percentage').value = data.discount.percentage;
            document.getElementById('expiry_date').value = data.discount.expiry_date;
        } else {
            alert('Không tìm thấy mã giảm giá!');
        }
    })
    .catch((error) => {
        console.error('Lỗi:', error);
        alert('Đã xảy ra lỗi khi lấy dữ liệu.');
    });
}