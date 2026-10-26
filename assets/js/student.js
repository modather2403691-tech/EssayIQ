const studentPage = document.body;
studentPage.classList.add('js-reveal');

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const navbar = document.getElementById('navbar');
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');
const progressBar = document.getElementById('scrollProgress');
const pageGlow = document.querySelector('.page-glow');

function updateScrollEffects() {
  if (navbar) navbar.classList.toggle('scrolled', window.scrollY > 40);

  const scrollableHeight = document.documentElement.scrollHeight - window.innerHeight;
  if (progressBar) {
    progressBar.style.setProperty('--sp', scrollableHeight > 0 ? window.scrollY / scrollableHeight : 0);
  }
  if (pageGlow) pageGlow.style.setProperty('--py', window.scrollY);
}

window.addEventListener('scroll', updateScrollEffects, { passive: true });
updateScrollEffects();

if (menuToggle && navLinks) {
  menuToggle.addEventListener('click', () => {
    const open = navLinks.classList.toggle('open');
    menuToggle.setAttribute('aria-expanded', String(open));
  });

  navLinks.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      navLinks.classList.remove('open');
      menuToggle.setAttribute('aria-expanded', 'false');
    });
  });
}

const revealElements = document.querySelectorAll('.reveal');
if (reduceMotion || !('IntersectionObserver' in window)) {
  revealElements.forEach(element => element.classList.add('visible'));
} else {
  const revealObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('visible');
      revealObserver.unobserve(entry.target);
    });
  }, { threshold: 0.12 });
  revealElements.forEach(element => revealObserver.observe(element));
}

const assignmentCards = Array.from(document.querySelectorAll('.assign-grid .assign'));
const assignmentTabs = Array.from(document.querySelectorAll('.tabs [data-filter]'));
const assignmentSearch = document.getElementById('assignSearch');
const assignmentEmpty = document.getElementById('assignEmpty');
let activeAssignmentFilter = 'all';

function filterAssignments() {
  const query = assignmentSearch ? assignmentSearch.value.trim().toLocaleLowerCase() : '';
  let visibleCount = 0;

  assignmentCards.forEach(card => {
    const matchesStatus = activeAssignmentFilter === 'all' || card.dataset.status === activeAssignmentFilter;
    const matchesSearch = !query || card.textContent.toLocaleLowerCase().includes(query);
    const visible = matchesStatus && matchesSearch;
    card.hidden = !visible;
    if (visible) visibleCount += 1;
  });

  if (assignmentEmpty) assignmentEmpty.hidden = visibleCount > 0;
}

assignmentTabs.forEach(tab => {
  tab.addEventListener('click', () => {
    activeAssignmentFilter = tab.dataset.filter || 'all';
    assignmentTabs.forEach(item => {
      const active = item === tab;
      item.classList.toggle('active', active);
      item.setAttribute('aria-selected', String(active));
    });
    filterAssignments();
  });
});

if (assignmentSearch) assignmentSearch.addEventListener('input', filterAssignments);

const essayForm = document.getElementById('essayForm');
if (essayForm) {
  const modeInput = document.getElementById('inputMode');
  const pastePane = document.getElementById('pastePane');
  const uploadPane = document.getElementById('uploadPane');
  const essayText = document.getElementById('essayText');
  const wordCount = document.getElementById('wordCount');
  const assignmentSelect = document.getElementById('assignment');
  const wordLimit = document.getElementById('wordLimit');
  const titleInput = document.getElementById('title');
  const agreeInput = document.getElementById('agree');
  const submitButton = document.getElementById('submitBtn');
  const essayFile = document.getElementById('essayFile');
  const fileName = document.getElementById('fileName');
  const dropzone = document.getElementById('dropzone');
  const modeTabs = Array.from(essayForm.querySelectorAll('[data-mode]'));

  function currentMode() {
    return modeInput && modeInput.value === 'upload' ? 'upload' : 'paste';
  }

  function countWords(text) {
    const matches = text.trim().match(/\S+/gu);
    return matches ? matches.length : 0;
  }

  function updateWordCount() {
    if (!essayText || !wordCount) return;
    const count = countWords(essayText.value);
    const countLabel = wordCount.querySelector('span');
    if (countLabel) countLabel.textContent = `${count} ${count === 1 ? 'word' : 'words'}`;
  }

  function updateWordLimit() {
    if (!assignmentSelect || !wordLimit) return;
    const selectedOption = assignmentSelect.selectedOptions[0];
    const min = selectedOption ? selectedOption.dataset.min : '';
    const max = selectedOption ? selectedOption.dataset.max : '';
    wordLimit.textContent = min && max
      ? `Your essay should be between ${min} and ${max} words.`
      : 'Choose an assignment to see its word range.';
  }

  function updateSubmitState() {
    if (!submitButton) return;
    const hasEssay = currentMode() === 'upload'
      ? Boolean(essayFile && essayFile.files && essayFile.files.length)
      : Boolean(essayText && essayText.value.trim());
    submitButton.disabled = !(
      assignmentSelect && assignmentSelect.value &&
      titleInput && titleInput.value.trim() &&
      agreeInput && agreeInput.checked &&
      hasEssay
    );
  }

  function setMode(mode) {
    if (modeInput) modeInput.value = mode;
    if (pastePane) pastePane.hidden = mode !== 'paste';
    if (uploadPane) uploadPane.hidden = mode !== 'upload';
    if (essayText) essayText.disabled = mode !== 'paste';
    if (essayFile) essayFile.disabled = mode !== 'upload';
    modeTabs.forEach(tab => {
      const active = tab.dataset.mode === mode;
      tab.classList.toggle('active', active);
      tab.setAttribute('aria-selected', String(active));
    });
    updateSubmitState();
  }

  modeTabs.forEach(tab => {
    tab.addEventListener('click', () => setMode(tab.dataset.mode === 'upload' ? 'upload' : 'paste'));
  });

  if (essayText) {
    essayText.addEventListener('input', () => {
      updateWordCount();
      updateSubmitState();
    });
    updateWordCount();
  }

  if (assignmentSelect) {
    assignmentSelect.addEventListener('change', () => {
      updateWordLimit();
      updateSubmitState();
    });
    updateWordLimit();
  }

  if (titleInput) titleInput.addEventListener('input', updateSubmitState);
  if (agreeInput) agreeInput.addEventListener('change', updateSubmitState);

  if (essayFile) {
    essayFile.addEventListener('change', () => {
      if (fileName) fileName.textContent = essayFile.files && essayFile.files.length ? essayFile.files[0].name : '';
      updateSubmitState();
    });
  }

  if (dropzone && essayFile) {
    dropzone.addEventListener('dragover', event => {
      event.preventDefault();
      dropzone.classList.add('drag-over');
    });
    dropzone.addEventListener('dragleave', () => dropzone.classList.remove('drag-over'));
    dropzone.addEventListener('drop', event => {
      event.preventDefault();
      dropzone.classList.remove('drag-over');
      if (event.dataTransfer && event.dataTransfer.files.length) {
        essayFile.files = event.dataTransfer.files;
        essayFile.dispatchEvent(new Event('change', { bubbles: true }));
      }
    });
  }

  setMode(currentMode());
}

const chart = document.getElementById('trendChart');
if (chart) {
  const points = JSON.parse(chart.dataset.points || '[]');
  const namespace = 'http://www.w3.org/2000/svg';
  const width = 640;
  const height = 260;
  const left = 44;
  const right = 18;
  const top = 18;
  const bottom = 42;
  const plotWidth = width - left - right;
  const plotHeight = height - top - bottom;
  const scores = points.map(point => Number(point.score)).filter(Number.isFinite);
  const minScore = scores.length ? Math.min(0, ...scores) : 0;
  const maxScore = scores.length ? Math.max(100, ...scores) : 100;
  const scoreRange = maxScore - minScore || 1;
  const coordinates = points.map((point, index) => {
    const score = Number(point.score);
    const x = points.length > 1 ? left + (index / (points.length - 1)) * plotWidth : left + plotWidth / 2;
    const y = top + ((maxScore - score) / scoreRange) * plotHeight;
    return { x, y, score, point };
  });
  const svg = document.createElementNS(namespace, 'svg');
  svg.setAttribute('viewBox', `0 0 ${width} ${height}`);
  svg.setAttribute('role', 'img');
  svg.setAttribute('aria-label', 'Essay scores over time');

  const defs = document.createElementNS(namespace, 'defs');
  const gradient = document.createElementNS(namespace, 'linearGradient');
  gradient.setAttribute('id', 'studentChartFill');
  gradient.setAttribute('x1', '0');
  gradient.setAttribute('x2', '0');
  gradient.setAttribute('y1', '0');
  gradient.setAttribute('y2', '1');
  const stopTop = document.createElementNS(namespace, 'stop');
  stopTop.setAttribute('offset', '0%');
  stopTop.setAttribute('stop-color', '#22d3ee');
  stopTop.setAttribute('stop-opacity', '0.24');
  const stopBottom = document.createElementNS(namespace, 'stop');
  stopBottom.setAttribute('offset', '100%');
  stopBottom.setAttribute('stop-color', '#22d3ee');
  stopBottom.setAttribute('stop-opacity', '0');
  gradient.append(stopTop, stopBottom);
  defs.append(gradient);
  svg.append(defs);

  [0, 25, 50, 75, 100].forEach(value => {
    const y = top + ((100 - value) / 100) * plotHeight;
    const line = document.createElementNS(namespace, 'line');
    line.setAttribute('x1', String(left));
    line.setAttribute('x2', String(width - right));
    line.setAttribute('y1', String(y));
    line.setAttribute('y2', String(y));
    line.setAttribute('class', 'chart-grid');
    svg.append(line);

    const label = document.createElementNS(namespace, 'text');
    label.setAttribute('x', String(left - 10));
    label.setAttribute('y', String(y + 4));
    label.setAttribute('text-anchor', 'end');
    label.setAttribute('class', 'chart-axis');
    label.textContent = String(value);
    svg.append(label);
  });

  if (coordinates.length) {
    const linePath = coordinates.map((point, index) =>
      `${index === 0 ? 'M' : 'L'} ${point.x} ${point.y}`
    ).join(' ');
    const area = document.createElementNS(namespace, 'path');
    area.setAttribute('d', `${linePath} L ${coordinates[coordinates.length - 1].x} ${top + plotHeight} L ${coordinates[0].x} ${top + plotHeight} Z`);
    area.setAttribute('class', 'chart-area');
    svg.append(area);

    const line = document.createElementNS(namespace, 'path');
    line.setAttribute('d', linePath);
    line.setAttribute('class', 'chart-line');
    svg.append(line);

    coordinates.forEach(point => {
      const dot = document.createElementNS(namespace, 'circle');
      dot.setAttribute('cx', String(point.x));
      dot.setAttribute('cy', String(point.y));
      dot.setAttribute('r', '6');
      dot.setAttribute('tabindex', '0');
      dot.setAttribute('class', 'chart-point');
      dot.setAttribute('aria-label', `${point.point.title}: ${point.score} out of 100, ${point.point.label}`);
      const title = document.createElementNS(namespace, 'title');
      title.textContent = `${point.point.title}: ${point.score}/100 (${point.point.label})`;
      dot.append(title);
      svg.append(dot);

      const label = document.createElementNS(namespace, 'text');
      label.setAttribute('x', String(point.x));
      label.setAttribute('y', String(height - 12));
      label.setAttribute('text-anchor', 'middle');
      label.setAttribute('class', 'chart-axis');
      label.textContent = String(point.point.label);
      svg.append(label);
    });
  }

  chart.replaceChildren(svg);
}

const discussionList = document.getElementById('studentDiscussionList');
if (discussionList) {
  const discussionCards = Array.from(discussionList.querySelectorAll('.discussion-item'));
  const discussionFilter = document.getElementById('studentForumFilter');
  const discussionSearch = document.getElementById('studentForumSearch');
  const discussionEmpty = document.getElementById('studentForumEmpty');

  function filterDiscussions() {
    const selectedType = discussionFilter ? discussionFilter.value : 'all';
    const query = discussionSearch ? discussionSearch.value.trim().toLocaleLowerCase() : '';
    let visibleCount = 0;

    discussionCards.forEach(card => {
      const matchesType = selectedType === 'all' || card.dataset.type === selectedType;
      const matchesSearch = !query || card.textContent.toLocaleLowerCase().includes(query);
      const visible = matchesType && matchesSearch;
      card.hidden = !visible;
      if (visible) visibleCount += 1;
    });

    if (discussionEmpty) discussionEmpty.hidden = visibleCount > 0;
  }

  if (discussionFilter) discussionFilter.addEventListener('change', filterDiscussions);
  if (discussionSearch) discussionSearch.addEventListener('input', filterDiscussions);

  discussionCards.forEach(card => {
    const likeButton = card.querySelector('.discussion-like');
    if (!likeButton) return;

    likeButton.addEventListener('click', () => {
      const liked = likeButton.getAttribute('aria-pressed') === 'true';
      const count = likeButton.querySelector('b');
      if (!count) return;

      count.textContent = String(Number(count.textContent) + (liked ? -1 : 1));
      likeButton.setAttribute('aria-pressed', String(!liked));
    });
  });
}
