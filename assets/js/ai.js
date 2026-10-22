(function () {
    'use strict';

    const rows = Array.from(document.querySelectorAll('#ai-essay-rows tr'));
    const search = document.getElementById('ai-search');
    const status = document.getElementById('ai-status');
    const reset = document.getElementById('ai-reset');
    const empty = document.getElementById('ai-empty');
    const count = document.getElementById('ai-result-count');
    const records = Array.isArray(window.essayIqGradingData) ? window.essayIqGradingData : [];

    function refreshRows() {
        const query = (search.value || '').trim().toLowerCase();
        const selectedStatus = status.value;
        let visible = 0;

        rows.forEach(function (row) {
            const matchesSearch = !query || row.dataset.search.includes(query);
            const matchesStatus = selectedStatus === 'all' || row.dataset.status === selectedStatus;
            row.hidden = !(matchesSearch && matchesStatus);
            if (!row.hidden) visible += 1;
        });

        count.textContent = visible + (visible === 1 ? ' essay' : ' essays');
        empty.hidden = visible !== 0;
    }

    function renderOverview(id) {
        const essay = records.find(function (record) {
            return String(record.id) === String(id);
        });
        if (!essay) return;

        const score = essay.grade === null ? 0 : essay.grade;
        const scoreElement = document.getElementById('ai-overview-score');
        const ring = document.getElementById('ai-overview-ring');
        const statusElement = document.getElementById('ai-overview-status');
        const criteria = document.getElementById('ai-overview-criteria');
        const link = document.getElementById('ai-overview-link');

        document.getElementById('ai-overview-student').textContent = essay.student;
        document.getElementById('ai-overview-title-text').textContent = essay.title;
        document.getElementById('ai-overview-date').textContent = 'Submitted ' + essay.date;
        document.getElementById('ai-overview-summary').textContent = essay.summary;
        scoreElement.textContent = score;
        ring.style.setProperty('--score', score);
        statusElement.textContent = essay.status;
        statusElement.className = 'ai-status ai-status-' + essay.status.toLowerCase();
        link.href = essay.grade === null ? '#' : 'feedback.php?id=' + essay.id;
        link.classList.toggle('ai-disabled-link', essay.grade === null);

        criteria.innerHTML = '';
        Object.keys(essay.criteria || {}).forEach(function (criterion) {
            const value = essay.criteria[criterion];
            criteria.insertAdjacentHTML(
                'beforeend',
                '<div><span>' + criterion + '</span><strong>' + value + '%</strong><i><b style="width:' + value + '%"></b></i></div>'
            );
        });
    }

    if (search && status) {
        search.addEventListener('input', refreshRows);
        status.addEventListener('change', refreshRows);
        reset.addEventListener('click', function () {
            search.value = '';
            status.value = 'all';
            refreshRows();
            if (records.length) renderOverview(records[0].id);
        });

        document.querySelectorAll('[data-preview-id]').forEach(function (button) {
            button.addEventListener('click', function () {
                renderOverview(button.dataset.previewId);
                document.getElementById('ai-overview-title').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            });
        });
    }

    document.querySelectorAll('[data-feedback]').forEach(function (highlight) {
        highlight.addEventListener('click', function () {
            const explanation = document.getElementById('ai-feedback-explanation');
            if (explanation) explanation.textContent = highlight.dataset.feedback;
        });
    });

    document.querySelectorAll('[data-comparison]').forEach(function (highlight) {
        highlight.addEventListener('click', function () {
            const explanation = document.getElementById('ai-comparison-explanation');
            if (explanation) explanation.textContent = highlight.dataset.comparison;
        });
    });
}());