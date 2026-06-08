document.addEventListener("DOMContentLoaded", () => {
    // 1. (Hamburger Menu)
    const menuBtn = document.getElementById("mobile-menu-btn");
    const navMenu = document.getElementById("nav-menu");

    if (menuBtn && navMenu) {
        menuBtn.addEventListener("click", () => {
            navMenu.classList.toggle("active");
            const spans = menuBtn.querySelectorAll("span");

            if (navMenu.classList.contains("active")) {
                spans[0].style.transform = "rotate(45deg) translate(6px, 6px)";
                spans[1].style.opacity = "0";
                spans[2].style.transform = "rotate(-45deg) translate(6px, -6px)";
            } else {
                spans[0].style.transform = "none";
                spans[1].style.opacity = "1";
                spans[2].style.transform = "none";
            }
        });
    }

    // 2. ჰედერის ზომის შემცირება სქროლვისას 
    const header = document.querySelector(".site-header");
    if (header) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                header.style.padding = "14px 0";
                header.style.boxShadow = "0 10px 30px rgba(0, 0, 0, 0.06)";
            } else {
                header.style.padding = "22px 0";
                header.style.boxShadow = "0 4px 10px rgba(0,0,0,0.02)";
            }
        });
    }
});