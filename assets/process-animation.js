import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {

    /* ══════════════════════════════════════════════════════
       1. TEXT REVEAL — titres hero
    ══════════════════════════════════════════════════════ */
    const heroSelectors = ['.hero-title', '.ep-title', '.eq-title', '.lg-title', '.of-title', '.av-title', '.sv-title', '.bl-title', '.fq-title'];

    heroSelectors.forEach(sel => {
        const el = document.querySelector(sel);
        if (!el) return;

        // Split par <br> pour isoler chaque ligne
        const html = el.innerHTML;
        const lines = html.split(/<br\s*\/?>/i);

        el.innerHTML = lines.map(line =>
            `<span class="gsap-line" style="display:block;overflow:hidden;">` +
            `<span class="gsap-line-inner" style="display:block;">` +
            line +
            `</span></span>`
        ).join('');

        const inners = el.querySelectorAll('.gsap-line-inner');
        gsap.set(inners, { y: '110%', opacity: 0 });

        gsap.to(inners, {
            y: '0%',
            opacity: 1,
            duration: 1,
            ease: 'power4.out',
            stagger: 0.1,
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                once: true,
            },
        });
    });

    /* ══════════════════════════════════════════════════════
       2. CLIP-PATH REVEAL — images logements + entreprise
    ══════════════════════════════════════════════════════ */

    // Images logements (.lg-img — divs avec background)
    document.querySelectorAll('.lg-img').forEach((img, i) => {
        gsap.set(img, { clipPath: 'inset(100% 0 0 0)' });

        gsap.to(img, {
            clipPath: 'inset(0% 0 0 0)',
            duration: 1.1,
            ease: 'power4.inOut',
            scrollTrigger: {
                trigger: img,
                start: 'top 85%',
                once: true,
            },
        });
    });

    // Image entreprise (.ep-img-outer)
    const epImg = document.querySelector('.ep-img-outer');
    if (epImg) {
        gsap.set(epImg, { clipPath: 'inset(100% 0 0 0)' });

        gsap.to(epImg, {
            clipPath: 'inset(0% 0 0 0)',
            duration: 1.3,
            ease: 'power4.inOut',
            scrollTrigger: {
                trigger: epImg,
                start: 'top 80%',
                once: true,
            },
        });
    }

    // Photos équipe (.eq-photo)
    document.querySelectorAll('.eq-photo').forEach((photo) => {
        gsap.set(photo, { clipPath: 'inset(100% 0 0 0)' });

        gsap.to(photo, {
            clipPath: 'inset(0% 0 0 0)',
            duration: 1.1,
            ease: 'power4.inOut',
            scrollTrigger: {
                trigger: photo,
                start: 'top 85%',
                once: true,
            },
        });
    });

    // Images blog (.bl-card-img, .bl-featured-img)
    document.querySelectorAll('.bl-card-img, .bl-featured-img').forEach((img) => {
        gsap.set(img, { clipPath: 'inset(100% 0 0 0)' });

        gsap.to(img, {
            clipPath: 'inset(0% 0 0 0)',
            duration: 1.1,
            ease: 'power4.inOut',
            scrollTrigger: {
                trigger: img,
                start: 'top 85%',
                once: true,
            },
        });
    });

    /* ══════════════════════════════════════════════════════
       HOME : steps pinned
    ══════════════════════════════════════════════════════ */
    const processSteps = document.querySelectorAll('.process-step');
    if (processSteps.length) {
        gsap.set(processSteps, { opacity: 0, y: 50 });

        const tl = gsap.timeline();
        processSteps.forEach((step) => {
            tl.to(step, { opacity: 1, y: 0, duration: 1, ease: 'power3.out' });
        });

        ScrollTrigger.create({
            trigger: '.process',
            start: 'top 15%',
            end: () => `+=${processSteps.length * 300}`,
            pin: true,
            scrub: 0.8,
            animation: tl,
        });
    }

    /* ══════════════════════════════════════════════════════
       OFFRES : steps pinned
    ══════════════════════════════════════════════════════ */
    const ofSteps = document.querySelectorAll('.of-step');
    if (ofSteps.length) {
        gsap.set(ofSteps, { opacity: 0, y: 50 });

        const tlOf = gsap.timeline();
        ofSteps.forEach((step) => {
            tlOf.to(step, { opacity: 1, y: 0, duration: 1, ease: 'power3.out' });
        });

        ScrollTrigger.create({
            trigger: '.of-menage',
            start: 'top 15%',
            end: () => `+=${ofSteps.length * 300}`,
            pin: true,
            scrub: 0.8,
            animation: tlOf,
        });
    }

});
