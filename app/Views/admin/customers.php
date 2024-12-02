<!-- DONE -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/Views/admin/css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="app/Views/partials/partials_responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include 'app/Views/admin/navBar.php';
    ?>

    <div class="big-container">
        <h1>Thành viên</h1>

        <!-- /*order*/ -->
        <div class="contain2" style="margin-top: 0px;">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Mã khách hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Họ khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                        </tr>
                    </thead>
    
                    <tbody id="customer-list"></tbody>
                </table>
            </div>
        </div>

        <div id="pagination-controls">
            <button id="prev-page">Trang trước</button>
            <button id="next-page">Trang sau</button>
        </div>

        <!-- Modal chỉnh sửa -->
        <div id="edit-modal" class="modal" style="display: none;">
            <div class="modal-content">
                <span id="close-modal" class="close">&times;</span>
                <h2>Chỉnh sửa thông tin thành viên</h2>
                <form action="" method="POST" name="edit-form" id="edit-form">
                    <label for="edit-first-name">Tên:</label>
                    <input type="text" id="edit-first-name" name="first_name">
                    
                    <label for="edit-last-name">Họ:</label>
                    <input type="text" id="edit-last-name" name="last_name">
                    
                    <label for="edit-phone">Số điện thoại:</label>
                    <input type="text" id="edit-phone" name="phone">
                    
                    <label for="edit-email">Email:</label>
                    <input type="email" id="edit-email" name="email">
                    
                    <div class="button-group">
                        <button type="button" id="reset-button">RESET</button>
                        <button type="button" id="save-button">SAVE</button>
                        <button type="button" id="delete-button">DELETE</button>
                    </div>
                </form>
            </div>
        </div>


        <?php 
            include 'app/Views/partials/footer.php';
        ?>
    </div>

    <script>
        fetch('index?controller=admin&action=manageUsers')
        .then(response => response.json())
        .then(customers => {

            let customerList = document.getElementById('customer-list');
            
            const itemsPerPage = 10; // Số sản phẩm mỗi trang
            let currentPage = 1; // Trang hiện tại
            const totalPages = Math.ceil(customers.users.length / itemsPerPage);

            customers.users.forEach(customer => {
            
            });

            // Hàm hiển thị sản phẩm theo trang
            const renderProducts = () => {
                customerList.innerHTML = ''; // Xóa nội dung cũ

                let productsToDisplay = customers.users; 

                // Nếu URL chứa `action=Menu`, giới hạn 5 sản phẩm
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                productsToDisplay = customers.users.slice(start, end);

                productsToDisplay.forEach(customer => {
                    customerList.innerHTML += `
                        <tr>
                            <td>${customer.id}</td>
                            <td>${customer.first_name}</td>
                            <td>${customer.last_name}</td>
                            <td>${customer.phone}</td>
                            <td>${customer.email}</td>
                        </tr>;
                    `;
                });
            };

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

            // Khởi tạo lần đầu
            renderProducts();
        })
        .catch(error => console.error('Lỗi tải dữ liệu:', error));


        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('edit-modal');
            const closeModal = document.getElementById('close-modal');
            const resetButton = document.getElementById('reset-button');
            const saveButton = document.getElementById('save-button');
            const deleteButton = document.getElementById('delete-button');
            let selectedCustomer = null;

            // Mở modal khi nhấn vào một dòng
            document.getElementById('customer-list').addEventListener('click', (event) => {
                const row = event.target.closest('tr');
                if (!row) return;

                // Lấy dữ liệu từ dòng
                selectedCustomer = {
                    id: row.children[0].textContent,
                    first_name: row.children[1].textContent,
                    last_name: row.children[2].textContent,
                    phone: row.children[3].textContent,
                    email: row.children[4].textContent,
                };

                // Điền dữ liệu vào form
                document.getElementById('edit-first-name').value = selectedCustomer.first_name;
                document.getElementById('edit-last-name').value = selectedCustomer.last_name;
                document.getElementById('edit-phone').value = selectedCustomer.phone;
                document.getElementById('edit-email').value = selectedCustomer.email;

                // Hiển thị modal
                modal.style.display = 'flex';
            });

            // Đóng modal
            closeModal.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            // Nút RESET
            resetButton.addEventListener('click', () => {
                if (!selectedCustomer) return;
                document.getElementById('edit-first-name').value = selectedCustomer.first_name;
                document.getElementById('edit-last-name').value = selectedCustomer.last_name;
                document.getElementById('edit-phone').value = selectedCustomer.phone;
                document.getElementById('edit-email').value = selectedCustomer.email;
            });

            // Nút SAVE
            saveButton.addEventListener('click', () => {
                if (!selectedCustomer) return;

                const formElement = document.getElementById('edit-form');
                const formData = new FormData(formElement);

                // Gửi dữ liệu cập nhật lên server
                fetch('index.php?controller=admin&action=updateUser&idUser=' + encodeURIComponent(selectedCustomer.id), {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    alert('Thông tin khách hàng đã được cập nhật!');
                    modal.style.display = 'none';
                    location.reload();
                })
                .catch(error => console.error('Lỗi khi cập nhật khách hàng:', error));
            });

            // Nút DELETE
            deleteButton.addEventListener('click', () => {
                if (!selectedCustomer) return;

                // Xác nhận trước khi xóa
                if (confirm('Bạn có chắc chắn muốn xóa khách hàng này?')) {
                    fetch('index.php?controller=admin&action=deleteUser&id='+${selectedCustomer.id})
                    .then(response => response.json())
                    .then(data => {
                        alert('Khách hàng đã được xóa!');
                        modal.style.display = 'none';
                        location.reload();
                    })
                    .catch(error => console.error('Lỗi khi xóa khách hàng:', error));
                }
            });
        });

    </script>
</body>
</html>