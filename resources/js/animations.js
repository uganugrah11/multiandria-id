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

document.addEventListener('DOMContentLoaded', () => {
    initHeroMotion();
    initScrollReveals();
    initCounters();
    initCardHoverMotion();
});
