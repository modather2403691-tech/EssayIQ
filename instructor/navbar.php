<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar">


<div class="brand">
    <a href="../index.php" class="brand-link">
        <img
            src="../assets/images/EssayIQ AI Grading Logo.png"
            alt="EssayIQ Logo"
            class="brand-logo"
        >
    </a>
</div>



    <div class="nav-links">

        <a href="dashboard.php"
           class="<?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
            Dashboard
        </a>

        <a href="courses.php"
           class="<?php echo $current_page == 'courses.php' ? 'active' : ''; ?>">
            Courses
        </a>

        <a href="create-assignment.php"
           class="<?php echo $current_page == 'create-assignment.php' ? 'active' : ''; ?>">
            Assignments
        </a>

        <a href="submissions.php"
           class="<?php echo $current_page == 'submissions.php' ? 'active' : ''; ?>">
            Submissions
        </a>

        <a href="analytics.php"
           class="<?php echo $current_page == 'analytics.php' ? 'active' : ''; ?>">
            Analytics
        </a>

        <a href="grading-criteria.php"
           class="<?php echo $current_page == 'grading-criteria.php' ? 'active' : ''; ?>">
            Grading Criteria
        </a>

        <a href="#">
            Logout
        </a>

    </div>

</nav>