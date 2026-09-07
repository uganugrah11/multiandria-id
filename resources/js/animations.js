/**
 * Lightweight, dependency-free scroll animations: reveal-on-scroll and
 * count-up statistics. No animation library — just IntersectionObserver +
 * the CSS transitions defined in resources/css/app.css. Fully inert when
 * the user prefers reduced motion (see docs/DESIGN_SYSTEM.md "Animation").
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/**
 * Premium hero entrance: a concise, vertical editorial sequence. A timeline
 * keeps the headline, supporting copy, and calls to action choreographed
 * instead of relying on independent CSS delays.
 */
function initHeroMotion() {
    const hero = document.querySelector('[data-hero]');

    if (!hero) return;

    window.__maiHeroMotionCleanup?.();

    const eyebrow = hero.querySelector('[data-hero-eyebrow]');
    const accent = hero.querySelector('[data-hero-accent]');
    const headline = hero.querySelector('[data-hero-headline]');
    const description = hero.querySelector('[data-hero-description]');
    const actions = hero.querySelector('[data-hero-actions]');
    const actionItems = actions ? Array.from(actions.children) : [];
    const targets = [eyebrow, accent, headline, description, actions, ...actionItems].filter(Boolean);
    const media = gsap.matchMedia();

    media.add('(prefers-reduced-motion: no-preference)', () => {
        const timeline = gsap.timeline({
            defaults: { ease: 'power3.out' },
        });

        timeline
            .set(targets, { willChange: 'transform, opacity' })
            .set(eyebrow, { y: 12, autoAlpha: 0 })
            .set(accent, { scaleX: 0, transformOrigin: 'left center' })
            .set(headline, { y: 28, autoAlpha: 0 })
            .set(description, { y: 18, autoAlpha: 0 })
            .set(actionItems, { y: 14, autoAlpha: 0 })
            .to(eyebrow, { y: 0, autoAlpha: 1, duration: 0.42 })
            .to(accent, { scaleX: 1, duration: 0.48 }, '<0.1')
            .to(headline, { y: 0, autoAlpha: 1, duration: 0.7 }, '<0.12')
            .to(description, { y: 0, autoAlpha: 1, duration: 0.56 }, '<0.3')
            .to(actionItems, { y: 0, autoAlpha: 1, duration: 0.46, stagger: 0.1 }, '<0.24')
            .set(actions, { autoAlpha: 1 })
            .set(actionItems, { autoAlpha: 1 })
            .set(targets, { clearProps: 'willChange' });
    });

    const cleanup = () => media.revert();

    window.__maiHeroMotionCleanup = cleanup;
    window.addEventListener('pagehide', cleanup, { once: true });
}

function initScrollReveals() {
    const revealTargets = gsap.utils.toArray('.reveal');
    const scaleTargets = gsap.utils.toArray('.reveal-scale');

    window.__maiScrollMotionCleanup?.();

    if (prefersReducedMotion) {
        [...revealTargets, ...scaleTargets].forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const media = gsap.matchMedia();

    media.add('(prefers-reduced-motion: no-preference)', () => {
        gsap.set(revealTargets, { autoAlpha: 0, y: 18, willChange: 'transform, opacity' });
        gsap.set(scaleTargets, { autoAlpha: 0, scale: 1.03, willChange: 'transform, opacity' });

        ScrollTrigger.batch(revealTargets, {
            start: 'top 86%',
            once: true,
            onEnter: (batch) => gsap.to(batch, {
                autoAlpha: 1,
                y: 0,
                duration: 0.58,
                ease: 'power3.out',
                stagger: 0.08,
                overwrite: 'auto',
                clearProps: 'willChange',
            }),
        });

        ScrollTrigger.batch(scaleTargets, {
            start: 'top 86%',
            once: true,
            onEnter: (batch) => gsap.to(batch, {
                autoAlpha: 1,
                scale: 1,
                duration: 0.64,
                ease: 'power3.out',
                stagger: 0.08,
                overwrite: 'auto',
                clearProps: 'willChange',
            }),
        });
    });

    const cleanup = () => media.revert();

    window.__maiScrollMotionCleanup = cleanup;
    window.addEventListener('pagehide', cleanup, { once: true });
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

    function formatThousands(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    const value = { current: 0 };

    gsap.to(value, {
        current: target,
        duration: 1.2,
        ease: 'power3.out',
        snap: { current: 1 },
        onUpdate: () => {
            el.textContent = formatThousands(value.current) + suffix;
        },
        onComplete: () => {
            el.textContent = raw;
        },
    });
}

function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');

    if (prefersReducedMotion) {
        return;
    }

    counters.forEach((counter) => {
        ScrollTrigger.create({
            trigger: counter,
            start: 'top 82%',
            once: true,
            onEnter: () => animateCounter(counter),
        });
    });
}

function initCardHoverMotion() {
    const cards = gsap.utils.toArray('[data-motion-card]');

    if (prefersReducedMotion || !cards.length) return;

    window.__maiCardMotionCleanup?.();

    const media = gsap.matchMedia();

    media.add('(hover: hover) and (pointer: fine) and (prefers-reduced-motion: no-preference)', () => {
        const listeners = cards.map((card) => {
            const isProductCard = card.dataset.motionCard === 'product';
            const enterVars = {
                y: -4,
                scale: 1.01,
                duration: 0.22,
                ease: 'power2.out',
                overwrite: 'auto',
            };
            const leaveVars = {
                y: 0,
                scale: 1,
                duration: 0.24,
                ease: 'power2.out',
                overwrite: 'auto',
            };

            if (isProductCard) {
                enterVars.boxShadow = '0 4px 12px rgba(24, 24, 24, 0.08)';
                leaveVars.boxShadow = '0 1px 2px rgba(24, 24, 24, 0.04), 0 1px 3px rgba(24, 24, 24, 0.06)';
            }

            const enter = () => gsap.to(card, enterVars);
            const leave = () => gsap.to(card, leaveVars);

            card.addEventListener('pointerenter', enter);
            card.addEventListener('pointerleave', leave);

            return () => {
                card.removeEventListener('pointerenter', enter);
                card.removeEventListener('pointerleave', leave);
            };
        });

        return () => listeners.forEach((remove) => remove());
    });

    const cleanup = () => media.revert();

    window.__maiCardMotionCleanup = cleanup;
    window.addEventListener('pagehide', cleanup, { once: true });
}

/**
 * Horizontal company timeline: native scroll remains the source of truth for
 * keyboard, touch, and assistive-tech users. GSAP enhances only the visual
 * milestone choreography when motion is allowed.
 */
function initCompanyTimelines() {
    const timelines = gsap.utils.toArray('[data-company-timeline]');

    if (!timelines.length) return;

    window.__maiTimelineCleanup?.();

    const cleanups = timelines.map((root) => {
        const scroller = root.querySelector('[data-timeline-scroller]');
        const progress = root.querySelector('[data-timeline-progress]');
        const previous = root.querySelector('[data-timeline-prev]');
        const next = root.querySelector('[data-timeline-next]');
        const items = Array.from(root.querySelectorAll('[data-timeline-item]'));
        const connectors = Array.from(root.querySelectorAll('[data-timeline-connector] > span'));

        if (!scroller || !items.length) return () => {};

        let dragStartX = 0;
        let dragStartScroll = 0;
        let isDragging = false;
        let suppressClick = false;
        let frame = null;

        const maxScroll = () => Math.max(0, scroller.scrollWidth - scroller.clientWidth);
        const currentIndex = () => {
            const center = scroller.scrollLeft + (scroller.clientWidth / 2);
            return items.reduce((closest, item, index) => {
                const itemCenter = item.offsetLeft + (item.offsetWidth / 2);
                const closestCenter = items[closest].offsetLeft + (items[closest].offsetWidth / 2);
                return Math.abs(itemCenter - center) < Math.abs(closestCenter - center) ? index : closest;
            }, 0);
        };

        const update = () => {
            frame = null;
            const maximum = maxScroll();
            const ratio = maximum ? scroller.scrollLeft / maximum : 0;
            progress?.style.setProperty('transform', `scaleX(${ratio})`);
            previous.disabled = scroller.scrollLeft <= 2;
            next.disabled = scroller.scrollLeft >= maximum - 2;

            const activeIndex = currentIndex();
            items.forEach((item, index) => {
                const icon = item.querySelector('[data-timeline-icon]');
                const active = index === activeIndex;
                item.classList.toggle('is-active', active);

                if (!prefersReducedMotion && icon) {
                    gsap.to(icon, {
                        scale: active ? 1.06 : 1,
                        duration: 0.28,
                        ease: 'power2.out',
                        overwrite: 'auto',
                    });
                }
            });
        };

        const requestUpdate = () => {
            if (frame === null) frame = window.requestAnimationFrame(update);
        };

        const scrollByStep = (direction) => {
            const step = Math.min(Math.max(items[0].offsetWidth + 40, 280), scroller.clientWidth * 0.9);
            const destination = Math.max(0, Math.min(maxScroll(), scroller.scrollLeft + (step * direction)));

            scroller.scrollTo({
                left: destination,
                behavior: prefersReducedMotion ? 'auto' : 'smooth',
            });
        };

        // A fixed scroll delta is deliberately used here instead of deriving
        // the closest card: it makes each control work predictably from every
        // partial scroll position, then native scroll-snap settles the card.
        const onPrevious = () => scrollByStep(-1);
        const onNext = () => scrollByStep(1);
        const onPointerDown = (event) => {
            if (event.pointerType !== 'mouse' || event.button !== 0) return;
            dragStartX = event.clientX;
            dragStartScroll = scroller.scrollLeft;
            isDragging = true;
            suppressClick = false;
            scroller.setPointerCapture(event.pointerId);
            scroller.classList.add('is-dragging');
        };
        const onPointerMove = (event) => {
            if (!isDragging) return;
            const distance = event.clientX - dragStartX;
            if (Math.abs(distance) > 4) suppressClick = true;
            scroller.scrollLeft = dragStartScroll - distance;
        };
        const onPointerUp = (event) => {
            if (!isDragging) return;
            isDragging = false;
            scroller.classList.remove('is-dragging');
            if (scroller.hasPointerCapture(event.pointerId)) scroller.releasePointerCapture(event.pointerId);
        };
        const onClickCapture = (event) => {
            if (!suppressClick) return;
            event.preventDefault();
            suppressClick = false;
        };

        scroller.addEventListener('scroll', requestUpdate, { passive: true });
        scroller.addEventListener('pointerdown', onPointerDown);
        scroller.addEventListener('pointermove', onPointerMove);
        scroller.addEventListener('pointerup', onPointerUp);
        scroller.addEventListener('pointercancel', onPointerUp);
        scroller.addEventListener('click', onClickCapture, true);
        previous.addEventListener('click', onPrevious);
        next.addEventListener('click', onNext);
        window.addEventListener('resize', requestUpdate, { passive: true });
        requestUpdate();

        const media = gsap.matchMedia();
        media.add('(prefers-reduced-motion: no-preference)', () => {
            items.forEach((item) => {
                const icon = item.querySelector('[data-timeline-icon]');
                const year = item.querySelector('[data-timeline-year]');
                const card = item.querySelector('[data-timeline-card]');
                const targets = [icon, year, card].filter(Boolean);

                gsap.fromTo(targets, { autoAlpha: 0, y: 16 }, {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.52,
                    ease: 'power3.out',
                    stagger: 0.07,
                    scrollTrigger: {
                        trigger: item,
                        scroller,
                        horizontal: true,
                        start: 'left 88%',
                        once: true,
                    },
                });
            });

            connectors.forEach((connector) => {
                gsap.to(connector, {
                    scaleX: 1,
                    duration: 0.42,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: connector.parentElement,
                        scroller,
                        horizontal: true,
                        start: 'left 88%',
                        once: true,
                    },
                });
            });

            ScrollTrigger.refresh();
        });

        return () => {
            if (frame !== null) window.cancelAnimationFrame(frame);
            media.revert();
            scroller.removeEventListener('scroll', requestUpdate);
            scroller.removeEventListener('pointerdown', onPointerDown);
            scroller.removeEventListener('pointermove', onPointerMove);
            scroller.removeEventListener('pointerup', onPointerUp);
            scroller.removeEventListener('pointercancel', onPointerUp);
            scroller.removeEventListener('click', onClickCapture, true);
            previous.removeEventListener('click', onPrevious);
            next.removeEventListener('click', onNext);
            window.removeEventListener('resize', requestUpdate);
        };
    });

    const cleanup = () => cleanups.forEach((remove) => remove());
    window.__maiTimelineCleanup = cleanup;
    window.addEventListener('pagehide', cleanup, { once: true });
}

/** Native horizontal process rail controls, sharing the same drag, edge-mask,
 * snap, and progress treatment without adding timeline-specific animation. */
function initHorizontalScrollers() {
    const rails = gsap.utils.toArray('[data-horizontal-scroll]');

    rails.forEach((root) => {
        const scroller = root.querySelector('[data-horizontal-scroller]');
        const previous = root.querySelector('[data-horizontal-prev]');
        const next = root.querySelector('[data-horizontal-next]');
        const progress = root.querySelector('[data-horizontal-progress]');

        if (!scroller || !previous || !next) return;

        let dragStartX = 0;
        let dragStartScroll = 0;
        let dragging = false;
        let frame = null;
        const maxScroll = () => Math.max(0, scroller.scrollWidth - scroller.clientWidth);
        const update = () => {
            frame = null;
            const maximum = maxScroll();
            const ratio = maximum ? scroller.scrollLeft / maximum : 0;
            progress?.style.setProperty('transform', `scaleX(${ratio})`);
            previous.disabled = scroller.scrollLeft <= 2;
            next.disabled = scroller.scrollLeft >= maximum - 2;
        };
        const requestUpdate = () => {
            if (frame === null) frame = window.requestAnimationFrame(update);
        };
        const scroll = (direction) => scroller.scrollBy({
            left: direction * Math.min(280, scroller.clientWidth * 0.85),
            behavior: prefersReducedMotion ? 'auto' : 'smooth',
        });
        const onPointerDown = (event) => {
            if (event.pointerType !== 'mouse' || event.button !== 0) return;
            dragging = true;
            dragStartX = event.clientX;
            dragStartScroll = scroller.scrollLeft;
            scroller.setPointerCapture(event.pointerId);
            scroller.classList.add('is-dragging');
        };
        const onPointerMove = (event) => {
            if (dragging) scroller.scrollLeft = dragStartScroll - (event.clientX - dragStartX);
        };
        const onPointerUp = (event) => {
            if (!dragging) return;
            dragging = false;
            scroller.classList.remove('is-dragging');
            if (scroller.hasPointerCapture(event.pointerId)) scroller.releasePointerCapture(event.pointerId);
        };

        scroller.addEventListener('scroll', requestUpdate, { passive: true });
        scroller.addEventListener('pointerdown', onPointerDown);
        scroller.addEventListener('pointermove', onPointerMove);
        scroller.addEventListener('pointerup', onPointerUp);
        scroller.addEventListener('pointercancel', onPointerUp);
        previous.addEventListener('click', () => scroll(-1));
        next.addEventListener('click', () => scroll(1));
        window.addEventListener('resize', requestUpdate, { passive: true });
        requestUpdate();
    });
}

/**
 * FAQ panels use measured heights rather than a fixed CSS max-height, so each
 * answer opens precisely to its own content. Native buttons retain keyboard
 * Enter/Space support; GSAP only supplies the visual transition.
 */
function initFaqAccordions() {
    const accordions = gsap.utils.toArray('[data-faq-accordion]');

    accordions.forEach((accordion) => {
        const items = Array.from(accordion.children);
        const state = items.map((item) => ({
            item,
            button: item.querySelector('[data-faq-toggle]'),
            panel: item.querySelector('[data-faq-panel]'),
            answer: item.querySelector('[data-faq-answer]'),
            icon: item.querySelector('[data-faq-icon]'),
        })).filter(({ button, panel, answer, icon }) => button && panel && answer && icon);

        if (!state.length) return;

        const setClosed = ({ button, panel, answer, icon }) => {
            button.setAttribute('aria-expanded', 'false');
            panel.hidden = true;
            gsap.set(panel, { height: 0 });
            gsap.set(answer, { autoAlpha: 0, y: -8 });
            gsap.set(icon, { rotation: 0 });
        };

        const setOpen = ({ button, panel, answer, icon }) => {
            button.setAttribute('aria-expanded', 'true');
            panel.hidden = false;
            gsap.set(panel, { height: 'auto' });
            gsap.set(answer, { autoAlpha: 1, y: 0 });
            gsap.set(icon, { rotation: 45 });
        };

        const close = (entry, animate = true) => {
            const { button, panel, answer, icon } = entry;
            if (button.getAttribute('aria-expanded') !== 'true') return;

            button.setAttribute('aria-expanded', 'false');
            gsap.killTweensOf([panel, answer, icon]);

            if (!animate || prefersReducedMotion) {
                setClosed(entry);
                return;
            }

            gsap.timeline({
                defaults: { overwrite: 'auto' },
                onComplete: () => {
                    panel.hidden = true;
                    gsap.set(panel, { height: 0 });
                },
            })
                .to(answer, { autoAlpha: 0, y: -8, duration: 0.14, ease: 'power1.in' })
                .to(panel, { height: 0, duration: 0.28, ease: 'power2.out' }, 0)
                .to(icon, { rotation: 0, duration: 0.22, ease: 'power2.out' }, 0);
        };

        const open = (entry, animate = true) => {
            const { button, panel, answer, icon } = entry;
            button.setAttribute('aria-expanded', 'true');
            panel.hidden = false;
            gsap.killTweensOf([panel, answer, icon]);

            if (!animate || prefersReducedMotion) {
                setOpen(entry);
                return;
            }

            gsap.set(panel, { height: 0 });
            gsap.set(answer, { autoAlpha: 0, y: 8 });
            gsap.set(icon, { rotation: 0 });
            const targetHeight = panel.scrollHeight;

            gsap.timeline({ defaults: { overwrite: 'auto' } })
                .to(panel, {
                    height: targetHeight,
                    duration: 0.36,
                    ease: 'power2.out',
                    onComplete: () => gsap.set(panel, { height: 'auto' }),
                })
                .to(answer, { autoAlpha: 1, y: 0, duration: 0.24, ease: 'power2.out' }, 0.08)
                .to(icon, { rotation: 45, duration: 0.24, ease: 'power2.out' }, 0);
        };

        state.forEach((entry) => {
            const expanded = entry.button.getAttribute('aria-expanded') === 'true';
            expanded ? setOpen(entry) : setClosed(entry);

            entry.button.addEventListener('click', () => {
                const isOpen = entry.button.getAttribute('aria-expanded') === 'true';
                if (isOpen) {
                    close(entry);
                    return;
                }

                state.forEach((other) => {
                    if (other !== entry) close(other);
                });
                open(entry);
            });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initHeroMotion();
    initScrollReveals();
    initCounters();
    initCardHoverMotion();
    initCompanyTimelines();
    initHorizontalScrollers();
    initFaqAccordions();
});
