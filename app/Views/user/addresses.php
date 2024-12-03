<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Gà Rán KFC, Giao Hàng Tận Nơi | KFC Việt Nam</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <!-- Link css header -->
    <link rel="stylesheet" href="app/Views/partials/partials.css">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css">
    <!-- Link css user -->
    <link rel="stylesheet" href="app/Views/user/user.css">
    <link rel="stylesheet" href="app/Views/user/user_responsive.css">
    <!-- Link Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <?php 
        include 'app/Views/partials/header.php';
    ?>

    <!-- Address on mobile -->
    <div class="container hide-on-tablet-desktop">
        <div class="row user-info">
            <div class="col user-edit-sidebar text-center">
                <div class="row user-edit-sidebar-info">
                    <div class="col user-edit-sidebar-info-avt">
                        <img src="https://tmssl.akamaized.net//images/foto/galerie/cristiano-ronaldo-im-trikot-von-portugal-1718197560-139337.jpg?lm=1718197575" alt="Profile" class="rounded-circle mb-3 user-edit-img">
                    </div>
                    <div class="col user-edit-sidebar-info-name">
                        <h3>Xin chào</h3>
                        <a class="user-edit-logout" href="#">Đăng xuất</a>
                    </div>
                </div>
                <nav class="user-select mt-4">
                    <a class="user-edit-item" href="index.php?controller=user&action=previousOrders">Đơn hàng đã đặt</a>
                    <a class="user-edit-item active" href="index.php?controller=user&action=Addresses">Địa chỉ của bạn</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=Profile">Chi tiết tài khoản</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=resetPassword">Đặt lại mật khẩu</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=delete">Xóa tài khoản</a>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="form-container">
                <h2 class="form-title">ĐỊA CHỈ GIAO HÀNG ĐÃ LƯU</h2>
                <div id="address-list1"></div>
                <button class="btn btn-primary" id="add-address-btn1">Thêm địa chỉ</button>
            </div>

            <!-- Modal thêm địa chỉ -->
            <div id="address-modal1" style="display: none;">
                <div class="modal-content">
                    <h3>Thêm địa chỉ mới</h3>
                    <input type="text" id="new-address1" class="form-control" placeholder="Nhập địa chỉ mới">
                    <div>
                        <button class="btn btn-success" id="save-address-btn1">Lưu</button>
                        <button class="btn btn-secondary" id="cancel-address-btn1">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main -->
    <div class="container my-5 hide-on-mobile">
        <div class="row user-edit">
            <div class="col-md-4">
                <div class="user-edit-sidebar text-center">
                    <img src="https://tmssl.akamaized.net//images/foto/galerie/cristiano-ronaldo-im-trikot-von-portugal-1718197560-139337.jpg?lm=1718197575" alt="Profile" class="rounded-circle mb-3 user-edit-img">
                    <h3>Xin chào</h3>
                    <a class="user-edit-logout" href="#">Đăng xuất</a>
                    <nav class="nav flex-column mt-4">
                        <a class="user-edit-item" href="index.php?controller=user&action=previousOrders">Đơn hàng đã đặt</a>
                        <a class="user-edit-item active" href="index.php?controller=user&action=Addresses">Địa chỉ của bạn</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=Profile">Chi tiết tài khoản</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=resetPassword">Đặt lại mật khẩu</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=delete">Xóa tài khoản</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-title">ĐỊA CHỈ GIAO HÀNG ĐÃ LƯU</h2>
                    <div id="address-list"></div>
                    <button class="btn btn-primary" id="add-address-btn">Thêm địa chỉ</button>
                </div>

                <!-- Modal thêm địa chỉ -->
                <div id="address-modal" style="display: none;">
                    <div class="modal-content">
                        <h3>Thêm địa chỉ mới</h3>
                        <input type="text" id="new-address" class="form-control" placeholder="Nhập địa chỉ mới">
                        <div>
                            <button class="btn btn-success" id="save-address-btn">Lưu</button>
                            <button class="btn btn-secondary" id="cancel-address-btn">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php 
        include 'app/Views/partials/footer.php';
    ?>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        // Khởi tạo danh sách địa chỉ
        let addressList = [];
        let addressList1 = [];

        fetch('index.php?controller=user&action=getAddresses')
        .then(response => response.json())
        .then(data => {
            addressList = data.addresses;
            addressList1 = data.addresses;
            renderAddressList();
        });

        // Render danh sách địa chỉ
        function renderAddressList() {
            const addressContainer = document.getElementById('address-list');
            addressContainer.innerHTML = ''; // Xóa nội dung cũ
            const addressContainer1 = document.getElementById('address-list1');
            addressContainer1.innerHTML = ''; // Xóa nội dung cũ

            addressList.forEach((address, index) => {
                const addressItem = document.createElement('div');
                addressItem.classList.add('address-item', 'd-flex', 'justify-content-between', 'align-items-center');

                addressItem.innerHTML = `
                    <span>${address.address}</span>
                    <div>
                        <button class="btn btn-sm btn-primary edit-btn" data-index="${index}">Sửa</button>
                        <button class="btn btn-sm btn-danger delete-btn" data-index="${index}">Xóa</button>
                    </div>
                `;
                addressContainer.appendChild(addressItem);
            });
            addressList1.forEach((address, index) => {
                const addressItem1 = document.createElement('div');
                addressItem1.classList.add('address-item1', 'd-flex', 'justify-content-between', 'align-items-center');

                addressItem1.innerHTML = `
                    <span>${address.address}</span>
                    <div>
                        <button class="btn btn-sm btn-primary edit-btn1" data-index="${index}">Sửa</button>
                        <button class="btn btn-sm btn-danger delete-btn1" data-index="${index}">Xóa</button>
                    </div>
                `;
                addressContainer1.appendChild(addressItem1);
            })

            // Thêm sự kiện sửa và xóa
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', handleEditAddress);
            });

            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', handleDeleteAddress);
            });

            document.querySelectorAll('.edit-btn1').forEach(btn => {
                btn.addEventListener('click', handleEditAddress1);
            });

            document.querySelectorAll('.delete-btn1').forEach(btn => {
                btn.addEventListener('click', handleDeleteAddress1);
            });
        }

        // Hiển thị modal thêm địa chỉ
        document.getElementById('add-address-btn').addEventListener('click', () => {
            document.getElementById('address-modal').style.display = 'block';
        });

        // Hủy thêm địa chỉ
        document.getElementById('cancel-address-btn').addEventListener('click', () => {
            document.getElementById('address-modal').style.display = 'none';
        });

        // Hiển thị modal thêm địa chỉ
        document.getElementById('add-address-btn1').addEventListener('click', () => {
            document.getElementById('address-modal1').style.display = 'block';
        });

        // Hủy thêm địa chỉ
        document.getElementById('cancel-address-btn1').addEventListener('click', () => {
            document.getElementById('address-modal1').style.display = 'none';
        });

        // Lưu địa chỉ mới
        document.getElementById('save-address-btn').addEventListener('click', () => {
            const newAddress = document.getElementById('new-address').value.trim();
            if (newAddress) {
                document.getElementById('new-address').value = '';
                document.getElementById('address-modal').style.display = 'none';

                const data = new FormData();
                data.append('address', newAddress);
                fetch('index.php?controller=user&action=addAddress', {
                    method: 'POST',
                    body: data
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status === 'success') {
                        alert('Đã thêm địa chỉ thành công!');
                        location.reload(); // Tải lại trang sau khi thêm
                    } else {
                        alert('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                })
            } else {
                alert('Vui lòng nhập địa chỉ hợp lệ.');
            }
        });

        // Lưu địa chỉ mới
        document.getElementById('save-address-btn1').addEventListener('click', () => {
            const newAddress = document.getElementById('new-address1').value.trim();
            
            if (newAddress) {
                document.getElementById('new-address1').value = '';
                document.getElementById('address-modal1').style.display = 'none';

                const data = new FormData();
                data.append('address', newAddress);
                fetch('index.php?controller=user&action=addAddress', {
                    method: 'POST',
                    body: data
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status === 'success') {
                        alert('Đã thêm địa chỉ thành công!');
                        location.reload(); // Tải lại trang sau khi thêm
                    } else {
                        alert('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                })
            } else {
                alert('Vui lòng nhập địa chỉ hợp lệ.');
            }
        });

        // Xóa địa chỉ
        function handleDeleteAddress(event) {
            const index = event.target.dataset.index;

            const data = new FormData();
            data.append('address', addressList[index].address);
            fetch('index.php?controller=user&action=deleteAddress', {
                method: 'POST',
                body: data
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    alert('Đã xóa địa chỉ thành công!');
                    //location.reload(); // Tải lại trang sau khi thêm
                } else {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            })
            addressList.splice(index, 1); // Xóa địa chỉ tại vị trí index
            renderAddressList();
        }

        // Xóa địa chỉ
        function handleDeleteAddress1(event) {
            const index = event.target.dataset.index;

            const data = new FormData();
            data.append('address', addressList[index].address);
            fetch('index.php?controller=user&action=deleteAddress', {
                method: 'POST',
                body: data
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    alert('Đã xóa địa chỉ thành công!');
                    //location.reload(); // Tải lại trang sau khi thêm
                } else {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            })
            addressList.splice(index, 1); // Xóa địa chỉ tại vị trí index
            renderAddressList();
        }

        // Sửa địa chỉ
        function handleEditAddress(event) {
            const index = event.target.dataset.index;
            const newAddress = prompt('Sửa địa chỉ:', addressList[index].address);
            if (newAddress) {
                addressList[index].address = newAddress;
                renderAddressList();
            }

            const data = new FormData();
            data.append('address', newAddress);
            data.append('address_id', addressList[index].id);
            fetch('index.php?controller=user&action=editAddress', {
                method: 'POST',
                body: data
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    alert('Đã sửa địa chỉ thành công!');
                    //location.reload(); // Tải lại trang sau khi thêm
                } else {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            })
        }

        // Sửa địa chỉ
        function handleEditAddress1(event) {
            const index = event.target.dataset.index;
            const newAddress = prompt('Sửa địa chỉ:', addressList[index].address);
            if (newAddress) {
                addressList[index].address = newAddress;
                renderAddressList();
            }

            const data = new FormData();
            data.append('address', newAddress);
            data.append('address_id', addressList[index].id);
            fetch('index.php?controller=user&action=editAddress', {
                method: 'POST',
                body: data
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    alert('Đã xóa địa chỉ thành công!');
                    //location.reload(); // Tải lại trang sau khi thêm
                } else {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            })
        }

        // Lần đầu render danh sách địa chỉ
        renderAddressList();
    </script>
</body>
</html>