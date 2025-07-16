document.addEventListener('DOMContentLoaded', function () {
    const berandaLink = document.getElementById('beranda-link');

    if (window.location.pathname === '/' && berandaLink) {
        berandaLink.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    document.querySelectorAll('[data-scroll]').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-scroll');
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

document.addEventListener('alpine:init', () => {
    Alpine.data('carousel', () => ({
        currentIndex: 0,
        interval: null,
        itemsCount: document.querySelectorAll('.carousel-item').length,
        autoplayDelay: 5000,

        init() {
            this.startAutoplay();
        },

        startAutoplay() {
            this.stopAutoplay(); // Hindari ganda
            this.interval = setInterval(() => {
                this.next(false); // autoplay=true
            }, this.autoplayDelay);
        },

        stopAutoplay() {
            if (this.interval) {
                clearInterval(this.interval);
                this.interval = null;
            }
        },

        resetAutoplay() {
            this.stopAutoplay();
            this.startAutoplay();
        },

        goTo(index) {
            this.currentIndex = index;
            this.updateVisibility();
            this.resetAutoplay();
        },

        next(triggeredByUser = true) {
            this.currentIndex = (this.currentIndex + 1) % this.itemsCount;
            this.updateVisibility();
            if (triggeredByUser) this.resetAutoplay();
        },

        prev() {
            this.currentIndex = (this.currentIndex - 1 + this.itemsCount) % this.itemsCount;
            this.updateVisibility();
            this.resetAutoplay();
        },

        updateVisibility() {
            const items = document.querySelectorAll('.carousel-item');
            const indicators = document.querySelectorAll('.carousel-indicator');

            items.forEach((el, index) => {
                el.classList.toggle('opacity-100', index === this.currentIndex);
                el.classList.toggle('opacity-0', index !== this.currentIndex);
            });

            indicators.forEach((el, index) => {
                el.classList.toggle('bg-white', index === this.currentIndex);
                el.classList.toggle('bg-white/50', index !== this.currentIndex);
            });
        }
    }));
});
