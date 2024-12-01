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

        <?php 
            include 'app/Views/partials/footer.php';
        ?>
    </div>

    <script>
        fetch('index?controller=admin&action=manageUsers')
        .then(response => response.json())
        .then(customers => {
            let customerList = document.getElementById('customer-list');
            console.log(customers);
            customers.users.forEach(customer => {
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
        })
        .catch(error => console.error('Lỗi tải dữ liệu:', error));
    </script>
</body>
</html>