import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export const motion = {
    ease: 'power3.out',
    uiEase: 'power1.out',
    pressEase: 'power2.inOut',
    uiDuration: 0.24,
    revealDuration: 0.64,
};

export const prefersReducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const asElements = (targets) => gsap.utils.toArray(targets).filter(Boolean);

/**
 * Shared one-time ScrollTrigger entrance. Reduced-motion users immediately
 * receive the final, visible state instead of an animated intermediate state.
 */
export function revealOnScroll(targets, options = {}) {
    const elements = asElements(targets);

    if (!elements.length) return () => {};

    const {
        from = { autoAlpha: 0, y: 18 },
        to = {},
        start = 'top 86%',
        stagger = 0.08,
        duration = motion.revealDuration,
        trigger,
        once = true,
    } = options;

    if (prefersReducedMotion()) {
        elements.forEach((element) => element.classList.add('is-visible'));
        gsap.set(elements, { autoAlpha: 1, clearProps: 'transform,visibility,willChange' });
        return () => {};
    }

    gsap.set(elements, { ...from, willChange: 'transform, opacity' });

    const scrollTrigger = ScrollTrigger.create({
        trigger: trigger || elements[0],
        start,
        once,
        onEnter: () => gsap.to(elements, {
            ...to,
            autoAlpha: 1,
            x: 0,
            y: 0,
            scale: 1,
            duration,
            ease: motion.ease,
            stagger,
            overwrite: 'auto',
            clearProps: 'willChange',
        }),
    });

    return () => scrollTrigger.kill();
}

/** Registers one page-scoped cleanup for full or future partial navigation. */
export function registerPageMotionCleanup(key, cleanup) {
    const property = `__mai${key}MotionCleanup`;
    window[property]?.();
    window[property] = cleanup;
    window.addEventListener('pagehide', cleanup, { once: true });
}
