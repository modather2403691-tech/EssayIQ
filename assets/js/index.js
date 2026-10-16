// ===== Navbar: darken on scroll =====
const navbar = document.getElementById('navbar');
function onScroll() {
  navbar.classList.toggle('scrolled', window.scrollY > 40);
}
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

// ===== Mobile menu =====
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');
menuToggle.addEventListener('click', () => {
  const open = navLinks.classList.toggle('open');
  menuToggle.setAttribute('aria-expanded', open);
});
navLinks.querySelectorAll('a').forEach(link =>
  link.addEventListener('click', () => {
    navLinks.classList.remove('open');
    menuToggle.setAttribute('aria-expanded', 'false');
  })
);

// ===== Hero video: fallback + reduced motion =====
const heroBg = document.querySelector('.hero-bg');
const video = document.getElementById('heroVideo');
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function useFallback() {
  heroBg.classList.add('no-video'); // shows the CSS gradient instead
}

if (video) {
  const source = video.querySelector('source');
  source.addEventListener('error', useFallback); // file missing
  video.addEventListener('error', useFallback);

  if (reduceMotion) {
    video.pause();
    video.removeAttribute('autoplay');
  } else {
    const p = video.play();
    if (p && p.catch) p.catch(useFallback); // autoplay blocked
  }
}

// ===== Navbar: highlight the section you are in =====
const spyLinks = Array.from(document.querySelectorAll('.nav-links > a[href^="#"]:not(.btn)'));
const spyTargets = spyLinks.map(a => document.querySelector(a.getAttribute('href'))).filter(Boolean);
if ('IntersectionObserver' in window && spyTargets.length) {
  const spy = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      spyLinks.forEach(a => {
        const on = a.getAttribute('href') === '#' + entry.target.id;
        a.classList.toggle('active', on);
        if (on) a.setAttribute('aria-current', 'true'); else a.removeAttribute('aria-current');
      });
    });
  }, { rootMargin: '-45% 0px -50% 0px' });
  spyTargets.forEach(t => spy.observe(t));
}

// ===== Scroll reveal (About block and section headings) =====
const revealEls = document.querySelectorAll('.reveal');
if ('IntersectionObserver' in window) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });
  revealEls.forEach(el => observer.observe(el));
} else {
  revealEls.forEach(el => el.classList.add('visible'));
}

// ===== NEW: Mouse tilt for the hero scene (desktop only) =====
// Because the floating cards sit at different translateZ depths,
// tilting the whole scene makes them shift against each other = real depth.
const hero = document.querySelector('.hero');
const tilt = document.getElementById('tilt');
if (tilt && !reduceMotion && window.matchMedia('(hover: hover)').matches) {
  hero.addEventListener('mousemove', (e) => {
    tilt.style.setProperty('--mx', ((e.clientX / window.innerWidth - 0.5) * 14).toFixed(2));
    tilt.style.setProperty('--my', ((e.clientY / window.innerHeight - 0.5) * 10).toFixed(2));
  });
  hero.addEventListener('mouseleave', () => {
    tilt.style.setProperty('--mx', 0);
    tilt.style.setProperty('--my', 0);
  });
}

// =====================================================================
// NEW: Scroll-driven 3D engine
// ---------------------------------------------------------------------
// How it works: on scroll we calculate a progress number (0 to 1) for
// each animated element and write it into a CSS variable (--p, --tp,
// --cp, --sy). The CSS turns that number into translateZ / rotate / scale.
// That keeps the JS small and all the visual styling inside index.css.
// =====================================================================
if (!reduceMotion) {
  // ---- Settings you can tweak ----
  const CARD_START   = 0.0;   // when (0-1 through the pinned section) the first card starts
  const CARD_STAGGER = 0.13;  // delay between cards (bigger = more spaced out)
  const CARD_LENGTH  = 0.14;  // how long each card takes to arrive
  const EXIT_START   = 0.9;   // when the cards begin tilting away at the end
  const STORY_START  = 0.12;  // when the Living Essay story begins (after the card has arrived)

  // ---- Elements ----
  const progressBar  = document.getElementById('scrollProgress');
  const pageGlow     = document.getElementById('pageGlow');
  const track        = document.getElementById('featuresTrack');
  const featuresHead = document.getElementById('featuresHead');
  const cardsEl      = document.getElementById('cards');
  const cards        = Array.from(document.querySelectorAll('.card3d'));
  const slots        = Array.from(document.querySelectorAll('.card-slot'));
  const timeline     = document.getElementById('timeline');
  const steps        = Array.from(document.querySelectorAll('.step'));
  const cta          = document.getElementById('cta');
  const essayEl      = document.getElementById('livingEssay');

  // Pinned mode only on desktop widths (matches the CSS breakpoint)
  const pinnedQuery = window.matchMedia('(min-width: 1001px)');

  // ---- Helpers ----
  const clamp = (v, min = 0, max = 1) => Math.min(max, Math.max(min, v));
  const ease  = (t) => t * t * (3 - 2 * t); // smooth start and end

  // Only touch the DOM when a value really changed (saves CPU)
  function setVar(el, name, value) {
    const v = Math.round(value * 1000) / 1000;
    el._vars = el._vars || {};
    if (el._vars[name] !== v) {
      el._vars[name] = v;
      el.style.setProperty(name, v);
    }
  }

  // ---------------------------------------------------------------
  // THE LIVING ESSAY: one number (lp, 0 to 1) drives a four-stage story
  //   Read    the beam sweeps down the essay
  //   Flag    mistakes get underlined
  //   Grade   the score counts up, bars fill, score layers fly in
  //   Improve each mistake is replaced by a suggested fix
  // ---------------------------------------------------------------
  const STAGE_AT = [0, 0.22, 0.40, 0.72]; // where each stage begins
  const FLAG_AT  = 0.26;                  // errors become visible
  const GRADE    = [0.40, 0.70];          // score and bars fill between these
  const FIX_AT   = 0.74;                  // first fix lands here
  const FIX_GAP  = 0.06;                  // gap between fixes

  const essay = essayEl ? {
    score:  essayEl.querySelector('#liveScore'),
    chip:   essayEl.querySelector('#essayChip'),
    stages: Array.from(essayEl.querySelectorAll('.essay-status li')),
    layers: Array.from(essayEl.querySelectorAll('.essay-layer')),
    errors: Array.from(essayEl.querySelectorAll('.error')),
    values: Array.from(essayEl.querySelectorAll('.m-val'))
  } : null;
  if (essay) essayEl.classList.add('live');
  let lastStage = -1;

  function setText(el, text) { if (el && el.textContent !== text) el.textContent = text; }

  function driveEssay(lp) {
    if (!essay) return;
    const scan = clamp(lp / STAGE_AT[1]);
    const gp   = ease(clamp((lp - GRADE[0]) / (GRADE[1] - GRADE[0])));
    const target = Number(essay.score.dataset.target) || 0;

    setVar(essayEl, '--scan', scan);
    setVar(essayEl, '--beam', Math.sin(Math.PI * scan)); // fades in and out at the ends
    setVar(essayEl, '--cam', lp);
    setVar(essayEl, '--mp', gp);
    essay.layers.forEach((layer, i) => setVar(layer, '--q', ease(clamp((gp - i * 0.15) / 0.4))));

    setText(essay.score, String(Math.round(target * gp)));
    essay.values.forEach(v => setText(v, Math.round(Number(v.dataset.target) * gp) + '%'));

    essayEl.classList.toggle('flagged', lp > FLAG_AT);
    essay.errors.forEach((err, i) => err.classList.toggle('fixed', lp > FIX_AT + i * FIX_GAP));

    let stage = 0;
    STAGE_AT.forEach((at, i) => { if (lp >= at) stage = i; });
    if (stage !== lastStage) {
      lastStage = stage;
      essay.stages.forEach((li, i) => {
        li.classList.toggle('on', i === stage);
        li.classList.toggle('done', i < stage);
      });
      const n = essay.errors.length;
      setText(essay.chip, [
        'Reading the essay',
        n + ' issues flagged',
        'Scored ' + target + ' / 100',
        n + ' fixes suggested'
      ][stage]);
    }
  }

  let ticking = false;

  function update() {
    ticking = false;
    const y  = window.scrollY;
    const vh = window.innerHeight;
    const pinned = pinnedQuery.matches;

    // ---------- 1) READ layout first (avoids layout thrashing) ----------
    const trackRect    = track ? track.getBoundingClientRect() : null;
    const trackHeight  = track ? track.offsetHeight : 0;
    const slotTops     = (!pinned && slots.length) ? slots.map(s => s.getBoundingClientRect().top) : null;
    const slotRect0    = (!pinned && slots[0]) ? slots[0].getBoundingClientRect() : null;
    const timelineRect = timeline ? timeline.getBoundingClientRect() : null;
    const ctaRect      = cta ? cta.getBoundingClientRect() : null;
    const docHeight    = document.documentElement.scrollHeight - vh;

    // ---------- 2) WRITE CSS variables ----------
    // Page-level: progress bar and background glows
    setVar(progressBar, '--sp', docHeight > 0 ? clamp(y / docHeight) : 0);
    setVar(pageGlow, '--py', y);

    // Hero parallax (only while the hero is on screen)
    if (y < vh * 1.3) setVar(hero, '--sy', y);

    // Features: pinned scroll scene on desktop, per-card reveal elsewhere
    if (trackRect && cards.length) {
      if (pinned) {
        const total = Math.max(1, trackHeight - vh);
        const prog  = clamp(-trackRect.top / total); // 0 at start of section, 1 at end

        cards.forEach((card, i) => {
          const start = CARD_START + i * CARD_STAGGER;
          const p = ease(clamp((prog - start) / CARD_LENGTH));
          setVar(card, '--p', p);
          card.classList.toggle('in', p > 0.92);
        });
        setVar(featuresHead, '--fp', 1); // heading stays visible so the Features link never lands on an empty stage
        setVar(cardsEl, '--exit', ease(clamp((prog - EXIT_START) / (1 - EXIT_START))));
        driveEssay(clamp((prog - STORY_START) / (EXIT_START - STORY_START)));
      } else {
        cards.forEach((card, i) => {
          // Cards in the same row get a small stagger via (i % 2)
          const raw = (vh * 0.95 - slotTops[i]) / (vh * 0.45) - (i % 2) * 0.18;
          const p = ease(clamp(raw));
          setVar(card, '--p', p);
          card.classList.toggle('in', p > 0.92);
        });
        setVar(featuresHead, '--fp', 1);
        setVar(cardsEl, '--exit', 0);
        // Tablet/mobile: the story plays as the essay card travels up the screen
        driveEssay(slotRect0 ? clamp((vh * 0.8 - slotRect0.top) / (slotRect0.height * 0.9)) : 0);
      }
    }

    // Timeline: line fills as you scroll, each step pops forward in turn
    if (timelineRect) {
      const tp = clamp((vh * 0.78 - timelineRect.top) / Math.max(timelineRect.height, vh * 0.5));
      setVar(timeline, '--tp', clamp(tp * 1.25)); // line slightly ahead of the steps
      steps.forEach((step, i) => {
        const p = ease(clamp((tp - i * 0.35) / 0.3));
        setVar(step, '--p', p);
        step.classList.toggle('active', p > 0.4);
      });
    }

    // Final CTA rises out of the depth
    if (ctaRect) {
      setVar(cta, '--cp', ease(clamp((vh * 0.95 - ctaRect.top) / (vh * 0.7))));
    }
  }

  // requestAnimationFrame keeps updates to one per frame (smooth, light on CPU)
  function requestTick() {
    if (!ticking) {
      ticking = true;
      requestAnimationFrame(update);
    }
  }

  window.addEventListener('scroll', requestTick, { passive: true });
  window.addEventListener('resize', requestTick);
  window.addEventListener('load', requestTick); // fonts/video can shift layout
  update();
}