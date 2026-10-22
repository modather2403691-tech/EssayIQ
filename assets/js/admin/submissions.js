const submissionSearch = document.getElementById('submissionSearch');
const submissionStatusFilter = document.getElementById('submissionStatusFilter');
const submissionRows = document.querySelectorAll('#submissionsTable tbody tr');

function filterSubmissions() {
    const searchText = submissionSearch.value.toLowerCase().trim();
    const selectedStatus = submissionStatusFilter.value;
    let visibleCount = 0;

    submissionRows.forEach(row => {
        const matchesSearch = row.dataset.student.toLowerCase().includes(searchText) ||
            row.dataset.title.toLowerCase().includes(searchText);
        const matchesStatus = selectedStatus === 'All' || row.dataset.status === selectedStatus;
        const shouldShow = matchesSearch && matchesStatus;
        row.style.display = shouldShow ? '' : 'none';
        if (shouldShow) visibleCount++;
    });
    document.getElementById('noSubmissionsMessage').style.display =
        visibleCount === 0 ? 'block' : 'none';
}

submissionSearch.addEventListener('input', filterSubmissions);
submissionStatusFilter.addEventListener('change', filterSubmissions);

const submissionModal = document.getElementById('submissionModal');
const viewSubmissionButtons = document.querySelectorAll('.view-submission-btn');
const closeSubmissionModal = document.getElementById('closeSubmissionModal');
const submissionModalDone = document.getElementById('submissionModalDone');
let lastSubmissionButton = null;

viewSubmissionButtons.forEach(button => {
    button.addEventListener('click', function () {
        lastSubmissionButton = button;
        document.getElementById('detailSubmissionId').textContent = button.dataset.id;
        document.getElementById('detailStudent').textContent = button.dataset.student;
        document.getElementById('detailTitle').textContent = button.dataset.title;
        document.getElementById('detailCourse').textContent = button.dataset.course;
        document.getElementById('detailDate').textContent = button.dataset.date;
        document.getElementById('detailGrade').textContent = button.dataset.grade;
        document.getElementById('detailSimilarity').textContent = button.dataset.similarity;
        document.getElementById('detailStatus').textContent = button.dataset.status;
        document.getElementById('detailNote').textContent = button.dataset.note;
        submissionModal.hidden = false;
        closeSubmissionModal.focus();
    });
});

function closeSubmissionDetails() {
    submissionModal.hidden = true;
    if (lastSubmissionButton) lastSubmissionButton.focus();
}

closeSubmissionModal.addEventListener('click', closeSubmissionDetails);
submissionModalDone.addEventListener('click', closeSubmissionDetails);
submissionModal.addEventListener('click', event => {
    if (event.target === submissionModal) closeSubmissionDetails();
});
document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !submissionModal.hidden) closeSubmissionDetails();
});
submissionModal.addEventListener('keydown', event => {
    if (event.key !== 'Tab') return;
    const firstElement = closeSubmissionModal;
    const lastElement = submissionModalDone;
    if (event.shiftKey && document.activeElement === firstElement) {
        event.preventDefault();
        lastElement.focus();
    } else if (!event.shiftKey && document.activeElement === lastElement) {
        event.preventDefault();
        firstElement.focus();
    }
});

filterSubmissions();
