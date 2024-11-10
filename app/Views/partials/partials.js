document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("menuButton").addEventListener("click", function() {
        document.getElementById("sidebar").classList.add("show");
    });

    document.getElementById("closeSidebar").addEventListener("click", function() {
        document.getElementById("sidebar").classList.remove("show");
    });

    document.getElementById('openMenu').addEventListener('click', function() {
        document.getElementById('sidebar_mobile').classList.add('show');
    });

    document.getElementById('closeMenu').addEventListener('click', function() {
        document.getElementById('sidebar_mobile').classList.remove('show');
    });
});