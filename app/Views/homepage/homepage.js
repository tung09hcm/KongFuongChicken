let currentPosition = 0;
const itemWidth = 280 + 16; // Chiều rộng của mỗi sản phẩm (bao gồm khoảng cách giữa)
const visibleItems = 4; // Số sản phẩm hiển thị trên 1 hàng
const totalItems = document.querySelectorAll('.carousel-inner .col').length;
const carouselInner = document.querySelector('.carousel-inner');

function moveCarousel(direction) {
    currentPosition += direction;

    // Giới hạn cuộn
    if (currentPosition < 0) {
        currentPosition = 0;
    } else if (currentPosition > totalItems - visibleItems) {
        currentPosition = totalItems - visibleItems;
    }

    // Thay đổi vị trí cuộn
    carouselInner.style.transform = `translateX(-${currentPosition * itemWidth}px)`;
}
