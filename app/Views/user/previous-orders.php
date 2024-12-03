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

    <div class="container no-products-ordered my-5 hide-on-tablet-desktop">
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
                    <a class="user-edit-item active" href="index.php?controller=user&action=previousOrders">Đơn hàng đã đặt</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=Addresses">Địa chỉ của bạn</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=Profile">Chi tiết tài khoản</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=resetPassword">Đặt lại mật khẩu</a>
                    <a class="user-edit-item" href="index.php?controller=user&action=delete">Xóa tài khoản</a>
                </nav>
            </div>
        </div>
        <h2 class="no-products-ordered-title">CÁC ĐƠN HÀNG ĐÃ ĐẶT</h2>
        <div class="row no-products-ordered-container">
            <div class="col">
                <div class="no-products-ordered-info">
                    <div class="no-products-ordered-cart-title">
                        <P>BẮT ĐẦU ĐẶT MÓN!</p>
                        <button type="button" class="no-products-ordered-btn mt-3" onclick="location.href='index.php?controller=user&action=Product&section=uudai'">Bắt đầu đặt hàng</button>
                    </div>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Khuyến mãi</th>
                                    <th>Tình trạng</th>
                                    <th>Giá tiền</th>
                                </tr>
                            </thead>
            
                            <tbody id="order-list1"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="no-products-ordered-img">
                    <div class="no-products-ordered-cart-img">
                        <img src="https://static.kfcvietnam.com.vn/images/web/empty-cart.png?v=5.0" alt="">
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
                        <a class="user-edit-item active" href="index.php?controller=user&action=previousOrders">Đơn hàng đã đặt</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=Addresses">Địa chỉ của bạn</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=Profile">Chi tiết tài khoản</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=resetPassword">Đặt lại mật khẩu</a>
                        <a class="user-edit-item" href="index.php?controller=user&action=delete">Xóa tài khoản</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-title ">CÁC ĐƠN HÀNG ĐÃ ĐẶT</h2>
                    <div class="favourite-orders">
                        <div class="favourite-orders-title">
                            <p>BẮT ĐẦU ĐẶT MÓN!</p>
                            <button type="button" class="no-products-ordered-btn mt-3" onclick="location.href='index.php?controller=user&action=Product&section=uudai'">Bắt đầu đặt hàng</button>
                        </div>
                        <div class="favourite-orders-img">
                            <img src="https://static.kfcvietnam.com.vn/images/web/empty-cart.png?v=5.0" alt="">
                        </div>
                        <div class="table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Khuyến mãi</th>
                                        <th>Tình trạng</th>
                                        <th>Giá tiền</th>
                                    </tr>
                                </thead>
                
                                <tbody id="order-list2"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /*popup*/ -->
    <div class="overlay" id="overlay"></div>

    <div class="popup" id="popup"></div>

    <!-- Footer -->
    <?php 
        include 'app/Views/partials/footer.php';
    ?>

    <!-- Link Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        // DONE Tải dữ liệu từ API
        fetch('index?controller=user&action=getAllOrdersForUser')
        .then(response => response.json())
        .then(orders => {
            document.querySelector('.no-products-ordered-cart-title').remove();
            document.querySelector('.no-products-ordered-cart-img').remove();
            document.querySelector('.favourite-orders-img').remove();
            document.querySelector('.favourite-orders-title').remove();
            let orderList1 = document.getElementById('order-list1');
            let orderList2 = document.getElementById('order-list2');

            let filteredProducts = orders.orders;

            // Hàm hiển thị sản phẩm theo trang
            const renderProducts = () => {
                orderList1.innerHTML = ''; // Xóa nội dung cũ

                let productsToDisplay = filteredProducts; 

                productsToDisplay.forEach(order => {
                    orderList1.innerHTML += `
                        <tr>
                            <td onclick="showPopup('${order.order_id}')">${order.order_id}</td>
                            <td onclick="showPopup('${order.order_id}')">${order.customer_address}</td>
                            <td onclick="showPopup('${order.order_id}')">${Number(order.percentage*100)}%</td>
                            <td>
                                <select value="${order.status}" disabled>
                                    <option value="Pending" ${order.status === 'Pending' ? 'selected' : ''}>Đang chờ</option>
                                    <option value="Processing" ${order.status === 'Processing' ? 'selected' : ''}>Đang thực hiện</option>
                                    <option value="Shipped" ${order.status === 'Shipped' ? 'selected' : ''}>Đang giao</option>
                                    <option value="Delivered" ${order.status === 'Delivered' ? 'selected' : ''}>Đã giao</option>
                                    <option value="Cancelled" ${order.status === 'Cancelled' ? 'selected' : ''}>Hủy</option>
                                </select>
            
                            </td>
                            <td onclick="showPopup('${order.order_id}')">${Number(order.order_total + 10000).toLocaleString()}đ</td>
                        </tr>
                    `;
                    orderList2.innerHTML += `
                        <tr>
                            <td onclick="showPopup('${order.order_id}')">${order.order_id}</td>
                            <td onclick="showPopup('${order.order_id}')">${order.customer_address}</td>
                            <td onclick="showPopup('${order.order_id}')">${Number(order.percentage*100)}%</td>
                            <td>
                                <select value="${order.status}" disabled>
                                    <option value="Pending" ${order.status === 'Pending' ? 'selected' : ''}>Đang chờ</option>
                                    <option value="Processing" ${order.status === 'Processing' ? 'selected' : ''}>Đang thực hiện</option>
                                    <option value="Shipped" ${order.status === 'Shipped' ? 'selected' : ''}>Đang giao</option>
                                    <option value="Delivered" ${order.status === 'Delivered' ? 'selected' : ''}>Đã giao</option>
                                    <option value="Cancelled" ${order.status === 'Cancelled' ? 'selected' : ''}>Hủy</option>
                                </select>
            
                            </td>
                            <td onclick="showPopup('${order.order_id}')">${Number(order.order_total + 10000).toLocaleString()}đ</td>
                        </tr>
                    `;
                });
            };
            // Khởi tạo lần đầu
            renderProducts();
        })
        .catch(error => console.error('Lỗi tải dữ liệu:', error));

        // Hàm hiển thị popup
        function showPopup(orderId) {
            fetch("index.php?controller=order&action=getProductInOrder&orderId=" + encodeURIComponent(orderId))
            .then((response) => response.json())
            .then(data => {
                let orderDetail = document.getElementById('popup');

                orderDetail.innerHTML = `
                    <div class="id-order">
                        <svg onclick="closePopup()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg> 
                    </div>
                    <div class="sumary">
                        <h3>Tóm tắt đơn hàng</h3>
                        <div class="detail">
                            ${data.orders && data.order.length > 0 
                            ? data.orders.map(detail => `
                                <div class="dish-name">
                                    <h5>${detail.quantity}x ${detail.product_name}</h5>
                                    <h5>${Number(detail.price * detail.quantity).toLocaleString()}đ</h5>
                                </div>
                                `).join('')
                            : ''}
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
    </script>
</body>
</html>