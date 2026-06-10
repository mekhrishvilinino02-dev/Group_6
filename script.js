document.addEventListener("DOMContentLoaded", () => {

    // 1. Hamburger Menu
    const menuBtn = document.getElementById("mobile-menu-btn");
    const navMenu = document.getElementById("nav-menu");
    if (menuBtn && navMenu) {
        menuBtn.addEventListener("click", () => {
            navMenu.classList.toggle("active");
            const spans = menuBtn.querySelectorAll("span");
            if (navMenu.classList.contains("active")) {
                spans[0].style.transform = "rotate(45deg) translate(6px, 6px)";
                spans[1].style.opacity = "0";
                spans[2].style.transform = "rotate(-45deg) translate(6px, -1px)";
            } else {
                spans[0].style.transform = "none";
                spans[1].style.opacity = "1";
                spans[2].style.transform = "none";
            }
        });
    }

    // 2. Header scroll shrink
    const header = document.querySelector(".site-header");
    if (header) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                header.style.padding = "14px 0";
                header.style.boxShadow = "0 10px 30px rgba(0,0,0,0.06)";
            } else {
                header.style.padding = "22px 0";
                header.style.boxShadow = "0 4px 10px rgba(0,0,0,0.02)";
            }
        });
    }

    // 3. [NEW] Active page highlight
    const currentPage = window.location.pathname.split("/").pop() || "index.php";
    document.querySelectorAll(".nav-link-item").forEach(link => {
        if (link.getAttribute("href") === currentPage) {
            link.classList.add("nav-active");
        }
    });

    // 4. [NEW] Count-up animation
    function animateCountUp(el) {
        const raw = el.textContent.replace(/,/g, "");
        const target = parseInt(raw, 10);
        if (isNaN(target)) return;
        const duration = 2000;
        const start = performance.now();
        const update = (now) => {
            const elapsed = now - start;
            const progress = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = Math.floor(eased * target).toLocaleString();
            if (progress < 1) requestAnimationFrame(update);
            else el.textContent = target.toLocaleString();
        };
        requestAnimationFrame(update);
    }

    let statsAnimated = false;
    const statNumbers = document.querySelectorAll(".stat-item h3");
    const statsSection = document.querySelector(".stats-section");
    if (statsSection && statNumbers.length) {
        new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !statsAnimated) {
                    statsAnimated = true;
                    statNumbers.forEach(el => animateCountUp(el));
                }
            });
        }, { threshold: 0.3 }).observe(statsSection);
    }

    // 5. [NEW] Dark mode toggle
    const darkBtn = document.getElementById("dark-mode-btn");
    if (localStorage.getItem("darkMode") === "true") {
        document.body.classList.add("dark-mode");
        if (darkBtn) darkBtn.textContent = "☀️";
    }
    if (darkBtn) {
        darkBtn.addEventListener("click", () => {
            document.body.classList.toggle("dark-mode");
            const isDark = document.body.classList.contains("dark-mode");
            localStorage.setItem("darkMode", isDark);
            darkBtn.textContent = isDark ? "☀️" : "🌙";
        });
    }

    // 6. [NEW] Blog modal
    const modal = document.getElementById("blog-modal");
    const modalTitle = document.getElementById("modal-title");
    const modalImg = document.getElementById("modal-img");
    const modalExcerpt = document.getElementById("modal-excerpt");
    const modalClose = document.getElementById("modal-close");

    if (modal) {
        document.querySelectorAll(".read-more-link").forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                const card = link.closest(".blog-card");
                if (!card) return;
                const title = card.querySelector("h4")?.textContent || "";
                const img = card.querySelector("img")?.src || "";
                const excerpt = card.querySelector(".blog-excerpt")?.textContent || "";
                modalTitle.textContent = title;
                modalImg.src = img;
                if (modalExcerpt) modalExcerpt.textContent = excerpt;
                modal.classList.add("modal-open");
                document.body.style.overflow = "hidden";
            });
        });

        function closeModal() {
            modal.classList.remove("modal-open");
            document.body.style.overflow = "";
        }
        modalClose?.addEventListener("click", closeModal);
        modal.addEventListener("click", (e) => { if (e.target === modal) closeModal(); });
        document.addEventListener("keydown", (e) => { if (e.key === "Escape") closeModal(); });
    }
});
