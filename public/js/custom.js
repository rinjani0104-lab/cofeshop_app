// Cafein Holic - Custom JavaScript

document.addEventListener("DOMContentLoaded", function () {
    // Navbar scroll effect
    const navbar = document.getElementById("mainNavbar");
    if (navbar) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href");
            if (targetId === "#") return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: "smooth",
                });

                // Update active nav link
                document.querySelectorAll(".nav-link").forEach((link) => {
                    link.classList.remove("active");
                });
                this.classList.add("active");
            }
        });
    });

    // Fade-in animation on scroll
    const fadeElements = document.querySelectorAll(".fade-in");

    const fadeInOnScroll = function () {
        fadeElements.forEach((element) => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add("visible");
            }
        });
    };

    // Initial check
    fadeInOnScroll();

    // Check on scroll
    window.addEventListener("scroll", fadeInOnScroll);

    // Menu navigation active state
    const menuSections = document.querySelectorAll("section[id]");
    const menuLinks = document.querySelectorAll(".nav-pills .nav-link");

    const highlightMenuOnScroll = function () {
        let scrollPos = window.scrollY + 200;

        menuSections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;

            if (
                scrollPos >= sectionTop &&
                scrollPos < sectionTop + sectionHeight
            ) {
                const sectionId = section.getAttribute("id");
                menuLinks.forEach((link) => {
                    link.classList.remove("active");
                    if (link.getAttribute("href") === `#${sectionId}`) {
                        link.classList.add("active");
                    }
                });
            }
        });
    };

    if (menuLinks.length > 0) {
        window.addEventListener("scroll", highlightMenuOnScroll);
    }

    // Form validation feedback
    const forms = document.querySelectorAll(".needs-validation");
    forms.forEach((form) => {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false,
        );
    });

    // Add to cart animation
    document.querySelectorAll(".add-to-cart").forEach((button) => {
        button.addEventListener("click", function () {
            const button = this;
            const originalText = button.innerHTML;

            button.innerHTML = '<i class="bi bi-check-lg me-2"></i> Added!';
            button.classList.add("btn-success");
            button.classList.remove("btn-brown");

            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove("btn-success");
                button.classList.add("btn-brown");
            }, 2000);
        });
    });

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]'),
    );
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Parallax effect for hero sections
    const heroSections = document.querySelectorAll(".hero-section");
    if (heroSections.length > 0) {
        window.addEventListener("scroll", function () {
            const scrolled = window.pageYOffset;
            heroSections.forEach((section) => {
                const rate = scrolled * -0.5;
                section.style.transform = `translate3d(0px, ${rate}px, 0px)`;
            });
        });
    }
});
// Additional JavaScript for enhanced interactivity

// Toast Notification System
function showToast(message, type = "success") {
    const toast = document.createElement("div");
    toast.className = "toast-notification";

    const icon =
        type === "success" ? "bi-check-circle" : "bi-exclamation-circle";
    const color = type === "success" ? "var(--brown)" : "#dc3545";

    toast.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="bi ${icon} me-3 fs-4" style="color: ${color};"></i>
            <div>
                <p class="mb-0 fw-medium">${message}</p>
            </div>
            <button class="btn-close ms-3" onclick="this.parentElement.parentElement.remove()"></button>
        </div>
    `;

    document.body.appendChild(toast);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (toast.parentElement) {
            toast.remove();
        }
    }, 5000);
}

// Back to Top Button
function initBackToTop() {
    const backToTop = document.createElement("button");
    backToTop.className = "fab";
    backToTop.innerHTML = '<i class="bi bi-chevron-up"></i>';
    backToTop.setAttribute("aria-label", "Back to top");
    backToTop.style.display = "none";

    backToTop.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });

    document.body.appendChild(backToTop);

    // Show/hide based on scroll position
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            backToTop.style.display = "flex";
        } else {
            backToTop.style.display = "none";
        }
    });
}

// Image Lazy Loading
function initLazyLoading() {
    const lazyImages = document.querySelectorAll("img[data-src]");

    if ("IntersectionObserver" in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add("loaded");
                    observer.unobserve(img);
                }
            });
        });

        lazyImages.forEach((img) => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        lazyImages.forEach((img) => {
            img.src = img.dataset.src;
        });
    }
}

// Form Auto-save
function initFormAutoSave() {
    const forms = document.querySelectorAll("form[data-autosave]");

    forms.forEach((form) => {
        const formId =
            form.id || "form-" + Math.random().toString(36).substr(2, 9);
        const storageKey = `autosave_${formId}`;

        // Load saved data
        const savedData = localStorage.getItem(storageKey);
        if (savedData) {
            const data = JSON.parse(savedData);
            Object.keys(data).forEach((key) => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) {
                    if (input.type === "checkbox" || input.type === "radio") {
                        input.checked = data[key];
                    } else {
                        input.value = data[key];
                    }
                }
            });
        }

        // Save on input
        form.querySelectorAll("input, textarea, select").forEach((input) => {
            input.addEventListener("input", () => {
                saveFormData(form, storageKey);
            });
            input.addEventListener("change", () => {
                saveFormData(form, storageKey);
            });
        });

        // Clear on submit
        form.addEventListener("submit", () => {
            localStorage.removeItem(storageKey);
        });
    });
}

function saveFormData(form, storageKey) {
    const data = {};
    form.querySelectorAll("input, textarea, select").forEach((input) => {
        if (input.name) {
            if (input.type === "checkbox" || input.type === "radio") {
                if (input.type === "checkbox") {
                    data[input.name] = input.checked;
                } else if (input.checked) {
                    data[input.name] = input.value;
                }
            } else {
                data[input.name] = input.value;
            }
        }
    });
    localStorage.setItem(storageKey, JSON.stringify(data));
}

// Initialize all enhancements when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    // Initialize additional features
    initBackToTop();
    initLazyLoading();
    initFormAutoSave();

    // Add hover effects to all cards
    document.querySelectorAll(".card, .menu-card").forEach((card) => {
        card.addEventListener("mouseenter", function () {
            this.style.transition = "all 0.3s ease";
        });
    });

    // Add loading state to buttons
    document.querySelectorAll('button[type="submit"]').forEach((button) => {
        button.addEventListener("click", function () {
            if (this.form && this.form.checkValidity()) {
                const originalText = this.innerHTML;
                this.innerHTML = `
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    Processing...
                `;
                this.disabled = true;

                // Revert after 3 seconds (for demo)
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 3000);
            }
        });
    });

    // Add keyboard navigation to modals
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            const openModals = document.querySelectorAll(".modal.show");
            if (openModals.length > 0) {
                const modal = bootstrap.Modal.getInstance(openModals[0]);
                if (modal) modal.hide();
            }
        }
    });

    // Enhance select elements
    document.querySelectorAll("select").forEach((select) => {
        select.classList.add("form-select");
    });

    // Add focus styles to all interactive elements
    document
        .querySelectorAll("a, button, input, textarea, select")
        .forEach((el) => {
            el.addEventListener("focus", function () {
                this.style.outline = "2px solid var(--brown-light)";
                this.style.outlineOffset = "2px";
            });

            el.addEventListener("blur", function () {
                this.style.outline = "none";
            });
        });

    // Add smooth scrolling to all anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");
            if (href !== "#") {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            }
        });
    });
});

// Performance optimization: Debounce scroll events
let scrollTimeout;
window.addEventListener("scroll", function () {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
        // Handle scroll-based functions here
    }, 100);
});

// Add CSS for print functionality
const printStyles = `
    @media print {
        .no-print { display: none !important; }
        body { font-size: 12pt; }
        .card { break-inside: avoid; }
    }
`;

const styleSheet = document.createElement("style");
styleSheet.textContent = printStyles;
document.head.appendChild(styleSheet);
