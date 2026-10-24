<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EssayIQ - Forum</title>

    <link rel="stylesheet" href="../assets/css/forum.css">

</head>

<body>

<nav class="forum-navbar">

    <div class="forum-brand">

    <img
        src="../assets/images/EssayIQ AI Grading Logo.png"
        alt="EssayIQ Logo"
        class="forum-brand-logo"
    >

</div>

    <div class="forum-nav-links">

        <a href="../index.php">Home</a>
        <a href="index.php" class="active">Forum</a>
        <a href="#">Logout</a>

    </div>

</nav>


<main class="forum-container">

    <section class="forum-header">

        <div>

            <h1>
                Discussion <span>Forum</span>
            </h1>

            <p>
                Ask questions, share ideas, and improve your writing together.
            </p>

        </div>

        <button class="new-post-btn" id="newPostBtn">
            + New Post
        </button>

    </section>


    <section class="forum-tools">

        <input
            type="text"
            id="searchPosts"
            placeholder="Search discussions..."
        >

        <select id="postFilter">

            <option value="all">All Posts</option>
            <option value="question">Questions</option>
            <option value="discussion">Discussions</option>

        </select>

    </section>


    <section class="posts-list" id="postsList">


        <!-- Post 1 -->

        <article class="forum-post" data-type="question">

            <div class="post-user">

                <div class="avatar student-avatar">
                    AM
                </div>

                <div>

                    <strong>Ahmed Mohamed</strong>

                    <span>
                        Student · 10 minutes ago
                    </span>

                </div>

            </div>


            <div class="post-content">

                <div class="post-top">

                    <span class="post-category">
                        Question
                    </span>

                </div>

                <h2>
                    How can I improve my essay coherence?
                </h2>

                <p>
                    I have good ideas, but my paragraphs don't connect
                    smoothly. What should I do?
                </p>

            </div>


            <div class="post-footer">

                <a href="post.php" class="post-action">
                    💬 3 replies
                </a>

                <button class="like-btn">
                    ♡ <span>5</span> likes
                </button>

            </div>

        </article>


        <!-- Post 2 -->

        <article class="forum-post" data-type="discussion">

            <div class="post-user">

                <div class="avatar student-avatar">
                    SJ
                </div>

                <div>

                    <strong>Sarah James</strong>

                    <span>
                        Student · 25 minutes ago
                    </span>

                </div>

            </div>


            <div class="post-content">

                <div class="post-top">

                    <span class="post-category discussion">
                        Discussion
                    </span>

                </div>

                <h2>
                    What makes a strong essay introduction?
                </h2>

                <p>
                    I want to make my introductions more interesting
                    and clearly present my main argument.
                </p>

            </div>


            <div class="post-footer">

                <a href="post.php" class="post-action">
                    💬 7 replies
                </a>

                <button class="like-btn">
                    ♡ <span>12</span> likes
                </button>

            </div>

        </article>


        <!-- Post 3 -->

        <article class="forum-post" data-type="question">

            <div class="post-user">

                <div class="avatar student-avatar">
                    MK
                </div>

                <div>

                    <strong>Michael Khan</strong>

                    <span>
                        Student · 1 hour ago
                    </span>

                </div>

            </div>


            <div class="post-content">

                <div class="post-top">

                    <span class="post-category">
                        Question
                    </span>

                </div>

                <h2>
                    How many examples should I include?
                </h2>

                <p>
                    Is there a recommended number of examples to support
                    an argument in an academic essay?
                </p>

            </div>


            <div class="post-footer">

                <a href="post.php" class="post-action">
                    💬 2 replies
                </a>

                <button class="like-btn">
                    ♡ <span>4</span> likes
                </button>

            </div>

        </article>


    </section>

</main>


<script src="../assets/js/forum.js"></script>

</body>

</html>