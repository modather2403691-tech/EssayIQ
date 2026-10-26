(function () {
    'use strict';

    document.querySelectorAll('[data-feedback]').forEach(function (highlight) {
        highlight.addEventListener('click', function () {
            const explanation = document.getElementById('ai-feedback-explanation');
            if (!explanation) return;
            explanation.innerHTML = '<strong>' + highlight.dataset.category + ':</strong> ' + highlight.dataset.feedback;
            document.querySelectorAll('.ai-feedback-highlight').forEach(function (item) {
                item.classList.remove('is-selected');
            });
            highlight.classList.add('is-selected');
        });
    });
}());
