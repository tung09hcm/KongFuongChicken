let salesChart = null; // Biến toàn cục để lưu trữ biểu đồ

const currentMonth = new Date().getMonth() + 1;
const monthSelect = document.querySelector('#month select');
monthSelect.value = currentMonth;

fetch('index.php?controller=Admin&action=getSalesData&month=' + encodeURIComponent(currentMonth))
.then(response => response.json())
.then(data => {
    const labels = data.salesData.map(item => {
        // Nếu order_date có định dạng "YYYY-MM-DD" hoặc "YYYY-MM-DD HH:MM:SS"
        const date = new Date(item.order_date);
        return date.getDate(); // Trả về chỉ phần ngày trong tháng
    });
    const sales = data.salesData.map(item => {
        return item.total_sales/1000;
    }); // Lấy danh sách doanh thu

    // Gọi hàm vẽ đồ thị với dữ liệu đã chuẩn hóa
    drawChart(labels, sales);
})

document.querySelector('#month select').addEventListener('change', function () {
    const selectedMonth = this.value;

    fetch('index.php?controller=Admin&action=getSalesData&month=' + encodeURIComponent(monthSelect.value))
    .then(response => response.json())
    .then(data => {
        // Chuyển đổi dữ liệu để phù hợp với Chart.js
        const labels = data.salesData.map(item => {
            // Nếu order_date có định dạng "YYYY-MM-DD" hoặc "YYYY-MM-DD HH:MM:SS"
            const date = new Date(item.order_date);
            return date.getDate(); // Trả về chỉ phần ngày trong tháng
        });
        const sales = data.salesData.map(item => {
            return item.total_sales/1000;
        }); // Lấy danh sách doanh thu
        // Gọi hàm vẽ đồ thị với dữ liệu đã chuẩn hóa
        drawChart(labels, sales);
    })
});

function drawChart(labels, sales) {

    // Kiểm tra và hủy biểu đồ nếu đã tồn tại
    if (salesChart) {
        salesChart.destroy();
    }
    
    const data = {
        labels: labels,
        datasets: [{
            label: 'Doanh thu theo ngày',
            data: sales,
            borderColor: '#e4002b',
            backgroundColor: '#e4002a41',
            fill: true,
        }]
    };
    
    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Ngày'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Doanh thu (nghìn VNĐ)'
                    }
                }
            }
        }
    };
    
    salesChart = new Chart(
        document.getElementById('salesChart'),
        config
    );
    
}