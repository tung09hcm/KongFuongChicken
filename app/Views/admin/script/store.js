//DONE Tải dữ liệu từ API
fetch('index.php?controller=admin&action=manageStoreAndAdmin')
.then(response => response.json())
.then(stores => {
    let storeList = document.getElementById('store-list');
    stores.stores.forEach(store => {
        storeList.innerHTML += `
            <tr onclick="selectStore(${store.store_id})">
                <td>${store.store_id}</td>
                <td>${store.store_name}</td>
                <td>${store.store_address}</td>
                <td>${store.admin_name}</td>
                <td>${store.store_phone}</td>
                <td>${store.admin_email}</td>
            </tr>
        `;
    });
})
.catch(error => console.error('Lỗi tải dữ liệu:', error));

function selectStore(id) {
    // Tạo một POST request gửi ID đến server
    fetch("index.php?controller=admin&action=getStoreAndAdmin&idStore=" + encodeURIComponent(id))
    .then((response) => response.json())
    .then((data) => {
        // Điền thông tin vào form
        if (data.success) {
            document.getElementById('deleteStore').style.display = 'inline';
            document.getElementById('pass-input').style.display = 'none';

            document.getElementById('idStore').value = data.store.store_id;
            document.getElementById('idAdmin').value = data.store.admin_id;

            document.getElementById('name').value = data.store.store_name;
            document.getElementById('address').value = data.store.store_address;
            document.getElementById('store-phone').value = data.store.store_phone;
            document.getElementById('opening_hours').value = data.store.store_opening_hours;

            document.getElementById('first_name').value = data.store.admin_first_name;
            document.getElementById('last_name').value = data.store.admin_last_name;
            document.getElementById('admin-phone').value = data.store.admin_phone;
            document.getElementById('email').value = data.store.admin_email;
        } else {
            alert('Không tìm thấy cửa hàng!');
        }
    })
    .catch((error) => {
        console.error('Lỗi:', error);
        alert('Đã xảy ra lỗi khi lấy dữ liệu.');
    });
}

function reset() {
    // Ẩn nút delete khi form được reset
    document.getElementById('deleteStore').style.display = 'none';
    document.getElementById('pass-input').style.display = 'block';
    // Reset form
    document.getElementById('idStore').value = "";
    document.getElementById('idAdmin').value = "";

    document.getElementById('name').value = "";   
    document.getElementById('address').value = "";
    document.getElementById('store-phone').value = "";
    document.getElementById('opening_hours').value = "";

    document.getElementById('first_name').value = "";
    document.getElementById('last_name').value = "";
    document.getElementById('admin-phone').value = "";
    document.getElementById('email').value = "";
}

function saveStore() {
    const idStore = document.getElementById('idStore').value;
    const idAdmin = document.getElementById('idAdmin').value;

    const actionUrl = ((idStore > 0) && (idAdmin > 0))
        ? `index.php?controller=admin&action=updateStoreAndAdmin&idStore=${encodeURIComponent(idStore)}&idAdmin=${encodeURIComponent(idAdmin)}`
        : `index.php?controller=admin&action=addStoreAndAdmin`;

    // Lấy form bằng ID
    const formElement = document.getElementById('store-detail-form');

    // Tạo FormData từ form
    const formData = new FormData(formElement);

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

function deleteStore() {
    const idStore = document.getElementById('idStore').value;
    const idAdmin = document.getElementById('idAdmin').value;

    const actionUrl = `index.php?controller=admin&action=deleteStoreAndAdmin&idStore=${encodeURIComponent(idStore)}&idAdmin=${encodeURIComponent(idAdmin)}`;

    // Gửi form bằng Fetch API
    fetch(actionUrl)
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