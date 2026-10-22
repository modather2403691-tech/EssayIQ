const sampleLogsElement = document.getElementById('sampleLogs');
const sampleLogs = sampleLogsElement ? JSON.parse(sampleLogsElement.textContent || '[]') : [];
const storageKey = 'essayiq_demo_admin_actions_v1';
let demoLogs = [];
try {
    const stored = JSON.parse(sessionStorage.getItem(storageKey) || '[]');
    demoLogs = Array.isArray(stored) ? stored : [];
} catch (error) {
    console.warn('Could not read demo activity:', error);
}

const logSearch = document.getElementById('logSearch');
const severityFilter = document.getElementById('severityFilter');
const logBody = document.querySelector('#activityLogsTable tbody');
const noLogsMessage = document.getElementById('noLogsMessage');

function allLogs() {
    return [...demoLogs, ...sampleLogs];
}

function addCell(row, value) {
    const cell = document.createElement('td');
    cell.textContent = String(value ?? '');
    row.appendChild(cell);
}

function renderLogs() {
    const logs = allLogs();
    document.getElementById('logTotal').textContent = logs.length;
    for (const [severity, id] of [['Info', 'logInfo'], ['Warning', 'logWarning'], ['Critical', 'logCritical']]) {
        document.getElementById(id).textContent =
            logs.filter(log => log.severity === severity).length;
    }
    const query = logSearch.value.toLowerCase().trim();
    const severity = severityFilter.value;
    const filtered = logs.filter(log =>
        (severity === 'All' || log.severity === severity) &&
        [log.id, log.admin, log.action, log.target, log.date, log.details]
            .join(' ').toLowerCase().includes(query)
    );
    logBody.replaceChildren();
    filtered.forEach(log => {
        const row = document.createElement('tr');
        addCell(row, log.id);
        addCell(row, log.admin);
        addCell(row, log.action);
        addCell(row, log.target);
        addCell(row, String(log.date).includes('T') ? new Date(log.date).toLocaleString() : log.date);
        const severityCell = document.createElement('td');
        const badge = document.createElement('span');
        badge.className = 'ieg-badge ' +
            (log.severity === 'Critical' ? 'ieg-badge-danger' :
                log.severity === 'Warning' ? 'ieg-badge-warning' : 'ieg-badge-success');
        badge.textContent = log.severity;
        severityCell.appendChild(badge);
        row.appendChild(severityCell);
        addCell(row, log.details);
        logBody.appendChild(row);
    });
    noLogsMessage.hidden = filtered.length !== 0;
}

logSearch.addEventListener('input', renderLogs);
severityFilter.addEventListener('change', renderLogs);
document.getElementById('resetLogFilters').addEventListener('click', () => {
    logSearch.value = '';
    severityFilter.value = 'All';
    renderLogs();
});
document.getElementById('clearDemoLogs').addEventListener('click', () => {
    if (!confirm('Clear browser-only demo actions? Sample logs will remain.')) return;
    try {
        sessionStorage.removeItem(storageKey);
    } catch (error) {
        console.warn(error);
    }
    demoLogs = [];
    renderLogs();
});
renderLogs();
