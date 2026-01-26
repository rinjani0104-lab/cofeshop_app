// ===== CAFEIN HOLIC - MAIN JAVASCRIPT =====

document.addEventListener("DOMContentLoaded", function () {
    // Initialize all components
    initAnimations();
    initForms();
    initImageLazyLoading();
    initSmoothScrolling();
    initBackToTop();
    initCounters();
    initGallery();
    initTooltips();
    initParallax();
    initAOS();
});

// ===== ANIMATIONS =====
function initAnimations() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate-fade-in");
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements with animation classes
    document.querySelectorAll(".animate-on-scroll").forEach((el) => {
        observer.observe(el);
    });

    // Stagger animations for lists
    const staggerElements = document.querySelectorAll(".stagger-animate");
    staggerElements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });
}

// ===== FORM HANDLING =====
function initForms() {
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

                // If valid, show loading
                if (form.checkValidity()) {
                    Loading.show("Processing...");

                    // Simulate API call
                    setTimeout(() => {
                        Loading.hide();
                        Toast.success("Form submitted successfully!");
                    }, 1500);
                }
            },
            false,
        );
    });

    // Real-time validation
    document.querySelectorAll(".form-control").forEach((input) => {
        input.addEventListener("input", function () {
            validateField(this);
        });

        input.addEventListener("blur", function () {
            validateField(this);
        });
    });

    // Password toggle
    document.querySelectorAll(".password-toggle").forEach((toggle) => {
        toggle.addEventListener("click", function () {
            const input = this.parentElement.querySelector("input");
            const type =
                input.getAttribute("type") === "password" ? "text" : "password";
            input.setAttribute("type", type);
            this.querySelector("i").classList.toggle("bi-eye");
            this.querySelector("i").classList.toggle("bi-eye-slash");
        });
    });
}

function validateField(field) {
    const formGroup = field.closest(".form-group") || field.closest(".mb-3");
    const errorDiv = formGroup?.querySelector(".invalid-feedback");

    if (!field.checkValidity()) {
        field.classList.add("is-invalid");
        if (errorDiv) errorDiv.style.display = "block";
    } else {
        field.classList.remove("is-invalid");
        if (errorDiv) errorDiv.style.display = "none";
    }
}

// ===== IMAGE LAZY LOADING =====
function initImageLazyLoading() {
    if ("IntersectionObserver" in window) {
        const imageObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        const src = img.getAttribute("data-src");

                        if (src) {
                            img.src = src;
                            img.classList.add("loaded");
                        }

                        observer.unobserve(img);
                    }
                });
            },
            {
                rootMargin: "50px 0px",
                threshold: 0.01,
            },
        );

        document.querySelectorAll("img[data-src]").forEach((img) => {
            imageObserver.observe(img);
        });
    } else {
        // Fallback for older browsers
        document.querySelectorAll("img[data-src]").forEach((img) => {
            img.src = img.getAttribute("data-src");
        });
    }
}

// ===== SMOOTH SCROLLING =====
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");

            if (href === "#") return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();

                const navbarHeight =
                    document.getElementById("mainNavbar")?.offsetHeight || 70;
                const targetPosition = target.offsetTop - navbarHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth",
                });

                // Update URL
                history.pushState(null, null, href);
            }
        });
    });
}

// ===== BACK TO TOP =====
function initBackToTop() {
    const backToTopBtn = document.getElementById("backToTop");

    if (backToTopBtn) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add("visible");
            } else {
                backToTopBtn.classList.remove("visible");
            }
        });

        backToTopBtn.addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    }
}

// ===== COUNTERS =====
function initCounters() {
    const counters = document.querySelectorAll(".counter");

    if (counters.length > 0) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        startCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.5 },
        );

        counters.forEach((counter) => observer.observe(counter));
    }
}

function startCounter(counterElement) {
    const target = parseInt(
        counterElement.getAttribute("data-target") ||
            counterElement.textContent,
    );
    const duration = 2000; // 2 seconds
    const increment = target / (duration / 16);
    let current = 0;

    const timer = setInterval(() => {
        current += increment;

        if (current >= target) {
            counterElement.textContent = target.toLocaleString();
            clearInterval(timer);
        } else {
            counterElement.textContent = Math.floor(current).toLocaleString();
        }
    }, 16);
}

// ===== GALLERY =====
function initGallery() {
    // Lightbox functionality
    const galleryImages = document.querySelectorAll(".gallery-image");
    const lightbox = document.createElement("div");
    lightbox.className = "lightbox";
    lightbox.innerHTML = `
        <div class="lightbox-content">
            <button class="lightbox-close"><i class="bi bi-x"></i></button>
            <button class="lightbox-prev"><i class="bi bi-chevron-left"></i></button>
            <button class="lightbox-next"><i class="bi bi-chevron-right"></i></button>
            <img src="" alt="" class="lightbox-img">
            <div class="lightbox-caption"></div>
        </div>
    `;
    document.body.appendChild(lightbox);

    let currentIndex = 0;
    const images = [];

    galleryImages.forEach((img, index) => {
        images.push({
            src: img.getAttribute("data-src") || img.src,
            alt: img.alt,
            caption: img.getAttribute("data-caption") || "",
        });

        img.addEventListener("click", () => openLightbox(index));
    });

    function openLightbox(index) {
        currentIndex = index;
        updateLightbox();
        lightbox.classList.add("active");
        document.body.style.overflow = "hidden";
    }

    function updateLightbox() {
        const img = lightbox.querySelector(".lightbox-img");
        const caption = lightbox.querySelector(".lightbox-caption");

        img.src = images[currentIndex].src;
        img.alt = images[currentIndex].alt;
        caption.textContent = images[currentIndex].caption;
    }

    // Lightbox controls
    lightbox.querySelector(".lightbox-close").addEventListener("click", () => {
        lightbox.classList.remove("active");
        document.body.style.overflow = "";
    });

    lightbox.querySelector(".lightbox-prev").addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateLightbox();
    });

    lightbox.querySelector(".lightbox-next").addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateLightbox();
    });

    // Keyboard navigation
    document.addEventListener("keydown", (e) => {
        if (!lightbox.classList.contains("active")) return;

        if (e.key === "Escape") {
            lightbox.classList.remove("active");
            document.body.style.overflow = "";
        } else if (e.key === "ArrowLeft") {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateLightbox();
        } else if (e.key === "ArrowRight") {
            currentIndex = (currentIndex + 1) % images.length;
            updateLightbox();
        }
    });

    // Close on overlay click
    lightbox.addEventListener("click", (e) => {
        if (e.target === lightbox) {
            lightbox.classList.remove("active");
            document.body.style.overflow = "";
        }
    });
}

// ===== TOOLTIPS =====
function initTooltips() {
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]'),
    );
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

// ===== PARALLAX =====
function initParallax() {
    const parallaxElements = document.querySelectorAll(".parallax");

    if (parallaxElements.length > 0) {
        window.addEventListener("scroll", () => {
            const scrolled = window.pageYOffset;

            parallaxElements.forEach((element) => {
                const rate = element.getAttribute("data-parallax-rate") || 0.5;
                const offset = scrolled * rate;

                if (
                    element.hasAttribute("data-parallax-direction") &&
                    element.getAttribute("data-parallax-direction") ===
                        "horizontal"
                ) {
                    element.style.transform = `translateX(${offset}px)`;
                } else {
                    element.style.transform = `translateY(${offset}px)`;
                }
            });
        });
    }
}

// ===== AOS (ANIMATE ON SCROLL) =====
function initAOS() {
    // Simple AOS implementation
    const aosObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const animation =
                        element.getAttribute("data-aos") || "fade-up";
                    const delay = element.getAttribute("data-aos-delay") || 0;
                    const duration =
                        element.getAttribute("data-aos-duration") || 800;

                    setTimeout(() => {
                        element.style.transition = `all ${duration}ms ease`;
                        element.style.opacity = "1";
                        element.style.transform = "translateY(0)";
                    }, delay);

                    aosObserver.unobserve(element);
                }
            });
        },
        { threshold: 0.1 },
    );

    document.querySelectorAll("[data-aos]").forEach((el) => {
        el.style.opacity = "0";
        el.style.transform = "translateY(20px)";
        aosObserver.observe(el);
    });
}

// ===== CART FUNCTIONS =====
class Cart {
    static items = JSON.parse(localStorage.getItem("cafein_cart")) || [];

    static addItem(item) {
        const existingItem = this.items.find((i) => i.id === item.id);

        if (existingItem) {
            existingItem.quantity += item.quantity || 1;
        } else {
            this.items.push({
                ...item,
                quantity: item.quantity || 1,
            });
        }

        this.save();
        this.updateBadge();
        Toast.success("Item added to cart!");
    }

    static removeItem(itemId) {
        this.items = this.items.filter((item) => item.id !== itemId);
        this.save();
        this.updateBadge();
    }

    static updateQuantity(itemId, quantity) {
        const item = this.items.find((i) => i.id === itemId);
        if (item) {
            item.quantity = quantity;
            this.save();
        }
    }

    static clear() {
        this.items = [];
        this.save();
        this.updateBadge();
    }

    static getTotal() {
        return this.items.reduce((total, item) => {
            return total + item.price * item.quantity;
        }, 0);
    }

    static getCount() {
        return this.items.reduce((count, item) => count + item.quantity, 0);
    }

    static save() {
        localStorage.setItem("cafein_cart", JSON.stringify(this.items));
    }

    static updateBadge() {
        const badges = document.querySelectorAll(".cart-badge");
        const count = this.getCount();

        badges.forEach((badge) => {
            if (count > 0) {
                badge.textContent = count > 99 ? "99+" : count;
                badge.style.display = "flex";
            } else {
                badge.style.display = "none";
            }
        });
    }
}

// Initialize cart badge
Cart.updateBadge();

// ===== ORDER FUNCTIONS =====
class OrderManager {
    static async placeOrder(orderData) {
        Loading.show("Placing your order...");

        try {
            // Simulate API call
            await new Promise((resolve) => setTimeout(resolve, 2000));

            // Clear cart
            Cart.clear();

            // Show success
            Loading.hide();
            Modal.success(
                "Order placed successfully! Your order will be ready in 15-20 minutes.",
            );

            return { success: true, orderId: "ORD" + Date.now() };
        } catch (error) {
            Loading.hide();
            Modal.error("Failed to place order. Please try again.");
            return { success: false, error: error.message };
        }
    }

    static async getOrderStatus(orderId) {
        // Simulate API call
        return new Promise((resolve) => {
            setTimeout(() => {
                const statuses = ["preparing", "ready", "completed"];
                resolve({
                    status: statuses[
                        Math.floor(Math.random() * statuses.length)
                    ],
                    estimatedTime: "10-15 minutes",
                });
            }, 1000);
        });
    }
}

// ===== RESERVATION FUNCTIONS =====
class ReservationManager {
    static async makeReservation(data) {
        Loading.show("Making reservation...");

        try {
            // Simulate API call
            await new Promise((resolve) => setTimeout(resolve, 1500));

            Loading.hide();

            return Modal.success(
                `Reservation confirmed for ${data.date} at ${data.time}! ` +
                    `We've sent a confirmation to ${data.email}.`,
            );
        } catch (error) {
            Loading.hide();
            Modal.error("Failed to make reservation. Please try again.");
        }
    }
}

// ===== UTILITY FUNCTIONS =====
function formatCurrency(amount) {
    return new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
        minimumFractionDigits: 2,
    }).format(amount);
}

function formatDate(date) {
    return new Intl.DateTimeFormat("en-US", {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    }).format(new Date(date));
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function () {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => (inThrottle = false), limit);
        }
    };
}

// ===== EXPOSE TO GLOBAL SCOPE =====
window.Cart = Cart;
window.OrderManager = OrderManager;
window.ReservationManager = ReservationManager;
window.formatCurrency = formatCurrency;
window.formatDate = formatDate;
window.debounce = debounce;
window.throttle = throttle;

// ===== INITIALIZATION =====
console.log("Cafein Holic initialized successfully! ☕");
