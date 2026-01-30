/* 
  CORDISET PLUMBING & CONSTRUCTION
  Interaction Layer
*/

document.addEventListener('DOMContentLoaded', () => {

    // 1. Reveal Elements on Scroll
    const observerOptions = {
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    const revealElements = document.querySelectorAll('.reveal');
    revealElements.forEach(el => observer.observe(el));

    // 2. Simple Header Scroll Effect
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.style.boxShadow = '0 10px 30px rgba(10, 25, 47, 0.1)';
            header.style.padding = '5px 0';
        } else {
            header.style.boxShadow = 'none';
            header.style.padding = '0';
        }
    });

    // 3. Smooth Anchor Links (Redundant with CSS scroll-behavior but good for older browser support)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});

let homeCurrentSlide = 0;
const homeTotalSlides = 6;

function moveHomeSlider(direction) {
    const track = document.getElementById('homeSliderTrack');
    const cards = track.querySelectorAll('.scene-3d');
    if (cards.length === 0) return;

    const cardWidth = cards[0].offsetWidth;
    const gap = parseFloat(getComputedStyle(track).gap) || 32;
    const step = cardWidth + gap;

    const containerWidth = track.parentElement.offsetWidth;
    const visibleCards = Math.round(containerWidth / step) || 1;
    const maxSlide = Math.max(0, homeTotalSlides - visibleCards);

    homeCurrentSlide += direction;
    if (homeCurrentSlide < 0) homeCurrentSlide = 0;
    if (homeCurrentSlide > maxSlide) homeCurrentSlide = maxSlide;

    track.style.transform = `translateX(-${homeCurrentSlide * step}px)`;
}
