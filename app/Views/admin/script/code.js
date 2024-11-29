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


function selectDiscount(id) {
    // Tạo một POST request gửi ID đến server
    fetch("index.php?controller=admin&action=getDiscount&idDiscount=" + encodeURIComponent(id))
    .then((response) => response.json())
    .then((data) => {
        // Điền thông tin vào form
        if (data.success) {
            document.getElementById('deleteDiscount').style = 'inline';
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

document.getElementById('discount-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Ngăn không cho form tải lại trang
    
    const id = document.getElementById('id').value;
    const actionUrl = id > 0
        ? `index.php?controller=admin&action=editDiscount&idDiscount=${encodeURIComponent(id)}`
        : `index.php?controller=admin&action=addDiscount`;

    // Tạo FormData để gửi dữ liệu
    const formData = new FormData(this);

    // Gửi form bằng Fetch API
    fetch(actionUrl, {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json()) // Giả sử server trả về JSON
    .then(data => {
        if (data.status) {
            // Điều hướng khi thành công
            window.location.href = 'index.php?controller=admin&action=Menu';
        } else {
            alert(data.message); // Hiển thị thông báo lỗi
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
        alert('Có lỗi xảy ra khi gửi dữ liệu.');
    });
});


function deleteDiscount() {
    event.preventDefault(); // Ngăn không cho form tải lại trang
    
    const form = document.getElementById('discount-form');
    const id = document.getElementById('id').value;

    const actionUrl = `index.php?controller=admin&action=deleteDiscount&idDiscount=${encodeURIComponent(id)}`;                ;

    // Tạo FormData để gửi dữ liệu
    const formData = new FormData(form);

    // Gửi form bằng Fetch API
    fetch(actionUrl, {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json()) // Giả sử server trả về JSON
    .then(data => {
        if (data.status) {
            // Điều hướng khi thành công
            window.location.href = 'index.php?controller=admin&action=Menu';
        } else {
            alert(data.message); // Hiển thị thông báo lỗi
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
        alert('Có lỗi xảy ra khi gửi dữ liệu.');
    });
}