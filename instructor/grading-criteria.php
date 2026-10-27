<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EssayIQ - Grading Criteria</title>

    <link rel="stylesheet" href="../assets/css/instructor.css">

</head>

<body>

    <nav class="navbar">
        <div class="brand">
            <img
                src="../assets/images/EssayIQ AI Grading Logo.png"
                alt="EssayIQ Logo"
                class="brand-logo"
                style="width: 120px; height: 50px; object-fit: contain; display: block;"
            >
        </div>
        <div class="nav-links">
            <a href="dashboard.php">Dashboard</a>
            <a href="courses.php">Courses</a>
            <a href="create-assignment.php">Assignments</a>
            <a href="submissions.php">Submissions</a>
            <a href="analytics.php">Analytics</a>
            <a href="grading-criteria.php" class="active">Grading Criteria</a>
            <a href="#">Logout</a>
        </div>
    </nav>


    <main class="container">

        <!-- Page Header -->
        <section class="page-header">

            <h1>
                Grading <span class="gradient-text">Criteria</span>
            </h1>

            <p>
                Define the criteria used to evaluate student essays.
            </p>

        </section>


        <!-- Grading Criteria Card -->
        <section class="criteria-card">

            <div class="criteria-header">

                <h2>
                    Assignment Criteria
                </h2>

                <p>
                    Set the percentage for each grading criterion.
                </p>

            </div>


            <!-- Assignment -->
            <div class="form-group">

                <label for="assignment">
                    Assignment
                </label>

                <select id="assignment">

                    <option>
                        Academic Essay
                    </option>

                    <option>
                        Argumentative Essay
                    </option>

                    <option>
                        Opinion Essay
                    </option>

                </select>

            </div>


            <!-- Criteria -->
            <div class="criteria-list">


                <!-- Grammar -->
                <div class="criteria-row">

                    <div>
                        <h3>Grammar</h3>

                        <p>
                            Grammar, spelling, and sentence correctness.
                        </p>
                    </div>

                    <input
                        type="number"
                        value="20"
                        min="0"
                        max="100"
                    >

                    <span>%</span>

                </div>


                <!-- Structure -->
                <div class="criteria-row">

                    <div>
                        <h3>Structure</h3>

                        <p>
                            Organization and structure of the essay.
                        </p>
                    </div>

                    <input
                        type="number"
                        value="20"
                        min="0"
                        max="100"
                    >

                    <span>%</span>

                </div>


                <!-- Content -->
                <div class="criteria-row">

                    <div>
                        <h3>Content</h3>

                        <p>
                            Relevance, ideas, and quality of arguments.
                        </p>
                    </div>

                    <input
                        type="number"
                        value="30"
                        min="0"
                        max="100"
                    >

                    <span>%</span>

                </div>


                <!-- Coherence -->
                <div class="criteria-row">

                    <div>
                        <h3>Coherence</h3>

                        <p>
                            Logical flow and connection between ideas.
                        </p>
                    </div>

                    <input
                        type="number"
                        value="30"
                        min="0"
                        max="100"
                    >

                    <span>%</span>

                </div>


            </div>


            <!-- Total -->
            <div class="criteria-total">

                <span>
                    Total Weight
                </span>

                <strong>
                    100%
                </strong>

            </div>


            <!-- Button -->
            <div class="criteria-actions">

                <a href="#" class="btn btn-primary">
                    Save Grading Criteria
                </a>

            </div>


        </section>

    </main>
<script src="../assets/js/instructor.js"></script>

</body>

</html>