<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EssayIQ - Instructor Courses</title>

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
            <a href="courses.php" class="active">Courses</a>
            <a href="create-assignment.php">Assignments</a>
            <a href="submissions.php">Submissions</a>
            <a href="analytics.php">Analytics</a>
            <a href="grading-criteria.php">Grading Criteria</a>
            <a href="#">Logout</a>
        </div>
    </nav>


    <main class="container">

        <!-- Page Header -->
        <section class="page-header">

            <h1>
                My <span class="gradient-text">Courses</span>
            </h1>

            <p>
                Create and manage your courses.
            </p>

        </section>


        <!-- Courses -->
        <section class="course-grid">


            <!-- Course 1 -->
            <div class="course-card">

                <div class="course-icon">
                    📚
                </div>

                <h2>
                    Academic Writing
                </h2>

                <p>
                    A course focused on academic writing,
                    essay structure, grammar, and argumentation.
                </p>

                <a href="#"
                   class="btn btn-primary">
                    View Course
                </a>

            </div>


            <!-- Course 2 -->
            <div class="course-card">

                <div class="course-icon">
                    ✍️
                </div>

                <h2>
                    English Composition
                </h2>

                <p>
                    A course designed to improve students'
                    writing, organization, and communication skills.
                </p>

                <a href="#"
                   class="btn btn-primary">
                    View Course
                </a>

            </div>


        </section>


        <!-- Create Course -->
        <section class="create-course">

            <a href="#"
               class="btn btn-ghost">
                + Create New Course
            </a>

        </section>


    </main>

</body>

</html>