// scripts.js

document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu toggle
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const navMenu = document.querySelector('#navmenu');

    mobileNavToggle.addEventListener('click', function () {
        navMenu.classList.toggle('show');
    });

    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('nav ul li a[href^="#"]');

    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            window.scrollTo({
                top: targetElement.offsetTop - 70, // Adjust for fixed header height
                behavior: 'smooth'
            });
        });
    });
});

// Optional: Add more scripts here for additional functionality
