<?php $year = date('Y'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EssayIQ | Smarter Essay Grading. Powered by AI.</title>
  <meta name="description" content="EssayIQ is an AI-powered essay grading system that evaluates writing quality and delivers meaningful feedback instantly.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <meta name="theme-color" content="#050816">
  <meta property="og:type" content="website">
  <meta property="og:title" content="EssayIQ | Smarter Essay Grading. Powered by AI.">
  <meta property="og:description" content="EssayIQ reads an essay, flags what needs work, scores it against clear criteria and suggests fixes.">
  <link rel="stylesheet" href="assets/css/index.css?v=<?php echo filemtime(__DIR__ . '/assets/css/index.css'); ?>">
</head>
<body>
  <a class="skip-link" href="#main">Skip to content</a>

  <!-- NEW: scroll progress bar + fixed background glows (parallax layer) -->
  <div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>
  <div class="page-glow" id="pageGlow" aria-hidden="true"><span class="g1"></span><span class="g2"></span></div>

  <!-- NAVBAR -->
  <header class="navbar" id="navbar">
    <a href="#home" class="logo" aria-label="EssayIQ home">
      <svg class="logo-icon" viewBox="0 0 32 32" fill="none" aria-hidden="true">
        <rect x="2" y="2" width="28" height="28" rx="9" fill="url(#lg)"/>
        <path d="M10 11h12M10 16h8M10 21h5" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
        <circle cx="23" cy="21" r="3" fill="#fff"/>
        <defs>
          <linearGradient id="lg" x1="0" y1="0" x2="32" y2="32">
            <stop stop-color="#22d3ee"/><stop offset="1" stop-color="#8b5cf6"/>
          </linearGradient>
        </defs>
      </svg>
      <span>Essay<b>IQ</b></span>
    </a>

    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <nav class="nav-links" id="navLinks">
      <a href="#home">Home</a>
      <a href="#features">Features</a>
      <a href="#how">How It Works</a>
      <a href="#about">About</a>
      <div class="nav-buttons">
        <a href="auth/login.php" class="btn btn-ghost">Login</a>
        <a href="auth/register.php" class="btn btn-primary">Get Started</a>
      </div>
    </nav>
  </header>

  <main id="main">
    <!-- HERO -->
    <section class="hero" id="home">
      <div class="hero-bg">
        <!-- Video file must be added by you: assets/essayiq-hero.mp4 -->
        <video id="heroVideo" autoplay muted loop playsinline preload="auto" aria-hidden="true">
          <source src="assets/images/essayiq-hero.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
      </div>

      <!-- NEW: decorative glow orbs that sit at different depths -->
      <div class="hero-orbs" aria-hidden="true">
        <span class="h-orb o1"></span>
        <span class="h-orb o2"></span>
        <span class="h-orb o3"></span>
      </div>

      <div class="container hero-grid">
        <div class="hero-text">
          <span class="badge"><i></i> AI-Powered Essay Grading</span>
          <h1>Smarter Essay Grading. <span class="gradient-text">Powered by AI.</span></h1>
          <p>EssayIQ helps you evaluate essays, analyze writing quality, and deliver meaningful feedback efficiently, so educators spend less time marking and students learn faster.</p>
          <div class="hero-actions">
            <a href="auth/register.php" class="btn btn-primary btn-lg">Get Started</a>
            <a href="#features" class="btn btn-ghost btn-lg">Explore Features</a>
          </div>
        </div>

        <!-- Holographic essay interface (now wrapped in a 3D scene) -->
        <div class="hero-visual">
          <div class="scene">
            <div class="tilt" id="tilt">
              <div class="holo" id="holo">
                <div class="holo-header">
                  <span class="dot"></span><span class="dot"></span><span class="dot"></span>
                  <small>essay_analysis.ai</small>
                </div>
                <div class="holo-body">
                  <div class="score-ring" style="--score: 92">
                    <div><strong>92</strong><small>/ 100</small></div>
                  </div>
                  <div class="holo-lines">
                    <span style="width:100%"></span>
                    <span style="width:88%"></span>
                    <span style="width:94%"></span>
                    <span class="hl" style="width:70%"></span>
                    <span style="width:82%"></span>
                  </div>
                </div>
              </div>

              <div class="float-card card-a">
                <small>Grammar</small>
                <div class="bar"><i style="width:94%"></i></div>
                <b>94%</b>
              </div>
              <div class="float-card card-b">
                <small>Argument Strength</small>
                <div class="bar"><i style="width:86%"></i></div>
                <b>86%</b>
              </div>
              <div class="float-card card-c">
                <small>AI Feedback</small>
                <p>Strong thesis. Add one more supporting example in paragraph 3.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <a href="#features" class="scroll-hint" aria-label="Scroll to features"><span></span></a>
    </section>

    <!-- FEATURES (pinned 3D scroll stage on desktop) -->
    <section class="features" id="features">
      <div class="features-track" id="featuresTrack">
        <div class="features-stage">
          <div class="container">
            <div class="section-head features-head" id="featuresHead">
              <span class="eyebrow">Features</span>
              <h2>Watch one essay get graded, step by step</h2>
              <p>Keep scrolling. EssayIQ reads the draft, flags what needs work, scores it and suggests fixes.</p>
            </div>

            <div class="cards-wrap">
              <div class="cards" id="cards">
                <div class="card-slot">
                  <div class="card3d essay-scene">
                    <div class="paper-stack" aria-hidden="true">
                      <span class="paper paper-back"></span>
                      <span class="paper paper-mid"></span>
                    </div>

                    <article class="glass essay-card living-essay" id="livingEssay">
                      <div class="essay-toolbar">
                        <span></span><span></span><span></span>
                        <small>essay_living.pdf</small>
                      </div>

                      <div class="essay-statusbar">
                        <ol class="essay-status" aria-label="Grading stages">
                          <li>Read</li>
                          <li>Flag</li>
                          <li>Grade</li>
                          <li>Improve</li>
                        </ol>
                        <span class="essay-chip" id="essayChip">4 issues flagged</span>
                      </div>

                      <div class="essay-body">
                        <span class="scan-beam" aria-hidden="true"></span>
                        <div class="essay-header">
                          <div>
                            <span class="eyebrow small">The Living Essay</span>
                            <h3>Essay Grade in Motion</h3>
                          </div>
                          <strong class="score-pill"><span id="liveScore" data-target="92">92</span> / 100</strong>
                        </div>

                        <div class="essay-line"><strong>Thesis:</strong> <span>The argument is clear, but the <span class="error fix"><span class="fix-old">sentance</span><span class="fix-new">sentence</span></span> structure needs <span class="error fix"><span class="fix-old">refinment</span><span class="fix-new">refinement</span></span> and the conclusion could be sharper.</span></div>
                        <div class="essay-line"><strong>Analysis:</strong> <span>The essay shows strong reasoning, yet one point feels <span class="error fix"><span class="fix-old">repetetive</span><span class="fix-new">repetitive</span></span> and needs a clearer supporting example.</span></div>
                        <div class="essay-line"><strong>Grammar:</strong> <span>Minor issues in the <span class="error fix"><span class="fix-old">writting</span><span class="fix-new">writing</span></span> sample reduce clarity, especially near sentence boundaries and verb consistency.</span></div>
                        <div class="essay-line subtle">The essay is thoughtful and well-supported, but a few mechanics and transitions affect the final grade.</div>

                        <div class="essay-metrics">
                          <div class="metric"><span>Grammar</span><b class="m-val" data-target="94">94%</b><i class="m-bar" style="--v:94"></i></div>
                          <div class="metric"><span>Structure</span><b class="m-val" data-target="88">88%</b><i class="m-bar" style="--v:88"></i></div>
                          <div class="metric"><span>Argument</span><b class="m-val" data-target="91">91%</b><i class="m-bar" style="--v:91"></i></div>
                        </div>
                      </div>

                      <div class="essay-layers" aria-hidden="true">
                        <span class="essay-layer layer-grammar"><strong>Grammar</strong><em>94%</em></span>
                        <span class="essay-layer layer-structure"><strong>Structure</strong><em>88%</em></span>
                        <span class="essay-layer layer-vocabulary"><strong>Vocabulary</strong><em>90%</em></span>
                        <span class="essay-layer layer-argument"><strong>Argument</strong><em>91%</em></span>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FEATURE SUMMARY -->
    <section class="section" id="why">
      <div class="container">
        <div class="section-head reveal">
          <span class="eyebrow">Why EssayIQ</span>
          <h2>Built for how teachers actually mark</h2>
          <p>Clear criteria, useful comments and a teacher who always has the final say.</p>
        </div>

        <div class="feature-grid">
          <article class="glass card reveal">
            <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M9 6h11M9 12h11M9 18h11"/><path d="M3.5 6l1.5 1.5L7.5 5M3.5 12l1.5 1.5L7.5 11M3.5 18l1.5 1.5L7.5 17"/></svg></span>
            <h3>Scores you can explain</h3>
            <p>Every grade is broken down into grammar, structure, vocabulary and argument.</p>
          </article>
          <article class="glass card reveal">
            <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.6A8 8 0 1 1 21 12z"/></svg></span>
            <h3>Feedback students can use</h3>
            <p>Each flagged issue comes with a suggested fix, so students know what to change.</p>
          </article>
          <article class="glass card reveal">
            <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v18M5 7h14"/><path d="M5 7l-3 7a4 4 0 0 0 6 0L5 7zM19 7l-3 7a4 4 0 0 0 6 0l-3-7z"/></svg></span>
            <h3>The same rubric for every essay</h3>
            <p>One set of criteria is applied across the whole class, so grades stay comparable.</p>
          </article>
          <article class="glass card reveal">
            <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="4"/><path d="M2 21a7 7 0 0 1 14 0M16 11l2 2 4-4"/></svg></span>
            <h3>Teachers stay in control</h3>
            <p>Review each score and edit comments before anything reaches a student.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- HOW IT WORKS (3D timeline) -->
    <section class="section section-alt" id="how">
      <div class="container">
        <div class="section-head reveal">
          <span class="eyebrow">How It Works</span>
          <h2>From submission to feedback in three steps</h2>
        </div>

        <div class="timeline" id="timeline">
          <div class="timeline-line" aria-hidden="true"><i class="timeline-fill"></i></div>

          <div class="step">
            <span class="step-node">1</span>
            <div class="step3d">
              <article class="glass step-card">
                <span class="step-num">01</span>
                <h3>Submit Your Essay</h3>
                <p>Paste text or upload a document. EssayIQ accepts it in seconds.</p>
              </article>
            </div>
          </div>

          <div class="step">
            <span class="step-node">2</span>
            <div class="step3d">
              <article class="glass step-card">
                <span class="step-num">02</span>
                <h3>AI Analyzes Your Writing</h3>
                <p>Our model examines structure, grammar, argument, and originality of style.</p>
              </article>
            </div>
          </div>

          <div class="step">
            <span class="step-node">3</span>
            <div class="step3d">
              <article class="glass step-card">
                <span class="step-num">03</span>
                <h3>Receive Your Grade and Feedback</h3>
                <p>See the score, a breakdown by criteria, and personalized suggestions.</p>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT -->
    <section class="section" id="about">
      <div class="container about glass reveal">
        <div>
          <span class="eyebrow">About</span>
          <h2>Built to support teachers and inspire writers</h2>
        </div>
        <p>EssayIQ combines modern AI with clear grading principles. Our goal is not to replace educators, but to give them a reliable assistant that handles the repetitive work so they can focus on teaching.</p>
      </div>
    </section>

    <!-- FINAL CTA -->
    <section class="cta" id="cta">
      <div class="container cta-inner">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <h2>Ready to grade <span class="gradient-text">smarter?</span></h2>
        <p>Join educators who are saving hours every week with EssayIQ.</p>
        <a href="auth/register.php" class="btn btn-primary btn-lg">Start Using EssayIQ</a>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container footer-inner">
      <a href="#home" class="logo"><span>Essay<b>IQ</b></span></a>
      <nav class="footer-links">
        <a href="#home">Home</a>
        <a href="#features">Features</a>
        <a href="#how">How It Works</a>
        <a href="#about">About</a>
      </nav>
      <small>&copy; <?php echo $year; ?> EssayIQ. All rights reserved.</small>
    </div>
  </footer>

  <script src="assets/js/index.js"></script>
</body>
</html>