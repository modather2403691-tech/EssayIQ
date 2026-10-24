<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EssayIQ - Instructor Analytics</title>

    <link rel="stylesheet" href="../assets/css/instructor.css">

</head>


<body>

    <?php include 'navbar.php'; ?>


    <main class="container">


        <!-- Page Header -->
        <section class="page-header">

            <h1>
                Student <span class="gradient-text">Analytics</span>
            </h1>

            <p>
                Monitor student performance and identify common writing problems.
            </p>


            <!-- Assignment Filter -->
            <div class="analytics-filter">

                <label for="analyticsAssignment">
                    Select Assignment
                </label>

                <select id="analyticsAssignment">

                    <option value="academic">
                        Academic Essay
                    </option>

                    <option value="argumentative">
                        Argumentative Essay
                    </option>

                    <option value="opinion">
                        Opinion Essay
                    </option>

                </select>

            </div>

        </section>


        <!-- Overview Cards -->
        <section class="analytics-grid">


            <!-- Average Score -->
            <div class="analytics-card">

                <div class="analytics-icon">
                    ★
                </div>

                <div>

                    <span class="analytics-label">
                        Average Score
                    </span>

                    <h2 id="averageScore">
                        78%
                    </h2>

                    <p class="analytics-positive">
                        +6% from previous assignments
                    </p>

                </div>

            </div>


            <!-- Essays Graded -->
            <div class="analytics-card">

                <div class="analytics-icon">
                    ✓
                </div>

                <div>

                    <span class="analytics-label">
                        Essays Graded
                    </span>

                    <h2 id="essaysGraded">
                        42
                    </h2>

                    <p>
                        Across all assignments
                    </p>

                </div>

            </div>


            <!-- Active Students -->
            <div class="analytics-card">

                <div class="analytics-icon">
                    👥
                </div>

                <div>

                    <span class="analytics-label">
                        Active Students
                    </span>

                    <h2 id="activeStudents">
                        25
                    </h2>

                    <p>
                        Currently enrolled
                    </p>

                </div>

            </div>


            <!-- Common Issue -->
            <div class="analytics-card">

                <div class="analytics-icon">
                    !
                </div>

                <div>

                    <span class="analytics-label">
                        Most Common Issue
                    </span>

                    <h2
                        class="issue-text"
                        id="commonIssue">
                        Coherence
                    </h2>

                    <p>
                        Frequently needs improvement
                    </p>

                </div>

            </div>


        </section>


        <!-- Performance by Criteria -->
        <section class="analytics-section">


            <div class="analytics-section-header">

                <div>

                    <h2>
                        Performance by Criteria
                    </h2>

                    <p>
                        Average student performance across grading criteria.
                    </p>

                </div>


                <span class="analytics-badge">
                    AI Analysis
                </span>

            </div>


            <div class="performance-list">


                <!-- Grammar -->
                <div class="performance-row">

                    <div class="performance-info">

                        <span>
                            Grammar
                        </span>

                        <strong id="grammarScore">
                            82%
                        </strong>

                    </div>


                    <div class="progress-bar">

                        <div
                            class="progress-fill"
                            id="grammarBar"
                            style="width: 82%;">
                        </div>

                    </div>

                </div>


                <!-- Structure -->
                <div class="performance-row">

                    <div class="performance-info">

                        <span>
                            Structure
                        </span>

                        <strong id="structureScore">
                            76%
                        </strong>

                    </div>


                    <div class="progress-bar">

                        <div
                            class="progress-fill"
                            id="structureBar"
                            style="width: 76%;">
                        </div>

                    </div>

                </div>


                <!-- Content -->
                <div class="performance-row">

                    <div class="performance-info">

                        <span>
                            Content
                        </span>

                        <strong id="contentScore">
                            85%
                        </strong>

                    </div>


                    <div class="progress-bar">

                        <div
                            class="progress-fill"
                            id="contentBar"
                            style="width: 85%;">
                        </div>

                    </div>

                </div>


                <!-- Coherence -->
                <div class="performance-row">

                    <div class="performance-info">

                        <span>
                            Coherence
                        </span>

                        <strong id="coherenceScore">
                            71%
                        </strong>

                    </div>


                    <div class="progress-bar">

                        <div
                            class="progress-fill"
                            id="coherenceBar"
                            style="width: 71%;">
                        </div>

                    </div>

                </div>


            </div>

        </section>


        <!-- Common Writing Problems -->
        <section class="analytics-section">


            <div class="analytics-section-header">

                <div>

                    <h2>
                        Common Writing Problems
                    </h2>

                    <p>
                        Frequently detected problems in student essays.
                    </p>

                </div>

            </div>


            <div class="problems-grid">


                <!-- Problem 1 -->
                <div class="problem-card">

                    <span class="problem-number">
                        01
                    </span>

                    <div>

                        <h3>
                            Weak Coherence
                        </h3>

                        <p>
                            Students often struggle to connect ideas
                            smoothly between paragraphs.
                        </p>

                    </div>

                </div>


                <!-- Problem 2 -->
                <div class="problem-card">

                    <span class="problem-number">
                        02
                    </span>

                    <div>

                        <h3>
                            Grammar Errors
                        </h3>

                        <p>
                            Frequent grammar, punctuation,
                            and sentence structure mistakes.
                        </p>

                    </div>

                </div>


                <!-- Problem 3 -->
                <div class="problem-card">

                    <span class="problem-number">
                        03
                    </span>

                    <div>

                        <h3>
                            Essay Structure
                        </h3>

                        <p>
                            Some students need improvement in
                            organizing introductions and conclusions.
                        </p>

                    </div>

                </div>


                <!-- Problem 4 -->
                <div class="problem-card">

                    <span class="problem-number">
                        04
                    </span>

                    <div>

                        <h3>
                            Limited Evidence
                        </h3>

                        <p>
                            Arguments sometimes lack sufficient
                            supporting examples or evidence.
                        </p>

                    </div>

                </div>


            </div>

        </section>


    </main>


    <!-- Instructor JavaScript -->
    <script src="../assets/js/instructor.js"></script>


</body>

</html>