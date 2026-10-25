(function () {
    'use strict';

    const rows = Array.from(document.querySelectorAll('#ai-essay-rows tr'));
    const search = document.getElementById('ai-search');
    const status = document.getElementById('ai-status');
    const reset = document.getElementById('ai-reset');
    const empty = document.getElementById('ai-empty');
    const count = document.getElementById('ai-result-count');

    function refreshRows() {
        const query = (search.value || '').trim().toLowerCase();
        const selectedStatus = status.value;
        let visible = 0;
        rows.forEach(function (row) {
            const matches = (!query || row.dataset.search.includes(query))
                && (selectedStatus === 'all' || row.dataset.status === selectedStatus);
            row.hidden = !matches;
            if (matches) visible += 1;
        });
        count.textContent = visible + (visible === 1 ? ' essay' : ' essays');
        empty.hidden = visible !== 0;
    }

    function renderOverview(row) {
        let criteria;
        try {
            criteria = JSON.parse(row.dataset.criteria);
        } catch (error) {
            return;
        }
        document.getElementById('overview-title').textContent = row.dataset.title;
        document.getElementById('overview-student').textContent = row.dataset.student;
        document.getElementById('overview-course').textContent = row.dataset.course;
        document.getElementById('overview-assignment').textContent = row.dataset.assignment;
        document.getElementById('overview-date').textContent = row.dataset.date;
        document.getElementById('overview-score').innerHTML = row.dataset.grade + '<small>/100</small>';
        document.getElementById('overview-letter').textContent = row.dataset.letter;
        document.getElementById('overview-confidence').textContent = row.dataset.confidence + '%';
        document.getElementById('overview-summary').textContent = row.dataset.summary;
        document.querySelector('.ai-confidence b').style.width = row.dataset.confidence + '%';
        document.getElementById('overview-criteria').innerHTML = Object.keys(criteria).map(function (name) {
            const item = criteria[name];
            return '<article class="ai-rubric-item"><div class="ai-rubric-label"><strong>' + name + '</strong><span>' + item[0] + '/20</span></div><div class="ai-progress"><span style="width:' + (item[0] * 5) + '%"></span></div><p>' + item[1] + '</p></article>';
        }).join('');
    }

    search.addEventListener('input', refreshRows);
    status.addEventListener('change', refreshRows);
    reset.addEventListener('click', function () {
        search.value = '';
        status.value = 'all';
        refreshRows();
        renderOverview(rows[0]);
    });
    document.querySelectorAll('[data-preview-id]').forEach(function (button) {
        button.addEventListener('click', function () {
            const row = document.querySelector('tr[data-id="' + button.dataset.previewId + '"]');
            if (row) {
                renderOverview(row);
                document.getElementById('evaluation-title').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    });
}());
