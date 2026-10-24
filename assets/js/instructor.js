document.addEventListener("DOMContentLoaded", function () {

    // =========================
    // Grading Criteria
    // =========================

    const criteriaInputs = document.querySelectorAll(".criteria-row input");
    const totalWeight = document.querySelector(".criteria-total strong");

    if (criteriaInputs.length > 0 && totalWeight) {

        function calculateTotal() {

            let total = 0;

            criteriaInputs.forEach(function (input) {
                total += Number(input.value) || 0;
            });

            totalWeight.textContent = total + "%";

            if (total === 100) {
                totalWeight.style.color = "#4ade80";
            } else {
                totalWeight.style.color = "#f87171";
            }
        }

        criteriaInputs.forEach(function (input) {
            input.addEventListener("input", calculateTotal);
        });

        calculateTotal();
    }

});


// =========================
// Analytics
// =========================

const assignmentSelect = document.getElementById("analyticsAssignment");

if (assignmentSelect) {

    const analyticsData = {

        academic: {
            average: 78,
            essays: 42,
            students: 25,
            issue: "Coherence",
            grammar: 82,
            structure: 76,
            content: 85,
            coherence: 71
        },

        argumentative: {
            average: 84,
            essays: 36,
            students: 22,
            issue: "Evidence",
            grammar: 88,
            structure: 81,
            content: 86,
            coherence: 79
        },

        opinion: {
            average: 73,
            essays: 29,
            students: 19,
            issue: "Grammar",
            grammar: 68,
            structure: 75,
            content: 80,
            coherence: 72
        }

    };

    function updateAnalytics() {

        const selectedAssignment = assignmentSelect.value;
        const data = analyticsData[selectedAssignment];

        document.getElementById("averageScore").textContent =
            data.average + "%";

        document.getElementById("essaysGraded").textContent =
            data.essays;

        document.getElementById("activeStudents").textContent =
            data.students;

        document.getElementById("commonIssue").textContent =
            data.issue;


        document.getElementById("grammarScore").textContent =
            data.grammar + "%";

        document.getElementById("grammarBar").style.width =
            data.grammar + "%";


        document.getElementById("structureScore").textContent =
            data.structure + "%";

        document.getElementById("structureBar").style.width =
            data.structure + "%";


        document.getElementById("contentScore").textContent =
            data.content + "%";

        document.getElementById("contentBar").style.width =
            data.content + "%";


        document.getElementById("coherenceScore").textContent =
            data.coherence + "%";

        document.getElementById("coherenceBar").style.width =
            data.coherence + "%";
    }

    assignmentSelect.addEventListener("change", updateAnalytics);

    updateAnalytics();
}