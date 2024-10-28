document.getElementById("menuButton").addEventListener("click", function() {
    document.getElementById("sidebar").classList.add("show");
});

document.getElementById("closeSidebar").addEventListener("click", function() {
    document.getElementById("sidebar").classList.remove("show");
});