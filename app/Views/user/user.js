// Modal overlay
const updateAccountBtn = document.getElementById('updateAccountBtn');
const modalOverlay = document.getElementById('modalOverlay');
const closeBtn = document.getElementById('closeBtn');

// Hiển thị khung thông báo khi nhấn nút "Cập nhật tài khoản"
updateAccountBtn.addEventListener('click', () => {
    event.preventDefault();
    modalOverlay.style.display = 'flex';
});

// Đóng khung thông báo khi nhấn nút "X"
closeBtn.addEventListener('click', () => {
    modalOverlay.style.display = 'none';
});

// Đóng khung thông báo khi nhấn bên ngoài modal-box
modalOverlay.addEventListener('click', (event) => {
    if (event.target === modalOverlay) {
    modalOverlay.style.display = 'none';
    }
});