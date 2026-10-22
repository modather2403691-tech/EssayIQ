const riskSearch = document.getElementById('riskSearch');
const riskFilter = document.getElementById('riskFilter');
const riskRows = [...document.querySelectorAll('#riskTable tbody tr')];
const riskEmpty = document.getElementById('riskEmpty');

function applyRiskFilters() {
    const query = riskSearch.value.trim().toLowerCase();
    let count = 0;
    riskRows.forEach(row => {
        const show = row.dataset.search.includes(query) &&
            (riskFilter.value === 'All' || row.dataset.risk === riskFilter.value);
        row.hidden = !show;
        if (show) count++;
    });
    riskEmpty.hidden = count !== 0;
}

riskSearch.addEventListener('input', applyRiskFilters);
riskFilter.addEventListener('change', applyRiskFilters);

const riskModal = document.getElementById('riskModal');
const riskClose = document.getElementById('riskClose');
const riskDone = document.getElementById('riskDone');
let riskTrigger = null;

function closeRiskModal() {
    riskModal.hidden = true;
    if (riskTrigger) riskTrigger.focus();
}

document.querySelectorAll('.ieg-risk-details-btn').forEach(button => {
    button.addEventListener('click', () => {
        riskTrigger = button;
        const info = JSON.parse(button.dataset.details);
        document.getElementById('riskStudent').textContent = info.student;
        document.getElementById('riskEssay').textContent = info.title;
        document.getElementById('riskLevel').textContent = info.level;
        document.getElementById('riskRecommendation').textContent = info.recommendation;
        const list = document.getElementById('riskReasons');
        list.replaceChildren();
        info.reasons.forEach(reason => {
            const item = document.createElement('li');
            item.textContent = reason;
            list.appendChild(item);
        });
        riskModal.hidden = false;
        riskClose.focus();
    });
});

riskClose.addEventListener('click', closeRiskModal);
riskDone.addEventListener('click', closeRiskModal);
riskModal.addEventListener('click', event => {
    if (event.target === riskModal) closeRiskModal();
});
document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !riskModal.hidden) closeRiskModal();
});
riskModal.addEventListener('keydown', event => {
    if (event.key !== 'Tab') return;
    const focusables = [riskClose, riskDone];
    if (event.shiftKey && document.activeElement === focusables[0]) {
        event.preventDefault();
        focusables[1].focus();
    } else if (!event.shiftKey && document.activeElement === focusables[1]) {
        event.preventDefault();
        focusables[0].focus();
    }
});

applyRiskFilters();
