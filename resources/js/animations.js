/**
 * Lightweight, dependency-free scroll animations: reveal-on-scroll and
 * count-up statistics. No animation library — just IntersectionObserver +
 * the CSS transitions defined in resources/css/app.css. Fully inert when
 * the user prefers reduced motion (see docs/DESIGN_SYSTEM.md "Animation").
 */

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function initReveal() {
    const targets = document.querySelectorAll('.reveal, .reveal-scale');

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        targets.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
    );

    targets.forEach((el) => observer.observe(el));
}

/**
 * Animates the visible digits of a stat value from 0 up to its real,
 * server-rendered value — the value is already correct in the HTML, so a
 * user with JS disabled (or who scrolls past before it fires) only ever
 * sees the true number, never a "0" flash.
 */
function animateCounter(el) {
    const raw = el.textContent.trim();
    const match = raw.match(/^([\d.,]+)(.*)$/);

    if (!match) return;

    const [, numberPart, suffix] = match;
    const target = parseInt(numberPart.replace(/[.,]/g, ''), 10);

    if (Number.isNaN(target)) return;

    const duration = 1200;
    const start = performance.now();

    function formatThousands(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    function tick(now) {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const current = Math.round(target * eased);

        el.textContent = formatThousands(current) + suffix;

        if (progress < 1) {
            requestAnimationFrame(tick);
        } else {
            el.textContent = raw;
        }
    }

    requestAnimationFrame(tick);
}

function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.4 }
    );

    counters.forEach((el) => observer.observe(el));
}

/** Subtle shadow on the sticky header once the page has scrolled. */
function initHeaderScrollState() {
    const header = document.querySelector('[data-site-header]');
    if (!header) return;

    const toggle = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
    toggle();
    window.addEventListener('scroll', toggle, { passive: true });
}

document.addEventListener('DOMContentLoaded', () => {
    initReveal();
    initCounters();
    initHeaderScrollState();
});
