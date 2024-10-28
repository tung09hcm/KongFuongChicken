// Highlight selected nav item and smooth scroll to section
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(event) {
        // event.preventDefault();
        document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
        link.classList.add('active');
        const sectionId = link.getAttribute('href');
        document.querySelector(sectionId).scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});